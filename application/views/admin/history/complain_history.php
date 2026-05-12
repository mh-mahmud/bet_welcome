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
                        <h3>Customer Complain History</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input placeholder="search by username, complain to, message, or reply etc" type="text" class="form-control" name="search_data" required>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" name="submit" class="form-control btn btn-success" value="Submit">
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="portlet-body">

                                    <table class="table table-striped table-bordered table-hover  order-column ajax-tbl">
                                        <thead>
                                            <tr>
                                                <th>Customer Name</th>
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
                                                        <!-- <a class="complain-modal" data-id="<?php //echo $val->id; ?>" data-toggle="modal" data-target="#scrollmodal6" title="Reply to this Complain"><i style="color:green" class="fa fa-2x fa-check-square-o icon-edit"></i></a> -->

                                                        <a
                                                        onclick="return confirm('Are you sure to remove this complain?');"
                                                        class="btn btn-xs btn-danger"
                                                        title="Delete Withdraw"
                                                        href="<?= base_url('remove_complain/'.$val->id); ?>">
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
            

            <!-- BEGIN QUICK SIDEBAR -->
                <!-- deleted all the codes of this section -->
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->

<?php include(APPPATH."views/admin/common/footer.php"); ?>
<script>
    $(document).ready(function() {
        $('.ajax-tbl').DataTable({
            // "scrollX": true,
            ordering: false
        });
    } );
</script>