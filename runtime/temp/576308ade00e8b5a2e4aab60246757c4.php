<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\www\twothink\public/../application/home/view/default/article\article\detail.html";i:1534034528;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/static/home/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/home/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">
        <div class="blank"></div>
        <h3 class="noticeDetailTitle" ><strong><?php echo $info['title']; ?></strong></h3>
        <div class="noticeDetailInfo"><?php echo get_username($info['uid']); ?></div>
        <div class="noticeDetailInfo">发布时间：<?php echo date('Y-m-d H:i',$info['create_time']); ?></div>
        <div class="noticeDetailContent">
            <?php echo $info['content']; ?>
        </div>
    </div>
</div>
<?php if((is_login())): ?>
<button id="a" activity="<?php echo $id; ?>" uid="<?php echo \think\Session::get('user_auth.uid'); ?>"   class="btn btn-primary btn-block get_more" onclick="sign()">报名活动</button>
<div id="b"></div>
<?php else: ?>
<a href="<?php echo url('user/Login/index'); ?>"  class="btn btn-primary btn-block get_more">请先登录</a>
<?php endif; ?>
<?php echo hook('documentDetailAfter',$info); ?>
<!--顶一下-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/static/home/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/static/home/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {
        sign = function () {
            var uid=$("#a").attr('uid');
            var activity_id = $("#a").attr('activity');
            $.get('/home/Sign/index','uid='+uid+'&activity='+activity_id,function (data) {
                if (!data){
                    $("#a").remove();
                    $("#b").append("<a href='javascript:;' class='btn btn-danger btn-block get_more'>您已经报名过此活动了</a>");
                }

            })
        }
    })
</script>
</body>
</html>