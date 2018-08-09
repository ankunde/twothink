<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/8
 * Time: 14:11
 */

namespace app\admin\controller;

//后台报修表
use think\Controller;
use think\Db;
use think\Request;
use think\Validate;

class Repair extends Admin
{
    /**
     * 报修列表
     * @return \think\response\View
     */
    public function index(){
        //>>1.查询数据库
        $repair = \app\admin\model\Repair::all();
        //>>2.返回视图
        $this->assign('repair',$repair);
        return $this->fetch();

    }

    /**
     * 报修添加页
     * @return \think\response\View
     */
    public function create(){
        return $this->fetch();
    }

    /**
     * 报修保存
     */
    public function store()
    {
        //>>1.验证数据
        $post_data=\think\Request::instance()->post();

        $validate = validate('Repair');

        if(!$validate->check($post_data)){
            return $this->error($validate->getError());
        }

        //>>2.添加数据
        $time = date('Y-m-d H:i:s',time());
        $post_data['update_time']=$time;
        $post_data['create_time']=$time;

        \app\admin\model\Repair::create($post_data);
        //>>3.返回页面
        $this->success('新增成功', url('index'));
    }

    /**
     * 报修修改
     */
    public function edit($id){
        $repair = Db::table('repiar')->where('id',$id)->find();
        $this->assign('repair',$repair);
        return $this->fetch();
    }

    /**
     * 报修保存
     */
    public function save_edit(){
        //>>1.验证数据
        $post_data = \think\Request::instance()->post();
        $validate = validate('Repair');
        if(!$validate->check($post_data)){
            return $this->error($validate->getError());
        }
        //>>2.修改数据
        $time = date('Y-m-d H:i:s',time());
        $post_data['update_time']=$time;
        \app\admin\model\Repair::update($post_data);
        //>>3.返回视图
        $this->success('修改成功', url('index'));
    }

    /**
     * 报修删除
     */
    public function del($id){
        \app\admin\model\Repair::where('id',$id)->delete();
        $this->success('删除成功', url('index'));
    }
}