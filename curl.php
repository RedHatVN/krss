<meta charset="utf-8"/>
<?php
define('APP_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('CACHE_DIR', APP_DIR . '/cache');
define('CACHE_DURATION', 7200);
require_once(APP_DIR . '/libs/phpfastcache/phpfastcache.php');
require_once(APP_DIR . '/libs/simple_html_dom.php');
$url = 'http://afamily.vn/chuyen-la/sen-khong-lo-an-thit-xam-nhap-nuoc-anh-20140905031048188.chn';
$cache_config = array(
    'storage' => 'files',
    'path' => CACHE_DIR,
    'htaccess' => true
);
phpFastCache::setup($cache_config);
$cache = phpFastCache();
$hash = md5($url);
$file = CACHE_DIR . '/' . $hash . '.cache';
$post = $cache->$hash;
if ($post == null) {
    $ch = curl_init($url);
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
        CURLOPT_SSL_VERIFYPEER => 0,
    );
    curl_setopt_array($ch, $curl_defaults);
    $post = curl_exec($ch);
//    $posts = file_put_contents($file, $data);

    $cache->$hash = array($post, CACHE_DURATION);
    curl_close($ch);
}
$html = str_get_html($post);
echo $title = $html->find('h1[class="d-title mgt5"]', 0)->plaintext;
echo '<br />';
echo $summary = $html->find('[class="sapo fl mgt10 mgb10"]', 0)->plaintext;
echo '<br />';
echo $description = $html->find('[class="detail_content fl mgt15"]',0)->innertext;