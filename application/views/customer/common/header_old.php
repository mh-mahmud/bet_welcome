<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameT20</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css?v=10.4.5">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/mdb.css">
    <!--    Theme Specific CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/gameon7.css">

    <link rel="shortcut icon" type="image/png" href="https://gameon7.com/images/gameon7/favicon.png"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="none, noindex, noarchive, nofollow, nosnippet, notranslate, noimageindex" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .error {
            color: red;
            font-size: 13px;
        }
        .user_balance {
            color: red;
            font-weight: bold;
        }
    </style>
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
<div class="container-fluid bg-black pull-center p-0" id="loginRegister">

    <!-- NEW -->
    <div class="pull-center p-10 container-fluid" id="nav-content-container">

        <nav class="navbar navbar-expand-md navbar-dark">

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#topNavbar" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand hm-HeaderModule_Logo" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Logo" class="responsive">
            </a>

            <div class="navbar-collapse collapse bg-black" id="topNavbar">
                <ul class="navbar-nav mr-auto">
                    <!-- User Menu -->
                    <li>
                        <a  class="nav-link" href="<?php echo base_url('my_bets'); ?>">My Statement</a>
                    </li>

                    <li>
                        <a id="sponsorModal"  class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#userClubModal">My Sponsor</a>
                    </li>
                        
                    <li>
                        <a class="nav-link" href="javascript:void(0);"  data-toggle="modal" data-target="#requestDepositModal">Request Deposit</a>
                    </li>
                        
                    <li>
                        <a  class="nav-link" href="javascript:void(0);"  data-toggle="modal" data-target="#requestWithdrawModal">Request Withdraw</a>
                    </li>
                        
                    <li>
                        <a class="nav-link" href="javascript:void(0);"  data-toggle="modal" data-target="#balance-transfer-modal">Balance Transfer</a>
                    </li>
                    <!-- User Menu -->
                </ul>
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item avatar  dropdown has-mega-menu">
                        <a class="nav-link dropdown-toggle p-0" href="#" role="button" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $username; ?>&nbsp;&nbsp;
                            <img src="<?php echo base_url(); ?>assets/img/user4.png" class="rounded-circle z-depth-0" alt="avatar image" height="35">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown04">
                            <div class="px-0 container container-sm">
                                <div class="row">
                                    <div class="col-sm-6 col-md-x">
                                    <a  class="dropdown-item" href="<?php echo base_url('view_profile') ?>">Profile</a>
                                    <a  class="dropdown-item" href="<?php echo base_url('my_complain'); ?>">Complain Box</a>
                                    <a id="user_balance" class="dropdown-item" href="javascript:void(0);"  data-toggle="modal" data-target="#requestDepositModal">Balance (<span class="user_balance"><?= $user_balance ?></span>)</a>
                                    <a  class="dropdown-item" href="javascript:void(0);"  data-toggle="modal" data-target="#change-password-modal">Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a  class="dropdown-item" href="<?php echo base_url('logout'); ?>">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
               </ul>
            </div>
        </nav>

        <button id="multi_bet_stack_count" type="button" class="btn btn-primary">
           Multibet <span class="badge badge-danger ml-2"></span>
        </button>
        <div class="header-buttons">
            <a data-toggle="modal" data-target="#requestDepositModal" class="btn register bonus-waiting" href="#">
                <strong><i class="fa fa-university" aria-hidden="true"></i> Balance : <span class="user_balance"><?= $user_balance ?></span></strong>
            </a>
            <a data-toggle="modal" data-target="#requestDepositModal" class="btn login" href="#">
                <strong><i class="fa fa-credit-card" aria-hidden="true"></i> Deposit</strong>
            </a>
        </div>



        <!-- User Club Modal -->
        <!-- <div class="modal fade" id="userClubModalAjax" tabindex="-1" role="dialog" aria-labelledby="userClubModalModalLabel" aria-hidden="true"> -->
        <div class="modal fade" id="userClubModal" tabindex="-1" role="dialog" aria-labelledby="userClubModalModalLabel" aria-hidden="true">
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
                        <h5 class="modal-title text-dark" id="requestDepositModalLabel">
                            <i class="fa fa-credit-card" aria-hidden="true"></i> Request For Deposit
                        </h5>
                        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="user-deposit">

                        <div class="modal-body">
                            <div class="alert alert-danger">Please <a data-toggle="modal" data-target="#depositnumbers" href="#">check the number</a> before deposit. </div>
                            <div id="deposit-msg" class="alert alert-danger" role="alert" style="display:none;"></div>
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


        <div class="modal fade" id="depositnumbers" tabindex="-1" aria-labelledby="depositnumbersLabel" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-yellow rounded-0">
                        <h5 class="modal-title text-dark" id="depositnumbersLabel">
                            <i class="fa fa-credit-card" aria-hidden="true"></i> Deposit Numbers
                        </h5>
                        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="form-row">
                            <div class="table-responsive-md">

                                <table class="table table-sm table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Number</th>
                                            <th class="text-center">Payment Method</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach($accounts as $acc) : ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $acc->account_no; ?></td>
                                                <td class="text-center"><?php echo $acc->account_name; ?></td>
                                            </tr>
                                        <?php $i++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <!-- Request Deposit Modal -->


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
                    <div class="modal-header bg-dark rounded-0">
                        <img src="<?php echo base_url(); ?>assets/img/user4.png" alt="avatar" class="rounded-circle img-responsive">
                      </div>

                    <form id="changePassForm" class="bg-dark-gray" method="POST">
                        <div class="modal-body">
                            <div id="changePassError" class="alert alert-danger" role="alert" style="display:none;"></div>
                            <div id="changePassSucc" class="alert alert-success" role="alert" style="display:none;"></div>

                            <div class="form-group">
                                <label for="user-current-password" class="col-form-label text-light-white">
                                    Your CurrentPassword:
                                </label>
                                <input type="password" class="form-control bg-light-gray" id="current_password" placholder="Current Password" name="current_password">
                            </div>

                            <div class="form-group">
                                <label for="user-new-password" class="col-form-label text-light-white">
                                    Type New Password:
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
                            &nbsp;&nbsp;<button type="button" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative" data-dismiss="modal">Close</button>
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
                        <h5 class="modal-title text-dark" id="balanceTranferModalLabel">
                            <i class="fa fa-exchange" aria-hidden="true"></i> Fund Transfer
                        </h5>
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
                                <input type="text" class="form-control bg-light-gray" id="balance-transfer-notes" placholder="Notes" required>
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

        <!-- <div id="betRequestModal" tabindex="-1" aria-labelledby="betRequestModalLabel" role="dialog" class="modal fade " aria-modal="true"> -->
        <div class="modal fade" id="betRequestModal" tabindex="-1" role="dialog" aria-labelledby="betRequestModalLabel"  aria-hidden="true">
            <div role="document" class="modal-dialog modal-lg cascading-modal">
                <div id="betContent" class="modal-content rounded-0">
                    <!-- append modal data -->
                </div>
            </div>
        </div>

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


    </div>
</div>