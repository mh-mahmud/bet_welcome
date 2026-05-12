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

    <link rel="shortcut icon" type="image/png" href="https://betwin69.com/images/betwin69favicon.png" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="none, noindex, noarchive, nofollow, nosnippet, notranslate, noimageindex" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>


<body class="bg-black">

<?php
    $user_balance = 0;
    $username = "";
    if(!empty($this->session->userdata('cus_data'))) {
        $x = $this->session->userdata('cus_data');
        $user_balance = get_user_current_balance($x->id);
        $username = $x->username;
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
                        <a  class="nav-link" href="<?php echo base_url('view_profile') ?>">My Profile</a>
                    </li>
                    <li class="nav-item mobile-show">
                        <a  class="nav-link" href="<?php echo base_url('my_bets'); ?>">My Statement</a>
                    </li>
                    <li class="nav-item mobile-show">
                        <a id="sponsorModal"  class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#userClubModal">My Sponsor</a>
                    </li>
                    <li class="nav-item mobile-show">
                        <a  class="nav-link" href="javascript:void(0);"  data-toggle="modal" data-target="#requestDepositModal">Request Deposit</a>
                    </li>
                    <li class="nav-item mobile-show">
                        <a  class="nav-link" href="javascript:void(0);"  data-toggle="modal" data-target="#requestWithdrawModal">Request Withdraw</a>
                    </li>
                    <li class="nav-item mobile-show">
                        <a  class="nav-link" href="javascript:void(0);"  data-toggle="modal" data-target="#change-password-modal">Change Password</a>
                    </li>
                    <li class="nav-item mobile-show">
                        <a  class="nav-link" href="javascript:void(0);"  data-toggle="modal" data-target="#balance-transfer-modal">Balance Transfer</a>
                    </li>
                    <li class="nav-item mobile-show">
                        <a id="user_balance" class="nav-link" href="javascript:void(0);">Balance (<span class="user_balance"><?= $user_balance ?></span>)</a>
                    </li>

                    <li class="nav-item mobile-show">
                        <a id="logout_link_fcm" class="nav-link" href="<?= base_url('logout'); ?>">Logout</a>
                    </li>
                </ul>


                <!-- User Menu -->
                <ul class="navbar-nav ml-auto mobile-hide">
                    <li class="nav-item dropdown has-mega-menu">
                        <a class="nav-link dropdown-toggle p-0" href="#" role="button" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <?php
                            $notifications = $this->db->query("SELECT COUNT(*) AS count_val FROM complain WHERE user_view=0 AND user_id='{$x->id}' AND reply IS NOT NULL")->row();
                            $notifications = $notifications->count_val;
                        ?>
                        <span style="color:red;font-weight:bold">(<?php echo $notifications; ?>)</span>

                        <?= $username; ?>&nbsp;&nbsp;<img src="<?= base_url(); ?>assets/images/user5.png" class="rounded-circle z-depth-0"
                        alt="avatar image" height="40">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown04">
                            <div class="px-0 container container-sm">
                                <div class="row">

                                    <div class="col-sm-6 col-md-x">
                                        <a  class="dropdown-item" href="<?php echo base_url('view_profile') ?>">My Profile</a>
                                        <a  class="dropdown-item" href="<?php echo base_url('my_bets'); ?>">My Statement</a>

                                        <a id="sponsorModal"  class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#userClubModal">My Sponsor</a>

                                        <a  class="dropdown-item" href="javascript:void(0);"  data-toggle="modal" data-target="#requestDepositModal">Request Deposit</a>
                                        <a  class="dropdown-item" href="javascript:void(0);"  data-toggle="modal" data-target="#requestWithdrawModal">Request Withdraw</a>
                                        <a  class="dropdown-item" href="javascript:void(0);"  data-toggle="modal" data-target="#change-password-modal">Change Password</a>
                                    </div>

                                    <div class="col-sm-6 col-md-x">
                                        <a  class="dropdown-item" href="javascript:void(0);"  data-toggle="modal" data-target="#balance-transfer-modal">Balance Transfer</a>
                                        <a id="user_balance" class="dropdown-item" href="javascript:void(0);">Balance (<span class="user_balance"><?= $user_balance ?></span>)</a>
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
                
                
                <a onclick="return showMultiBetModal();" id="multi_bet_stack_count" class="nav-link" href="javascript:void(0);">
                    <span id="multi_bet_slip" class="badge-notification mt-5" data-badge="0">Bet Slip</span>
                </a>
                <!-- <span id="clock" style="color:white;"><p id="date_clock"></p><p id="time_clock"></p></span>-->
        </nav>

        <div class="header-buttons">
            <a data-toggle="modal" data-target="#requestDepositModal" class="btn register bonus-waiting" href="#"><strong> Balance : <span class="user_balance" style="color:#FFF;"><?= $user_balance ?></span></strong></a>
            <a  data-toggle="modal" data-target="#requestDepositModal" class="btn login"  href="#"><strong>Deposit</strong></a>
        </div>

            

        <!-- User Club Modal -->
        <div class="modal fade" id="userClubModal" tabindex="-1" role="dialog" aria-labelledby="userClubModalModalLabel" aria-hidden="true" v-cloak>
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-dark rounded-0">
                        <h5 class="modal-title text-white" id="userClubModalModalLabel">My Sponsors</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div id="sponsorAlert" class="alert alert-danger" role="alert"></div>
                        <div id="sponsorTable" class="table-responsive-md">

                            <table class="table table-sm table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SL.</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col" class="text-center">Username</th>
                                        <th scope="col" class="text-center">Join Date</th>
                                        <th scope="col" class="text-center">Commission Earned</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <!-- <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                    </tr> -->
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th colspan="4">Grand Total</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </tfoot> -->
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

        <!-- Request Deposit Modal -->
        <div class="modal fade" id="requestDepositModal" tabindex="-1" aria-labelledby="requestDepositModalLabel" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-yellow rounded-0">
                        <h5 class="modal-title text-dark" id="requestDepositModalLabel">Request a Deposit</h5>
                        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="user-deposit">

                        <div class="modal-body">
                            
                            <div class="alert alert-success" role="alert" style="display:none;"></div>

                            <div class="form-row">
                                <div class="col-md-6 mb-5">
                                    <label for="req-deposit-amount" class="col-form-label text-light-white">
                                        Amount To Deposit <span class="text-danger">* </span>:
                                    </label>
                                    <input type="text" class="form-control bg-light-gray" id="deposit-amount" placeholder="Amount" name="amount" required="required">
                                </div>

                                <div class="col-md-6 mb-5">
                                    <label for="req-deposit-method" class="col-form-label text-light-white">Payment Method:</label>
                                    <select onchange="return paymentAccSearch(this.value)" id="payment_method" class="form-control" name="payment_method" required>
                                        <option value="bKash">bKash</option>
                                        <option value="Nagad">Nagad</option>
                                        <option value="Rocket">Rocket</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-5">
                                    <label for="req-deposit-from" class="col-form-label text-light-white">
                                        From (Mobile Number) <span class="text-danger">* </span>:</label>
                                    <input type="text" name="user_phone" class="form-control bg-light-gray" id="user_phone" placeholder="From" required="required">
                                </div>

                                <div class="col-md-6 mb-5">
                                    <?php
                                        $accounts = $this->db->query("SELECT account_name, account_no FROM deposit_account WHERE status=1")->result();
                                        $accounts_2 = $this->db->query("SELECT account_name, account_no FROM deposit_account WHERE account_name='bKash' AND status=1")->result();
                                    ?>
                                    <label for="req-deposit-to" class="col-form-label text-light-white">
                                        To <span class="text-danger">* </span>:
                                    </label>
                                    <select name="admin_account" id="admin_account" class="form-control" required>
                                        <?php foreach($accounts_2 as $acc) : ?>
                                            <option value="<?php echo $acc->account_no ?>"><?php echo $acc->account_no ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-12 mb-5">
                                    <label for="req-deposit-transaction_number" class="col-form-label text-light-white">
                                        Ref Number <span class="text-danger">* </span>:</label>
                                    <input name="transaction_id" type="text" class="form-control bg-light-gray" id="transaction_id" placeholder="Transaction Number" maxlength="15" required>
                                </div>

                            </div>

                        </div>

                        <div class="modal-footer rounded-0">
                            <button id="btn-deposit" type="submit" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative">
                                Submit
                                <div class="loading-spinner login-spinner-wrapper display_none"></div>
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- Request Deposit Modal -->

        <!-- Request Withdraw Modal -->
        <div class="modal fade" id="requestWithdrawModal" tabindex="-1" aria-labelledby="requestWithdrawModalLabel" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-yellow rounded-0">
                        <h5 class="modal-title text-dark" id="requestWithdrawModalLabel">Request a withdraw</h5>
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
            <div class="modal-dialog modal-lg" role="document">
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
                                    Confirm New Password:
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

        <!-- Balance Transfer Modal -->
        <div class="modal fade" id="balance-transfer-modal" tabindex="-1" role="dialog" aria-labelledby="balanceTranferModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-yellow rounded-0">
                        <h5 class="modal-title text-dark" id="balanceTranferModalLabel">Fund Transfer</h5>
                        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="balanceTransForm" class="bg-dark-gray" v-on:submit="balance_transfer">
                        <div class="modal-body">
                            <div id="transError" class="alert alert-danger" role="alert" style="display:none;"></div>
                            <div id="transSuccess" class="alert alert-success" role="alert" style="display:none;"></div>

                            <div class="form-group">
                                <label for="balance-transfer-username" class="col-form-label text-light-white">Username:</label>
                                <input type="text" class="form-control bg-light-gray" id="balance-transfer-username" placholder="To" required="required">
                            </div>
                            <div class="form-group">
                                <label for="balance-transfer-amount" class="col-form-label text-light-white">Amount:</label>
                                <input type="number" class="form-control bg-light-gray" id="balance-transfer-amount" placholder="Amount (must be lower than your current balance)" required="required">
                            </div>
                            <div class="form-group">
                                <label for="balance-transfer-notes" class="col-form-label text-light-white">Notes:</label>
                                <input type="text" class="form-control bg-light-gray" id="balance-transfer-notes" placholder="Notes">
                            </div>
                            <div class="form-group">
                                <label for="trans_password" class="col-form-label text-light-white">Password:</label>
                                <input type="password" class="form-control bg-light-gray" id="trans_password" placholder="Password">
                            </div>
                        </div>

                        <div class="modal-footer rounded-0">
                            <button id="btn-transfer" type="submit" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative">
                                Transfer Amount
                                <div class="loading-spinner login-spinner-wrapper display_none"></div>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- Balance Transfer Modal -->

        <!-- Complain Modal -->
        <div id="requestComplain" tabindex="-1" role="dialog" aria-labelledby="replyMessageModalLabel" class="modal fade" aria-hidden="true" style="display: none;">
            <div role="document" class="modal-dialog modal-lg">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-yellow rounded-0">
                        <h5 id="balanceTranferModalLabel" class="modal-title text-dark">Messages</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close text-dark"><span aria-hidden="true">×</span></button>
                    </div>
                    <form action="" method="POST" class="bg-dark-gray">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="balance-transfer-username" class="col-form-label text-light-white">Complain To:</label>
                                <select id="complain_to" name="complain_to" class="form-control" required>
                                    <option value="CLUB">Club</option>
                                    <option value="ADMIN">Admin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-form-label">Message:</label>
                                <textarea id="description" name="description" placholder="Message" required="required" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer rounded-0">
                            <!-- <button type="submit"
                                    class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative waves-effect waves-light">
                                Send
                                <div class="loading-spinner login-spinner-wrapper display_none"></div>
                            </button> -->

                            <input type="submit" name="submit" value="Send" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative waves-effect waves-light">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- bet modal -->
        <input type="hidden" id="multibet_enabled" value="0">
        <div class="modal fade" id="betRequestModal" tabindex="-1" role="dialog" aria-labelledby="betRequestModalLabel"  aria-hidden="true">
            <div role="document" class="modal-dialog modal-lg">
                <div id="betContent" class="modal-content rounded-0">

                </div>
            </div>
        </div>

        <div class="modal fade" id="multibet-alert" tabindex="-1" role="dialog" aria-labelledby="MultibetAlert" aria-hidden="true">
            <div role="document" class="modal-dialog modal-lg">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-yellow rounded-0">
                        <h5 id="changePasswordModalLabel" class="modal-title text-dark">Multi bet Alert</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close text-dark">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="p-5">You cannot add multiple question from same match in multi bet slip.
                        If you wanna back to single bet system please click <a id="multi_bet_stack_count_alert" href="javascript:void(0);">Bet Slip</a> and
                        un-select multi bet checkbox.</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="multibetModal" tabindex="-1" role="dialog" aria-labelledby="multibetModalLabel"  aria-hidden="true">
            <div role="document" class="modal-dialog modal-lg">
                <div id="multiBetDetailsContent" class="modal-content rounded-0">

                </div>
            </div>
        </div>
        <!-- end bet modal -->

    </div>


    <!-- Notice panel -->
    <?php include(APPPATH . "views/notice_panel.php"); ?>