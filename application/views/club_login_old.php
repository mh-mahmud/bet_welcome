<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gameon7</title>

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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/club.css">

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
        </nav>


    </div>
</div>


<!-- wrapper container start -->

<div id="wrapper-container">
    <div class="justify-content-center p-0 container-fluid" id="content-container">
        <div id="sportsList" class="container-fluid" style="margin-top: 10px;">
            <div class="row">

                <div class="wrapper fadeInDown">
                  <div id="formContent">
                    <!-- Tabs Titles -->

                    <?php if($this->session->flashdata('msg')) { ?>
                        <div class="col-md-12 alert-success" style="padding: 15px;">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                    <?php } ?>
                    <?php if($this->session->flashdata('error')){ ?>
                        <div class="col-md-12 alert-danger" style="padding: 15px;">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } ?>

                    <!-- Icon -->
                    <div class="fadeIn first">
                      <img style="width:150px" src="<?php echo base_url(); ?>assets/img/user-icon.png" id="icon" alt="User Icon" />
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="">
                      <input type="text" id="login" class="fadeIn second" name="username" placeholder="username" required>
                      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
                      <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
                    </form>

                  </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- wrapper container end -->



<!-- Notice panel -->
<?php include(APPPATH . "views/notice_panel.php"); ?>




<!-- Footer -->
<?php include(APPPATH . "views/footer.php"); ?>
