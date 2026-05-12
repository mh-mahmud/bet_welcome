<?php include(APPPATH."views/admin/common/header.php"); ?>
<style>
    .table thead tr th {
        font-size: 11px;
    }

    .table td, .table th {
        font-size: 11px;
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
                        <h3>Club User</h3>
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
                                    <div class="actions">
                                        <div class="btn-group">
                                            <button data-toggle="modal" data-target="#createClubModal" class="btn sbold green"> Add New
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
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
                                                <th></th>
                                                <th>Club Name</th>
                                                <!-- <th>Club Email</th> -->
                                                <th>Username</th>
                                                <th>Club Ratio</th>
                                                <th>Club Mobile</th>
                                                <!-- <th>Club Coin</th> -->
                                                <th>Status</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($club_data as $val) : ?>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <?php if($this->session->userdata('admin_access_data')->role_data=='super_admin') : ?>
                                                        <a target="_blank" class=" btn btn-primary btn-xs"href="<?= base_url('club_login_by_admin/'.$val->id); ?>">Login</a>
                                                    <?php endif; ?>
                                                    </td>
                                                    <td><?= $val->club_name; ?></td>
                                                    <!-- <td><?php //echo $val->club_email; ?></td> -->
                                                    <td><?= $val->username; ?></td>
                                                    <td><?= $val->club_ratio; ?></td>
                                                    <td><?= $val->club_mobile; ?></td>
                                                    <!-- <td><?php //echo $val->coin; ?></td> -->
                                                    <td>
                                                        <?php
                                                            if($val->status == 1) {
                                                                echo '<span class="badge badge-success">Active</span>';
                                                            } else {
                                                                echo '<span class="badge badge-danger">Inactive</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?=$val->created_at?></td>
                                                    <td>
                                                        <a
                                                            data-id="<?php echo $val->id; ?>"
                                                            data-name="<?php echo $val->club_name; ?>"
                                                            data-email="<?php echo $val->club_email; ?>"
                                                            data-username="<?php echo $val->username; ?>"
                                                            data-club_ratio="<?php echo $val->club_ratio; ?>"
                                                            data-show_ratio="<?php echo $val->show_ratio; ?>"
                                                            data-mobile="<?php echo $val->club_mobile; ?>"
                                                            data-status="<?php echo $val->status; ?>"
                                                            data-toggle="modal"
                                                            class="change-edit-modal btn btn-xs btn-success"
                                                            data-target="#editClubModal"
                                                            title="Approve Deposit">
                                                            Edit
                                                        </a>

                                                        <a
                                                            data-id="<?php echo $val->id; ?>"
                                                            data-toggle="modal"
                                                            class="change-password-modal btn btn-warning btn-xs"
                                                            data-target="#changePasswordModal" title="Approve Deposit">
                                                            Change Password
                                                        </a>

                                                        <a onclick="return confirm('Are you sute to delete this club?')" class="btn btn-xs btn-danger" href="<?php echo base_url('admin/delete_club/'.$val->id) ?>">Delete</a>
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

        </div>
        <!-- END CONTAINER -->

        <div id="createClubModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Create Club</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url('admin/post_create_club'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="club_name" class="control-label mb-1">Club Name</label>
                                        <input name="club_name" type="text" class="form-control" required>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="club_email" class="control-label mb-1">Club Email</label>
                                        <input name="club_email" type="text" class="form-control" required>
                                    </div> -->

                                    <div class="form-group">
                                        <label for="username" class="control-label mb-1">Username</label>
                                        <input name="username" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="club_ratio" class="control-label mb-1">Club Ratio</label>
                                        <input name="club_ratio" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="club_mobile" class="control-label mb-1">Club Phone Number</label>
                                        <input name="club_mobile" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="control-label mb-1">Password</label>
                                        <input min="6" name="password" type="password" class="form-control" required>
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

        <div id="editClubModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Edit Club</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url('admin/post_edit_club'); ?>" method="post">
                                    <input id="club_id" type="hidden" name="club_id">
                                    <div class="form-group">
                                        <label for="club_name" class="control-label mb-1">Club Name</label>
                                        <input id="club_name" name="club_name" type="text" class="form-control" required>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="club_email" class="control-label mb-1">Club Email</label>
                                        <input id="club_email" name="club_email" type="text" class="form-control" required>
                                    </div> -->

                                    <div class="form-group">
                                        <label for="username" class="control-label mb-1">Username</label>
                                        <input id="username" name="username" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="club_ratio" class="control-label mb-1">Club Ratio</label>
                                        <input id="club_ratio" name="club_ratio" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="club_mobile" class="control-label mb-1">Club Phone Number</label>
                                        <input id="club_mobile" name="club_mobile" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class="control-label mb-1">Select status</label>
                                        <select id="status" name="status" class="form-control" required>
                                            <option value="">--- select ---</option>
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

        <div id="changePasswordModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Change Password</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url('admin/club_user_change_password'); ?>" method="post">

                                    <input id="hidden_club_id" type="hidden" name="hidden_club_id">
                                    <div class="form-group">
                                        <label for="password" class="control-label mb-1">Password</label>
                                        <input min="6" name="password" type="password" class="form-control" required>
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

    $('.change-edit-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        var sel_id = $(this).attr('data-status');

        $('#club_id').attr('value', data_id);
        $('#club_name').attr('value', $(this).attr('data-name'));
        $('#club_email').attr('value', $(this).attr('data-email'));
        $('#club_username').attr('value', $(this).attr('data-username'));
        $('#club_ratio').attr('value', $(this).attr('data-club_ratio'));
        // $('#show_ratio').attr('value', $(this).attr('data-show_ratio'));
        $('#club_mobile').attr('value', $(this).attr('data-mobile'));
        $('#status').val(sel_id);
    });

    $('.change-password-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        $('#hidden_club_id').attr('value', data_id);
    });


</script>