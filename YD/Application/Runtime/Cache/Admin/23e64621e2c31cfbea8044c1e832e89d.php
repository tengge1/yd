<?php if (!defined('THINK_PATH')) exit();?>﻿<div class="pageContent">
    <form method="post" action="/YD/index.php/Admin/Column/add?_=1452753542873" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layouth="56">
            <p>
                <label>名称：</label>
                <input name="name" class="required" type="text" autocomplete="off" />
            </p>
            <p>
                <label>备注：</label>
                <input name="comment" type="text" autocomplete="off" />
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