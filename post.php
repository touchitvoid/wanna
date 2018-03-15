<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="mdui-container pageBody shadow-2">
    <div class="bg-ovo"></div>
    <div class="mdui-typo pageHead">
        <h3><?php $this->title() ?></h3>
        <span>Author : <a><?php $this->author() ?></a></span>
        <span>Date : <?php $this->date('F j, Y'); ?></span>
        <div class="taptap">
            <span><i class="mdui-icon material-icons">check</i>View：<a><?php $this->commentsNum('%d Comments'); ?></a></span>
            <span><i class="mdui-icon material-icons">favorite</i>Like：<a>2</a></span>
            <span><i class="mdui-icon material-icons">change_history</i>Tags：<?php $this->category(','); ?></span>
        </div>
    </div>
    <div class="mdui-divider" style="margin: 10px 0"></div>
    <div class="mdui-typo pageContent">
        <h4>test</h4>
        <p><?php $this->content('Continue Reading...'); ?></p>
    </div>
</div>

<?php $this->need('comments.php'); ?>
<?php $this->need('sidebar.php'); ?>
