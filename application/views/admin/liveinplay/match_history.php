<?php include(APPPATH."views/admin/common/header.php"); ?>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>timepicker/date-time-picker.css">


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
                        <h3>Match History</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <!-- <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase"> Managed Table</span>
                                    </div> -->
                                    <!-- <div class="actions">
                                        <div class="btn-group">
                                            <button data-toggle="modal" data-target="#createMatchModal" id="sample_editable_1_new" class="btn sbold green"> Add New
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="portlet-body">
                                    <!-- <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div> -->
                                    <table class="table table-striped table-bordered table-hover  order-column ajax-tbl">
                                        <thead>
                                            <tr>
                                                <th>Sports Name</th>
                                                <th>Match Title</th>
                                                <th>Match Type</th>
                                                <th>Start At</th>
                                                <th>End At</th>
                                                <th>Score</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($matches as $val) : ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $val->name; ?></td>
                                                    <td><?= $val->title; ?></td>
                                                    <td>
                                                        <?php
                                                            if($val->active_status == 1) {
                                                                echo '<span style="font-size:10px" class="badge badge-success">In Play</span>';
                                                            } else if($val->active_status == 2) {
                                                                echo '<span style="font-size:10px" class="badge badge-warning">Live</span>';
                                                            } else if($val->active_status == 3) {
                                                                echo '<span style="font-size:10px" class="badge badge-primary">Upcoming </span>';
                                                            } else if($val->active_status == 4) {
                                                                echo '<span style="font-size:10px" class="badge badge-danger">Match Complete</span>';
                                                            } else if($val->active_status == 5) {
                                                                echo '<span style="font-size:10px" class="badge badge-danger">Match Cancelled</span>';
                                                            } else if($val->active_status == 8) {
                                                                echo '<span style="font-size:10px" class="badge badge-danger">Result Published</span>';
                                                            } else if($val->active_status == 6) {
                                                                echo '<span style="font-size:10px" class="badge badge-warning">Disabled</span>';
                                                            } else if($val->active_status == 7) {
                                                                echo '<span style="font-size:10px" class="badge badge-danger">Inactive</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $val->match_date_var . ' => ' . $val->match_time_var; ?></td>
                                                    <td><?php echo date("M d,Y => h:i A", strtotime($val->end_time_local)); ?></td>
                                                    <td><?= $val->notification; ?></td>
                                                    <td>
                                                        <?php
                                                            if($val->status == 2) {
                                                                echo '<span class="badge badge-danger">Inactive</span>';
                                                            } else if($val->status == 1) {
                                                                echo '<span class="badge badge-success">Active</span>';
                                                            }
                                                            else if($val->status == 3) {
                                                                echo '<span class="badge badge-warning">Match End</span>';
                                                            }
                                                            else if($val->status == 4) {
                                                                echo '<span class="badge badge-danger">Match Cancelled</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td style="width:180px">

                                                        <a class="btn purple btn-xs" href="<?php echo base_url('manage_questions_history/'.$val->id); ?>" title="View Match Option">Questions</a>

                                                        <!-- <a class="match-edit-modal btn btn-xs blue" data-id="<?php //echo $val->id; ?>" data-toggle="modal" data-target="#editMatchModal" title="Edit">Edit</a> -->

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

        <div id="createMatchModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Create Match</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                            <form action="<?php echo base_url('admin/post_create_match'); ?>" method="post">
                                <div class="form-group">
                                    <label for="sports_name" class="control-label mb-1">Sports Name</label>
                                    <select name="sports_name" class="form-control" required>
                                    <option value="">--- select ---</option>
                                        <?php foreach($sports as $val) : ?>
                                            <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="league_title" class="control-label mb-1">League Title</label>
                                    <select name="league_title" class="form-control" required>
                                    <option value="">--- select ---</option>
                                        <?php foreach($league_data as $val) : ?>
                                            <option value="<?php echo $val->league_name; ?>"><?php echo $val->league_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="match_title" class="control-label mb-1">Match Title</label>
                                    <input name="match_title" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="match_status" class="control-label mb-1">Match Status</label>
                                    <select name="match_status" class="form-control" required>
                                        <option value="">--- select ---</option>
                                        <!-- <option value="1">In-play</option>
                                        <option value="2">Live</option>
                                        <option value="3">Upcoming</option> -->

                                        <!-- new options, as per client requirements -->
                                        <option value="3">Active</option>
                                        <option value="7">Inactive</option>
                                        <option value="2">Live</option>
                                        <option value="6">Disabled</option>
                                        <option value="4">Completed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="notification" class="control-label mb-1">Match Notification</label>
                                    <input name="notification" type="text" class="form-control" required>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="score_1" class="control-label mb-1">1st Score</label>
                                            <input required name="score_1" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="score_2" class="control-label mb-1">2nd Score</label>
                                            <input required name="score_2" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <label for="starting_time" class="control-label mb-1">Match Start time</label>
                                    <!-- <input type="datetime-local" name="starting_time" type="text" class="form-control" required> -->
                                    <input type="text" name="starting_time" type="text" class="form-control myTimePicker" required>
                                </div>

                                <div class="form-group">
                                    <label for="ending_time" class="control-label mb-1">Match End time</label>
                                    <!-- <input type="datetime-local" name="ending_time" type="text" class="form-control" required> -->
                                    <input type="text" name="ending_time" type="text" class="form-control myTimePicker" required>
                                </div>

                                <!-- <div class="form-group has-success">
                                    <label for="match_serial" class="control-label mb-1">Serial</label>
                                    <input required name="match_serial" type="text" class="form-control">
                                </div> -->

                                <!-- <div class="form-group">
                                    <label for="active_status" class="control-label mb-1">Status</label>
                                    <select name="active_status" class="form-control" required>
                                        <option value="">--- select ---</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div> -->

                                <div>
                                    <input class="btn btn-sm btn-primary btn-block" type="submit" name="submit" value="Submit">
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

        <div id="editMatchModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Edit Match</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                            <form action="<?php echo base_url('admin/post_edit_match'); ?>" method="post">
                                <input id="hidden_match_edit_id" type="hidden" name="match_edit_id">
                                <div class="form-group">
                                    <label for="sports_name" class="control-label mb-1">Sports Name</label>
                                    <select id="edit_sports_name" name="sports_name" class="form-control" required>
                                    <option value="">--- select ---</option>
                                        <?php foreach($sports as $val) : ?>
                                            <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="league_title" class="control-label mb-1">League Title</label>
                                    <input id="edit_league_title" name="league_title" type="text" class="form-control" required>
                                </div> -->

                                <div class="form-group">
                                    <label for="league_title" class="control-label mb-1">League Title</label>
                                    <select id="edit_league_title" name="league_title" class="form-control" required>
                                    <option value="">--- select ---</option>
                                        <?php foreach($league_data as $val) : ?>
                                            <option value="<?php echo $val->league_name; ?>"><?php echo $val->league_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="match_title" class="control-label mb-1">Match Title</label>
                                    <input id="edit_match_title" name="match_title" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="match_status" class="control-label mb-1">Match Status</label>
                                    <select id="edit_match_status" name="match_status" class="form-control" required>
                                        <option value="">--- select ---</option>
                                        <!-- <option value="1">In-play</option>
                                        <option value="2">Live</option>
                                        <option value="3">Upcoming</option> -->

                                        <!-- new options, as per client requirements -->
                                        <option value="3">Active</option>
                                        <option value="7">Inactive</option>
                                        <option value="2">Live</option>
                                        <option value="6">Disabled</option>
                                        <option value="4">Completed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="notification" class="control-label mb-1">Match Notification</label>
                                    <input id="edit_notification" name="notification" type="text" class="form-control" required>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="score_1" class="control-label mb-1">1st Score</label>
                                            <input required name="score_1" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="score_2" class="control-label mb-1">2nd Score</label>
                                            <input required name="score_2" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <label for="starting_time" class="control-label mb-1">Match Start time</label>
                                    <!-- <input id="starting_time" type="datetime-local" name="starting_time" type="text" class="form-control" required> -->
                                    <input id="starting_time" type="text" name="starting_time" type="text" class="form-control myTimePicker" required>
                                </div>

                                <div class="form-group">
                                    <label for="ending_time" class="control-label mb-1">Match End time</label>
                                    <!-- <input id="ending_time" type="datetime-local" name="ending_time" type="text" class="form-control" required> -->
                                    <input id="ending_time" type="text" name="ending_time" type="text" class="form-control myTimePicker" required>
                                </div>

                                <!-- <div class="form-group has-success">
                                    <label for="match_serial" class="control-label mb-1">Serial</label>
                                    <input required name="match_serial" type="text" class="form-control">
                                </div> -->

                                <!-- <div class="form-group">
                                    <label for="active_status" class="control-label mb-1">Status</label>
                                    <select id="edit_active_status" name="active_status" class="form-control" required>
                                        <option value="">--- select ---</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div> -->

                                <div>
                                    <input class="btn btn-sm btn-primary btn-block" type="submit" name="submit" value="Submit">
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
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>timepicker/1.js"></script>
<script src="<?php echo base_url(); ?>timepicker/2.js"></script>
<script src="<?php echo base_url(); ?>timepicker/3.js"></script>
<script>
    $(document).ready(function() {
        $('.ajax-tbl').DataTable({
            // "scrollX": true,
            ordering: false
        });
    } );

    $('.match-edit-modal').on('click', function(e) {
        var data_id = $(this).attr('data-id');
        $('#hidden_match_edit_id').attr('value', data_id);
        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'edit_match_data';

        // ajax request
        $.ajax({
            type: "POST",
            url: url_prefix + 'admin/edit_match_data',
            data: {
                match_id: data_id
            },
            dataType: 'json',
            success: function(data) {
                $("#edit_match_title").attr("value", data.title);
                // $("#edit_league_title").attr("value", data.league_title);
                $("#edit_league_title").val(data.league_title);
                $("#edit_sports_name").val(data.sportscategory_id);
                $("#edit_match_status").val(data.active_status);
                $("#edit_active_status").val(data.status);
                $("#edit_notification").attr("value", data.notification);
                $("#starting_time").attr("value", data.match_time_local);
                $("#ending_time").attr("value", data.end_time_local);
                // $("#edit_match_serial").attr("value", data.serial);
                // $("#score_1").attr("value", data.score_1);
                // $("#score_2").attr("value", data.score_2);
            },
            error:function(exception){
                console.log(exception);
            }
        });
    });

    $('.myTimePicker').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: "HH:mm:ss"
    });

</script>