<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Bet Welcome</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css">
    <link href="<?= base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
    <!--    Theme Specific CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/betwin69.css">

    <link rel="shortcut icon" type="image/png" href="" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="none, noindex, noarchive, nofollow, nosnippet, notranslate, noimageindex" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .error {
            color: red;
            font-size: 13px;
        }
        .club_balance {
            color: red;
            font-weight: bold;
        }
    </style>
</head>


<body class="bg-black">

<?php
    $club_balance = 0;
    $club_name = "";
    if(!empty($this->session->userdata('club_user_data'))) {
        $xx = $this->session->userdata('club_user_data');
        $club_balance = get_club_balance($xx->id);
        $club_name = $xx->club_name;
    }
?>

    <!-- NEW -->
    <div id="loginRegister" class="row mr-auto justify-content-center">
        <nav class="navbar navbar-expand-md navbar-light col-xl-10 pr-0">

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#topNavbar" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand hm-HeaderModule_Logo" href="<?= base_url(); ?>">
                <img src="<?= base_url(); ?>assets/images/new-logo.png" alt="Logo" class="responsive">
            </a>

            <!-- <a class="nav-link " href="https://betwin69.com/member/profile/37167#v-pills-messages">
                <span class="badge-notification mt-5" data-badge="0">Inbox</span>
            </a> -->
            <div class="navbar-collapse collapse bg-black" id="topNavbar">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item mobile-show">
                        <a  class="nav-link" href="<?php echo base_url('club_profile') ?>">Profile</a>
                    </li>

                    <li class="nav-item mobile-show">
                        <a  class="nav-link" href="javascript:void(0);"  data-toggle="modal" data-target="#change-password-modal">Change Password</a>
                    </li>

                    <li class="nav-item mobile-show">
                        <a id="logout_link_fcm" class="nav-link" href="<?= base_url('logout'); ?>">Logout</a>
                    </li>
                </ul>

                                        

                <!-- User Menu -->
                <ul class="navbar-nav ml-auto mobile-hide">
                    <li class="nav-item dropdown has-mega-menu">
                        <a class="nav-link dropdown-toggle p-0" href="#" role="button" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $club_name; ?>&nbsp;&nbsp;<img src="<?= base_url(); ?>assets/images/user5.png" class="rounded-circle z-depth-0"
                        alt="avatar image" height="40">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown04">
                            <div class="px-0 container container-sm">
                                <div class="row">

                                    <div class="col-sm-6 col-md-x">

                                        <a  class="dropdown-item" href="<?php echo base_url('club_profile') ?>">Profile</a>

                                        <a  class="dropdown-item" href="javascript:void(0);"  data-toggle="modal" data-target="#change-password-modal">Change Password</a>

                                        <a id="user_balance" class="dropdown-item" href="javascript:void(0);">Balance (<span class="user_balance"><?= $club_balance ?></span>)</a>
                                        <div class="dropdown-divider"></div>
                                        <a id="logout_link_fcm" class="dropdown-item" href="<?= base_url('logout'); ?>">Logout</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- User Menu -->
            </div>
                
                
                <a id="multi_bet_stack_count" class="nav-link" href="javascript:void(0);">
                    <span class="badge-notification mt-5" data-badge="">Bet Slip</span>
                </a>
                <!-- <span id="clock" style="color:white;"><p id="date_clock"></p><p id="time_clock"></p></span>-->
        </nav>

        <div class="header-buttons">
            <a data-toggle="modal" data-target="#requestDepositModal" class="btn register bonus-waiting" href="#"><strong> Balance : <span class="user_balance"><?= $club_balance ?></span></strong></a>
            <a  data-toggle="modal" data-target="#requestDepositModal" class="btn login"  href="#"><strong>Deposit</strong></a>
        </div>

            

        <!-- User Club Modal -->
        <div class="modal fade" id="userClubModalAjax" tabindex="-1" role="dialog" aria-labelledby="userClubModalModalLabel" aria-hidden="true" v-cloak>
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-dark rounded-0">
                        <h5 class="modal-title text-white" id="userClubModalModalLabel">{{userClubSponsorModalLabel}}</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="alert alert-danger" role="alert"></div>
                        <div class="table-responsive-md">

                            <table v-if="userClubMembers.length > 0"
                                   class="table table-sm table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SL.</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col" class="text-center">Username</th>
                                        <th scope="col" class="text-center">Join Date</th>
                                        <th scope="col" class="text-center">Last Bet Date</th>
                                        <th scope="col" class="text-center">Commission Earned</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{index + 1}}</td>
                                        <td>{{clubMember.name}}</td>
                                        <td class="text-center">{{clubMember.username}}</td>
                                        <td class="text-center">{{clubMember.club_joinning_at}}</td>
                                        <td class="text-center">{{clubMember.last_bet}}</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Grand Total</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer rounded-0">
                        <button data-dismiss="modal" type="button" class="btn btn-danger btn-lg rounded-0 border-0 pull-right">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- User Club Modal -->


        <!-- Request Withdraw Modal -->
        <div class="modal fade" id="requestWithdrawModal" tabindex="-1" aria-labelledby="requestWithdrawModalLabel" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-yellow rounded-0">
                        <h5 class="modal-title text-dark" id="requestWithdrawModalLabel">
                            <i class="fa fa-credit-card-alt" aria-hidden="true"></i> Request For withdraw
                        </h5>
                        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="withdrawForm" class="bg-dark-gray">
                        <div class="modal-body">
                            <div id="withdrawError" class="alert alert-danger" role="alert" style="display:none;"></div>
                            <div id="withdrawSuccess" class="alert alert-success" role="alert" style="display:none;"></div>

                            <div class="form-row">
                                <div class="col-md-6 mb-5">
                                    <label for="req-withdraw-amount" class="col-form-label text-light-white">
                                        Amount<span class="text-danger">* </span>:
                                    </label>
                                    <input type="number" class="form-control bg-light-gray" id="withdraw-amount" placeholder="Amount" required="required">
                                </div>

                                <div class="col-md-6 mb-5">
                                    <label for="req-withdraw-method" class="col-form-label text-light-white">Method:</label>
                                    <select id="withdraw-method" class="form-control" required>
                                        <option value="">-- select --</option>
                                        <option value="bKash">bKash</option>
                                        <option value="Nagad">Nagad</option>
                                        <option value="Rocket">Rocket</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-5">
                                    <label for="req-withdraw-to" class="col-form-label text-light-white">
                                        To <span class="text-danger">* </span>:
                                    </label>
                                    <input type="text" class="form-control bg-light-gray" id="withdraw-to" placeholder="To" required="required">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-5">
                                    <label for="req-withdraw-user_account_type" class="col-form-label text-light-white">
                                        Type <span class="text-danger">* </span>:
                                    </label>
                                    <select id="withdraw-type" class="form-control" required>
                                        <option value="">-- select --</option>
                                        <option value="Agent">Agent</option>
                                        <option value="Personal">Personal</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer rounded-0">
                            <button id="btn-withdraw" type="submit" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative">
                                Submit
                                <div class="loading-spinner login-spinner-wrapper display_none"></div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Request Withdraw Modal -->


        <!-- Change Password Modal -->
        <div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog cascading-modal modal-avatar modal-content" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-yellow rounded-0">
                        <h5 class="modal-title text-dark" id="changePasswordModalLabel">Change Passwords</h5>
                        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="changePassForm" class="bg-dark-gray" method="POST">
                        <div class="modal-body">
                            <div id="changePassError" class="alert alert-danger" role="alert" style="display:none;"></div>
                            <div id="changePassSucc" class="alert alert-success" role="alert" style="display:none;"></div>

                            <div class="form-group">
                                <label for="user-current-password" class="col-form-label text-light-white">
                                    Current Password:
                                </label>
                                <input type="password" class="form-control bg-light-gray" id="current_password" placholder="Current Password" name="current_password">
                            </div>

                            <div class="form-group">
                                <label for="user-new-password" class="col-form-label text-light-white">
                                    New Password:
                                </label>
                                <input type="password" class="form-control bg-light-gray" id="new_password" name="new_password" placholder="New Password" minlength="6">
                            </div>

                            <div class="form-group">
                                <label for="user-cnf-password" class="col-form-label text-light-white">
                                    Confirm Password:
                                </label>
                                <input type="password" class="form-control bg-light-gray" id="confirm_password" name="confirm_password" placholder="Confirm New Password" minlength="6">
                            </div>

                        </div>

                        <div class="modal-footer rounded-0">
                            <button id="cngPassBtn" type="submit" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative">
                                Save
                                <div class="loading-spinner login-spinner-wrapper display_none"></div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Change Password Modal -->

        <!-- Complain Reply Modal -->
        <div id="requestComplainReply" tabindex="-1" role="dialog" aria-labelledby="replyMessageModalLabel" class="modal fade" aria-hidden="true" style="display: none;">
            <div role="document" class="modal-dialog modal-lg">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-yellow rounded-0">
                        <h5 id="balanceTranferModalLabel" class="modal-title text-dark">Reply Messages</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close text-dark"><span aria-hidden="true">×</span></button>
                    </div>
                    <form action="" method="POST" class="bg-dark-gray">
                        <input id="complain_id" type="hidden" name="complain_id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="reply" class="col-form-label">Reply:</label>
                                <textarea id="reply" name="reply" placholder="Message" required="required" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer rounded-0">
                            <input type="submit" name="submit" value="Send" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative waves-effect waves-light">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


    <!-- Notice panel -->
    <?php include(APPPATH . "views/notice_panel.php"); ?>