<?php
/**
 * Created by PhpStorm.
 * User: Joscha
 * Date: 28.11.2018
 * Time: 15:23
 */

class Crawler {
    private $root_url;

    public function __construct($root_url) {
        $this->root_url = rtrim($root_url, '/');
    }

    public function get_media_urls($media_type) { // image, video, audio, application
        global $root_url;
        $urls = array();
        $site = 1;
        while (true) {
            $dict = json_decode(file_get_contents($root_url."wp-json/wp/v2/media?per_page=100&media_type=$media_type&page=$site"));
            if ($dict->code == "rest_post_invalid_page_number")
                break;
            foreach ($dict as $entry)
                array_push($urls, $entry->source_url);
        }
        return $urls;
    }
}