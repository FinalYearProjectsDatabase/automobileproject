<?php require ('../../config/index-settings.php'); ?>

<?php include ('components/head.php'); ?>

<!-- header start -->
<?php include ('components/header.php'); ?>
<!-- header end -->

<!-- main sidebar start -->
<?php include ('components/menu.php'); ?>
<!-- main sidebar end -->

<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-30">
        <h2>Clients</h2>
    </div>
    <div class="row">
        <div class="col-xxl-4">
            <div class="panel">
                <form>
                    <div class="panel-header">
                        <h4>New Client</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="text" name="user_client_name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="user_client_name" class="form-control" placeholder="Date of Birth. e.g:DD/MM/YYYY">
                        </div>
                        <div class="form-group">
                            <input type="text" name="user_client_name" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="text" name="user_client_name" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Contact</label>
                            <input type="text" name="user_client_name" class="form-control" placeholder="Contact">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xxl-8">
            <div class="panel">
                <div class="panel-header">
                    <a class="btn btn-danger" href="new.php">Add New Client</a>
                </div>
                <div class="panel-body">
                    <table class="table table-dashed recent-order-table" id="clientsTable">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Order Date</th>
                                <th>Payment Method</th>
                                <th>Delivery Date</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                    <td>855212</td>
                                    <td>Soward</td>
                                    <td>28/10/22</td>
                                    <td>Cash</td>
                                    <td>02/11/22</td>
                                    <td>$05.22</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td>
                                        <div class="btn-box">
                                            <button><i class="fa-light fa-eye"></i></button>
                                            <button><i class="fa-light fa-pen"></i></button>
                                            <button><i class="fa-light fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>855213</td>
                                    <td>Kian</td>
                                    <td>29/10/22</td>
                                    <td>Card</td>
                                    <td>03/11/22</td>
                                    <td>$17.00</td>
                                    <td><span class="badge bg-primary">Delivered</span></td>
                                    <td>
                                        <div class="btn-box">
                                            <button><i class="fa-light fa-eye"></i></button>
                                            <button><i class="fa-light fa-pen"></i></button>
                                            <button><i class="fa-light fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>855214</td>
                                    <td>Jennifer</td>
                                    <td>29/10/22</td>
                                    <td>Card</td>
                                    <td>03/11/22</td>
                                    <td>$15.22</td>
                                    <td><span class="badge bg-info">Pending</span></td>
                                    <td>
                                        <div class="btn-box">
                                            <button><i class="fa-light fa-eye"></i></button>
                                            <button><i class="fa-light fa-pen"></i></button>
                                            <button><i class="fa-light fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>855215</td>
                                    <td>Benjamin</td>
                                    <td>30/10/22</td>
                                    <td>Cash</td>
                                    <td>03/11/22</td>
                                    <td>$12.15</td>
                                    <td><span class="badge bg-secondary">Unpaid</span></td>
                                    <td>
                                        <div class="btn-box">
                                            <button><i class="fa-light fa-eye"></i></button>
                                            <button><i class="fa-light fa-pen"></i></button>
                                            <button><i class="fa-light fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>855216</td>
                                    <td>Anna</td>
                                    <td>31/10/22</td>
                                    <td>Cheque</td>
                                    <td>04/11/22</td>
                                    <td>$05.35</td>
                                    <td><span class="badge bg-danger">Canceled</span></td>
                                    <td>
                                        <div class="btn-box">
                                            <button><i class="fa-light fa-eye"></i></button>
                                            <button><i class="fa-light fa-pen"></i></button>
                                            <button><i class="fa-light fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>855217</td>
                                    <td>Bradley</td>
                                    <td>01/11/22</td>
                                    <td>Cash</td>
                                    <td>05/11/22</td>
                                    <td>$25.28</td>
                                    <td><span class="badge bg-info">Pending</span></td>
                                    <td>
                                        <div class="btn-box">
                                            <button><i class="fa-light fa-eye"></i></button>
                                            <button><i class="fa-light fa-pen"></i></button>
                                            <button><i class="fa-light fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>855218</td>
                                    <td>Parkinson</td>
                                    <td>03/11/22</td>
                                    <td>Cheque</td>
                                    <td>06/11/22</td>
                                    <td>$32.32</td>
                                    <td><span class="badge bg-info">Pending</span></td>
                                    <td>
                                        <div class="btn-box">
                                            <button><i class="fa-light fa-eye"></i></button>
                                            <button><i class="fa-light fa-pen"></i></button>
                                            <button><i class="fa-light fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer start -->
<?php include ('components/version.php') ?>
<!-- footer end -->
</div>
<!-- main content end -->

<?php include ('components/footer.php') ?>