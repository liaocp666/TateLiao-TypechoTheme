<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<?php if ($this->is('index')): ?>
    <!--轮播图-->
    <?php if (!empty($this->options->focusImg) && in_array('shoFocusImg', $this->options->focusImg)): ?>
        <div class="banner">
            <div id="focusimg" class="carousel slide" data-ride="carousel">
                <div class="carousel-indicators">
                    <?php getFacusImgIndicators(); ?>
                </div>
                <div class="carousel-inner" role="listbox">
                    <?php getFacusImg(); ?>
                </div>
                <a class="left carousel-control" href="#focusimg" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#focusimg" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    <?php else: ?>
        <style>
            .menu {
                background: #111111;
            }
        </style>
        <div style="display: block;height: 70px;"></div>
    <?php endif; ?>
    <!--轮播图-->
<?php else: ?>
    <div class="banner post-banner">
        <div id="focusimg" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <?php if (isset($this->fields->img)): ?>
                        <img class="img-responsive b-lazy" data-src="<?php echo $this->fields->img() ?>"
                             src="<?php $this->options->themeUrl(); ?>img/load.jpg" alt="<?php $this->title() ?>"/>
                    <?php else: ?>
                        <img class="img-responsive b-lazy" src="<?php $this->options->themeUrl(); ?>img/load.jpg"
                             data-src="<?php echo getThumbnail($this); ?>" alt="<?php $this->title() ?>">
                    <?php endif; ?>
                    <div class="carousel-caption">
                        <?php if ($this->is('index')): ?>
                            <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
                                <h3><?php $this->title() ?></h3></a>
                        <?php endif; ?>
                        <?php if ($this->is('post')): ?>
                            <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
                                <h1><?php $this->title() ?></h1></a>
                        <?php endif; ?>
                        <?php if ($this->is('page')): ?>
                            <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
                                <h1><?php $this->title() ?></h1></a>
                        <?php endif; ?>
                        <?php if ($this->is('category')): ?>
                            <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
                                <h1><?php $this->category() ?></h1></a>
                            <p><?php echo $this->getDescription(); ?></p>
                        <?php endif; ?>
                        <?php if ($this->is('tag')): ?>
                            <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
                                <h1><?php $this->category() ?></h1></a>
                        <?php endif; ?>
                        <?php if ($this->is('search')): ?>
                            <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
                                <h1><?php $this->category() ?></h1></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--轮播图-->
<?php endif; ?>