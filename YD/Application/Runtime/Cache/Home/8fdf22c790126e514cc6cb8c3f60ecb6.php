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
                    <li class="active"><a href="<?php echo U('articleList');?>">最新资讯</a></li>
                    <li><a href="<?php echo U('articleDetail',array('article_id'=>22));?>">推荐产品</a></li>
                    <li><a href="http://112.74.212.185/YDesigner" target="_blank">系统演示</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="index-mask"></div>

    
    <div class="container-fluid article-list-banner">
        <img class="img-responsive" src="/YD/Public/Home/img/article-list-banner.png" alt="Choose as" />
    </div>

    
    <div class="container article-list-block">
        <h2><span>文章列表</span></h2>
        <br />
        <div>
            <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_article): $mod = ($i % 2 );++$i;?><h4><a href="<?php echo U('articleDetail',array('article_id'=>$vo_article['id']));?>"><?php echo ($vo_article["title"]); ?></a><span class="pull-right">By <?php echo ($vo_article["username"]); ?></span></h4>
                <?php echo (mb_substr(strip_tags($vo_article["content"]),0,300,'utf-8')); ?>...
                <br />
                <span class="pull-right article-list-info">发布日期：<?php echo (date('Y-m-d',$vo_article["time"])); ?> 点击量：<?php echo ($vo_article["click_time"]); ?></span>
                <hr /><?php endforeach; endif; else: echo "" ;endif; ?>
            <nav>
                <ul class="pagination">
                    <li <?php if($page_num == 1): ?>class="disabled"<?php endif; ?>>
                        <a href="<?php echo U('articleList',array('pageNum' => $page_num - 1));?>">
                            <span>&laquo;</span>
                        </a>
                    </li>
                    <?php $__FOR_START_24464__=0;$__FOR_END_24464__=$page_count;for($i=$__FOR_START_24464__;$i < $__FOR_END_24464__;$i+=1){ ?><li><a href="<?php echo U('articleList',array('pageNum'=>$i+1));?>"><?php echo ($i+1); ?></a></li><?php } ?>
                    <li <?php if($page_num == $page_count-1): ?>class="disabled"<?php endif; ?>>
                        <a href="<?php echo U('articleList',array('pageNum' => $page_num + 1));?>">
                            <span>&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
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