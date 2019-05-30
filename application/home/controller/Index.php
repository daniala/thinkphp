<?php
namespace app\home\controller;

use think\Controller;
use think\request;
use think\response;
use think\View;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}
