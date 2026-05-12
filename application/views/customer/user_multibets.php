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
                                <h3>Multibets</h3>

                                <table class="table table-bordered ajax-tbl display" style="width:100%">
                                    <thead>
                                    <tr role="row">
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
                                            <tr>
                                                <td><?= date("D j F Y, g.iA", strtotime($val->created_at)); ?></td>
                                                <td><?= $val->total_stake; ?></td>
                                                <td><?= $val->total_coin; ?></td>
                                                <td><?= $val->possible_win; ?></td>
                                                <td>
                                                    <?php if($val->status=='MATCH_RUNNING') { ?>
                                                        <span class="badge badge-warning">processing</span>
                                                    <?php } else if($val->status=='WIN') { ?>
                                                        <span class="badge badge-success">win</span>
                                                    <?php } else if($val->status=='USER_CANCEL') { ?>
                                                        <span class="badge badge-danger">reject</span>
                                                    <?php } else if($val->status=='ADMIN_CANCEL') { ?>
                                                        <span class="badge badge-danger">cancel</span>
                                                    <?php } else if($val->status=='LOST') { ?>
                                                        <span class="badge badge-danger">lost</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <!-- <a class="btn btn-sm btn-outline-yellow bg-transparent ml-10 plr-15" href="<?php //echo base_url('user_multibet_details/'.$val->id); ?>">view matches</a> -->

                                                    <a
                                                    data-id="<?php echo $val->id; ?>"
                                                    data-target="#multibetModal"
                                                    data-toggle="modal"
                                                    href="javascript:void(0);"
                                                    class="bet-btn btn btn-sm btn-outline-yellow bg-transparent ml-10 plr-15"
                                                    href="<?php echo base_url('user_multibet_details/'.$val->id); ?>">view matches</a>
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
    // $(".bet-btn").on("click", function() {
    $(document).on('click', '.bet-btn', function(e) {
        var id = $(this).data('id');
        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'customeruser/ajax_multibet_details';
        var chk_error;

        // ajax request
        $.ajax({
            type: "POST",
            url: url,
            data: {
                option_detail_ids: id
            },
            dataType: 'json',
            success: function(data) {

                if(data.error==0) {
                    $("#multiBetDetailsContent").html(data.get_data);
                    $("#multibetModal").modal('show');
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
</script>