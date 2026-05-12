<?php include(APPPATH."views/admin/common/header.php"); ?>


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
                    <div class="m-heading-1 border-green m-bordered">
                        <h3>Multibets Data</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <!-- <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase"> Managed Table</span>
                                    </div> -->
                                    <div class="actions">
                                        <div class="btn-group">
                                            <button
                                            data-toggle="modal"
                                            data-target="#depositAccountModal"
                                            id="sample_editable_1_new"
                                            class="btn sbold green"> Add New
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                   
                                    <table class="table table-striped table-bordered table-hover  order-column ajax-tbl">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Club Name</th>
                                                <th>Created at</th>
                                                <th>Total Stake</th>
                                                <th>Total Coin</th>
                                                <th>Possible Win</th>
                                                <th>Result</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_data as $val) : ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $val->username; ?></td>
                                                    <td><?= $val->club_name; ?></td>
                                                    <td><?= date("D j F Y, g.iA", strtotime($val->created_at)); ?></td>
                                                    <td><?= $val->total_stake; ?></td>
                                                    <td><?= $val->total_coin; ?></td>
                                                    <td><?= $val->possible_win; ?></td>
                                                    <td>
                                                        <?php if($val->status=='MATCH_RUNNING') { ?>
                                                            <span class="badge badge-warning">processing</span>
                                                        <?php } else if($val->status=='WIN') { ?>
                                                            <span class="badge badge-success">Win</span>
                                                        <?php } else if($val->status=='USER_CANCEL') { ?>
                                                            <span class="badge badge-danger">Reject</span>
                                                        <?php } else if($val->status=='ADMIN_CANCEL') { ?>
                                                            <span class="badge badge-danger">Admin Cancel</span>
                                                        <?php } else if($val->status=='LOST') { ?>
                                                            <span class="badge badge-danger">Lost</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a
                                                        class="status-modal btn btn-success btn-xs"
                                                        data-id="<?php echo $val->id; ?>"
                                                        data-toggle="modal"
                                                        data-target="#updateStatusModal"
                                                        title="Set Result">
                                                            Result
                                                        </a>

                                                        <a
                                                        data-id="<?php echo $val->id; ?>"
                                                        data-user_id="<?php echo $val->user_id; ?>"
                                                        data-target="#multibetModal"
                                                        data-toggle="modal"
                                                        href="javascript:void(0);"
                                                        class="bet-btn btn btn-xs btn-info bg-transparent ml-10 plr-15"
                                                        href="<?php echo base_url('user_multibet_details/'.$val->id); ?>">Bet List</a>
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

        </div>
        <!-- END CONTAINER -->

        <div id="updateStatusModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Multibet Result</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url('admin/set_multibet_result'); ?>" method="POST">

                                    <input id="multibet_id" type="hidden" name="multibet_id">

                                    <div class="form-group">
                                        <label for="match_status" class="control-label mb-1">Select Multibet Status</label>
                                        <select id="acc_status" name="status" class="form-control" required>
                                            <option value="">-- select --</option>
                                            <option value="LOST">LOST</option>
                                            <option value="WIN">WIN</option>
                                            <option value="ADMIN_CANCEL">ADMIN CANCEL</option>
                                        </select>
                                    </div>

                                    <div>
                                        <input type="submit" class="btn btn-sm btn-info btn-block" name="submit" value="Submit">
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="multibetModal" class="modal fade" tabindex="-1" data-width="800">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Multibet Details</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="multiBetDetailsContent2">
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="modal fade" id="multibetModal2" tabindex="-1" role="dialog" aria-labelledby="multibetModalLabel"  aria-hidden="true">
            <div role="document" class="modal-dialog modal-lg">
                <div id="multiBetDetailsContent2" class="modal-content rounded-0">

                </div>
            </div>
        </div> -->

<?php include(APPPATH."views/admin/common/footer.php"); ?>
<script>
    $(document).ready(function() {
        $('.ajax-tbl').DataTable({
            // "scrollX": true,
            ordering: false
        });
    } );

    $(document).on('click', '.bet-btn', function(e) {
        var id = $(this).data('id');
        var user_id = $(this).data('user_id');
        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'admin/ajax_multibet_details';
        var chk_error;

        // ajax request
        $.ajax({
            type: "POST",
            url: url,
            data: {
                option_detail_ids: id,
                user_id: user_id,
            },
            dataType: 'json',
            success: function(data) {
                // console.log(data.get_data);return;
                if(data.error==0) {
                    $("#multiBetDetailsContent2").html(data.get_data);
                    $("#multibetModal2").modal('show');
                }
                else if(data.error == 2) {

                }

            },
            error:function(exception){
                console.log(exception);
            }
        });
        // return chk_error;

    });

    $(".status-modal").on("click", function() {
        var bet_id = $(this).data('id');
        $("#multibet_id").attr("value", bet_id);
    });

</script>