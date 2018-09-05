<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="vMenu shadow-1" id="vMenu">
    <div class="v-menu-assembly">
        <div class="Blog-logo">
            <div class="iam-img" id="logo"></div>
            <div class="iam-t">
                <span><?php $this->options->title() ?></span>
                <p><?php $this->options->description() ?></p>
            </div>
        </div>
    </div>
    <div class="colorBar" style="margin: 0 auto;margin-bottom: 24px;width: 100px"></div>
    <div class="v-menu-assembly">
        <ul class="vMenu-item-list">
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
                <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><li class="mdui-ripple"><?php $pages->title(); ?></li></a>
            <?php endwhile; ?>
            <a href="<?php $this->options->feedUrl(); ?>"><li class="mdui-ripple">RSS</li></a>
        </ul>
    </div>
</div>
<div class="overlay"></div>
<script>
    $('.iam-img').css({
        backgroundImage : "url("+logo+")"
    });
</script>