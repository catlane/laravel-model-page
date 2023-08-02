# laravel分页
### 使用方法
```php
<?php

namespace App\Models;
use Catlane\LaravelPage\Models\Traits\PageTraits;

/**
 * /**
 * @property string uid 用户ID
 * @property string address 地址JSON
 * @property string created_at
 * @property string updated_at
 */
class AddressModel extends Model
{
    use PageTraits;
    protected $table = 'address';

    protected $primaryKey = 'id';

    protected $connection = 'mysql';

    protected $casts = [
            'address'  => 'json',
        ];

    protected $fillable = [
        'uid',#用户ID
        'address',#地址JSON
        'created_at',#
        'updated_at',#
    ];

    protected function createField(){
        return [
        'uid' => '',#用户ID
        'address' => '',#地址JSON
        'created_at' => '',#
        'updated_at' => '',#
    ];
    }


}

```
