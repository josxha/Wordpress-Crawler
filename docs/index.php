<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body id="page-top">
<header class="d-flex masthead" style="opacity: 1;background-image: url(&quot;assets/img/background.jpg&quot;);">
    <div class="container my-auto text-center">
        <h1 class="mb-1">WordPress Crawler</h1>
        <h3 class="mb-5"><em>Get media and user information of any WordPress Page!</em></h3>
        <div class="alert alert-danger text-monospace <?php if (isset($_GET['error'])) echo "d-none"; ?>" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            <h4 class="alert-heading">An error has occured</h4><span><strong>Please enter a valid URL of the root of the WordPress installation.</strong></span>
        </div>
        <div>
            <form action="run.php" method="get" target="_self" enctype="multipart/form-data"><input
                        class="form-control form-control-lg" type="url" name="url" required=""
                        placeholder="https://www.example.com" value="<?php if (isset($_GET['url'])) echo $_GET['url']; ?>" autofocus="" style="margin-bottom: 15px;">
                <button class="btn btn-primary btn-xl js-scroll-trigger" type="submit" data-bs-hover-animate="pulse">Run Crawler</button>
            </form>
        </div>
    </div>
    <a class="btn btn-primary border-primary shadow-lg btn-circle" role="button"
       href="https://github.com/josxha/wordpress-crawler" target="_blank" data-bs-hover-animate="rubberBand"
       style="border-radius: 50px;border: 1px solid black;background-color: rgb(29,128,159);margin-right: 10px;"><i
                class="icon ion-social-github" style="color:#ffffff;font-size:30px;"></i></a></header>
<script
        src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
</body>

</html>