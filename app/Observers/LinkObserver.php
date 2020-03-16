<?php
/**
 * Created on 2020/3/16  19:44
 * Create by zhongzhong
 * Email  phperShine@163.com
 */
namespace App\Observers;

use App\Models\Link;
use Cache;

class LinkObserver
{
    // 在保存时清空 cache_key 对应的缓存
    public function saved(Link $link)
    {
        Cache::forget($link->cache_key);
    }
}
