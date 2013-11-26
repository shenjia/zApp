<?php
$this->pageTitle = Yii::t('title', 'site') . ' - ' . Yii::t('title', 'backend'); 
Resource::loadCss('admin_layout'); 
Resource::loadJs(array('index'));
?>
<div class="wrap">
    <noscript><h1 class="noscript"><?php echo Yii::t('notice', 'js_disabled')?></h1></noscript>
    <table width="100%" height="100%" style="table-layout:fixed;">
        <tr class="head">
            <th>
            <div class="header">
            <h1><?= Yii::t('title', 'site')?></h1>
            <div class="nav">
                <!-- 菜单异步获取，采用json格式，由js处理菜单展示结构 -->
                <ul id="J_B_main_block">
                    
                </ul>
            </div>
            </div>
            </th>
            <td>
            
            <div class="login_info">
                <a href="<?= FRONTEND_URL ?>" class="home" target="_blank"><?= Yii::t('title', 'frontend')?></a><span class="mr10"><?= Yii::t('account', 'role.' . Yii::app()->user->role)?>: <?echo Yii::app()->user->name ?></span><a href="/account/logout" class="mr10">[<?echo Yii::t('title', 'logout') ?>]</a>
            </div></td>
        </tr>
        <tr class="tab">
            <th>
            <div class="search">
                <input size="15" placeholder="<?php echo Yii::t('title', 'search')?>" id="J_search_keyword" type="text">
                <button type="button" name="keyword" id="J_search" value="" data-url="http://phpwind/admin.php?c=find"><?php echo Yii::t('title', 'search')?></button>
            </div></th>
            <td>
            <div id="B_tabA" class="tabA">
                <a href="" tabindex="-1" class="tabA_pre" id="J_prev" title="上一页">上一页</a>
                <a href="" tabindex="-1" class="tabA_next" id="J_next" title="下一页">下一页</a>
                <div style="margin:0 25px;min-height:1px;">
                    <div style="position:relative;height:30px;width:100%;overflow:hidden;">
                        <ul id="B_history" style="white-space:nowrap;position:absolute;left:0;top:0;">
                            <li class="current" data-id="default" tabindex="0"><span><a><?= Yii::t('title', 'backend')?></a></span></li>
                        </ul>
                    </div>
                </div>
            </div></td>
        </tr>
        <tr class="content">
            <th  style="overflow:hidden;">
                <div id="B_menunav">
                    <div class="menubar">
                        <dl id="B_menubar">
                            <dt class="disabled"></dt>
                        </dl>
                    </div>
                    <div id="menu_next" class="menuNext" style="display:none;">
                        <a href="" class="pre" title="顶部超出，点击向下滚动">向下滚动</a>
                        <a href="" class="next" title="高度超出，点击向上滚动">向上滚动</a>
                    </div>
                </div>
            </th>
            <td id="B_frame">
                <div id="breadCrumb" style="display:none;">
                    首页<em>&gt;</em>功能<em>&gt;</em>功能
                </div>
                <div class="options">
                    <a href="" class="refresh" id="J_refresh" title="刷新">刷新</a>
                    <a href="" id="J_fullScreen" class="full_screen" title="全屏">全屏</a>
                </div>
                <div class="loading" id="loading"><?= Yii::t('title', 'loading')?></div>
                <iframe id="iframe_default" src="/site/home" style="height: 100%; width: 100%;display:none;" data-id="default" frameborder="0" scrolling="auto"></iframe>
            </td>
        </tr>
    </table>
</div>
<script>
//iframe 加载事件
var iframe_default = document.getElementById('iframe_default');
$(iframe_default.contentWindow.document).ready(function() {
	$('#loading').hide();
	$(iframe_default).show();
});
var SUBMENU_CONFIG = <?php echo Menu::render();?>; 
</script>