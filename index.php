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
    <div class="left-page-list mdui-col-md-9">
<?php while($this->next()): ?>
                <div class="pageTag shadow-5">
                    <div class="cardImage">
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
                            <a><?php $this->author(); ?></a>&nbsp<a><?php $this->date('F j, Y'); ?></a>&nbsp;<a><?php $this->category(','); ?></a>
                            <p><?php $this->content('Continue Reading...'); ?></p>
                        </div>
                        <div class="ovo">
                            <div class="ovo-icon">
                                <div class="dataIcon mdui-ripple">
                                    <i class="mdui-icon material-icons">favorite</i>
                                    <span style="margin: 0 3px">:</span>
                                    <span>123</span>
                                </div>
                            </div>
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
<?php endwhile; ?>
            </div>
        <div class="right-pageTagMenu mdui-col-md-3">
            <div class="vBox" style="margin: 0">
                <div class="control shadow-5">
                    <div class="mdui-textfield mdui-textfield-expandable">
                        <button class="mdui-textfield-icon mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></button>
                        <input class="mdui-textfield-input" type="text" placeholder="Search"/>
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
                            <h4>公告</h4>
                            <div class="boaCon marCenter shadow-1">
                                You can call my name
                            </div>
                        </div>
                        <div class="nextPage">
                            <span class="changePageBtn mdui-ripple">
                                <i class="mdui-icon material-icons">keyboard_arrow_left</i>
                            </span>
                            <span id="pageNum">PageNum : 0</span>
                            <span class="changePageBtn mdui-ripple">
                                <i class="mdui-icon material-icons">&#xe315;</i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>