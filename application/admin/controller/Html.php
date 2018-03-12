<?php
namespace app\admin\controller;
use app\admin\controller\Common;
class Html extends Common
{
    public function amdin()
    {
        return $this->fetch();
    }

    public function main()
    {
        return $this->fetch();
    }

    public function message()
    {
        return $this->fetch();
    }

    public function temp()
    {
        return $this->fetch();
    }
}
