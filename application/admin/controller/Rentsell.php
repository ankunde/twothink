<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/12
 * Time: 9:40
 */

namespace app\admin\controller;


use app\admin\model\Uploads;
use think\Db;
use think\Request;

class Rentsell extends Admin
{
    /**
     * 租售列表
     * @return \think\response\View
     */
    public function index(){
        //>>1.查询数据库
        $rentsell = Db::table('rentsell')->paginate(2);
        //>>2.返回视图
        $this->assign('rentsell',$rentsell);
        return $this->fetch();
    }

    /**
     * 租售添加页
     * @return \think\response\View
     */
    public function create(){
        return $this->fetch();
    }

    /**
     * 租售保存
     */
    public function store(Request $request)
    {
        //>>1.验证数据
        $post_data=\think\Request::instance()->post();
        $validate = validate('Rentsell');
        if(!$validate->check($post_data)){
            return $this->error($validate->getError());
        }

        //>>2.添加数据
        Db::table('rentsell')->insert($post_data);
        //>>3.返回页面
        $this->success('新增成功', url('index'));
    }

    /**
     * 租售修改
     */
    public function edit($id){
        $rentsell = Db::table('rentsell')->where('id',$id)->find();
        $this->assign('rentsell',$rentsell);
        return $this->fetch();
    }

    /**
     * 租售保存
     */
    public function save_edit(){

        //>>1.验证数据
        $post_data = \think\Request::instance()->post();
        $validate = validate('Rentsell');
        if(!$validate->check($post_data)){
            return $this->error($validate->getError());
        }
        //>>2.修改数据
//        $time = date('Y-m-d H:i:s',time());
//        $post_data['update_time']=$time;
        Db::table('rentsell')->update($post_data);
        //>>3.返回视图
        $this->success('修改成功', url('index'));
    }

    /**
     * 租售删除
     */
    public function del($id){
        Db::name('rentsell')->where('id',$id)->delete();
        $this->success('删除成功', url('index'));
    }
}