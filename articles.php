<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
/**
 * 归档页面
 *
 * @package custom
 */
$this->need('header.php'); ?>
    <!--内容-->

    <article class="content post">
        <div class="container no-padding">
            <div class="row">
                <div class="col-md-8">

                    <?php while ($this->next()): ?>
                        <div class="item clearfix">
                            <div class="post-place item-content ">
                                <span style="color: #FFA500;">当前位置</span>：<span class="
glyphicon glyphicon-home" aria-hidden="true"></span><a href="<?php $this->options->siteUrl(); ?>"
                                                       title="<?php $this->options->title() ?>">首页</a>
                                &raquo; <?php $this->category(); ?>
                                &raquo; <?php if (!empty($this->options->Breadcrumbs) && in_array('Text', $this->options->Breadcrumbs)): ?>正文<?php else: $this->title(); endif; ?>
                            </div>
                            <div class="item-content page-content post-content clearfix">
                                <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
                                $year = 0;
                                $mon = 0;
                                $i = 0;
                                $j = 0;
                                $output = '<div class="post-content cf">';
                                while ($archives->next()):
                                    $year_tmp = date('Y', $archives->created);
                                    $mon_tmp = date('m', $archives->created);
                                    $y = $year;
                                    $m = $mon;
                                    if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
                                    if ($year != $year_tmp && $year > 0) $output .= '</ul>';
                                    if ($year != $year_tmp) {
                                        $year = $year_tmp;
                                        $output .= '<h3>' . $year . ' 年</h3><ul>';
                                    }
                                    if ($mon != $mon_tmp) {
                                        $mon = $mon_tmp;
                                        $output .= '<li><span>' . $year . ' 年' . $mon . ' 月</span><ul>';
                                    }
                                    $output .= '<li>' . date('d日: ', $archives->created) . '<a href="' . $archives->permalink . '">' . $archives->title . '</a> (' . $archives->commentsNum . ')</li>';
                                endwhile;
                                $output .= '</ul></li></ul></div>';
                                echo $output;
                                ?>
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