<meta charset="utf-8"/>
<?php
define('APP_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('CACHE_DIR', APP_DIR . '/cache');
define('CACHE_DURATION', 7200);
require_once 'autoloader.php';

$rss_link = array(
    'http://afamily.vn/trang-chu.rss',
    'http://afamily.vn/dep.rss',
    'http://afamily.vn/doi-song.rss',
    'http://afamily.vn/cong-so.rss',
    'http://afamily.vn/an-ngon.rss',
    'http://afamily.vn/tinh-yeu-hon-nhan.rss',
    'http://afamily.vn/suc-khoe.rss',
    'http://afamily.vn/tam-su.rss',
    'http://afamily.vn/me-va-be.rss',
    'http://afamily.vn/nha-hay.rss',
    'http://afamily.vn/hau-truong.rss',
    'http://afamily.vn/giai-tri.rss',
    'http://afamily.vn/chuyen-la.rss'
);
$feed = new SimplePie();
$feed->set_feed_url($rss_link);
$feed->enable_cache();
$feed->set_cache_duration(CACHE_DURATION);
$feed->set_cache_location(CACHE_DIR);
$feed->init();
$feed->handle_content_type();
foreach ($feed->get_items() as $item):
    echo $item->get_title() . ' - ' . $item->get_permalink();
    echo '<br />';
endforeach;