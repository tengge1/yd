<?php if (!defined('THINK_PATH')) exit();?>﻿<div class="pageContent">
    <form method="post" action="/YD/index.php/Admin/Column/edit/column_id/4?_=1452753710933" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <input type="hidden" name="column_id" value="<?php echo ($column["id"]); ?>" />
        <div class="pageFormContent" layouth="56">
            <p>
                <label>名称：</label>
                <input name="name" class="required" type="text" value="<?php echo ($column["name"]); ?>" autocomplete="off" />
            </p>
            <p>
                <label>备注：</label>
                <input name="comment" type="text" value="<?php echo ($column["comment"]); ?>" autocomplete="off" />
            </p>
        </div>
        <div class="formBar">
            <ul>
                <li>
                    <div class="buttonActive">
                        <div class="buttonContent">
                            <button type="submit">保存</button>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="button">
                        <div class="buttonContent">
                            <button type="button" class="close">取消</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </form>
</div>