<?php
namespace Catlane\LaravelModelPage\Models\Interfaces;
class Page implements \Iterator
{
    private $position = 0;//指针指向0


    public $data;
    public $total;
    public $pageTotal;
    public $nowPage;
    public $limit;
    public $last_page;
    protected $query;
    public function __construct($query, $limit)
    {

        $this->query = $query;

        if ($limit === null) {
            $limit = request()->get('limit', 15);
        }
        $pageNum = request()->get('page', 1);//页码
        $total = $query->count();
        $startNum = $limit * ($pageNum - 1);//起始值

        $data = $query->offset($startNum)->limit($limit)->get();
        $this->data = $data;
        $this->pageTotal = count($data);
        $this->total = $total;
        $this->nowPage = request()->get('page', 1);
        $this->limit = $limit;
        $this->last_page = ceil($total / $limit);
    }

    public function toArray()
    {
        return [
            'data' => $this->data->toArray(),
            'total' => $this->total,
            'page_total' => $this->pageTotal,
            'now_page' => $this->nowPage,
            'limit' => $this->limit,
            'last_page' => $this->last_page
        ];
    }


    //3 获取当前内容
    public function current()
    {
        return $this->data[$this->position];
    }


    //5 向前移动到下一个元素
    public function next()
    {
        $this->position ++;
    }


    //4 返回当前元素的键
    public function key()
    {
        return $this->position;
    }


    //2. 验证迭代器是否有数据
    public function valid()
    {
        return $this->position < count($this->data);
    }


    //1. 重置迭代器
    public function rewind()
    {
        $this->position = 0;
    }




    /**
     * 是否为空
     */
    public function isEmpty(): bool
    {
        return empty(count($this->data));
    }


    public function __call($name, $arguments)
    {
        $name = convertHumpToUnderLine($name);
        return $this->$name ?? null;
    }
}
