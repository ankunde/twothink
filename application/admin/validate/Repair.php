<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/8
 * Time: 22:10
 */

namespace app\admin\validate;


use think\Validate;

class Repair extends Validate
{
        protected $rule =[
            ['title','require|max:50','标题必须填写|标题最多50个字符'],
            ['name','require|max:25','名称必须填写|名称最多不能超过25个字符'],
            ['tel','require|max:15','电话必须填写|电话最多不能超过11位'],
            ['address','require','地址必须填写'],
            ['content','require','具体描述必须填写']
        ];
}