<?php
/**
 *  友链
 *
 * @package custom
 *
 */
    $this->need('header.php');
?>
<div class="mdui-container-fluid" style="margin: 0">
    <!-- 在我后面添加代码 -->
    <?php $this->content('Continue Reading...'); ?>
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