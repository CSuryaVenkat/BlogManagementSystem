<style>
    .nav-link{
        color:#fff
    }
    .goog-te-gadget-simple {
    font-size: 8pt !important;
    border-radius: 4px !important;
    cursor: pointer;
    zoom: 1;
}
#google_translate_element {
margin:5px;
}

    @media (min-width: 992px){
.showbacktop.is-visible .logo-showbacktop img {
    max-width: 50px;
    max-height: 50px;
    margin-bottom: 0.5rem;
    margin-right: 1rem;
    display: block;
}}
    </style>
<div id="showbacktop" class="showbacktop full-nav bg-white border-lg-1 border-bottom shadow-b-sm border-none py-0">
    <div class="container">
        <nav id="main-menu" class="main-menu navbar navbar-expand-lg navbar-light px-2 px-lg-0 py-0">
            <!--Navbar menu-->
            <div id="navbarTogglerDemo1" class="collapse navbar-collapse hover-mode">
                <!-- logo in navbar -->
                <div class="logo-showbacktop">
                    <a href="index.php" class="navbar-brand custom-logo-link" rel="home" aria-current="page">Curd Operation</a>
                </div>

                <!--start main menu start-->
                <ul id="start-main" class="navbar-nav main-nav navbar-uppercase first-start-lg-0">
                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-1344" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home active menu-item-1344 nav-item">
                        <a title="Home" href="index.php" class="nav-link">Home</a>
                    </li>

                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-1341" class="mega-menu menu-item menu-item-type-custom menu-item-object-custom mega-dropdown menu-item-1341 nav-item">
                        <a title="Education" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Education & technical</a>
                        <div id="mega-menu-1341" class="dropdown-menu mega w-100 shadow-lrb-lg px-3 py-0 depth_0">
                            <div class="block-area">
                                <!--Block style 1-->
                                <div class="row">
                                    <!-- post start -->
                                    <?php
                                    if (isset($_GET['pageno'])) {
                                        $pageno = $_GET['pageno'];
                                    } else {
                                        $pageno = 1;
                                    }
                                    $no_of_records_per_page = 4;
                                    $offset = ($pageno - 1) * $no_of_records_per_page;


                                    $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                    $result = mysqli_query($con, $total_pages_sql);
                                    $total_rows = mysqli_fetch_array($result)[0];
                                    $total_pages = ceil($total_rows / $no_of_records_per_page);


                                    $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblposts.viewCounter,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=1 order by RAND() desc  LIMIT $offset, $no_of_records_per_page");
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <article class="col-12 col-sm-6 col-md-4 while-post mb-4 col-lg-3">
                                            <div class="card card-full hover-a">
                                                <div class="ratio_203-114 image-wrapper">
                                                    <a href="<?php echo htmlentities($row['url']); ?>">
                                                    <img width="360" height="202" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" class=" img-fluid lazy wp-post-image" alt="<?php echo htmlentities($row['posttitle']); ?>" title="<?php echo htmlentities($row['posttitle']); ?>" loading="lazy" data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w " sizes="(max-width: 360px) 100vw, 360px" />
                                                        <!-- post type -->
                                                        <div class="post-type-icon">
                                                            <span class="fa-stack-sea text-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                                                    <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <!--title-->
                                                    <h2 class="card-title h5">
                                                        <a href="<?php echo htmlentities($row['url']); ?>"><?php echo htmlentities($row['posttitle']); ?></a>
                                                    </h2>
                                                    <div class="card-text text-muted small">
                                                        <!--date-->
                                                        <time class="news-date" datetime=" <?php echo htmlentities($row['postingdate']); ?>"> <?php echo htmlentities($row['postingdate']); ?></time>
                                                        <!--comments-->
                                                        <span title="<?php echo htmlentities($row['viewCounter']); ?> View" class="float-end">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye me-1" viewBox="0 0 16 16">
                                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                                    </path>
                                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                                    </path>
                                                                </svg>
                                                                <?php echo htmlentities($row['viewCounter']); ?>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    <?php } ?>
                                    <!-- post start -->
                                    

                                </div>
                                <div class="gap-0"></div>
                            </div>
                        </div>
                    </li>
                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-1341" class="mega-menu menu-item menu-item-type-custom menu-item-object-custom mega-dropdown menu-item-1341 nav-item">
                        <a title="Health and Food" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Health & Food</a>
                        <div id="mega-menu-1341" class="dropdown-menu mega w-100 shadow-lrb-lg px-3 py-0 depth_0">
                            <div class="block-area">
                                <!--Block style 1-->
                                <div class="row">
                                    <!-- post start -->
                                    <?php
                                    if (isset($_GET['pageno'])) {
                                        $pageno = $_GET['pageno'];
                                    } else {
                                        $pageno = 1;
                                    }
                                    $no_of_records_per_page = 4;
                                    $offset = ($pageno - 1) * $no_of_records_per_page;


                                    $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                    $result = mysqli_query($con, $total_pages_sql);
                                    $total_rows = mysqli_fetch_array($result)[0];
                                    $total_pages = ceil($total_rows / $no_of_records_per_page);


                                    $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblposts.viewCounter,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=2 order by RAND() desc  LIMIT $offset, $no_of_records_per_page");
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <article class="col-12 col-sm-6 col-md-4 while-post mb-4 col-lg-3">
                                            <div class="card card-full hover-a">
                                                <div class="ratio_203-114 image-wrapper">
                                                    <a href="<?php echo htmlentities($row['url']); ?>">
                                                    <img width="360" height="202" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" class=" img-fluid lazy wp-post-image" alt="<?php echo htmlentities($row['posttitle']); ?>" title="<?php echo htmlentities($row['posttitle']); ?>" loading="lazy" data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w " sizes="(max-width: 360px) 100vw, 360px" />
                                                        <!-- post type -->
                                                        <div class="post-type-icon">
                                                            <span class="fa-stack-sea text-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                                                    <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <!--title-->
                                                    <h2 class="card-title h5">
                                                        <a href="<?php echo htmlentities($row['url']); ?>"><?php echo htmlentities($row['posttitle']); ?></a>
                                                    </h2>
                                                    <div class="card-text text-muted small">
                                                        <!--date-->
                                                        <time class="news-date" datetime=" <?php echo htmlentities($row['postingdate']); ?>"> <?php echo htmlentities($row['postingdate']); ?></time>
                                                        <!--comments-->
                                                        <span title="<?php echo htmlentities($row['viewCounter']); ?> View" class="float-end">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye me-1" viewBox="0 0 16 16">
                                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                                    </path>
                                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                                    </path>
                                                                </svg>
                                                                <?php echo htmlentities($row['viewCounter']); ?>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    <?php } ?>
                                    <!-- post start -->
                                    

                                </div>
                                <div class="gap-0"></div>
                            </div>
                        </div>
                    </li>
                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-1341" class="mega-menu menu-item menu-item-type-custom menu-item-object-custom mega-dropdown menu-item-1341 nav-item">
                        <a title="Health and Food" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Gadgets and Reviews</a>
                        <div id="mega-menu-1341" class="dropdown-menu mega w-100 shadow-lrb-lg px-3 py-0 depth_0">
                            <div class="block-area">
                                <!--Block style 1-->
                                <div class="row">
                                    <!-- post start -->
                                    <?php
                                    if (isset($_GET['pageno'])) {
                                        $pageno = $_GET['pageno'];
                                    } else {
                                        $pageno = 1;
                                    }
                                    $no_of_records_per_page = 4;
                                    $offset = ($pageno - 1) * $no_of_records_per_page;


                                    $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                    $result = mysqli_query($con, $total_pages_sql);
                                    $total_rows = mysqli_fetch_array($result)[0];
                                    $total_pages = ceil($total_rows / $no_of_records_per_page);


                                    $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblposts.viewCounter,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=3 order by RAND() desc  LIMIT $offset, $no_of_records_per_page");
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <article class="col-12 col-sm-6 col-md-4 while-post mb-4 col-lg-3">
                                            <div class="card card-full hover-a">
                                                <div class="ratio_203-114 image-wrapper">
                                                    <a href="<?php echo htmlentities($row['url']); ?>">
                                                    <img width="360" height="202" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" class=" img-fluid lazy wp-post-image" alt="<?php echo htmlentities($row['posttitle']); ?>" title="<?php echo htmlentities($row['posttitle']); ?>" loading="lazy" data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w " sizes="(max-width: 360px) 100vw, 360px" />
                                                        <!-- post type -->
                                                        <div class="post-type-icon">
                                                            <span class="fa-stack-sea text-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                                                    <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <!--title-->
                                                    <h2 class="card-title h5">
                                                        <a href="<?php echo htmlentities($row['url']); ?>"><?php echo htmlentities($row['posttitle']); ?></a>
                                                    </h2>
                                                    <div class="card-text text-muted small">
                                                        <!--date-->
                                                        <time class="news-date" datetime=" <?php echo htmlentities($row['postingdate']); ?>"> <?php echo htmlentities($row['postingdate']); ?></time>
                                                        <!--comments-->
                                                        <span title="<?php echo htmlentities($row['viewCounter']); ?> View" class="float-end">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye me-1" viewBox="0 0 16 16">
                                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                                    </path>
                                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                                    </path>
                                                                </svg>
                                                                <?php echo htmlentities($row['viewCounter']); ?>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    <?php } ?>
                                    <!-- post start -->
                                    

                                </div>
                                <div class="gap-0"></div>
                            </div>
                        </div>
                    </li>
                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-1341" class="mega-menu menu-item menu-item-type-custom menu-item-object-custom mega-dropdown menu-item-1341 nav-item">
                        <a title="Health and Food" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">How To and troubleshoot</a>
                        <div id="mega-menu-1341" class="dropdown-menu mega w-100 shadow-lrb-lg px-3 py-0 depth_0">
                            <div class="block-area">
                                <!--Block style 1-->
                                <div class="row">
                                    <!-- post start -->
                                    <?php
                                    if (isset($_GET['pageno'])) {
                                        $pageno = $_GET['pageno'];
                                    } else {
                                        $pageno = 1;
                                    }
                                    $no_of_records_per_page = 4;
                                    $offset = ($pageno - 1) * $no_of_records_per_page;


                                    $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                    $result = mysqli_query($con, $total_pages_sql);
                                    $total_rows = mysqli_fetch_array($result)[0];
                                    $total_pages = ceil($total_rows / $no_of_records_per_page);


                                    $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblposts.viewCounter,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=4 order by RAND() desc  LIMIT $offset, $no_of_records_per_page");
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <article class="col-12 col-sm-6 col-md-4 while-post mb-4 col-lg-3">
                                            <div class="card card-full hover-a">
                                                <div class="ratio_203-114 image-wrapper">
                                                    <a href="<?php echo htmlentities($row['url']); ?>">
                                                    <img width="360" height="202" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" class=" img-fluid lazy wp-post-image" alt="<?php echo htmlentities($row['posttitle']); ?>" title="<?php echo htmlentities($row['posttitle']); ?>" loading="lazy" data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w " sizes="(max-width: 360px) 100vw, 360px" />
                                                        <!-- post type -->
                                                        <div class="post-type-icon">
                                                            <span class="fa-stack-sea text-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                                                    <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <!--title-->
                                                    <h2 class="card-title h5">
                                                        <a href="<?php echo htmlentities($row['url']); ?>"><?php echo htmlentities($row['posttitle']); ?></a>
                                                    </h2>
                                                    <div class="card-text text-muted small">
                                                        <!--date-->
                                                        <time class="news-date" datetime=" <?php echo htmlentities($row['postingdate']); ?>"> <?php echo htmlentities($row['postingdate']); ?></time>
                                                        <!--comments-->
                                                        <span title="<?php echo htmlentities($row['viewCounter']); ?> View" class="float-end">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye me-1" viewBox="0 0 16 16">
                                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                                    </path>
                                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                                    </path>
                                                                </svg>
                                                                <?php echo htmlentities($row['viewCounter']); ?>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    <?php } ?>
                                    <!-- post start -->
                                    

                                </div>
                                <div class="gap-0"></div>
                            </div>
                        </div>
                    </li>
                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-1341" class="mega-menu menu-item menu-item-type-custom menu-item-object-custom mega-dropdown menu-item-1341 nav-item">
                        <a title="Health and Food" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Travel and Entertainment</a>
                        <div id="mega-menu-1341" class="dropdown-menu mega w-100 shadow-lrb-lg px-3 py-0 depth_0">
                            <div class="block-area">
                                <!--Block style 1-->
                                <div class="row">
                                    <!-- post start -->
                                    <?php
                                    if (isset($_GET['pageno'])) {
                                        $pageno = $_GET['pageno'];
                                    } else {
                                        $pageno = 1;
                                    }
                                    $no_of_records_per_page = 4;
                                    $offset = ($pageno - 1) * $no_of_records_per_page;


                                    $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                    $result = mysqli_query($con, $total_pages_sql);
                                    $total_rows = mysqli_fetch_array($result)[0];
                                    $total_pages = ceil($total_rows / $no_of_records_per_page);


                                    $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblposts.viewCounter,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=5 order by RAND() desc  LIMIT $offset, $no_of_records_per_page");
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <article class="col-12 col-sm-6 col-md-4 while-post mb-4 col-lg-3">
                                            <div class="card card-full hover-a">
                                                <div class="ratio_203-114 image-wrapper">
                                                    <a href="<?php echo htmlentities($row['url']); ?>">
                                                    <img width="360" height="202" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" class=" img-fluid lazy wp-post-image" alt="<?php echo htmlentities($row['posttitle']); ?>" title="<?php echo htmlentities($row['posttitle']); ?>" loading="lazy" data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w " sizes="(max-width: 360px) 100vw, 360px" />
                                                        <!-- post type -->
                                                        <div class="post-type-icon">
                                                            <span class="fa-stack-sea text-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                                                    <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <!--title-->
                                                    <h2 class="card-title h5">
                                                        <a href="<?php echo htmlentities($row['url']); ?>"><?php echo htmlentities($row['posttitle']); ?></a>
                                                    </h2>
                                                    <div class="card-text text-muted small">
                                                        <!--date-->
                                                        <time class="news-date" datetime=" <?php echo htmlentities($row['postingdate']); ?>"> <?php echo htmlentities($row['postingdate']); ?></time>
                                                        <!--comments-->
                                                        <span title="<?php echo htmlentities($row['viewCounter']); ?> View" class="float-end">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye me-1" viewBox="0 0 16 16">
                                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                                    </path>
                                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                                    </path>
                                                                </svg>
                                                                <?php echo htmlentities($row['viewCounter']); ?>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    <?php } ?>
                                    <!-- post start -->
                                    

                                </div>
                                <div class="gap-0"></div>
                            </div>
                        </div>
                    </li>
                   

                </ul>
                <!--end start main menu-->

            
            </div>
            <!--End navbar menu-->
        </nav>
    </div>
</div>
  <!-- mobile menu -->

  <div class="mobile-side">
            <!--Left Mobile menu-->
            <div id="back-menu" class="back-menu back-menu-start">
                <span class="hamburger-icon open">
                    <svg class="bi bi-x" width="2rem" height="2rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"></path>
                        <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"></path>
                            </svg>
                </span>
            </div>
            <nav id="mobile-menu" class="menu-mobile d-flex flex-column push push-start shadow-r-sm bg-white">
                <!-- mobile menu content -->
                <div class="mobile-content mb-auto">
                    <!--logo-->
                    <div class="logo-sidenav p-2">
                        <a href="index.php" class="navbar-brand custom-logo-link" rel="home" aria-current="page">Curd Operation</a>
                    </div>

                    <!--navigation-->
                    <div class="sidenav-menu">
                        <nav class="navbar navbar-inverse">
                            <ul id="side-menu" class="nav navbar-nav list-group list-unstyled side-link">
                                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-1517" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home active menu-item-1517 nav-item">
                                    <a title="Home" href="index.php" class="nav-link">Home</a>
                                </li>
                              
                                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-1516" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1516 nav-item">
                                    <a title="Business" href="Education-and-technical-blogs.php" class="nav-link">Educations and technical</a>
                                </li>
                                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-1516" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1516 nav-item">
                                    <a title="Business" href="Health-and-food-blogs.php" class="nav-link">Health and Food</a>
                                </li>
                                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-1516" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1516 nav-item">
                                    <a title="Business" href="Gadgets-and-reviews-blogs.php" class="nav-link">Gedgets and Reviews</a>
                                </li>
                                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-1516" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1516 nav-item">
                                    <a title="Business" href="How-to-and-troubleshoot-blogs.php" class="nav-link">How to and troubleshoot</a>
                                </li>
                                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-1516" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1516 nav-item">
                                    <a title="Business" href="Travel-and-entertainment-blogs.php" class="nav-link">Travel and Entertainment</a>
                                </li>
                              
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- copyright mobile sidebar menu -->
                <div class="mobile-copyright mt-5 text-center">
               
                    <p>Copyright Getinfo4free - All rights reserved.</p>
                </div>
            </nav>
        </div>