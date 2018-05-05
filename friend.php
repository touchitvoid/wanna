<?php
/**
 *  友链
 *
 * @package custom
 *
 */
    $this->need('header.php');
?>
<div class="mdui-container-fluid">

    <!-- 在我后面添加代码 -->
    <a href="博客链接">
        <div class="linksCard">
            <div class="colorBG"></div>
            <div class="linkCon">
                <img src="头像地址">
                <div class="links-text">
                    <div class="blogName">博客名字</div>
                    <div class="blog-emmm">描述</div>
                </div>
            </div>
        </div>
    </a>
    <a href="博客链接">
        <div class="linksCard">
            <div class="colorBG"></div>
            <div class="linkCon">
                <img src="头像地址">
                <div class="links-text">
                    <div class="blogName">博客名字</div>
                    <div class="blog-emmm">描述</div>
                </div>
            </div>
        </div>
    </a>
    <a href="博客链接">
        <div class="linksCard">
            <div class="colorBG"></div>
            <div class="linkCon">
                <img src="头像地址">
                <div class="links-text">
                    <div class="blogName">博客名字</div>
                    <div class="blog-emmm">描述</div>
                </div>
            </div>
        </div>
    </a>
    <!-- 在我上面添加代码 -->

    <script>
            if(!/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
                var links = $('body').find('.linksCard');
                setTimeout(function () {
                    for (var i = 0;i <links.length;i++){
                        var num = Math.floor(Math.random()*300)+30;
                        links.eq(i).animate({
                            marginLeft : num+'px'
                        })
                    }
                },200);
            }
    </script>
</div>
<?php $this->need('footer.php'); ?>