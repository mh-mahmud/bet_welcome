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
                        <h3>Notice Panel</h3>
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
                                            <button data-toggle="modal" data-target="#createNoticeModal" class="btn sbold green"> Add New
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
                                                <th>Notice Details</th>
                                                <th>Status</th>
                                                <th>Created at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_data as $val) : ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $val->description; ?></td>
                                                    <td>
                                                        <?php
                                                            if($val->status == 1) {
                                                                echo 'Active';
                                                            }
                                                            else if($val->status == 0) {
                                                                echo 'Inactive';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?=$val->created_at?></td>
                                                    <td>
                                                        <a
                                                        class="notice-modal btn btn-xs btn-success"
                                                        data-id="<?php echo $val->id; ?>"
                                                        data-message="<?php echo $val->description; ?>"
                                                        data-status="<?php echo $val->status; ?>"
                                                        data-toggle="modal"
                                                        data-target="#editNoticeModal"
                                                        title="Edit Notice">
                                                            Edit
                                                        </a>

                                                        <a class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to remove this notice?');" title="Delete Notice" href="<?= base_url('admin/remove_notice/'.$val->id); ?>">
                                                            Delete
                                                        </a>
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

        <div id="createNoticeModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add Notice</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url('admin/add_notice'); ?>" method="POST">

                                    <div class="form-group">
                                        <label for="match_status" class="control-label mb-1">Notice Description</label>
                                        <textarea name="description" class="form-control" rows="6" required></textarea>
                                    </div>

                                    <div>
                                        <input type="submit" class="btn btn-sm btn-info btn-block" name="submit" value="Submit">
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

        <div id="editNoticeModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Edit Notice</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url('admin/edit_notice'); ?>" method="POST">
                                    <input id="notice_id" type="hidden" name="notice_id">

                                    <div class="form-group">
                                        <label for="match_status" class="control-label mb-1">Notice Description</label>
                                        <textarea id="description" name="description" class="form-control" rows="6" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="match_status" class="control-label mb-1">Status</label>
                                        <select id="status" name="status" class="form-control">
                                            <option value="">-- select --</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div>
                                        <input type="submit" class="btn btn-sm btn-info btn-block" name="submit" value="Submit">
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

    $('.notice-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        var data_message = $(this).attr('data-message');
        var data_status = $(this).attr('data-status');
        $('#notice_id').attr('value', data_id);
        $('#status').val(data_status);
        $('textarea#description').val(data_message);
    });

</script>