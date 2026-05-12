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
                        <h3>Manage Answers (<?= $question_data->match_option_title; ?>)</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <div class="btn-group">
                                            <button data-toggle="modal" data-target="#createQuestionModal" id="sample_editable_1_new" class="btn sbold green match-option-modal"> Add Answer
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>

                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn sbold red" href="<?php echo base_url('manage_questions/'.$question_data->match_id); ?>">
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
                                                <th>Answer</th>
                                                <th>Ratio</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($answers as $val) : ?>

                                            <tr>
                                                <td><?= $val->id; ?></td>
                                                <td><?php echo $val->option_title; ?></td>
                                                <td><?php echo $val->option_coin; ?></td>
                                                <td>
                                                    <?php
                                                        if($val->status == 1) {
                                                            echo '<span class="badge badge-success">Active</span>';
                                                        }
                                                        else if($val->status == 0) {
                                                            echo '<span class="badge badge-danger">Inactive</span>';
                                                        }
                                                        else if($val->status == 2) {
                                                            echo '<span class="badge badge-primary">Win</span>';
                                                        }
                                                        else if($val->status == 3) {
                                                            echo '<span class="badge badge-danger">Lost</span>';
                                                        }
                                                    ?>
                                                </td>

                                                <td>
                                                    <a class="btn btn-default btn-sm bet-edit-modal"
                                                    data-option_title="<?php echo $val->option_title; ?>"
                                                    data-id="<?php echo $val->id; ?>"
                                                    data-status="<?php echo $val->status; ?>"
                                                    data-option_coin="<?php echo $val->option_coin; ?>"
                                                    data-toggle="modal"
                                                    data-target="#editQuestionModal"
                                                    title="Edit"><i class="fa fa-edit"></i></a>

                                                    <?php if($val->status==1 || $val->status==0) : ?>
                                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this answer?');" href="<?php echo base_url('admin/delete_answer/'.$val->id) ?>">
                                                        <i class="fa fa-times"></i>
                                                    </a>

                                                    <a onclick="return confirm('Are you sure to win this answer?');" style="background-color:green;" class="btn btn-success btn-sm" href="<?php echo base_url('admin/set_bet_winner/'.$question_data->id.'/'.$val->id); ?>">Set Winner</a>
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

                                <form action="<?php echo base_url('admin/post_create_answer'); ?>" method="post">

                                    <input type="hidden" name="match_id" value="<?php echo $question_data->match_id; ?>">
                                    <input type="hidden" name="match_option_id" value="<?php echo $question_data->id; ?>">

                                  <div class="row">

                                    <div class="col-md-12 col-xs-12">

                                        <div class="form-group">
                                            <label for="match_option_name" class="control-label mb-1">Match</label>
                                            <input type="text" class="form-control" disabled value="<?php echo $question_data->title; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="match_option_name" class="control-label mb-1">Question</label>
                                            <input type="text" class="form-control" disabled value="<?php echo $question_data->match_option_title; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="option_title" class="control-label mb-1">Answer</label>
                                            <input name="option_title" type="text" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="option_coin" class="control-label mb-1">Return Rate</label>
                                            <input name="option_coin" type="text" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="status" class="control-label mb-1">Status</label>
                                            <select class="form-control" name="status">
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

                                <form action="<?php echo base_url('admin/post_edit_answer'); ?>" method="post">
                                    <input id="option_details_id" type="hidden" name="option_details_id">

                                        <div class="form-group">
                                            <label for="match_option_name" class="control-label mb-1">Match</label>
                                            <input type="text" class="form-control" disabled value="<?php echo $question_data->title; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="match_option_name" class="control-label mb-1">Question</label>
                                            <input type="text" class="form-control" disabled value="<?php echo $question_data->match_option_title; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="option_title" class="control-label mb-1">Answer</label>
                                            <input id="option_title" name="option_title" type="text" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="option_coin" class="control-label mb-1">Return Rate</label>
                                            <input id="option_coin" name="option_coin" type="text" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="status" class="control-label mb-1">Status</label>
                                            <select id="status" class="form-control" name="status">
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
        var option_title = $(this).attr('data-option_title');
        var option_coin = $(this).attr('data-option_coin');

        $('#option_details_id').attr('value', data_id);
        $("#option_title").val(option_title);
        $("#option_coin").val(option_coin);
        $("#status").val(data_status);
    });

</script>