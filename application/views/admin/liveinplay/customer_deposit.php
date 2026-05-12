<?php include(APPPATH."views/admin/common/header.php"); ?>
<style>
    /*.table .thead-dark th {
        font-size: 14px;
    }*/
    .table {
        font-size: 12px;
    }
</style>

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Customer Deposit</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <!-- <li><a data-toggle="modal" data-target="#scrollmodal" style="font-size: 13px;color:#fff" class="btn btn-success btn-sm">Add New</a></li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">&nbsp;</strong>
                        <?php include(APPPATH."views/admin/common/flash.php"); ?>
                    </div>
                    <div class="card-body">
                       <table id="" class="table table-striped table-bordered table-responsive" style="max-width:1840px">
                        <!-- <table class="table table-striped table-bordered"> -->
                            <thead class="thead-dark">
                            <tr role="row">
                                <th>User Name</th>
                                <th>Club Name</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Rate</th>
                                <th>Coin</th>
                                <th>Method</th>
                                <th>Transaction No.</th>
                                <th>Customer Acc</th>
                                <th>Admin Acc</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <label class="label-succes"></label>
                            <tbody>
                                <?php foreach($get_data as $val) : ?>
                                    <tr>
                                        <td><?php echo $val->name; ?></td>
                                        <td><?php echo $val->club_name; ?></td>
                                        <td><?php echo $val->created_at; ?></td>
                                        <td><?php echo $val->amount; ?></td>
                                        <td><?php echo $val->coin_rate; ?>%</td>
                                        <td><?php echo $val->coin; ?></td>
                                        <td><?php echo $val->payment_method; ?></td>
                                        <td><?php echo $val->transaction_id; ?></td>
                                        <td><?php echo $val->user_phone; ?></td>
                                        <td><?php echo $val->admin_account; ?></td>
                                        <td>
                                            <?php
                                                if($val->status=='PENDING') {echo 'pending';}
                                                else if($val->status=='SUCCESS') {echo 'success';}
                                                else if($val->status=='CANCEL') {echo 'rejected';}
                                            ?>
                                        </td>
                                        <td>
                                            <a class="deposit-status-modal" data-id="<?php echo $val->id; ?>" data-coin="<?php echo $val->coin; ?>" data-toggle="modal" data-target="#scrollmodal6" title="Approve Deposit"><i style="color:green" class="fa fa-check-square-o icon-edit"></i></a>

                                            <a onclick="return confirm('Are you sure to remove this deposit?');" title="Delete Deposit" href="<?= base_url('remove_deposit/'.$val->id); ?>"><i class="fa fa-times icon-delete"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <a data-toggle="modal" data-target="#scrollmodal" style="font-size: 13px;" class="btn btn-success btn-sm">Add New</a> -->

        </div>


        <!-- Modal Start -->


        <!-- approve deposit -->
        <div class="modal fade" id="scrollmodal6" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="content" style="padding-top: 0px">
                            <div class="animated fadeIn">
                                <div class="row">

                                <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Approve Deposit</strong>
                                    </div>
                                    <div class="card-body">
                                        <!-- Credit Card -->
                                        <div id="pay-invoice">
                                            <div class="card-body">

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
                                                        <input type="submit" class="btn btn-lg btn-info btn-block" name="submit" value="Submit">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div> <!-- .card -->

                            </div><!--/.col-->

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <!-- <button type="button" class="btn btn-primary">Confirm</button> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal End -->


    </div><!-- .animated -->
</div>

<?php include(APPPATH."views/admin/common/table_footer.php"); ?>
<script type="text/javascript">

    $(document).on('show.bs.modal', function (e) {
        $('body').css('padding-right', '0px');
    });

    $('.deposit-status-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        var data_coin = $(this).attr('data-coin');
        $('#deposit_id').attr('value', data_id);
        $('#coin').attr('value', data_coin);
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