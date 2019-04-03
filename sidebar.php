<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!--侧边栏-->
<aside class="sider">
    <section class="widget">
        <div class="widget-list widget-author">
            <figure class="avatar pull-left">
                <img class="img-responsive img-circle img-thumbnail b-lazy"
                     src="<?php $this->options->themeUrl(); ?>img/load.jpg"
                     data-src="<?php $this->options->avatar(); ?>" alt="<?php $this->author(); ?>">
            </figure>
            <div class="content clearfix">
                <div class="name">
                    <p><span class="identify btn btn-warning">博主</span><?php $this->author(); ?></p>
                </div>
                <div class="recommend">
                    <?php if (!empty($this->options->hitokoto) && in_array('showHitokoto', $this->options->hitokoto)): ?>
                        <p id="hitokoto">:D 获取中...</p>
                        <script src="https://v1.hitokoto.cn/?encode=js&select=%23hitokoto" defer></script>
                    <?php else: ?>
                        <p><?php $this->options->recommend(); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="widget">
        <h3 class="widget-title"><?php _e('最新文章'); ?></h3>
        <div class="widget-list new-post">
            <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=5')
                ->to($newPost) ?>
            <?php while ($newPost->next()): ?>
                <?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
                <div class="item clearfix">
                    <figure class="thumbnail pull-left">
                        <a href="<?php $newPost->permalink() ?>" title="<?php $newPost->title() ?>">
                            <?php if (isset($newPost->fields->img)): ?>
                                <img class="img-responsive b-lazy" data-src="<?php echo $newPost->fields->img() ?>"
                                     src="<?php $newPost->options->themeUrl(); ?>img/load.jpg"
                                     alt="<?php $newPost->title() ?>"/>
                            <?php else: ?>
                                <img class="img-responsive b-lazy"
                                     src="<?php $newPost->options->themeUrl(); ?>img/load.jpg"
                                     data-src="<?php echo getThumbnail($newPost); ?>"
                                     alt="<?php $newPost->title() ?>">';
                            <?php endif; ?>
                    </figure>
                    <div class="item-content clearfix">
                        <header class="item-title">
                            <a itemprop="url" href="<?php $newPost->permalink() ?>" title="<?php $newPost->title() ?>">
                                <h2><?php $newPost->title() ?></h2></a>
                            <div class="meta">
                                <span><i class="glyphicon glyphicon-time" aria-hidden="true"
                                         itemprop="datePublished"></i>&nbsp;&nbsp;<time><?php $newPost->date() ?></time></span>
                            </div>
                        </header>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
    <section class="widget">
        <h3 class="widget-title"><?php _e('最近回复'); ?></h3>
        <ul class="widget-list new-comment">
            <?php $this->widget('Widget_Comments_Recent', 'ignoreAuthor=true&pageSize=7')->to($comments); ?>
            <?php while ($comments->next()): ?>
                <?php
                if (defined('__TYPECHO_GRAVATAR_PREFIX__')) {
                    $gravatar = __TYPECHO_GRAVATAR_PREFIX__;
                } else {
                    // https://www.v2ex.com/t/141485
                    $gravatar = 'https://cdn.v2ex.com/gravatar/'; // 头像默认使用V2EX服务器
                }
                $size = '32';// 自定义头像大小
                $rating = Helper::options()->commentsAvatarRating;
                $hash = md5(strtolower($comments->mail));
                $avatarUrl = $gravatar . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
                // 防止html标签意外闭合而导致的页面布局混乱
                $text = str_replace(['<', '>', '"'], '', $comments->text);
                ?>
                <li><a class="comment-item" href="<?php $comments->permalink(); ?>"
                       title="<?php $comments->title(); ?>">
                        <img class="img-circle img-thumbnail b-lazy"
                             src="<?php $this->options->themeUrl(); ?>img/load.jpg" data-src="<?php echo $avatarUrl; ?>"
                             alt="<?php _e('评论头像'); ?>" width="32px" height="32px"><span><?php echo $text; ?></span>
                    </a></li>
            <?php endwhile; ?>
        </ul>
    </section>
    <section class="widget">
        <h3 class="widget-title"><?php _e('热门标签'); ?></h3>
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=60')->to($tags); ?>
        <ul class="widget-list tags-list">
            <?php while ($tags->next()): ?>
                <a href="<?php $tags->permalink(); ?>" title='<?php $tags->name(); ?>'><?php $tags->name(); ?></a>
            <?php endwhile; ?>
        </ul>
    </section>
    <?php if (!empty($this->options->linkHome) && in_array('showHome', $this->options->linkHome)): ?>
        <section class="widget">
            <h3 class="widget-title"><?php _e('友情链接'); ?></h3>
            <ul class="widget-list link-list">
                <table class="table table-bordered">
                    <tbody>
                    <?php linksContent(); ?>
                    </tbody>
                </table>
            </ul>
        </section>
    <?php else: ?>
        <?php if ($this->is('index')): ?>
            <section class="widget">
                <h3 class="widget-title"><?php _e('友情链接'); ?></h3>
                <ul class="widget-list link-list">
                    <table class="table table-bordered">
                        <tbody>
                        <?php linksContent(); ?>
                        </tbody>
                    </table>
                </ul>
            </section>
        <?php endif; ?>
    <?php endif; ?>
</aside>
<!--侧边栏-->