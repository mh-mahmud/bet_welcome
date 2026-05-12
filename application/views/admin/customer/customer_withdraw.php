<?php include(APPPATH."views/admin/common/header.php"); ?>
<style>
    .table thead tr th {
        font-size: 12px;
    }

    .table td, .table th {
        font-size: 12px;
    }
    table.dataTable thead th, table.dataTable thead td {
        padding: 10px 8px;
        border-bottom: 1px solid #111;
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
                    <div class="m-heading-1 border-green m-bordered">
                        <h3>Customer Withdraw</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">

                                <div class="portlet-title">

                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Search by all</label>
                                                <input type="text" class="form-control" name="search_data">
                                            </div>

                                            <div class="col-md-3">
                                                <label>Start Date</label>
                                                <input placeholder="Start date" type="date" class="form-control" name="start_date">
                                            </div>

                                            <div class="col-md-3">
                                                <label>End date</label>
                                                <input placeholder="End date" type="date" class="form-control" name="end_date">
                                            </div>
                                            <div class="col-md-2">
                                                <label>&nbsp;</label>
                                                <input type="submit" name="submit" class="form-control btn btn-success" value="Submit">
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover  order-column ajax-tbl">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Payment Type</th>
                                                <th>Pay To</th>
                                                <th>Account Type</th>
                                                <th>Sent From</th>
                                                <!-- <th>Current Balance</th> -->
                                                <th>Amount</th>
                                                <th>Request Date</th>
                                                <th>Confirm Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id=data_view>

                                            <?php foreach($withdraw_data as $val) : ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $val->username; ?></td>
                                                    <td><?php echo $val->payment_method; ?></td>
                                                    <td><?php echo $val->account_number; ?></td>
                                                    <td><?php echo $val->payment_type; ?></td>
                                                    <td><?php echo $val->from_no; ?></td>
                                                    <!-- <td><?php //echo get_user_current_balance($val->c_user_id); ?></td> -->
                                                    <td><?php echo $val->amount; ?></td>
                                                    <td><?php echo $val->created_at; ?></td>
                                                    <td>
                                                        <?php
                                                            $date = strtotime($val->updated_at);
                                                            echo ($date != '-62170005700') ? $val->updated_at : "";
                                                        ?>
                                                    </td>
                                                    <td>

                                                        <?php if($val->status=='PENDING') { ?>
                                                            <span class="badge badge-warning">pending</span>
                                                        <?php } else if($val->status=='SUCCESS') { ?>
                                                            <span class="badge badge-success">success</span>
                                                        <?php } else if($val->status=='REJECT') { ?>
                                                            <span class="badge badge-danger">reject</span>
                                                        <?php } else if($val->status=='CANCEL') { ?>
                                                            <span class="badge badge-danger">User Cancel</span>
                                                        <?php } ?>

                                                    </td>
                                                    <td style="width:150px !important">
                                                        <?php if($val->status=='PENDING') : ?>
                                                            <a class="btn btn-success btn-xs withdraw-status-modal" data-id="<?php echo $val->id; ?>" data-toggle="modal" data-target="#approveWithdrawModal" title="Approve Withdraw">
                                                                Confirm
                                                            </a>

                                                            <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to reject this withdraw?');" href="<?= base_url('reject_withdraw/'.$val->id); ?>">
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

        <div id="approveWithdrawModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Approve Withdraw</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                            <form action="<?php echo base_url('approve_withdraw'); ?>" method="POST">
                                <input id="withdraw_id" type="hidden" name="withdraw_id">
                                <!-- <div class="form-group">
                                    <label for="match_status" class="control-label mb-1">Select status</label>
                                    <select required name="status" class="form-control deposit-status">
                                        <option value="">--- select ---</option>
                                        <option value="SUCCESS">Success</option>
                                        <option value="CANCEL">Cancel</option>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label for="status" class="control-label mb-1">Sent From</label>
                                    <input type="text" name="from_no" class="form-control" required>
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
            ordering: false,
            "pageLength": 25
        });
    } );

    // showWithdrawData();
    function showWithdrawData() {
        $.ajax({
            type: 'POST',
            cache: false,
            url: "<?php echo base_url('show_withdraw_data'); ?>"
        }).done(function (response) {
            $("#data_view").html(response);
        });
    }
    // setInterval(function () {showWithdrawData()}, 5000);

    $('.withdraw-status-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        $('#withdraw_id').attr('value', data_id);
    });
</script>