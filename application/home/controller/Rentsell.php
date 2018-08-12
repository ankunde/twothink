<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/12
 * Time: 14:41
 */

namespace app\home\controller;


use think\Db;

class Rentsell extends Home
{
    public function index(){
        $zu = Db::table('rentsell')->where('type',1)->select();
        $shou = Db::table('rentsell')->where('type',2)->select();

        $this->assign('zu',$zu);
        $this->assign('shou',$shou);
        return $this->fetch();
    }
}