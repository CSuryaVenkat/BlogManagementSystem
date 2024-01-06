<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
    <title>Gadgets and Product Reviews Related Blogs</title>
    <meta name="description"
        content="Gadgets and Product Reviews Related Blogs informations and knowledge finds in this page where it is gathered by knowledgeable team members in CurdOperation." />

    <meta name="keywords"
        content="Gadgets and Product Reviews Related Blogs ,New Gadgets , Product Reviews ,  Product Reviews Related Blogs" />


    <link rel="dns-prefetch" href="http://fonts.googleapis.com/" />
    <link rel="dns-prefetch" href="http://s.w.org/" />

    <link rel="stylesheet" href="./css/bootstarp.css" media="all" />
    <link rel="stylesheet" href="./css/style.css" media="all" />

    <meta name="generator" content="php" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <!-- extra lunk -->
    <meta name="apple-mobile-web-app-title" content="Gadgets and Product Reviews Related Blogs" />

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


                    </div>

                    <!--content 1-->
                    <div class="col-md-8 order-4">
                        <div class="block-area">
                            <div class="block-title-6">
                                <h4 class="h5 border-primary">
                                    <span class="bg-primary text-white">Latest Gadgets and Product Reviews Post</span>
                                </h4>
                            </div>
                            <!--output-->
                            <div class="border-bottom-last-0 first-pt-0">
                                <!-- Blog Post -->
                                <?php
                                if ($_GET['catid'] != '') {
                                    $_SESSION['catid'] = $_GET['catid'];
                                }
                                $postid = $_GET['catid'];
                                $sql = mysqli_query($con, "SELECT * FROM tblcategory WHERE catslug = '{$_GET['catid']}' ");
                                $resultdata = mysqli_fetch_assoc($sql);
                                if (isset($_GET['pageno'])) {
                                    $pageno = $_GET['pageno'];
                                } else {
                                    $pageno = 1;
                                }
                                $no_of_records_per_page = 8;
                                $offset = ($pageno - 1) * $no_of_records_per_page;


                                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                $result = mysqli_query($con, $total_pages_sql);
                                $total_rows = mysqli_fetch_array($result)[0];
                                $total_pages = ceil($total_rows / $no_of_records_per_page);


                                $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblposts.postdes as postdes,tblposts.authorname as authorname,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId='3' and tblposts.Is_Active=1 order by RAND() LIMIT $offset, $no_of_records_per_page");

                                $rowcount = mysqli_num_rows($query);
                                if ($rowcount == 0) {
                                    echo "No record found";
                                } else {
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
                                                                <?php echo htmlentities($row['posttitle']); ?>
                                                            </a>
                                                        </h3>
                                                        <div class="card-text mb-2 text-muted small">
                                                            <!--author-->
                                                            <span class="fw-bold d-none d-sm-inline me-1">
                                                                <a href="#"
                                                                    title="Posts by <?php echo htmlentities($row['authorname']); ?>"
                                                                    rel="author">
                                                                    <?php echo htmlentities($row['authorname']); ?>
                                                                </a>
                                                            </span>
                                                            <!--date-->
                                                            <time class="news-date"
                                                                datetime=" <?php echo htmlentities($row['postingdate']); ?>">
                                                                <?php echo htmlentities($row['postingdate']); ?>
                                                            </time>
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
                                <ul class="pagination justify-content-center mb-4">
                                    <li class="page-item active"><a href="?pageno=1" class="page-link">First</a></li>
                                    <li class="<?php if ($pageno <= 1) {
                                        echo 'disabled';
                                    } ?> page-item">
                                        <a href="<?php if ($pageno <= 1) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pageno - 1);
                                        } ?>" class="page-link">Prev</a>
                                    </li>
                                    <li class="<?php if ($pageno >= $total_pages) {
                                        echo 'disabled';
                                    } ?> page-item">
                                        <a href="<?php if ($pageno >= $total_pages) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pageno + 1);
                                        } ?> " class="page-link">Next</a>
                                    </li>
                                    <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>"
                                            class="page-link">Last</a></li>
                                </ul>
                                <span class="py-2 float-end"></span>
                            </div>
                        <?php } ?>
                    </div>


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


                                    $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.viewCounter as viewcount,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by RAND()  LIMIT $offset, $no_of_records_per_page");
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <li class="hover-a">
                                            <a class="h5 h6-md h5-lg" href="<?php echo htmlentities($row['url']); ?>">
                                                <?php echo htmlentities($row['posttitle']); ?>
                                            </a>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </aside>
                            <?php include("./supportpage/socialmedia.php"); ?>
                            <?php include("./supportpage/people-liked.php"); ?>
                            <?php include("./supportpage/latest-post.php"); ?>
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