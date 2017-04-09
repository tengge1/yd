<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>首页</title>
    <link href="/YD/Public/Home/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="/YD/Public/Home/js/html5shiv.min.js"></script>
      <script src="/YD/Public/Home/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        
        <ul class="list-group">
            <?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_menu): $mod = ($i % 2 );++$i;?><li class="list-group-item"><span class="glyphicon glyphicon-triangle-right"></span> <?php echo ($vo_menu["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>

    <script src="/YD/Public/Home/js/jquery.min.js"></script>
    <script src="/YD/Public/Home/js/bootstrap.min.js"></script>
</body>
</html>