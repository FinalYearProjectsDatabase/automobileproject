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
        <h2>Vendors</h2>
    </div>
    <div class="row">
        <div class="alert" id="alert-notice"></div>
        <div class="col-xxl-4">
            <div class="panel">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" id="view-user-vendor">
                    <div class="panel-header">
                        <h4>Update Vendor</h4>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label class="form-label" for="formGroupExampleInput">Name</label>
                            <input type="text" name="user_vendor_name" class="form-control" id="formGroupExampleInput">
                            <input type="hidden" name="user_vendor_id">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="user_vendor_dob" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="user_vendor_username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="user_vendor_address" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="user_vendor_email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact</label>
                            <input type="text" name="user_vendor_contact" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Business Name</label>
                            <input type="text" name="user_vendor_business_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Business Registration Number</label>
                            <input type="text" name="user_vendor_reg_number" class="form-control" required>
                        </div>
                        <!-- <div class="mb-3">
                            <label class="form-label">Upload Business Certificate File</label>
                            <input type="file" name="user_vendor_business_file" class="form-control" required>
                        </div> -->
                        <!-- <div class="mb-3">
                            <label class="form-label">Vendor Type</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="filterDeliveryStatus" name="vendor_type[]" value="Electrical Mechanic">
                                <label class="form-check-label" for="filterDeliveryStatus">
                                    Electrical Mechanic
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="filterDeliveryStatus" name="vendor_type[]" value="Fitting Mechanic">
                                <label class="form-check-label" for="filterDeliveryStatus">
                                    Fitting Mechanic
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="filterDeliveryStatus" name="vendor_type[]" value="Towing Mechanic">
                                <label class="form-check-label" for="filterDeliveryStatus">
                                    Towing Mechanic
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="filterDeliveryStatus" name="vendor_type[]" value="Body Works">
                                <label class="form-check-label" for="filterDeliveryStatus">
                                    Body Works Mechanic
                                </label>
                            </div>
                        </div> -->
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-danger">Update</button>
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
                    <table class="table table-dashed recent-order-table" id="vendorsTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Business Name</th>
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

<script src="../../models/admin/user-vendor/js/user-vendor-script.js"></script>
<script src="../../models/admin/user-vendor/js/datatables-script.js"></script>