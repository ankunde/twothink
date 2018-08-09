<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\www\twothink\public/../application/admin\view\property\repair\index.html";i:1533729276;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<table class="table">
    <tr>
        <th>编号</th>
        <th>标题</th>
        <th>名称</th>
        <th>电话</th>
        <th>地址</th>
        <th>内容</th>
        <th>操作</th>
    </tr>
    <?php foreach($repair as $value): ?>
    <tr>

        <td><?php echo $value['id']; ?></td>
        <td><?php echo $value['title']; ?></td>
        <td><?php echo $value['name']; ?></td>
        <td><?php echo $value['tel']; ?></td>
        <td><?php echo $value['address']; ?></td>
        <td><?php echo $value['content']; ?></td>
        <td>
            <a href="http://www.twothink.com/Admin/Repair/show?id=<?php echo $value['id']; ?>">查看</a>
            <a href="http://www.twothink.com/Admin/Repair/edit?id=<?php echo $value['id']; ?>">修改</a>
            <a href="http://www.twothink.com/Admin/Repair/delete?id=<?php echo $value['id']; ?>">删除</a>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="7">
            <a href="http://www.twothink.com/Admin/Repair/create">添加</a>
        </td>
    </tr>
</table>

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="js/jquery-3.2.1.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="js/bootstrap.js"></script>
</body>
</html>