<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<footer>
    Powered By Void <a>©touchitvoid</a> ovo 2018 已经安稳的运行了<?php getBuildTime($this->options->start_time) ?>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
        </div>
<?php $this->need('sidebar.php'); ?>
    </body>
</html>