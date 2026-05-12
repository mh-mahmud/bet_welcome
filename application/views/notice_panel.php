<?php $notices = $this->db->query("SELECT description FROM notice WHERE status=1 ORDER BY id DESC")->result(); ?>
    <div id="news_scroller_wrapper" class="container-fluid p-0">

        <div class="row ml-0 mr-0">
            <div id="news_scroller" class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-10 pl-0 pr-0 mx-auto justify-content-center">
            <span class="col-xl-1 col-lg-2 col-md-3 col-sm-3 col-xs-12 pull-left " id="clock" style="background-color:#FFD400">
                <!--bg-blue-grad-->
                    <p id="date_clock" class="pull-left mb-0"><small><strong></strong></small></p>
                    <p id="time_clock" class="pull-left mb-0 text-white">
                        <span class="text-white" id="span_clock" style="font-weight:bold;font-size:13px">Time</span>
                    </p>
            </span>
            <span class="marquee col-xl-11 col-lg-10 col-md-9 col-sm-9 col-xs-12 p-0 pull-left">
                <!-- <p class="slow mb-0"><small><b style='color:#ff0015'>Dear All users and Club Holders, Please log in our another domin address "www.sports69.net" . Thanks for staying with us.</b></small></p> -->

                <p class="slow mb-0">
                    <small>
                        <b style='color:#00C851'>

                            <?php
                                $arr = [];
                                foreach($notices as $not) {
                                    $arr[] = $not->description;
                                }
                                echo implode(" *** ", $arr);
                            ?>

                        </b>
                    </small>
                </p>



            </span>
            </div>
        </div>

    </div>