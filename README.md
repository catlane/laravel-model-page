# laravel分页
### 使用方法
在Model中 `use PageTraits` 即可
```php
<?php

namespace App\Models;
use Catlane\LaravelModelPage\Models\Traits\PageTraits;

class AddressModel extends Model
{
    use PageTraits;//
    protected $table = 'address';
}

```

### 返回参数

```json
{
	"data": [{
		"id": 4,
		"uid": 1
	}],
	"total": 4,
	"page_total": 3,
	"now_page": "1",
	"limit": "3",
	"last_page": 2
}

```
参数注解

| 参数名 | 参数注解 |
| --- | --- |
| total | 数据总数量 |
| page_total | 当前页数据数量 |
| now_page | 当前页码 |
| limit | 当前分页数量 |
| last_page | 总页码 |


