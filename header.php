<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
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
                    <li>欢迎回来 <a href="#">Void</a></li>
                    <li class="mdui-color-pink mdui-ripple" id="controlBtn">
                        <a href="http://localhost:2333/admin"><i class="mdui-icon material-icons" style="color: white">computer</i></a>
                    </li>
    </ul>
</header>