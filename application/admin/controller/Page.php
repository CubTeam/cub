<?php
namespace app\admin\controller;
use app\admin\controller\Common;
class Page extends Common
{
    public function amdin()
    {
        return $this->fetch();
    }

    public function main()
    {
        return $this->fetch();
    }

    public function news()
    {
        return $this->fetch('page/news/newsList');
    }

    public function temp()
    {
        return $this->fetch();
    }
}
