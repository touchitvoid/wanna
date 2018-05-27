<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="vMenu" id="vMenu">
    <div class="vMenu-onBtn" id="vMenu-onbtn">
        <i class="mdui-icon material-icons">arrow_forward</i>
    </div>
    <ul class="small-vMenu-list" id="smallMenu">
        <a href="<?php $this->options->siteUrl(); ?>index.php/pagefile.html">
            <li class="mdui-ripple">
            <i class="mdui-icon material-icons">book</i>
            </li>
        </a>
        <a>
            <li class="mdui-ripple">
                <i class="mdui-icon material-icons">build</i>
            </li>
        </a>
        <a href="<?php $this->options->feedUrl(); ?>">
            <li class="mdui-ripple">
                <i class="mdui-icon material-icons">rss_feed</i>
            </li>
        </a>
        <a href="https://github.com/touchitvoid">
            <li class="mdui-ripple">
                <i class="mdui-icon material-icons">details</i>
            </li>
        </a>
    </ul>
    <div class="v-menu-assembly-1">
        <div class="Blog-logo">
            <div class="iam-img" id="logo"></div>
            <div class="iam-t mdui-typo">
                <h5><?php $this->options->title() ?></h5>
                <p><?php $this->options->description() ?></p>
            </div>
        </div>
    </div>
    <div class="v-menu-assembly-2">
        <ul class="vMenu-item-list">
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
                <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><li class="mdui-ripple"><?php $pages->title(); ?></li></a>
            <?php endwhile; ?>
            <a href="<?php $this->options->feedUrl(); ?>"><li class="mdui-ripple">RSS</li></a>
        </ul>
    </div>
</div>
<script>
    $('.iam-img').css({
        backgroundImage : "url("+logo+")"
    });
</script>