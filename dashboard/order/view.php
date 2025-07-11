<?php require ('../../models/session.php') ?>
<?php require ('../../config/index-settings.php'); ?>
<?php
require ('../../config/db-parameters.php');

require ('../../controllers/DataBaseClass.php');

require ('../../controllers/BookingClass.php');

$bookingObj = new BookingClass;
?>

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
        <h2>Bookings</h2>
    </div>
    <?php
    if (isset($_POST["submit"])) {
        $booking_id = filter_input(INPUT_POST, "booking_id", FILTER_SANITIZE_SPECIAL_CHARS);
        $booking_status = filter_input(INPUT_POST, "booking_status", FILTER_SANITIZE_SPECIAL_CHARS);

        $updateBooking = $bookingObj->update_booking($booking_id, $booking_status);

        $response = json_decode($updateBooking);

        if ($response->status == 200) {
            echo '<div class="alert alert-success">'.$response->msg.'</div>';
        } else {
            echo '<div class="alert alert-danger">'.$response->msg.'</div>';
        }
    }

    if (isset($_GET['booking_id']) && $_GET["booking_id"]) {
        $booking_id = filter_input(INPUT_GET, "booking_id", FILTER_SANITIZE_SPECIAL_CHARS);

        $getBooking = $bookingObj->get_booking($booking_id);

        $response = json_decode($getBooking);

        ?>
        <div class="row">
            <div class="alert" id="alert-notice"></div>
            <div class="col-xxl-6">
                <div class="panel">
                    <form action="" Method="post" id="view-booking">
                        <div class="panel-header">
                            <h4>View Booking</h4>
                        </div>
                        <div class="panel-body">
                            <div class="mb-3">
                                <label class="form-label" for="formGroupExampleInput">Client Name</label>
                                <input type="text" name="user_booking_name" class="form-control" id="formGroupExampleInput"
                                    readonly value="<?php echo $response->booking_user_name ?>">
                                <input type="hidden" name="booking_id" value="<?php echo $booking_id ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formGroupExampleInput">Client Contact</label>
                                <input type="text" name="user_booking_contact" class="form-control"
                                    id="formGroupExampleInput" readonly
                                    value="<?php echo $response->booking_user_contact ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formGroupExampleInput">Client Email</label>
                                <input type="text" name="user_booking_email" class="form-control" id="formGroupExampleInput"
                                    readonly value="<?php echo $response->booking_user_email ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formGroupExampleInput">Client Location</label>
                                <input type="text" name="user_booking_location" class="form-control"
                                    id="formGroupExampleInput" readonly
                                    value="<?php echo $response->booking_user_location ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formGroupExampleInput">Vehicle Type, Color, License
                                    Plate</label>
                                <textarea name="user_booking_vehicle" class="form-control"
                                    readonly><?php echo $response->booking_user_vehicle_details ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formGroupExampleInput">Description</label>
                                <textarea name="user_booking_description" class="form-control"
                                    readonly> <?php echo $response->booking_user_description ?> </textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formGroupExampleInput">Booking Date</label>
                                <input type="date" name="user_booking_date" class="form-control" readonly
                                    value="<?php echo $response->booking_date ?>">
                            </div>
                            <div class="mb-3 text-center" id="show-booking-img"></div>
                            <div class="mb-3">
                                <label class="form-label">Vendor</label>
                                <input type="hidden" name="booking_vendor" class="form-control" readonly
                                    value="<?php echo $response->vendor_name ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Service Type</label>
                                <select name="booking_type" class="form-control" readonly>
                                    <option value="<?php echo $response->service_type ?>">
                                        <?php echo $response->service_type ?></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Service Description</label>
                                <textarea name="booking_description" class="form-control"
                                    readonly><?php echo $response->service_description ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Service Location</label>
                                <input type="text" name="service" class="form-control" readonly
                                    value="<?php echo $response->service_location ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status : <?php
                                if ($response->booking_status == 1) {
                                    echo 'AWAITING CONFIRMATION';
                                } elseif ($response->booking_status == 2) {
                                    echo 'CONFIRMED';
                                } elseif ($response->booking_status == 3) {
                                    echo 'DISPATCHED';
                                } elseif ($response->booking_status == 4) {
                                    echo 'COMPLETED';
                                } elseif ($response->booking_status == 5) {
                                    echo 'CANCELLED';
                                }
                                ?></label>
                                <select name="booking_status" class="form-control" required>
                                    <option value="">Choose</option>
                                    <option value="2">CONFIRMED</option>
                                    <option value="3">DISPATCHED</option>
                                    <option value="4">COMPLETED</option>
                                    <option value="5">CANCELLED</option>
                                </select>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-danger" name="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xxl-6">
                <div class="panel">
                    <div class="panel-header">
                        <h4>Diagnostic Image</h4>
                    </div>
                    <div class="panel-body">
                        <img src="../../booking-images/<?php echo $response->booking_user_files ?>">
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<!-- footer start -->
<?php include ('../components/version.php') ?>
<!-- footer end -->
</div>
<!-- main content end -->

<?php include ('../components/footer.php') ?>

<script src="../../models/admin/booking/js/booking-script.js"></script>
<script src="../../models/admin/booking/js/datatables-script.js"></script>