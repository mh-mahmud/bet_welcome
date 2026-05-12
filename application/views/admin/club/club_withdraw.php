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
                        <h3>Club Withdraw</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <!-- <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div> -->
                                    <table class="table table-striped table-bordered table-hover  order-column ajax-tbl">
                                        <thead>
                                            <tr>
                                                <th>Club Name</th>
                                                <th>Date/Time</th>
                                                <th>Account Number</th>
                                                <th>Amount</th>
                                                <th>Method</th>
                                                <th>Type</th>
                                                <th>From No</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($withdraw_data as $val) : ?>
                                                <tr class="odd gradeX">

                                                    <td><?= $val->club_name; ?></td>
                                                    <td><?=$val->created_at?></td>
                                                    <td><?= $val->account_number; ?></td>
                                                    <td><?= $val->amount; ?></td>
                                                    <td><?= $val->payment_method; ?></td>
                                                    <td><?= $val->payment_type; ?></td>
                                                    <td><?= $val->from_no; ?></td>
                                                    <td>
                                                        <?php
                                                            if($val->status=='PENDING') {echo '<span class="badge badge-warning">pending</span>';}
                                                            else if($val->status=='SUCCESS') {echo '<span class="badge badge-success">success</span>';}
                                                            else if($val->status=='CANCEL') {echo '<span class="badge badge-danger">rejected</span>';}
                                                        ?>
                                                    </td>
                                                    <td>

                                                        <?php if($val->status=='PENDING') : ?>
                                                            <a class="withdraw-status-modal btn btn-xs btn-success" data-id="<?php echo $val->id; ?>" data-toggle="modal" data-target="#approveWithdraw" title="Approve Withdraw">
                                                                Confirm
                                                            </a>

                                                            <a style="margin-top:10px" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to remove this withdraw?');" href="<?= base_url('admin/reject_club_withdraw/'.$val->id); ?>">
                                                                Reject
                                                            </a>
                                                        <?php endif; ?>

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

        <div id="approveWithdraw" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Approve Club Withdraw</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url('approve_club_withdraw'); ?>" method="POST">
                                    <input id="withdraw_id" type="hidden" name="withdraw_id">
                                    <!-- <div class="form-group">
                                        <label for="match_status" class="control-label mb-1">Select status</label>
                                        <select required name="status" class="form-control deposit-status">
                                            <option value="">--- select ---</option>
                                            <option value="PENDING">Pending</option>
                                            <option value="SUCCESS">Success</option>
                                            <option value="CANCEL">Cancel</option>
                                        </select>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="status" class="control-label mb-1">From No</label>
                                        <input type="text" name="from_no" class="form-control">
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

<?php include(APPPATH."views/admin/common/footer.php"); ?>
<script>
    $(document).ready(function() {
        $('.ajax-tbl').DataTable({
            // "scrollX": true,
            ordering: false
        });
    } );

    $('.withdraw-status-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        $('#withdraw_id').attr('value', data_id);
    });
</script>