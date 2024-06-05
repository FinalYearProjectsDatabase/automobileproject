<div class="header rev-10-header rev-14-header">
    <div class="bottom-header">
        <div class="container">
            <div class="row justify-content-center justify-content-sm-between align-items-center g-lg-4 g-0">
                <div class="col-xxl-3 col-lg-2 col-md-3 col-sm-3 col-5">
                    <div class="logo">
                        <a href="/">
                            <p class="fw-bold text-danger ">fiX-AutoMobile</p>
                        </a>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-3 col-sm-4 col-7">
                    <ul class="bottom-header-right d-flex align-items-center justify-content-end">
                        <li class="header-cart-options">

                            <?php
                                if(!isset($_SESSION['user_id']) || !isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['email'])){
                            ?>
                                <a href="auth/login.php">
                                    <i class="fa-light fa-user-lock"></i>
                                    <span class="d-lg-inline d-none">Login</span>
                                </a>
                                <a href="auth/register.php">
                                    <i class="fa-light fa-user-alt"></i>
                                    <span class="d-lg-inline d-none">Register</span>
                                </a>
                            <?php
                                }else{
                            ?>
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
                                            <p class="mb-0"><?php echo $_SESSION['name']?></p>
                                            <span class="d-block"><?php echo $_SESSION['user_type_name']?></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                            <li><a class="dropdown-item" href="dashboard/"><span class="dropdown-icon"><i class="fa-regular fa-circle-user"></i></span> Dashbpard</a></li>
                                            <li><a class="dropdown-item" href="../../models/logout.php"><span class="dropdown-icon"><i class="fa-regular fa-arrow-right-from-bracket"></i></span> Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>

                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="menu-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-3 col-lg-3">
                    <div class="all-department rev-7-all-department">
                        <span>Shop By Department</span>
                        <button class="category-list-close rev-7-category-list-close"><i class="fa-light fa-bars"></i></button>
                        <div class="banner">
                            <div class="category-list d-none">
                                <ul>
                                    <li class="category-item has-sub">
                                        <a href="#">
                                            <div class="icon">
                                                <span><i class="fa-thin fa-user-tie-hair-long"></i></span>
                                            </div>
                                            <span>Women's Fashion</span>
                                        </a>
                                        <div class="category-sub-menu bg-1">
                                            <div class="row g-4">
                                                <div class="col-lg-4">
                                                    <h4><span><i class="flaticon-wedding-dress"></i></span> Clothing</h4>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Dresses</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Jeggings</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Kurtis</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Palazzo Pants & Culottes</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Pants</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Shapewear</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Skirts</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Tops</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">T-Shirts</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Tunics</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4><span><i class="flaticon-heels"></i></span> Shoes</h4>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Ballet Flats</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Pumps</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Closed-Toe Wedges</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Fashion Boots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Flat Sandals</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Flip Flops</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Heeled Sandals</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">House Slippers</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Slip-Ons</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Sneakers</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Wedge Sandals</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4><span><i class="flaticon-watch"></i></span> Watches</h4>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Fashion</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Casual</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Business</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Sports</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Accessories</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="category-item">
                                        <a href="#">
                                            <div class="icon">
                                                <span><i class="fa-thin fa-user-tie-hair"></i></span>
                                            </div>
                                            <span>Men's Fashion</span>
                                        </a>
                                    </li>
                                    <li class="category-item">
                                        <a href="#">
                                            <div class="icon">
                                                <span><i class="fa-thin fa-camera"></i></span>
                                            </div>
                                            <span>Photography</span>
                                        </a>
                                    </li>
                                    <li class="category-item">
                                        <a href="#">
                                            <div class="icon">
                                                <span><i class="fa-thin fa-watch-smart"></i></span>
                                            </div>
                                            <span>Watches & Accessories</span>
                                        </a>
                                    </li>
                                    <li class="category-item has-sub">
                                        <a href="#">
                                            <div class="icon">
                                                <span><i class="fa-thin fa-tv-retro"></i></span>
                                            </div>
                                            <span>TV & Home Appliances</span>
                                        </a>
                                        <div class="category-sub-menu">
                                            <div class="row g-4">
                                                <div class="col-lg-4">
                                                    <h4><span><i class="flaticon-television"></i></span> Televisions</h4>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Smart Televisions</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">LED Televisions</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">OLED Televisions</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Other Televisions</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Mini Televisions</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4><span><i class="flaticon-speaker"></i></span> Home Audio</h4>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Sondbars</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Home Entertainment</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Portable Players</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Fashion Boots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Live Sound</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4><span><i class="flaticon-refrigerator"></i></span> Large Appliances</h4>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Refrigerators</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Freezers</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Washing Machines</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Microwave Oven</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Electric Oven</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4><span><i class="flaticon-cooking"></i></span> Kitchen Appliances</h4>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Rice Cooker</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Blender, Mixer & Grinder</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Electric Kettle</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Juicer & Fruit Extraction</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Fryer</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Coffee Machine</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4><span><i class="flaticon-air-conditioner"></i></span> Cooling & Heating</h4>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Air Conditioner</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Air Coolers</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Air Purifiers</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Dehumidifiers</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Water Heater</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4><span><i class="flaticon-season"></i></span> Season Sale</h4>
                                                    <a href="#">
                                                        <img src="assets/images/mega-menu-bg-2.jpg" alt="Image">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="category-item">
                                        <a href="#">
                                            <div class="icon">
                                                <span><i class="fa-thin fa-backpack"></i></span>
                                            </div>
                                            <span>Bags & Shoes</span>
                                        </a>
                                    </li>
                                    <li class="category-item has-sub">
                                        <a href="#">
                                            <div class="icon">
                                                <span><i class="fa-thin fa-teddy-bear"></i></span>
                                            </div>
                                            <span>Toys , Kids & Babies</span>
                                        </a>
                                        <div class="category-sub-menu">
                                            <div class="row g-4">
                                                <div class="col-lg-4">
                                                    <h4><span><i class="flaticon-baby-boy"></i></span> Mother & Baby</h4>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Baby & Toddler Foods</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Milk Formula</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Cloth Diapers & Accessories</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Diaper Bags</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Wipes & Holders</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4><span><i class="flaticon-rocking-horse"></i></span> Baby Gear</h4>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Baby Walkers</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Backpacks & Carriers</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Strollers</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Swings, Jumpers & Bouncers</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Activity Gym & Playmats</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4><span><i class="flaticon-baby-dress"></i></span> Clothing & Accessories</h4>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Girls Clothing</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Girls Shoes</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Boys Clothing</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Maternity Wear</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">New Born Unisex (0 - 6 months)</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h4><span><i class="flaticon-season"></i></span> Season Sale</h4>
                                                    <a href="#">
                                                        <img src="assets/images/mega-menu-bg-3.jpg" alt="Image">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="category-item">
                                        <a href="#">
                                            <div class="icon">
                                                <span><i class="fa-thin fa-headphones-simple"></i></span>
                                            </div>
                                            <span>Headphone</span>
                                        </a>
                                    </li>
                                    <li class="category-item">
                                        <a href="#">
                                            <div class="icon">
                                                <span><i class="fa-thin fa-baseball-bat-ball"></i></span>
                                            </div>
                                            <span>Sports & Outdoor</span>
                                        </a>
                                    </li>
                                    <li class="category-item">
                                        <a href="#">
                                            <div class="icon">
                                                <span><i class="fa-thin fa-shuffle"></i></span>
                                            </div>
                                            <span>Other</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 col-lg-6">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                                <nav id="revel-mobile-menu" class="revel-mobile-menu">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index-14.html">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="about.html">About</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="shopDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Shop
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="shopDropdown">
                                                <li><a class="dropdown-item" href="shop.html">Shop Left Bar</a></li>
                                                <li><a class="dropdown-item" href="shop-right-bar.html">Shop Right Bar</a></li>
                                                <li><a class="dropdown-item" href="shop-details.html">Shop Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="pageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                PAGES
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="pageDropdown">
                                                <li><a class="dropdown-item" href="account.html">Account Page</a></li>
                                                <li><a class="dropdown-item" href="cart.html">Cart Page</a></li>
                                                <li><a class="dropdown-item" href="compare.html">Compare Page</a></li>
                                                <li><a class="dropdown-item" href="faq.html">FAQ Page</a></li>
                                                <li><a class="dropdown-item" href="wishlist.html">Wishlist</a></li>
                                                <li><a class="dropdown-item" href="register.html">Register Page</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Blog
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="blogDropdown">
                                                <li><a class="dropdown-item" href="blog.html">Blog Page</a></li>
                                                <li><a class="dropdown-item" href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="contact.html">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-3">
                    <div class="account-link">
                        <a href="#"><i class="fa-light fa-truck"></i> Free shipping now available</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>