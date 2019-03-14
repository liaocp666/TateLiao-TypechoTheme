<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title><?php $this->archiveTitle(array(
            'category' => _t('分类 %s 下的文章'),
            'search' => _t('包含关键字 %s 的文章'),
            'tag' => _t('标签 %s 下的文章'),
            'author' => _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <?php if (!($this->options->siteicon == '')): ?>
        <link rel="icon" href="<?php $this->options->siteicon(); ?>" mce_href="<?php $this->options->siteicon(); ?>"
              type="image/x-icon">
        <link rel="shortcut icon" href="<?php $this->options->siteicon(); ?>"
              mce_href="<?php $this->options->siteicon(); ?>" type="image/x-icon">
    <?php endif; ?>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl(); ?>css/font.css"/>
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl(); ?>css/style-search.css"/>
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
    <link href="<?php $this->options->themeUrl(); ?>css/prism.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/venobox/1.8.5/venobox.min.css" rel="stylesheet">
    <link href="<?php $this->options->themeUrl(); ?>css/tateliao.css" type="text/css" rel="stylesheet"/>
    <style>
        .menu .site-title h1, .menu .site-title h2 {
        <?php getLogo(); ?>
        }
    </style>
</head>

<body>
<div id="wrapper">

    <header class="mb-top hidden-md hidden-lg">
        <div class="navbar-header">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
        </div>
        <div class="overlay" style="display: none;"></div>
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper"
             role="navigation">
            <ul class="nav sidebar-nav">
                <li role="presentation" class="active text-center">
                    <a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title() ?>"><span
                                class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;首页</a>
                </li>
                <?php if (!empty($this->options->menu) && in_array('shoFocusImg', $this->options->menu)): ?>
                    <?php $this->options->navbar() ?>
                <?php else: ?>
                    <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                    <?php while ($category->next()): ?>
                        <li role="presentation" class="text-center">
                            <a<?php if ($this->is('category', $category->slug)): ?> class="current"<?php endif; ?>
                                    href="<?php $category->permalink(); ?>"
                                    title="<?php $category->name(); ?>"><?php $category->name(); ?></a></li>
                    <?php endwhile; ?>
                <?php endif; ?>
                <li role="presentation" class="text-center">
                    <a href="javascript:searchClick()" title="搜索"><span class="glyphicon glyphicon-search"
                                                                        aria-hidden="true"></span></a>
                </li>
            </ul>
        </nav>
    </header>
    <!--头部-->
    <header class="pc-top">
        <!--菜单栏-->
        <div class="menu">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-md-1 hidden-xs hidden-sm">
                        <main class="site-title">
                            <a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title() ?>">
                                <?php if ($this->is('index')): ?>
                                    <h1><?php $this->options->title() ?></h1>
                                <?php else: ?>
                                    <h2><?php $this->options->title() ?></h2>
                                <?php endif; ?>
                            </a>
                        </main>
                    </div>
                    <nav class="col-md-11 menu-right  hidden-xs hidden-sm">
                        <div role="navigation">
                            <ul class="nav navbar-nav navbar-right">
                                <li role="presentation" class="active text-center">
                                    <a href="<?php $this->options->siteUrl(); ?>"
                                       title="<?php $this->options->title() ?>"><span class="glyphicon glyphicon-home"
                                                                                      aria-hidden="true"></span>&nbsp;&nbsp;首页</a>
                                </li>
                                <?php if (!empty($this->options->menu) && in_array('shoFocusImg', $this->options->menu)): ?>
                                    <?php $this->options->navbar() ?>
                                <?php else: ?>
                                    <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                                    <?php while ($category->next()): ?>
                                        <li role="presentation" class="text-center">
                                            <a<?php if ($this->is('category', $category->slug)): ?> class="current"<?php endif; ?>
                                                    href="<?php $category->permalink(); ?>"
                                                    title="<?php $category->name(); ?>"><?php $category->name(); ?></a>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <li role="presentation" class="text-center">
                                    <a href="javascript:searchClick()" title="搜索"><span
                                                class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                                </li>
                                <!--<li role="presentation" class="active">
									<a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title() ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;首页</a>
								</li>
								<li role="presentation">
									<a href="https://www.tateliao.me/code/" title="代码"><span class="glyphicon glyphicon-console" aria-hidden="true"></span>&nbsp;&nbsp;代码</a>
								</li>
								<li role="presentation">
									<a href="https://www.tateliao.me/share/" title="分享"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>&nbsp;&nbsp;分享</a>
								</li>
								<li role="presentation">
									<a href="https://www.tateliao.me/essay/" title="生活"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span>&nbsp;&nbsp;生活</a>
								</li>
								<li role="presentation">
									<a href="https://www.tateliao.me/archive.html" title="归档"><span class="glyphicon glyphicon-sort-by-order" aria-hidden="true"></span>&nbsp;&nbsp;归档</a>
								</li>
								<li role="presentation">
									<a href="https://www.tateliao.me/links.html" title="友链"><span class="glyphicon glyphicon-link" aria-hidden="true"></span>&nbsp;&nbsp;友链</a>
								</li>
								<li role="presentation">
									<a href="https://www.tateliao.me/about.html" title="关于"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;关于</a>
								</li>
								<li role="presentation">
									<a href="javascript:searchClick()" title="搜索"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
								</li>-->
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!--菜单栏-->

        <!--搜索页面-->
        <div id="search" style="display: none;">
            <canvas id="canvas" width="1280" height="1024"> 您的浏览器不支持canvas标签，请您更换浏览器</canvas>
            <p id="offscreen-text" class="offscreen-text"></p>
            <p id="text" class="text"></p>
            <div id="d" class="webdesigntuts-workshop">
						<span>
					    	<form action="" method="post" id="sear">
					    		<input name="s" class="input" id="input" type="search" placeholder="请输入您要搜索的内容"/>
					    		<button onclick="c();">搜索一下</button><br/>
					    	</form>
						<button onclick="closeSearch();" class="closeSearch">取消搜索</button>
						</span>
            </div>
        </div>
        <!--搜索页面-->
    </header>
    <!--头部-->