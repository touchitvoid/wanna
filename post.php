<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<!--<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php /*$this->permalink() */?>"><?php /*$this->title() */?></a></h1>
        <ul class="post-meta">
            <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php /*_e('作者: '); */?><a itemprop="name" href="<?php /*$this->author->permalink(); */?>" rel="author"><?php /*$this->author(); */?></a></li>
            <li><?php /*_e('时间: '); */?><time datetime="<?php /*$this->date('c'); */?>" itemprop="datePublished"><?php /*$this->date(); */?></time></li>
            <li><?php /*_e('分类: '); */?><?php /*$this->category(','); */?></li>
        </ul>
        <div class="post-content" itemprop="articleBody">
            <?php /*$this->content(); */?>
        </div>
        <p itemprop="keywords" class="tags"><?php /*_e('标签: '); */?><?php /*$this->tags(', ', true, 'none'); */?></p>
    </article>

    <?php /*$this->need('comments.php'); */?>

    <ul class="post-near">
        <li>上一篇: <?php /*$this->thePrev('%s','没有了'); */?></li>
        <li>下一篇: <?php /*$this->theNext('%s','没有了'); */?></li>
    </ul>
</div>-->

<div class="mdui-container pageBody shadow-2">
    <div class="mdui-typo pageHead">
        <button class="iLike mdui-ripple mdui-color-pink">
            <i class="mdui-icon material-icons">favorite</i>
        </button>
        <h3><?php $this->title() ?></h3>
        <span>Author : <a><?php $this->author() ?></a></span>
        <span>Date : <?php $this->date('F j, Y'); ?></span>
        <div class="taptap">
            <span><i class="mdui-icon material-icons">check</i>View：<a><?php $this->commentsNum('%d Comments'); ?></a></span>
            <span><i class="mdui-icon material-icons">favorite</i>Like：<a>2</a></span>
            <span><i class="mdui-icon material-icons">change_history</i>Tags：<?php $this->category(','); ?></span>
        </div>
    </div>
    <div class="mdui-divider" style="margin: 10px 0"></div>
    <div class="mdui-typo pageContent">
        <h4>test</h4>
        <p><?php $this->content('Continue Reading...'); ?></p>
    </div>
</div>

<?php $this->need('comments.php'); ?>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
