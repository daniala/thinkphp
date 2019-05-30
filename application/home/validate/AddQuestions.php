<?php

namespace app\home\validate;

use think\Validate;

class AddQuestions extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'title' =>'require|max:30',
        'content' => 'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'title.require' => '标题不能为空',
        'title.max'     => '标题长度不能超过30',
        'content.require' => '内容不能为空'
    ];
}
