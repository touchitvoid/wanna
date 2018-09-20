<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<footer class="mdui-container-fluid shadow-1">
    <div class="mdui-row">
        <div class="mdui-col-md-4">
            <p>Powered by <a href="http://icry.info/">Void</a></p>
            <p>Theme: <a href="http://icry.info/">typecho-theme-wanna</a></p>
            <p><?php getBuildTime(Typecho_Widget::widget('Widget_Options')->start_time);  ?></p>
        </div>
        <div class="mdui-col-md-4">
            <div id="yy520"></div>
            <p>
                <?php Typecho_Widget::widget('Widget_Options')->copyright();  ?>
            </p>
        </div>
    </div>
    <script>
        fetch('https://v1.hitokoto.cn')
            .then(function (res){
                return res.json();
            })
            .then(function (data) {
                var hitokoto = document.getElementById('yy520');
                hitokoto.innerText = data.hitokoto;
            })
            .catch(function (err) {
                console.error(err);
            });
        $(document).pjax('#body a,#header a,#vMenu a','#body',{
            fragment: '#body',
            timeout : '50000'
        });
        $(document).off('pjax:send').on('pjax:send',function () {
           $('.pjax-load').css({display:'flex'});
        });
        $(document).off('pjax:complete').on('pjax:complete',function () {
            $('.pjax-load').css({display:'none'});
            mdui.mutation();
            reload();
        })
    </script>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
        </div>
<?php $this->need('sidebar.php'); ?>
    </body>
</html>