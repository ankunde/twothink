<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/12
 * Time: 10:17
 */

namespace app\admin\validate;


use think\Validate;

class Rentsell extends Validate
{
    protected $ruel = [
        ['type','require','类型必须选择'],
        ['title','require|max:30','标题必须填写|标题最多30个字符'],
        ['price','require','价格必须填写'],
        ['tel','require|max:11','电话必须填写|电话最多不能超过11位'],
        ['content','require','内容必须填写'],
    ];

}