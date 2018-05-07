<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<footer>
    Powered By Void <a>©touchitvoid</a> ovo 2018 已经安稳的运行了<?php getBuildTime($this->options->start_time) ?>
    <script>
        $(document).pjax('#body a,#header a','#body',{
            fragment: '#body',
            timeout : '50000'
        });
        $(document).off('pjax:complete').on('pjax:complete',function () {
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