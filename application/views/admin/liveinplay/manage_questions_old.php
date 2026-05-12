<?php include(APPPATH."views/admin/common/header.php"); ?>


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
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="panel panel-default" style="padding:15px;text-align:center;background-color:#4B5765;color:#fff">
                                                    <span class="caption-subject bold uppercase">
                                                        Match Name: 
                                                    </span>
                                                    <span class="caption-subject ">
                                                        <?= $match_name->title; ?> =&gt; <?= $match_name->league_title; ?>
                                                    </span>
                                                </div>

                                            </div>
                                            
                                        </div>
                                    </div>

                                    <?php foreach($matches as $val) :
                                            $option_data = $this->db->query("SELECT * FROM match_option_details WHERE match_option_id='{$val->id}'")->result();
                                    ?>

                                    <div class="panel panel-success">
                                    <div class="panel-heading">
                                        &nbsp;
                                    </div>
                                    <div class="panel-body">

                                        <table class="table table-striped table-bordered table-hover order-column">
                                            <thead>
                                                <tr>
                                                    <th>Match Question</th>
                                                    <th>Status</th>
                                                    <th>Created</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $val->match_option_title; ?></td>
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
                                                        data-status="<?php echo $val->status; ?>"
                                                        data-match_option_serial="<?php echo $val->match_option_serial; ?>"
                                                        data-toggle="modal"
                                                        data-target="#editQuestionModal"
                                                        title="Edit"><i class="fa fa-2x fa-edit icon-edit"></i></a>

                                                        <?php if($val->status == 0 && 1==3) : ?>
                                                            <a class="bet-result-modal"
                                                            data-bettitle="<?php echo $val->match_option_title; ?>"
                                                            data-id="<?php echo $val->id; ?>"
                                                            data-match_option_serial="<?php echo $val->match_option_serial; ?>"
                                                            data-toggle="modal"
                                                            data-target="#scrollmodal5"
                                                            title="Result"><i class="fa fa-list icon-edit"></i></a>
                                                        <?php endif; ?>

                                                        <?php if($val->status == 3 && 1==3) : ?>
                                                            <a class="bet-rollback-modal"
                                                            data-bettitle="<?php echo $val->match_option_title; ?>"
                                                            data-id="<?php echo $val->id; ?>"
                                                            data-match_option_serial="<?php echo $val->match_option_serial; ?>"
                                                            data-toggle="modal"
                                                            data-target="#scrollmodal6"
                                                            title="Rollback"><i class="fa fa-flag icon-edit"></i></a>
                                                        <?php endif; ?>

                                                        <?php if($val->status == 1 && 1==3) : ?>
                                                            <a title="Inactive" href="<?php echo base_url('admin/option_inactive/'.$val->id) ?>"><i style="color:green" class="fa fa-check icon-edit"></i></a>
                                                        <?php elseif($val->status == 0 && 1==3) : ?>
                                                            <a title="Active" href="<?php echo base_url('admin/option_active/'.$val->id) ?>"><i style="color:red" class="fa fa-times icon-edit"></i></a>
                                                        <?php endif; ?>

                                                        <?php if($val->status == 0 && 1==3) : ?>
                                                            <a title="Bet Cancelled" href="<?php echo base_url('admin/bet_match_cancel/'.$val->id) ?>"><i style="color:green" class="fa fa-money icon-edit"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Answers</th>
                                                <th>Coin</th>
                                                <!-- <th>Serial</th> -->
                                                <!-- <th>Status</th> -->
                                                <th>Action</th>
                                            </tr>
                                            <?php foreach($option_data as $op) : ?>
                                                <tr>
                                                    <td><?php echo $op->option_title; ?></td>
                                                    <td><?php echo $op->option_coin; ?></td>
                                                    <!-- <td><?php //echo $op->option_serial; ?></td>
                                                    <td>
                                                        <?php
                                                            /*if($op->status == 2) {
                                                                echo '<span class="badge badge-success">Win</span>';
                                                            }*/
                                                        ?>
                                                    </td> -->
                                                    <td>
                                                        

                                                        <a
                                                        class="option-modal btn btn-xs btn-info"
                                                        data-title="<?php echo $op->option_title; ?>"
                                                        data-id="<?php echo $op->id; ?>"
                                                        data-value="<?php echo $op->option_coin; ?>"
                                                        data-option_serial="<?php echo $op->option_serial; ?>"
                                                        data-toggle="modal"
                                                        data-target="#editAnswerModal"
                                                        title="Edit Answer">
                                                            Edit
                                                        </a>

                                                        <a
                                                        class="coin-modal btn-xs btn btn-danger"
                                                        title="Delete Answer"
                                                        href="<?php echo base_url('admin/remove_answer/'.$op->id) ?>"
                                                        onclick="return confirm('Are you sure to delete this answer');">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>

                                    </div>
                                    </div>



                                    <?php endforeach; ?>

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
                        <h4 class="modal-title">Create Match Question</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url('admin/create_match_option'); ?>" method="post">
                                    <input type="hidden" name="match_option_id" value="<?php echo $match_id; ?>">

                                  <div class="row">

                                    <div class="col-md-10 col-xs-12">

                                      <!-- <div class="form-group has-success">
                                          <label for="match_option_name" class="control-label mb-1">Question</label>
                                          <input id="match_option_name" name="match_option_name" type="text" class="form-control" required>
                                      </div> -->

                                        <div class="form-group has-success">
                                            <label for="match_option_name" class="control-label mb-1">Question</label>
                                            <select id="match_option_name" name="match_option_name" class="form-control" required>
                                                <option value="">--- select ---</option>
                                                <?php foreach($questions as $val) : ?>
                                                    <option value="<?php echo $val->question_title; ?>"><?php echo $val->question_title; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>

                                    

                                    <div class="col-md-1 col-xs-2">
                                      <div class="form-group">
                                        <a id="add" style="color:#fff;margin-top:25px;" class="btn btn-success"> <i class="fa fa-plus"></i> </a>
                                      </div>
                                    </div>
                                    <div class="col-md-1 col-xs-2">
                                      <div class="form-group">
                                        <a id="minus" style="color:#fff;margin-top:25px;" class="btn btn-danger"> <i class="fa fa-minus"></i> </a>
                                      </div>
                                    </div>

                                  </div>

                                    <!-- <div class="form-group has-success">
                                        <label for="match_option_serial" class="control-label mb-1">Serial</label>
                                        <input required name="match_option_serial" type="text" class="form-control">
                                    </div> -->

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <div class="form-group has-success">
                                              <label for="first_option_title" class="control-label mb-1">Answer</label>
                                              <input name="first_option_title[]" type="text" class="form-control" value="<?php echo ucwords($title_1); ?>" required>
                                          </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <div class="form-group has-success">
                                              <label for="first_option_coin" class="control-label mb-1">Coin</label>
                                              <input name="first_option_coin[]" type="text" class="form-control" required>
                                          </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <div class="form-group has-success">
                                              <label for="first_option_title" class="control-label mb-1">Answer</label>
                                              <input name="first_option_title[]" type="text" class="form-control" value="<?php echo ucwords($title_2); ?>" required>
                                          </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <div class="form-group has-success">
                                              <label for="first_option_coin" class="control-label mb-1">Coin</label>
                                              <input name="first_option_coin[]" type="text" class="form-control" required>
                                          </div>
                                        </div>
                                    </div>

                                    <div class="row option-data" style="display:none">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <div class="form-group has-success">
                                              <label for="first_option_title" class="control-label mb-1">Answer</label>
                                              <input name="first_option_title[]" type="text" class="form-control">
                                          </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <div class="form-group has-success">
                                              <label for="first_option_coin" class="control-label mb-1">Coin</label>
                                              <input name="first_option_coin[]" type="text" class="form-control">
                                          </div>
                                        </div>
                                    </div>

                                    <div class="add-options"></div>

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
                        <h4 class="modal-title">Edit Match Question</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url('admin/edit_match_bet_name'); ?>" method="post">
                                    <input id="hidden_match_bet_id" type="hidden" name="hidden_match_bet_id">
                                    
                                    <div class="form-group has-success">
                                        <label for="match_option_title" class="control-label mb-1">Match Question</label>
                                        <input id="match_option_title" name="match_option_title" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="match_option_title" class="control-label mb-1">Match Status</label>
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

    $("#add").on("click", function() {
        $('.option-data:first').clone().show().addClass('option-data-new').appendTo('.add-options');
    });
    $("#minus").on("click", function() {
        // $('.option-data:last').remove();
        $('.option-data-new:last').remove();
    });

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
        var data_bettitle = $(this).attr('data-bettitle');
        var data_match_option_serial = $(this).attr('data-match_option_serial');
        $('#hidden_match_bet_id').attr('value', data_id);
        $('#match_option_title').attr('value', data_bettitle);
        $("#bet_status").val(data_status);
        // $('#match_option_serial').attr('value', data_match_option_serial);
    });

</script>