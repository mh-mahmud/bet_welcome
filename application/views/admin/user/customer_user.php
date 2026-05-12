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
                        <h3>Customer User</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover  order-column ajax-tbl">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Full Name</th>
                                                <th>Username</th>
                                                <th>Club Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Country</th>
                                                <th>Balance</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($customer_data as $val) : ?>
                                                <tr class="odd gradeX">

                                                    <td>
                                                        <?php if($this->session->userdata('admin_access_data')->role_data=='super_admin') : ?>
                                                        <a target="_blank" class=" btn btn-primary btn-xs"href="<?= base_url('user_login_by_admin/'.$val->id); ?>">Login</a>
                                                    <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a
                                                            data-id="<?php echo $val->id; ?>"
                                                            class="change-deposit-modal btn btn-info btn-xs" data-toggle="modal"
                                                            data-target="#changeDepositModal"
                                                            title=""
                                                        >
                                                            Add Amount
                                                        </a>
                                                    </td>
                                                    <td><?= $val->name; ?></td>
                                                    <td><?= $val->username; ?></td>
                                                    <td><?= get_club_name($val->club_id); ?></td>
                                                    <td><?= $val->email; ?></td>
                                                    <td><?= $val->phone; ?></td>
                                                    <td><?= $val->country; ?></td>
                                                    <td style="color:red;font-weight:bold"><?php echo get_user_current_balance($val->id); ?></td>
                                                    <td>
                                                        <?php
                                                            if($val->status == 1) {
                                                                echo '<span class="badge badge-success">Active</span>';
                                                            } else if($val->status == 0) {
                                                                echo '<span class="badge badge-danger">Inactive</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?=$val->created_at?></td>
                                                    <td>
                                                        <a data-id="<?php echo $val->id; ?>" class="change-status-modal btn btn-danger btn-xs" data-toggle="modal" data-status="<?php echo $val->status; ?>" data-target="#changeStatusModal" title="Change User Status">
                                                            Status
                                                        </a>
                                                    </td>

                                                    <!-- <td>
                                                        <a
                                                            data-id="<?php //echo $val->id; ?>"
                                                            class="change-password-modal btn btn-warning btn-xs" data-toggle="modal"
                                                            data-target="#changePasswordModal"
                                                            title=""
                                                        >
                                                            Change Password
                                                        </a>
                                                    </td> -->

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

        <div id="changeStatusModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Change Status</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url('admin/change_user_status'); ?>" method="post">
                                    <input id="hidden_user_id" type="hidden" name="hidden_user_id">
                                    <div class="form-group">
                                        <label for="match_status" class="control-label mb-1">Select status</label>
                                        <select id="match_status" name="match_status" class="form-control" required>
                                            <option value="">--- select ---</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-sm btn-info btn-block">
                                            <span>Submit</span>
                                        </button>
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

        <div id="changeDepositModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add Deposit</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url('admin/deposit_by_admin'); ?>" method="post">
                                    <input id="user_id" type="hidden" name="user_id">
                                    <div class="form-group">
                                        <label for="amount" class="control-label mb-1">Add Amount</label>
                                        <input type="text" name="amount" class="form-control" required>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-sm btn-info btn-block">
                                            <span>Submit</span>
                                        </button>
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

    $('.change-status-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        var sel_id = $(this).attr('data-status');

        $('#hidden_user_id').attr('value', data_id);
        $('#match_status').val(sel_id);
    });

    $('.change-deposit-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        $('#user_id').attr('value', data_id);
    });
</script>