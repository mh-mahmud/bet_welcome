<!-- live-matches grid -->
<?php if(!empty($get_data2)) : ?>

    <?php foreach($get_data2 as $val) : $match_id = $val->id; ?>
        <div class="card-header bg-white col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
            <div id="match-title-<?php echo $match_id; ?>" aria-expanded="false" role="button"
                 class="collapseBtnMatchTitle card-body text-white row capitalize col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-5 pb-5 pl-0 pr-0 ml-0 bg-black">
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1 p-0">
                    
                    <?php if($val->sportscategory_id==6) : ?>
                        <img src="<?php echo base_url(); ?>/assets/img/football.gif" class="img-thumbnail bg-transparent border-0 img_icon">
                    <?php elseif($val->sportscategory_id==2) : ?>
                        <img src="<?php echo base_url(); ?>/assets/img/cricket.gif" class="img-thumbnail bg-transparent border-0 img_icon">
                    <?php else: ?>
                        <img src="<?php echo base_url(); ?>/assets/img/cricket.gif" class="img-thumbnail bg-transparent border-0 img_icon">
                    <?php endif; ?>

                </div>
                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-xs-11">
                    <strong><?php echo $val->title; ?> =&gt; <?php echo $val->league_title; ?> &lt;= <?php echo $val->notification; ?>
                    </strong>
                </div>
            </div>
            <div id="match-data-<?php echo $match_id; ?>" class="collapse show m-0 p-0 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <?php
                    $get_bet_data = $this->db->query("SELECT * FROM match_option WHERE match_id='{$val->id}' AND status=1 ORDER BY match_option_serial ASC")->result();

                    $x=rand(10, 10000);
                    $i=$x+$val->id;
                    foreach($get_bet_data as $data) :
                        $options = $this->db->query("SELECT * FROM match_option_details WHERE match_option_id='{$data->id}' ORDER BY option_serial ASC")->result();
                ?>

                    <div class="bg-white container m-0 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 odd-sport-row">
                        <div class="row">
                            <div data-match-id="<?php echo $match_id; ?>" id="question-title-<?php echo $i; ?>" aria-expanded="false" role="button" class="cream-color capitalize col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 m-0 under-red cursor-pointer collapseBtnAnswers clearfix">
                                <strong><?php echo $data->match_option_title; ?>&nbsp;&nbsp;<i
                                            class="live-badge">LIVE</i></strong></div>
                            <div id="question-data-<?php echo $i; ?>"
                                 class="collapse capitalize col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 under-red clearfix soft-color">
                                <ul class="list-inline answer-list">

                                    <?php foreach($options as $op) : ?><li class="list-inline-item cursor-pointer  col-sm-6"><div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0 text-center text-dark mb-5 width_100"><?php echo $op->option_title; ?></div><div onclick='return showBetModal("<?php echo $op->option_coin; ?>", "<?php echo $op->id; ?>");' class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white-custom text-center text-dark fixed-width-120"><strong><?php echo $op->option_coin; ?></strong></div></li><?php endforeach; ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                <?php $i++; endforeach; ?>

            </div>
        </div>
    <?php endforeach; ?>

<?php else: ?>

    <div class="card-header bg-white col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
        <div id="match-title-3777" aria-expanded="false" role="button" class="collapseBtnMatchTitle card-body text-white row capitalize col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-5 pb-5 pl-0 pr-0 ml-0" style="background-color:#CC0000;padding:10px !important">
            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-xs-11">
                <strong>Sorry, no match found</strong>
            </div>
        </div>
        
    </div>

<?php endif; ?>