<?php
namespace Catlane\LaravelPage\Models\Traits;


use Catlane\LaravelPage\Models\Interfaces\Page;

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
