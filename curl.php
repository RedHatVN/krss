<?php
define('APP_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('CACHE_DIR', APP_DIR . '/cache');
define('CACHE_DURATION', 7200);


$url = 'http://afamily.vn/xa-hoi/tim-thay-thi-the-y-ta-mang-thai-om-con-2-tuoi-nhay-cau-tu-tu-20140905020457543.chn';
$curl_defaults = array(
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
$hash = md5($url);
$file = CACHE_DIR . "/$hash.cache";
$ch = curl_init($url);
curl_setopt_array($ch, $curl_defaults);
$data = curl_exec($ch);
curl_close($ch);
file_put_contents($file, $data);