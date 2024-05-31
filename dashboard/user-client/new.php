<?php require('../../config/index-settings.php');?>

<?php include('components/head.php');?>

    <!-- header start -->
    <?php include('components/header.php');?>
    <!-- header end -->

    <!-- main sidebar start -->
    <?php include('components/menu.php');?>
    <!-- main sidebar end -->

    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-30">
            <h2>Clients</h2>
        </div>
        <div class="row">
            <div class="col-xxl-12">
                <form method="post" id="new-user-client" enctype="multipart/form-data">
                    <div class="panel">
                        <div class="panel-header">
                            <h4>New Client</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col">
                                    <label>Name</label>
                                    <input type="text" class="form-control-lg" name="user_client_name">
                                </div>
                                <div class="col">
                                    <label>Contact</label>
                                    <input type="text" class="form-control-lg" name="user_client_contact">
                                </div>
                                <div class="col">
                                    <label>Email</label>
                                    <input type="text" class="form-control-lg" name="user_client_email">
                                </div>
                                <div class="col">
                                    <label>Region</label>
                                    <select class="form-control-lg" name="user_client_region">
                                        <option>Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-xxl-12">
                                    <label>Address</label>
                                    <textarea name="user_client_address" class="form-control-lg"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <!-- footer start -->
        <?php include('components/version.php')?>
        <!-- footer end -->
    </div>
    <!-- main content end -->
    
<?php include('components/footer.php')?>