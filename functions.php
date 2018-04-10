<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());

    $slimg = new Typecho_Widget_Helper_Form_Element_Select('slimg', array(
        'showon'=>'有图文章显示缩略图，无图文章随机显示缩略图',
        'Showimg' => '有图文章显示缩略图，无图文章只显示一张固定的缩略图',
        'showoff' => '有图文章显示缩略图，无图文章则不显示缩略图',
        'allsj' => '所有文章一律显示随机缩略图',
        'guanbi' => '关闭所有缩略图显示'
    ), 'showon',
        _t('缩略图设置'), _t('默认选择“有图文章显示缩略图，无图文章随机显示缩略图”'));

}
// 自定义关键字
function themeFields($layout) {
    $thumb = new Typecho_Widget_Helper_Form_Element_Text('thumb', NULL, NULL, _t('自定义缩略图'), _t('输入缩略图地址(仅文章有效)'));
    $layout->addItem($thumb);
}
/** 输出文章缩略图 */
function showThumbnail($widget)
{
    // 当文章无图片时的默认缩略图
    $dir = './usr/themes/yodu/img/sj/';//随机缩略图目录
    $n= sizeof(scandir($dir))-2;
    if($n <= 0){
        $n=5;
    }// 异常处理，干掉自动判断图片数量的功能，切换至手动
    $rand = rand(1,$n);
    // 随机 n张缩略图

    $random = $widget->widget('Widget_Options')->themeUrl . '/img/random/' . $rand . '.jpg'; // 随机缩略图路径
    if(Typecho_Widget::widget('Widget_Options')->slimg && 'Showimg'==Typecho_Widget::widget('Widget_Options')->slimg
    ){
        $random = $widget->widget('Widget_Options')->themeUrl . '/img/test.jpg'; //无图时只显示固定一张缩略图
    }

    $cai = '';//这里可以添加图片后缀，例如七牛的缩略图裁剪规则，这里默认为空
    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i';
    $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i';
    if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
        $ctu = $thumbUrl[1][0].$cai;
    }

//如果是内联式markdown格式的图片
    else   if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
        $ctu = $thumbUrl[1][0].$cai;
    }
    //如果是脚注式markdown格式的图片
    else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
        $ctu = $thumbUrl[1][0].$cai;
    }

    else
        if ($attach && $attach->isImage) {

            $ctu = $attach->url.$cai;
        }
        else

            if ($widget->tags) {
                foreach ($widget->tags as $tag) {

                    $ctu = './usr/themes/yodu/img/tag/' . $tag['slug'] . '.jpg';

                    if(is_file($ctu))
                    {
                        $ctu = $widget->widget('Widget_Options')->themeUrl . '/img/tag/' . $tag['slug'] . '.jpg';
                    }
                    else
                    {
                        $ctu = $random;
                    }
                    break;
                }
            }
            else {
                $ctu = $random;
            }
    if(Typecho_Widget::widget('Widget_Options')->slimg && 'showoff'==Typecho_Widget::widget('Widget_Options')->slimg
    ){
        if($widget->fields->thumb){$ctu = $widget->fields->thumb;}
        if($ctu== $random)
            echo '';
        else
            if($widget->is('post')||$widget->is('page')){
                echo $ctu;
            }else{
                echo '<img src="'
                    .$ctu.
                    '">';
            }
    }else{
        if($widget->fields->thumb){$ctu = $widget->fields->thumb;}
        if(!$widget->is('post')&&!$widget->is('page')){
            if(Typecho_Widget::widget('Widget_Options')->slimg && 'allsj'==Typecho_Widget::widget('Widget_Options')->slimg
            ){$ctu = $random;}
        }
        echo $ctu;
    }
}

/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/

