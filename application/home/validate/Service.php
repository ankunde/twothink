<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/12
 * Time: 16:05
 */

namespace app\home\validate;


use think\Validate;

class Service extends Validate
{
    protected $rule = [
        ['name','require','姓名必须填写'],
        ['room','require','房号必须填写'],
        ['blood','require','你与业主的关系必须填写'],
        ['tel','require','您的电话必须填写'],
        ['id_number','require|max:18|min:15','你的身份证号码必须填写|你的身份证号码超过18位|你的身份证号码少于15位']
    ];
}