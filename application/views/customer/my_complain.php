<?php include(APPPATH . "views/customer/common/header.php"); ?>
<style>
    .table thead tr th {
        font-size: 12px;
    }

    .table td, .table th {
        font-size: 12px;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<div id="wrapper-container">
    <div class="justify-content-center p-0 container-fluid" id="content-container">
        <div id="userProfile">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 card pl-0 pr-0 rounded-0 clearfix">

                <div class="container">

                    <div class="row">

                        <?php include(APPPATH . "views/customer/common/menu.php"); ?>

                        <div class="tab-content col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 p-0">

                            <div id="my-bets" style="padding:20px">

                                <!-- FLASH MESSAGE -->
                                <?php include(APPPATH."views/customer/common/flash.php"); ?>

                                <div class="pull-left">
                                    <h3>My Complain</h3>
                                </div>
                                <div class="pull-right">
                                    <p>
                                        <a class="btn btn-sm btn-danger" href="javascript:void(0);" class="nav-link rounded-0 border-right border-bottom border-left" data-target="#requestComplain" data-toggle="modal">
                                            Add New
                                        </a>
                                    </p>
                                </div>

                                <table class="table table-bordered  ajax-tbl display" style="width:100%">
                                    <thead>
                                    <tr role="row">
                                        <th>Complain To</th>
                                        <!-- <th>Question</th> -->
                                        <th>Complain Description</th>
                                        <th>Answer</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($get_data as $val) : ?>
                                            <tr>
                                                <td><?php echo $val->complain_to ?></td>
                                                <!-- <td><?php //echo $val->subject ?></td> -->
                                                <td><?php echo $val->message ?></td>
                                                <td><?php echo $val->reply ?></td>
                                                <td><?php echo $val->created_at ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.ajax-tbl').DataTable({
            "scrollX": true,
            ordering: false
        });
    } );
</script>