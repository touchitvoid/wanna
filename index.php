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
                        <div class="cardImage-img"></div>

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
    <?php endwhile; ?><!--循环输出评论-->
        <div class="nav-position">
            <div class="nav">
                <?php $this->pageNav('<i class="mdui-icon material-icons">keyboard_arrow_left</i>', '<i class="mdui-icon material-icons">&#xe315;</i>'); ?>
            </div>
        </div>
            </div>
        <div class="right-pageTagMenu mdui-col-md-3 mdui-col-offset-md-1">
            <div class="vBox">
                <div class="control shadow-2">
                    <div class="mdui-textfield mdui-textfield-expandable">
                        <button class="mdui-textfield-icon mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></button>
                        <input class="mdui-textfield-input" type="text" placeholder="搜索"/>
                        <button class="mdui-textfield-close mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">close</i></button>
                    </div>
                    <div class="mdui-divider control-border"></div>
                    <div class="mdui-typo">
                        <h4>Now!</h4>
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
                        <div class="mdui-typo">
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
                                <div class="page-tag-switch">
                                    <button class="swBtn" id="pre-newPageBtn"><i class="mdui-icon material-icons">keyboard_arrow_left</i></button>
                                    <button class="swBtn position-ab-right" id="next-newPageBtn"><i class="mdui-icon material-icons">keyboard_arrow_right</i></button>
                                    <div class="swImg-arr">
                                        <?php
                                        $obj = $this->widget('Widget_Contents_Post_Recent');
                                        if($obj->have()){
                                            while($obj->next()){
                                                echo "<a href=$obj->permalink><div class='swImg'>";
                                                $obj->title();
                                                echo '<div class="author">';
                                                echo '作者 : ';$obj->author();
                                                echo '</div>';
                                                echo '</div></a>';
                                            }
                                        }else{
                                            echo '无最新文章';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <script>
                                imgPos = 0;
                                function getImgArrlength() {
                                    imgs = $('.swImg').length;
                                    if (imgs > 5){
                                        imgs = 4;
                                    }else if (imgs < 6){
                                        imgs = imgs-1;
                                    }
                                    return imgs
                                }
                                function isStartEnd() {

                                }
                                for (var i = 0;i < getImgArrlength();i++){
                                    var imgNum = Math.floor(Math.random()*5);
                                    $('.swImg-arr').find('.swImg').eq(i).css({
                                        backgroundImage : "url(/usr/themes/wanna/img/newPageimg"+imgNum+".jpg)"
                                    })
                                }
                                $('#next-newPageBtn').click(function () {
                                    if (imgPos >= 0 && imgPos < getImgArrlength()){
                                        $('.swImg-arr').animate({
                                            right : '+=100%'
                                        });
                                        imgPos = imgPos+1;
                                    }else if (imgPos == 0){
                                        mdui.snackbar({
                                            message : '没有更早的了',
                                            position : 'right-bottom'
                                        })
                                    }
                                });
                                $('#pre-newPageBtn').click(function () {
                                    if (imgPos != 0 && imgPos > 0){
                                        $('.swImg-arr').animate({
                                            right : '-=100%'
                                        });
                                        imgPos = imgPos - 1;

                                    }else if (imgPos == 0){
                                        mdui.snackbar({
                                            message : '没有更早的了',
                                            position : 'right-bottom'
                                        })
                                    }
                                });
                                $('.swBtn').click(function () {
                                    console.log('imgPos:'+imgPos+'imgs:'+imgs);
                                })
                            </script>
                            <div class="tabCard">
                                    <h5>文章分类</h5>
                                <ul>
                                    <?php $this->widget('Widget_Metas_Category_List')
                                        ->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
                                </ul>

                            </div>
                        </div>
                        <script>
                            $('.flexTag').click(function () {
                                nowCard = $(this).val();
                                $('.cat').remove();
                                $(this).after('<div class="cat"></div>');
                                $('.cat').animate({
                                    top : '0',
                                    opacity : '1'
                                });
                                allHidden();
                                $('.tabCard').eq(nowCard).css({
                                    display : 'block'
                                })
                            });
                            function allHidden() {
                                $('.tabCard').css({
                                    display : 'none'
                                })
                            }
                        </script>
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