<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <title><?php $this->options->title(); ?><?php $this->archiveTitle(); ?></title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('css/main.css'); ?>" />
    <link rel="icon" href="<?php echo $this->options->icon ?>">
    <link href="https://cdn.bootcss.com/mdui/0.4.1/css/mdui.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php $this->options->themeUrl('js/main.js'); ?>"></script>
    <script src="https://cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
    <script src="https://cdn.bootcss.com/mdui/0.4.1/js/mdui.min.js"></script>
    <?php $this->header(); ?>
</head>
<body>
<div class="pjax-load">
    <img src="<?php $this->options->themeUrl('img/load.gif'); ?>">
    <h3 style="margin-top: 15px;color: white;">Loading...</h3>
</div>
<header id="header">
    <ul class="header-tab-1">
         <li class="mdui-ripple"><a href="<?php $this->options->siteUrl(); ?>">主页</a></li>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
            <li class="mdui-ripple typ-item"><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
        <?php endwhile; ?>
        <li class="mobie-head-search justCenter">
                <form class="m-s-input" action="" method="post">
                    <input type="text" name="s" placeholder="输入搜索关键字" />
                    <button class="justCenter btnclearDcss">
                        <i class="mdui-icon material-icons" style="font-size: 22px;color: gray;">search</i>
                    </button>
                </form>
        </li>
    </ul>
    <ul class="header-tab-1 header-tab-2" >
        <?php if($this->user->hasLogin()): ?>
                    <li><a href="<?php $this->options->adminUrl(); ?>">欢迎回来 <?php $this->user->screenName(); ?></a></li>
        <?php else: ?>
            <li class="loginBtn"><a href="<?php $this->options->adminUrl(); ?>">Login<i class="mdui-icon material-icons">expand_more</i></a></li>
        <?php endif; ?>
                    <a href="<?php $this->options->siteUrl(); ?>">
                        <li class="mobie-head"><?php $this->options->title() ?></li>
                    </a>
                    <li class="mdui-ripple" id="controlBtn">
                        <button class="mb-btn" id="open-Vmenu">
                            <i class="material-icons mdui-icon">details</i>
                        </button>
                        <button class="mb-btn mdui-ripple" id="open-hMenu">
                            <i class="mdui-icon material-icons">menu</i>
                        </button>
                    </li>
    </ul>
    <script>
        switchNow = 0;
        var mh = $('.mobie-head');
        $('#open-hMenu').click(function () {
            if (switchNow == 0){
                an_Move('header','0','160px','400ms');
                animateFor('#controlBtn','controlBtnSB','controlBtnSS');
                $('#controlBtn').find('i').eq(1).text('close');
                mh.css({display: 'none'});
                $('#open-Vmenu').attr('disabled',true);
                switchNow = 1;
            }else {
                an_Move('header','0','0','400ms');
                animateFor('#controlBtn','controlBtnSS','controlBtnSB');
                $('#controlBtn').find('i').eq(1).text('menu');
                mh.css({display: 'block'});
                $('#open-Vmenu').attr('disabled',false);
                switchNow = 0;
            }
        });
    </script>
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