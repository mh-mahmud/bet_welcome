<?php include(APPPATH."views/admin/common/header.php"); ?>
<style>
    .table thead tr th {
        font-size: 12px;
    }

    .table td, .table th {
        font-size: 12px;
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

                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="m-heading-1 border-green m-bordered">
                        <h4 style="font-weight:bold;font-size:14px">Bet Lists (<?= $bet_title; ?>)</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">

                                <div class="portlet-title">

                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn sbold red btn-go-back" href="javascript:void(0);">
                                                <i class="fa fa-arrow-left"></i>
                                                Go Back
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover  order-column ajax-tbl">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Username</th>
                                                <th>Date</th>
                                                <th>Answer</th>
                                                <th>Total Bet</th>
                                                <th>Bet Ratio</th>
                                                <th>Total Return</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($match_bit as $val) : ?>
                                                <tr class="odd gradeX">

                                                    <td>
                                                        <?php if($val->bet_status=='MATCH_RUNNING') { ?>
                                                            <a id="btn_<?= $val->id; ?>" onclick="return betReturn(<?= $val->id; ?>);" class="btn btn-info btn-xs" href="javascript:void(0)">Bet Return</a>
                                                        <?php } ?>
                                                    </td>

                                                    <td><?= $val->username; ?></td>
                                                    <td><?= $val->created_at; ?></td>
                                                    <td><?php echo $val->option_title; ?></td>
                                                    <td><?= $val->bet_coin; ?></td>
                                                    <td><?= $val->option_coin; ?></td>
                                                    <td><?= $val->total_coin; ?></td>
                                                    <td id="td_status_<?= $val->id; ?>">
                                                    <?php if($val->bet_status=='MATCH_RUNNING') { ?>
                                                        <span class="badge badge-warning">pending</span>
                                                    <?php } else if($val->bet_status=='WIN') { ?>
                                                        <span class="badge badge-success">win</span>
                                                    <?php } else if($val->bet_status=='LOST') { ?>
                                                        <span class="badge badge-danger">lost</span>
                                                    <?php } else if($val->bet_status=='USER_CANCEL') { ?>
                                                        <span class="badge badge-primary">user cancel</span>
                                                    <?php } else if($val->bet_status=='CANCEL_ADMIN') { ?>
                                                        <span class="badge badge-info">admin cancel</span>
                                                    <?php } else if($val->bet_status=='BET_RETURN') { ?>
                                                        <span class="badge badge-info">Bet Returned</span>
                                                    <?php } ?>
                                                    </td>


                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            

            <!-- BEGIN QUICK SIDEBAR -->
                <!-- deleted all the codes of this section -->
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->

<?php include(APPPATH."views/admin/common/footer.php"); ?>
<script>
    $(document).ready(function() {
        $('.ajax-tbl').DataTable({
            // "scrollX": true,
            ordering: false
        });
    } );
    $('.btn-go-back').click(function() {
        history.go(-1);
        return false;
    });

    function betReturn(bet_id) {
        var bet_id = bet_id;
        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'admin/user_bet_return';
        btnObj = $("#btn_"+bet_id);

        // ajax request
        $.ajax({
            type: "POST",
            url: url,
            data: {
                bet_id: bet_id,
            },
            beforeSend: function() {
                btnObj.text("Wait....");
            },
            dataType: 'json',
            success: function(data) {
                if(data.error == 0) {
                    btnObj.hide();
                    $("#td_status_"+bet_id).html('<span class="badge badge-info">Bet Returned</span>');
                }
                else if(data.error == 1) {
                    btnObj.text("Bet Return");
                }
            },
            error:function(exception){
                console.log(exception);
            }
        });

    }

</script>