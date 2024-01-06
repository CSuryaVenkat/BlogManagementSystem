<div class="row featured-1 mb-5">
    <!--Start slider news-->
    <div class="col-md-6 pb-05 pt-05 pe-md-05">
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


        $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblposts.viewCounter,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by RAND() desc  LIMIT $offset, $no_of_records_per_page");
        while ($row = mysqli_fetch_array($query)) {
            ?>
            <article class="card card-full text-light overflow zoom">
                <div class="height-ratio image-wrapper">
                    <a href="<?php echo htmlentities($row['url']); ?>">
                        <img width="360" height="202" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                            class=" img-fluid lazy wp-post-image" alt="<?php echo htmlentities($row['posttitle']); ?>"
                            title="<?php echo htmlentities($row['posttitle']); ?>" loading="lazy"
                            data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                            srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w " sizes="(max-width: 360px) 100vw, 360px" />
                        <!-- post type -->
                    </a>
                </div>
                <div class="position-absolute p-3 b-0 w-100 bg-lg-shadow">
                    <!-- post title -->
                    <h2 class="h1-sm h2-md display-4-lg fw-bold heading-letter-space text-white">
                        <a class="text-white" href="<?php echo htmlentities($row['url']); ?>">
                            <?php echo htmlentities($row['posttitle']); ?>
                        </a>
                    </h2>
                    <!-- author and date -->
                    <div class="news-meta mb-2">
                        <span class="news-author white">by
                            <span class="fw-bold"><a href="#"
                                    title="Posts by <?php echo htmlentities($row['authorname']); ?>" rel="author">
                                    <?php echo htmlentities($row['authorname']); ?>
                                </a></span></span>
                        <time class="news-date" datetime=" <?php echo htmlentities($row['postingdate']); ?>">
                            <?php echo htmlentities($row['postingdate']); ?>
                        </time>
                    </div>
                </div>
            </article>
        <?php } ?>
    </div>
    <!--End slider news-->

    <!--Start box news-->
    <div class="col-md-6 pt-05 ps-md-05">
        <div class="row newsbox">
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


            $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblposts.viewCounter,tblposts.cattags,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by RAND() desc  LIMIT $offset, $no_of_records_per_page");
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <article class="col-6">
                    <div class="card card-full text-white overflow zoom">
                        <!--thumbnail-->
                        <div class="height-ratio image-wrapper">
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
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']); ?>  165w " sizes="(max-width: 360px) 100vw, 360px" />
                                <!-- post type -->
                            </a>
                        </div>
                        <div class="position-absolute px-3 pb-3 pt-0 b-0 w-100 bg-shadow">
                            <!--category-->
                            <?php

                            $ip = $row['cattags']; // some IP address
                            $iparr = explode(",", $ip);
                            // $dataarr=explode (",", $data); 
                            ?>
                            <a href="category/lifestyle/adventure/index.php" class="p-1 badge bg-primary text-white">
                                <?php echo htmlentities($iparr[0]); ?>
                            </a>
                            <a href="category/lifestyle/travel/index.php" class="p-1 badge bg-primary text-white">
                                <?php echo htmlentities($iparr[1]); ?>
                            </a>
                            <!-- post title -->
                            <h3 class="h6 h4-sm h6-md h5-lg text-white my-1">
                                <a class="text-white" href="<?php echo htmlentities($row['url']); ?>">
                                    <?php echo htmlentities($row['posttitle']); ?>
                                </a>
                            </h3>
                        </div>
                    </div>
                </article>
            <?php } ?>

        </div>
    </div>
    <!--End box news-->
</div>