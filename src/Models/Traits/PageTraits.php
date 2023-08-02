<?php
namespace Catlane\LaravelModelPage\Models\Traits;


use Catlane\LaravelModelPage\Models\Interfaces\Page;

/**
 * 自定义分页类
 */
trait PageTraits
{
    public function scopePage($query, $limit = null): Page
    {
        return new Page($query, $limit);
    }
}
