<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="mdui-container sibi shadow-2 mdui-typo">
    <?php $this->comments()->to($comments); ?>
    <?php if($this->allow('comment')): ?>
        <div class="pageHead" id="<?php $this->respondId(); ?>">
                <h4><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h4>
                <div class="mdui-divider"></div>
                <div class="newBB mdui-col-md-12">
                    <form method="post" action="<?php $this->commentUrl() ?>" style="width: 100%" role="form" id="comment_form">
                     <?php if($this->user->hasLogin()): ?>
                                <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
                            <?php else: ?>
                         <div class="newCom">
                                <div class="mdui-textfield mdui-textfield-floating-label">
                                    <label class="mdui-textfield-label"><?php _e('称呼'); ?></label>
                                    <input class="mdui-textfield-input" type="text" name="author" required/>
                                </div>
                            </div>
                         <div class="newCom">
                                <div class="mdui-textfield mdui-textfield-floating-label">
                                    <label <?php if ($this->options->commentsRequireMail): ?> class="mdui-textfield-label"<?php endif; ?>><?php _e('Email'); ?></label>
                                    <input type="email" name="mail" class="mdui-textfield-input" <?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                                </div>
                            </div>
                     <?php endif; ?>
                        <div class="newCom">
                            <div class="mdui-textfield mdui-textfield-floating-label">
                                <label class="mdui-textfield-label"><?php _e('内容'); ?></label>
                                <textarea name="text" class="mdui-textfield-input" required ><?php $this->remember('text'); ?></textarea>
                            </div>
                        </div>
                            <div class="sendBtn">
                                <button class="mdui-btn mdui-btn-block mdui-color-pink" type="submit"><?php _e('<i class="mdui-icon material-icons">check</i>'); ?></button>
                            </div>
                    </form>
                 <?php else: ?>
                     <h3><?php _e('评论已关闭'); ?></h3>
                <?php endif; ?> <!-- 判断是否允许评论 -->
            </div>

            <?php while($comments->next()): ?>
            <div class="userBB mdui-col-md-12 shadow-1">
                <div class="colorBar"></div>
                <div class="userData" id="<?php $comments->responseId(); ?>">
                    <div class="userIcon">
                        <div class="userName">
                            <div class="name"><?php $comments->author(); ?></div>
                            <div class="Jurisdiction"><?php $comments->date('Y ,F jS'); ?>&nbsp<?php $comments->date('h:i'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="userBB-Content">
                    <?php $comments->content(); ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>