<?php include(APPPATH . "views/club/common/header.php"); ?>
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

                        <?php include(APPPATH . "views/club/common/menu.php"); ?>

                        <div class="tab-content col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 p-0">

                            <div id="my-bets" style="padding:20px">
                                <h4>Club Member Bet History</h4>

                                <table class="table table-bordered ajax-tbl display" style="width:100%">
                                    <thead>
                                    <tr role="row">
                                        <th>Match Details</th>
                                        <th>Match Bit Coin</th>
                                        <th>Rate</th>
                                        <th>Return Amount</th>
                                        <th>Previous Balance</th>
                                        <th>Current Balance</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($get_data as $val) : ?>
                                            <tr>
                                                <td style="width: 200px !important;text-align:justify;">
                                                  S: <?= $val->name; ?><br>
                                                  L: <?= $val->league_title; ?><br>
                                                  M: <?= $val->title; ?><br>
                                                  Q: <?= $val->match_option_title; ?><br>
                                                  A: <?= $val->option_title; ?>
                                                </td>
                                                <td><?= $val->bet_coin; ?></td>
                                                <td><?= $val->option_coin; ?></td>
                                                <td><?= $val->total_coin; ?></td>
                                                <td>
                                                    <?php echo $val->prev_balance; ?>
                                                </td>
                                                <td>
                                                    <?php echo $val->cur_balance; ?>
                                                </td>
                                                <td><?= $val->created_at; ?></td>
                                                <td><?= str_replace("_", " ", $val->bet_status); ?></td>
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
<script>
    /*$(document).ready(function() {
        $('.ajax-tbl').DataTable( {
            // "ajax": '../ajax/data/arrays.txt'
        });
    } );*/
</script>