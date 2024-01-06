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
            $comment = $_POST['message'];
            $st1 = '1';
            $query = mysqli_query($con, "insert into tblcontact(name,email,comment,status) values('$name','$email','$comment','$st1')");
            if ($query):
                echo "<script>alert('Message Sent Successfully');</script>";
                //   unset($_SESSION['token']);
            else:
                echo "<script>alert('Something went wrong. Please try again.');</script>";

            endif;

        }
    }
}
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
    <title>Contact US - CurdOperation </title>
    <meta name="description"
        content="Contact to CurdOperation Have questions about background screening? Our entire team receives specialized training regularly to ensure you’re receiving the best information possible. " />
    <meta name="keywords" content="contact CurdOperation , Contact CurdOperation.com" />


    <link rel="dns-prefetch" href="http://fonts.googleapis.com/" />
    <link rel="dns-prefetch" href="http://s.w.org/" />

    <link rel="stylesheet" href="./css/bootstarp.css" media="all" />
    <link rel="stylesheet" href="./css/style.css" media="all" />

    <meta name="generator" content="php" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <!-- extra lunk -->
    <meta name="apple-mobile-web-app-title" content="Contact US - CurdOperation" />

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

        <main id="content">
            <div class="container">
                <div class="row">
                    <!--breadcrumb-->
                    <div class="col-12">
                        <div class="breadcrumb u-breadcrumb  pt-3 px-0 mb-0 bg-transparent small"><a
                                class="breadcrumb-item" href="#">Home</a>&nbsp;&nbsp;»&nbsp;&nbsp;Contact Us</div>
                    </div>
                </div>

                <div class="row">
                    <!-- main content -->
                    <div class="col-md-8">


                        <article class="post-782 page type-page status-publish hentry" id="post-782">

                            <header class="entry-header post-title">

                                <h1 class="entry-title h1 display-4-md display-3-lg mt-2">Contact Us</h1>
                            </header><!-- .entry-header -->


                            <div class="entry-content post-content post-page">


                                <p>At Choice you always talk to a human! Have questions about background screening? Our
                                    entire team receives specialized training regularly to ensure you’re receiving the
                                    best information possible. From basic questions to complex compliance inquiries,
                                    we’re here to help!</p>


                                <div class="contact-form">
                                    <h2>We Love to Hear From You</h2>
                                    <p>Please write a message in contact form and we will be happy to assist you.</p>
                                    <form name="contact" method="post" id="contact_form_submit">

                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group form-element">
                                                    <input type="text" class="form-control input-field" id="name"
                                                        name="name" placeholder="Your Name">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group form-element">
                                                    <input type="email" class="form-control input-field" id="email"
                                                        name="email" placeholder="Your Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-4">

                                                <div class="form-group form-element">
                                                    <textarea id="message" name="message" cols="30" rows="10"
                                                        class="form-control"
                                                        placeholder="Write Your Message"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="csrftoken"
                                            value="<?php echo htmlentities($_SESSION['token']); ?>" />
                                        <div class="contact-frm-btn">
                                            <button type="submit" class="btn btn-primary" name="submit">SUBMIT
                                                NOW</button>
                                        </div>
                                    </form>
                                </div>


                            </div><!-- .entry-content -->

                            <footer class="entry-footer">


                            </footer><!-- .entry-footer -->

                        </article><!-- #post-## -->

                    </div>
                    <!-- left sidebar check -->

                    <!-- right sidebar check -->


                    <aside class="col-md-4 widget-area end-sidebar-lg" id="right-sidebar" style="position: relative;">

                        <div class="" style="position: static; left: auto; width: 281px;">
                            <?php include("./supportpage/socialmedia.php"); ?>
                            <?php include("./supportpage/people-liked.php"); ?>
                            <?php include("./supportpage/latest-post.php"); ?>
                        </div>
                    </aside>
                </div>
            </div>
        </main>

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