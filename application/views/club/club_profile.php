<?php include(APPPATH . "views/club/common/header.php"); ?>
<style>
    .table thead tr th {
        font-size: 12px;
    }

    .table td, .table th {
        font-size: 12px;
    }
</style>

<div id="wrapper-container">
    <div class="justify-content-center p-0 container-fluid" id="content-container">
        <div id="userProfile">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 card pl-0 pr-0 rounded-0 clearfix">

                <div class="container">

                    <div class="row">

                        <?php include(APPPATH . "views/club/common/menu.php"); ?>

                        <div class="tab-content col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 p-0">

                            <div id="my-bets" style="padding:20px">
                                <h4>View Club Profile</h4>
                                <!-- Profile Area -->
                                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Club Name</th>
                                                <td><?php echo $club_name; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Username</th>
                                                <td><?php echo $username; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Mobile No.</th>
                                                <td><?php echo $club_mobile; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo $club_email; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Club Ratio</th>
                                                <td><?php echo $show_ratio; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Total Club Member</th>
                                                <td><?php echo $total_member; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Profile Area -->
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<!-- Footer -->
<?php include(APPPATH . "views/footer.php"); ?>