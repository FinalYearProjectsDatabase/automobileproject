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
        <h2>Products</h2>
    </div>
    <div class="row">
        <div class="alert" id="alert-notice"></div>
        <div class="col-xxl-4">
            <div class="panel">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" Method="post" enctype="multipart/form-data" id="view-product">
                    <div class="panel-header">
                        <h4>View Product</h4>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3 text-center" id="show-product-img"></div>
                        <div class="mb-3">
                            <label class="form-label" for="formGroupExampleInput">Name</label>
                            <input type="text" name="product_name" class="form-control" id="formGroupExampleInput" required>
                            <input type="hidden" name="product_id">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="product_description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Featured Image</label>
                            <input type="file" name="product_image" class="form-control">
                            <input type="hidden" name="fetch_product_image">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Vendor</label>
                            <select name="product_vendor" class="form-control" required></select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select name="product_type" class="form-control" required>
                                <option>Choose</option>
                                <option value="Electrical Mechanic">Electrical Mechanic</option>
                                <option value="Fitting Mechanic">Fitting Mechanic</option>
                                <option value="Towing Mechanic">Towing Mechanic</option>
                                <option value="Body Works Mechanic">Body Works Mechanic</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" name="product_price" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="product_status" class="form-control" required>
                                <option>Choose</option>
                                <option value="1">AVAILABLE</option>
                                <option value="2">UNAVAILABLE</option>
                            </select>
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
                    <table class="table table-dashed recent-order-table" id="productsTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Type</th>
                                <th>Posting Date</th>
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

<script src="../../models/admin/product/js/product-script.js"></script>
<script src="../../models/admin/product/js/datatables-script.js"></script>