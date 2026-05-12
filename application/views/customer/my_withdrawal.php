<?php include(APPPATH . "views/customer/common/header.php"); ?>
<style>
    .table thead tr th {
        font-size: 12px;
    }

    .table td, .table th {
        font-size: 12px;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<div id="wrapper-container">
    <div class="justify-content-center p-0 container-fluid" id="content-container">
        <div id="userProfile">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 card pl-0 pr-0 rounded-0 clearfix">

                <div class="container">

                    <div class="row">

                        <?php include(APPPATH . "views/customer/common/menu.php"); ?>

                        <div class="tab-content col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 p-0">

                            <div id="my-bets" style="padding:20px">
                                <h3>My Withdrawal</h3>

                                <table class="table table-bordered ajax-tbl display" style="width:100%">
                                    <thead>
                                    <tr role="row">
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Method</th>
                                        <th>Payment Type</th>
                                        <th>Customer Acc No.</th>
                                        <th>From No</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($get_data as $val) : ?>
                                            <tr>
                                                <td><?php echo $val->created_at; ?></td>
                                                <td><?php echo $val->amount; ?></td>
                                                <td><?php echo $val->payment_method; ?></td>
                                                <td><?php echo $val->payment_type; ?></td>
                                                <td><?php echo $val->account_number; ?></td>
                                                <td><?php echo $val->from_no; ?></td>
                                                <td>
                                                    <?php if($val->status=='PENDING') { ?>
                                                        <span class="badge badge-warning">pending</span>
                                                    <?php } else if($val->status=='SUCCESS') { ?>
                                                        <span class="badge badge-success">success</span>
                                                    <?php } else if($val->status=='REJECT') { ?>
                                                        <span class="badge badge-danger">reject</span>
                                                    <?php } else if($val->status=='CANCEL') { ?>
                                                        <span class="badge badge-danger">cancel</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if($val->status=='PENDING') : ?>
                                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to remove this withdraw?');" href="<?php echo base_url('cancel_withdraw/'.$val->id); ?>">Cancel</a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<!-- Footer -->
<?php //include(APPPATH . "views/customer/common/footer.php"); ?>
<?php include(APPPATH . "views/footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.ajax-tbl').DataTable({
            "scrollX": true,
            ordering: false
        });
    } );
</script>