<?php include(APPPATH."views/admin/common/header.php"); ?>
<style>
.panel-default>.panel-heading {
    color: #34495e;
    background-color: #E8ECEF;
    border-color: #ddd;
}
.caption {
    font-size:13px !important;
}
.portlet-box {
    background-color:#2C4259 !important;
}
.custom-panel {
    background-color:#4B5765;
    color:#fff;
    cursor:pointer;
    padding:10px;
    border-bottom:1px solid #ddd;
}
.select_match_status {
    margin-bottom:10px;
    color:#4B5765
}
.save-msg {
    background-color:green;
    color:#fff;
    font-size:12px;
    padding: 0px 15px;
    display: none;
}
.save-msg-error {
    background-color:red;
    color:#fff;
    font-size:12px;
    padding: 0px 15px;
    display: none;
}
.save-notification {
    background-color:green;
    color:#fff;
    font-size:12px;
    padding: 0px 15px;
    display: none;
}
.bet-list-btn {
    margin-top:10px;
    font-size: 11px;
    background-color: #4B5765;
    color: #fff;
}
.bet-list-btn:hover {
    color: #fff;
}
.open-close-btn {
    margin-top:10px;
    font-size: 11px;
    background-color: blue;
    color: #fff;
}
.open-close-btn:hover {
    color: #333;
}
</style>


    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <!-- top-nav -->
        <?php include(APPPATH."views/admin/common/top_nav.php"); ?>

        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->


        <!-- BEGIN CONTAINER -->
        <div class="page-container">

            <!-- sidebar link -->
            <?php include(APPPATH."views/admin/common/sidebar.php"); ?>


<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <!-- FLASH MESSAGE -->
        <?php include(APPPATH."views/admin/common/flash.php"); ?>


        <!-- BEGIN PAGE BASE CONTENT -->
            <?php $betIds=[]; $betOpIds=[]; ?>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-sunglo"></i>
                        <span class="caption-subject font-sunglo bold uppercase">Manage Live/Upcoming Matches</span>
                    </div>
                </div>
                <div class="portlet-body form">

                <!-- start row -->
                <div class="row">

                    <div class="col-md-12">
                        <!-- BEGIN ACCORDION PORTLET-->
                        <div class="portlet box yellow">
                            <div class="portlet-title portlet-box">
                                <div class="caption">In Play Matches </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"> </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="panel-group accordion" id="accordion1">

                                    <?php if(!empty($live)) { $i=1; foreach($live as $val) { $ac_status = $val->active_status; ?>
                                    <div id="panel-data-<?php echo $val->id; ?>" class="panel panel-default">

                                        <div class="custom-panel">
                                            <div style="margin-bottom:10px" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_<?= $i; ?>">

                                                <?php if($val->sportscategory_id==6) { ?>
                                                    <img style="width:20px" src="<?php echo base_url(); ?>assets/admin/img/football.gif">
                                                <?php } else if($val->sportscategory_id==2) { ?>
                                                    <img style="width:20px" src="<?php echo base_url(); ?>assets/admin/img/cricket.gif">
                                                <?php } ?>

                                                <?= $val->title; ?> =&gt; <?= $val->league_title; ?> &lt;= <?php echo $val->match_date_var ?> =&gt; <?php echo $val->match_time_var ?>
                                                <span class="match_status_<?php echo $val->id; ?>">
                                                <?php if($ac_status==7) { ?>
                                                    [Inactive]
                                                <?php } else if($ac_status==3) { ?>
                                                    [Active]
                                                <?php } else if($ac_status==2) { ?>
                                                    [Live]
                                                <?php } else if($ac_status==4) { ?>
                                                    [Match Complete]
                                                <?php } else if($ac_status==6) { ?>
                                                    [Disabled]
                                                <?php } else if($ac_status==1) { ?>
                                                    [In Play]
                                                <?php } ?>
                                                </span>

                                            </div>
                                            <select onchange="return updateMatchStatus(<?= $val->id ?>, this.value)" class="select_match_status" name="match_status">
                                                
                                                <option <?php echo $ac_status==2 ? "selected" : ""; ?> value="2">Live</option>
                                                <option <?php echo $ac_status==1 ? "selected" : ""; ?> value="1">In Play</option>
                                                <option <?php echo $ac_status==4 ? "selected" : ""; ?> value="4">Match Complete</option>
                                                <option <?php echo $ac_status==7 ? "selected" : ""; ?> value="7">Inactive</option>
                                                <option <?php echo $ac_status==6 ? "selected" : ""; ?> value="6">Disabled</option>

                                            </select>
                                            <input onfocusout="return updateBetScore(<?= $val->id ?>, this.value)" autocomplete="off" placeholder="score" name="notification" type="text" class="form-control" value="<?= $val->notification; ?>">
                                            <span id="save-notify-<?= $val->id ?>" class="save-notification"></span>
                                        </div>


                                        <div id="collapse_<?= $i; ?>" class="panel-collapse <?= $i==1 ? "in" : "collapse";  ?>">

                                        <?php
                                            $get_bet_data = $this->db->query("SELECT * FROM match_option WHERE match_id='{$val->id}' AND status IN(1,2) ORDER BY match_option_serial ASC")->result();
                                            foreach($get_bet_data as $data) :
                                                $betIds[] = $data->id;

                                                $active_bet = $data->status;
                                                $options = $this->db->query("SELECT * FROM match_option_details WHERE match_option_id='{$data->id}' ORDER BY option_serial ASC")->result();
                                        ?>



                                        <div class="panel panel-default set-win-<?= $data->id; ?>" style="margin:5px;">
                                            <div class="panel-heading" style="padding:5px">

                                                <?php echo $data->match_option_title; ?>

                                                <span class="bet_status_<?= $data->id; ?>">
                                                <?php if($active_bet==1) { ?>
                                                    [Active]
                                                <?php } else if($active_bet==2) { ?>
                                                    [Disabled]
                                                <?php } else if($active_bet==0) { ?>
                                                    [Inctive]
                                                <?php } ?>
                                                </span>

                                                <select onchange="return updateBetStatus(<?= $data->id ?>, this.value)" name="bet_status">
                                                    <option <?= $active_bet==1 ? "selected" : ""; ?> value="1">Active</option>
                                                    <option <?= $active_bet==0 ? "selected" : ""; ?> value="0">Inactive</option>
                                                    <option <?= $active_bet==2 ? "selected" : ""; ?> value="2">Disabled</option>
                                                </select>

                                                <p>
                                                    <?php
                                                        $tot_bet = $this->db->query("SELECT count(id) AS total_bet FROM matchbit_coin WHERE match_bet_option_id='{$data->id}'")->row();
                                                    ?>
                                                    Total Bet: <span class="total-bet-<?php echo $data->id; ?>"><?= $tot_bet->total_bet ?></span>
                                                    <br>
                                                    <a class="btn btn-xs bet-list-btn" href="<?php echo base_url('show_bet_list/'.$data->id) ?>">Bet List</a>
                                                    <a onclick="return showPanel(<?= $data->id; ?>)" class="btn btn-xs btn-default open-close-btn" href="javascript:void(0)">Open</a>
                                                </p>
                                            </div>

                                            <div id="panel-id-<?= $data->id; ?>" class="panel-body" style="display:none;">

                                                <?php
                                                    foreach($options as $op) :
                                                        $id = $op->id; $ratio = $op->option_coin;
                                                        $betOpIds[] = $id; 
                                                ?>

                                                <div class=" row option-data" style="margin-bottom: 10px">
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <?php echo $op->option_title; ?>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <input
                                                        onfocusout="return updateBetRatio(<?= $id ?>, this.value, <?= $data->id; ?>)"
                                                        type="text"
                                                        name=""
                                                        data-id="<?= $id ?>"
                                                        data-span_id="<?= $data->id; ?>"
                                                        class="form-control ratioUpdate"
                                                        value="<?php echo $op->option_coin; ?>">
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-6" style="font-size:10px;font-weight:bold">
                                                        <?php
                                                            $BAD = $this->db->query("SELECT SUM(bet_coin) AS tb, option_coin, bet_coin FROM matchbit_coin WHERE match_bit_id='{$id}'")->row();
                                                        ?>
                                                        <span id="tb-tr-<?= $id ?>">
                                                            TB: <?= !empty($BAD->tb) ? $BAD->tb : 0; ?>
                                                            TR: <?= !empty($BAD->tb) ? $BAD->tb*$BAD->option_coin : 0; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                                <span class="save-msg" id="save-msg-<?= $data->id; ?>"></span>

                                            </div>

                                        </div>

                                        <?php endforeach; ?>


                                        </div>

                                    </div>
                                    <?php $i++; } } ?>

                                </div>
                            </div>
                        </div>
                        <!-- END ACCORDION PORTLET-->
                    </div>

                    <div class="col-md-12">
                        <!-- BEGIN ACCORDION PORTLET-->
                        <div class="portlet box yellow">
                            <div class="portlet-title  portlet-box">
                                <div class="caption">Upcoming Matches</div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"> </a>
                                </div>
                            </div>

                            <!-- start portlet body -->
                            <div class="portlet-body">
                                <div class="panel-group accordion" id="accordion3">

                                    <?php if(!empty($upcoming)) { $j=101; foreach($upcoming as $val) { $ac_status = $val->active_status; ?>
                                    <div class="panel panel-default">

                                        <div class="custom-panel">
                                            <div style="margin-bottom:10px" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_<?= $j; ?>">

                                                <?php if($val->sportscategory_id==6) { ?>
                                                    <img style="width:20px" src="<?php echo base_url(); ?>assets/admin/img/football.gif">
                                                <?php } else if($val->sportscategory_id==2) { ?>
                                                    <img style="width:20px" src="<?php echo base_url(); ?>assets/admin/img/cricket.gif">
                                                <?php } ?>

                                                <?= $val->title; ?> =&gt; <?= $val->league_title; ?> &lt;= <?php echo $val->match_date_var ?> =&gt; <?php echo $val->match_time_var ?>

                                                <span class="match_status_<?php echo $val->id; ?>">
                                                <?php if($ac_status==7) { ?>
                                                    [Inactive]
                                                <?php } else if($ac_status==3) { ?>
                                                    [Active]
                                                <?php } else if($ac_status==2) { ?>
                                                    [Live]
                                                <?php } else if($ac_status==4) { ?>
                                                    [Match Complete]
                                                <?php } else if($ac_status==6) { ?>
                                                    [Disabled]
                                                <?php } ?>
                                                </span>

                                            </div>
                                            <select onchange="return updateMatchStatus(<?= $val->id ?>, this.value)" class="select_match_status" name="match_status">
                                                
                                                <option <?php echo $ac_status==2 ? "selected" : ""; ?> value="3">Active</option>
                                                <option <?php echo $ac_status==2 ? "selected" : ""; ?> value="2">Live</option>
                                                <!-- <option <?php //echo $ac_status==4 ? "selected" : ""; ?> value="4">Match Complete</option> -->
                                                <option <?php echo $ac_status==7 ? "selected" : ""; ?> value="7">Inactive</option>
                                                <option <?php echo $ac_status==6 ? "selected" : ""; ?> value="6">Disabled</option>

                                            </select>
                                            <input onfocusout="return updateBetScore(<?= $val->id ?>, this.value)" autocomplete="off" placeholder="score" name="notification" type="text" class="form-control" value="<?= $val->notification; ?>">
                                            <span id="save-notify-<?= $val->id ?>" class="save-notification"></span>
                                        </div>


                                        <div id="collapse_<?= $j; ?>" class="panel-collapse <?= $j==101 ? "in" : "collapse";  ?>">

                                        <?php
                                            $get_bet_data = $this->db->query("SELECT * FROM match_option WHERE match_id='{$val->id}' ORDER BY match_option_serial ASC")->result();
                                            foreach($get_bet_data as $data) :
                                                $betIds[] = $data->id;

                                                $active_bet = $data->status;
                                                $options = $this->db->query("SELECT * FROM match_option_details WHERE match_option_id='{$data->id}' ORDER BY option_serial ASC")->result();
                                        ?>



                                        <div class="panel panel-default set-win-<?= $data->id; ?>" style="margin:5px;">
                                            <div class="panel-heading" style="padding:5px">

                                                <?php echo $data->match_option_title; ?>

                                                <span class="bet_status_<?= $data->id; ?>">
                                                <?php if($active_bet==1) { ?>
                                                    [Active]
                                                <?php } else if($active_bet==2) { ?>
                                                    [Disabled]
                                                <?php } else if($active_bet==0) { ?>
                                                    [Inctive]
                                                <?php } ?>
                                                </span>

                                                <select onchange="return updateBetStatus(<?= $data->id ?>, this.value)" name="bet_status">
                                                    <option <?= $active_bet==1 ? "selected" : ""; ?> value="1">Active</option>
                                                    <option <?= $active_bet==0 ? "selected" : ""; ?> value="0">Inactive</option>
                                                    <option <?= $active_bet==2 ? "selected" : ""; ?> value="2">Disabled</option>
                                                </select>

                                                <p>
                                                    <?php
                                                        $tot_bet = $this->db->query("SELECT count(id) AS total_bet FROM matchbit_coin WHERE match_bet_option_id='{$data->id}'")->row();
                                                    ?>
                                                    Total Bet: <span class="total-bet-<?php echo $data->id; ?>"><?= $tot_bet->total_bet ?></span>
                                                    <br>
                                                    <a class="btn btn-xs bet-list-btn" href="<?php echo base_url('show_bet_list/'.$data->id) ?>">Bet List</a>
                                                    <a onclick="return showPanel(<?= $data->id; ?>)" class="btn btn-xs btn-default open-close-btn" href="javascript:void(0)">Open</a>
                                                </p>
                                            </div>

                                            <div id="panel-id-<?= $data->id; ?>" class="panel-body" style="display:none;">

                                                <?php
                                                    foreach($options as $op) :
                                                        $id = $op->id; $ratio = $op->option_coin;
                                                        $betOpIds[] = $id; 
                                                ?>

                                                <div class=" row option-data" style="margin-bottom: 10px">
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <?php echo $op->option_title; ?>
                                                    </div>

                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <input
                                                        onfocusout="return updateBetRatio(<?= $id ?>, this.value, <?= $data->id; ?>)"
                                                        type="text"
                                                        name=""
                                                        data-id="<?= $id ?>"
                                                        data-span_id="<?= $data->id; ?>"
                                                        class="form-control ratioUpdate"
                                                        value="<?php echo $op->option_coin; ?>">
                                                    </div>

                                                    <div class="col-md-4 col-sm-4 col-xs-6" style="font-size:10px;font-weight:bold">
                                                        <?php
                                                            $BAD = $this->db->query("SELECT SUM(bet_coin) AS tb, option_coin, bet_coin FROM matchbit_coin WHERE match_bit_id='{$id}'")->row();
                                                        ?>

                                                        <span id="tb-tr-<?= $id ?>">
                                                            TB: <?= !empty($BAD->tb) ? $BAD->tb : 0; ?>
                                                            TR: <?= !empty($BAD->tb) ? $BAD->tb*$BAD->option_coin : 0; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                                <span class="save-msg" id="save-msg-<?= $data->id; ?>"></span>

                                            </div>

                                        </div>

                                        <?php endforeach; ?>


                                        </div>

                                    </div>
                                    <?php $j++; } } ?>

                                </div>
                            </div>
                            <!-- end portlet body -->

                        </div>
                        <!-- END ACCORDION PORTLET-->
                    </div>

                </div>
                <!-- end -->


                </div>
            </div>

        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
            


        </div>
        <!-- END CONTAINER -->

<?php include(APPPATH."views/admin/common/footer.php"); ?>
<script>

    function updateBetRatio(id, coin, span_id) {
        var url_prefix = "<?php echo base_url(); ?>";

        // ajax request
        $.ajax({
            type: "POST",
            url: url_prefix + 'admin/update_bet_ratio',
            data: {
                option_details_id: id,
                option_coin: coin
            },
            dataType: 'json',
            success: function(data) {
                if(data.error==0) {
                    $("span#save-msg-"+span_id).show().text("saving...");
                    setTimeout(function() {
                        $("span#save-msg-"+span_id).hide();
                    }, 500);
                }
                else if(data.error==0) {
                    $("span#save-msg-"+span_id).show().addClass("save-msg-error").text("failed!");
                    setTimeout(function() {
                        $("span#save-msg-"+span_id).removeClass("save-msg-error").hide();
                    }, 500);
                }
            },
            error:function(exception){
                console.log(exception);
            }
        });
    }

    function updateBetScore(id, score) {
        var url_prefix = "<?php echo base_url(); ?>";

        // ajax request
        $.ajax({
            type: "POST",
            url: url_prefix + 'admin/update_bet_score',
            data: {
                match_id: id,
                notification: score
            },
            dataType: 'json',
            success: function(data) {
                if(data.error==0) {
                    console.log("success");
                    $("span#save-notify-"+id).show().text("saving...");
                    setTimeout(function() {
                        $("span#save-notify-"+id).hide();
                    }, 500);
                }
                else if(data.error==0) {
                   console.log("failed!"); 
                }
            },
            error:function(exception){
                console.log(exception);
            }
        });

    }

    function updateMatchStatus(match_id, active_status) {
        var url_prefix = "<?php echo base_url(); ?>";
        var match_id = match_id;
        var active_status = active_status;

        // ajax request
        $.ajax({
            type: "POST",
            url: url_prefix + 'admin/update_match_status',
            data: {
                match_id: match_id,
                active_status: active_status
            },
            dataType: 'json',
            success: function(data) {
                if(data.error==0) {
                    console.log("success");
                    if(active_status==1) {
                        $("span.match_status_"+match_id).text('[In Play]');
                    } else if(active_status==2) {
                        $("span.match_status_"+match_id).text('[Live]');
                    }
                    else if(active_status==3) {
                        $("span.match_status_"+match_id).text('[Active]');
                    }
                    else if(active_status==4) {
                        $("span.match_status_"+match_id).text('[Match Complete]');
                        $("#panel-data-" + match_id).hide();
                    }
                    else if(active_status==6) {
                        $("span.match_status_"+match_id).text('[Disabled ]');
                    }
                    else if(active_status==7) {
                        $("span.match_status_"+match_id).text('[Inactive]');
                    }
                }
                else if(data.error==0) {
                   console.log("failed!"); 
                }
            },
            error:function(exception){
                console.log(exception);
            }
        });
    }

    function updateBetStatus(bet_id, status) {
        console.log(bet_id);
        console.log(status);

        var url_prefix = "<?php echo base_url(); ?>";
        var bet_id = bet_id;
        var status = status;

        // ajax request
        $.ajax({
            type: "POST",
            url: url_prefix + 'admin/update_bet_status',
            data: {
                bet_id: bet_id,
                status: status
            },
            dataType: 'json',
            success: function(data) {
                if(data.error==0) {
                    console.log("success");
                    if(status==1) {
                        $("span.bet_status_"+bet_id).text('[Active]');
                    } else if(status==0) {
                        $("span.bet_status_"+bet_id).text('[Inactive]');
                        $(".set-win-"+bet_id).hide();
                    } else if(status==2) {
                        $("span.bet_status_"+bet_id).text('[Disabled]');
                    }
                }
                else if(data.error==0) {
                   console.log("failed!"); 
                }
            },
            error:function(exception){
                console.log(exception);
            }
        });
    }

    (function() {

        $(".ratioUpdate").on('keyup', function (e) {
            var id = $(this).data('id');
            var coin = $(this).val();
            var span_id = $(this).data('span_id');

            if (e.keyCode === 13) {
                updateBetRatio(id, coin, span_id);
            }
        });
        // ---

        function myRand() {
            var x = Math.random()*100;
            x = parseInt(x);
            $("#tb-tr-59").text(x);
            console.log(x);
        }
        setInterval(function () {totalBetCount()}, 5000);
        setInterval(function () {totalRatioCount()}, 5000);

        function totalBetCount() {
            var betIds = <?php echo json_encode($betIds); ?>;

            var url_prefix = "<?php echo base_url(); ?>";
            var bet_id = betIds;

            // ajax request
            $.ajax({
                type: "POST",
                url: url_prefix + 'admin/update_total_bet_count',
                data: {
                    bet_id: bet_id
                },
                dataType: 'json',
                success: function(data) {
                    if(data.error==0) {
                        $.each(data.success_msg, function(index, item) {
                            $(".total-bet-"+index).text(item);
                        });
                    }
                    else if(data.error==0) {
                       console.log("failed!"); 
                    }
                },
                error:function(exception){
                    console.log(exception);
                }
            });
        }

        function totalRatioCount() {
            var betOpIds = <?php echo json_encode($betOpIds); ?>;

            var url_prefix = "<?php echo base_url(); ?>";
            var bet_option_id = betOpIds;

            // ajax request
            $.ajax({
                type: "POST",
                url: url_prefix + 'admin/update_total_ratio_count',
                data: {
                    bet_option_id: bet_option_id
                },
                dataType: 'json',
                success: function(data) {
                    if(data.error==0) {
                        $.each(data.success_msg, function(index, item) {
                            $("#tb-tr-"+index).text(item);
                        });
                    }
                    else if(data.error==0) {
                       console.log("failed!"); 
                    }
                },
                error:function(exception){
                    console.log(exception);
                }
            });
        }

    })(jQuery);

    function showPanel(id) {
        $(".panel-body").slideUp();
        $("#panel-id-"+id).toggle();
    }

</script>