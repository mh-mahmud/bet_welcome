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
                        <h3>Manage Questions (<?= $match_name->title; ?>)</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <div class="btn-group">
                                            <button data-toggle="modal" data-target="#createQuestionModal" id="sample_editable_1_new" class="btn sbold green match-option-modal"> Add Question
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>

                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn sbold red" href="<?php echo base_url('match_details'); ?>">
                                                <i class="fa fa-arrow-left"></i>
                                                Go Back
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="portlet-body">

                                    <table class="table table-striped table-bordered table-hover  order-column ajax-tbl">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Question</th>
                                                <th>Capital</th>
                                                <th>Min Bet <br> Limit</th>
                                                <th>Max Bet <br> Limit</th>
                                                <th>Status</th>
                                                <th>Total <br> Answer</th>
                                                <th>T. Bet</th>
                                                <th>T. Return</th>
                                                <!-- <th>Created</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                            foreach($matches as $val) :
                                                $tb = 0;
                                                $tr = 0;
                                                $tb_tr = $this->db->query("SELECT SUM(`bet_coin`) AS bet_coin, SUM(`total_coin`) AS total_coin FROM matchbit_coin WHERE match_bet_option_id='{$val->id}'")->row();
                                                if(!empty($tb_tr)) {
                                                    $tb = $tb_tr->bet_coin;
                                                    $tr = $tb_tr->total_coin;
                                                }
                                        ?>

                                            <tr>
                                                <td><?= $val->id; ?></td>
                                                <td><?php echo $val->match_option_title; ?></td>
                                                <td><?php echo $val->capital; ?></td>
                                                <td><?php echo $val->min_bet_limit; ?></td>
                                                <td><?php echo $val->max_bet_limit; ?></td>
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

                                                <td>
                                                    <?php
                                                        $answers = $this->db->query("SELECT * FROM match_option_details WHERE match_option_id='{$val->id}'")->result();
                                                        if(!empty($answers)) {
                                                            echo count($answers);
                                                        }
                                                        else {
                                                            echo 0;
                                                        }
                                                    ?>
                                                </td>
                                                <td><?php echo $tb; ?></td>
                                                <td><?php echo $tr; ?></td>

                                                <!-- <td><?php //echo $val->created_at; ?></td> -->
                                                <td>
                                                    <a class="btn btn-default btn-sm bet-edit-modal"
                                                    data-bettitle="<?php echo $val->match_option_title; ?>"
                                                    data-id="<?php echo $val->id; ?>"
                                                    data-status="<?php echo $val->status; ?>"
                                                    data-min_bet_limit="<?php echo $val->min_bet_limit; ?>"
                                                    data-max_bet_limit="<?php echo $val->max_bet_limit; ?>"
                                                    data-capital="<?php echo $val->capital; ?>"
                                                    data-match_option_serial="<?php echo $val->match_option_serial; ?>"
                                                    data-toggle="modal"
                                                    data-target="#editQuestionModal"
                                                    title="Edit"><i class="fa fa-edit"></i></a>

                                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this question?');" href="<?php echo base_url('admin/delete_question/'.$val->id) ?>">
                                                        <i class="fa fa-times"></i>
                                                    </a>

                                                    <a style="background-color:green;" class="btn btn-success btn-sm" href="<?php echo base_url('manage_answers/'.$val->id); ?>">Answers</a>

                                                    <a style="background-color:green;" class="btn btn-success btn-sm" href="<?php echo base_url('show_bet_list/'.$val->id); ?>">Bet List</a>

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
            

            <!-- BEGIN QUICK SIDEBAR -->
                <!-- deleted all the codes of this section -->
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->


        <!-- question modal -->
        <div id="createQuestionModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add Question</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url('admin/create_match_option'); ?>" method="post">
                                    <input type="hidden" name="match_option_id" value="<?php echo $match_id; ?>">

                                  <div class="row">

                                    <div class="col-md-12 col-xs-12">

                                        <div class="form-group">
                                            <label for="match_option_name" class="control-label mb-1">Match</label>
                                            <input type="text" class="form-control" disabled value="<?php echo $match_name->title; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="match_option_name" class="control-label mb-1">Question</label>
                                            <input name="match_option_name" type="text" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="capital" class="control-label mb-1">Capital</label>
                                            <input name="capital" type="text" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="capital" class="control-label mb-1">Sponsor Bonus</label>
                                            <input name="sponsor_bonus" type="text" class="form-control" value="1" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="min_bet_limit" class="control-label mb-1">Min Bet Limit</label>
                                            <input name="min_bet_limit" type="text" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="max_bet_limit" class="control-label mb-1">Max Bet Limit</label>
                                            <input name="max_bet_limit" type="text" class="form-control">
                                        </div>

                                    <div class="form-group">
                                        <label for="match_option_title" class="control-label mb-1">Status</label>
                                        <select class="form-control" name="bet_status" required="">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    </div>

                                  </div>


                                    <div>
                                        <input type="submit" name="submit" value="Submit" class="btn btn-sm btn-info btn-block">
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

        <!-- chnage answer modal -->
        <div id="editAnswerModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Edit Answer</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url('admin/edit_option_title'); ?>" method="post">
                                    <input id="hidden_option_title" type="hidden" name="hidden_option_title">
                                    
                                    <div class="form-group has-success">
                                        <label for="option_title" class="control-label mb-1">Answer</label>
                                        <input id="option_title" name="option_title" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group has-success">
                                        <label for="option_coin" class="control-label mb-1">Coin</label>
                                        <input id="option_coin" name="option_coin" type="text" class="form-control" required>
                                    </div>
                                    
                                    <div>
                                        <input class="btn btn-sm btn-info btn-block" type="submit" name="submit" value="Submit">
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

        <!-- edit question modal -->
        <div id="editQuestionModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Edit Question</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url('admin/edit_match_bet_name'); ?>" method="post">
                                    <input id="hidden_match_bet_id" type="hidden" name="hidden_match_bet_id">

                                    <div class="form-group">
                                        <label for="match_option_name" class="control-label mb-1">Match</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $match_name->title; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="match_option_title" class="control-label mb-1">Question</label>
                                        <input id="match_option_title" name="match_option_title" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="capital" class="control-label mb-1">Capital</label>
                                        <input id="capital" name="capital" type="text" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="capital" class="control-label mb-1">Sponsor Bonus</label>
                                        <input name="sponsor_bonus" type="text" class="form-control" value="1" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="min_bet_limit" class="control-label mb-1">Min Bet Limit</label>
                                        <input id="min_bet_limit" name="min_bet_limit" type="text" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="max_bet_limit" class="control-label mb-1">Max Bet Limit</label>
                                        <input id="max_bet_limit" name="max_bet_limit" type="text" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="match_option_title" class="control-label mb-1">Status</label>
                                        <select id="bet_status" class="form-control" name="bet_status" required="">
                                            <option value="">-- select --</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    
                                    <div>
                                        <input class="btn btn-sm btn-info btn-block" type="submit" name="submit" value="Submit">
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
            ordering: false
        });
    } );

    $('.btn-go-back').click(function() {
        history.go(-1);
        return false;
    });

    $('.option-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        var data_value = $(this).attr('data-title');
        var data_coin = $(this).attr('data-value');
        // var data_option_serial = $(this).attr('data-option_serial');
        $('#hidden_option_title').attr('value', data_id);
        $('#option_title').attr('value', data_value);
        // $('#option_serial').attr('value', data_option_serial);
        $('#option_coin').attr('value', data_coin);
    });

    $('.bet-edit-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        var data_status = $(this).attr('data-status');

        var data_min_bet_limit = $(this).attr('data-min_bet_limit');
        var data_max_bet_limit = $(this).attr('data-max_bet_limit');
        var data_capital = $(this).attr('data-capital');

        var data_bettitle = $(this).attr('data-bettitle');
        var data_match_option_serial = $(this).attr('data-match_option_serial');
        $('#hidden_match_bet_id').attr('value', data_id);
        $('#match_option_title').attr('value', data_bettitle);
        $("#bet_status").val(data_status);

        $("#min_bet_limit").val(data_min_bet_limit);
        $("#max_bet_limit").val(data_max_bet_limit);
        $("#capital").val(data_capital);

        // $('#match_option_serial').attr('value', data_match_option_serial);
    });

</script>