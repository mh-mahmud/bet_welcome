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
                                <h3>My Deposit</h3>

                                <table class="table table-bordered ajax-tbl display" style="width:100%">
                                    <thead>
                                    <tr role="row">
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Method</th>
                                        <th>Transaction No.</th>
                                        <th>Customer Number</th>
                                        <th>Admin Number</th>
                                        <th>Note</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($get_data as $val) : ?>
                                            <tr>
                                                <td><?php echo $val->created_at; ?></td>
                                                <td><?php echo $val->amount; ?></td>
                                                <td><?php echo $val->payment_method; ?></td>
                                                <td><?php echo $val->transaction_id; ?></td>
                                                <td><?php echo $val->user_phone; ?></td>
                                                <td><?php echo $val->admin_account; ?></td>
                                                <td><?php echo $val->deposit_note; ?></td>
                                                <td>
                                                    <?php if($val->status=='PENDING') { ?>
                                                        <span class="badge badge-warning">pending</span>
                                                    <?php } else if($val->status=='SUCCESS') { ?>
                                                        <span class="badge badge-success">success</span>
                                                    <?php } else if($val->status=='REJECT') { ?>
                                                        <span class="badge badge-danger">reject</span>
                                                    <?php } ?>
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