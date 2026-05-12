<?php if( !empty($this->session->userdata['cus_data']) && is_object($this->session->userdata['cus_data']) ) : ?>
    <?php include(APPPATH . "views/customer/common/header.php"); ?>
<?php elseif( !empty($this->session->userdata['club_user_data']) && is_object($this->session->userdata['club_user_data']) ) : ?>
    <?php include(APPPATH . "views/club/common/header.php"); ?>
<?php else: ?>
    <?php include(APPPATH . "views/header.php"); ?>
<?php endif; ?>


<!-- wrapper container start -->

<div id="wrapper-container">
    <div class="justify-content-center p-0 container-fluid" id="content-container">
        <div id="sportsList" class="container-fluid" style="margin-top: 10px;">
            <div class="row">

                <!-- in-play grid -->
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 remove-pr">
                        <div class="bg-dark card-header collapseBtn liveBtn">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-khet-yellow waves-effect waves-light"><strong>In Play</strong></button>
                            </h5>
                        </div>
                        <div class="collapseBody show col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
                            <div id="in-play">
                                <?php //include(APPPATH . "views/in_play.php"); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- live-matches grid -->
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 remove-pr">
                        <div class="bg-dark card-header collapseBtn liveBtn">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-khet-yellow waves-effect waves-light"><strong>Live Matches</strong></button>
                            </h5>
                        </div> <!---->
                        <div class="collapseBody show col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
                            <div id="live-matches">
                                <?php //include(APPPATH . "views/live_matches.php"); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- upcoming-matches grid -->
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pl-0">
                        <div class="bg-dark card-header collapseBtn upcomingBtn">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-khet-yellow waves-effect waves-light"><strong>Upcoming Matches</strong></button>
                            </h5>
                        </div>

                        <div class="collapseBody show col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
                            <div id="upcoming-matches">
                                <?php //include(APPPATH . "views/upcoming_matches.php"); ?>
                            </div>
                        </div>
                        <!-- end -->

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
