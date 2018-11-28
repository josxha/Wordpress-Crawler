<?php
/**
 * Created by PhpStorm.
 * User: Joscha
 * Date: 28.11.2018
 * Time: 15:14
 */

require "Crawler.php";

if (!isset($_GET['url']) || empty($_GET['url']))
    header('Location: index.php?error');

$crawler = new Crawler($_GET['url']);

$result['images'] = $crawler->get_media_urls("image");
$result['videos'] = $crawler->get_media_urls("video");
$result['audios'] = $crawler->get_media_urls("audio");
$result['others'] = $crawler->get_media_urls("application");

$result['users'] = $crawler->get_users();

header('Content-Type: application/json');
echo json_encode($result);