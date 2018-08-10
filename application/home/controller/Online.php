<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 16:17
 */

namespace app\home\controller;




use think\Db;

class Online extends Home
{
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
        $validate = validate('Online');
        if(!$validate->check($post_data)){
            return $this->error($validate->getError());
        }
        //>>2.添加数据
        $time = date('Y-m-d H:i:s',time());
        $post_data['update_time']=$time;
        $post_data['create_time']=$time;
        Db::table('repiar')->insert($post_data);

        //>>3.返回页面
        $this->success('新增成功', url('Index/index'));
    }
}