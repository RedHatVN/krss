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
    echo httpGet($item->get_permalink());
endforeach;

function httpGet($url, $ttl = 86400)
{
    /* Change this or make it an option as appropriate. If you're
     * getting urls that shouldn't be visible to the public, put the
     * cache folder somewhere it can't be accessed from the web
     */
    $cache_path = dirname(__FILE__).'/cache/posts';


    /* Check the cache first - setting ttl to 0 overrides
     * the check. I'm using crc32() to make URLs safe here; if you're
     * fetching millions of URLs, it might not be different enough to
     * avoid clashes. If you get collisions, use md5() or something,
     * and change the sprintf() pattern.
     */
    $cache_file   = sprintf('%s/%08X.dat', $cache_path, crc32($url));
    $cache_exists = is_readable($cache_file);

    /* If the cache is newer than the Time To Live, return it
     * instead of doing a new request. The default TTL is 1 day.
     */
    if ($ttl && $cache_exists &&
        (filemtime($cache_file) > (time() - $ttl))
    )
    {
        return file_get_contents($cache_file);
    }

    /* Need to regenerate the cache. First thing to do here is update
     * the modification time on the cache file so that no one else
     * tries to update the cache while we're updating it.
     */
    touch($cache_file);
    clearstatcache();


    /* Set up the cURL pointer. It's important to set a User-Agent
     * that's unique to you, and provides contact details in case your
     * script is misbehaving and a server owner needs to contact you.
     * More than that, it's just the polite thing to do.
     */
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_TIMEOUT, 15);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_USERAGENT,
        'ExampleFetcher/0.9  (http://example.com/; bob@example.com)');


    /* If we've got a cache, do the web a favour and make a
     * conditional HTTP request. What this means is that if the
     * server supports it, it will tell us if nothing has changed -
     * this means we can reuse the cache for a while, and the
     * request is returned faster.
     */
    if ($cache_exists) {
        curl_setopt($c, CURLOPT_TIMECONDITION, CURL_TIMECOND_IFMODSINCE);
        curl_setopt($c, CURLOPT_TIMEVALUE, filemtime($cache_file));
    }


    /* Make the request and check the result. */
    $content = curl_exec($c);
    $status = curl_getinfo($c, CURLINFO_HTTP_CODE);

    // Document unmodified? Return the cache file
    if ($cache_exists && ($status == 304)) {
        return file_get_contents($cache_file);
    }

    /* You could be more forgiving of errors here. I've chosen to
     * fail hard instead, because at least it'll be obvious when
     * something goes wrong.
     */
    if ($status != 200) {
        throw new Exception(sprintf('Unexpected HTTP return code %d', $status));
    }


    /* If everything is fine, save the new cache file, make sure
     * it's world-readable, and writeable by the server
     */
    file_put_contents($cache_file, $content);
    chmod($cache_file, 0644);
    return $content;
}
