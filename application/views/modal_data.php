                    <div class="modal-header bg-dark rounded-0">
                        <h5 id="betRequestModalLabel" class="modal-title text-white">Place Bet</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close text-white">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>


                    <form>
                        <input type="hidden" id="option_details_id" value="<?php echo $get_data->id; ?>">
                        <div class="modal-body">

                            <div class="col-xl-12 col-12-6 col-md-12 col-sm-12 col-xs-12 mb-5 m-0 p-0">
                                <label for="isMultibet" class="col-form-label col-xl-1 col-lg-1 col-md-3 col-sm-4 col-xs-6 m-0 p-0"><strong>Multibet</strong></label>
                                <input id="isMultibet" type="checkbox"></div>
                            <hr>

                                <div id="betErrorBox" role="alert" class="alert alert-danger" style="background-color:#ef5350 !important;color: #fff; width:100%;display:none;"></div>

                                <div id="betSuccessBox" role="alert" class="alert alert-success" style="width:100%;display:none;"></div>

                            <div>&nbsp;</div>
                            <div class="form-row has-danger border-bottom mb-30">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-5 ">
                                    <label class="col-form-label col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 m-0 p-0">
                                        <strong><?php echo $get_data->option_title; ?></strong>
                                    </label>
                                    <label class="col-form-label col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 m-0 p-0">
                                        <small><?php echo $get_data->match_option_title; ?></small>
                                    </label>
                                    <label class="col-form-label col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 m-0 p-0">
                                        <small>
                                            <strong>
                                                <?php echo $get_data->title ?>
                                            </strong>
                                        </small>
                                        

                                        <?php if($get_data->sportscategory_id==6) : ?>
                                            <img src="<?= base_url(); ?>assets/images/football_color.svg" class="img-thumbnail bg-transparent border-0 img_icon">
                                        <?php elseif($get_data->sportscategory_id==2) : ?>
                                            <img src="<?= base_url(); ?>assets/images/cricket_color.svg" class="img-thumbnail bg-transparent border-0 img_icon">
                                        <?php elseif($get_data->sportscategory_id==13) : ?>
                                            <img src="<?= base_url(); ?>assets/images/tennis_ball_white.svg" class="img-thumbnail bg-transparent border-0 img_icon">
                                        <?php endif; ?>

                                        <?php if($get_data->active_status==2) : ?>
                                            <span class="badge rounded-0 badge-danger">Live</span>
                                        <?php elseif($get_data->active_status==3) : ?>
                                            <span class="badge rounded-0 badge-success">UPCOMING</span>
                                        <?php endif; ?>
                                    </label>
                                </div>

                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-12 mt-15 text-right">
                                    <label class="col-form-label col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 m-0 p-0">
                                        <span class="badge badge-dark plr-15">
                                            <strong><?php echo $get_data->option_coin; ?></strong>
                                            <input type="hidden" id="bet_coin" value="<?php echo $get_data->option_coin; ?>">
                                        </span>
                                    </label>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 mt-15 p-0">
                                    <input id="bet_stake" onkeyup="return customBetAmount(<?php echo $get_data->option_coin; ?>);" type="number" name="bet_stake" placeholder="Stake" class="form-control" value="100">
                                </div>
                                
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 border-bottom form-row mt-15 mb-10">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8 text-left">
                                    <strong>Total Stake</strong>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
                                    <span id="total_stake">100</span>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 form-row ">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8 text-left">
                                    <strong>Possible Winning</strong>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
                                    <span id="possible_win"><?php echo 100*$get_data->option_coin; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer rounded-0">
                            <button type="submit" class="place_bid_custom_btn btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark position-relative">
                                <strong>Place Bet</strong>
                                <div class="loading-spinner login-spinner-wrapper display_none"></div>
                            </button>

                            <button style="display:none;" type="button" class="init_multibet_button btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark position-relative" data-dismiss="modal" aria-label="Close"><strong>Add More</strong></button>

                        </div>
                    </form>