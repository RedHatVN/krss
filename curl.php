<?php
$curl_config = array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => 0,
    CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.103 Safari/537.36',
    CURLOPT_FOLLOWLOCATION => 1,
    CURLOPT_AUTOREFERER => 1,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_TIMEOUT => 20,
    CURLOPT_VERBOSE => 0,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0
);

$curl_headers = array(
    'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg, image/png',
    'Connection: Keep-Alive',
    'Content-type: application/x-www-form-urlencoded;charset=UTF-8'
);