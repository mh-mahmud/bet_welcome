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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/club.css">
</head>

    <body class="bg-black">

    <!-- NEW -->
    <div id="loginRegister" class="row mr-auto justify-content-center">
        <nav class="navbar navbar-expand-md navbar-light col-xl-10 pr-0">

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#topNavbar" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand hm-HeaderModule_Logo" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/images/new-logo.png" alt="Logo" class="responsive"></a>

            <div class="navbar-collapse collapse bg-black" id="topNavbar">
                <ul class="navbar-nav mr-auto"></ul>
            </div>
        </nav>
    </div>



    <!-- Notice panel -->
    <?php include(APPPATH . "views/notice_panel.php"); ?>


        <div id="wrapper-container">

            <!-- NEW -->
            <div class="justify-content-center p-0 container-fluid" id="content-container">
                <div id="sportsList" class="container-fluid">

                    <!-- NEW -->
                    <div class="row">
                        
                <div class="wrapper">
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
                      <img style="width:150px;margin-top:20px" src="<?php echo base_url(); ?>assets/images/user4.png" id="icon" alt="User Icon" />
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="">
                      <input type="text" id="login" class="fadeIn second" name="username" placeholder="username" required>
                      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
                      <input style="cursor:pointer;" type="submit" name="submit" class="fadeIn fourth" value="Log In">
                    </form>

                  </div>
                </div>

                    </div>

                </div>
            </div>
        </div>

<!-- footer -->
<?php include(APPPATH . "views/footer.php"); ?>