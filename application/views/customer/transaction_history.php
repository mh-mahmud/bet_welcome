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
                                <h3>Transaction History</h3>

                                <table class="table table-bordered ajax-tbl display" style="width:100%">
                                    <thead>
                                    <tr role="row">
                                        <th>SN.</th>
                                        <th>Date & Time</th>
                                        <th>Description</th>
                                        <th>Debit (Out)</th>
                                        <th>Credit (In)</th>
                                        <th>Balance</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach($get_data as $val) : ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $val->created_at ?></td>
                                                <td>
                                                <?php
                                                    if($val->coin_type=='DEPOSIT') {
                                                        echo 'Deposit Coin';
                                                    }
                                                    else if($val->coin_type=='TRANSFER_GET') {
                                                        echo 'Received Coin';
                                                    }
                                                    else if($val->coin_type=='WITHDRAW') {
                                                        echo 'Withdraw';
                                                    }
                                                    else if($val->coin_type=='BONUS') {
                                                        echo 'Bonus Coin';
                                                    }
                                                    else if($val->coin_type=='BETWIN') {
                                                        echo 'Match Win';
                                                    }
                                                    else if($val->coin_type=='BETLOSS') {
                                                        echo 'Bet Loss';
                                                    }
                                                    else if($val->coin_type=='BETCANCEL') {
                                                        echo 'Bet Return';
                                                    }
                                                    else if($val->coin_type=='TRANSFER_POST') {
                                                        echo 'Send Coin';
                                                    }
                                                ?>
                                                </td>
                                                <td>
                                                <?php
                                                    if($val->method == 'POST') {
                                                        echo $val->coin;
                                                    }
                                                ?>
                                                </td>
                                                <td>
                                                <?php
                                                    if($val->method == 'GET') {
                                                        echo $val->coin;
                                                    }
                                                ?>
                                                </td>
                                                <td><?php echo $val->current_balance; ?></td>
                                            </tr>
                                        <?php $i++; endforeach; ?>
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