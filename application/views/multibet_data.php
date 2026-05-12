

<div class="modal-header bg-dark rounded-0">
    <h5 id="betRequestModalLabel" class="modal-title text-white">Place Bet</h5>
    <button type="button" data-dismiss="modal" aria-label="Close" class="close text-white">
        <span aria-hidden="true">×</span>
    </button>
</div>

<form>
    <input type="hidden" id="readyToSubmitMultiBet" value="0">
    <input type="hidden" id="option_details_id" value="<?php echo $option_string; ?>">
    <div class="modal-body">

        <div class="col-xl-12 col-12-6 col-md-12 col-sm-12 col-xs-12 mb-5 m-0 p-0">
            <label for="isMultibet" class="col-form-label col-xl-1 col-lg-1 col-md-3 col-sm-4 col-xs-6 m-0 p-0">
                <strong>Multibet</strong>
            </label>
            <input id="isNotMultibet" type="checkbox" checked></div>
        <hr>

        <div id="betErrorBox" role="alert" class="alert alert-danger" style="background-color:#ffbb33 !important;color: #fff; width:100%;display:none;"></div>

        <div id="betSuccessBox" role="alert" class="alert alert-success" style="width:100%;display:none;"></div>

        <?php $total_stake = 1; foreach($get_data as $val) : $total_stake = $total_stake*$val->option_coin; ?>
            <div class="form-row has-danger border-bottom">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-5 ">
                    <label class="col-form-label col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 m-0 p-0">
                        <strong><?php echo $val->option_title; ?></strong>
                    </label>
                    <label class="col-form-label col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 m-0 p-0">
                        <small><?php echo $val->match_option_title; ?></small>
                    </label>
                    <label class="col-form-label col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 m-0 p-0">
                        <small>
                            <strong><?php echo $val->title ?></strong>
                        </small>

                        <?php if($val->sportscategory_id==6) : ?>
                            <img src="<?= base_url(); ?>assets/images/football_color.svg" class="img-thumbnail bg-transparent border-0 img_icon">
                        <?php elseif($val->sportscategory_id==2) : ?>
                            <img src="<?= base_url(); ?>assets/images/cricket_color.svg" class="img-thumbnail bg-transparent border-0 img_icon">
                        <?php elseif($val->sportscategory_id==13) : ?>
                            <img src="<?= base_url(); ?>assets/images/tennis_ball_white.svg" class="img-thumbnail bg-transparent border-0 img_icon">
                        <?php endif; ?>

                        <?php if($val->active_status==2) : ?>
                            <span class="badge rounded-0 badge-danger">Live</span>
                        <?php elseif($val->active_status==3) : ?>
                            <span class="badge rounded-0 badge-success">UPCOMING</span>
                        <?php endif; ?>

                    </label>
                </div>

                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-12 mt-15 text-right">
                    <label class="col-form-label col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 m-0 p-0">
                        <span class="badge badge-dark plr-15">
                            <strong><?php echo $val->option_coin; ?></strong>
                        </span>
                    </label>
                </div>

                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-12 mt-15 text-right">
                    <button onclick="return multiBetClose(<?php echo $val->id; ?>)" type="button" aria-label="Close" class="multiBetClose close text-danger">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        <?php endforeach; ?>

        

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 border-bottom form-row mt-15 mb-10">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                <strong>Total Stake</strong>
                <input id="total_stake_box" type="hidden" name="total_stake_box" value="<?php echo round($total_stake, 2); ?>">
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center">
                <label class="col-form-label col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 m-0 p-0">
                    <span class="badge badge-dark plr-15">
                        <strong><?php echo round($total_stake, 2); ?></strong>
                    </span>
                </label>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
                <input id="multibet_stake" type="text" name="multibet_stake" placeholder="Stake" value="100" class="form-control" onkeyup="return customMultiBetAmount(<?php echo round($total_stake, 2); ?>);">
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 form-row ">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8 text-left"><strong>Possible
                Winning</strong></div>
            <div id="possible_win" class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right" style="font-weight:bold">
                <?php echo round($total_stake, 2)*100; ?>
            </div>
        </div>
    </div>
    <div class="modal-footer rounded-0">
        <button type="submit" class="place_multibid_custom_btn btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark position-relative">
            <strong>Place Bet</strong>
            <div class="loading-spinner login-spinner-wrapper display_none"></div>
        </button>
    </div>
</form>
