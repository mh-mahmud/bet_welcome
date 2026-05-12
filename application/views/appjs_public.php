<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script>

    $("form#login").on("submit", function(e) {
        e.preventDefault();

        var username = $("#user-username").val();
        var password = $("#user-password").val();
        var exObj = $("#login-btn");

        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'submit_user_login';
        red = url_prefix;

        // ajax request
        $.ajax({
            type: "POST",
            url: url,
            data: {
                username: username,
                password: password
            },
            beforeSend: function() {
                exObj.attr('disabled', true);
                exObj.text("Please wait.....");
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if(data.error == 0) {
                    $("#login-msg-error").hide();
                    $("#login-msg").show();
                    $("#login-msg").text(data.success_msg);
                    window.location = red;
                    return;
                }
                else if(data.error == 1) {
                    exObj.attr('disabled', false);
                    exObj.text("Sign In");
                    $("#login-msg-error").show();
                    $("#login-msg-error").text(data.error_msg);
                }
            },
            error:function(exception){
                console.log(exception);
            }
        });
    });
    // -- signin end

    $.validator.addMethod("checkUsername", function (value, element) {
        var isSuccess = 0;
        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'check_unique_username';
        $.ajax({
            url: url,
            data: {
                username: value
            },
            dataType: 'text',
            type: 'POST',
            async: false,
            success: function (msg) {
                // alert(msg)
                if (msg == 0) {
                    isSuccess = true;
                } else {
                    isSuccess = false;
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
            }
        });
        return isSuccess;
    }, "Sorry, this username is already in used");

    // validate signup form on keyup and submit
    $("#signupForm").validate({

        rules: {
            full_name: "required",
            username: {
                required: true,
                minlength: 4,
                checkUsername: true
            },
            reg_club: "required",
            reg_password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                minlength: 6,
                equalTo: "#reg_password"
            },
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true
            },
        },
        messages: {
            full_name: "please enter your full name",
            // username: "username is required",
            reg_club: "please select a club",
            email: "email is required",
            mobile: "phone number is required",
            reg_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
            confirm_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long",
                equalTo: "Please enter the same password as above"
            },
        },
        /*submitHandler: function(e) {

        }*/
    });

    // showInPlayBet();
    // showLiveMatchBet();
    // showUpcomingMatchBet();

    showAllBet();
    // setInterval(function () {showAllBet()}, 10000);

    $("#all-data").on("click", function() {
        $(".clicked").removeClass("active");
        $(this).addClass("active");
        showAllBet();
        //setInterval(function () {showAllBet()}, 5000);
    });

    $("#cricket").on("click", function() {
        $(".clicked").removeClass("active");
        $(this).addClass("active");
        showCricketMatchBet();
        //setInterval(function () {showCricketMatchBet()}, 5000);
    });

    $("#football").on("click", function() {
        $(".clicked").removeClass("active");
        $(this).addClass("active");
        showFootballMatchBet();
        //setInterval(function () {showFootballMatchBet()}, 5000);
    });

    $("#tennis").on("click", function() {
        $(".clicked").removeClass("active");
        $(this).addClass("active");
        showTennisMatchBet();
        //setInterval(function () {showTennisMatchBet()}, 5000);
    });

    function showAllBet() {
        $("#all-data").addClass("active");
        $.ajax({
            type: 'POST',
            cache: false,
            url: "<?php echo base_url('show_all_bet'); ?>"
        }).done(function (response) {
            $("#app").html(response);
        });
    }

    function showCricketMatchBet() {
        $.ajax({
            type: 'POST',
            cache: false,
            url: "<?php echo base_url('show_cricket_match_bet'); ?>"
        }).done(function (response) {
            $("#app").html(response);
        });
    }

    function showFootballMatchBet() {
        $.ajax({
            type: 'POST',
            cache: false,
            url: "<?php echo base_url('show_football_match_bet'); ?>"
        }).done(function (response) {
            $("#app").html(response);
        });
    }

    function showTennisMatchBet() {
        $.ajax({
            type: 'POST',
            cache: false,
            url: "<?php echo base_url('show_tennis_match_bet'); ?>"
        }).done(function (response) {
            $("#app").html(response);
        });
    }

    // -- implement set timeout
    /*setInterval(function () {showInPlayBet()}, 2000);
    setInterval(function () {showLiveMatchBet()}, 5000);
    setInterval(function () {showUpcomingMatchBet()}, 10000);*/

    // Numeric only control handler
    jQuery.fn.ForceNumericOnly = function() {
        return this.each(function()
        {
            $(this).keydown(function(e)
            {
                var key = e.charCode || e.keyCode || 0;
                // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                // home, end, period, and numpad decimal
                return (
                    key == 8 || 
                    key == 9 ||
                    key == 13 ||
                    key == 46 ||
                    key == 110 ||
                    key == 190 ||
                    (key >= 35 && key <= 40) ||
                    (key >= 48 && key <= 57) ||
                    (key >= 96 && key <= 105));
            });
        });
    };

    var elems = [];
    function showBetModal(coin, id) {

        var coin_rate = parseFloat(coin);
        var id = id;
        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'frontcontroller/check_init_bet';
        var multiBet = $("#multibet_enabled").val();

        // alert(multiBet);return;
        if(multiBet==0 || multiBet==undefined) {

            // ajax request
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    option_details_id: id,
                    coin_rate: coin_rate,
                },
                dataType: 'json',
                success: function(data) {
                    if(data.error==0) {
                        $("#betContent").html(data.get_data);
                        $("#betRequestModal").modal('show');

                        $("#isMultibet").on("change", function() {
                            if(this.checked) {
                                $("#multibet_enabled").attr('value', 1);
                                $(".init_multibet_button").show();
                                // $("button.place_bid_custom_btn").remove();
                                $("button.place_bid_custom_btn").hide();
                                $("#multi_bet_slip").attr("data-badge", 1);
                                $("#multi_bet_stack_count").show();
                                prepareModalData(id);
                                return;
                            }
                            else {
                                elems = [];
                                $("#multibet_enabled").attr('value', 0);
                                $("button.place_bid_custom_btn").show();
                                $(".init_multibet_button").hide();
                                $("#multi_bet_slip").attr("data-badge", 0);
                                $("#multi_bet_stack_count").hide();
                            }
                        });

                        // -- start new code

                        // bet submission code
                        $("button.place_bid_custom_btn").on("click", function(e) {
                            e.preventDefault();

                            var optionDetailsId = $("#option_details_id").val();
                            var userBet = parseFloat($("#bet_stake").val());
                            var betRate = parseFloat($("#bet_coin").val());
                            var exObj = $(this);

                            var url_prefix = "<?php echo base_url(); ?>";
                            url = url_prefix + 'submit_user_bet';

                            // ajax request
                            $.ajax({
                                type: "POST",
                                url: url_prefix + 'customeruser/submit_user_bet',
                                data: {
                                    option_details_id: optionDetailsId,
                                    user_bet: userBet,
                                    bet_rate: betRate
                                },
                                beforeSend: function() {
                                    exObj.attr('disabled', true);
                                    exObj.text("Please wait.....");
                                    $("#betQueue").hide();
                                    // $('#betModalBox').modal('hide');
                                },
                                dataType: 'json',
                                success: function(data) {
                                    exObj.attr('disabled', false);
                                    exObj.text("Place Bet");

                                    if(data.error == 0) {
                                        $("#betSuccessBox").show();
                                        $("#betSuccessBox").text(data.success_msg);
                                        setTimeout(function() {
                                            $("#betRequestModal").modal('hide');
                                        }, 2000);
                                    }
                                    else if(data.error == 1) {
                                        $("#betErrorBox").show();
                                        $("#betErrorBox").text(data.error_msg);
                                        $("#betQueue").show();
                                    }
                                    else if(data.error == 2 || data.error == 3) {
                                        $("#betErrorBox").show();
                                        $("#betErrorBox").text(data.error_msg);
                                        $("#betQueue").show();
                                    }
                                },
                                error:function(exception){
                                    console.log(exception);
                                }
                            });

                            /*console.log(optionDetailsId);
                            console.log(userBet);*/
                        });

                        // -- end new code

                    }
                    else if(data.error == 1) {
                        $("#loginModal").modal('show');
                    }
                    else if(data.error == 2 || data.error == 3) {

                    }
                    return;
                },
                error:function(exception){
                    console.log(exception);
                }
            });

        }
        else if(multiBet==1) {
            var slip_val = $("#multi_bet_slip").attr("data-badge");
            prepareModalData(id);

            // -- start testing
            var url_prefix = "<?php echo base_url(); ?>";
            url = url_prefix + 'frontcontroller/check_dublicate_match';
            var return_first = function () {
                var tmp = null;
                $.ajax({
                    'async': false,
                    'type': "POST",
                    'global': false,
                    'dataType': 'json',
                    'url': url,
                    data: {
                        option_detail_ids: elems
                    },
                    'success': function (data) {
                        tmp = data.error;
                    }
                });
                return tmp;
            }();

            if(return_first==2) {
                $("#multibet-alert").modal('show');
                elems = jQuery.grep(elems, function(value) {
                    return value != id;
                });
                return;
            }
            // -- end testing

            slip_val = parseInt(slip_val);
            slip_val++;
            $("#multi_bet_slip").attr("data-badge", slip_val);
        }
    }

    function checkDublicateMatch(elems, last_id) {
        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'frontcontroller/check_dublicate_match';
        var chk_error;

        // ajax request
        $.ajax({
            type: "POST",
            url: url,
            data: {
                option_detail_ids: elems
            },
            dataType: 'json',
            success: function(data) {
                console.log('bubu ' +data.error);
                chk_error = data.error;
                return;
                /*if(data.error==0) {

                }
                else if(data.error == 2) {
                    console.log(elems);
                    console.log(last_id);
                    $("#multibet-alert").modal('show');
                    elems = jQuery.grep(elems, function(value) {
                        return value != last_id;
                    });
                    console.log("Bubu:" + elems);
                    return;
                }*/

            },
            error:function(exception){
                console.log(exception);
            }
        });
        // return chk_error;
    }

    function prepareModalData(id) {
        elems.push(id);
    }

    function multiBetClose(arr_val) {

        var slip_val = $("#multi_bet_slip").attr("data-badge");
        slip_val = parseInt(slip_val);
        if(slip_val > 1) {
            elems = jQuery.grep(elems, function(value) {
                return value != arr_val;
            });
            slip_val--;
        }
        $("#multi_bet_slip").attr("data-badge", slip_val);
        showMultiBetModal();
    }

    function showMultiBetModal() {

        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'frontcontroller/check_init_multibet';
        console.log(elems);

            // ajax request
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    option_details_id: elems,
                },
                dataType: 'json',
                success: function(data) {
                    if(data.error==0) {
                        $("#betContent").html(data.get_data);
                        $("#betRequestModal").modal('show');

                        $("#isNotMultibet").on("change", function() {
                            if(this.checked) {

                            }
                            else {
                                elems = [];
                                $("#multibet_enabled").attr('value', 0);
                                $("#multi_bet_slip").attr("data-badge", 0);
                                $("#multi_bet_stack_count").hide();
                                $('#betRequestModal').modal('hide');
                            }
                        });

                        // -- start new code

                        // bet submission code
                        $("button.place_multibid_custom_btn").on("click", function(e) {
                            e.preventDefault();

                            var optionDetailsId = elems;
                            var userBet = parseFloat($("#multibet_stake").val());
                            var betRate = parseFloat($("#total_stake_box").val());
                            var exObj = $(this);
                            var url_prefix = "<?php echo base_url(); ?>";

                            // ajax request
                            $.ajax({
                                type: "POST",
                                url: url_prefix + 'customeruser/submit_user_multibet',
                                data: {
                                    option_details_id: optionDetailsId,
                                    user_bet: userBet,
                                    bet_rate: betRate
                                },
                                beforeSend: function() {
                                    exObj.attr('disabled', true);
                                    exObj.text("Please wait.....");
                                    $("#betQueue").hide();
                                    // $('#betModalBox').modal('hide');
                                },
                                dataType: 'json',
                                success: function(data) {
                                    exObj.attr('disabled', false);
                                    exObj.text("Place Bet");

                                    if(data.error == 0) {
                                        $("#betSuccessBox").show();
                                        $("#betSuccessBox").text(data.success_msg);

                                        elems = [];
                                        $("#multi_bet_slip").attr("data-badge", 0);
                                        $("#multi_bet_stack_count").hide();
                                        $("#multibet_enabled").attr('value', 0);
                                        setTimeout(function() {
                                            $("#betRequestModal").modal('hide');
                                        }, 2000);
                                    }
                                    else if(data.error == 1) {
                                        $("#betErrorBox").show();
                                        $("#betErrorBox").text(data.error_msg);
                                        $("#betQueue").show();
                                    }
                                    else if(data.error == 2 || data.error == 3) {
                                        $("#betErrorBox").show();
                                        $("#betErrorBox").text(data.error_msg);
                                        $("#betQueue").show();
                                    }
                                },
                                error:function(exception){
                                    console.log(exception);
                                }
                            });

                            /*console.log(optionDetailsId);
                            console.log(userBet);*/
                        });

                        // -- end new code

                    }
                    else if(data.error == 1) {
                        $("#loginModal").modal('show');
                    }
                    else if(data.error == 2 || data.error == 3) {

                    }
                    return;
                },
                error:function(exception){
                    console.log(exception);
                }
            });

    }

    function calcFixAmount(amount, rate) {
        var total_stake = parseInt(amount);
        var possible_win = total_stake*parseFloat(rate);
        $("span#total_stake").text(total_stake);
        $("span#possible_win").text(possible_win);
        $("#bet_stake").val(total_stake);
    }

    function customBetAmount(rate) {
        var rate = parseFloat(rate);
        var fieldValue = $("#bet_stake").val();

        var total_stake = parseFloat(fieldValue);
        var possible_win = total_stake*rate;
        possible_win = possible_win.toFixed(2);

        if(total_stake < 5 || total_stake > 10000 || !total_stake) {
            $("#betErrorBox").show();
            $("#betErrorBox").text("Error! Bet limit is 5 to 10000");
            $(".place_bid_custom_btn").attr('disabled', true);
        }
        else {
            $("#betErrorBox").text("");
            $("#betErrorBox").hide();
            $(".place_bid_custom_btn").attr('disabled', false);
        }

        $("span#total_stake").text(total_stake);
        $("span#possible_win").text(possible_win);
    }

    function customMultiBetAmount(rate) {
        var rate = parseFloat($("#total_stake_box").val());
        var fieldValue = $("#multibet_stake").val();

        var total_stake = parseFloat(fieldValue);
        var possible_win = total_stake*rate;
        possible_win = possible_win.toFixed(2);

        if(total_stake < 100 || total_stake > 10000 || !total_stake) {
            $("#betErrorBox").show();
            $("#betErrorBox").text("Error! Bet limit is 5 to 10000");
            $(".place_multibid_custom_btn").attr('disabled', true);
        }
        else {
            $("#betErrorBox").text("");
            $("#betErrorBox").hide();
            $(".place_multibid_custom_btn").attr('disabled', false);
        }
        $("#possible_win").text(possible_win);
    }

    (function () {

        var clockElement = document.getElementById( "span_clock" );

        function updateClock ( clock ) {
            clock.innerHTML = new Date().toLocaleTimeString();
        }

        setInterval(function () {
          updateClock( clockElement );
        }, 1000);

    }());

</script>