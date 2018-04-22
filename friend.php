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

    <!-- 在我后面添加代码 -->

    <!-- 在我上面添加代码 -->

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