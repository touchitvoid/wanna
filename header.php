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
    <script type="text/javascript" src="<?php $this->options->themeUrl('main.js'); ?>"></script>
    <?php $this->header(); ?>
</head>
<body>
<header id="header">
    <ul class="header-tab-1">
         <li class="mdui-ripple"><a href="<?php $this->options->siteUrl(); ?>">主页</a></li>
         <li class="mdui-ripple"><a>留言</a></li>
         <li class="mdui-ripple"><a href="<?php $this->options->siteUrl(); ?>index.php/friend.html">友链</a></li>
         <li class="mdui-ripple"><a>关于</a></li>
    </ul>
    <ul class="header-tab-1 header-tab-2" >
        <?php if($this->user->hasLogin()): ?>
                    <li><a href="<?php $this->options->adminUrl(); ?>">欢迎回来 <?php $this->user->screenName(); ?></a></li>
        <?php else: ?>
            <li class="loginBtn"><a href="<?php $this->options->adminUrl(); ?>">Login<i class="mdui-icon material-icons">expand_more</i></a></li>
        <?php endif; ?>
                    <li class="mobie-head"><?php $this->options->title() ?></li>
                    <li class="mdui-ripple" id="controlBtn">
                        <button class="mb-btn" id="open-Vmenu">
                            <i class="material-icons mdui-icon">details</i>
                        </button>
                        <button class="mb-btn mdui-ripple" id="open-hMenu">
                            <i class="mdui-icon material-icons">menu</i>
                        </button>
                    </li>
    </ul>
</header>
<div class="bg-ovo"></div>
<script>
  logo = '<?php echo $this->options->logo ?>';
    bgurl = '<?php echo $this->options->bgUrl ?>';
    if (bgurl == ''){
        bgurl = '/usr/themes/wanna/img/bg.jpg';
    }
    if (logo == ''){
        logo = '/usr/themes/wanna/img/icon.jpg'
    }
  $('.bg-ovo').css({
      backgroundImage : "url("+bgurl+")"
  });
</script>
<div id="body">