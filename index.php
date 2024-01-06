<?php
session_start();
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>CurdOperation - Read all type of blogs </title>
    <meta name="description"
        content="CurdOperation.com is a one-stop shop for knowledge and information gathered by knowledgeable team members using the most cutting-edge technology available." />
  
    <meta name="keywords" content="CurdOperation , technical blogs , top blog website , CurdOperation.com" />
   

    <link rel="stylesheet" href="./css/bootstarp.css" media="all" />
    <link rel="stylesheet" href="./css/style.css" media="all" />

    <meta name="robots" content="index, follow">
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />


</head>

<body class="home blog custom-background wp-custom-logo full-width font-family hfeed">
    <!--Skippy-->
    <a id="skippy" class="visually-hidden-focusable" href="#content">
        <div class="container">
            <span class="skiplink-text">Skip to content</span>
        </div>
    </a>

    <div class="bg-image"></div>

    <!-- ========== WRAPPER ========== -->
    <div class="wrapper">
        <!--Header start-->
        <?php include("./includes/header.php"); ?>

        <!-- main menu -->
        <?php include("./includes/navbar.php"); ?>


        <!--Content start-->
        <main id="content">
            <div class="container">
                <div class="row">
                    <!--top section-->
                    <div class="top-section col-12 mt-05">
                        <?php include("./includes/breakingnews.php"); ?>

                        <!--Big grid style 1-->
                        <?php include("./includes/mainbanner.php"); ?>
                    </div>

                    <!--content 1-->
                    <div class="col-md-8">
                        <div class="block-area">
                            <!-- block title -->
                            <div class="block-title-6">
                                <h4 class="h5 border-primary">
                                    <span class="bg-primary text-white">Education</span>
                                </h4>
                                <!-- block nav tabs -->
                                <ul class="nav nav-tabs nav-block-link1 d-inline" id="cat-tabsone1" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="cat-navione1" data-bs-toggle="tab"
                                            href="#block-catone1" role="tab" aria-controls="block-catone1"
                                            aria-selected="true">All</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="cat-navitwo1" data-bs-toggle="tab" href="#block-cattwo1"
                                            role="tab" aria-controls="block-cattwo1" aria-selected="false">Education &
                                            Interview Questions</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="cat-navithree1" data-bs-toggle="tab"
                                            href="#block-catthree1" role="tab" aria-controls="block-catthree1"
                                            aria-selected="false">Technical</a>
                                    </li>
                                </ul>
                                <!-- end block nav tabs -->
                                <!-- block nav more-->
                                <ul class="nav nav-block-more list-unstyled d-inline">

                                    <li class="nav-item">
                                        <a class="nav-link nav-block-news" href="Education-and-technical-blogs.php">More
                                            <span class="visually-hidden">Articles</span></a>
                                    </li>

                                </ul>
                                <!-- end block nav more-->
                            </div>
                            <!-- block content -->
                            <div id="block-load1" class="tab-content ajax-tabs p-0">
                                <!--tabs content-->
                                <div class="tab-pane fade show active" id="block-catone1" role="tabpanel"
                                    aria-labelledby="cat-navione1">
                                    <div class="row animate slideInDown">
                                        <!--big post-->
                                        <div class="col-sm-6 col-md-12 col-lg-6">
                                            <?php
                                            if (isset($_GET['pageno'])) {
                                                $pageno = $_GET['pageno'];
                                            } else {
                                                $pageno = 1;
                                            }
                                            $no_of_records_per_page = 1;
                                            $offset = ($pageno - 1) * $no_of_records_per_page;


                                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                            $result = mysqli_query($con, $total_pages_sql);
                                            $total_rows = mysqli_fetch_array($result)[0];
                                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                                            $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblposts.viewCounter,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=1 or tblposts.CategoryId=2 order by RAND() LIMIT $offset, $no_of_records_per_page");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>

                                                        <article class="card card-full hover-a mb-4">
                                                            <!--thumbnail-->
                                                            <div class="ratio_360-202 image-wrapper">
                                                                <a href="<?php echo htmlentities($row['url']); ?>">
                                                                    <img width="360" height="202"
                                                                        src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                        class=" img-fluid lazy wp-post-image"
                                                                        alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                        title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                        loading="lazy"
                                                                        data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                        srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                        sizes="(max-width: 360px) 100vw, 360px" />
                                                                    <!-- post type -->
                                                                </a>
                                                            </div>
                                                            <div class="card-body">
                                                                <!--title-->
                                                                <h2 class="card-title h3-sm h1-md h3-lg">
                                                                    <a href="<?php echo htmlentities($row['url']); ?>">
                                                                        <?php echo htmlentities($row['posttitle']); ?></a>
                                                                </h2>
                                                                <div class="card-text mb-2 text-muted small">
                                                                    <!--author-->
                                                                    <span class="fw-bold d-none d-sm-inline me-1">
                                                                        <a href="#"
                                                                            title="<?php echo htmlentities($row['authorname']); ?>"
                                                                            rel="author"><?php echo htmlentities($row['authorname']); ?></a>
                                                                    </span>
                                                                    <!--date-->
                                                                    <time class="news-date"
                                                                        datetime="<?php echo htmlentities($row['postingdate']); ?>">
                                                                        <?php echo htmlentities($row['postingdate']); ?></time>
                                                                    <!--comments-->
                                                                    <span
                                                                        title="<?php echo htmlentities($row['viewCounter']); ?> View"
                                                                        class="float-end">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                            height="16" fill="currentColor" class="bi bi-eye me-1"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                                            </path>
                                                                            <path
                                                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                                            </path>
                                                                        </svg>
                                                                        <?php echo htmlentities($row['viewCounter']); ?>
                                                                    </span>
                                                                </div>
                                                                <!--description-->
                                                                <p class="card-text">
                                                                    <?php echo htmlentities($row['postdes']); ?>
                                                                </p>
                                                            </div>
                                                        </article>
                                            <?php } ?>

                                        </div>

                                        <!--post right start-->
                                        <div class="col-sm-6 col-md-12 col-lg-6">
                                            <!--post list-->
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


                                            $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=1 order by RAND() LIMIT $offset, $no_of_records_per_page");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>

                                                        <article class="card card-full hover-a mb-4">
                                                            <div class="row">
                                                                <!--thumbnail-->
                                                                <div class="col-3 col-md-4 pe-2 pe-md-0">
                                                                    <div class="ratio_115-80 image-wrapper">
                                                                        <img width="115" height="80"
                                                                            src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                            class=" img-fluid lazy wp-post-image"
                                                                            alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                            title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                            loading="lazy"
                                                                            data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                            srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                            sizes="(max-width: 360px) 100vw, 360px" />
                                                                        <!-- post type -->
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-9 col-md-8">
                                                                    <div class="card-body pt-0">
                                                                        <!--title-->
                                                                        <h3 class="card-title h6 h4-md h6-lg">
                                                                            <a href="<?php echo htmlentities($row['url']); ?>">
                                                                                <?php echo htmlentities($row['posttitle']); ?></a>
                                                                        </h3>
                                                                        <!--date-->
                                                                        <div class="card-text small text-muted">
                                                                            <time class="news-date"
                                                                                datetime="<?php echo htmlentities($row['postingdate']); ?>">
                                                                                <?php echo htmlentities($row['postingdate']); ?></time>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                            <?php } ?>

                                            <!--post list-->
                                        </div>
                                    </div>
                                </div>
                                <!--tabs content-->
                                <div class="tab-pane fade" id="block-cattwo1" role="tabpanel"
                                    aria-labelledby="cat-navitwo1">
                                    <div class="row animate slideInDown">
                                        <!--big post-->
                                        <div class="col-sm-6 col-md-12 col-lg-6">
                                            <?php
                                            if (isset($_GET['pageno'])) {
                                                $pageno = $_GET['pageno'];
                                            } else {
                                                $pageno = 1;
                                            }
                                            $no_of_records_per_page = 1;
                                            $offset = ($pageno - 1) * $no_of_records_per_page;


                                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                            $result = mysqli_query($con, $total_pages_sql);
                                            $total_rows = mysqli_fetch_array($result)[0];
                                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                                            $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblposts.viewCounter,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=2 and tblposts.SubCategoryId=1 order by RAND() desc  LIMIT $offset, $no_of_records_per_page");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>

                                                        <article class="card card-full hover-a mb-4">
                                                            <!--thumbnail-->
                                                            <div class="ratio_360-202 image-wrapper">
                                                                <a href="<?php echo htmlentities($row['url']); ?>">
                                                                    <img width="360" height="202"
                                                                        src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                        class=" img-fluid lazy wp-post-image"
                                                                        alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                        title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                        loading="lazy"
                                                                        data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                        srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                        sizes="(max-width: 360px) 100vw, 360px" />
                                                                    <!-- post type -->
                                                                </a>
                                                            </div>
                                                            <div class="card-body">
                                                                <!--title-->
                                                                <h2 class="card-title h3-sm h1-md h3-lg">
                                                                    <a href="<?php echo htmlentities($row['url']); ?>">
                                                                        <?php echo htmlentities($row['posttitle']); ?></a>
                                                                </h2>
                                                                <div class="card-text mb-2 text-muted small">
                                                                    <!--author-->
                                                                    <span class="fw-bold d-none d-sm-inline me-1">
                                                                        <a href="#"
                                                                            title="Posts by <?php echo htmlentities($row['authorname']); ?>"
                                                                            rel="author"><?php echo htmlentities($row['authorname']); ?></a>
                                                                    </span>
                                                                    <!--date-->
                                                                    <time class="news-date"
                                                                        datetime="<?php echo htmlentities($row['postingdate']); ?>">
                                                                        <?php echo htmlentities($row['postingdate']); ?></time>
                                                                    <!--comments-->
                                                                    <span
                                                                        title="<?php echo htmlentities($row['viewCounter']); ?> View"
                                                                        class="float-end">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                            height="16" fill="currentColor" class="bi bi-eye me-1"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                                            </path>
                                                                            <path
                                                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                                            </path>
                                                                        </svg>
                                                                        <?php echo htmlentities($row['viewCounter']); ?>
                                                                    </span>
                                                                </div>
                                                                <!--description-->
                                                                <p class="card-text">
                                                                    <?php echo htmlentities($row['postdes']); ?>
                                                                </p>
                                                            </div>
                                                        </article>
                                            <?php } ?>
                                        </div>

                                        <!--post right start-->
                                        <div class="col-sm-6 col-md-12 col-lg-6">
                                            <!--post list-->
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


                                            $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=1 and  tblposts.SubCategoryId=1  order by RAND() LIMIT $offset, $no_of_records_per_page");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>

                                                        <article class="card card-full hover-a mb-4">
                                                            <div class="row">
                                                                <!--thumbnail-->
                                                                <div class="col-3 col-md-4 pe-2 pe-md-0">
                                                                    <div class="ratio_115-80 image-wrapper">
                                                                        <img width="115" height="80"
                                                                            src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                            class=" img-fluid lazy wp-post-image"
                                                                            alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                            title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                            loading="lazy"
                                                                            data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                            srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                            sizes="(max-width: 360px) 100vw, 360px" />
                                                                        <!-- post type -->
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-9 col-md-8">
                                                                    <div class="card-body pt-0">
                                                                        <!--title-->
                                                                        <h3 class="card-title h6 h4-md h6-lg">
                                                                            <a href="<?php echo htmlentities($row['url']); ?>">
                                                                                <?php echo htmlentities($row['posttitle']); ?></a>
                                                                        </h3>
                                                                        <!--date-->
                                                                        <div class="card-text small text-muted">
                                                                            <time class="news-date"
                                                                                datetime="<?php echo htmlentities($row['postingdate']); ?>">
                                                                                <?php echo htmlentities($row['postingdate']); ?></time>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <!--tabs content-->
                                <div class="tab-pane fade" id="block-catthree1" role="tabpanel"
                                    aria-labelledby="cat-navithree1">
                                    <div class="row animate slideInDown">
                                        <!--big post-->
                                        <div class="col-sm-6 col-md-12 col-lg-6">
                                            <?php
                                            if (isset($_GET['pageno'])) {
                                                $pageno = $_GET['pageno'];
                                            } else {
                                                $pageno = 1;
                                            }
                                            $no_of_records_per_page = 1;
                                            $offset = ($pageno - 1) * $no_of_records_per_page;


                                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                            $result = mysqli_query($con, $total_pages_sql);
                                            $total_rows = mysqli_fetch_array($result)[0];
                                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                                            $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.viewCounter,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=1 and tblposts.SubCategoryId=2  order by RAND() LIMIT $offset, $no_of_records_per_page");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>

                                                        <article class="card card-full hover-a mb-4">
                                                            <!--thumbnail-->
                                                            <div class="ratio_360-202 image-wrapper">
                                                                <a href="<?php echo htmlentities($row['url']); ?>">
                                                                    <img width="360" height="202"
                                                                        src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                        class=" img-fluid lazy wp-post-image"
                                                                        alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                        title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                        loading="lazy"
                                                                        data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                        srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                        sizes="(max-width: 360px) 100vw, 360px" />
                                                                    <!-- post type -->
                                                                </a>
                                                            </div>
                                                            <div class="card-body">
                                                                <!--title-->
                                                                <h2 class="card-title h3-sm h1-md h3-lg">
                                                                    <a href="<?php echo htmlentities($row['url']); ?>">
                                                                        <?php echo htmlentities($row['posttitle']); ?></a>
                                                                </h2>
                                                                <div class="card-text mb-2 text-muted small">
                                                                    <!--author-->
                                                                    <span class="fw-bold d-none d-sm-inline me-1">
                                                                        <a href="#"
                                                                            title="<?php echo htmlentities($row['authorname']); ?>"
                                                                            rel="author"><?php echo htmlentities($row['authorname']); ?></a>
                                                                    </span>
                                                                    <!--date-->
                                                                    <time class="news-date"
                                                                        datetime=" <?php echo htmlentities($row['postingdate']); ?>">
                                                                        <?php echo htmlentities($row['postingdate']); ?></time>
                                                                    <!--comments-->
                                                                    <span
                                                                        title="<?php echo htmlentities($row['viewCounter']); ?> View"
                                                                        class="float-end">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                            height="16" fill="currentColor" class="bi bi-eye me-1"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                                            </path>
                                                                            <path
                                                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                                            </path>
                                                                        </svg>
                                                                        <?php echo htmlentities($row['viewCounter']); ?>
                                                                    </span>
                                                                </div>
                                                                <!--description-->
                                                                <p class="card-text">
                                                                    <?php echo htmlentities($row['postdes']); ?>
                                                                </p>
                                                            </div>
                                                        </article>
                                            <?php } ?>

                                        </div>

                                        <!--post right start-->
                                        <div class="col-sm-6 col-md-12 col-lg-6">
                                            <!--post list-->
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


                                            $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=1 and tblposts.SubCategoryId=2  order by RAND() LIMIT $offset, $no_of_records_per_page");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>

                                                        <article class="card card-full hover-a mb-4">
                                                            <div class="row">
                                                                <!--thumbnail-->
                                                                <div class="col-3 col-md-4 pe-2 pe-md-0">
                                                                    <div class="ratio_115-80 image-wrapper">
                                                                        <img width="115" height="80"
                                                                            src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                            class=" img-fluid lazy wp-post-image"
                                                                            alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                            title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                            loading="lazy"
                                                                            data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                            srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                            sizes="(max-width: 360px) 100vw, 360px" />
                                                                        <!-- post type -->
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-9 col-md-8">
                                                                    <div class="card-body pt-0">
                                                                        <!--title-->
                                                                        <h3 class="card-title h6 h4-md h6-lg">
                                                                            <a href="<?php echo htmlentities($row['url']); ?>">
                                                                                <?php echo htmlentities($row['posttitle']); ?></a>
                                                                        </h3>
                                                                        <!--date-->
                                                                        <div class="card-text small text-muted">
                                                                            <time class="news-date"
                                                                                datetime="<?php echo htmlentities($row['postingdate']); ?>">
                                                                                <?php echo htmlentities($row['postingdate']); ?></time>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <!--tabs content-->

                                <!-- end tabs content-->
                            </div>
                        </div>
                        <div class="block-area">
                            <div class="row">
                                <!--left post-->
                                <div class="col-lg-6">
                                    <div class="block-title-6">
                                        <h4 class="h5 border-primary">
                                            <span class="bg-primary text-white">Health And Food</span>
                                        </h4>
                                    </div>
                                    <!--post big start-->
                                    <div class="big-post">

                                        <?php
                                        if (isset($_GET['pageno'])) {
                                            $pageno = $_GET['pageno'];
                                        } else {
                                            $pageno = 1;
                                        }
                                        $no_of_records_per_page = 1;
                                        $offset = ($pageno - 1) * $no_of_records_per_page;


                                        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                        $result = mysqli_query($con, $total_pages_sql);
                                        $total_rows = mysqli_fetch_array($result)[0];
                                        $total_pages = ceil($total_rows / $no_of_records_per_page);


                                        $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblposts.viewCounter,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=2 order by RAND() LIMIT $offset, $no_of_records_per_page");
                                        while ($row = mysqli_fetch_array($query)) {
                                            ?>

                                                    <article class="card card-full hover-a mb-4">
                                                        <!--thumbnail-->
                                                        <div class="ratio_360-202 image-wrapper">
                                                            <a href="<?php echo htmlentities($row['url']); ?>">
                                                                <img width="360" height="202"
                                                                    src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                    class=" img-fluid lazy wp-post-image"
                                                                    alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                    title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                    loading="lazy"
                                                                    data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                    srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                    sizes="(max-width: 360px) 100vw, 360px" />
                                                                <!-- post type -->
                                                            </a>
                                                        </div>
                                                        <div class="card-body">
                                                            <!--title-->
                                                            <h2 class="card-title h3-sm h1-md h3-lg">
                                                                <a href="<?php echo htmlentities($row['url']); ?>">
                                                                    <?php echo htmlentities($row['posttitle']); ?></a>
                                                            </h2>
                                                            <div class="card-text mb-2 text-muted small">
                                                                <!--author-->
                                                                <span class="fw-bold d-none d-sm-inline me-1">
                                                                    <a href="#"
                                                                        title="Posts by <?php echo htmlentities($row['authorname']); ?>"
                                                                        rel="author">
                                                                        <?php echo htmlentities($row['authorname']); ?></a>
                                                                </span>
                                                                <!--date-->
                                                                <time class="news-date"
                                                                    datetime="<?php echo htmlentities($row['postingdate']); ?>">
                                                                    <?php echo htmlentities($row['postingdate']); ?></time>
                                                                <!--comments-->
                                                                <span title="<?php echo htmlentities($row['viewCounter']); ?> View"
                                                                    class="float-end">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                        fill="currentColor" class="bi bi-eye me-1"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                                        </path>
                                                                        <path
                                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                                        </path>
                                                                    </svg>
                                                                    <?php echo htmlentities($row['viewCounter']); ?>
                                                                </span>
                                                            </div>
                                                            <!--description-->
                                                            <p class="card-text">
                                                                <?php echo htmlentities($row['postdes']); ?>
                                                            </p>
                                                        </div>
                                                    </article>
                                        <?php } ?>

                                    </div>

                                    <!--post small start-->
                                    <div class="small-post">
                                        <!--post list-->
                                        <?php
                                        if (isset($_GET['pageno'])) {
                                            $pageno = $_GET['pageno'];
                                        } else {
                                            $pageno = 1;
                                        }
                                        $no_of_records_per_page = 3;
                                        $offset = ($pageno - 1) * $no_of_records_per_page;


                                        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                        $result = mysqli_query($con, $total_pages_sql);
                                        $total_rows = mysqli_fetch_array($result)[0];
                                        $total_pages = ceil($total_rows / $no_of_records_per_page);


                                        $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=1 and  tblposts.SubCategoryId=2  order by RAND()  LIMIT $offset, $no_of_records_per_page");
                                        while ($row = mysqli_fetch_array($query)) {
                                            ?>

                                                    <article class="card card-full hover-a mb-4">
                                                        <div class="row">
                                                            <!--thumbnail-->
                                                            <div class="col-3 col-md-4 pe-2 pe-md-0">
                                                                <div class="ratio_115-80 image-wrapper">
                                                                    <img width="115" height="80"
                                                                        src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                        class=" img-fluid lazy wp-post-image"
                                                                        alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                        title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                        loading="lazy"
                                                                        data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                        srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                        sizes="(max-width: 360px) 100vw, 360px" />
                                                                    <!-- post type -->
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-9 col-md-8">
                                                                <div class="card-body pt-0">
                                                                    <!--title-->
                                                                    <h3 class="card-title h6 h4-md h6-lg">
                                                                        <a href="<?php echo htmlentities($row['url']); ?>">
                                                                            <?php echo htmlentities($row['posttitle']); ?></a>
                                                                    </h3>
                                                                    <!--date-->
                                                                    <div class="card-text small text-muted">
                                                                        <time class="news-date"
                                                                            datetime="<?php echo htmlentities($row['postingdate']); ?>">
                                                                            <?php echo htmlentities($row['postingdate']); ?></time>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                        <?php } ?>
                                    </div>
                                </div>

                                <!--right post-->
                                <div class="col-lg-6">
                                    <div class="block-title-6">
                                        <h4 class="h5 border-primary">
                                            <span class="bg-primary text-white">How To and troubleshoot</span>
                                        </h4>
                                    </div>
                                    <!--post big start-->
                                    <div class="big-post">

                                        <?php
                                        if (isset($_GET['pageno'])) {
                                            $pageno = $_GET['pageno'];
                                        } else {
                                            $pageno = 1;
                                        }
                                        $no_of_records_per_page = 1;
                                        $offset = ($pageno - 1) * $no_of_records_per_page;


                                        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                        $result = mysqli_query($con, $total_pages_sql);
                                        $total_rows = mysqli_fetch_array($result)[0];
                                        $total_pages = ceil($total_rows / $no_of_records_per_page);


                                        $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.viewCounter,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=4 order by RAND()  LIMIT $offset, $no_of_records_per_page");
                                        while ($row = mysqli_fetch_array($query)) {
                                            ?>

                                                    <article class="card card-full hover-a mb-4">
                                                        <!--thumbnail-->
                                                        <div class="ratio_360-202 image-wrapper">
                                                            <a href="<?php echo htmlentities($row['url']); ?>">
                                                                <img width="360" height="202"
                                                                    src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                    class=" img-fluid lazy wp-post-image"
                                                                    alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                    title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                    loading="lazy"
                                                                    data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                    srcset="
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                    sizes="(max-width: 360px) 100vw, 360px" />
                                                                <!-- post type -->
                                                            </a>
                                                        </div>
                                                        <div class="card-body">
                                                            <!--title-->
                                                            <h2 class="card-title h3-sm h1-md h3-lg">
                                                                <a href="<?php echo htmlentities($row['url']); ?>">
                                                                    <?php echo htmlentities($row['posttitle']); ?></a>
                                                            </h2>
                                                            <div class="card-text mb-2 text-muted small">
                                                                <!--author-->
                                                                <span class="fw-bold d-none d-sm-inline me-1">
                                                                    <a href="#"
                                                                        title="Posts by  <?php echo htmlentities($row['authorname']); ?>"
                                                                        rel="author">
                                                                        <?php echo htmlentities($row['authorname']); ?></a>
                                                                </span>
                                                                <!--date-->
                                                                <time class="news-date"
                                                                    datetime="<?php echo htmlentities($row['postingdate']); ?>">
                                                                    <?php echo htmlentities($row['postingdate']); ?></time>
                                                                <!--comments-->
                                                                <span title="<?php echo htmlentities($row['viewCounter']); ?> View"
                                                                    class="float-end">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                        fill="currentColor" class="bi bi-eye me-1"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                                        </path>
                                                                        <path
                                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                                        </path>
                                                                    </svg>
                                                                    <?php echo htmlentities($row['viewCounter']); ?>
                                                                </span>
                                                            </div>
                                                            <!--description-->
                                                            <p class="card-text">
                                                                <?php echo htmlentities($row['postdes']); ?>
                                                            </p>
                                                        </div>
                                                    </article>
                                        <?php } ?>

                                    </div>

                                    <!--post small start-->
                                    <div class="small-post">
                                        <!--post list-->
                                        <?php
                                        if (isset($_GET['pageno'])) {
                                            $pageno = $_GET['pageno'];
                                        } else {
                                            $pageno = 1;
                                        }
                                        $no_of_records_per_page = 3;
                                        $offset = ($pageno - 1) * $no_of_records_per_page;


                                        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                        $result = mysqli_query($con, $total_pages_sql);
                                        $total_rows = mysqli_fetch_array($result)[0];
                                        $total_pages = ceil($total_rows / $no_of_records_per_page);


                                        $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=4 and tblposts.SubCategoryId=2 order by RAND() LIMIT $offset, $no_of_records_per_page");
                                        while ($row = mysqli_fetch_array($query)) {
                                            ?>

                                                    <article class="card card-full hover-a mb-4">
                                                        <div class="row">
                                                            <!--thumbnail-->
                                                            <div class="col-3 col-md-4 pe-2 pe-md-0">
                                                                <div class="ratio_115-80 image-wrapper">
                                                                    <img width="115" height="80"
                                                                        src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                        class=" img-fluid lazy wp-post-image"
                                                                        alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                        title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                        loading="lazy"
                                                                        data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                        srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                        sizes="(max-width: 360px) 100vw, 360px" />
                                                                    <!-- post type -->
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-9 col-md-8">
                                                                <div class="card-body pt-0">
                                                                    <!--title-->
                                                                    <h3 class="card-title h6 h4-md h6-lg">
                                                                        <a href="<?php echo htmlentities($row['url']); ?>">
                                                                            <?php echo htmlentities($row['posttitle']); ?></a>
                                                                    </h3>
                                                                    <!--date-->
                                                                    <div class="card-text small text-muted">
                                                                        <time class="news-date"
                                                                            datetime="<?php echo htmlentities($row['postingdate']); ?>">
                                                                            <?php echo htmlentities($row['postingdate']); ?></time>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="block-area">
                            <!-- block title -->
                            <div class="block-title-6">
                                <h4 class="h5 border-primary">
                                    <span class="bg-primary text-white">Gadgets and Reviews</span>
                                </h4>
                                <!-- block nav tabs -->
                                <ul class="nav nav-tabs nav-block-link1 d-inline" id="cat-tabsone2" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="cat-navione2" data-bs-toggle="tab"
                                            href="#block-catone2" role="tab" aria-controls="block-catone2"
                                            aria-selected="true">All</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="cat-navitwo2" data-bs-toggle="tab" href="#block-cattwo2"
                                            role="tab" aria-controls="block-cattwo2" aria-selected="false">Gadgets
                                            Product Reviews</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="cat-navithree2" data-bs-toggle="tab"
                                            href="#block-catthree2" role="tab" aria-controls="block-catthree2"
                                            aria-selected="false">Mobiles and laptops</a>
                                    </li>

                                </ul>
                                <!-- end block nav tabs -->
                                <!-- block nav more-->
                                <ul class="nav nav-block-more list-unstyled d-inline">

                                    <li class="nav-item">
                                        <a class="nav-link nav-block-news" href="Gadgets-and-reviews-blogs.php">More
                                            <span class="visually-hidden">Articles</span></a>
                                    </li>


                                </ul>
                                <!-- end block nav more-->
                            </div>
                            <!-- block content -->
                            <div id="block-load2" class="tab-content ajax-tabs p-0">
                                <!--tabs content-->
                                <div class="tab-pane fade show active" id="block-catone2" role="tabpanel"
                                    aria-labelledby="cat-navione2">
                                    <div class="animate slideInDown">
                                        <!--big post-->
                                        <div class="big-post">
                                            <?php
                                            if (isset($_GET['pageno'])) {
                                                $pageno = $_GET['pageno'];
                                            } else {
                                                $pageno = 1;
                                            }
                                            $no_of_records_per_page = 1;
                                            $offset = ($pageno - 1) * $no_of_records_per_page;


                                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                            $result = mysqli_query($con, $total_pages_sql);
                                            $total_rows = mysqli_fetch_array($result)[0];
                                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                                            $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.viewCounter,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=3 order by RAND() LIMIT $offset, $no_of_records_per_page");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                        <article class="card card-full hover-a mb-4">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <!-- thumbnail -->
                                                                    <div class="ratio_360-202 image-wrapper">
                                                                        <a href="<?php echo htmlentities($row['url']); ?>">
                                                                            <img width="360" height="202"
                                                                                src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                                class=" img-fluid lazy wp-post-image"
                                                                                alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                                title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                                loading="lazy"
                                                                                data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                                srcset="
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                                sizes="(max-width: 360px) 100vw, 360px" />
                                                                            <!-- post type -->
                                                                            <div class="post-type-icon">
                                                                                <span class="fa-stack-sea text-primary">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="16" height="16" fill="currentColor"
                                                                                        class="bi bi-link" viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z" />
                                                                                        <path
                                                                                            d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z">
                                                                                    </svg>

                                                                                </span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="card-body pt-3 pt-sm-0">
                                                                        <!--title-->
                                                                        <h2 class="card-title h3-sm">
                                                                            <a href="<?php echo htmlentities($row['url']); ?>">
                                                                                <?php echo htmlentities($row['posttitle']); ?></a>
                                                                        </h2>
                                                                        <div class="mb-2 text-muted small">
                                                                            <!--author-->
                                                                            <span class="fw-bold d-none d-sm-inline me-1">
                                                                                <a href="#"
                                                                                    title="Posts by <?php echo htmlentities($row['authorname']); ?>"
                                                                                    rel="author">
                                                                                    <?php echo htmlentities($row['authorname']); ?></a>
                                                                            </span>
                                                                            <!--date-->
                                                                            <time class="news-date"
                                                                                datetime="<?php echo htmlentities($row['postingdate']); ?>">
                                                                                <?php echo htmlentities($row['postingdate']); ?></time>
                                                                            <!--comments-->
                                                                            <span
                                                                                title="<?php echo htmlentities($row['viewCounter']); ?> View"
                                                                                class="float-end">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                                    height="16" fill="currentColor"
                                                                                    class="bi bi-eye me-1" viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                                                    </path>
                                                                                    <path
                                                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                                                    </path>
                                                                                </svg>
                                                                                <?php echo htmlentities($row['viewCounter']); ?>
                                                                            </span>
                                                                        </div>
                                                                        <!--description-->
                                                                        <p>
                                                                            <?php echo htmlentities($row['postdes']); ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                            <?php } ?>
                                        </div>

                                        <!--small post start-->
                                        <div class="small-post">
                                            <div class="row">
                                                <!--post list-->
                                                <?php
                                                if (isset($_GET['pageno'])) {
                                                    $pageno = $_GET['pageno'];
                                                } else {
                                                    $pageno = 1;
                                                }
                                                $no_of_records_per_page = 3;
                                                $offset = ($pageno - 1) * $no_of_records_per_page;


                                                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                                $result = mysqli_query($con, $total_pages_sql);
                                                $total_rows = mysqli_fetch_array($result)[0];
                                                $total_pages = ceil($total_rows / $no_of_records_per_page);


                                                $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=3 order by RAND() LIMIT $offset, $no_of_records_per_page");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                            <article class="col-sm-6">
                                                                <div class="card card-full hover-a mb-4">
                                                                    <div class="row">
                                                                        <!--thumbnail-->
                                                                        <div class="col-3 col-md-4 pe-2 pe-md-0">
                                                                            <div class="ratio_115-80 image-wrapper">
                                                                                <a href="<?php echo htmlentities($row['url']); ?>">
                                                                                    <img width="115" height="80"
                                                                                        src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                                        class=" img-fluid lazy wp-post-image"
                                                                                        alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                                        title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                                        loading="lazy"
                                                                                        data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                                        srcset="
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                                        sizes="(max-width: 115px) 100vw, 115px" />
                                                                                    <!-- post type -->
                                                                                    <div class="post-type-icon">
                                                                                        <span class="fa-stack-sea text-primary">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                width="16" height="16"
                                                                                                fill="currentColor"
                                                                                                class="bi bi-link"
                                                                                                viewBox="0 0 16 16">
                                                                                                <path
                                                                                                    d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z" />
                                                                                                <path
                                                                                                    d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z">
                                                                                            </svg>

                                                                                        </span>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-9 col-md-8">
                                                                            <div class="card-body pt-0">
                                                                                <h3 class="card-title h6">
                                                                                    <a
                                                                                        href="<?php echo htmlentities($row['url']); ?>"><?php echo htmlentities($row['posttitle']); ?></a>
                                                                                </h3>
                                                                                <!--date-->
                                                                                <div class="small text-muted">
                                                                                    <time class="news-date"
                                                                                        datetime="<?php echo htmlentities($row['postingdate']); ?>"><?php echo htmlentities($row['postingdate']); ?></time>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--tabs content-->
                                <div class="tab-pane fade" id="block-cattwo2" role="tabpanel"
                                    aria-labelledby="cat-navitwo2">
                                    <div class="animate slideInDown">
                                        <!--big post-->
                                        <div class="big-post">
                                            <?php
                                            if (isset($_GET['pageno'])) {
                                                $pageno = $_GET['pageno'];
                                            } else {
                                                $pageno = 1;
                                            }
                                            $no_of_records_per_page = 1;
                                            $offset = ($pageno - 1) * $no_of_records_per_page;


                                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                            $result = mysqli_query($con, $total_pages_sql);
                                            $total_rows = mysqli_fetch_array($result)[0];
                                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                                            $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblposts.viewCounter,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=3 and tblposts.SubCategoryId=5 order by RAND() LIMIT $offset, $no_of_records_per_page");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                        <article class="card card-full hover-a mb-4">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <!-- thumbnail -->
                                                                    <div class="ratio_360-202 image-wrapper">
                                                                        <a href="<?php echo htmlentities($row['url']); ?>">
                                                                            <img width="360" height="202"
                                                                                src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                                class=" img-fluid lazy wp-post-image"
                                                                                alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                                title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                                loading="lazy"
                                                                                data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                                srcset="
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                                sizes="(max-width: 360px) 100vw, 360px" />
                                                                            <!-- post type -->
                                                                            <div class="post-type-icon">
                                                                                <span class="fa-stack-sea text-primary">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="16" height="16" fill="currentColor"
                                                                                        class="bi bi-link" viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z" />
                                                                                        <path
                                                                                            d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z">
                                                                                    </svg>

                                                                                </span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="card-body pt-3 pt-sm-0">
                                                                        <!--title-->
                                                                        <h2 class="card-title h3-sm">
                                                                            <a href="<?php echo htmlentities($row['url']); ?>">
                                                                                <?php echo htmlentities($row['posttitle']); ?></a>
                                                                        </h2>
                                                                        <div class="mb-2 text-muted small">
                                                                            <!--author-->
                                                                            <span class="fw-bold d-none d-sm-inline me-1">
                                                                                <a href="#"
                                                                                    title="Posts by <?php echo htmlentities($row['authorname']); ?>"
                                                                                    rel="author">
                                                                                    <?php echo htmlentities($row['authorname']); ?></a>
                                                                            </span>
                                                                            <!--date-->
                                                                            <time class="news-date"
                                                                                datetime="<?php echo htmlentities($row['postingdate']); ?>">
                                                                                <?php echo htmlentities($row['postingdate']); ?></time>
                                                                            <!--comments-->
                                                                            <span
                                                                                title="<?php echo htmlentities($row['viewCounter']); ?> View"
                                                                                class="float-end">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                                    height="16" fill="currentColor"
                                                                                    class="bi bi-eye me-1" viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                                                    </path>
                                                                                    <path
                                                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                                                    </path>
                                                                                </svg>
                                                                                <?php echo htmlentities($row['viewCounter']); ?>
                                                                            </span>
                                                                        </div>
                                                                        <!--description-->
                                                                        <p>
                                                                            <?php echo htmlentities($row['postdes']); ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                            <?php } ?>
                                        </div>

                                        <!--small post start-->
                                        <div class="small-post">
                                            <div class="row">
                                                <!--post list-->
                                                <?php
                                                if (isset($_GET['pageno'])) {
                                                    $pageno = $_GET['pageno'];
                                                } else {
                                                    $pageno = 1;
                                                }
                                                $no_of_records_per_page = 3;
                                                $offset = ($pageno - 1) * $no_of_records_per_page;


                                                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                                $result = mysqli_query($con, $total_pages_sql);
                                                $total_rows = mysqli_fetch_array($result)[0];
                                                $total_pages = ceil($total_rows / $no_of_records_per_page);


                                                $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=3 and tblposts.SubCategoryId=6 order by RAND() LIMIT $offset, $no_of_records_per_page");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                            <article class="col-sm-6">
                                                                <div class="card card-full hover-a mb-4">
                                                                    <div class="row">
                                                                        <!--thumbnail-->
                                                                        <div class="col-3 col-md-4 pe-2 pe-md-0">
                                                                            <div class="ratio_115-80 image-wrapper">
                                                                                <a href="<?php echo htmlentities($row['url']); ?>">
                                                                                    <img width="115" height="80"
                                                                                        src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                                        class=" img-fluid lazy wp-post-image"
                                                                                        alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                                        title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                                        loading="lazy"
                                                                                        data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                                        srcset="
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                                        sizes="(max-width: 115px) 100vw, 115px" />
                                                                                    <!-- post type -->
                                                                                    <div class="post-type-icon">
                                                                                        <span class="fa-stack-sea text-primary">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                width="16" height="16"
                                                                                                fill="currentColor"
                                                                                                class="bi bi-link"
                                                                                                viewBox="0 0 16 16">
                                                                                                <path
                                                                                                    d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z" />
                                                                                                <path
                                                                                                    d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z">
                                                                                            </svg>

                                                                                        </span>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-9 col-md-8">
                                                                            <div class="card-body pt-0">
                                                                                <h3 class="card-title h6">
                                                                                    <a
                                                                                        href="<?php echo htmlentities($row['url']); ?>"><?php echo htmlentities($row['posttitle']); ?></a>
                                                                                </h3>
                                                                                <!--date-->
                                                                                <div class="small text-muted">
                                                                                    <time class="news-date"
                                                                                        datetime="<?php echo htmlentities($row['postingdate']); ?>"><?php echo htmlentities($row['postingdate']); ?></time>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--tabs content-->
                                <div class="tab-pane fade" id="block-catthree2" role="tabpanel"
                                    aria-labelledby="cat-navithree2">
                                    <div class="animate slideInDown">
                                        <!--big post-->
                                        <div class="big-post">
                                            <?php
                                            if (isset($_GET['pageno'])) {
                                                $pageno = $_GET['pageno'];
                                            } else {
                                                $pageno = 1;
                                            }
                                            $no_of_records_per_page = 1;
                                            $offset = ($pageno - 1) * $no_of_records_per_page;


                                            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                            $result = mysqli_query($con, $total_pages_sql);
                                            $total_rows = mysqli_fetch_array($result)[0];
                                            $total_pages = ceil($total_rows / $no_of_records_per_page);


                                            $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.viewCounter,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=3 order by RAND()  LIMIT $offset, $no_of_records_per_page");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                        <article class="card card-full hover-a mb-4">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <!-- thumbnail -->
                                                                    <div class="ratio_360-202 image-wrapper">
                                                                        <a href="<?php echo htmlentities($row['url']); ?>">
                                                                            <img width="360" height="202"
                                                                                src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                                class=" img-fluid lazy wp-post-image"
                                                                                alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                                title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                                loading="lazy"
                                                                                data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                                srcset="
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                    admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                                sizes="(max-width: 360px) 100vw, 360px" />
                                                                            <!-- post type -->
                                                                            <div class="post-type-icon">
                                                                                <span class="fa-stack-sea text-primary">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="16" height="16" fill="currentColor"
                                                                                        class="bi bi-link" viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z" />
                                                                                        <path
                                                                                            d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z">
                                                                                    </svg>

                                                                                </span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="card-body pt-3 pt-sm-0">
                                                                        <!--title-->
                                                                        <h2 class="card-title h3-sm">
                                                                            <a href="<?php echo htmlentities($row['url']); ?>">
                                                                                <?php echo htmlentities($row['posttitle']); ?></a>
                                                                        </h2>
                                                                        <div class="mb-2 text-muted small">
                                                                            <!--author-->
                                                                            <span class="fw-bold d-none d-sm-inline me-1">
                                                                                <a href="#"
                                                                                    title="Posts by <?php echo htmlentities($row['authorname']); ?>"
                                                                                    rel="author">
                                                                                    <?php echo htmlentities($row['authorname']); ?></a>
                                                                            </span>
                                                                            <!--date-->
                                                                            <time class="news-date"
                                                                                datetime="<?php echo htmlentities($row['postingdate']); ?>">
                                                                                <?php echo htmlentities($row['postingdate']); ?></time>
                                                                            <!--comments-->
                                                                            <span
                                                                                title="<?php echo htmlentities($row['viewCounter']); ?> View"
                                                                                class="float-end">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                                    height="16" fill="currentColor"
                                                                                    class="bi bi-eye me-1" viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                                                    </path>
                                                                                    <path
                                                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                                                    </path>
                                                                                </svg>
                                                                                <?php echo htmlentities($row['viewCounter']); ?>
                                                                            </span>
                                                                        </div>
                                                                        <!--description-->
                                                                        <p>
                                                                            <?php echo htmlentities($row['postdes']); ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                            <?php } ?>
                                        </div>

                                        <!--small post start-->
                                        <div class="small-post">
                                            <div class="row">
                                                <!--post list-->
                                                <?php
                                                if (isset($_GET['pageno'])) {
                                                    $pageno = $_GET['pageno'];
                                                } else {
                                                    $pageno = 1;
                                                }
                                                $no_of_records_per_page = 3;
                                                $offset = ($pageno - 1) * $no_of_records_per_page;


                                                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                                $result = mysqli_query($con, $total_pages_sql);
                                                $total_rows = mysqli_fetch_array($result)[0];
                                                $total_pages = ceil($total_rows / $no_of_records_per_page);


                                                $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=3 order by RAND() LIMIT $offset, $no_of_records_per_page");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                            <article class="col-sm-6">
                                                                <div class="card card-full hover-a mb-4">
                                                                    <div class="row">
                                                                        <!--thumbnail-->
                                                                        <div class="col-3 col-md-4 pe-2 pe-md-0">
                                                                            <div class="ratio_115-80 image-wrapper">
                                                                                <a href="<?php echo htmlentities($row['url']); ?>">
                                                                                    <img width="115" height="80"
                                                                                        src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                                        class=" img-fluid lazy wp-post-image"
                                                                                        alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                                        title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                                        loading="lazy"
                                                                                        data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                                        srcset="
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                                        sizes="(max-width: 115px) 100vw, 115px" />
                                                                                    <!-- post type -->
                                                                                    <div class="post-type-icon">
                                                                                        <span class="fa-stack-sea text-primary">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                width="16" height="16"
                                                                                                fill="currentColor"
                                                                                                class="bi bi-link"
                                                                                                viewBox="0 0 16 16">
                                                                                                <path
                                                                                                    d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z" />
                                                                                                <path
                                                                                                    d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z">
                                                                                            </svg>

                                                                                        </span>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-9 col-md-8">
                                                                            <div class="card-body pt-0">
                                                                                <h3 class="card-title h6">
                                                                                    <a
                                                                                        href="<?php echo htmlentities($row['url']); ?>"><?php echo htmlentities($row['posttitle']); ?></a>
                                                                                </h3>
                                                                                <!--date-->
                                                                                <div class="small text-muted">
                                                                                    <time class="news-date"
                                                                                        datetime="<?php echo htmlentities($row['postingdate']); ?>"><?php echo htmlentities($row['postingdate']); ?></time>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="block-area">
                            <div class="block-title-6">
                                <h4 class="h5 border-primary">
                                    <span class="bg-primary text-white">Travel and Places</span>
                                </h4>
                            </div>
                            <!--Block style 1-->
                            <div class="row">
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


                                $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.viewCounter,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId=3 order by RAND() LIMIT $offset, $no_of_records_per_page");
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                            <article class="col-sm-6 col-md-12 col-lg-6">
                                                <div class="card card-full hover-a mb-4">
                                                    <!-- thumbnail -->
                                                    <div class="ratio_360-202 image-wrapper">
                                                        <a href="<?php echo htmlentities($row['url']); ?>">
                                                            <img width="360" height="202"
                                                                src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                class=" img-fluid lazy wp-post-image"
                                                                alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                title="<?php echo htmlentities($row['posttitle']); ?>" loading="lazy"
                                                                data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                srcset="
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                sizes="(max-width: 360px) 100vw, 360px" />
                                                        </a>
                                                    </div>
                                                    <a class="bg-full-shadow" href="<?php echo htmlentities($row['url']); ?>"
                                                        aria-label="background shadow"></a>
                                                    <div class="position-absolute px-3 top-3 w-100 z-index-5 text-center">
                                                        <!--title-->
                                                        <a href="<?php echo htmlentities($row['url']); ?>">
                                                            <h5 class="card-title h3 h4-sm h3-md text-white my-1">
                                                                <?php echo htmlentities($row['posttitle']); ?>
                                                            </h5>
                                                        </a>
                                                        <!--author-->
                                                        <span class="fw-bold white d-inline d-sm-none d-md-inline me-1">
                                                            <a href="#"
                                                                title="Posts by <?php echo htmlentities($row['authorname']); ?>"
                                                                rel="author"><?php echo htmlentities($row['authorname']); ?></a>
                                                        </span>
                                                        <!--date-->
                                                        <time class="d-sm-none d-md-inline m-0 text-white"
                                                            datetime="<?php echo htmlentities($row['postingdate']); ?>"><?php echo htmlentities($row['postingdate']); ?></time>
                                                    </div>
                                                </div>
                                            </article>
                                <?php } ?>
                            </div>

                            <!--Block style 12-->
                        </div>
                    </div>
                    <!--left sidebar check-->

                    <!--right sidebar check-->

                    <aside class="col-md-4 widget-area end-sidebar-lg" id="right-sidebar">
                        <div class="sticky">
                            <?php include("./supportpage/socialmedia.php"); ?>
                            <?php include("./supportpage/people-liked.php"); ?>
                            <?php include("./supportpage/latest-post.php"); ?>
                        </div>
                    </aside>

                    <!--section 2-->
                    <?php include("./supportpage/popular-post.php"); ?>

                    <!--content 2-->
                    <div class="col-md-8 order-4">
                        <div class="block-area">
                            <div class="block-title-6">
                                <h4 class="h5 border-primary">
                                    <span class="bg-primary text-white">Latest Post</span>
                                </h4>
                            </div>
                            <!--output-->
                            <div class="border-bottom-last-0 first-pt-0">
                                <?php
                                if (isset($_GET['pageno'])) {
                                    $pageno = $_GET['pageno'];
                                } else {
                                    $pageno = 1;
                                }
                                $no_of_records_per_page = 10;
                                $offset = ($pageno - 1) * $no_of_records_per_page;


                                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                $result = mysqli_query($con, $total_pages_sql);
                                $total_rows = mysqli_fetch_array($result)[0];
                                $total_pages = ceil($total_rows / $no_of_records_per_page);


                                $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.viewCounter as viewcount,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1  order by RAND() LIMIT $offset, $no_of_records_per_page");
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                            <article
                                                class="card card-full hover-a py-4 post-1305 post type-post status-publish format-video has-post-thumbnail hentry category-video tag-science tag-starvation post_format-post-format-video"
                                                id="post-1305">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-12 col-lg-6">
                                                        <!--thumbnail-->
                                                        <div class="ratio_360-202 image-wrapper">
                                                            <a href="<?php echo htmlentities($row['url']); ?>">
                                                                <img width="360" height="202"
                                                                    src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                    class=" img-fluid lazy wp-post-image"
                                                                    alt="<?php echo htmlentities($row['posttitle']); ?>"
                                                                    title="<?php echo htmlentities($row['posttitle']); ?>"
                                                                    loading="lazy"
                                                                    data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                                                    srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                                    sizes="(max-width: 360px) 100vw, 360px" />
                                                                <!-- post type -->
                                                                <div class="post-type-icon">
                                                                    <span class="fa-stack-sea text-primary">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                            height="16" fill="currentColor" class="bi bi-play-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z">
                                                                        </svg>

                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!--content-->
                                                    <div class="col-sm-6 col-md-12 col-lg-6">
                                                        <div class="card-body pt-3 pt-sm-0 pt-md-3 pt-lg-0">
                                                            <!--title-->
                                                            <h3 class="card-title h2 h3-sm h2-md">
                                                                <a href="<?php echo htmlentities($row['url']); ?>">
                                                                    <?php echo htmlentities($row['posttitle']); ?></a>
                                                            </h3>
                                                            <div class="card-text mb-2 text-muted small">
                                                                <!--author-->
                                                                <span class="fw-bold d-none d-sm-inline me-1">
                                                                    <a href="#"
                                                                        title="Posts by <?php echo htmlentities($row['authorname']); ?>"
                                                                        rel="author">
                                                                        <?php echo htmlentities($row['authorname']); ?></a>
                                                                </span>
                                                                <!--date-->
                                                                <time class="news-date"
                                                                    datetime="  <?php echo htmlentities($row['postingdate']); ?>">
                                                                    <?php echo htmlentities($row['postingdate']); ?></time>
                                                            </div>
                                                            <!--description-->
                                                            <p class="card-text">
                                                                <?php echo htmlentities($row['postdes']); ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <!--end content-->
                                                </div>
                                            </article>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="clearfix my-4">
                            <nav class="float-start" aria-label="Posts navigation">
                                <ul class="pagination justify-content-center mb-4">
                                    <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
                                    <li class="<?php if ($pageno <= 1) {
                                        echo 'disabled';
                                    } ?> page-item">
                                        <a href="<?php if ($pageno <= 1) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pageno - 1);
                                        } ?>"
                                            class="page-link">Prev</a>
                                    </li>
                                    <li class="<?php if ($pageno >= $total_pages) {
                                        echo 'disabled';
                                    } ?> page-item">
                                        <a href="<?php if ($pageno >= $total_pages) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pageno + 1);
                                        } ?> "
                                            class="page-link">Next</a>
                                    </li>
                                    <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>"
                                            class="page-link">Last</a></li>
                                </ul>
                            </nav>
                            <span class="py-2 float-end"></span>
                        </div>
                    </div>
                    <!--left sidebar check-->

                    <!--right sidebar check-->

                    <aside class="col-md-4 widget-area end-sidebar-lg order-5" id="right-sidebar2">
                        <div class="sticky">
                            <aside id="bootnews_custompost-5" class="widget widget_categories widget_categories_custom">
                                <div class="block-title-4">
                                    <h4 class="h5 title-arrow"><span>Popular post</span></h4>
                                </div>
                                <!--style 4-->
                                <ul class="post-number list-unstyled border-bottom-last-0 rounded mb-5">
                                    <?php
                                    if (isset($_GET['pageno'])) {
                                        $pageno = $_GET['pageno'];
                                    } else {
                                        $pageno = 1;
                                    }
                                    $no_of_records_per_page = 6;
                                    $offset = ($pageno - 1) * $no_of_records_per_page;


                                    $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                    $result = mysqli_query($con, $total_pages_sql);
                                    $total_rows = mysqli_fetch_array($result)[0];
                                    $total_pages = ceil($total_rows / $no_of_records_per_page);


                                    $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.viewCounter as viewcount,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1  order by RAND() LIMIT $offset, $no_of_records_per_page");
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                                <li class="hover-a">
                                                    <a class="h5 h6-md h5-lg"
                                                        href="<?php echo htmlentities($row['url']); ?>"><?php echo htmlentities($row['posttitle']); ?></a>
                                                </li>
                                    <?php } ?>

                                </ul>
                            </aside>

                        </div>
                    </aside>
                </div>
            </div>
        </main>
        <!--End main content-->

        <!--Footer start-->
        <?php include("./includes/footer.php") ?>
    </div>
    <!-- ========== END WRAPPER ========== -->

    <!--Back to top-->
    <a class="back-top btn btn-light border position-fixed r-1 b-1" href="#">
        <svg class="bi bi-arrow-up" width="1rem" height="1rem" viewBox="0 0 16 16" fill="currentColor"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V4a.5.5 0 01.5-.5z" clip-rule="evenodd">
            </path>
            <path fill-rule="evenodd"
                d="M7.646 2.646a.5.5 0 01.708 0l3 3a.5.5 0 01-.708.708L8 3.707 5.354 6.354a.5.5 0 11-.708-.708l3-3z"
                clip-rule="evenodd"></path>
        </svg>
    </a>

    <script async src="js/bundle.min.js" id="bootnews-scripts-js"></script>
    <script async src="./js/embed.min.js" id="wp-embed-js"></script>
</body>

</html>