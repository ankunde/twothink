<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/11
 * Time: 20:43
 */

namespace app\home\controller;


use think\Db;

class Sign
{
    /**
     * @param $uid  当前用户id
     * @param $activity 当前活动id
     * @return string   提示成功js数据
     */
    public function index($uid,$activity){

        //>>1.判断是否已经报名
        $count = Db::table('sign')->where('user_id',$uid)->where('activity_id',$activity)->count();
        if($count>0){
            return false;
        }
        //>>2.报名保存数据
        Db::table('sign')->insert([
            'user_id'=>$uid,
            'activity_id'=>$activity
        ]);
        //>>3.返回js数据

        return true;
    }
}