<?php if( !empty($this->session->userdata['cus_data']) && is_object($this->session->userdata['cus_data']) ) : ?>
    <?php include(APPPATH . "views/customer/common/header.php"); ?>
<?php elseif( !empty($this->session->userdata['club_user_data']) && is_object($this->session->userdata['club_user_data']) ) : ?>
    <?php include(APPPATH . "views/club/common/header.php"); ?>
<?php else: ?>
    <?php include(APPPATH . "views/header.php"); ?>
<?php endif; ?>


        <div id="wrapper-container">

            <!-- NEW -->
            <div class="justify-content-center p-0 container-fluid" id="content-container">
                <div id="sportsList" class="container-fluid">

                    <!-- NEW -->
                    <div class="row">
                        
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 pl-0 pr-10 menu-web">
                            <div id="jquery-accordion-menu" class="jquery-accordion-menu">
                                <ul>
                                    <li id="all-data" class="clicked">
                                        <a href="javascript:void(0);"><img src="<?= base_url(); ?>assets/images/all.svg" />&nbsp;&nbsp;&nbsp;&nbsp;<b>All</b></a>
                                    </li>

                                    <li id="cricket" class="clicked">
                                        <a href="javascript:void(0);"><img style="width:28px" src="<?php echo base_url(); ?>assets/images/cricket.gif" />&nbsp;&nbsp;&nbsp;&nbsp;<b>Cricket</b></a>
                                    </li>
                                    <li id="football" class="clicked">
                                        <a href="javascript:void(0);"><img style="width:28px" src="<?php echo base_url(); ?>assets/images/football.gif" />&nbsp;&nbsp;&nbsp;&nbsp;<b>Football</b></a>
                                    </li>

                                    <li id="tennis" class="clicked">
                                        <a href="javascript:void(0);"><img style="width:32px" src="<?= base_url(); ?>assets/images/tennis.png" />&nbsp;&nbsp;&nbsp;&nbsp;<b>Tennis</b></a>
                                    </li>
                                </ul>
                				
                            </div>
                        </div>

                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">

                            <div id="app">
                            
                                <?php //include(APPPATH . "views/show_all_bet.php"); ?>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

<!-- footer -->
<?php include(APPPATH . "views/footer.php"); ?>