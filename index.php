<?php
/**
 * 这是 廖先生博客 自用的一套主题
 *
 * @package TateLiao Theme
 * @author TateLiao
 * @version 1.0
 * @link https"//www.tateliao.me/"
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
    <!--内容-->
    <article class="content">
        <?php $this->need('banner.php'); ?>
        <div class="container no-padding">
            <div class="row">
                <div class="col-md-8">
                    <?php while ($this->next()): ?>
                        <div class="item clearfix item-an">
                            <figure class="thumbnail pull-left">
                                <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
                                    <?php if (isset($this->fields->img)): ?>
                                        <img class="img-responsive b-lazy" data-src="<?php echo $this->fields->img() ?>"
                                             src="<?php $this->options->themeUrl(); ?>img/load.jpg"
                                             alt="<?php $this->title() ?>"/>
                                    <?php else: ?>
                                        <img class="img-responsive b-lazy"
                                             src="<?php $this->options->themeUrl(); ?>img/load.jpg"
                                             data-src="<?php echo getThumbnail($this); ?>"
                                             alt="<?php $this->title() ?>">';
                                    <?php endif; ?>
                                </a>
                            </figure>
                            <div class="item-content clearfix">
                                <header class="item-title">
                                    <a itemprop="url" href="<?php $this->permalink() ?>"
                                       title="<?php $this->title() ?>">
                                        <h2><?php $this->title() ?></h2></a>
                                    <div class="meta">
                                        <span><i class="glyphicon glyphicon-time" aria-hidden="true"
                                                 itemprop="datePublished"></i>&nbsp;&nbsp;<time><?php $this->date(); ?></time></span>
                                        <span itemprop="author" class="hidden-xs hidden-sm"><i
                                                    class="glyphicon glyphicon-user " aria-hidden="true"></i>&nbsp;&nbsp;<a
                                                    itemprop="name" href="<?php $this->author->permalink(); ?>"
                                                    rel="author"><?php $this->author(); ?></a></span>
                                        <span class="hidden-xs hidden-sm"><i class="glyphicon glyphicon-folder-open"
                                                                             aria-hidden="true"></i>&nbsp;&nbsp;<?php $this->category(','); ?></span>
                                    </div>
                                </header>
                                <div class="more hidden-xs hidden-sm">
                                    <p><?php $this->excerpt(90, ' ...'); ?>
                                    </p>
                                </div>
                                <div class="item-tags hidden-xs hidden-sm clearfix">
                                    <?php $this->tags('', true, ''); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <nav aria-label="Page navigation">
                        <?php $this->pageNav('&laquo;', ' &raquo;', 4, '...', ['wrapTag' => 'ul', 'wrapClass' => 'pagination']); ?>
                    </nav>
                </div>
                <div class="col-md-4">
                    <?php $this->need('sidebar.php'); ?>
                </div>
            </div>
        </div>
    </article>
    <!--内容-->
<?php $this->need('footer.php'); ?>