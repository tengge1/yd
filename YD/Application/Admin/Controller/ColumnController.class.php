<?php

namespace Admin\Controller;

use Think\Controller;
use Think\Crypt;

/**
 * 栏目控制器
 */
class ColumnController extends Controller {
    
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
     * 栏目列表页面
     * @param mixed $pageNum 第几页
     * @param mixed $numPerPage 每页数量
     * @param mixed $keyword 关键字
     */
    public function index(
        $pageNum = 1,
        $numPerPage = 100,
        $keyword = ''
        ){
        
        //进行查询
        $where['name'] = array('LIKE','%'.$keyword.'%');
        $Column = M('Column');
        $total = $Column -> where($where) -> count();
        $list = $Column -> where($where) 
            -> order("id") 
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
     * 添加栏目页面
     * @param mixed $name 名称
     * @param mixed $comment 备注
     */
    public function add(
        $name = '',
        $comment = ''
        ){
        if(IS_POST) { //POST操作
            $count = M('Column') -> where("name='%s'", $name) -> count();
            if($count > 0) {
                $this -> ajaxReturn(array(
                    'statusCode' => 300,
                    'message' => '该栏目已经存在，添加失败'
                    ));
                return;
            }
            
            M('Column') -> add(array(
                'name' => $name,
                'create_time' => time(),
                'comment' => $comment
                ));
            
            $this -> ajaxReturn(array(
                'statusCode' => 200,
                'message' => '添加成功',
                'navTabId' => 'yd_column',
                'callbackType' => 'closeCurrent'
                ));
        } else { //GET操作
            $this -> display();
        }
    }
    
    /**
     * 编辑栏目界面
     * @param mixed $column_id 栏目ID
     * @param mixed $name 名称
     * @param mixed $comment 备注
     * @return void
     */
    public function edit(
        $column_id = '0',
        $name = '',
        $comment = ''
        ){
        if(IS_POST) {
            
            // 检查栏目是否存在
            $columns = M('Column') -> where("id='%d'", $column_id) -> select();
            if(empty($columns)) {
                $this -> ajaxReturn(array(
                    'statusCode' => 300,
                    'message' => '该栏目ID不存在'
                    ));
                return;
            }
            
            // 检查栏目名称是否和其他栏目名称重复
            $columns = M('Column') -> where("name='%s' and id<>'%d' ", $name, $column_id) -> select();
            if(!empty($columns)) {
                $this -> ajaxReturn(array(
                    'statusCode' => 300,
                    'message' => '该栏目名称已经存在'
                    ));
                return;                
            }
            
            // 修改栏目信息
            M('Column') -> where("id='%d'", $column_id) -> save(array(
                'name' => $name,
                'comment' => $comment
                ));
            
            $this -> ajaxReturn(array(
                'statusCode' => 200,
                'message' => '修改成功',
                'navTabId' => 'yd_column',
                'callbackType' => 'closeCurrent'
                ));
        } else {
            $columns = M('Column') -> where("id='%d'", $column_id) -> select();
            if(!empty($columns)) {
                $this -> assign('column', $columns[0]);
            }
            $this -> display();
        }
    }
    
    /**
     * 删除栏目功能
     * @param mixed $column_id 栏目ID
     */
    public function remove(
        $column_id = '0'
        ){
        if(IS_POST){            
            M('Column') -> where("id='%d'", $column_id) -> delete();
            $this -> ajaxReturn(array(
                'statusCode' => 200,
                'message' => '删除成功',
                'navTabId' => 'yd_column'
                ));
        }
    } 
}
