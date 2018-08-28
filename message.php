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
    <div class="vContainer">
        <div class="mdui-row">
            <div class="mdui-col-md-12 i-tell-content mdui-typo borR5px">
                <div class="mdui-row">
                    <div class="can-you-Tell-me mdui-col-md-12"></div>
                </div>
                <h4 style="padding-left: 8px">能和我说说话吗#笑</h4>
                <div class="colorBar" style="width: 95%;margin: 0 auto;margin-top: 25px;"></div>
                <div class="tellYou">
                    <?php $this->need('comments.php')  ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->need('footer.php')  ?>
