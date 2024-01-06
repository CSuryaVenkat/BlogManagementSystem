<div class="row py-2">
    <!--Breaking box-->
    <div class="col-2 col-sm-1 col-md-3 col-lg-2 py-1 pe-md-0">
        <div class="d-inline-block d-md-block bg-primary text-white text-center breaking-caret py-1 px-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor"
                class="bi bi-lightning-fill" viewBox="0 0 16 16">
                <path
                    d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z" />
            </svg>
            <span class="d-none d-md-inline-block">Most People Watch</span>
        </div>
    </div>
    <!--Breaking content-->
    <div class="col-10 col-sm-11 col-md-9 col-lg-10 ps-1 ps-md-2">
        <div class="breaking-box position-relative py-2">
            <div class="box-carousel"
                data-flickity='{ "cellAlign": "left", "wrapAround": true, "adaptiveHeight": true, "prevNextButtons": true , "autoPlay": 5000, "pageDots": false, "imagesLoaded": true }'>
                <!--breaking news-->
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
                    <div class="col-12 active aribudin">
                        <a class="h5 fw-normal" href="<?php echo htmlentities($row['url']); ?>">
                            <?php echo htmlentities($row['posttitle']); ?>
                        </a>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
    <!--End breaking content-->
</div>