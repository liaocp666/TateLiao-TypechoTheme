<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!--底部-->
<footer class="footer">
    <div class="container no-padding">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    &copy; 2018&nbsp;-&nbsp;<?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><span
                                style="color:#fff"><?php $this->options->title(); ?></a></span>&nbsp;&nbsp;
                    <?php _e('<a href="http://www.typecho.org">Powered by <span style="color:#fff">Typecho</span></a>'); ?>
                    &nbsp;&nbsp;<?php _e('<a href="https://www.tateliao.me/">Theme By <span style="color:#fff">TateLiao</span></a>'); ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--底部-->
</div>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl(); ?>js/word.js"></script>
<script type="text/javascript" src="https://npmcdn.com/headroom.js@0.9.3/dist/headroom.min.js"></script>
<script src="<?php $this->options->themeUrl(); ?>js/prism.js"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl(); ?>js/blazy.min.js"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl(); ?>js/jquery.goup.min.js"></script>
<script src="https://cdn.bootcss.com/venobox/1.8.5/venobox.min.js"></script>
<script src="https://cdn.bootcss.com/instantclick/3.0.1/instantclick.min.js"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl(); ?>js/tateliao.js"></script>
<script data-no-instant>
    //提交搜索
    function c() {
        $('#sear').submit();
    }
    InstantClick.init();
</script>
<script>
</script>
</body>

</html>