<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration | fiX-AutoMobile</title>
    
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="assets/vendor/css/all.min.css">
    <link rel="stylesheet" href="assets/vendor/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="assets/vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" id="primaryColor" href="assets/css/orange-color.css">
    <link rel="stylesheet" id="rtlStyle" href="#">
</head>
<body class="light-theme">

    <!-- main content start -->
    <div class="main-content login-panel">
        <div class="login-body">
            <div class="top d-flex justify-content-between align-items-center">
                <div class="logo">
                    <p class="fw-bold text-danger ">fiX-AutoMobile</p>
                </div>
                <a href="/"><i class="fa-duotone fa-house-chimney"></i></a>
            </div>
            <div class="bottom">
                <h3 class="panel-title">Registration</h3>
                <form>
                    <div class="input-group mb-30">
                        <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="input-group mb-30">
                        <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="input-group mb-30">
                        <span class="input-group-text"><i class="fa-regular fa-cog"></i></span>
                        <select class="form-control rounded-end" name="user_type" placeholder="Select your Account Type">
                            <option value>Choose your account type</option>
                            <option value="Client">Client</option>
                            <option value="Vendor">Vendor</option>
                        </select>
                    </div>
                    <!-- <div class="form-group mb-30">
                        <label>User Type</label>
                        <select class="form-control rounded-end" name="user_type">
                            <option value>Choose</option>
                            <option value="Client">Client</option>
                            <option value="Vendor">Vendor</option>
                        </select>
                    </div> -->
                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-lock"></i></span>
                        <input type="password" class="form-control rounded-end" placeholder="Password">
                        <a role="button" class="password-show"><i class="fa-duotone fa-eye"></i></a>
                    </div>
                    <div class="d-flex justify-content-between mb-30">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="loginCheckbox">
                            <label class="form-check-label text-white" for="loginCheckbox">
                                I agree <a href="#" class="text-white text-decoration-underline">Terms & Policy</a>
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 login-btn">Sign up</button>
                </form>
            </div>
        </div>

        <!-- footer start -->
        <div class="footer">
            <p>Copyright© <script>document.write(new Date().getFullYear())</script></p>
        </div>
        <!-- footer end -->
    </div>
    <!-- main content end -->
    
    <script src="assets/vendor/js/jquery-3.6.0.min.js"></script>
    <script src="assets/vendor/js/jquery.overlayScrollbars.min.js"></script>
    <script src="assets/vendor/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>