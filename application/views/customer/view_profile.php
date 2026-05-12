<?php include(APPPATH . "views/customer/common/header.php"); ?>

<div id="wrapper-container">
    <div class="justify-content-center p-0 container-fluid" id="content-container">
        <div id="userProfile">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 card pl-0 pr-0 rounded-0 clearfix">

                <div class="container">

                    <div class="row">

                        <?php include(APPPATH . "views/customer/common/menu.php"); ?>

                        <div class="tab-content col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 p-0">

                            <div id="my-bets" style="padding:20px">
                                <h3>View Profile</h3>
                                <!-- Profile Area -->
                                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Full Name</th>
                                                <td><?php echo $name; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Username</th>
                                                <td><?php echo $username; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Mobile No.</th>
                                                <td><?php echo $phone; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Country</th>
                                                <td><?php echo $country; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo $email_add; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Referred By</th>
                                                <td><?php echo $sponsor_name; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Club</th>
                                                <td>
                                                    <select class=" form-control">
                                                        <option value="">-- select --</option>
                                                        <?php foreach($club_names as $val) : ?>
                                                            <option <?php echo ($club_id==$val->id) ? "selected" : ""; ?> value="<?php echo $val->id; ?>"><?php echo $val->club_name; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>

                                                    <button @click="save_sponsor_and_club_confirmation_modal('club', 'Do you really want to change club?')" type="button" class="btn btn-dark mx-auto rounded-0 border-0 bg-yellow text-dark font-weight-bold mt-5">Change Club</button>
                                                </td>
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
<?php //include(APPPATH . "views/customer/common/footer.php"); ?>
<?php include(APPPATH . "views/footer.php"); ?>