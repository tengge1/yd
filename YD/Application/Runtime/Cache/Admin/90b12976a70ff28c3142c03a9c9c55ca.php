<?php if (!defined('THINK_PATH')) exit();?>﻿<form id="pagerForm" method="post" action="/YD/index.php/Admin/Column/index.html?_=1453977819502">
    <input type="hidden" name="pageNum" value="<?php echo ($pageNum); ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo ($numPerPage); ?>" />
</form>

<div class="pageHeader">
    <form onsubmit="return navTabSearch(this);" action="/YD/index.php/Admin/Column/index.html?_=1453977819502" method="post" rel="pagerForm">
        <div class="searchBar">
            <table class="searchContent">
                <tr>
                    <td>名称：<input type="text" name="keyword" value="<?php echo ($keyword); ?>" />
                    </td>
                </tr>
            </table>
            <div class="subBar">
                <ul>
                    <li>
                        <div class="buttonActive">
                            <div class="buttonContent">
                                <button type="submit">检索</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </form>
</div>
<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="add" href="/YD/index.php/Admin/Column/add" target="dialog" title="添加栏目" mask="true"><span>添加</span></a></li>
            <li><a class="edit" href="/YD/index.php/Admin/Column/edit/column_id/{sid}" target="dialog" title="修改栏目" mask="true"><span>修改</span></a></li>
            <li><a class="delete" href="/YD/index.php/Admin/Column/remove/column_id/{sid}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
        </ul>
    </div>
    <table class="table" width="100%" layouth="138">
        <thead>
            <tr>
                <th width="60">编号</th>
                <th width="100">名称</th>
                <th width="150">创建时间</th>
                <th>备注</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr target="sid" rel="<?php echo ($vo["id"]); ?>">
                    <td><?php echo ($vo["id"]); ?></td>
                    <td><?php echo ($vo["name"]); ?></td>
                    <td><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?></td>
                    <td><?php echo ($vo["comment"]); ?></td>
                </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <div class="panelBar">
        <div class="pages">
            <span>显示</span>
            <select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
                <option value="20" <?php if(($numPerPage) == "20"): ?>selected<?php endif; ?>>20</option>
                <option value="50" <?php if(($numPerPage) == "50"): ?>selected<?php endif; ?>>50</option>
                <option value="100" <?php if(($numPerPage) == "100"): ?>selected<?php endif; ?>>100</option>
                <option value="200" <?php if(($numPerPage) == "200"): ?>selected<?php endif; ?>>200</option>
            </select>
            <span>条，共<?php echo ($total); ?>条</span>
        </div>
        <div class="pagination" targettype="navTab" totalcount="<?php echo ($total); ?>" numperpage="<?php echo ($numPerPage); ?>" pagenumshown="10" currentpage="<?php echo ($pageNum); ?>"></div>
    </div>
</div>