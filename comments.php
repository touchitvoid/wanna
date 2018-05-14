<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
if(is_array($_GET)&&count($_GET)>0)
{
    if(isset($_GET["replyTo"]))
    {
        $ac = $_GET["replyTo"];
        }
} ?>
<script>
    $(document).ready(function () {
        replyId = $('#comment-'+"<?php echo $ac; ?>");
        replyName =  replyId.find('.name:first > a').text();
        replyCon =  replyId.find('.userBB-Content:first > p').text();
        if (replyId !== ''){
            $('.replyId').fadeIn();
            $('.reply-name').text(replyName);
            $('.replyCon').text('" '+replyCon+' "');
        }else {
            $('.replyId').css({
                display : 'none'
            })
        }
    });
</script>
<div class="mdui-container sibi borR5px shadow-2 mdui-typo">
    <?php $this->comments()->to($comments); ?>
    <?php if($this->allow('comment')): ?>
    <div class="pageHead" id="<?php $this->respondId(); ?>">
        <h4><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h4>
        <div class="mdui-divider" style="margin: 15px 0"></div>
    </div>
    <div class="newBB">
        <div class="replyId" id="replyId">正在回复给 <span class="reply-name"></span>&nbsp<span class="replyCon"></span></div>
        <form method="post" action="<?php $this->commentUrl() ?>" style="width: 100%" role="form" id="comment_form">
            <?php if($this->user->hasLogin()): ?>
                <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo; </a></p>
            <?php else: ?>
                <div class="userIC">
                    <div class="mdui-col-xs-12 mdui-col-md-3 getData-input" id="userName">
                        <input type="text" placeholder="昵称" name="author" value="<?php $this->remember('author'); ?>" required />
                    </div>
                    <div class="mdui-col-xs-12 mdui-col-md-3 getData-input" id="mail">
                        <input type="email" placeholder="邮箱" name="mail" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                    </div>
                    <div class="mdui-col-xs-12 mdui-col-md-4 getData-input" id="urls">
                        <input type="text" name="url" id="urls" placeholder="http://" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>/>
                    </div>
                </div>
            <?php endif; ?>
            <div class="mdui-col-xs-12 mdui-col-md-10 getData-input" id="content">
                <textarea name="text" id="textarea" class="textarea" placeholder="评论内容" required ><?php $this->remember('text'); ?></textarea>
            </div>
            <div class="mdui-col-xs-12 mdui-col-md-2" id="subBtn">
                <button class="mdui-ripple" type="submit">提交评论</button>
            </div>
        </form>
        <?php else: ?>
            <h3><?php _e('评论已关闭'); ?></h3>
        <?php endif; ?> <!-- 判断是否允许评论 -->
    </div>
    <div class="comments">
        <?php $comments->listComments(); ?>
    </div>
    <div class="nextPrev">
        <div><i class="mdui-icon material-icons">chevron_left</i><?php $this->theNext('%s','哇 没了'); ?></div>
        <span id='theFlexBor'></span>
        <div><?php $this->thePrev('%s','哇 没了'); ?>
            <i class="mdui-icon material-icons">chevron_right</i>
        </div>
    </div>
    <?php function threadedComments($comments, $options) {
        $commentClass = '';
        if ($comments->authorId) {
            if ($comments->authorId == $comments->ownerId) {
                $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
            } else {
                $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
            }
        }
        $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
        ?>

        <div class="userBB mdui-col-md-<?php comSize(); ?>" id="<?php $comments->theId(); ?>">
            <div class="replyTools">
                    <button class="mdui-btn mdui-btn-icon mdui-ripple replyBtn">
                        <i class="mdui-icon material-icons">reply</i>
                        <?php $comments->reply('test'); ?>
                    </button>
            </div>
            <div class="colorBar"></div>
            <div class="userData">
                <div class="userIcon">
                    <?php $comments->gravatar('65', ''); ?>
                    <div class="userName">
                        <div class="name"><?php $comments->author(); ?></div>
                        <div class="Jurisdiction"><?php $comments->date('Y-m-d H:i'); ?></div>
                    </div>
                </div>
            </div>
            <div class="userBB-Content">
                <?php $comments->content(); ?>
            </div>
            <?php if ($comments->children) { ?>
                <div class="comment-children">
                    <?php $comments->threadedComments($options); ?>
                </div>
            <?php } ?>
        </div>

    <?php } ?>
</div>
