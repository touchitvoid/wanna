<?php
/**
 * 简单的线条及彩色
 *
 * @package snow
 * @author Void
 * @version 0.1
 * @link http://typecho.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
    <div class="mdui-container-fluid blogBody">
        <div class="bg-ovo"></div>
    <div class="left-page-list mdui-col-md-8">
        <div class="nice">
            <div class="mdui-typo">
                <h4><?php $this->options->title() ?></h4>
                <p><?php $this->options->description() ?></p>
            </div>
        </div>
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

                            <div class="readMore" mdui-tooltip="{content: '阅读全文'}">
                                <div><i class="mdui-icon material-icons">keyboard_arrow_left</i></div>
                                <div class="sqReadMore"></div>
                            </div>
                        </a>
                        <div class="hiddenSquare"></div>
                    </div>
                    <div class="cardContent">
                        <div class="mdui-typo">
                            <h4><?php $this->title() ?></h4>
                            <div style="margin-bottom: 10px">
                                作者：<a><?php $this->author(); ?></a>&nbsp
                                时间：<a><?php $this->date('F j, Y'); ?></a>&nbsp
                                标签：<a><?php $this->category(','); ?></a>
                            </div>
                            <p style="font-size: 0.92em"><?php $this->excerpt(50,'...'); ?></p>
                        </div>
                        <div class="ovo">
                            <div class="ovo-icon">
                                <div class="dataIcon mdui-ripple">
                                    <i class="mdui-icon material-icons">check</i>
                                    <span style="margin: 0 3px">:</span>
                                    <span><?php $this->commentsNum('%d'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php endwhile; ?><!--循环输出文章-->
        <div class="nav-position">
            <div class="nav">
                <?php $this->pageNav('<i class="mdui-icon material-icons">keyboard_arrow_left</i>', '<i class="mdui-icon material-icons">&#xe315;</i>'); ?>
            </div>
        </div>
            </div>
        <div class="right-pageTagMenu mdui-col-md-3 mdui-col-offset-md-1">
            <div class="vBox">
                <div class="control shadow-2">
                    <div class="search">
                        <div class="searchBtn justCenter">
                            <i class="mdui-icon material-icons">search</i>
                        </div>
                        <div class="searchColor"></div>
                        <form action="" method="post">
                            <input type="text" name="s" placeholder="搜索内容" class="searchInput" autocomplete="off" />
                        </form>
                    </div>
                    <div class="mdui-divider control-border"></div>
                    <div class="mdui-typo">
                        <h4>I'm crying</h4>
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
                                <h5>最新回复</h5>
                                <div class="boaCon marCenter">
                                    <ul>
                                        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
                                        <?php while($comments->next()): ?>
                                            <li><?php $comments->author(false); ?>: <a href="<?php $comments->permalink(); ?>"><?php $comments->excerpt(15, '...'); ?></a></li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="tabCard">
                                <?php
                                $recent = $this->widget('Widget_Contents_Post_Recent','pageSize=10');
                                if($recent->have()):
                                    while($recent->next()):
                                        ?>
                                    <div class="nextNewPage">
                                        <a href="<?php $recent->permalink(); ?>">
                                            <div><?php $recent->title();?></div>
                                        </a>
                                        <span><?php $recent->date('Y/F/j') ?></span>
                                        <span class="mdui-float-right nextNewPageData">
                                            <i class="mdui-icon material-icons">check</i>
                                            Com：<a><?php $recent->commentsNum('%d'); ?></a>
                                        </span>
                                    </div>
                                    <?php endwhile; endif;?>
                            </div>
                            <div class="tabCard">
                                    <h5>文章分类</h5>
                                <ul>
                                    <?php $this->widget('Widget_Metas_Category_List')
                                        ->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        foo = false;
        $(window).scroll(function () {
            var sS = document.documentElement.scrollTop;
            var sSs = window.innerHeight;
            var ssr = sS+sSs;
            var sH = document.documentElement.scrollHeight;
            console.log(sS+' '+sSs+'>>'+sH);
            console.log(ssr);
            console.log('foo :'+foo);
            if (ssr === sH && foo == false){
                $('footer').stop(true,false).animate({
                    opacity : '1',
                    bottom : '0'
                },function () {
                    foo = true;
                })
            }else if (ssr < (sH-60) && foo == true){
                $('footer').stop(true,false).animate({
                    opacity : '0',
                    bottom : '-50px'
                },function () {
                    foo = false;
                })
            }
        })
    </script>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>