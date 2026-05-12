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
                        <h3>Customer Complain</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                
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
                                                <th>Name</th>
                                                <th>Complain To</th>
                                                <!-- <th>Subject</th> -->
                                                <th>Message</th>
                                                <th>Admin Reply</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($complain_data as $val) : ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $val->name; ?></td>
                                                    <td><?= $val->complain_to; ?></td>
                                                    <!-- <td><?php //echo $val->subject; ?></td> -->
                                                    <td><?= $val->message; ?></td>
                                                    <td><?= $val->reply; ?></td>
                                                    <td><?=$val->created_at?></td>
                                                    <td>
                                                    <?php //if( !$val->reply ) { ?>
                                                        <a class="complain-modal btn btn-success btn-xs" data-id="<?php echo $val->id; ?>" data-toggle="modal" data-target="#replyModal" title="Reply to this Complain">
                                                            <!-- <i style="color:green" class="fa fa-2x fa-check-square-o icon-edit"></i> -->
                                                            Reply
                                                        </a>
                                                    <?php //} ?>

                                                        <a class=" btn btn-danger btn-xs" onclick="return confirm('Are you sure to remove this complain?');" title="Delete Complain" href="<?= base_url('remove_complain/'.$val->id); ?>">
                                                            Delete
                                                        </a>

                                                        <?php if( $val->admin_view==0 ) { ?>
                                                        <a class=" btn btn-default btn-xs" onclick="return confirm('Are you sure to view this complain?');" title="View Complain" href="<?= base_url('admin/view_complain/'.$val->id); ?>">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <?php } ?>
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

        <div id="replyModal" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Admin Reply</h4>
                    </div>
                    <div class="modal-body" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url('reply_complain'); ?>" method="POST">
                                    <input id="complain_id" type="hidden" name="complain_id">

                                    <div class="form-group">
                                        <label for="match_status" class="control-label mb-1">Send a reply</label>
                                        <textarea name="reply" class="form-control" rows="4" required></textarea>
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

    $('.complain-modal').on('click', function() {
        var data_id = $(this).attr('data-id');
        $('#complain_id').attr('value', data_id);
    });

</script>