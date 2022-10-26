<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 *
 */
class Link extends Model
{

    /**
     * @var string[]
     */
    protected $fillable = ['title', 'link'];

    /**
     * @var string
     */
    public $cache_key = 'larabbs_links';
    /**
     * @var int
     */
    protected $cache_expire_in_minutes = 1440;

    /**
     * @return mixed
     */
    public function getAllCached()
    {
        // 尝试从缓存中取出 cache_key 对应的数据。如果能出到，便直接返回数据。
        // 否则运行匿名函数中的代码来取出 links 表中所有的数据，返回的同时做了缓存。
        return Cache::remember($this->cache_key, $this->cache_expire_in_minutes, function () {
            return $this->all();
        });
    }
}
