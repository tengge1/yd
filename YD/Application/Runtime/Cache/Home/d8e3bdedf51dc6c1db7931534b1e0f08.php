<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>最新资讯</title>
    <link href="/YD/Public/Home/css/bootstrap.min.css" rel="stylesheet">
    <link href="/YD/Public/Home/css/non-responsive.css" rel="stylesheet">
    <link href="/YD/Public/Home/css/my.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="/YD/Public/Home/js/html5shiv.min.js"></script>
      <script src="/YD/Public/Home/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    
    <nav class="navbar navbar-default navbar-fixed-top index-nav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo U('index');?>">
                    <img alt="YDesigner" src="/YD/Public/Home/img/index-logo.png" />
                </a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo U('index');?>">首页</a></li>
                    <li <?php if(I('article_id') != 22): ?>class="active"<?php endif; ?>><a href="<?php echo U('articleList');?>">最新资讯</a></li>
                    <li <?php if(I('article_id') == 22): ?>class="active"<?php endif; ?>><a href="<?php echo U('articleDetail',array('article_id'=>22));?>">推荐产品</a></li>
                    <li><a href="http://112.74.212.185/YDesigner" target="_blank">系统演示</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="index-mask"></div>

    
    <div class="container-fluid article-list-banner">
        <img class="img-responsive" src="/YD/Public/Home/img/article-list-banner.png" alt="Choose as" />
    </div>

    
    <div class="container article-detail-block">
        <h5 class="box"><span class="sub"><?php echo ($article["title"]); ?></span><span class="pull-right right">作者：<?php echo ($article["username"]); ?></span></h5>
        <br />
        <h4 class="title"><?php echo ($article["title"]); ?></h4>
        <?php echo (str_replace('../../../','../../../../../',$article["content"])); ?>
    </div>
    <br />
    <br />

    
    <div class="container-fluid text-center copyright">
        <ul class="center-block">
            <li><a href="<?php echo U('index');?>">首页</a></li>
            <li>|</li>
            <li><a href="<?php echo U('articleList');?>">最新资讯</a></li>
            <li>|</li>
            <li><a href="<?php echo U('articleDetail',array('article_id'=>22));?>">推荐产品</a></li>
            <li>|</li>
            <li><a href="http://112.74.212.185/YDesigner" target="_blank">系统演示</a></li>
        </ul>
        <div class="service-text">
            服务咨询：
            <img src="/YD/Public/Home/img/index-qq.png" alt="qq" />
            930372551
            邮箱：930372551@qq.com 
            页面设计：学妹小鱼儿
        </div>
        <div class="copyright-text">版权所有 &copy; All Right Reserved.</div>
    </div>

    <script src="/YD/Public/Home/js/jquery.min.js"></script>
    <script src="/YD/Public/Home/js/bootstrap.min.js"></script>
</body>
</html>