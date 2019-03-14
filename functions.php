<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $siteicon = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('<h2>网站相关</h2>网站 favicon 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标签页前加上一个图标'));
    $form->addInput($siteicon);

    $siteLogo = new Typecho_Widget_Helper_Form_Element_Text('siteLogo', NULL, NULL, _t('网站 logo 地址(170x70)'), _t('在这里填入一个图片 URL 地址, 以在网站导航栏显示此logo。为空则显示站点标题'));
    $form->addInput($siteLogo);

    $avatar = new Typecho_Widget_Helper_Form_Element_Text('avatar', NULL, NULL, _t('<h2>侧边栏设置</h2>博主头像(100x100)'), _t('在这里填入一个图片 URL 地址, 以在侧边栏显示博主头像'));
    $form->addInput($avatar);

    $hitokoto = new Typecho_Widget_Helper_Form_Element_Checkbox('hitokoto',
        array('showHitokoto' => _t('使用一言(调用<a href="https://hitokoto.cn/" tager="_blank">一言API</a>自动生成一段文字)')),
        array('showHitokoto'), _t('博主介绍'));
    $form->addInput($hitokoto->multiMode());

    $recommend = new Typecho_Widget_Helper_Form_Element_Textarea('recommend', null, null, _t('自我介绍'), _t('<span style="color:red">如果要使其有效，请关闭使用一言</span>'));
    $form->addInput($recommend);

    $linkHome = new Typecho_Widget_Helper_Form_Element_Checkbox('linkHome',
        array('showHome' => _t('是否全站显示(默认首页显示)')),
        array('showHome'), _t('友情链接'));
    $form->addInput($linkHome->multiMode());

    $linksContent = new Typecho_Widget_Helper_Form_Element_Textarea('linksContent', null, null, _t('友链列表'), _t('每条友链用"@"符合分割<br />每条友链信息应该包含：<span style="color:red">标题#友链地址</span>，这些元素，每个元素用"#"分割<br />例如下面两条友链：<br /><span style="color:red">廖先生博客#https://www.tateliao.me/@Usmusic#https://www.tateliao.me/@廖先生博客</span>'));
    $form->addInput($linksContent);

    $menu = new Typecho_Widget_Helper_Form_Element_Checkbox('menu',
        array('shoFocusImg' => _t('是否显示')),
        array('shoFocusImg'), _t('<h2>导航栏</h2>个性化导航栏'));
    $form->addInput($menu->multiMode());

    $navbar = new Typecho_Widget_Helper_Form_Element_Textarea('navbar', null, null, _t('导航列表'), _t('如果要使其有效，请开启上方显示，然后<span style="color:red">请复制下面代码，更改填入</span><br />如果需要显示图标字体，请访问<a href="https://v3.bootcss.com/components/#glyphicons" target="_blank">Glyphicons 字体图标</a>，对应修改<b>span标签里的class代码</b><br><xmp><li role="presentation"></xmp><xmp><a href="http://localhost/typecho/" title="廖先生博客"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;首页</a></xmp><xmp></li></xmp>'));
    $form->addInput($navbar);

    $focusImg = new Typecho_Widget_Helper_Form_Element_Checkbox('focusImg',
        array('shoFocusImg' => _t('是否显示轮播')),
        array('shoFocusImg'), _t('<h2>轮播图</h2>轮播图显示'));
    $form->addInput($focusImg->multiMode());

    $SlideImg = new Typecho_Widget_Helper_Form_Element_Textarea('SlideImg', NULL, NULL, _t('轮播图列表(1920x500)'), _t('每条轮播图信息用"<span style="color:red">@</span>"符合分割<br />每条轮播图信息应该包含：<span style="color:red">标题#跳转地址#图片地址#摘要</span>，这些元素，每个元素用"#"分割<br />例如下面的2条轮播图信息：<br /><span style="color:red">对有些事，需要睁一只眼闭一只眼，这是智慧#https://www.tateliao.me/#http://localhost/typecho/usr/themes/TateLiao/img/1.jpg#一直执着于生命的简约格调，只愿用一颗淡然的心看云卷云舒，看季节更迭。许多不合时节的事物，必然会被光阴遗落，就像曾经繁茂的秋叶，待生命枯竭，终将脱离叶脉的相系相牵。@缘起则聚，缘灭则散#https://www.tateliao.me/#http://localhost/typecho/usr/themes/TateLiao/img/2.jpg#夜，结束了一天的喧嚣后安静下来，伴随着远处路灯那微弱的光。风，毫无预兆地席卷整片旷野，撩动人的思绪万千。星，遥遥地挂在天空之中，闪烁着它那微微星光，不如阳光般灿烂却如花儿般如痴如醉。</span>'));
    $SlideImg->input->setAttribute('style', 'height:250px;resize:both;');
    $form->addInput($SlideImg);

}

//调用轮播图
/*function SlideImg($classifys = NULL) {
    $options = Typecho_Widget::widget('Widget_Options');
    if ($options->SlideImg) {
        $list2 = explode("\r\n", $options->SlideImg);
        foreach ($list2 as $tmp) {
            list($title, $posturl, $imgurl, $classify) = explode(',', $tmp);
            if (!isset($classifys) || $classifys == "") {
                echo '<div class="section" style="background-image: url('.$imgurl.');">
                            <h3><a href="'.$posturl.'">'.$title.'</a></h3>
                        </div>';
            } else {
                $arr2 = explode(",", $classifys);
                for($i = 0; $i < count($arr2); $i++) {
                    if($arr2[$i] === $classify) {
                        echo '<div class="section" style="background-image: url('.$imgurl.');">
                            <h3><a href="'.$posturl.'">'.$title.'</a></h3>
                        </div>';
                    }
                }
            }
        }
    } else {
        echo '<div class="section" style="background:#000;">
                            <h3><a>&nbsp;-&nbsp;未设置轮播图，请先设置&nbsp;-&nbsp;</a></h3>
                        </div>';
    }
}*/

//轮播图指示器
function getFacusImgIndicators()
{
    $options = Typecho_Widget::widget('Widget_Options');
    if ($options->SlideImg) {
        $list = explode("@", $options->SlideImg);
        $arrlength = count($list);
        for ($x = 0; $x < $arrlength; $x++) {
            if ($x == 0) {
                echo '<button data-target="#focusimg" data-slide-to="0" class="active"></button>';
            } else {
                echo '<button data-target="#focusimg" data-slide-to="' . $x . '"></button>';
            }
        }
    } else {
        echo '';
    }
}

/**
 * 输出轮播图
 */
function getFacusImg()
{
    $options = Typecho_Widget::widget('Widget_Options');
    if ($options->SlideImg) {
        $list = explode("@", $options->SlideImg);
        $arrlength = count($list);
        for ($x = 0; $x < $arrlength; $x++) {
            list($title, $posturl, $imgurl, $more) = explode('#', $list[$x]);
            if ($x == 0) {
                echo '<div class="item active">
					<img class="img-responsive b-lazy" src="' . $options->themeUrl . '/img/load.jpg" data-src="' . $imgurl . '" alt="' . $title . '">
					<div class="carousel-caption">
						<a href="' . $posturl . '" title="' . $title . '"><h3>' . $title . '</h3></a>
						<a class="hidden-xs hidden-sm" href="' . $posturl . '"><p>' . $more . '</p></a>
					</div>
				</div>';
            } else {
                echo '<div class="item">
					<img class="img-responsive b-lazy" src="' . $options->themeUrl . '/img/load.jpg" data-src="' . $imgurl . '" alt="' . $title . '">
					<div class="carousel-caption">
						<a href="' . $posturl . '" title="' . $title . '"><h3>' . $title . '</h3></a>
						<a class="hidden-xs hidden-sm" href="' . $posturl . '"><p>' . $more . '</p></a>
					</div>
				</div>';
            }
        }
    } else {
        echo '';
    }
}

/**
 * 输出友情链接
 */
function linksContent()
{
    $options = Typecho_Widget::widget('Widget_Options');
    $list = explode("@", $options->linksContent);
    $arrlength = count($list);
    for ($x = 0; $x < $arrlength; $x++) {
        list($title, $siteUrl) = explode('#', $list[$x]);

        if ($x % 2 == 0) {
            echo '<tr>';
        }
        echo '<td><a href="' . $siteUrl . '" title="' . $title . '" target="_blank">' . $title . '</a></td>';
        if (($x - 1) % 2 == 0) {
            echo '</tr>';
        }
    }
}

/**
 * 得到网站logo
 */
function getLogo()
{
    $options = Typecho_Widget::widget('Widget_Options');
    if (!empty($options->siteLogo)) {
        echo 'background: url("' . $options->siteLogo . '") center center no-repeat;
			        ';
    } else {
        echo 'background: none;
				    text-indent: 0;
				    font-size: 20px;
				    font-weight: 400;
				    color: #fff;';
    }
}

/**
 * 查询标签总数
 */
function getTagCount()
{
    $db = Typecho_Db::get();
    $widget = new Widget_Metas_Tag_Cloud(new Typecho_Request(), new Typecho_Response());
    // 查询
    $select = $widget->select()->where('type = ?', 'tag');
    $tags = $db->fetchAll($select, [$widget, 'push']); // 获取上级评论对象
    return count($tags);
}

/**
 * 获取随机图片
 */
function getThumbnail($article)
{
    // 当文章无图片时的默认缩略图
    $pattern = '/<img[\s\S]*?src\s*=\s*[\"|\'](.*?)[\"|\'][\s\S]*?>/';
    preg_match_all($pattern, $article->content, $matches);
    if (isset($matches[1][0])) {
        $thumb = $matches[1][0];
    } else {
        $ran = mt_rand(1, 10);
        $thumb = $article->widget('Widget_Options')->themeUrl . '/img/thumbnail/' . $ran . '.jpg'; // 随机图片
    }
    return $thumb;
}

?>
