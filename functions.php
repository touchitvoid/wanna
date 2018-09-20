<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $bgUrl = new Typecho_Widget_Helper_Form_Element_Text('bgUrl', NULL, NULL, _t('主题背景图片'), _t('填入外部链接来更新背景图片 , 默认使用 bg.jpg'));
    $form->addInput($bgUrl);

    $hIcon = new Typecho_Widget_Helper_Form_Element_Text('hIcon', NULL, NULL, _t('顶栏logo'), _t('填入外部链接来更新顶栏logo , 不填写则不会出现'));
    $form->addInput($hIcon);

    $logo = new Typecho_Widget_Helper_Form_Element_Text('logo', NULL, NULL, _t('侧边栏Logo'), _t('填入外部链接来更新Logo'));
    $form->addInput($logo);

    $icon = new Typecho_Widget_Helper_Form_Element_Text('icon', NULL, NULL, _t('网站图标'), _t('填入外部链接来更新icon'));
    $form->addInput($icon);

    $start_time = new Typecho_Widget_Helper_Form_Element_Text('start_time', NULL, NULL, _t('博客运行时间记录（开始时间）'), _t('格式 2018-04-10 00:00:00 务必一致'));
    $form->addInput($start_time);

    $pay = new Typecho_Widget_Helper_Form_Element_Text('pay', NULL, NULL, _t('赞赏二维码'), _t('推荐支付宝or微信二维码'));
    $form->addInput($pay);

    $copyright = new Typecho_Widget_Helper_Form_Element_Text('copyright', NULL, NULL, _t('copyright信息'), _t('默认为空'));
    $form->addInput($copyright);

    $comNum = new Typecho_Widget_Helper_Form_Element_Select('comNum', array(
        '6'=>'默认',
        '7'=>'7',
        '8'=>'8',
        '9'=>'6',
        '10'=>'10'
    ),'6',
        _t('最新评论调用条数'),_t('默认6'));
    $form->addInput($comNum->multiMode());


    $slimg = new Typecho_Widget_Helper_Form_Element_Select('slimg', array(
        'showon'=>'有图文章显示缩略图，无图文章随机显示缩略图',
        'Showimg' => '有图文章显示缩略图，无图文章只显示一张固定的缩略图',
        'showoff' => '有图文章显示缩略图，无图文章则不显示缩略图',
        'allsj' => '所有文章一律显示随机缩略图',
        'guanbi' => '关闭所有缩略图显示'
    ), 'showon',
        _t('缩略图设置'), _t('默认选择“有图文章显示缩略图，无图文章随机显示缩略图”'));
    $form->addInput($slimg->multiMode());


}
function comSize(){
    echo Typecho_Widget::widget('Widget_Options')->comSize;
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
    $dir = './usr/themes/wanna/img/random/';//随机缩略图目录
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

                    $ctu = './usr/themes/wanna/img/tag/' . $tag['slug'] . '.jpg';

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

// 设置时区
date_default_timezone_set('Asia/Shanghai');
/**
 * 秒转时间，格式 年 月 日 时 分 秒
 *
 * @author Roogle
 * @return html
 */
function getBuildTime($time){
    // 在下面按格式输入本站创建的时间
    $site_create_time = strtotime($time);
    $time = time() - $site_create_time;
    if(is_numeric($time)){
        $value = array(
            "years" => 0, "days" => 0, "hours" => 0,
            "minutes" => 0, "seconds" => 0,
        );
        if($time >= 31556926){
            $value["years"] = floor($time/31556926);
            $time = ($time%31556926);
        }
        if($time >= 86400){
            $value["days"] = floor($time/86400);
            $time = ($time%86400);
        }
        if($time >= 3600){
            $value["hours"] = floor($time/3600);
            $time = ($time%3600);
        }
        if($time >= 60){
            $value["minutes"] = floor($time/60);
            $time = ($time%60);
        }
        $value["seconds"] = floor($time);

        echo ''.$value['years'].'年'.$value['days'].'天'.$value['hours'].'小时'.$value['minutes'].'分';
    }else{
        echo '';
    }
}

function get_post_view($archive)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if(empty($views)){
            $views = array();
        }else{
            $views = explode(',', $views);
        }
        if(!in_array($cid,$views)){
            $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
        }
    }
    echo $row['views'];
}