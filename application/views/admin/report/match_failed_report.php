<?php include(APPPATH."views/admin/common/header.php"); ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Match Failed</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <!-- <li><a style="font-size: 13px;" class="btn btn-success btn-sm" href="#">Add New</a></li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-3">
                <section class="card">
                    <div class="card-body text-secondary">
                        <input type="text" class="form-control datepicker" placeholder="Start Date">
                    </div>
                </section>
            </div>
            <div class="col-lg-3">
                <section class="card">
                    <div class="card-body text-secondary">
                        <input type="text" class="form-control datepicker" placeholder="End Date">
                    </div>
                </section>
            </div>
            <div class="col-lg-3">
                <section class="card">
                    <div class="card-body text-secondary">
                        <select name="select" id="select" class="form-control">
                            <option value="0">Please select</option>
                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                </section>
            </div>
            <div class="col-lg-3">
                <section class="card">
                    <div class="card-body text-secondary">
                        <select name="select" id="select" class="form-control">
                            <option value="0">Please select</option>
                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                </section>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">&nbsp;</strong>
                    </div>
                    <div class="card-body" style="height: 500px;">
<!--                        <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive" style="max-width:940px;">-->
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th>Option one</th>
                                <th>Option two</th>
                                <th>Option three</th>
                                <th>Option four</th>
                                <th>Option five</th>
                            </tr>
                            </thead>
                            <label class="label-succes"></label>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div>

<?php include(APPPATH."views/admin/common/table_footer.php"); ?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( ".datepicker" ).datepicker();
</script>
