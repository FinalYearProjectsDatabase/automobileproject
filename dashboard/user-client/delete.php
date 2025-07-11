<?php require('../../models/session.php') ?>
<?php require('../../config/index-settings.php');?>

<?php include ('../components/head.php'); ?>

<!-- header start -->
<?php include ('../components/header.php'); ?>
<!-- header end -->

<!-- main sidebar start -->
<?php include ('../components/menu.php'); ?>
<!-- main sidebar end -->

<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-30">
        <h2>Clients</h2>
    </div>
    <div class="row">
        <div class="alert" id="alert-notice"></div>
        <div class="col-xxl-4">
            <div class="panel">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" Method="post" enctype="multipart/form-data" id="delete-user-client">
                    <div class="panel-header">
                        <h4>Delete Client</h4>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <h4 id="notice" class="text-danger"></h4>
                            <input type="hidden" name="user_client_id">
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xxl-8">
            <div class="panel">
                <div class="panel-header">
                    <h4>TableView</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-dashed recent-order-table" id="clientsTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Registration</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer start -->
<?php include ('../components/version.php') ?>
<!-- footer end -->
</div>
<!-- main content end -->

<?php include ('../components/footer.php') ?>

<script src="../../models/admin/user-client/js/user-client-script.js"></script>
<script src="../../models/admin/user-client/js/datatables-script.js"></script>