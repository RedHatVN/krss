<?php
require_once('libs/phpfastcache/phpfastcache.php');

phpFastCache::setup('storage', 'auto');
$cache = phpFastCache();

$posts = $cache->get('my_products');

if ($posts == null) {
    $posts = '';
    $cache->set('my_products', $posts, 300);
}
echo $posts;