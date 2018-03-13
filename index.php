<?php
/**
 * 灰白，简约的色彩，以及线条
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
    <?php while($this->next()): ?>
                <div class="pageTag shadow-5">
                    <div class="cardImage">
                        <div class="cardImage-img"></div>
                        <a href="<?php $this->permalink() ?>">
                            <div class="readMore">
                                <div><i class="mdui-icon material-icons">keyboard_arrow_left</i></div>
                                <div class="sqReadMore"></div>
                            </div>
                        </a>
                        <div class="hiddenSquare"></div>
                    </div>
                    <div class="cardContent">
                        <div class="mdui-typo">
                            <h4><?php $this->title() ?></h4>
                            作者：<a><?php $this->author(); ?></a>&nbsp
                            时间：<a><?php $this->date('F j, Y'); ?></a>&nbsp
                            标签：<a><?php $this->category(','); ?></a>
                            <p><?php $this->content('Continue Reading...'); ?></p>
                        </div>
                        <div class="ovo">
                            <div class="ovo-icon">
                                <div class="dataIcon mdui-ripple">
                                    <i class="mdui-icon material-icons">check</i>
                                    <span style="margin: 0 3px">:</span>
                                    <span><?php $this->commentsNum('%d Comments'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php endwhile; ?><!--循环输出评论-->
        <div class="nav-position">
            <div class="nav">
                <?php $this->pageNav('<i class="mdui-icon material-icons">keyboard_arrow_left</i>', '<i class="mdui-icon material-icons">&#xe315;</i>'); ?>
            </div>
        </div>
            </div>
        <div class="right-pageTagMenu mdui-col-md-3 mdui-col-offset-md-1">
            <div class="vBox">
                <div class="control borR5px shadow-2">
                    <div class="mdui-textfield mdui-textfield-expandable">
                        <button class="mdui-textfield-icon mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></button>
                        <input class="mdui-textfield-input" type="text" placeholder="搜索"/>
                        <button class="mdui-textfield-close mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">close</i></button>
                    </div>
                    <div class="mdui-divider control-border"></div>
                    <div class="mdui-typo">
                        <h4>排序</h4>
                        <div class="sortBy">
                            <button class="mdui-btn mdui-ripple">时间</button>
                            <button class="mdui-btn mdui-ripple">浏览量</button>
                            <button class="mdui-btn mdui-ripple">赞赏数</button>
                        </div>
                        <div class="colorBar"></div>
                        <div class="mdui-typo">
                            <h5>最新回复</h5>
                            <div class="boaCon marCenter">
                                <ul>
                                    <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
                                    <?php while($comments->next()): ?>
                                        <li><?php $comments->author(false); ?>: <a href="<?php $comments->permalink(); ?>"><?php $comments->excerpt(15, '...'); ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                            <div>
                                <h5>文章分类</h5>
                                <ul>
                                    <?php $this->widget('Widget_Metas_Category_List')
                                        ->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
                                </ul>
                            </div>
                        </div>
                        <!--<div class="nextPage">
                            <span class="changePageBtn mdui-ripple">
                                <i class="mdui-icon material-icons">keyboard_arrow_left</i>
                            </span>
                            <span id="pageNum">Num : 0</span>
                            <span class="changePageBtn mdui-ripple">
                                <i class="mdui-icon material-icons">&#xe315;</i>
                            </span>
                        </div>-->
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
            if (ssr > (sH-60) && foo == false){
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