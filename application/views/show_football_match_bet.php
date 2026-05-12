<?php if(!empty($live)) : ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
            <div class="bg-dark card-header collapseBtn liveBtn">
                <h5 class="mb-0">
                    <button class="btn btn-link text-khet-yellow text-yellow" style="text-decoration: underline;">
                        <img width="40px" src="<?php echo base_url(); ?>assets/images/live2.jpg">
                        <!-- &nbsp;&nbsp;<strong>Live</strong> -->
                    </button>
                    <small class="pull-right text-khet-yellow match-count text-smaller">
                        <strong><?php echo count($live); ?> Matches</strong>
                    </small>
                </h5>
            </div>

            <?php foreach($live as $val) : $match_id = $val->id; ?>
                <div class="collapseBody col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0 collapse show" style="">
                    <div class="card-header bg-white col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
                        <div id="match-title-<?= $match_id; ?>" aria-expanded="false" role="button" class="collapseBtnMatchTitle card-body text-gray row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-5 pb-5 pl-0 pr-0 ml-0 bg-white-grad sport-1">

                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1 m-0 p-0 text-center">

                                <?php if($val->sportscategory_id==6) : ?>
                                    <img src="<?php echo base_url(); ?>assets/images/football.gif" class="img-thumbnail bg-transparent border-0 img_icon">
                                <?php elseif($val->sportscategory_id==2) : ?>
                                    <img src="<?php echo base_url(); ?>assets/images/cricket.gif" class="img-thumbnail bg-transparent border-0 img_icon">
                                <?php else: ?>
                                    <img src="<?php echo base_url(); ?>assets/images/tennis_ball_white.svg" class="img-thumbnail bg-transparent border-0 img_icon">
                                <?php endif; ?>

                            </div>

                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 match-class">
                                <strong class="clearfix">
                                    <?php echo $val->title; ?>
                                </strong>
                                <small class="border-right-solid pr-2"><?php echo $val->league_title; ?></small>
                                <small class="text-green pl-1">
                                    <strong><?php echo date("h:i A", strtotime($val->starting_time)); ?></strong>
                                </small>
                            </div>

                            <?php
                                $get_bet_data = $this->db->query("SELECT * FROM match_option WHERE match_id='{$val->id}' AND status=1 ORDER BY match_option_serial ASC")->result();
                            ?>

                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1 match-time text-center p-0 shots">
                                <small><strong class="text-green"><?php echo count($get_bet_data); ?> Shots</strong></small>
                            </div>
                        </div>

                        <div id="match-data-<?= $match_id; ?>" class="collapse show m-0 p-0 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <?php if(!empty($val->notification)) { ?>
                            <div class="m-0 p-0 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="bg-black-real container m-0 pt-5 pb-10 p-15 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="text-khet-yellow"><b><?php echo $val->notification; ?></b></div>
                                </div>
                            </div>
                            <?php } ?>

                            <?php
                            $i=rand(10, 10000);
                            foreach($get_bet_data as $data) :
                                $options = $this->db->query("SELECT * FROM match_option_details WHERE match_option_id='{$data->id}' ORDER BY option_serial ASC")->result();

                            ?>

                            <div class="bg-white container m-0 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 odd-sport-row">
                                <div class="row">
                                    <div data-match-id="<?php echo $i; ?>" id="question-title-<?php echo $i; ?>" aria-expanded="false" role="button"
                                         class="cream-color capitalize col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 m-0 under-red cursor-pointer collapseBtnAnswers clearfix">
                                        <strong><?php echo $data->match_option_title; ?></strong></div>
                                    <div id="question-data-<?php echo $i; ?>" class="collapse col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 under-red clearfix soft-color">
                                        <ul class="list-inline answer-list">

                                            <?php foreach($options as $op) : ?>
                                            <li id="ans-<?php echo $op->id; ?>" class="list-inline-item cursor-pointer">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0 text-center text-dark mb-5 width_100">
                                                    <?php echo $op->option_title; ?>
                                                </div>
                                                <div onclick='return showBetModal("<?php echo $op->option_coin; ?>", "<?php echo $op->id; ?>");' class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white-custom text-center text-dark fixed-width-120">
                                                    <strong><?php echo $op->option_coin; ?></strong></div>
                                            </li>
                                            <?php endforeach; ?>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <?php $i++; endforeach; ?>

                        </div>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
<?php else: ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
            <div class="bg-dark card-header collapseBtn liveBtn">
                <h5 class="mb-0">
                    <button class="btn btn-link text-khet-yellow text-yellow" style="text-decoration: underline;">
                        <img width="40px" src="<?php echo base_url(); ?>assets/images/live2.jpg">
                        <!-- &nbsp;&nbsp;<strong>Live</strong> -->
                    </button>
                    <small class="pull-right text-khet-yellow match-count text-smaller"><strong>0 Matches</strong></small>
                </h5>
            </div>
            <div class="bg-white col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
                <div class="card-header bg-white col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix border-bottom pt-5 pb-5">
                        <h5 class="mb-0 btn pl-0 match-title text-danger"><strong>No matches available.</strong></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if(!empty($upcoming)) { ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 remove-pl pl-0 mt-5">
            <div style="background-color:#00C851 !important;" class="bg-dark card-header collapseBtn upcomingBtn">
                <h5 class="mb-0">
                    <button class="btn btn-link" style="color:#fff !important">
                        <img style="width:30px" src="<?php echo base_url(); ?>assets/images/upcoming.png">&nbsp;&nbsp;<strong>Upcoming Matches</strong>
                    </button>
                    <small class="pull-right match-count text-smaller" style="color:#fff !important">
                        <strong><?php echo count($upcoming); ?> Matches</strong>
                    </small>
                </h5>
            </div>

            <?php foreach($upcoming as $val) : $match_id = $val->id; ?>
                <div class="collapseBody col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0 collapse show" style="">
                    <div class="card-header bg-white col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
                        <div id="match-title-<?= $match_id; ?>" aria-expanded="false" role="button" class="collapseBtnMatchTitle card-body text-gray row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-5 pb-5 pl-0 pr-0 ml-0 bg-white-grad sport-1">

                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1 m-0 p-0 text-center">

                                <?php if($val->sportscategory_id==6) : ?>
                                    <img src="<?php echo base_url(); ?>assets/images/football.gif" class="img-thumbnail bg-transparent border-0 img_icon">
                                <?php elseif($val->sportscategory_id==2) : ?>
                                    <img src="<?php echo base_url(); ?>assets/images/cricket.gif" class="img-thumbnail bg-transparent border-0 img_icon">
                                <?php else: ?>
                                    <img src="<?php echo base_url(); ?>assets/images/tennis_ball_white.svg" class="img-thumbnail bg-transparent border-0 img_icon">
                                <?php endif; ?>

                            </div>

                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 match-class">
                                <strong class="clearfix">
                                    <?php echo $val->title; ?>
                                </strong>
                                <small class="border-right-solid pr-2"><?php echo $val->league_title; ?></small>
                                <small class="text-green pl-1">
                                    <strong><?php echo date("M-d, Y h:i A", strtotime($val->starting_time)); ?></strong>
                                </small>
                            </div>

                            <?php
                                $get_bet_data = $this->db->query("SELECT * FROM match_option WHERE match_id='{$val->id}' AND status=1 ORDER BY match_option_serial ASC")->result();
                            ?>

                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1 match-time text-center p-0 shots">
                                <small><strong class="text-green"><?php echo count($get_bet_data); ?> Shots</strong></small>
                            </div>
                        </div>

                        <div id="match-data-<?= $match_id; ?>" class="collapse m-0 p-0 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <?php if(!empty($val->notification)) { ?>
                            <div class="m-0 p-0 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="bg-black-real container m-0 pt-5 pb-10 p-15 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="text-khet-yellow"><b><?php echo $val->notification; ?></b></div>
                                </div>
                            </div>
                            <?php } ?>

                            <?php
                            $i=rand(10, 10000);
                            foreach($get_bet_data as $data) :
                                $options = $this->db->query("SELECT * FROM match_option_details WHERE match_option_id='{$data->id}' ORDER BY option_serial ASC")->result();

                            ?>

                            <div class="bg-white container m-0 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 odd-sport-row">
                                <div class="row">
                                    <div data-match-id="<?php echo $i; ?>" id="question-title-<?php echo $i; ?>" aria-expanded="false" role="button"
                                         class="cream-color capitalize col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 m-0 under-red cursor-pointer collapseBtnAnswers clearfix">
                                        <strong><?php echo $data->match_option_title; ?></strong></div>
                                    <div id="question-data-<?php echo $i; ?>" class="collapse col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 under-red clearfix soft-color">
                                        <ul class="list-inline answer-list">

                                            <?php foreach($options as $op) : ?>
                                            <li id="ans-<?php echo $op->id; ?>" class="list-inline-item cursor-pointer">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0 text-center text-dark mb-5 width_100">
                                                    <?php echo $op->option_title; ?>
                                                </div>
                                                <div onclick='return showBetModal("<?php echo $op->option_coin; ?>", "<?php echo $op->id; ?>");' class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white-custom text-center text-dark fixed-width-120">
                                                    <strong><?php echo $op->option_coin; ?></strong></div>
                                            </li>
                                            <?php endforeach; ?>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <?php $i++; endforeach; ?>

                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
            


        </div>
    </div>
<?php } else { ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 remove-pl pl-0 mt-5">
            <div style="background-color:#00C851 !important;" class="bg-dark card-header collapseBtn upcomingBtn">
                <h5 class="mb-0">
                    <button class="btn btn-link" style="color:#fff !important">
                        <img style="width:30px" src="<?php echo base_url(); ?>assets/images/upcoming.png">&nbsp;&nbsp;<strong>Upcoming Matches</strong>
                    </button>
                    <small style="color:#fff !important" class="pull-right match-count text-smaller"><strong>0 Matches</strong></small>
                </h5>
            </div>
            <div class="bg-white col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
                <div class="card-header bg-white col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix border-bottom pt-5 pb-5">
                        <h5 class="mb-0 btn pl-0 match-title text-danger"><strong>No matches available.</strong></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }; ?>