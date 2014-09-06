<meta charset="utf-8"/>
<?php
define('APP_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('CACHE_DIR', APP_DIR . '/cache');
define('CACHE_DURATION', 7200);
require_once(APP_DIR . 'autoloader.php');
require_once(APP_DIR . '/libs/phpfastcache/phpfastcache.php');
require_once(APP_DIR . '/libs/simple_html_dom.php');
//Setup Cache
$cache_config = array(
    'storage' => 'files',
    'path' => CACHE_DIR,
    'htaccess' => true
);
phpFastCache::setup($cache_config);

/**
 * Gets Url From RSS
 */
//$rss_link = array(
//    'http://afamily.vn/trang-chu.rss',
//    'http://afamily.vn/dep.rss',
//    'http://afamily.vn/doi-song.rss',
//    'http://afamily.vn/cong-so.rss',
//    'http://afamily.vn/an-ngon.rss',
//    'http://afamily.vn/tinh-yeu-hon-nhan.rss',
//    'http://afamily.vn/suc-khoe.rss',
//    'http://afamily.vn/tam-su.rss',
//    'http://afamily.vn/me-va-be.rss',
//    'http://afamily.vn/nha-hay.rss',
//    'http://afamily.vn/hau-truong.rss',
//    'http://afamily.vn/giai-tri.rss',
//    'http://afamily.vn/chuyen-la.rss'
//);

$rss_link = array(
    'http://www.dantri.com.vn/trangchu.rss',
    'http://www.dantri.com.vn/xa-hoi.rss',
    'http://www.dantri.com.vn/chinh-tri.rss',
    'http://www.dantri.com.vn/doi-song.rss',
    'http://www.dantri.com.vn/phong-suky-su.rss',
    'http://www.dantri.com.vn/giao-thong.rss',
    'http://www.dantri.com.vn/moi-truong.rss',
    'http://www.dantri.com.vn/ho-so.rss',
    'http://www.dantri.com.vn/Thegioi.rss',
    'http://www.dantri.com.vn/dong-a.rss',
    'http://www.dantri.com.vn/eu--nga.rss',
    'http://www.dantri.com.vn/chau-my.rss',
    'http://www.dantri.com.vn/diem-nong.rss',
    'http://www.dantri.com.vn/tu-lieu.rss',
    'http://www.dantri.com.vn/kieu-bao.rss',
    'http://www.dantri.com.vn/tet-viet-xa-xu.rss',
    'http://www.dantri.com.vn/The-Thao.rss',
    'http://www.dantri.com.vn/the-thao-trong-nuoc.rss',
    'http://www.dantri.com.vn/the-thao-quoc-te.rss',
    'http://www.dantri.com.vn/bong-da-trong-nuoc.rss',
    'http://www.dantri.com.vn/bong-da-chau-au.rss',
    'http://www.dantri.com.vn/bong-da-anh.rss',
    'http://www.dantri.com.vn/bong-da-tbn.rss',
    'http://www.dantri.com.vn/tennis.rss',
    'http://www.dantri.com.vn/giaoduc-khuyenhoc.rss',
    'http://www.dantri.com.vn/tin-tuyen-sinh.rss',
    'http://www.dantri.com.vn/khuyen-hoc.rss',
    'http://www.dantri.com.vn/guong-sang.rss',
    'http://www.dantri.com.vn/apollo-vlog.rss',
    'http://www.dantri.com.vn/nghe-hot.rss',
    'http://www.dantri.com.vn/tamlongnhanai.rss',
    'http://www.dantri.com.vn/danh-sach-ung-ho.rss',
    'http://www.dantri.com.vn/danh-sach-ket-chuyen.rss',
    'http://www.dantri.com.vn/hoan-canh.rss',
    'http://www.dantri.com.vn/kinhdoanh.rss',
    'http://www.dantri.com.vn/tai-chinh-dau-tu.rss',
    'http://www.dantri.com.vn/thi-truong.rss',
    'http://www.dantri.com.vn/doanh-nghiep.rss',
    'http://www.dantri.com.vn/bao-ve-ntd.rss',
    'http://www.dantri.com.vn/quoc-te.rss',
    'http://www.dantri.com.vn/nha-dat.rss',
    'http://www.dantri.com.vn/van-hoa.rss',
    'http://www.dantri.com.vn/doi-song-van-hoa.rss',
    'http://www.dantri.com.vn/san-khau-dan-gian.rss',
    'http://www.dantri.com.vn/du-lich-kham-pha.rss',
    'http://www.dantri.com.vn/van-hoc.rss',
    'http://www.dantri.com.vn/dien-anh.rss',
    'http://www.dantri.com.vn/am-nhac.rss',
    'http://www.dantri.com.vn/giaitri.rss',
    'http://www.dantri.com.vn/sao-viet.rss',
    'http://www.dantri.com.vn/hollywood.rss',
    'http://www.dantri.com.vn/chau-a.rss',
    'http://www.dantri.com.vn/thoi-trang.rss',
    'http://www.dantri.com.vn/xem-an-choi.rss',
    'http://www.dantri.com.vn/skphapluat.rss',
    'http://www.dantri.com.vn/nhipsongtre.rss',
    'http://www.dantri.com.vn/nguoi-viet-tre.rss',
    'http://www.dantri.com.vn/phong-su-tre.rss',
    'http://www.dantri.com.vn/english-champion.rss',
    'http://www.dantri.com.vn/tinhyeu-gioitinh.rss',
    'http://www.dantri.com.vn/tinh-yeu.rss',
    'http://www.dantri.com.vn/gia-dinh.rss',
    'http://www.dantri.com.vn/goc-tam-hon.rss',
    'http://www.dantri.com.vn/suckhoe.rss',
    'http://www.dantri.com.vn/kien-thuc-gioi-tinh.rss',
    'http://www.dantri.com.vn/tu-van.rss',
    'http://www.dantri.com.vn/lam-dep.rss',
    'http://www.dantri.com.vn/suc-manh-tri-thuc.rss',
    'http://www.dantri.com.vn/suc-manh-so.rss',
    'http://www.dantri.com.vn/khoa-hoc.rss',
    'http://www.dantri.com.vn/thu-thuat.rss',
    'http://www.dantri.com.vn/tu-van-so.rss',
    'http://www.dantri.com.vn/nhan-tai-dat-viet.rss',
    'http://www.dantri.com.vn/nghe-nhin.rss',
    'http://www.dantri.com.vn/otoxemay.rss',
    'http://www.dantri.com.vn/thi-truong-xe.rss',
    'http://www.dantri.com.vn/van-hoa-xe.rss',
    'http://www.dantri.com.vn/tu-van-xe.rss',
    'http://www.dantri.com.vn/dua-xe.rss',
    'http://www.dantri.com.vn/gia-xe.rss',
    'http://www.dantri.com.vn/diendan-bandoc.rss',
    'http://www.dantri.com.vn/tu-van-phap-luat.rss',
    'http://www.dantri.com.vn/hoi-am.rss',
    'http://www.dantri.com.vn/goc-anh.rss',
    'http://www.dantri.com.vn/dien-dan.rss',
    'http://www.dantri.com.vn/giao-duc.rss',
    'http://www.dantri.com.vn/xa-hoi.rss',
    'http://www.dantri.com.vn/the-gioi.rss',
    'http://www.dantri.com.vn/chuyen-la.rss',
    'http://www.dantri.com.vn/blog.rss',
    'http://www.dantri.com.vn/viec-lam.rss',
    'http://www.dantri.com.vn/chinh-sach.rss',
    'http://www.dantri.com.vn/thi-truong-viec-lam.rss',
    'http://www.dantri.com.vn/chung-toi-noi.rss',
    'http://www.dantri.com.vn/dao-tao.rss',
    'http://www.dantri.com.vn/xkld.rss'
);

$feed = new SimplePie();
$feed->set_feed_url($rss_link);
$feed->enable_cache();
$feed->set_cache_duration(CACHE_DURATION);
$feed->set_cache_location(CACHE_DIR);
$feed->init();
$feed->handle_content_type();

foreach ($feed->get_items() as $key => $item):
    echo get_posts($item->get_permalink());
    sleep(10);
endforeach;

function get_posts($url)
{
    $hash = md5($url);
    $file = CACHE_DIR . '/posts/' . $hash . '.cache';
    $mtime = 0;
    if (file_exists($file)) {
        $mtime = filemtime($file);
    }
    $filetimecache = $mtime + CACHE_DURATION;
    if ($filetimecache < time()) {
        $ch = curl_init($url);
        $curl_defaults = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => FALSE,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.103 Safari/537.36',
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_AUTOREFERER => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_MAXCONNECTS => 1,
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_VERBOSE => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_MAXREDIRS => 5,
            CURLINFO_CONNECT_TIME => 30,
            CURLINFO_PRETRANSFER_TIME => 60
        );
        curl_setopt_array($ch, $curl_defaults);
        $data = curl_exec($ch);
        curl_close($ch);

        if ($data) {
            file_put_contents($file, $data);
        }
    } else {
        $data = file_get_contents($file);
    }
    //return $data;
}

//AFamily
//'title' => $html->find('h1[class="d-title mgt5"]', 0)->plaintext,
//'summary' => $html->find('[class="sapo fl mgt10 mgb10"]', 0)->plaintext,
//'description' => $html->find('[class="sapo fl mgt10 mgb10"]', 0)->plaintext


///**
// * Get Post Detail
// * @param $url
// */
//function get_post($url)
//{
//    $cache = phpFastCache();
//    $hash = md5($url);
//    $item = $cache->get($hash);
//    if ($item == null) {
//        $ch = curl_init($url);
//        $curl_defaults = array(
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_HEADER => 0,
//            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.103 Safari/537.36',
//            CURLOPT_FOLLOWLOCATION => 1,
//            CURLOPT_AUTOREFERER => 1,
//            CURLOPT_RETURNTRANSFER => 1,
//            CURLOPT_CONNECTTIMEOUT => 20,
//            CURLOPT_TIMEOUT => 20,
//            CURLOPT_VERBOSE => 0,
//            CURLOPT_SSL_VERIFYHOST => 0,
//            CURLOPT_SSL_VERIFYPEER => 0,
//        );
//        curl_setopt_array($ch, $curl_defaults);
//        $item = curl_exec($ch);
//        curl_close($ch);
//        $cache->set($hash, $item, CACHE_DURATION);
//    }
//    return $item;
//}

//$caches = phpFastCache();
//$html = str_get_html(get_post($item->get_permalink()));
//$post = array(
//    'title' => $html->find('[class="fon31 mt2"]', 0)->plaintext,
//    'summary' => $html->find('[class="fon33 mt1"]', 0)->plaintext,
//    'description' => strip_tags($html->find('[class="fon34 mt3 mr2 fon43"]', 0)->plaintext, '<img><br /><br><table><td><tr><th><tbody><thead><p><strong><em>')
//);
//$caches->set('sieu_' . $hash, $post, CACHE_DURATION);

//function get_post($url)
//{
//    $cache = phpFastCache();
//    $hash = md5($url);
//    $item = $cache->get($hash);
//    if ($item == null) {
//        $html = file_get_html($url);
//        $item = array(
//            'title' => $html->find('[class="fon31 mt2"]', 0)->plaintext,
//            'summary' => $html->find('[class="fon33 mt1"]', 0)->plaintext,
//            'description' => $html->find('[class="fon34 mt3 mr2 fon43"]', 0)->innertext
//        );
//        $cache->set($hash, $item, CACHE_DURATION);
//    }
//    return $item;
//}
