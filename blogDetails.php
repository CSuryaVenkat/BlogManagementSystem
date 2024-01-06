<?php
session_start();
include('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['submit'])) {
    //Verifying CSRF Token
    if (!empty($_POST['csrftoken'])) {
        if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];
            $postid = $_GET['id'];
            $stmt = mysqli_query($con, "SELECT * FROM tblposts WHERE PostUrl = '{$_GET['id']}' ");
            $productrow = mysqli_fetch_assoc($stmt);
            $prodata = $productrow['id'];
            // foreach($row as $product){
            // print_r($product);
            echo "<script>console.log('Debug Objects: " . $productrow['id'] . "' );</script>";
            // }


            $st1 = '0';
            $query = mysqli_query($con, "insert into tblcomments(postId,posturl,name,email,comment,status) values('$prodata','$postid','$name','$email','$comment','$st1')");
            if ($query):
                echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
                unset($_SESSION['token']);
            else:
                echo "<script>alert('Something went wrong. Please try again.');</script>";

            endif;

        }
    }
}
$postid = $_GET['id'];

$sql = "SELECT viewCounter FROM tblposts WHERE Posturl = '$postid'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $visits = $row["viewCounter"];
        $sql = "UPDATE tblposts SET viewCounter = $visits+1 WHERE Posturl ='$postid'";
        $con->query($sql);

    }
} else {
    echo "no results";
}



?>
<?php
$pid = $_GET['id'];
$currenturl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
;
$query = mysqli_query($con, "select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblposts.postdes as postdes,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url,tblposts.postedBy,tblposts.authorname,tblposts.authordes,tblposts.cattags,tblposts.hashtags,tblposts.lastUpdatedBy,tblposts.UpdationDate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.PostUrl='$pid'");
while ($row = mysqli_fetch_array($query)) {
    ?>
    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
        <title>
            <?php echo htmlentities($row['posttitle']); ?>
        </title>
        <meta name="description" content="<?php echo htmlentities($row['postdes']); ?>" />

        <meta name="keywords" content="<?php echo htmlentities($row['cattags']); ?>" />


        <link rel="stylesheet" href="./css/bootstarp.css" media="all" />
        <link rel="stylesheet" href="./css/style.css" media="all" />

        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="yes" />


    </head>
<?php } ?>

<body
    class="post-template-default single single-post postid-1276 single-format-video custom-background wp-custom-logo full-width font-family">
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
        <?php
        $pid = $_GET['id'];
        $currenturl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        ;
        $query = mysqli_query($con, "select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblposts.postdes as postdes,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url,tblposts.postedBy,tblposts.authorname,tblposts.authordes,tblposts.cattags,tblposts.hashtags,tblposts.lastUpdatedBy,tblposts.UpdationDate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.PostUrl='$pid'");
        while ($row = mysqli_fetch_array($query)) {
            ?>
            <main id="content">
                <div class="container">
                    <div class="row">
                        <!--breadcrumb-->
                        <div class="col-12">
                            <div class="breadcrumb u-breadcrumb pt-3 px-0 mb-0 bg-transparent small">
                                <a class="breadcrumb-item" href="index.php">Home</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;<a href=""
                                    rel="category tag">
                                    <?php echo htmlentities($row['category']); ?>
                                </a>
                                /
                                <a href="#" rel="category tag">
                                    <?php echo htmlentities($row['subcategory']); ?>
                                </a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;<span class="d-none d-md-inline">
                                    <?php echo htmlentities($row['posttitle']); ?>
                                </span>
                            </div>
                        </div>

                        <!--Main content-->
                        <div class="col-md-8">
                            <article
                                class="post-1276 post type-post status-publish format-video has-post-thumbnail hentry category-fashion category-video tag-1990-style tag-summer-style post_format-post-format-video"
                                id="post-1276">
                                <header class="entry-header post-title">
                                    <h1 class="entry-title display-4 display-2-lg mt-2">
                                        <?php echo htmlentities($row['posttitle']); ?>
                                    </h1>
                                    <div class="entry-meta post-atribute mb-3 small fw-normal text-muted">
                                        <span class="byline me-2 me-md-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                fill="currentColor" class="bi bi-person me-1" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                            </svg>
                                            by<span class="author vcard"><a class="url fn n fw-bold" href="#">
                                                    <?php echo htmlentities($row['authorname']); ?>
                                                </a></span></span><span class="posted-on me-2 me-md-3">
                                            <span title="Posted on"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                    height="14" fill="currentColor" class="bi bi-pencil-square me-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></span>
                                            <time class="entry-date published"
                                                datetime="<?php echo htmlentities($row['postingdate']); ?>">
                                                <?php echo htmlentities($row['postingdate']); ?>
                                            </time>
                                            <?php if ($row['lastUpdatedBy'] != ''): ?>
                                                <time class="updated d-none d-md-inline-block"
                                                    datetime="<?php echo htmlentities($row['UpdationDate']); ?>">
                                                    (
                                                    <?php echo htmlentities($row['UpdationDate']); ?> )
                                                </time>

                                            <?php endif; ?>
                                        </span>
                                        <span class="me-2 me-md-3 text-muted d-none d-md-inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                fill="currentColor" class="bi bi-chat-left-dots me-1" viewBox="0 0 16 16">
                                                <path
                                                    d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z">
                                                </path>
                                                <path
                                                    d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z">
                                                </path>
                                            </svg>
                                            <?php
                                            $postid = $_GET['id'];
                                            $stmt = mysqli_query($con, "SELECT * FROM tblposts WHERE PostUrl = '{$_GET['id']}' ");
                                            $productrow = mysqli_fetch_assoc($stmt);
                                            $prodata = $productrow['id'];
                                            $stmt1 = mysqli_query($con, "SELECT * FROM tblcomments WHERE postId = '$prodata' ");
                                            $count = mysqli_num_rows($stmt1);
                                            echo "($count) Comments";
                                            ?>
                                        </span><!-- comments -->

                                        <span class="me-2 me-md-3 text-muted d-md-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                fill="currentColor" class="bi bi-chat-left-dots me-1" viewBox="0 0 16 16">
                                                <path
                                                    d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z">
                                                </path>
                                                <path
                                                    d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z">
                                                </path>
                                            </svg>
                                            0 </span><!-- comments mobile -->

                                        <span class="me-2 me-md-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eye me-1" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                </path>
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                </path>
                                            </svg>
                                            Views
                                            <?php print $visits; ?>
                                        </span>
                                        <!--end view-->
                                    </div>
                                    <!-- .entry-meta -->

                                    <!--social share-->

                                    <div class="social-share mb-3">
                                        <!-- share facebook -->
                                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                            <a class="a2a_button_facebook"></a>
                                            <a class="a2a_button_twitter"></a>
                                            <a class="a2a_button_email"></a>
                                            <a class="a2a_button_whatsapp"></a>
                                            <a class="a2a_button_linkedin"></a>
                                            <a class="a2a_button_pinterest"></a>
                                            <a class="a2a_button_telegram"></a>
                                        </div>
                                    </div>
                                    <!-- social share -->
                                </header>
                                <!-- .entry-header -->

                                <div class="entry-content post-content">
                                    <figure class="image-single-wrapper">
                                        <img width="750" height="500"
                                            src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                            class="img-fluid" alt="<?php echo htmlentities($row['posttitle']); ?>"
                                            data-src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                            srcset="
                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 1024w,
                       admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 300w,
                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 750w,
                        admin/postimages/<?php echo htmlentities($row['PostImage']); ?> 1140w
                      " sizes="(max-width: 750px) 100vw, 750px" />
                                        <figcaption class="bg-themes"></figcaption>
                                    </figure>

                                    <p>
                                        <span class="dropcaps dropcaps-one">
                                            <?php
                                            $pt = $row['postdes'];
                                            echo (substr($pt, 0, 1)); ?>
                                        </span>
                                        <?php echo htmlentities($row['postdes']); ?><br />
                                        <!--StartFragment-->
                                    </p>
                                    <?php
                                    $pt = $row['postdetails'];
                                    echo (substr($pt, 0)); ?>

                                </div>
                                <!-- .entry-content -->

                                <footer class="entry-footer">
                                    <div class="tags-links mb-3">
                                        <span class="fw-bold me-2">Category</span>
                                        <?php

                                        $ip = $row['cattags']; // some IP address
                                        $data = $row['hashtags'];
                                        $iparr = explode(",", $ip);
                                        $dataarr = explode(",", $data);
                                        ?>
                                        <a href="#" rel="category tag">
                                            <?php echo htmlentities($iparr[0]); ?>
                                        </a>
                                        <a href="#" rel="category tag">
                                            <?php echo htmlentities($iparr[1]); ?>
                                        </a>
                                        <a href="#" rel="category tag">
                                            <?php echo htmlentities($iparr[2]); ?>
                                        </a>
                                        <a href="#" rel="category tag">
                                            <?php echo htmlentities($iparr[3]); ?>
                                        </a>
                                        <a href="#" rel="category tag">
                                            <?php echo htmlentities($iparr[4]); ?>
                                        </a>

                                    </div>
                                    <div class="tags-links tagcloud">
                                        <span class="fw-bold me-2">Tags</span>
                                        <a href="#" rel="tag">
                                            <?php echo htmlentities($dataarr[0]); ?>
                                        </a>
                                        <a href="#" rel="tag">
                                            <?php echo htmlentities($dataarr[1]); ?>
                                        </a>
                                        <a href="#" rel="tag">
                                            <?php echo htmlentities($dataarr[2]); ?>
                                        </a>
                                        <a href="#" rel="tag">
                                            <?php echo htmlentities($dataarr[3]); ?>
                                        </a>
                                        <a href="#" rel="tag">
                                            <?php echo htmlentities($dataarr[4]); ?>
                                        </a>

                                    </div>
                                </footer>
                                <!-- .entry-footer -->
                            </article>
                            <!-- #post-## -->
                            <hr />

                            <!--author-->
                            <div class="media author-box">
                                <div class="media-figure mb-3">
                                    <img alt=""
                                        src="https://secure.gravatar.com/avatar/3b95894fa6fae8fae505c493aa7d7e98?s=100&#038;d=mm&#038;r=g"
                                        srcset="
                      https://secure.gravatar.com/avatar/3b95894fa6fae8fae505c493aa7d7e98?s=200&#038;d=mm&#038;r=g 2x
                    " class="avatar avatar-100 photo" height="100" width="100" loading="lazy" />
                                </div>
                                <div class="ms-sm-3 media-body">
                                    <h4 class="mb-2 font-weight-bold">
                                        <?php echo htmlentities($row['authorname']); ?>
                                    </h4>

                                    <p>
                                        <?php echo htmlentities($row['authordes']); ?>
                                    </p>
                                </div>
                            </div>
                            <hr />

                            <!-- Previous and next article -->

                            <!--related-->
                            <?php include("supportpage/popular-post.php"); ?>
                            <!--End Related Posts-->
                            <!--suggestion post-->

                            <!-- Suggestion box -->
                            <div class="suggestion-box bg-themes">
                                <h4 class="text-center">You Must Read</h4>
                                <div id="close-suggestion" class="close-suggestion">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-x" viewBox="0 0 16 16">
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </div>
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


                                $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by RAND() LIMIT $offset, $no_of_records_per_page");
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <div class="card card-full u-hover hover-a mb-2">
                                        <!--thumbnail-->
                                        <div class="ratio_251-141 image-wrapper">
                                            <a href="<?php echo htmlentities($row['url']); ?>">
                                                <img width="300" height="200"
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
                                                    sizes="(max-width: 300px) 100vw, 300px" />
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <!-- title -->
                                            <h3 class="card-title mb-2 h5 h4-md">
                                                <a href="<?php echo htmlentities($row['url']); ?>">
                                                    <?php echo htmlentities($row['posttitle']); ?>
                                                </a>
                                            </h3>
                                            <div class="mb-2 text-muted small">
                                                <!--date-->
                                                <?php echo htmlentities($row['postingdate']); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <!--Comments-->
                            <div id="comments" class="mb-5">
                                <div id="respond" class="comment-respond">
                                    <h3 id="reply-title" class="comment-reply-title">
                                        Leave a Reply
                                        <small><a rel="nofollow" id="cancel-comment-reply-link"
                                                href="/default/2019/06/the-1990s-trends-that-keep-coming-back/#respond"
                                                style="display: none">Cancel reply</a></small>
                                    </h3>
                                    <form name="Comment" method="post" class="comment-form" novalidate>
                                        <input type="hidden" name="csrftoken"
                                            value="<?php echo htmlentities($_SESSION['token']); ?>" />
                                        <p class="comment-notes">
                                            <span id="email-notes">Your email address will not be published.</span>
                                            Required fields are marked <span class="required">*</span>
                                        </p>
                                        <div class="form-group comment-form-comment">
                                            <textarea aria-label="comments" class="form-control mb-4" id="comment"
                                                placeholder="Comments *" name="comment" cols="45" rows="8"
                                                required></textarea>
                                        </div>
                                        <div class="form-group comment-form-author">
                                            <input class="form-control mb-4" aria-label="name" id="author"
                                                placeholder="Name*" name="name" type="text" value="" size="30"
                                                aria-required="true" required />
                                        </div>
                                        <div class="form-group comment-form-email">
                                            <input class="form-control mb-4" aria-label="email" id="email"
                                                placeholder="Email *" name="email" type="email" value="" size="30"
                                                aria-required="true" required />
                                        </div>

                                        <div class="form-group form-check comment-form-cookies-consent mb-3">
                                            <input class="form-check-input" id="wp-comment-cookies-consent"
                                                name="wp-comment-cookies-consent" type="checkbox" value="yes" />
                                            <label class="form-check-label" for="wp-comment-cookies-consent">Save my name,
                                                email and website in
                                                this browser for the
                                                next time I comment</label>
                                        </div>
                                        <p class="form-submit">
                                            <input name="submit" type="submit" id="submit" class="btn btn-primary"
                                                value="Post Comment" />

                                        </p>
                                    </form>
                                </div>
                                <!-- #respond -->
                            </div>
                        </div>
                        <!-- left sidebar check -->

                        <!-- right sidebar check -->

                        <aside class="col-md-4 widget-area end-sidebar-lg" id="right-sidebar">
                            <div class="sticky">
                                <aside id="bootnews_social-4" class="widget widget_categories widget_categories_custom">
                                    <div class="block-title-4">
                                        <h4 class="h5 title-arrow"><span>Social Network</span></h4>
                                    </div>
                                    <ul class="list-unstyled social-two">
                                        <li class="facebook">
                                            <a class="bg-facebook text-white" rel="noopener" href="https://facebook.com/"
                                                target="_blank" title="Facebook">Facebook</a>
                                        </li>

                                        <li class="twitter">
                                            <a class="bg-twitter text-white" rel="noopener" href="https://twitter.com/"
                                                target="_blank" title="Twitter">Twitter</a>
                                        </li>

                                        <li class="instagram">
                                            <a class="bg-instagram text-white" rel="noopener" href="https://instagram.com/"
                                                target="_blank" title="Instagram">Instagram</a>
                                        </li>

                                        <li class="youtube">
                                            <a class="bg-youtube text-white" rel="noopener" href="https://youtube.com/"
                                                target="_blank" title="Youtube">Youtube</a>
                                        </li>

                                        <li class="linkedin">
                                            <a class="bg-linkedin text-white" rel="noopener" href="https://linkedin.com/"
                                                target="_blank" title="Linkedin">Linkedin</a>
                                        </li>

                                        <li class="vimeo">
                                            <a class="bg-vimeo text-white" rel="noopener" href="https://vimeo.com/"
                                                target="_blank" title="Vimeo">Vimeo</a>
                                        </li>

                                        <li class="pinterest">
                                            <a class="bg-pinterest text-white" rel="noopener" href="https://pinterest.com/"
                                                target="_blank" title="Pinterest">Pinterest</a>
                                        </li>

                                        <li class="telegram">
                                            <a class="bg-telegram text-white" rel="noopener" href="https://telegram.com/"
                                                target="_blank" title="Telegram">Telegram</a>
                                        </li>
                                    </ul>
                                    <div class="gap-1"></div>
                                    <!-- end social content -->
                                </aside>
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
                                        $offset = ($pageno - 1) * $no_of_records_per_page;


                                        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                        $result = mysqli_query($con, $total_pages_sql);
                                        $total_rows = mysqli_fetch_array($result)[0];
                                        $total_pages = ceil($total_rows / $no_of_records_per_page);


                                        $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.viewCounter,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by RAND() LIMIT $offset, $no_of_records_per_page");
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
                                                            <?php echo htmlentities($row['posttitle']); ?>
                                                        </a>
                                                    </h2>
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
                                                            datetime="<?php echo htmlentities($row['postingdate']); ?>">
                                                            <?php echo htmlentities($row['postingdate']); ?>
                                                        </time>
                                                        <!--comments-->
                                                        <span title="<?php echo htmlentities($row['viewCounter']); ?> View"
                                                            class="float-end">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-eye me-1" viewBox="0 0 16 16">
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


                                        $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.postdes as postdes,tblposts.authorname as authorname,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1  order by RAND() LIMIT $offset, $no_of_records_per_page");
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
                                    </div>
                                    <div class="gap-0"></div>
                                </aside>
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
                                                <a class="h5 h6-md h5-lg" href="<?php echo htmlentities($row['url']); ?>">
                                                    <?php echo htmlentities($row['posttitle']); ?>
                                                </a>
                                            </li>
                                        <?php } ?>

                                    </ul>
                                </aside>
                            </div>
                        </aside>
                    </div>
                </div>
            </main>
        <?php } ?>
        <!--End main content-->

        <!--Footer start-->

        <?php
        $stmt = mysqli_query($con, "SELECT * FROM tblposts WHERE PostUrl = '{$_GET['id']}' ");
        $productrow = mysqli_fetch_assoc($stmt);
        $prodata = $productrow['id'];
        $sts = 1;
        $query = mysqli_query($con, "select name,comment,postingDate from  tblcomments where postId='$prodata' and status='$sts'");
        while ($row = mysqli_fetch_array($query)) {
            ?>
            <div class="container col-md-12 media mb-4">
                <div class="media-body" style="border: 1px solid #4f46e5;
    padding: 15px;
    border-radius: 10px;
">
                    <h5 class="mt-0">Commented By:
                        <?php echo htmlentities($row['name']); ?> <br />
                        <span style="font-size:11px;"><b>Commented at</b>
                            <?php echo htmlentities($row['postingDate']); ?>
                        </span>
                    </h5>

                    Comment:
                    <?php echo htmlentities($row['comment']); ?>
                </div>
            </div>

            <hr />
        <?php } ?>
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
    <script>
        var demo = document.querySelectorAll('.entry-content img'),
            i;
        // console.log(demo);
        for (i = 1; i < demo.length; ++i) {
            demo[i].setAttribute("class", "img-fluid lazy wp-post-image entered loaded");
            demo[i].setAttribute("width", "400");
            demo[i].setAttribute("height", "400");
            demo[i].setAttribute("loading", "lazy");
            demo[i].setAttribute("sizes", "(max-width: 750px) 100vw, 750px");
        }
    </script>


    <script async src="js/bundle.min.js" id="bootnews-scripts-js"></script>
    <script async src="js/embed.min.js" id="wp-embed-js"></script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>

</body>

</html>