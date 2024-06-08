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
        <h2>Service</h2>
    </div>
    <div class="row">
        <div class="alert" id="alert-notice"></div>
        <div class="col-xxl-4">
            <div class="panel">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" Method="post" enctype="multipart/form-data" id="new-service">
                    <div class="panel-header">
                        <h4>New Service</h4>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label class="form-label">Vendor</label>
                            <select name="service_vendor" class="form-control" required></select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select name="service_type" class="form-control" required>
                                <option>Choose</option>
                                <option value="Electrical Mechanic">Electrical Mechanic</option>
                                <option value="Fitting Mechanic">Fitting Mechanic</option>
                                <option value="Towing Mechanic">Towing Mechanic</option>
                                <option value="Body Works Mechanic">Body Works Mechanic</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="service_description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Featured Image</label>
                            <input type="file" name="service_image" class="form-control">
                        </div>                        
                        <div class="mb-3">
                            <label class="form-label">Location. Use GHANA GPS Address</label>
                            <input type="text" name="service_location" class="form-control">
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-danger">Save</button>
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
                    <table class="table table-dashed recent-order-table" id="servicesTable">
                        <thead>
                            <tr>
                                <th>Vendor</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Status</th>
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

<script src="../../models/admin/service/js/service-script.js"></script>
<script src="../../models/admin/service/js/datatables-script.js"></script>