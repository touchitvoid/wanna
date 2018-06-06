<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<style>
    .pageBody {
        padding-bottom: 30px;
        margin-bottom: 30px;
        flex: 1;
    }
</style>
<div class="mdui-container pageBody shadow-2 borR5px">
    <div class="mdui-typo pageHead">
        <h3><?php $this->title() ?></h3>
        <div class="taptap">
            <div>
                <span>浏览量：<a><?php get_post_view($this) ?></a></span>
                <span><?php $this->date('Y / F j'); ?></span>
                <a><?php $this->author() ?></a></span>
            </div>
        </div>
    </div>
    <div class="mdui-divider" style="margin: 10px 0"></div>
    <div class="mdui-typo pageContent">
        <p><?php $this->content('Continue Reading...'); ?></p>
    </div>
</div>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
