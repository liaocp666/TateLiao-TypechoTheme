<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
    <!--内容-->
    <article class="content">
        <?php $this->need('banner.php'); ?>
        <div class="container post no-padding">
            <div class="row">
                <div class="col-md-8">

                    <?php while ($this->next()): ?>
                        <div class="item clearfix item-an">
                            <div class="post-place item-content ">
                                <span style="color: #FFA500;">当前位置</span>：<span class="
glyphicon glyphicon-home" aria-hidden="true"></span><a href="<?php $this->options->siteUrl(); ?>"
                                                       title="<?php $this->options->title() ?>">首页</a>
                                &raquo; <?php $this->category(); ?>
                                &raquo; <?php if (!empty($this->options->Breadcrumbs) && in_array('Text', $this->options->Breadcrumbs)): ?>正文<?php else: $this->title(); endif; ?>
                            </div>
                            <div class="item-content page-content post-content clearfix">
                                <?php $this->content(); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <div class="item clearfix">
                        <div class="item-content">
                            <?php $this->need('comments.php'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php $this->need('sidebar.php'); ?>
                </div>
            </div>

        </div>
    </article>
    <!--内容-->
<?php $this->need('footer.php'); ?>