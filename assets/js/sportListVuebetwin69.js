/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Vue.use(VeeValidate);
var crreunt_active_sports_list_nav;
(function (jQ) {
    crreunt_active_sports_list_nav = Cookies.get('sportsListNav');

    if (crreunt_active_sports_list_nav == undefined) {
        crreunt_active_sports_list_nav = 1;
    }
    $('#sportsList .jquery-accordion-menu li').removeClass('active');
    $('#sportsList .jquery-accordion-menu li:nth-child(' + crreunt_active_sports_list_nav + ')').addClass('active');

    $(document).on('click', '#sportsList .jquery-accordion-menu li', function () {
        Cookies.set('sportsListNav', $(this).index() + 1);
        $('#sportsList li').removeClass('active');
        $(this).addClass('active');
        location.reload();
    });

    var elementExists = document.getElementById("sportsList");
    if (elementExists != null) {
        var sportListApp = new Vue({
            el: '#sportsList',
            data: {
                multibetEnabled: 0,
                isMultibet: false,
                liveMatches: [],
                inPlayMatches: [],
                ballByBallMatches: [],
                upcomingMatches: [],
                sportId: 1,
                errMsgLive: '',
                errMsgUpcoming: '',
                errMsgBallByBall: '',
                errMsgInplay: '',
                requestBet: {},
                requestBetErr: {},
                responseBet: {},
                bet_stakes: [
                    '50.00',
                    '100.00',
                    '500.00',
                    '1000.00',
                    '5000.00',
                    '10000.00',
                ],
                bets: [],
                selected_stake: "100.00",
                winnings_and_stake: {
                    total_stake: 0.00,
                    possible_winning: 0.00,
                },
                disabledSubmit: false,
                readyToSubmitMultiBet: 0,
                multiBetReturnRateAjaxTimeout: null,
            },
            mounted: function () {
                if (document.getElementById('multibet_enabled') != null) {
                    this.multibetEnabled = document.getElementById('multibet_enabled').value;
                }
                this.getLiveMatches();
            },
            watch: {
                isMultibet: function () {
                    if (this.isMultibet) {
                       
                        
                        jQ('#multi_bet_stack_count > span').attr('data-badge', this.bets.length);
                        jQ('#multi_bet_stack_count').show();
                    } else {
                        jQ('#multi_bet_stack_count').hide();
                        jQ("#betRequestModal").modal('toggle');
                    }
                    
                }
            },
            methods: {
                 transformMatches: function (sports) {
                    $.each(sports, function (sports_index, sport) {
                        $.each(sport.matches, function (match_index, match) {
                            var title_parts = match.match_title.split('[]');
                            if( title_parts.length < 2 )
                            {
                                var title_parts = match.match_title.split('<>');
                                var tournament = title_parts[1];
                                sports[sports_index].matches[match_index]['match_time'] = title_parts[title_parts.length - 1].trim();
                                sports[sports_index].matches[match_index]['match_title'] = title_parts[0].trim().replace(/vs/ig, '<span class="match-vs text-blue">VS</span>');
                            }
                            else
                            {
                                var tournament = title_parts[title_parts.length - 1];
                                sports[sports_index].matches[match_index]['match_time'] = title_parts[0].trim();
                                sports[sports_index].matches[match_index]['match_title'] = title_parts[1].trim().replace(/vs/ig, '<span class="match-vs text-blue">VS</span>');
                            }

                            sports[sports_index].matches[match_index]['match_date'] = title_parts[2].trim();
                            
                            sports[sports_index].matches[match_index]['tournament'] = tournament.trim();
                            
                        });                        
                    });

                    return sports;
                },
                getLiveMatches: function () {

                    var vm = this;

                    this.$http.get(base_url + 'sports/get_live_matches/'+crreunt_active_sports_list_nav, {
                        headers: {
                            'content-type': 'application/json'
                        },
                    }).then(function (response) {
                        response.status;
                        response.statusText;

                        this.liveMatches = this.transformMatches(response.body.data);
                        this.getUpcomingMatches();
                        this.getInplayMatches();

                        setTimeout(function () {
                            vm.getLiveMatches();
                        }, 15000);

                    }, function (errorResponse) {
                        this.errMsgLive = errorResponse.body.error.msg;
                        this.getUpcomingMatches();
                        this.getInplayMatches();
//                        this.getBallByBallMatches();

                        setTimeout(function () {
                            vm.getLiveMatches();
                        }, 15000);
                    });
                },
                getInplayMatches: function () {

                    var vm = this;

                    this.$http.get(base_url + 'sports/get_in_play_matches/'+crreunt_active_sports_list_nav, {
                        headers: {
                            'content-type': 'application/json'
                        },
                    }).then(function (response) {
                        response.status;
                        response.statusText;

                        this.inPlayMatches = this.transformMatches(response.body.data);

                    }, function (errorResponse) {
                        this.errMsgInplay = errorResponse.body.error.msg;
                    });
                },
                getBallByBallMatches: function () {
                    var vm = this;
                    this.$http.get(base_url + 'sports/get_ballbyball_matches/', {
                        headers: {
                            'content-type': 'application/json'
                        },
                    }).then(function (response) {
                        response.status;
                        response.statusText;
                        this.ballByBallMatches = response.body.data;
                    }, function (errorResponse) {
                        this.errMsgBallByBall = errorResponse.body.error.msg;
                    });
                },
                getUpcomingMatches: function () {

                    this.$http.get(base_url + 'sports/get_upcoming_matches/'+crreunt_active_sports_list_nav, {
                        headers: {
                            'content-type': 'application/json'
                        },
                    }).then(function (response) {
                        response.status;
                        response.statusText;

                        this.upcomingMatches = this.transformMatches(response.body.data);
                    }, function (errorResponse) {
                        this.errMsgUpcoming = errorResponse.body.error.msg;
                    });
                },
                request_bet: function request_bet(e) {
                    e.preventDefault();
                    show_spinner();

                    this.disabledSubmit = true;
                    this.requestBetErr = {};
                    this.before_bet();
                    var payload = this.bets;

                    var submit_url = base_url + 'member/request_bet/' + payload[0].user_id;

                    if (this.isMultibet && this.bets.length > 1) {
                        submit_url += '/1';
                        payload[0].stake = this.winnings_and_stake['total_stake'];
                    }

                    this.bets = [];

                    if (payload.length > 0) {
                        this.$http.post(submit_url, payload, {
                            headers: {
                                'content-type': 'application/json'
                            },
                        }).then(function (response) {

                            response.status;
                            response.statusText;
                            this.responseBet = response.body;

                            if (this.responseBet.success) {
                                setTimeout(function () {
                                    location.reload();
                                }, 1000);
                            }

                        }, function (errorResponse) {

                            this.requestBetErr = errorResponse.body.error;
                            this.bets = errorResponse.body.data;
                            this.disabledSubmit = false;
                            hide_spinner();
                        });
                    }
                },
                remove_bet: function remove_bet(index) {
                    this.bets.splice(index, 1);
                    this.calculate_total_stake();
                },
                process_bet_request: function (user_id, sport, match, question, answer) {

                    if (!this.isMultibet) {
                        this.bets = [];
                    }

                    if (this.isMultibet && this.multibet_match_exits(match)) {
                        $("#multibet-alert").modal();
                        return false;
                    }

                    this.requestBet.user_id = user_id;
                    this.requestBet.sport = sport;
                    this.requestBet.match = match;
                    this.requestBet.question = question;
                    this.requestBet.answer = answer;
                    this.requestBet.stake = this.selected_stake;
                    this.bets.push(this.requestBet);
                    this.requestBet = {};
                    
                    jQ('#multi_bet_stack_count > span').attr('data-badge', this.bets.length);
                },
                bet_request_modal: function bet_request_modal(e, user_id, sport, match, question, answer) {
                    e.preventDefault();

                    if (user_id > 0) {
                        
                        if (this.process_bet_request(user_id, sport, match, question, answer) !== false) {
                            this.calculate_total_stake();

                            this.readyToSubmitMultiBet = jQ('#readyToSubmitMultiBet').val();
                            var vm = this;

                            if (!this.isMultibet || this.readyToSubmitMultiBet == 1) {
                                jQ('#betRequestModal').modal('show');

                                jQ('#betRequestModal').on('shown.bs.modal', function () {
                                    vm.multibet_update_return_rate();
                                });

                                jQ('#betRequestModal').on('hide.bs.modal', function () {
                                    clearTimeout(vm.multiBetReturnRateAjaxTimeout);
                                });
                            }
                            else
                            {
                                jQ("#multi_bet_stack_count .badge-notification").html("Adding...");
                                jQ("#multi_bet_stack_count").css("background","#EFFFFF");
                                setTimeout(function(){ 
                                    jQ("#multi_bet_stack_count .badge-notification").html("Bet Slip"); 
                                    jQ("#multi_bet_stack_count").css("background","yellow");
                                
                                
                                }, 500);
                                
                               
                            }    
                               
                        }

                    } else {
                        jQ('#loginModal').modal('show');
                    }
                },
                before_bet: function before_bet() {
                    this.bets.map(function (bet, index) {
                        Object.keys(bet).forEach(function (key) {
                            if (key.indexOf('_err') > 1) {
                                delete bet[key];
                            }
                        });
                    });
                },
                calculate_total_stake: function calculate_total_stake() {

                    var total_stake = 0.00, possible_winning = 0.00, bet_count = this.bets.length,
                        total_return_rate = 0.00, total_return_rate_multi = 1,multibet_return_rate = 0.00
                    ;

                    this.bets.forEach(function (bet) {
                        var stake = parseFloat(bet.stake);
                        total_stake += stake;
                        possible_winning += (stake * parseFloat(bet.answer.return_rate));
                        total_return_rate += parseFloat(bet.answer.return_rate);
                        total_return_rate_multi *= parseFloat(bet.answer.return_rate);
                    });

                    if (this.isMultibet) {
                        
                        multibet_return_rate = total_return_rate_multi;
                        possible_winning = this.winnings_and_stake.total_stake * multibet_return_rate;
                    }

                    this.winnings_and_stake['possible_winning'] = possible_winning.toFixed(2);
                    this.winnings_and_stake['multibet_return_rate'] = (bet_count > 1 && this.isMultibet) ? multibet_return_rate.toFixed(2) : total_return_rate;

                    if (!this.isMultibet) {
                        this.winnings_and_stake['total_stake'] = total_stake.toFixed(2);
                    }
                },
                set_collapse: function set_collapse() {
                    var expanded_match = Cookies.get('expanded_match');
                    var expanded_questions = Cookies.get('expanded_question');
                    var ar_expanded_questions = [];
                    if (expanded_questions != undefined) {
                        ar_expanded_questions = JSON.parse(expanded_questions)
                    }

                    if (expanded_match != undefined) {
                        var ar_elm = expanded_match.split('-'), parent_elm = 'match-title-' + ar_elm[2];

                        if ($('#' + parent_elm).length > 0) {

                            $('#' + expanded_match).collapse('show');
                        }
                    }

                    if (ar_expanded_questions.length > 0) {

                        $.each(ar_expanded_questions, function (key, collapsible_elm_qs) {
                            $('#' + collapsible_elm_qs).collapse('show');
                        });
                    }
                },
                multibet_match_exits: function (match) {
                    var exists = false;

                    for (var i = 0; i <= this.bets.length; i++) {
                        if ((this.bets[i] != undefined) && (this.bets[i].match.match_id == match.match_id)) {
                            exists = true;
                            break;
                        }
                    }

                    return exists;
                },
                multibet_update_return_rate: function () {
                    var vm = this;

                    if(this.bets.length > 1) {
                        this.$http.post(base_url + 'sports/get_current_return_rate', this.bets, {
                            headers: {
                                'content-type': 'application/json'
                            },
                        }).then(function (response) {
                            response.status;
                            response.statusText;

                            var updated_answers = response.body;

                            updated_answers.forEach(function (updated_answer) {
                                vm.bets.forEach(function (bet, idx) {
                                    if (bet.answer.answer_id == updated_answer.id) {
                                        vm.bets[idx].answer.return_rate = updated_answer.return_rate;
                                    }
                                });
                            });

                            this.calculate_total_stake();

                            this.multiBetReturnRateAjaxTimeout = setTimeout(function () {
                                vm.multibet_update_return_rate();
                            }, 5000);

                        }, function (errorResponse) {

                            this.multiBetReturnRateAjaxTimeout = setTimeout(function () {
                                vm.multibet_update_return_rate();
                            }, 5000);
                        });
                    }
                }
            },
            updated: function () {
                this.$nextTick(function () {
                    this.set_collapse();
                });
            },
            filters: {
                underscore_to_space: function (str) {
                    return str.replace(new RegExp('_', 'g'), ' ');
                }
            },
        });

        $(document).on('click', '#multi_bet_stack_count', function () {
            sportListApp.readyToSubmitMultiBet = 1;
            $('#betRequestModal').modal('show');
        });
        $(document).on('click', '#multi_bet_stack_count_alert', function () {
            sportListApp.readyToSubmitMultiBet = 1;
            $('#betRequestModal').modal('show');
        });
        $(document).on('click', '.form-row button.close.text-danger', function () {
         
           var cur_data = $('#multi_bet_stack_count > span').attr('data-badge')-1;
           
           $('#multi_bet_stack_count > span').attr('data-badge', cur_data);
        });

    }
})(jQuery);

