<?php
namespace app\home\validate;
use think\Validate;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 21:43
 */
class Online extends Validate
{
    protected $rule =[
        ['tel','require|max:15|regex:/^1[3-8]\d{9}$/','电话必须填写|电话最多不能超过11位|请输入正确的手机号'],

        ['title','require|max:50','标题必须填写|标题最多50个字符'],
        ['name','require|max:25','名称必须填写|名称最多不能超过25个字符'],
        ['address','require','地址必须填写'],
        ['content','require','具体描述必须填写'],
        ['username',['require',''], '请输入用户名|请输入正确的手机号'],
    ];
}