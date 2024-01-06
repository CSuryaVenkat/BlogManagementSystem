  <aside id="bootnews_custompost-10" class="widget widget_categories widget_categories_custom">
                                <div class="block-title-4">
                                    <h4 class="h5 title-arrow"><span>People Liked</span></h4>
                                </div>
                                <!--style 3-->
                                <div id="timeline-post">
                                    <ul class="timeline-post">
                                         <?php 
                                            if (isset($_GET['pageno'])) {
                                                    $pageno = $_GET['pageno'];
                                                } else {
                                                    $pageno = 1;
                                                }
                                                $no_of_records_per_page = 5;
                                                $offset = ($pageno-1) * $no_of_records_per_page;


                                                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                                $result = mysqli_query($con,$total_pages_sql);
                                                $total_rows = mysqli_fetch_array($result)[0];
                                                $total_pages = ceil($total_rows / $no_of_records_per_page);


                                        $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by RAND() LIMIT $offset, $no_of_records_per_page");
                                        while ($row=mysqli_fetch_array($query)) {
                                        ?>
                                        <li>
                                            <a href="<?php echo htmlentities($row['url']);?>">
                                                <span class="timeline-date small"><time class="news-date" datetime="<?php echo htmlentities($row['postingdate']);?>"> <?php echo htmlentities($row['postingdate']);?></time></span>
                                                <h4 class="h6 timeline-title">
                                                     <?php echo htmlentities($row['posttitle']);?>
                                                </h4>
                                            </a>
                                        </li>
                                         <?php } ?>  
                                        
                                    </ul>
                                    <div class="gap-05"></div>
                                </div>
                            </aside>