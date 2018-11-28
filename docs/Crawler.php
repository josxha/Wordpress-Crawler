<?php
/**
 * Created by PhpStorm.
 * User: Joscha
 * Date: 28.11.2018
 * Time: 15:23
 */

class Crawler {
    private $root_url;

    public function __construct($url) {
        $this->root_url = rtrim($url, '/');
    }

    public function get_media_urls($media_type) { // image, video, audio, application
        $urls = array();
        $site = 1;
        while (true) {
            $handle = curl_init($this->root_url . "/wp-json/wp/v2/media?per_page=100&media_type=$media_type&page=$site");
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
            $json = curl_exec($handle);
            if (curl_getinfo($handle, CURLINFO_HTTP_CODE) == 200) {
                $dict = json_decode($json);
                if ($dict == null || empty($dict)) { // api returns empty json if no entry exists
                    curl_close($handle);
                    sort($urls);
                    return $urls;
                }
                foreach ($dict as $entry)
                    array_push($urls, $entry->guid->rendered);
                $site++;
            } else {
                sort($urls);
                return $urls;
            }
        }
        sort($urls);
        return $urls;
    }

    public function get_users() {
        $users = array();
        $site = 1;
        while (true) {
            $handle = curl_init($this->root_url . "/wp-json/wp/v2/users?per_page=100&page=$site");
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
            $json = curl_exec($handle);
            if (curl_getinfo($handle, CURLINFO_HTTP_CODE) == 200) {
                $dict = json_decode($json);
                if ($dict == null || empty($dict)) { // api returns empty json if no entry exists
                    curl_close($handle);
                    return $users;
                }
                foreach ($dict as $entry)
                    array_push($users, array(
                        "name"          => $entry->name,
                        "url"           => $entry->link,
                    ));
                $site++;
            } else {
                curl_close($handle);
                return $users;
            }
        }
        curl_close($handle);
        return $users;
    }

}