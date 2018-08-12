<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/25
 * Time: 10:40
 */

namespace app\admin\model;


class Uploads
{
    //保存错误信息
    private $error;
    //文件格式
    private $type=['image/png','image/jpeg','image/gif'];
    //规格大小
    private $size=2*1024*1024;
    public function error(){
        return $this->error;
    }
    /**
     * 判断文件上传
     */
    public function flie($logo){
         //a.判断文件是否上传错误
        if ($logo['error']!=0){
            $this->error="文件上传出错";
            return false;
        }
        //b.判断文件是否格式错误
        if (!in_array($logo['type'],$this->type)){
            $this->error="文件格式错误";
            return false;
        }
        //c.判断文件是否超过大小
        if ($logo['size']>$this->size){
            $this->error='文见上传超过2M';
            return false;
        }
        //d.判断文件是否通过http协议 html方式上传
        if(!is_uploaded_file($logo['tmp_name'])){
            $this->error="请通过http协议,html方式上传";
            return false;
        }
        //文件永久化保存操作
            //保存路径
        $new_dir = "static/uploads/".date('Ymd')."/";
            //文件后缀名
        $suffix = strrchr($logo['name'],'.');
            //文件随机唯一字符串名
        $file=uniqid('image_');
            //完整的保存路径
        $dir=$new_dir.$file.$suffix;
            //判断是否存在该路径,没有,创建
        if (!is_dir($new_dir)){
            mkdir($new_dir,0777,true);
        }
        //e.判断文件是否移动成功
        if (!move_uploaded_file($logo['tmp_name'],$dir)){
            $this->error="文件移动失败";
            return false;
        }
        return $dir;
    }
}