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
<div class="sibi borR5px shadow-2 mdui-typo">
    <?php $this->comments()->to($comments); ?>
    <?php if($this->allow('comment')): ?>
    <div class="pageHead" id="<?php $this->respondId(); ?>">
        <h4><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h4>
        <div class="mdui-divider" style="margin: 15px 0"></div>
    </div>
    <div class="newBB mdui-row">
        <div class="replyId smallSize" id="replyId">正在回复给 <span class="reply-name"></span>&nbsp<span class="replyCon"></span></div>
        <div class="mdui-row">
            <form method="post" action="<?php $this->commentUrl() ?>" style="width: 100%" role="form" id="comment_form">
                <?php if($this->user->hasLogin()): ?>
                    <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo; </a></p>
                <?php else: ?>
                    <a class="smallSize" href="<?php $this->options->adminUrl(); ?>">去登陆?</a>
                    <div class="userIC">
                        <div class="mdui-col-xs-12 mdui-col-md-3 getData-input" id="userName">
                            <input type="text" placeholder="昵称" name="author" value="<?php $this->remember('author'); ?>" required />
                        </div>
                        <div class="mdui-col-xs-12 mdui-col-md-4 getData-input" id="mail">
                            <input type="email" placeholder="邮箱" name="mail" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                        </div>
                        <div class="mdui-col-xs-12 mdui-col-md-4 getData-input" id="urls">
                            <input type="text" name="url" id="urls" placeholder="http://" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>/>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="mdui-col-xs-12 mdui-col-md-12 getData-input" id="content">
                    <textarea name="text" id="textarea" class="textarea" placeholder="评论内容" required ><?php $this->remember('text'); ?></textarea>
                </div>
                <div class="mdui-col-xs-12 mdui-col-md-2" id="subBtn">
                    <button class="mdui-ripple" type="submit">提交评论</button>
                </div>
            </form>
        </div>
        <?php else: ?>
            <h3><?php _e('评论已关闭'); ?></h3>
        <?php endif; ?> <!-- 判断是否允许评论 -->
    </div>
    <div class="mdui-row comFiled">
        <div class="mdui-col-md-8">
            <?php $comments->listComments(); ?>
        </div>
        <div class="mdui-col-md-4 comTool">
            <h4>标签云</h4>
            <div class="tags">
                <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
                <?php if($tags->have()): ?>
                <ul class="tags-list">
                    <?php while ($tags->next()): ?>
                        <li class="mdui-ripple"><a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count(); ?> 个话题"><?php $tags->name(); ?></a></li>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <li><?php _e('没有任何标签'); ?></li>
                    <?php endif; ?>
                </ul>
            </div>
            <h4>文章留名</h4>
            <div class="visitor">
                <?php while($comments->next()): ?>
                <div style="display: inline-block">
                    <?php $comments->gravatar('45', ''); ?>
                    <div class="visitorName">
                        <?php $comments->author(); ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <script>
                $('.visitor > div').mouseover(function () {
                    $(this).attr('title',$(this).find('.visitorName').text());
                })
            </script>
        </div>
    </div>
    <?php function threadedComments($comments, $options) {
        $commentClass = '';
        if ($comments->authorId) {
            if ($comments->authorId == $comments->ownerId) {
                $commentClass .= ' comment-by-author';
            } else {
                $commentClass .= ' comment-by-user';
            }
        }
        $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';
        ?>

        <div class="userBB" id="<?php $comments->theId(); ?>">
            <div class="replyTools">
                    <button class="mdui-btn mdui-btn-icon mdui-ripple replyBtn">
                        <i class="mdui-icon material-icons">reply</i>
                        <?php $comments->reply(''); ?>
                    </button>
            </div>
            <div class="userData">
                <div class="userIcon">
                    <?php $comments->gravatar('60', ''); ?>
                </div>
                <div class="userName">
                    <div class="name"><?php $comments->author(); ?></div>
                    <div class="Jurisdiction"><?php $comments->date('Y - m - d H : i'); ?></div>
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
        <div style="clear: both"></div>

    <?php } ?>
</div>
