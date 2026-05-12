    <footer class="page-footer font-small indigo">
        <input type="hidden" id="time_now" value="1583229667000" />
        <!-- Footer Links -->
        <div class="container">

            <!-- Grid row-->
            <div class="row text-center d-flex justify-content-center pt-5 mb-3">
                <!-- Grid column -->
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="javascript:void(0)">Contact-us</a>
                    </h6>
                </div>
        
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="javascript:void(0)">Terms & Conditions</a>
                    </h6>
                </div>
        
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="javascript:void(0)">Rules & Regulations</a>
                    </h6>
                </div>

                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="javascript:void(0)">FAQ</a>
                    </h6>
                </div>

                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="javascript:void(0)">About Us</a>
                    </h6>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row-->
            <hr class="rgba-white-light" style="margin: 0 15%;">


            <!-- Grid row-->
            <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">
                <!-- Grid column -->
                <div class="col-md-8 col-12 mt-5">
                    <p style="line-height: 1.7rem">Caution! We are strongly discourage to use this site who are not 18+ and also site administrator is not liable to any kind of issues created by user.</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row-->
            <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">



        </div>
        <!-- Footer Links -->
        
        <hr class="w-100 clearfix d-md-none">

          <!-- Grid column -->
          <!-- <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
               <a href="https://betwin69.com/apk/betwin69.apk">
                <img src="/betwin/assets/images/app_download.png" alt="Logo" class="responsive" style="width:100%; margin-top:0px;">
               </a> 
          </div> -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">&copy; 2015 - 2020 Copyright:
            <a href="<?= base_url(); ?>">Bet Welcome</a>
        </div>

        <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/js/popper.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="<?= base_url(); ?>assets/js/js.cookie.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/js/index.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/js/moment.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/js/daterangepicker.js"></script>

        <!-- Custom JQuery -->
        <script type="text/javascript" src="<?= base_url(); ?>assets/js/common.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/js/topNavJquery.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/js/sportsListJquery69.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/js/userProfile.js"></script>
        <!-- Custom JQuery -->

    </footer>

    <?php include(APPPATH . "views/appjs_public.php"); ?>
    <?php if( !empty($this->session->userdata['cus_data']) && is_object($this->session->userdata['cus_data']) ) : ?>
        <?php include(APPPATH . "views/appjs.php"); ?>
    <?php elseif( !empty($this->session->userdata['club_user_data']) && is_object($this->session->userdata['club_user_data']) ) : ?>
        <?php include(APPPATH . "views/appjs_club.php"); ?>
    <?php endif; ?>

</body>
</html>