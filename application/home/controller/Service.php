<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/12
 * Time: 15:32
 */

namespace app\home\controller;


use think\Db;

class Service extends Home
{

    /**
     * 服务页
     * @return $this|mixed
     *
     */
    public function fuwu(){
        if(is_login()){
            return $this->fetch();
        }else{
            return redirect('/user/Login/index')->with('danger','请先登录');
        }

    }
    /**
     * 用户认证页
     */
    public function renzheng(){
        return $this->fetch();
    }
    /**
     * 初步用户验证保存
     */
    public function check(){
        //>>1.验证是否验证过
        $id = \think\Request::instance()->param('id_number');
        $count = Db::table('check')->where('id_number',$id)->count();
        if($count>0){
            return $this->error("您已提交认证,无需重复提交");
        }
        //>>2.验证数据
        $post_data=\think\Request::instance()->post();

        $validate = validate('Service');
        if(!$validate->check($post_data)){
            return $this->error($validate->getError());
        }
        $post_data['static']=0;
        //>>3.添加数据
        Db::table('check')->insert($post_data);
        //>>4.返回页面并提示
        return $this->success('正在认证,敬请等待',url('fuwu'));
    }
    /**
     * 权限验证
     */
    public function permission(){
        //当前登录用户id
        $uid = session('user_auth.uid');
        $count = Db::table('twothink_member')->where('uid',$uid)->where('static',1)->count();
        return $count;
    }
    /**
     * 我的信息
     */
    public function my()
    {
        if($this->permission()==0){
            return redirect('/user/Login/index');
        }
        return $this->fetch();
    }
    /**
     * 自己的在线报修列表
     */
    public function online(){
        if($this->permission()==0){
            return redirect('/user/Login/index');
        }
        //>>1.所有报修信息
        $repiar = Db::table('repiar')->select();
        $html = '';
        foreach($repiar as $value){
            $html.='
                <li class="list-group-item"><a href="javascript:;" class="text-danger"><span class="iconfont">&#xe60a;</span>'.$value['title'].'</a> </li>
        ';
        }
        return $html;
    }
    /**
     *我的缴费账单、我的物业通知、我的水电气
     */
    public function notice(){
        if($this->permission()==0){
            return redirect('/user/Login/index');
        }
        return $this->fetch();
    }

}