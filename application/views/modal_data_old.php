            <div class="modal-c-tabs">
                <ul role="tablist" class="nav nav-tabs md-tabs tabs-2 light-blue darken-3">
                    <li class="nav-item waves-effect waves-light">
                        <a data-toggle="tab" href="#panel7" role="tab" class="nav-link active single_bet_tab">
                        Bet Slip</a></li>
                </ul>

                <div class="tab-content">
                    <div id="panel7" role="tabpanel" class="tab-pane fade in show active">
                        <form>
                            <input type="hidden" id="option_details_id" value="<?php echo $get_data->id; ?>">
                            <div class="modal-body">

                                <div id="betErrorBox" role="alert" class="alert alert-danger" style="background-color:#ef5350 !important;color: #fff; width:100%;display:none;"></div>

                                <div id="betSuccessBox" role="alert" class="alert alert-success" style="width:100%;display:none;"></div>

                                <div id="betQueue" class="form-row has-danger border-bottom mb-30">

                                    <div class="col-sm-12 pull-right text-right d-xs-none">

                                        <h5 onclick="return calcFixAmount(500, <?php echo $get_data->option_coin; ?>);" class="mb-0 p-0 pointer d-inline-block ml-1 waves-effect waves-light quick-stake"><span class="badge badge-secondary bg-dark p-2">500.00</span></h5>

                                        <h5 onclick="return calcFixAmount(1000, <?php echo $get_data->option_coin; ?>);" class="mb-0 p-0 pointer d-inline-block ml-1 waves-effect waves-light quick-stake"><span class="badge badge-secondary bg-dark p-2">1000.00</span></h5>

                                        <h5 onclick="return calcFixAmount(1500, <?php echo $get_data->option_coin; ?>);" class="mb-0 p-0 pointer d-inline-block ml-1 waves-effect waves-light quick-stake"><span class="badge badge-secondary bg-dark p-2">1500.00</span></h5>

                                        <h5 onclick="return calcFixAmount(2000, <?php echo $get_data->option_coin; ?>);" class="mb-0 p-0 pointer d-inline-block ml-1 waves-effect waves-light quick-stake"><span class="badge badge-secondary bg-dark p-2">2000.00</span></h5>

                                        <h5 onclick="return calcFixAmount(3000, <?php echo $get_data->option_coin; ?>);" class="mb-0 p-0 pointer d-inline-block ml-1 waves-effect waves-light quick-stake"><span class="badge badge-secondary bg-dark p-2">3000.00</span></h5>

                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-5 ">
                                        <label class="col-form-label col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 m-0 p-0"><strong><?php echo $get_data->option_title; ?></strong></label>

                                        <label class="col-form-label col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 m-0 p-0"><small><?php echo $get_data->match_option_title; ?></small></label>

                                        <label class="col-form-label col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 m-0 p-0"><small><strong><?php echo $get_data->title ?> =&gt;<?php echo $get_data->league_title ?> &lt;= Mar-18 =&gt;02:45
                                        AM</strong></small>

                                        <?php if($get_data->sportscategory_id==6) : ?>
                                            <img src="<?php echo base_url(); ?>/assets/img/football.gif" class="img-thumbnail bg-transparent border-0 img_icon ">
                                        <?php elseif($get_data->sportscategory_id==2) : ?>
                                            <img src="<?php echo base_url(); ?>/assets/img/mv2.gif" class="img-thumbnail bg-transparent border-0 img_icon ">
                                        <?php endif; ?>

                                        <?php if($get_data->active_status==1) : ?>
                                            <span class="badge rounded-0 badge-danger">Live</span>
                                        <?php elseif($get_data->active_status==2) : ?>
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
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 mt-15 p-0">
                                        <input id="bet_stake" onkeyup="return customBetAmount(<?php echo $get_data->option_coin; ?>);" type="number" name="bet_stake" placeholder="Stake" class="form-control" value="100">
                                    </div>
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-12 mt-15 text-right">
                                        <!-- <button type="button" aria-label="Close" class="close text-danger">
                                            <span aria-hidden="true">x</span>
                                        </button> -->
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 border-bottom form-row mt-15 mb-10">
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8 text-left mb-15">
                                        <strong>Total Stake</strong>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
                                        <span id="total_stake">100.00</span>
                                    </div>
                                </div> <!---->
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
                                <button type="submit" class="place_bid_custom_btn btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark position-relative waves-effect waves-light">Place Bet
                                <div class="loading-spinner login-spinner-wrapper display_none"></div>
                                </button>
                                &nbsp;&nbsp;
                                <button type="button" data-dismiss="modal" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative waves-effect waves-light">Close</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>