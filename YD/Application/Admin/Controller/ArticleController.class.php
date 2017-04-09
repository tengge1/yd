<?php

namespace Admin\Controller;

use Think\Controller;

/**
 * 文章控制器
 */
class ArticleController extends Controller {
    
    /**
     * 构造函数
     */
    public function _initialize() {
        // 访问权限控制
        if(session('user_id') == null) {
            if(IS_AJAX) {
                $this -> ajaxReturn(array(
                    'statusCode' => 300,
                    'message' => '请重新登录'
                    ));            
            } else {
                $this -> display('Public:error');
            }
            exit();
        }
    }
    
    /**
     * 文章列表页面
     * @param mixed $pageNum 第几页
     * @param mixed $numPerPage 每页数量
     * @param mixed $keyword 关键词
     */
    public function index(
        $pageNum = 1,
        $numPerPage = 100,
        $keyword = ''
        ){
        
        //进行查询
        $where['title'] = array('LIKE','%'.$keyword.'%');
        $where['user_id'] = session('user_id');
        $total = M('Article') -> where($where) -> count();
        $list = M('Article') 
            -> join('left join yd_user on yd_user.id=yd_article.user_id')
            -> join('left join yd_column on yd_column.id=yd_article.column_id')
            -> where($where) 
            -> field('yd_article.id,yd_column.name category,yd_article.title,yd_user.name user_name,yd_article.time,yd_article.comment')
            -> order("yd_article.id desc") 
            -> page($pageNum.','.$numPerPage) 
            -> select();
        
        //输出查询结果
        $this -> assign('keyword', $keyword);
        $this -> assign('total', $total);
        $this -> assign('list', $list);
        $this -> assign('pageNum', $pageNum);
        $this -> assign('numPerPage', $numPerPage);
        $this->display();
    }
    
    /**
     * 新增文章
     * @param mixed $category 分类名称
     * @param mixed $title 文章标题
     * @param mixed $content 文章内容
     * @param mixed $comment 文章备注
     */
    public function add(
        $category = '',
        $title = '',
        $content = '',
        $comment = ''
        ){
        if(IS_POST) { //POST操作
            M('Article') -> add(array(
                'column_id' => $category,
                'title' => $title,
                'content' => $content,
                'user_id' => session('user_id'),
                'time' => time(),
                'comment' => $comment
                ));
            $this -> ajaxReturn(array(
                    'statusCode' => 200,
                    'message' => '添加成功',
                    'navTabId' => 'yd_article',
                    'callbackType' => 'closeCurrent'
                    ));
        } else { //GET操作
            $columns = M('Column') -> select();
            $this -> assign('columns', $columns);
            $this -> display();
        }
    }
    
    /**
     * 编辑文章界面
     * @param mixed $id 文章ID
     * @param mixed $category 分类名称
     * @param mixed $title 文章标题
     * @param mixed $content 文章内容
     * @param mixed $comment 文章备注
     */
    public function edit(
        $id = '0',
        $category = '',
        $title = '',
        $content = '',
        $comment = ''
        ){
        if(IS_POST) {
            
            if(C('DEMO') == true) {
                $this -> ajaxReturn(array(
                    'statusCode' => 300,
                    'message' => '演示版本不允许修改文章'
                    ));                
                return;
            }
            
            $articles = M('Article') -> where("id='%d' and user_id='%d'", $id, session('user_id')) -> select();
            if(empty($articles)) {
                $this -> ajaxReturn(array(
                    'statusCode' => 300,
                    'message' => '该文章不存在'
                    ));
                return;
            }
            M('Article') -> where("id='%s'", $id) -> save(array(
                'column_id' => $category,
                'title' => $title,
                'content' => $content,
                'comment' => $comment               
                ));
            $this -> ajaxReturn(array(
                'statusCode' => 200,
                'message' => '修改成功',
                'navTabId' => 'yd_article',
                'callbackType' => 'closeCurrent'
                )); 
        } else {
            $articles = M('Article') -> where("id='%d' and user_id='%d'", $id, session('user_id')) -> select();
            if(!empty($articles)) {
                $this -> assign('article', $articles[0]);
            }
            $columns = M('Column') -> select();
            $this -> assign('columns', $columns);
            $this -> display();
        }
    }
    
    /**
     * 删除文章功能
     * @param mixed $id 文章ID
     */
    public function remove(
        $id = '0'
        ){
        if(IS_POST){            
            $articles = M('Article') -> where("id='%d' and user_id='%d'", $id, session('user_id')) -> select();
            if(empty($articles)) {
                $this -> ajaxReturn(array(
                    'statusCode' => 300,
                    'message' => '该文章不存在'
                    ));
                return;
            }
            M('Article') -> where("id='%d'", $id) -> delete();
            $this -> ajaxReturn(array(
                'statusCode' => 200,
                'message' => '删除成功',
                'navTabId' => 'yd_article'
                ));
        }
    } 
}
