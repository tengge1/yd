<?php

namespace Home\Controller;

use Think\Controller;

/**
 * 首页控制器
 */
class IndexController extends Controller {
    
    /**
     * 首页
     * @return void
     */
    public function index() {
        
        $articles = M('Article') -> order('id desc') -> limit(10) -> field('id,title,time') -> select();
        
        $this -> assign('articles', $articles);
        $this->display();
    }
    
    /**
     * 文章列表界面
     * @param mixed $pageNum 
     * @param mixed $numPerPage 
     */
    public function articleList(
        $pageNum = 1,
        $numPerPage = 5
        ){
        $article_count = M('Article') -> count();
        $page_count = ceil($article_count / 5);
        $articles = M('Article') 
            -> join('yd_user on yd_user.id=yd_article.user_id') 
            -> order('yd_article.id desc') 
            -> field('yd_article.id,yd_article.title,yd_article.content,yd_article.time,yd_user.name username,yd_article.click_time') 
            -> page($pageNum, 5) -> select();
        $this -> assign('page_count', $page_count);
        $this -> assign('page_num', $pageNum);
        if(!empty($articles)) {
            $this -> assign('articles', $articles);
        }
        $this -> display();
    }
    
    /**
     * 文章详情页面
     * @param mixed $article_id 文章ID
     */
    public function articleDetail(
        $article_id = 0
        ){
        $articles = M('Article') 
            -> join('yd_user on yd_user.id=yd_article.user_id') 
            -> where("yd_article.id='%s'", $article_id) 
            -> field('yd_article.id,yd_article.title,yd_article.content,yd_user.name username,yd_article.click_time') 
            -> select();
        if(!empty($articles)) {
            M('Article') -> where("id='%s'", $article_id) -> save(array(
                'click_time' => intval($articles[0]['click_time']) + 1
                ));
            $this -> assign('article', $articles[0]);
        }
        $this -> display();
    }
}
