<?php
/**
 *   .--,       .--,
 *   ( (  \.---./  ) )
 *    '.__/o   o\__.'
 *       {=  ^  =}
 *        >  -  <
 *       /       \
 *      //       \\
 *     //|   .   |\\
 *     "'\       /'"_.-~^`'-.
 *        \  _  /--'         `
 *      ___)( )(___
 *     (((__) (__)))
 */
namespace app\home\controller;

use think\Controller;
use think\request;
use think\response;
use think\View;
use think\Db;

class Test extends Controller
{
    public function register() {
        $this->assign('title', '注册');
        return $this->fetch();
    }

    public function addUser(Request $request) {
        $data = [
            'username' => $request->post('username'),
            'sex'      => $request->post('sex'),
            'password' => $request->post('password')?md5($request->post('password')):''
        ];

        $validate = new \app\home\validate\Test();
        if (!$validate->check($data)) {
            return json(['code'=>2, 'msg'=>$validate->getError()]);
        }

        //注册
        $data['ip'] = ip2long($_SERVER['REMOTE_ADDR']);
        $data['addtime'] = time();
        $res = Db::name('user')->insert($data);
        if ($res) {
            return json(['code'=>1, 'msg'=>'注册成功']);
        } else {
            return json(['code'=>2, 'msg'=>'注册失败']);
        }

    }

    //首页
    public function index() {
        $this->assign('title', '首页');
        return $this->fetch();
    }

    //添加问题展示页
    public function addQuestionsIndex() {
        $this->assign('title', '添加问题');
        return $this->fetch();
    }

    //添加问题
    public function addQuestions(Request $request) {
        $data = [
            'username' => $request->post('title'),
            'content'      => $request->post('content'),
        ];

        $validate = new \app\home\validate\AddQuestions();
        if (!$validate->check($data)) {
            return json(['code'=>2, 'msg'=>$validate->getError()]);
        }

        //注册
        $data['addtime'] = time();
        $res = Db::name('user')->insert($data);
        if ($res) {
            return json(['code'=>1, 'msg'=>'注册成功']);
        } else {
            return json(['code'=>2, 'msg'=>'注册失败']);
        }
    }


}