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

                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Dashboard
                                <!-- <small>dashboard & statistics</small> -->
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        
                    </div>
                    <!-- END PAGE HEAD-->

                    <?php if($this->session->userdata('admin_access_data')->role_data=='super_admin') : ?>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat blue">
                                    <div class="visual">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?= $sum_data->total_user ?>"><?= $sum_data->total_user ?></span>
                                        </div>
                                        <div class="desc"> Total User </div>
                                    </div>
                                    <a class="more" href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat red">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?= $sum_data->total_club ?>"><?= $sum_data->total_club ?></div>
                                        <div class="desc"> Total Club  </div>
                                    </div>
                                    <a class="more" href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat green">
                                    <div class="visual">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?= $sum_data->total_deposit ?>"><?= $sum_data->total_deposit ?></span>
                                        </div>
                                        <div class="desc"> Total Deposit </div>
                                    </div>
                                    <a class="more" href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat purple">
                                    <div class="visual">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?= $sum_data->total_withdraw ?>"><?= $sum_data->total_withdraw ?></span>
                                        </div>
                                        <div class="desc"> Total Withdraw </div>
                                    </div>
                                    <a class="more" href="javascript:;">&nbsp;</a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat blue">
                                    <div class="visual">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?= $sum_data->total_balance_transfer ?>"><?= $sum_data->total_balance_transfer ?></span>
                                        </div>
                                        <div class="desc"> Total Coin Transfer </div>
                                    </div>
                                    <a class="more" href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat red">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?= $sum_data->total_club_withdraw ?>"><?= $sum_data->total_club_withdraw ?></span></div>
                                        <div class="desc"> Total Club Withdraw </div>
                                    </div>
                                    <a class="more" href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat green">
                                    <div class="visual">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?= $sum_data->live ?>"><?= $sum_data->live ?></span>
                                        </div>
                                        <div class="desc"> Live Match </div>
                                    </div>
                                    <a class="more" href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat purple">
                                    <div class="visual">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?= $sum_data->in_play ?>"><?= $sum_data->in_play ?></span>
                                        </div>
                                        <div class="desc"> In Play Match </div>
                                    </div>
                                    <a class="more" href="javascript:;">&nbsp;</a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat yellow">
                                    <div class="visual">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?= $sum_data->upcoming ?>"><?= $sum_data->upcoming ?></span></div>
                                        <div class="desc"> Upcoming Match </div>
                                    </div>
                                    <a class="more" href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!-- END DASHBOARD STATS 1-->
                        

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-users font-purple"></i>
                                            <span class="caption-subject font-purple bold uppercase">New Registration</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">

                                        <table class="table table-striped table-bordered table-hover  order-column ajax-tbl">
                                            <thead>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($get_users as $val) : ?>
                                                    <tr>
                                                        <td><?php echo $val->name; ?></td>
                                                        <td><?php echo $val->username; ?></td>
                                                        <td><?php echo $val->email; ?></td>
                                                        <td><?php echo $val->phone; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-settings font-purple"></i>
                                            <span class="caption-subject font-purple bold uppercase">New Deposit Request</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">

                                        <table class="table table-striped table-bordered table-hover  order-column ajax-tbl">
                                            <thead>
                                                <tr>
                                                    <th>User Name</th>
                                                    <th>Amount</th>
                                                    <th>Method</th>
                                                    <th>From</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($get_deposit as $val) : ?>
                                                    <tr>
                                                        <td><?php echo $val->username; ?></td>
                                                        <td><?php echo $val->amount; ?></td>
                                                        <td><?php echo $val->payment_method; ?></td>
                                                        <td><?php echo $val->user_phone; ?></td>
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
                            </div>

                        </div>
                    <?php endif; ?>


                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            

        </div>
        <!-- END CONTAINER -->

<?php include(APPPATH."views/admin/common/footer.php"); ?>