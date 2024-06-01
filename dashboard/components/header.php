<div class="header">
    <div class="row g-0 align-items-center">
        <div class="col-xxl-6 col-xl-5 col-4 d-flex align-items-center gap-20">
            <div class="main-logo d-lg-block d-none">
                <div class="logo-big">
                    <a href="<?php echo BASE_URL.'/dashboard/'; ?>">
                        <p class="text-danger"><b><?php echo PROJECT_NAME; ?></b></p>
                    </a>
                </div>
                <div class="logo-small">
                    <a href="<?php echo BASE_URL.'/dashboard/'; ?>">
                    <p class="text-danger"><b><?php echo PROJECT_NAME; ?></b></p>
                    </a>
                </div>
            </div>
            <div class="nav-close-btn">
                <button id="navClose"><i class="fa-light fa-bars-sort"></i></button>
            </div>
            <a href="<?php echo BASE_URL ?>" target="_blank" class="btn btn-sm btn-primary site-view-btn"><i class="fa-light fa-globe me-1"></i> <span>View Website</span></a>
        </div>
        <div class="col-4 d-lg-none">
            <div class="mobile-logo">
                <a href="<?php echo BASE_URL.'/dashboard/'; ?>">
                <p class="text-danger"><b><?php echo PROJECT_NAME; ?></b></p>
                </a>
            </div>
        </div>
        <div class="col-xxl-6 col-xl-7 col-lg-8 col-4">
            <div class="header-right-btns d-flex justify-content-end align-items-center">
                <div class="header-collapse-group">
                    <div class="header-right-btns d-flex justify-content-end align-items-center p-0">
                        <div class="header-right-btns d-flex justify-content-end align-items-center p-0">                            
                            <button class="header-btn fullscreen-btn" id="btnFullscreen"><i class="fa-light fa-expand"></i></button>
                        </div>
                    </div>
                </div>
                <button class="header-btn header-collapse-group-btn d-lg-none"><i class="fa-light fa-ellipsis-vertical"></i></button>
                <div class="header-btn-box">
                    <button class="profile-btn" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="assets/images/admin.png" alt="image">
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                        <li>
                            <div class="dropdown-txt text-center">
                                <p class="mb-0"><?php echo $_SESSION['name']?></p>
                                <span class="d-block"><?php echo $_SESSION['user_type_name']?></span>
                            </div>
                        </li>
                        <li><a class="dropdown-item" href=""><span class="dropdown-icon"><i class="fa-regular fa-circle-user"></i></span> Profile</a></li>
                        <li><a class="dropdown-item" href="../../models/logout.php"><span class="dropdown-icon"><i class="fa-regular fa-arrow-right-from-bracket"></i></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>