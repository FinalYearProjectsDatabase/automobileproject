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
        <h2>Orders</h2>
    </div>
    <div class="row">
        <div class="alert" id="alert-notice"></div>
        <div class="col-xxl-12">
            <div class="panel">
                <div class="panel-header">
                    <h4>TableView</h4>
                </div>
                <div class="panel-body">
                    <input type="hidden" id="user_id" value="<?php echo $user_id;?>">
                    <input type="hidden" id="user_type" value="<?php echo $user_type;?>">
                    <table class="table table-dashed recent-order-table" id="ordersTable">
                        <thead>
                            <tr>
                                <th>Ordering Date</th>
                                <th>Order ID</th>
                                <th>Client Name</th>
                                <th>Client Contact</th>
                                <th>Client Location</th>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Amount Due</th>
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

<!-- <script src="../../models/admin/booking/js/booking-script.js"></script> -->
<script src="../../models/admin/order/js/datatables-script.js"></script>