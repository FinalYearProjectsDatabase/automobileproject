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
            <!-- <li class="sidebar-item">
                <a role="button" class="sidebar-link-group-title has-sub">Apps</a>
                <ul class="sidebar-link-group">
                    <li class="sidebar-dropdown-item">
                        <a href="dashboard-all-customer.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-user-group"></i></span> <span class="sidebar-txt">All
                                Customer</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="dashboard-add-product.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-plus-square"></i></span> <span class="sidebar-txt">Add
                                Product</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="dashboard-all-product.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-boxes"></i></span> <span class="sidebar-txt">All
                                Product</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="dashboard-category.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-tag"></i></span> <span class="sidebar-txt">Category</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="dashboard-order.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-cart-shopping-fast"></i></span> <span
                                class="sidebar-txt">Order</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="dashboard-calendar.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-calendar"></i></span> <span
                                class="sidebar-txt">Calendar</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="dashboard-invoices.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-file-invoice"></i></span> <span
                                class="sidebar-txt">Invoices</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="dashboard-contact.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-user-plus"></i></span> <span
                                class="sidebar-txt">Contacts</span></a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a role="button" class="sidebar-link-group-title has-sub">Pages</a>
                <ul class="sidebar-link-group">
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="authDropdown"><span
                                class="nav-icon"><i class="fa-light fa-user-cog"></i></span> <span
                                class="sidebar-txt">Authentication</span></a>
                        <ul class="sidebar-dropdown-menu" id="authDropdown">
                            <li class="sidebar-dropdown-item"><a href="dashboard-login.html"
                                    class="sidebar-link">Login</a></li>
                            <li class="sidebar-dropdown-item"><a href="dashboard-registration.html"
                                    class="sidebar-link">Registration</a></li>
                            <li class="sidebar-dropdown-item"><a href="dashboard-reset-password.html"
                                    class="sidebar-link">Reset Password</a></li>
                            <li class="sidebar-dropdown-item"><a href="dashboard-update-password.html"
                                    class="sidebar-link">Update Password</a></li>
                            <li class="sidebar-dropdown-item"><a href="dashboard-login-status.html"
                                    class="sidebar-link">Login Status</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="userDropdown"><span
                                class="nav-icon"><i class="fa-light fa-user"></i></span> <span
                                class="sidebar-txt">User</span></a>
                        <ul class="sidebar-dropdown-menu" id="userDropdown">
                            <li class="sidebar-dropdown-item"><a href="dashboard-view-profile.html"
                                    class="sidebar-link">View Profile</a></li>
                            <li class="sidebar-dropdown-item"><a href="dashboard-edit-profile.html"
                                    class="sidebar-link">Edit Profile</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="dashboard-utility.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-layer-group"></i></span> <span
                                class="sidebar-txt">Utility</span></a>
                    </li>
                </ul>
            </li> -->
            <!-- <li class="sidebar-item">
                <a role="button" class="sidebar-link-group-title has-sub">Components</a>
                <ul class="sidebar-link-group">
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="advanceUiDropdown"><span
                                class="nav-icon"><i class="fa-light fa-layer-group"></i></span> <span
                                class="sidebar-txt">Advance UI</span></a>
                        <ul class="sidebar-dropdown-menu" id="advanceUiDropdown">
                            <li class="sidebar-dropdown-item"><a href="dashboard-sweet-alert.html"
                                    class="sidebar-link">Sweet Alert</a></li>
                            <li class="sidebar-dropdown-item"><a href="dashboard-nestable-list.html"
                                    class="sidebar-link">Nestable List</a></li>
                            <li class="sidebar-dropdown-item"><a href="dashboard-animation.html"
                                    class="sidebar-link">Animation</a></li>
                            <li class="sidebar-dropdown-item"><a href="dashboard-swiper-slider.html"
                                    class="sidebar-link">Swiper Slider</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="dashboard-form.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-memo-pad"></i></span> <span class="sidebar-txt">Forms</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="dashboard-table.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-table"></i></span> <span class="sidebar-txt">Tables</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="dashboard-charts.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-chart-simple"></i></span> <span
                                class="sidebar-txt">Charts</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="dashboard-icon.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-compass-drafting"></i></span> <span
                                class="sidebar-txt">Icons</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="dashboard-map.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-location-dot"></i></span> <span
                                class="sidebar-txt">Maps</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="dashboard-file-manager.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-folder-open"></i></span> <span class="sidebar-txt">File
                                Manager</span></a>
                    </li>
                </ul>
            </li> -->
        </ul>
    </div>
</div>