<?php
    if($_SESSION["user_type"] == 1){
?>
    <div class="main-sidebar flush-menu">
        <div class="main-menu">
            <ul class="sidebar-menu scrollable">
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/'; ?>" class="sidebar-link active"><span class="nav-icon"><i
                                        class="fa-light fa-grid-2"></i></span> <span
                                    class="sidebar-txt">Dashboard</span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/user-client/'; ?>" class="sidebar-link">
                                <span class="nav-icon">
                                <i class="fa-solid fa-user"></i>
                                </span> 
                                <span class="sidebar-txt">Clients</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/user-vendor/'; ?>" class="sidebar-link">
                                <span class="nav-icon">
                                <i class="fa-solid fa-user"></i>
                                </span> 
                                <span class="sidebar-txt">Vendors</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/post/'; ?>" class="sidebar-link">
                                <span class="nav-icon">
                                <i class="fa-solid fa-book"></i>
                                </span> 
                                <span class="sidebar-txt">Posts</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/product/'; ?>" class="sidebar-link">
                                <span class="nav-icon">
                                <i class="fa-solid fa-boxes"></i>
                                </span> 
                                <span class="sidebar-txt">Products</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/service/'; ?>" class="sidebar-link">
                                <span class="nav-icon">
                                <i class="fa-solid fa-boxes"></i>
                                </span> 
                                <span class="sidebar-txt">Services</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/booking/'; ?>" class="sidebar-link">
                                <span class="nav-icon">
                                <i class="fa-solid fa-file-invoice"></i>
                                </span> 
                                <span class="sidebar-txt">Bookings</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/order/'; ?>" class="sidebar-link">
                                <span class="nav-icon">
                                <i class="fa-solid fa-shopping-cart"></i>
                                </span> 
                                <span class="sidebar-txt">Orders</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
<?php
    }elseif($_SESSION["user_type"] == 2){
?>
    <div class="main-sidebar flush-menu">
        <div class="main-menu">
            <ul class="sidebar-menu scrollable">
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/'; ?>" class="sidebar-link active"><span class="nav-icon"><i
                                        class="fa-light fa-grid-2"></i></span> <span
                                    class="sidebar-txt">Dashboard</span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/booking/'; ?>" class="sidebar-link">
                                <span class="nav-icon">
                                <i class="fa-solid fa-file-invoice"></i>
                                </span> 
                                <span class="sidebar-txt">Bookings</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/order/'; ?>" class="sidebar-link">
                                <span class="nav-icon">
                                <i class="fa-solid fa-shopping-cart"></i>
                                </span> 
                                <span class="sidebar-txt">Orders</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
<?php
    }elseif($_SESSION["user_type"] == 3){
?>
    <div class="main-sidebar flush-menu">
        <div class="main-menu">
            <ul class="sidebar-menu scrollable">
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/'; ?>" class="sidebar-link active"><span class="nav-icon"><i
                                        class="fa-light fa-grid-2"></i></span> <span
                                    class="sidebar-txt">Dashboard</span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/product/'; ?>" class="sidebar-link">
                                <span class="nav-icon">
                                <i class="fa-solid fa-boxes"></i>
                                </span> 
                                <span class="sidebar-txt">Products</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/service/'; ?>" class="sidebar-link">
                                <span class="nav-icon">
                                <i class="fa-solid fa-boxes"></i>
                                </span> 
                                <span class="sidebar-txt">Services</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/booking/'; ?>" class="sidebar-link">
                                <span class="nav-icon">
                                <i class="fa-solid fa-file-invoice"></i>
                                </span> 
                                <span class="sidebar-txt">Bookings</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="<?php echo BASE_URL.'/dashboard/order/'; ?>" class="sidebar-link">
                                <span class="nav-icon">
                                <i class="fa-solid fa-shopping-cart"></i>
                                </span> 
                                <span class="sidebar-txt">Orders</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
<?php
    }
?>

