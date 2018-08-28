<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<style>
    #body {
        display: block !important;
    }
</style>
<div class="mdui-container">
    <div class="vContainer">
        <div class="mdui-row">
            <div class="pageBody mdui-col-md-10 mdui-col-offset-md-1 shadow-2 borR5px" style="margin-top: 20px">
                <div class="mdui-typo pageHead">
                    <h3><?php $this->title() ?></h3>
                    <div class="taptap">
                        <div>
                            <span><i class="mdui-icon material-icons">check</i>评论：<a><?php $this->commentsNum('%d  条'); ?></a></span>
                            <span><i class="mdui-icon material-icons">remove_red_eye</i>浏览量：<a><?php get_post_view($this) ?></a></span>
                            <span><i class="mdui-icon material-icons">change_history</i>Tags：<?php $this->category(','); ?></span>
                        </div>
                        <div class="pageDataRight">
                <span>
                    作者 : <a><?php $this->author() ?></a></span>
                            <span>
                    <i class="mdui-icon material-icons">date_range</i>日期 : <?php $this->date(); ?></span>
                        </div>

                    </div>
                </div>
                <div class="mdui-divider" style="margin: 10px 0"></div>
                <div class="mdui-typo pageContent">
                    <h4></h4>
                    <p><?php $this->content('Continue Reading...'); ?></p>
                </div>
                <div class="pay justCenter">
                    <button class="mdui-ripple mdui-btn shadow-1 payBtn" mdui-dialog="{target: '#payImg'}">
                        <i class="mdui-icon material-icons" style="font-size: 18px">favorite</i> 赞赏
                </div>
                <div class="mdui-divider"></div>
                <div class="nextPrev">
                    <div>
                        <i class="mdui-icon material-icons">chevron_left</i>
                        <?php $this->theNext('%s','<a>哇 没了</a>'); ?>
                    </div>
                    <span id='theFlexBor'></span>
                    <div>
                        <?php $this->thePrev('%s','<a>哇 没了</a>'); ?>
                        <i class="mdui-icon material-icons">chevron_right</i>
                    </div>
                </div>
                <div class="mdui-dialog justCenter" id="payImg">
                    <img src='<?php echo $this->options->pay ?>' width="100%" />
                </div>
            </div>
        </div>
        <div class="mdui-row">
            <div class="mdui-row">
                <div class="mdui-col-md-10 mdui-col-offset-md-1">
                    <?php $this->need('comments.php'); ?>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $this->need('footer.php'); ?>
