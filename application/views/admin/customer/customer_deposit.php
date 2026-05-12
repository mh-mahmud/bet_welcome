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

                    <!-- FLASH MESSAGE -->
                    <?php include(APPPATH."views/admin/common/flash.php"); ?>

                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="m-heading-1 border-green m-bordered">
                        <h3>Customer Deposit</h3>
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
                                    <table class="table table-striped table-bordered table-hover  order-column ajax-tbl" style="font-size:10px !important">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Userid</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Amount</th>
                                                <th>Trxn #</th>
                                                <th>Method</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id=data_view>
                                            <?php foreach($get_data as $val) : ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $val->created_at; ?></td>
                                                    <td><?php echo $val->username; ?></td>
                                                    <td><?php echo $val->user_phone; ?></td>
                                                    <td><?php echo $val->admin_account; ?></td>
                                                    <td><?php echo $val->amount; ?></td>
                                                    <td><?php echo $val->transaction_id; ?></td>
                                                    <td><?php echo $val->payment_method; ?></td>
                                                    <td>
                                                        <?php if($val->status=='PENDING') { ?>
                                                            <span class="badge badge-warning">pending</span>
                                                        <?php } else if($val->status=='SUCCESS') { ?>
                                                            <span class="badge badge-success">success</span>
                                                        <?php } else if($val->status=='REJECT') { ?>
                                                            <span class="badge badge-danger">reject</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if($val->status=='PENDING') : ?>
                                                            <a class=" btn btn-primary btn-xs" onclick="return confirm('Are you sure to confirm this deposit?');" href="<?= base_url('confirm_deposit/'.$val->id); ?>">
                                                                Confirm
                                                            </a>

                                                            <a class="deposit-reject-modal btn btn-danger btn-xs" data-id="<?php echo $val->id; ?>" data-coin="<?php echo $val->amount; ?>" data-toggle="modal" data-target="#rejectDepositModal">
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

        <div id="approveDepositModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Approve Deposit</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                            <form action="<?php echo base_url('approve_deposit'); ?>" method="POST">

                                <input id="deposit_id" type="hidden" name="deposit_id">
                                <div class="form-group">
                                    <label for="status" class="control-label mb-1">Select status</label>
                                    <select required name="status" class="form-control deposit-status">
                                        <option value="">--- select ---</option>
                                        <option value="PENDING">Pending</option>
                                        <option value="SUCCESS">Success</option>
                                        <option value="CANCEL">Cancel</option>
                                    </select>
                                </div>
                                <div id="send-coin" class="form-group" style="display:none;">
                                    <label for="status" class="control-label mb-1">Send Coin</label>
                                    <input id="coin" type="text" name="coin" class="form-control">
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

        <div id="rejectDepositModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Reject Deposit</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                            <form action="<?php echo base_url('remove_deposit'); ?>" method="POST">

                                <input id="deposit_reject_id" type="hidden" name="deposit_reject_id">
                                <div class="form-group">
                                    <label for="status" class="control-label mb-1">Note</label>
                                    <textarea name="note" class="form-control" rows="4"></textarea>
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


    // showDepositData();
    function showDepositData() {
        $.ajax({
            type: 'POST',
            cache: false,
            url: "<?php echo base_url('show_deposit_data'); ?>"
        }).done(function (response) {
            $("#data_view").html(response);
        });
    }
    // setInterval(function () {showDepositData()}, 5000);

    $('.deposit-status-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        var data_coin = $(this).attr('data-coin');
        $('#deposit_id').attr('value', data_id);
        $('#coin').attr('value', data_coin);
    });

    $('.deposit-reject-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        var data_coin = $(this).attr('data-coin');
        $('#deposit_reject_id').attr('value', data_id);
        console.log(data_id);
    });

    $(".deposit-status").on("change", function() {
        var sel_val = $(this).val();
        if(sel_val == 'SUCCESS') {
            $("#send-coin").show();
        }
        else {
           $("#send-coin").hide(); 
        }
    });

</script>