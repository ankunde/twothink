<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\www\twothink\public/../application/admin\view\property\repair\edit.html";i:1533723076;}*/ ?>
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
<form action="http://www.twothink.com/Admin/Repair/save_edit" method="post">
    <input type="hidden" name="id" value="<?php echo $repair['id']; ?>">
    标题:<input type="text" name="title" value="<?php echo $repair['title']; ?>"><br><br>
    姓名:<input type="text" name="name" value="<?php echo $repair['name']; ?>"><br><br>
    电话:<input type="number" name="tel" value="<?php echo $repair['tel']; ?>"><br><br>
    地址:<input type="text" name="address" value="<?php echo $repair['address']; ?>"><br><br>
    内容:<textarea name="content" id="" cols="30" rows="10">
    <?php echo $repair['content']; ?>
    </textarea><br><br>
    <input type="submit">
</form>

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="js/jquery-3.2.1.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="js/bootstrap.js"></script>
</body>
</html>