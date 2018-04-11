<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="mdui-container sibi shadow-2 mdui-typo">
    <?php $this->comments()->to($comments); ?>
    <?php if($this->allow('comment')): ?>
        <div class="pageHead" id="<?php $this->respondId(); ?>">
                <h4><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h4>
                <div class="mdui-divider" style="margin: 15px 0"></div>
                <div class="newBB mdui-col-md-12">
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
        </div>
            <div class="comments">
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