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

                    <!-- FLASH MESSAGE -->
                    <?php include(APPPATH."views/admin/common/flash.php"); ?>

                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="m-heading-1 border-green m-bordered">
                        <h3>Customer Deposit History</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">

                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input placeholder="search by username, club name, account number, method or type etc" type="text" class="form-control" name="search_data" required>
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
                                                <th>Date</th>
                                                <th>Userid</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Amount</th>
                                                <th>Trxn #</th>
                                                <th>Method</th>
                                                <th>Note</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_data as $val) : ?>
                                                <tr class="odd gradeX">

                                                    <td><?php echo $val->created_at; ?></td>
                                                    <td><?php echo $val->username; ?></td>
                                                    <td><?php echo $val->user_phone; ?></td>
                                                    <td><?php echo $val->admin_account; ?></td>
                                                    <td><?php echo $val->amount; ?></td>
                                                    <td><?php echo $val->transaction_id; ?></td>
                                                    <td><?php echo $val->payment_method; ?></td>
                                                    <td><?php echo $val->deposit_note; ?></td>
                                                    <td>
                                                        <?php if($val->status=='PENDING') { ?>
                                                            <span class="badge badge-warning">pending</span>
                                                        <?php } else if($val->status=='SUCCESS') { ?>
                                                            <span class="badge badge-success">success</span>
                                                        <?php } else if($val->status=='CANCEL') { ?>
                                                            <span class="badge badge-danger">reject</span>
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

<?php include(APPPATH."views/admin/common/footer.php"); ?>
<script>
    $(document).ready(function() {
        $('.ajax-tbl').DataTable({
            // "scrollX": true,
            ordering: false
        });
    } );
</script>