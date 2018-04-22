<?php
/**
 *  友链
 *
 * @package custom
 *
 */
    $this->need('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="mdui-container-fluid">
    <div class="linksCard">
        <div class="colorBG"></div>
        <div class="linkCon">
            <img src="http://img.hb.aicdn.com/678ee4b76426af06d7cf69c58b0ffa441b856528425c2-60yPCk_fw658" title="未加载">
            <div class="links-text">
                <div class="blogName">Void</div>
                <div class="blog-emmm">我是一个友情链接</div>
            </div>
        </div>
    </div>
    <script>
            var links = $('body').find('.linksCard');
            setTimeout(function () {
                for (var i = 0;i <links.length;i++){
                    var num = Math.floor(Math.random()*300)+30;
                    links.eq(i).animate({
                        marginLeft : num+'px'
                    })
                }
            },200);
    </script>
</div>
<?php $this->need('footer.php'); ?>

</body>
</html>