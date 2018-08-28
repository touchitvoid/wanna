<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<style>
    .pageBody {
        padding-bottom: 30px;
        margin-bottom: 30px;
        flex: 1;
        background: none;
    }
    .pageBody .vContainer {
        background: white;
        padding: 16px;
        box-sizing: border-box;
    }
</style>
<div class="mdui-container pageBody">
    <div class="vContainer shadow-2 borR5px">'
        <div class="mdui-row">
            <div class="mdui-typo pageHead">
                <?php $this->title() ?>
                <div class="taptap">
                    <div>
                        <span>浏览量：<a><?php get_post_view($this) ?></a></span>
                        <span><?php $this->date(); ?></span>
                        <a><?php $this->author() ?></a></span>
                    </div>
                </div>
            </div>
            <div class="mdui-divider" style="margin: 10px 0"></div>
            <div class="mdui-typo pageContent">
                <p><?php $this->content('Continue Reading...'); ?></p>
            </div>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>
