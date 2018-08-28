<?php
/**
 * 需要关闭 “垃圾评论保护” 和 “检查评论来源页 URL 是否与文章链接一致”
 *
 * @package snow
 * @author Void
 * @version 1.2
 * @link http://typecho.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
    <div class="blogBody mdui-container-fluid">
        <div class="vContainer">
            <div class="mdui-row">
                <div class="left-page-list mdui-col-md-8 .mdui-col-lg-12" id="qwq">
                    <?php while($this->next()): ?>
                    <div class="pageTag shadow-5">
                        <div class="cardImage">
                            <a href="<?php $this->permalink() ?>">
                                <?php if($this->options->slimg && 'guanbi'==$this->options->slimg): ?>
                                <?php else: ?>
                                    <?php if($this->options->slimg && 'showoff'==$this->options->slimg): ?><a href="<?php $this->permalink() ?>" ><?php showThumbnail($this); ?></a>
                                    <?php else: ?>
                                        <div class="cardImage-img" style="background-image: url('<?php showThumbnail($this); ?>')"></div>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <div class="readMore">
                                    <div><i class="mdui-icon material-icons">keyboard_arrow_left</i></div>
                                    <div class="sqReadMore"></div>
                                </div>
                            </a>
                            <div class="hiddenSquare"></div>
                        </div>
                        <div class="cardContent">
                            <div class="mdui-text-truncate pageCard-data">
                                <a><?php $this->author(); ?></a>&nbsp
                                <a><?php $this->date(); ?></a>&nbsp
                                <a><?php $this->category(','); ?></a>
                            </div>
                            <div class="pageCard-excerpt">
                                <div class="pageTitle">
                                    <h4><?php $this->title() ?></h4>
                                </div>
                                <p><?php $this->excerpt(50,'...'); ?></p>
                            </div>
                            <div class="ovo">
                                <a href="<?php $this->permalink() ?>">Link</a>
                                <div class="ovo-icon">
                                    <div class="dataIcon mdui-ripple">
                                        Comments
                                        <span style="margin: 0 3px">:</span>
                                        <span><?php $this->commentsNum('%d'); ?></span>
                                    </div>
                                    <div class="dataIcon mdui-ripple">
                                        Views
                                        <span style="margin: 0 3px">:</span>
                                        <span><?php get_post_view($this) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?><!--循环输出文章-->
                    <div class="nav-position">
                        <div class="nav">
                            <?php $this->pageNav('<i class="mdui-icon material-icons">keyboard_arrow_left</i>', '<i class="mdui-icon material-icons">&#xe315;</i>',0, '...', 'wrapTag=ul&wrapClass=page-navigator&itemTag=li&textTag=span&tClass=current&prevClass=prev&nextClass=next'); ?>
                        </div>
                    </div>
                </div>
                <div class="right-pageTagMenu mdui-col-md-4">
                    <div class="vBox">
                        <div class="control shadow-2">
                            <div class="sortBy">
                                <div>
                                    <button class="mdui-btn mdui-ripple flexTag" value="0">最新回复</button>
                                    <div class="cat cat1"></div>
                                </div>
                                <div>
                                    <button class="mdui-btn mdui-ripple flexTag" value="1">最新文章</button>
                                </div>
                                <div>
                                    <button class="mdui-btn mdui-ripple flexTag" value="2">文章分类</button>
                                </div>
                            </div>
                            <div class="colorBar"></div>
                            <div>
                                <div class="tabCard firstTabCard">
                                    <div class="boaCon marCenter">
                                        <ul class="reply-comments">
                                            <?php
                                            $this->widget('Widget_Comments_Recent','pageSize='.Typecho_Widget::widget('Widget_Options')->comNum)->to($comments);
                                            ?>
                                            <?php while($comments->next()): ?>
                                                <li>
                                                    <?php $comments->gravatar('50', ''); ?>
                                                    <div class="newCom-data">
                                                        <h6><?php $comments->author(false); ?></h6>
                                                        <p><?php $comments->excerpt(15, '...'); ?></p>
                                                        <a href="<?php $comments->permalink(); ?>" class="com-readmore">
                                                            <button class="mdui-btn mdui-btn-icon mdui-ripple">
                                                                <i class="mdui-icon material-icons" style="font-size: 18px">&#xe5c8;</i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tabCard">
                                    <?php
                                    $recent = $this->widget('Widget_Contents_Post_Recent','pageSize=5');
                                    if($recent->have()):
                                        while($recent->next()):
                                            ?>
                                            <div class="nextNewPage">
                                                <a href="<?php $recent->permalink(); ?>" class="newPageTile">
                                                    <div><?php $recent->title();?></div>
                                                </a>
                                                <div class="newPageItem-Data">
                                                    <span><?php $recent->date(); ?></span>
                                                    <span class="mdui-float-right nextNewPageData">
                                            <i class="mdui-icon material-icons">drafts</i>
                                            <a><?php $recent->commentsNum('%d'); ?></a>
                                                         </span>
                                                </div>

                                            </div>
                                        <?php endwhile; endif;?>
                                </div>
                                <div class="tabCard">
                                    <ul class="classList mdui-list">
                                        <?php $this->widget('Widget_Metas_Category_List')
                                            ->parse('<li class="mdui-list-item"><a href="{permalink}">{name}</a>&nbsp<span class="classListItem-num">({count})</span></li>'); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $this->need('footer.php'); ?>