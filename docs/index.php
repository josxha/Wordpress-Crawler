<?php
require "Crawler.php";

$error = isset($_GET['url']) && empty($_GET['url']);

if (isset($_GET['type'])) {
    $crawler = new Crawler($_GET['url']);
    $result = "";
    switch ($_GET['type']) {
        case "images":
            $array = $crawler->get_media_urls("image");
            foreach ($array as $url)
                $result .= $url . PHP_EOL;
            break;
        case "videos":
            $array = $crawler->get_media_urls("video");
            foreach ($array as $url)
                $result .= $url . PHP_EOL;
            break;
        case "files":
            $array = $crawler->get_media_urls("application");
            foreach ($array as $url)
                $result .= $url . PHP_EOL;
            break;
        case "users":
            $array = $crawler->get_users();
            foreach ($array as $user)
                $result .= $user["name"] . "\t\t\t" . $user["url"] . PHP_EOL;
            break;
        case "audios":
            $array = $crawler->get_media_urls("audio");
            foreach ($array as $url)
                $result .= $url . PHP_EOL;
            break;
    }
    if (empty($result))
        $result = "Nothing found.";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WordPress Crawler</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <script src="crawler.js"></script>
</head>

<body id="page-top" style="text-align: center">
<header class="d-flex masthead" style="opacity: 1;background-image: url(&quot;assets/img/background.jpg&quot;);padding-top: 100px;padding-bottom: 100px;margin-left: 0px;">
    <div class="container my-auto text-center">
        <h1 style="text-align: center" class="mb-1">WordPress Crawler</h1>
        <h3 class="mb-5"><em>Get media and user information of any WordPress Page!</em></h3>
        <div class="alert alert-danger text-monospace <?php if (!$error) echo "d-none"; ?>" id="alertError" role="alert">
            <h4 class="alert-heading">An error has occured</h4><span><strong>Please enter a valid URL of the root of the WordPress installation.</strong></span></div>
        <div>
            <form action="index.php#viewResults" method="get">
                <input class="form-control form-control-lg" id="url" value="<?php echo $_GET['url']; ?>" type="url" name="url" required="" placeholder="https://www.example.com" autofocus="" style="margin-bottom: 15px;">
                <div>
                    <div class="form-check d-inline" style="padding: 0;margin: 15px;"><input class="form-check-input" type="radio" name="type" value="images" <?php if ($_GET['type'] == "images") echo 'checked'; ?> id="checkImages"><label class="form-check-label" for="checkImages">Uploaded Images</label></div>
                    <div class="form-check d-inline" style="padding: 0;margin: 15px;"><input class="form-check-input" type="radio" name="type" value="audios" <?php if ($_GET['type'] == "audios") echo 'checked'; ?> id="checkAudio"><label class="form-check-label" for="checkAudio">Uploaded Audio</label></div>
                    <div class="form-check d-inline" style="padding: 0;margin: 15px;"><input class="form-check-input" type="radio" name="type" value="videos" <?php if ($_GET['type'] == "videos") echo 'checked'; ?> id="checkVideo"><label class="form-check-label" for="checkVideo">Uploaded Videos</label></div>
                    <div class="form-check d-inline" style="padding: 0;margin: 15px;"><input class="form-check-input" type="radio" name="type" value="files" <?php if ($_GET['type'] == "files") echo 'checked'; ?> id="checkFiles"><label class="form-check-label" for="checkFiles">Other Files (pdf, xls, doc, ...)</label></div>
                    <div class="form-check d-inline" style="padding: 0;margin: 15px;"><input class="form-check-input" type="radio" name="type" value="users" <?php if ($_GET['type'] == "users") echo 'checked'; ?> id="checkUsers"><label class="form-check-label" for="checkUsers">Registrated Users</label></div>
                </div><button class="btn btn-primary btn-xl js-scroll-trigger" type="submit" data-bs-hover-animate="pulse" style="margin-top: 10px;">Run Crawler</button></form>
        </div>
    </div><a class="btn btn-primary border-primary shadow-lg btn-circle" role="button" href="https://github.com/josxha/wordpress-crawler" target="_blank" data-bs-hover-animate="rubberBand" style="border-radius: 50px;border: 1px solid black;background-color: rgb(29,128,159);margin-right: 10px;"><i class="icon ion-social-github" style="color:#ffffff;font-size:30px;"></i></a></header>
<section
        class="card-section-imagia" style="padding-bottom: 60px; padding-top: 60px">
    <h1 id="viewResults">Your Results</h1>
    <div class="container"><textarea class="d-block" id="result" style="width: 100%;height: 500px;"><?php echo trim($result); ?></textarea></div>
</section>
<div><a class="border rounded-circle cd-top" href="#" style="background-color: rgb(29,128,159);width: 60px;height: 60px;"> </a></div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
</body>

</html>