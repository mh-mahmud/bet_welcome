    <?php include(APPPATH."views/admin/common/header.php"); ?>
<style>
    .table .thead-dark th {
        font-size: 14px;
    }
</style>

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo $match_name; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a style="font-size: 13px;color:#fff" class="btn btn-danger btn-sm btn-go-back">Go Back</a></li>
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

            <?php include(APPPATH."views/admin/common/flash.php"); ?>

            <div class="col-md-12">
                <?php foreach($matches as $val) :
                        $option_data = $this->db->query("SELECT * FROM match_option_details WHERE match_option_id='{$val->id}'")->result();
                        /*echo "<pre>";
                        print_r($option_data);*/
                ?>
                    <div class="card">
                        <div class="card-body">
                           <table id="" class="table table-striped table-bordered" style="max-width:1840px;width: 990px">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Match Bet Name</th>
                                        <th>Serial</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <label class="label-succes"></label>
                                <tbody>
                                    <tr>
                                        <td><?php echo $val->match_option_title; ?></td>
                                        <td><?php echo $val->match_option_serial; ?></td>
                                        <td>
                                            <?php
                                                if($val->status == 1) {
                                                    echo '<span class="badge badge-success">Active</span>';
                                                }
                                                else if($val->status == 0) {
                                                    echo '<span class="badge badge-danger">Inactive</span>';
                                                }
                                                else if($val->status == 3) {
                                                    echo '<span class="badge badge-primary">Result Published</span>';
                                                }
                                                else if($val->status == 4) {
                                                    echo '<span class="badge badge-warning">Bet Cancelled</span>';
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $val->created_at; ?></td>
                                        <td>
                                            <a class="bet-edit-modal"
                                            data-bettitle="<?php echo $val->match_option_title; ?>"
                                            data-id="<?php echo $val->id; ?>"
                                            data-match_option_serial="<?php echo $val->match_option_serial; ?>"
                                            data-toggle="modal"
                                            data-target="#scrollmodal2"
                                            title="Edit"><i class="fa fa-edit icon-edit"></i></a>

                                            <?php if($val->status == 0) : ?>
                                                <a class="bet-result-modal"
                                                data-bettitle="<?php echo $val->match_option_title; ?>"
                                                data-id="<?php echo $val->id; ?>"
                                                data-match_option_serial="<?php echo $val->match_option_serial; ?>"
                                                data-toggle="modal"
                                                data-target="#scrollmodal5"
                                                title="Result"><i class="fa fa-list icon-edit"></i></a>
                                            <?php endif; ?>

                                            <?php if($val->status == 3) : ?>
                                                <a class="bet-rollback-modal"
                                                data-bettitle="<?php echo $val->match_option_title; ?>"
                                                data-id="<?php echo $val->id; ?>"
                                                data-match_option_serial="<?php echo $val->match_option_serial; ?>"
                                                data-toggle="modal"
                                                data-target="#scrollmodal6"
                                                title="Rollback"><i class="fa fa-flag icon-edit"></i></a>
                                            <?php endif; ?>

                                            <?php if($val->status == 1) : ?>
                                                <a title="Inactive" href="<?php echo base_url('admin/option_inactive/'.$val->id) ?>"><i style="color:green" class="fa fa-check icon-edit"></i></a>
                                            <?php elseif($val->status == 0) : ?>
                                                <a title="Active" href="<?php echo base_url('admin/option_active/'.$val->id) ?>"><i style="color:red" class="fa fa-times icon-edit"></i></a>
                                            <?php endif; ?>

                                            <?php if($val->status == 0) : ?>
                                                <a title="Bet Cancelled" href="<?php echo base_url('admin/bet_match_cancel/'.$val->id) ?>"><i style="color:green" class="fa fa-money icon-edit"></i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered">
                                <tr>
                                    <th>Option Name</th>
                                    <th>Coin</th>
                                    <th>Serial</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($option_data as $op) : ?>
                                    <tr>
                                        <td><?php echo $op->option_title; ?></td>
                                        <td><?php echo $op->option_coin; ?></td>
                                        <td><?php echo $op->option_serial; ?></td>
                                        <td>
                                            <?php
                                                if($op->status == 2) {
                                                    echo '<span class="badge badge-success">Win</span>';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a class="coin-modal" data-value="<?php echo $op->option_coin; ?>" data-id="<?php echo $op->id; ?>" data-toggle="modal" data-target="#scrollmodal3" title="Update Coin"><i class="fa fa-dollar icon-edit" style="color:red"></i></a>

                                            <a
                                            class="option-modal"
                                            data-title="<?php echo $op->option_title; ?>"
                                            data-id="<?php echo $op->id; ?>"
                                            data-option_serial="<?php echo $op->option_serial; ?>"
                                            data-toggle="modal"
                                            data-target="#scrollmodal4"
                                            title="Edit Option"><i class="fa fa-edit icon-edit" style="color:green"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>

                <?php endforeach; ?>


            </div>

        </div>


        <!-- Modal Start -->

        <!-- edit bet option -->
        <div class="modal fade" id="scrollmodal2" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
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
                                        <strong class="card-title">Match Bet Name</strong>
                                    </div>
                                    <div class="card-body">
                                        <!-- Credit Card -->
                                        <div id="pay-invoice">
                                            <div class="card-body">

                                                <form action="<?php echo base_url('admin/edit_match_bet_name'); ?>" method="post">
                                                    <input id="hidden_match_bet_id" type="hidden" name="hidden_match_bet_id">
                                                    
                                                    <div class="form-group has-success">
                                                        <label for="match_option_title" class="control-label mb-1">Match Bet Title</label>
                                                        <input id="match_option_title" name="match_option_title" type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="match_option_title" class="control-label mb-1">Match Serial</label>
                                                        <input id="match_option_serial" name="match_option_serial" type="text" class="form-control" required>
                                                    </div>
                                                    
                                                    <div>
                                                        <input class="btn btn-lg btn-info btn-block" type="submit" name="submit" value="Submit">
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

        <!-- update coin -->
        <div class="modal fade" id="scrollmodal3" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
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
                                        <strong class="card-title">Update Coin</strong>
                                    </div>
                                    <div class="card-body">
                                        <!-- Credit Card -->
                                        <div id="pay-invoice">
                                            <div class="card-body">

                                                <form action="<?php echo base_url('admin/edit_option_coin'); ?>" method="post">
                                                    <input id="hidden_match_coin" type="hidden" name="hidden_match_coin">
                                                    
                                                    <div class="form-group has-success">
                                                        <label for="option_coin" class="control-label mb-1">Coin Value</label>
                                                        <input id="option_coin" name="option_coin" type="text" class="form-control" required>
                                                    </div>
                                                    
                                                    <div>
                                                        <input class="btn btn-lg btn-info btn-block" type="submit" name="submit" value="Submit">
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

        <!-- change option -->
        <div class="modal fade" id="scrollmodal4" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
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
                                        <strong class="card-title">Change Option Title</strong>
                                    </div>
                                    <div class="card-body">
                                        <!-- Credit Card -->
                                        <div id="pay-invoice">
                                            <div class="card-body">

                                                <form action="<?php echo base_url('admin/edit_option_title'); ?>" method="post">
                                                    <input id="hidden_option_title" type="hidden" name="hidden_option_title">
                                                    
                                                    <div class="form-group has-success">
                                                        <label for="option_title" class="control-label mb-1">Option Title</label>
                                                        <input id="option_title" name="option_title" type="text" class="form-control" required>
                                                    </div>

                                                    <div class="form-group has-success">
                                                        <label for="option_serial" class="control-label mb-1">Option Serial</label>
                                                        <input id="option_serial" name="option_serial" type="text" class="form-control" required>
                                                    </div>
                                                    
                                                    <div>
                                                        <input class="btn btn-lg btn-info btn-block" type="submit" name="submit" value="Submit">
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

        <!-- Result Modal -->
        <div class="modal fade" id="scrollmodal5" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
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
                                        <strong class="card-title">Result</strong>
                                    </div>
                                    <div class="card-body">
                                        <!-- Credit Card -->
                                        <div id="pay-invoice">
                                            <div class="card-body">

                                                <form action="<?php echo base_url('admin/published_bet_result'); ?>" method="post">
                                                    <input id="hidden_bet_id" type="hidden" name="hidden_bet_id">
                                                    
                                                    <div class="form-group has-success">
                                                        <label for="match_bet_title" class="control-label mb-1">Match Bet Title</label>
                                                        <input id="match_bet_title" name="match_bet_title" type="text" class="form-control" required>
                                                    </div>

                                                    <div class="form-group has-success">
                                                        <label for="option_coin" class="control-label mb-1">Bet Option Name</label>
                                                        <select id="bet_option_id" name="bet_option_id" class="form-control">
                                                            <option value="">-- select --</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div>
                                                        <input class="btn btn-lg btn-info btn-block" type="submit" name="submit" value="Submit">
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

    $('.bet-edit-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        var data_bettitle = $(this).attr('data-bettitle');
        var data_match_option_serial = $(this).attr('data-match_option_serial');
        $('#hidden_match_bet_id').attr('value', data_id);
        $('#match_option_title').attr('value', data_bettitle);
        $('#match_option_serial').attr('value', data_match_option_serial);
    });

    $('.bet-result-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        var data_bettitle = $(this).attr('data-bettitle');
        $('#hidden_bet_id').attr('value', data_id);
        $('#match_bet_title').attr('value', data_bettitle);

        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'get_bet_option';

        // ajax request
        $.ajax({
            type: "POST",
            url: url_prefix + 'admin/get_bet_options_for_result',
            data: {
                hidden_bet_id: data_id
            },
            dataType: 'html',
            success: function(data) {
                console.log(data);
                $("#bet_option_id").html("");
                $("#bet_option_id").append(data);
            },
            error:function(exception){
                console.log(exception);
                alert(exception);
            }
        });

    });

    $('.coin-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        var data_value = $(this).attr('data-value');
        $('#hidden_match_coin').attr('value', data_id);
        $('#option_coin').attr('value', data_value);
    });

    $('.option-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        var data_value = $(this).attr('data-title');
        var data_option_serial = $(this).attr('data-option_serial');
        $('#hidden_option_title').attr('value', data_id);
        $('#option_title').attr('value', data_value);
        $('#option_serial').attr('value', data_option_serial);
    });

    $('.btn-go-back').click(function() {
        history.go(-1);
        return false;
    });

</script>