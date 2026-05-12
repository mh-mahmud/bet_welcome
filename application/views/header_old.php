<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameT20</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css?v=10.4.5">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/mdb.css">
    <!--    Theme Specific CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/gameon7.css">

    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/css/favicon.png"/>
    <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="none, noindex, noarchive, nofollow, nosnippet, notranslate, noimageindex" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .error {
            color: red;
            font-size: 13px;
        }
    </style>
</head>

<body class="bg-black">

<!-- NEW -->
<div class="container-fluid bg-black pull-center p-0" id="loginRegister">

    <!-- NEW -->
    <div class="pull-center p-10 container-fluid" id="nav-content-container">

        <nav class="navbar navbar-expand-md navbar-dark">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#topNavbar" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand hm-HeaderModule_Logo" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>/assets/img/logo.png" alt="Logo" class="responsive">
            </a>

            <div class="navbar-collapse collapse bg-black" id="topNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#registrationModal">Join Now</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Sign In</a>
                    </li>

                    <!-- User Menu -->
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url(); ?>">Home</a>
                    </li>
                </ul>
            </div>
        </nav>

        <button id="multi_bet_stack_count" type="button" class="btn btn-primary"> Multibet <span class="badge badge-danger ml-2"></span>
        </button>

        <div class="header-buttons">
            <a data-toggle="modal" data-target="#registrationModal" class="btn register bonus-waiting" href="#">
                <span class="">
                    <strong><i class="fa fa-user-plus" aria-hidden="true"></i> Join now!</strong>
                </span>
            </a>
            <a data-toggle="modal" data-target="#loginModal" class="btn login" href="#"><strong><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</strong></a>
        </div>

        <!-- Registration Modal -->
        <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-dark rounded-0">
                        <h5 class="modal-title text-white" id="registrationModalLabel"><i class="fa fa-user-plus"aria-hidden="true"></i> Join
                            Now</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="signupForm" method="POST" action="register">

                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-name" class="col-form-label">Full Name <span class="text-danger">* </span>:</label>
                                    <input type="text" class="form-control" name="full_name" id="full_name">
                                </div>

                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-username" class="col-form-label">Username <span class="text-danger">* </span>:</label>
                                    <input type="text" name="username" id="username" class="form-control" id="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-email" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                    <small id="emailHelp" class="form-text text-muted">
                                        Email Format: username@example.com
                                    </small>
                                </div>

                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-mobile" class="col-form-label">Mobile Number<span class="text-danger">* </span>:</label>
                                    <input type="text" class="form-control" name="mobile" id="mobile">
                                    <small id="mobileNumberHelp" class="form-text text-muted">
                                        Mobile Number Format: 01(3,5-9)-xxxxxx
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-password" class="col-form-label">Password <span class="text-danger">* </span>:</label>
                                    <input type="password" class="form-control" id="reg_password" name="reg_password" minlength="6">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Password 6-30 characters.
                                    </small>
                                </div>

                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-cnf_password" class="col-form-label">Confirm Password<span class="text-danger">* </span>:</label>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" minlength="6">
                                    <small id="cnfPasswordHelpBlock" class="form-text text-muted">
                                        Must match password.
                                    </small>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-sponsor_id" class="col-form-label">Sponsor's Username:</label>
                                    <input type="text" class="form-control" id="reg_sponsor_id" name="reg_sponsor_id"/>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-club_id" class="col-form-label">Select Club:<span class="text-danger">* </span></label>
                                    <select name="reg_club" id="reg_club" class=" form-control">
                                        <option value="">-- select --</option>
                                        <?php foreach($clubs as $val) : ?>
                                            <option value="<?php echo $val->id; ?>"><?php echo $val->club_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer rounded-0">
                            <button id="btn-register" type="submit"
                                    class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative">Register
                                <div class="loading-spinner login-spinner-wrapper display_none"></div>
                            </button>
                            <!-- <input type="submit" name="submit" value="Register" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative"> -->
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- Registration Modal -->

        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog cascading-modal modal-avatar modal-content" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-dark rounded-0">
                        <img src="<?php echo base_url(); ?>assets/img/user4.png" alt="avatar" class="rounded-circle img-responsive">
                      </div>

                    <form id="login">

                        <div class="modal-body">

                            <div id="login-msg" class="alert alert-danger" role="alert" style="display:none;">
                                
                            </div>

                            <div class="form-group">
                                <label for="user-email" class="col-form-label">Username:</label>
                                <input type="text" name="username" class="form-control" id="user-username" placholder="Username">
                            </div>

                            <div class="form-group">
                                <label for="user-password" class="col-form-label">Password:</label>
                                <input type="password" class="form-control" id="user-password" minlength="6" name="password">
                            </div>

                        </div>

                        <div class="modal-footer rounded-0">
                            <button id="login-btn" type="submit" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative">Sign In
                                <div class="loading-spinner login-spinner-wrapper display_none"></div>
                            </button>
                            &nbsp;&nbsp;<button type="button" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative" data-dismiss="modal">Close</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- Login Modal -->


    </div>
</div>