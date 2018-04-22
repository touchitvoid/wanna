<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
    <div class="mdui-container body-404">
        <div>呀，没有找到您想要的东西,一定是姿势不对不如试试搜索</div>
        <form method="post" class="findMore-404 getData-input"">
           <input placeholder="搜索内容( Enter确认 )" type="text" name="s" autofocus />
        </form>
    </div>
<?php $this->need('footer.php'); ?>
