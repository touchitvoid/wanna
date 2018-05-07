<?php
/**
 *  留言板
 *
 * @package custom
 *
 */
$this->need('header.php');
?>

<div class="mdui-container i-tellYou">
    <div class="can-you-Tell-me mdui-col-md-12">

    </div>
    <div class="mdui-col-md-12 i-tell-content mdui-typo">
        <h4>能和我说说话吗#笑</h4>
        <div class="colorBar" style="width: 95%;margin: 0 auto;margin-top: 25px;"></div>
        <div class="tellYou">
            <?php $this->need('comments.php')  ?>
        </div>
    </div>
</div>
<?php $this->need('footer.php')  ?>
