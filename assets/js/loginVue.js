/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function (jQ) {

//    var start = moment().subtract(29, 'days');
//    var end = moment();
//
//    function cb(start, end) {
//        jQ('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
//    }
//
//    jQ('#reportrange').daterangepicker({
//        startDate: start,
//        endDate: end,
//        ranges: {
//            'Today': [moment(), moment()],
//            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
//            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
//            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
//            'This Month': [moment().startOf('month'), moment().endOf('month')],
//            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
//        }
//    }, cb);
//
//    cb(start, end);

    Vue.component('v-select', VueSelect.VueSelect);

    var loginApp = new Vue({
        el: '#loginRegister',
        data: {
            disabledSubmit: false,
            fullname: '',
            username: '',
            fcm_id:'',
            email: '',
            club: null,
            sponsor_id: '',
            mobile: '',
            password: '',
            cnf_password: '',
            loginError: '',
            registrationErrors: [],
            clubs: [
                {club_id: '', club_title: 'Select'}
            ],
            deposit_methods: [],
            withdraw_methods: [],
            user_account_types: [
                {method_id: 'personal', method_title: 'Personal'},
                {method_id: 'agent', method_title: 'Agent'},
//                {method_id: 'rocket', method_title: 'Rocket'},
//                {method_id: 'flexi_load', method_title: 'Flexi Load'},
            ],
            userBets: [],
            requestDepositErr: [],
            requestDeposit: {},
            responseDeposit: {
                success: false,
                msg: '',
            },
            requestWithdrawErr: [],
            requestWithdraw: {},
            responseWithdraw: {
                success: false,
                msg: '',
            },
            userDeposits: [],
            userWithdraws: [],
            userClubMembers: [],
            userClubSponsorModalLabel: '',
            userClubOrSponsorModal: 'club',
            deposit_numbers: [],
            all_deposit_numbers: [],
            requestAllDepositErr: '',
            userDepositListError: '',
            userWithdrawListError: '',
            userClubError: '',
            betListError: '',
            responseUpdatePassword: '',
            updatePasswordError: '',
            responseBalanceTransfer: '',
            balanceTransferError: '',
            update_pwd: {},
            balance_transfer_frm: {},
            depostiNumbersAjaxTimeout: null
        },
        mounted: function () {
            this.getTopTenClubs();
            this.getDepositPaymentMethods();
            this.getWithdrawPaymentMethods();
        },
        methods: {
            getDepositPaymentMethods: function getDepositPaymentMethods() {
                this.$http.get(base_url + 'site/get_deposit_payment_methods', {
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(function (response) {
                    response.status;
                    response.statusText;

                    var vm = this;

                    this.deposit_methods = response.body;
                    this.requestDeposit.method = this.deposit_methods[0];

                    this.depostiNumbersAjaxTimeout = setTimeout(function () {
                        vm.getDepositNumbers();
                        vm.getAllDepositNumbers();
                    }, 300);

                }, function (errorResponse) {
                    this.requestDepositErr = errorResponse.body.error.msg;
                });
            },
            getWithdrawPaymentMethods: function getWithdrawPaymentMethods() {
                this.$http.get(base_url + 'site/get_withdraw_payment_methods', {
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(function (response) {
                    response.status;
                    response.statusText;

                    this.withdraw_methods = response.body;
                }, function (errorResponse) {
                    this.requestDepositErr = errorResponse.body.error.msg;
                });
            },
            getDepositNumbers: function getDepositNumbers() {

                this.$http.get(base_url + 'site/get_deposit_numbers/' + this.requestDeposit.method.method_id, {
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(function (response) {
                    response.status;
                    response.statusText;

                    this.deposit_numbers = response.body;
                    this.requestDeposit.to = this.deposit_numbers[0];

                    clearTimeout(this.depostiNumbersAjaxTimeout);

                }, function (errorResponse) {
                    this.requestDepositErr = errorResponse.body.error.msg;
                });
            },
            getAllDepositNumbers: function getAllDepositNumbers() {

                this.$http.get(base_url + 'site/get_all_deposit_numbers/', {
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(function (response) {
                    response.status;
                    response.statusText;

                    this.all_deposit_numbers = response.body;

                }, function (errorResponse) {
                    this.requestAllDepositErr = errorResponse.body.error.msg;
                });
            },
            getTopTenClubs: function getTopTenClubs() {

                this.$http.get(base_url + 'clubs/get_top_ten_clubs', {
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(function (response) {
                    response.status;
                    response.statusText;

                    this.clubs = response.body;
                }, function (errorResponse) {
                    this.clubs = [];
                });
            },
            login: function (e) {
                e.preventDefault();
                show_spinner();
             

                var payload = {username: this.username, password: this.password, fcm_id: $("#fcm_id").val()};

                this.$http.post(base_url + 'member/login', payload, {
                    headers: {
                        'content-type': 'application/json'
                    },
                }).then(function (response) {

                    response.status;

                    response.statusText;
                    this.user = response.body;

                    if (this.user.logged_in) {
                        window.location.href = '/';
                    }

                }, function (errorResponse) {
                    this.loginError = errorResponse.body.error.msg;
                    hide_spinner();
                });

            },
            register: function (e) {
                e.preventDefault();
                show_spinner();

                var payload = {
                    fullname: this.fullname,
                    username: this.username,
                    email: this.email,
                    mobile: this.mobile,
                    password: this.password,
                    cnf_password: this.cnf_password,
                    sponsor_id: this.sponsor_id,
                    club_id: (this.club != null) ? this.club.club_id : 0,
                };

                this.$http.post(base_url + 'member/register', payload, {
                    headers: {
                        'content-type': 'application/json'
                    },
                }).then(function (response) {

                    response.status;

                    response.statusText;

                    this.user = response.body;

                    if (this.user.logged_in) {
                        window.location.href = '/';
                    }

                }, function (errorResponse) {
                    this.registrationErrors = errorResponse.body.error.msg;
                    hide_spinner();
                });
            },
            get_clubs: function get_clubs(search, loading) {

                loading(true);

                var payload = {terms: search};

                this.$http.get(base_url + 'clubs/get_clubs_by_terms', {params: payload}, {
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(function (response) {
                    response.status;
                    response.statusText;

                    this.clubs = response.body;
                    loading(false);
                }, function (errorResponse) {
                    loading(false);
                    this.clubs = [];
                });
            },
            get_user_bets: function get_user_bets(e, user_id) {
                e.preventDefault();

                this.$http.get(base_url + 'member/bets/' + user_id, {
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(function (response) {

                    response.status;
                    response.statusText;

                    this.userBets = response.body;
                }, function (errorResponse) {
                    this.betListError = errorResponse.body.error.msg.betListError;
                });
            },
            get_user_deposits: function get_user_deposits(e, user_id) {
                this.userDepositListError = '';
                this.userDeposits = [];
                e.preventDefault();

                this.$http.get(base_url + 'member/deposits/' + user_id, {
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(function (response) {

                    response.status;
                    response.statusText;

                    this.userDeposits = response.body;
                    jQ('#userDepositModalAjax').modal('show');

                }, function (errorResponse) {
                    this.userDepositListError = errorResponse.body.error.msg.depositListError;
                    jQ('#userDepositModalAjax').modal('show');
                });
            },
            get_user_withdraws: function get_user_withdraws(e, user_id) {
                this.userWithdrawListError = '';
                this.userWithdraws = [];
                e.preventDefault();

                this.$http.get(base_url + 'member/withdraws/' + user_id, {
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(function (response) {

                    response.status;
                    response.statusText;

                    this.userWithdraws = response.body;
                    jQ('#userWithdrawModalAjax').modal('show');

                }, function (errorResponse) {
                    this.userWithdrawListError = errorResponse.body.error.msg.withdrawListError;
                    jQ('#userWithdrawModalAjax').modal('show');
                });
            },
            get_user_club: function get_user_club(e, user_id) {
                this.userClubError = '';
                this.userClubMembers = [];
                this.userClubSponsorModalLabel = 'My Club Members';
                e.preventDefault();

                this.$http.get(base_url + 'member/club/' + user_id, {
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(function (response) {

                    response.status;
                    response.statusText;

                    this.userClubMembers = response.body;
                    jQ('#userClubModalAjax').modal('show');

                }, function (errorResponse) {
                    this.userClubError = errorResponse.body.error.msg.clubMembersError;
                    jQ('#userClubModalAjax').modal('show');
                });
            },
            get_user_sponsor: function get_user_sponsor(e, user_id) {
                this.userClubError = '';
                this.userClubMembers = [];
                this.userClubSponsorModalLabel = 'My Sponsors';
                this.userClubOrSponsorModal = 'sponsor';
                e.preventDefault();

                this.$http.get(base_url + 'member/sponsor/' + user_id, {
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(function (response) {

                    response.status;
                    response.statusText;

                    this.userClubMembers = response.body;
                    jQ('#userClubModalAjax').modal('show');

                }, function (errorResponse) {
                    this.userClubError = errorResponse.body.error.msg;
                    jQ('#userClubModalAjax').modal('show');
                });
            },
            request_deposit: function request_deposit(e, user_id) {
                show_spinner();

                e.preventDefault();

                this.disabledSubmit = true;
                this.requestDepositErr = [];

                var payload = this.requestDeposit;

                this.$http.post(base_url + 'member/request_deposit/' + user_id, payload, {
                    headers: {
                        'content-type': 'application/json'
                    },
                }).then(function (response) {
                    response.status;
                    response.statusText;

                    this.responseDeposit = response.body;

                    setTimeout(function () {
                        location.reload();
                    }, 2000);

                }, function (errorResponse) {
                    this.requestDepositErr = errorResponse.body.error.msg;
                    this.disabledSubmit = false;
                    hide_spinner();
                });
            },
            request_withdraw: function request_withdraw(e, user_id) {

                show_spinner();

                e.preventDefault();
                this.disabledSubmit = true;
                this.requestWithdrawErr = {};

                var payload = this.requestWithdraw;

                this.$http.post(base_url + 'member/request_withdraw/' + user_id, payload, {
                    headers: {
                        'content-type': 'application/json'
                    },
                }).then(function (response) {

                    response.status;

                    response.statusText;

                    this.responseWithdraw = response.body;
                    this.requestWithdraw = {};

                    setTimeout(function () {
                        location.reload();
                    }, 2000);

                }, function (errorResponse) {
                    this.disabledSubmit = false;
                    this.requestWithdrawErr = errorResponse.body.error.msg;
                    hide_spinner();
                });
            },
            get_trxn_color_class: function get_trxn_color_class(trxn_status) {
                var txn_statuses = {
                    '-1': 'text-danger',
                    '0': 'text-danger',
                    '1': 'text-yellow',
                    '2': 'text-success',
                };
                return txn_statuses[trxn_status];
            },
            transaction_status_text: function transaction_status_text(value) {
                var txn_statuses = {
                    '-1': 'Rejected',
                    '0': 'Cancelled',
                    '1': 'Pending',
                    '2': 'Completed',
                };
                return txn_statuses[value];
            },
            get_bet_status_color_class: function get_bet_status_color_class(bet) {
                return (bet.has_win == 2) ? 'text-info' : (bet.winner_selected == 0) ? 'text-yellow' : (bet.has_won == 1) ? 'text-success' : (bet.has_won == 2) ? 'text-info' : 'text-danger';
            },
            get_bet_status_text: function get_bet_status_text(bet) {
                return (bet.has_win == 2) ? 'Return' : (bet.winner_selected == 0) ? 'Pending' : (bet.has_won == 1) ? 'Won' : (bet.has_won == 2) ? 'Abandoned' : 'Lost';
            },
            get_total_club_commission: function get_total_club_commission(userClubMembers) {
                var total_bet = 0.00, total_club_commission = 0.00;
                userClubMembers.map(function (userClubMember) {
                    total_bet += parseFloat(userClubMember.total_bet);
                    total_club_commission += parseFloat(userClubMember.earned_club_commission);
                }, total_bet, total_club_commission);
                return {"total_bet": total_bet.toFixed(2), "total_club_commission": total_club_commission.toFixed(2)};
            },
            update_password: function update_password(e) {

                show_spinner();

                e.preventDefault();

                var vm = this;

                var payload = this.update_pwd;
                this.responseUpdatePassword = '';
                this.updatePasswordError = '';

                this.$http.post(base_url + 'member/update_password/', payload, {
                    headers: {
                        'content-type': 'application/json'
                    },
                }).then(function (response) {

                    response.status;

                    response.statusText;

                    this.responseUpdatePassword = response.body.msg;
                    this.update_pwd = {};

                    if (response.body.success) {
                        setTimeout(function () {
                            jQ('#change-password-modal').modal('hide');
                            vm.responseUpdatePassword = '';
                            vm.updatePasswordError = '';
                        }, 500);
                    }

                }, function (errorResponse) {
                    this.updatePasswordError = errorResponse.body.error.msg;
                    hide_spinner();
                });
            },
            balance_transfer: function balance_transfer(e) {

                show_spinner();

                e.preventDefault();
                this.disabledSubmit = true;

                var vm = this;

                var payload = this.balance_transfer_frm;
                this.responseBalanceTransfer = '';
                this.balanceTransferError = '';

                this.$http.post(base_url + 'member/balance_transfer/', payload, {
                    headers: {
                        'content-type': 'application/json'
                    },
                }).then(function (response) {

                    response.status;

                    response.statusText;

                    this.responseBalanceTransfer = response.body.msg;
                    this.balance_transfer_frm = {};

                    if (response.body.success) {
                        jQ('#user_balance').text('Balance (' + response.body.new_balance + ')');

                        setTimeout(function () {
                            jQ('#balance-transfer-modal').modal('hide');
                            vm.responseBalanceTransfer = '';
                            vm.balanceTransferError = '';
                        }, 2000);
                    }

                }, function (errorResponse) {
                    this.disabledSubmit = false;
                    this.balanceTransferError = errorResponse.body.error.msg;
                    hide_spinner();
                });
            },

        },
    });

})(jQuery);