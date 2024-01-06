 <aside id="bootnews_latestside-4" class="widget widget_categories widget_categories_custom">
                                <div class="block-title-4">
                                    <h4 class="h5 title-arrow"><span>Latest Post</span></h4>
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
                                                        $offset = ($pageno-1) * $no_of_records_per_page;


                                                        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                                        $result = mysqli_query($con,$total_pages_sql);
                                                        $total_rows = mysqli_fetch_array($result)[0];
                                                        $total_pages = ceil($total_rows / $no_of_records_per_page);


                                                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.viewCounter,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by RAND() LIMIT $offset, $no_of_records_per_page");
                                                while ($row=mysqli_fetch_array($query)) {
                                                ?>

                                        <article class="card card-full hover-a mb-4">
                                            <!--thumbnail-->
                                            <div class="ratio_360-202 image-wrapper">
                                                <a href="<?php echo htmlentities($row['url']);?>">
                                                    <img width="360" height="202" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" class=" img-fluid lazy wp-post-image" alt="<?php echo htmlentities($row['posttitle']);?>" title="<?php echo htmlentities($row['posttitle']);?>" loading="lazy" data-src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?>  165w " sizes="(max-width: 360px) 100vw, 360px" />
                                                    <!-- post type -->
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <!--title-->
                                                <h2 class="card-title h3-sm h1-md h3-lg">
                                                    <a href="<?php echo htmlentities($row['url']);?>">
                                                        <?php echo htmlentities($row['posttitle']);?></a>
                                                </h2>
                                                <div class="card-text mb-2 text-muted small">
                                                    <!--author-->
                                                    <span class="fw-bold d-none d-sm-inline me-1">
                                                        <a href="#" title="Posts by <?php echo htmlentities($row['authorname']);?>" rel="author"><?php echo htmlentities($row['authorname']);?></a>
                                                    </span>
                                                    <!--date-->
                                                    <time class="news-date" datetime="<?php echo htmlentities($row['postingdate']);?>">
                                                        <?php echo htmlentities($row['postingdate']);?></time>
                                                    <!--comments-->
                                                    <span title="<?php echo htmlentities($row['viewCounter']);?> View" class="float-end">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye me-1" viewBox="0 0 16 16">
                                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                                </path>
                                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                                </path>
                                                            </svg>
                                                            <?php echo htmlentities($row['viewCounter']);?>
                                                        </span>
                                                </div>
                                                <!--description-->
                                                <p class="card-text">
                                                    <?php echo htmlentities($row['postdes']);?>
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
                                                $offset = ($pageno-1) * $no_of_records_per_page;


                                                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                                $result = mysqli_query($con,$total_pages_sql);
                                                $total_rows = mysqli_fetch_array($result)[0];
                                                $total_pages = ceil($total_rows / $no_of_records_per_page);


                                        $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by RAND() LIMIT $offset, $no_of_records_per_page");
                                        while ($row=mysqli_fetch_array($query)) {
                                        ?>

                                        <article class="card card-full hover-a mb-4">
                                            <div class="row">
                                                <!--thumbnail-->
                                                <div class="col-3 col-md-4 pe-2 pe-md-0">
                                                    <div class="ratio_115-80 image-wrapper">
                                                        <img width="115" height="80" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" class=" img-fluid lazy wp-post-image" alt="<?php echo htmlentities($row['posttitle']);?>" title="<?php echo htmlentities($row['posttitle']);?>" loading="lazy" data-src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?>  165w " sizes="(max-width: 360px) 100vw, 360px" />
                                                        <!-- post type -->
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-md-8">
                                                    <div class="card-body pt-0">
                                                        <!--title-->
                                                        <h3 class="card-title h6 h4-md h6-lg">
                                                            <a href="<?php echo htmlentities($row['url']);?>">
                                                                <?php echo htmlentities($row['posttitle']);?></a>
                                                        </h3>
                                                        <!--date-->
                                                        <div class="card-text small text-muted">
                                                            <time class="news-date" datetime="<?php echo htmlentities($row['postingdate']);?>">
                                                                <?php echo htmlentities($row['postingdate']);?></time>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <?php } ?>
                                    </div>
                                <div class="gap-0"></div>
                            </aside>