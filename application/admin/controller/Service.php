<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/12
 * Time: 19:24
 */

namespace app\admin\controller;


use think\Db;

class Service extends Admin
{
    public function index(){
        $check = Db::table('check')->paginate(2,true);
        $this->assign('check',$check);
        return $this->fetch();
    }

    public function edit($id)
    {
        $uid = session('user_auth.uid');
        Db::transaction(function() use($uid,$id){
            Db::table('twothink_member')->where('uid',$uid)->update([
                'static'=>1
            ]);
            Db::table('check')->where('id',$id)->update([
                'static'=>1
            ]);
        });
        return $this->success('审核通过',url('index'));
    }
}