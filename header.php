<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <title><?php $this->options->title(); ?><?php $this->archiveTitle(); ?></title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('main.css'); ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('mdui.min.css'); ?>" />
    <script type="text/javascript" src="<?php $this->options->themeUrl('mdui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php $this->options->themeUrl('jquery-3.3.1.min.js'); ?>"></script>
    <?php $this->header(); ?>
</head>
<body>

<header>
    <ul class="header-tab-1">
         <li class="mdui-ripple"><a href="<?php $this->options->siteUrl(); ?>">主页</a></li>
         <li class="mdui-ripple"><a>留言</a></li>
         <li class="mdui-ripple"><a>友链</a></li>
         <li class="mdui-ripple"><a>关于</a></li>
    </ul>
    <ul class="header-tab-1 header-tab-2" >
        <?php if($this->user->hasLogin()): ?>
                    <li><a href="<?php $this->options->adminUrl(); ?>">欢迎回来 <?php $this->user->screenName(); ?></a><a href="http://localhost/index.php/action/logout" id="loginOutUrl" mdui-tooltip="{content: '退出登陆'}"><i class="mdui-icon material-icons">chevron_right</i></a></li>
        <?php else: ?>
            <li class="loginBtn"><a href="<?php $this->options->adminUrl(); ?>">Login<i class="mdui-icon material-icons">expand_more</i></a></li>
        <?php endif; ?>
                    <li class="mdui-ripple" id="controlBtn">
                        <a href="#"><i class="material-icons mdui-icon" style="color: white">menu</i></a>
                    </li>
    </ul>
    <script>
        topMenu = 0;
        $('#controlBtn').click(function () {
            if (topMenu == 0){
                animateFor('header','menuBackTop','menuBackZero');
                animateFor('#controlBtn','controlBtnSB','controlBtnSS');
                $(this).find('i').text('close');
                topMenu = 1;
            }else {
                    animateFor('header','menuBackZero','menuBackTop');
                animateFor('#controlBtn','controlBtnSS','controlBtnSB');
                $(this).find('i').text('menu');
                topMenu = 0;
            }
        });
        function animateFor(event,r,a) {
            $(event).removeClass(r);
            $(event).addClass(a);
        }
    </script>
</header>