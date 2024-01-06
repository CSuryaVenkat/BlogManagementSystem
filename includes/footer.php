<footer>
    <!--Footer content-->
    <div id="footer" class="footer-dark bg-dark bg-footer py-5 px-3">
        <div class="container">
            <div class="row">
                <!-- left widget -->
                <div class="col-md-4">
                    <div id="bootnews_about-1" class="widget widget_categories widget_categories_custom">
                        <div class="block-area">
                            <h3 class="h5 widget-title border-bottom border-smooth">
                                About Us
                            </h3>

                            <p>

                                CurdOperation is the blog website where here know about the more information about the
                                technologis , health and food and so on and know about the world wide information
                            </p>

                            <address>

                                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor"
                                    class="bi bi-geo-alt-fill me-2" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0
                                    0 1 0 6z" />
                                </svg>Sindhuvalli ,Sindhuvall
                                i main road, Mysore Karnataka -571311
                            </address>
                            <p class="footer-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor"
                                    class="bi bi-telephone-fill me-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>
                                +(91) 9964716807
                            </p>
                            <p class="footer-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor"
                                    class="bi bi-envelope-fill me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                                </svg>support@CurdOperation.com
                            </p>
                        </div>
                    </div>
                    <!-- .footer-widget -->
                </div>
                <!-- center widget -->
                <div class="col-sm-6 col-md-4">
                    <div id="bootnews_custompost-7" class="widget widget_categories widget_categories_custom">
                        <h3 class="h5 widget-title border-bottom border-smooth">
                            Custom post
                        </h3>
                        <!--style 1-->
                        <div class="small-post">
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


                            $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblposts.viewCounter,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by RAND() desc  LIMIT $offset, $no_of_records_per_page");
                            while ($row = mysqli_fetch_array($query)) {
                                ?>






                                <!--post list-->
                                <article class="card card-full hover-a mb-4">
                                    <div class="row">
                                        <div class="col-3 col-md-4 pe-2 pe-md-0">
                                            <!--thumbnail-->
                                            <div class="ratio_110-77 image-wrapper">

                                                <a href="<?php echo htmlentities($row['posttitle']); ?>">
                                                    <img width="110" height="77"
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
                                                            admin/posti
                                                   mages/<?php echo htmlentities($row['PostImage']); ?>  165w "
                                                        sizes="(max-width: 110px) 100vw, 110px" />
                                                    <!-- post type -->
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-9 col-md-8">
                                            <div class="card-body pt-0">
                                                <!--title-->
                                                <h3 class="card-title h6 h5-sm h6-md">
                                                    <a href="<?php echo htmlentities($row['url']); ?>">
                                                        <?php echo htmlentities($row['posttitle']); ?>
                                                    </a>
                                                </h3>
                                                <!--date-->
                                                <div class="card-text small text-muted">
                                                    <time class="news-date"
                                                        datetime="<?php echo htmlentities($row['postingdate']); ?>">
                                                        <?php echo htmlentities($row['postingdate']); ?>
                                                    </time>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            <?php } ?>
                            <!--End post list-->

                        </div>
                        <div class="gap-0"></div>
                    </div>
                    <!-- .footer-widget -->
                </div>
                <!-- right widget -->
                <div class="widget col-sm-6 col-md-4">
                    <div id="bootnews_gallerypost-1" class="widget widget_categories widget_categories_custom">
                        <h3 class="h5 widget-title border-bottom border-smooth">
                            News in Pictures
                        </h3>
                        <!--block-->
                        <div class="col-12 insta-list mb-5">
                            <ul class="row list-unstyled mb-0 bg-light">
                                <?php
                                if (isset($_GET['pageno'])) {
                                    $pageno = $_GET['pageno'];
                                } else {
                                    $pageno = 1;
                                }
                                $no_of_records_per_page = 9;
                                $offset = ($pageno - 1) * $no_of_records_per_page;


                                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                $result = mysqli_query($con, $total_pages_sql);
                                $total_rows = mysqli_fetch_array($result)[0];
                                $total_pages = ceil($total_rows / $no_of_records_per_page);


                                $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblposts.viewCounter,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1  order by RAND() desc  LIMIT $offset, $no_of_records_per_page");
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <li class="col-6 col-sm-4 px-0 hover-a mb-0 overflow zoom">
                                        <a href="<?php echo htmlentities($row['url']); ?>"
                                            title="<?php echo htmlentities($row['posttitle']); ?>">
                                            <div class="ratio_540-454 image-wrapper">
                                                <img width="282" height="240"
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
                                                    sizes="(max-width: 282px) 100vw, 282px" />
                                                <!-- post type -->


                                            </div>
                                        </a>
                                    </li>


                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- .footer-widget -->
                </div>
            </div>
        </div>
    </div>
    <!--End footer content-->


    <!-- footer copyright menu -->
    <div class="footer-copyright bg-secondary">
        <div class="container">
            <!--Navbar-->
            <nav class="navbar navbar-expand navbar-dark px-0">
                <!--footer start menu-->
                <ul id="mobile-menu2" class="navbar-nav text-center first-start-lg-0 footer-nav">
                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"
                        id="menu-item-1494"
                        class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home active menu-item-1494 nav-item">
                        <a title="Home" href="index.php" class="nav-link">Home</a>
                    </li>
                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"
                        id="menu-item-1495"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1495 nav-item">
                        <a title="About Us" href="about-us.php" class="nav-link">About Us</a>
                    </li>
                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationEl
   ement" id="menu-item-1496" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1496 nav-item">
                        <a title="Contact Us" href="contact-us.php" class="nav-link">Contact Us</a>
                    </li>
                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"
                        id="menu-item-1497"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1497 nav-item">
                        <a title="Privacy Policy" href="Privacy-Policy.php" class="nav-link">Privacy Policy</a>
                    </li>

                </ul>
                <!--end footer start menu-->

                <!-- footer copyright -->
                <ul class="navbar-nav ms-auto text-center footer-nav-end">
                    <li class="d-inline navbar-text">
                        Copyright CurdOperation - All rights reserved
                    </li>
                </ul>
                <!-- end footer copyright -->
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
    <!--end copyright menu-->
</footer>
<script defer type="text/javascript">
    // <![CDATA[
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
    // ]]>
</script>
<script defer src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
    type="text/javascript"></script>