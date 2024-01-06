<div class="col-12">
                        <div class="block-area pt-4 pb-0 px-4 border bg-light-black mb-5">
                            <div class="block-title-6">
                                <h4 class="h5 border-primary">
                                    <span class="bg-primary text-white">Most People Viewed</span>
                                </h4>
                            </div>
                            <div class="nav-slider-hover nav-dots-top-right light-dots" data-flickity='{ "cellAlign": "left", "wrapAround": true, "adaptiveHeight": true, "prevNextButtons": true , "pageDots": true, "imagesLoaded": true }'>
                                <!-- item slider -->
                                <?php 
                                            if (isset($_GET['pageno'])) {
                                                    $pageno = $_GET['pageno'];
                                                } else {
                                                    $pageno = 1;
                                                }
                                                $no_of_records_per_page = 10;
                                                $offset = ($pageno-1) * $no_of_records_per_page;


                                                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                                $result = mysqli_query($con,$total_pages_sql);
                                                $total_rows = mysqli_fetch_array($result)[0];
                                                $total_pages = ceil($total_rows / $no_of_records_per_page);


                                        $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.viewCounter as viewcount,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.viewCounter>=10  order by RAND() LIMIT $offset, $no_of_records_per_page");
                                        while ($row=mysqli_fetch_array($query)) {
                                        ?>
                                <article class="col-12 col-sm-6 col-lg-4 me-2">
                                    <div class="card card-full text-white overflow zoom mb-4">
                                        <!--thumbnail-->
                                        <div class="height-ratio image-wrapper">
                                            <a href="<?php echo htmlentities($row['url']);?>">
                                                <img width="400" height="340" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" class=" img-fluid lazy wp-post-image" alt="<?php echo htmlentities($row['posttitle']);?>" title="<?php echo htmlentities($row['posttitle']);?>" loading="lazy" data-src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" srcset="
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?> 360w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?> 372w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?> 251w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?> 230w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?> 203w,
                                                            admin/postimages/<?php echo htmlentities($row['PostImage']);?>  165w " sizes="(max-width: 400px) 100vw, 400px" />
                                            </a>
                                        </div>
                                        <div class="position-absolute px-3 pb-3 pt-0 b-0 w-100 bg-shadow">
                                            <!-- post title -->
                                            <h3 class="h3 h5-sm h3-md my-1">
                                                <a class="text-white" href="<?php echo htmlentities($row['url']);?>">
                                                    <?php echo htmlentities($row['posttitle']);?></a></a>
                                            </h3>
                                            <!--post date-->
                                            <div class="text-muted small">
                                                <time class="news-date text-white" datetime=" <?php echo htmlentities($row['postingdate']);?>">
                                                    <?php echo htmlentities($row['postingdate']);?></time>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <?php } ?>
                                <!-- item slider -->

                            </div>
                        </div>
                    </div>