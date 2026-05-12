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
                                <h3>Multibet Details</h3>

                                <table class="table table-bordered ajax-tbl display" style="width:100%">
                                    <thead>
                                    <tr role="row">
                                        <th>Match</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Amount</th>
                                        <th>Return Rate</th>
                                        <th>Return Amount [Won]</th>
                                        <th>Win/Loss</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($get_data as $val) : ?>
                                            <tr>
                                                <td style="width: 400px !important;text-align:justify;">
                                                  <?= $val->title; ?> => <?= $val->league_title; ?> <= <?= date("D j F Y, => g.iA", strtotime($val->ending_time)); ?>
                                                </td>
                                                <td><?= $val->match_option_title; ?></td>
                                                <td><?= $val->option_title; ?></td>
                                                <td><?= $val->bet_coin; ?></td>
                                                <td><?= $val->option_coin; ?></td>
                                                <td><?= $val->total_coin; ?></td>
                                                <td>
                                                    <?php if($val->bet_status=='MATCH_RUNNING') { ?>
                                                        <span class="badge badge-warning">pending</span>
                                                    <?php } else if($val->bet_status=='WIN') { ?>
                                                        <span class="badge badge-success">win</span>
                                                    <?php } else if($val->bet_status=='USER_CANCEL') { ?>
                                                        <span class="badge badge-danger">reject</span>
                                                    <?php } else if($val->bet_status=='CANCEL_ADMIN') { ?>
                                                        <span class="badge badge-danger">cancel</span>
                                                    <?php } else if($val->bet_status=='LOST') { ?>
                                                        <span class="badge badge-danger">lost</span>
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
<script>
    /*$(document).ready(function() {
        $('.ajax-tbl').DataTable( {
            // "ajax": '../ajax/data/arrays.txt'
        });
    } );*/
</script>