<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
error_reporting(0);
function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);
     $boyName = new Typecho_Widget_Helper_Form_Element_Text('boyName', NULL, '小劣博客', _t('男孩昵称'), _t('在这里填入男孩的昵称，需与作者昵称一致'));
    $form->addInput($boyName);
     $boyDes = new Typecho_Widget_Helper_Form_Element_Textarea('boyDes', NULL,'我们活在现在，就应该为现在实实在在的生活或者学习努力。不为模糊不清的未来担心，只为清清楚楚的现在努力。', _t('男孩语录'), _t('男孩子的爱情宣言'));
    $form->addInput($boyDes);
     $girlName = new Typecho_Widget_Helper_Form_Element_Text('girlName', NULL, '小劣博客2', _t('女孩昵称'), _t('在这里填入女孩的昵称，需与作者昵称一致'));
    $form->addInput($girlName);
    $grilDes = new Typecho_Widget_Helper_Form_Element_Textarea('grilDes', NULL,'我们活在现在，就应该为现在实实在在的生活或者学习努力。不为模糊不清的未来担心，只为清清楚楚的现在努力。', _t('女孩语录'), _t('女孩子的爱情宣言'));
    $form->addInput($grilDes);
   $IndexNum = new Typecho_Widget_Helper_Form_Element_Text('IndexNum', NULL, '180', _t('首页文章摘要字数'), _t('填入你想要截取的摘要长度'));
    $form->addInput($IndexNum);
    $bannertitle = new Typecho_Widget_Helper_Form_Element_Text('bannertitle', NULL, 'Record Our Love Story With Words', _t('Banner标题'), _t('在这里填入主页面的banner标题'));
    $form->addInput($bannertitle);
    $bannercontent = new Typecho_Widget_Helper_Form_Element_Textarea('bannercontent', NULL,'欢迎来到Mr.H与Mrs.C的情侣博客，这里是我们在互联网的“窝”，这里有技术的学习笔记，也有好看的博客模板，更有我们的爱情故事，如果你喜欢我们的情侣博客，记得留言与我们互动哟！', _t('Banner内容'), _t('在这里填入主页面的banner内容'));
    $form->addInput($bannercontent);
    $footericp = new Typecho_Widget_Helper_Form_Element_Text('footericp', NULL,'晋ICP备14007273号', _t('网站备案号'), _t('在这里填入你的备案号，例如：晋ICP备14007273号'));
    $form->addInput($footericp);
    $SideDate = new Typecho_Widget_Helper_Form_Element_Text('SideDate', NULL, '2016,8,19', _t('建站日期'), _t('格式：年,月,日，例如：2016,8,19'));
    $form->addInput($SideDate);
     
     $ArcNum = new Typecho_Widget_Helper_Form_Element_Text('ArcNum', NULL, '400', _t('搜索，作者，分类页面文章摘要字数'), _t('填入你想要截取的摘要长度'));
    $form->addInput($ArcNum);
    
     $SidebannerBox = new Typecho_Widget_Helper_Form_Element_Textarea('SidebannerBox', NULL,'广告招租', _t('侧边栏底部广告位'), _t('插播广告'));
    $form->addInput($SidebannerBox);
    $SideLinks = new Typecho_Widget_Helper_Form_Element_Textarea('SideLinks', NULL,NULL, _t('底部友情链接'), _t('网站名,网址，描述，每个网站一行，用逗号分隔，例如：小劣博客，http://mxsky.cn，小劣的个人博客'));
    $form->addInput($SideLinks);
    $PagesLinks = new Typecho_Widget_Helper_Form_Element_Textarea('PagesLinks', NULL,NULL, _t('自定义友情链接页'), _t('网站名,网址，描述，每个网站一行，用逗号分隔，例如：小劣博客，http://mxsky.cn，小劣的个人博客'));
    $form->addInput($PagesLinks);
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array(
    'ShowRecentContents' => _t('显示最新文章'),
    'ShowRandPosts' => _t('显示随机文章'),
    'ShowSideTags' => _t('显示标签云'),
    'ShowSideBox' => _t('显示侧栏广告')),
    array('ShowRecentContents', 'ShowRandPosts', 'ShowSideTags','ShowSideBox'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
}


function sidelink($links){
//侧边栏友情链接
if(empty($links)){
echo "虚位以待|虚位以待";
}else{
$str = str_replace("，",",",$links);
$array = explode("\r\n", $str);
foreach($array as $arr){
$arr2[] = explode(",", $arr);
}
foreach($arr2 as $v){
echo '
<li>
		<a rel="friend" href="'.$v[1].'" title="'.$v[2].'" target="_blank">'.$v[0].'</a>
	</li>
';
}
}
}
function pageslink($links){
//自定义I页面友情链接
if(empty($links)){
echo "虚位以待|虚位以待";
}else{
$str = str_replace("，",",",$links);
$array = explode("\r\n", $str);
foreach($array as $arr){
$arr2[] = explode(",", $arr);
}
foreach($arr2 as $v){
echo '
<li>
		  <a rel="friend" href="'.$v[1].'" title="'.$v[2].'" target="_blank"><em>'.$v[0].'</em></a>
	</li>
';
}
}
}


//随机文章

function theme_random_posts(){
$defaults = array(
'number' => 10,
'before' => '<ul id="randlog">',
'after' => '</ul>',
'xformat' => '<li><i>{unm}</i><a href="{permalink}" title="{title}" target="_blank">{title}</a></li>'
);
$db = Typecho_Db::get();
 
$sql = $db->select()->from('table.contents')
->where('status = ?','publish')
->where('type = ?', 'post')
->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
->limit($defaults['number'])
->order('RAND()');
 
$result = $db->fetchAll($sql);
echo $defaults['before'];
$i=0;
foreach($result as $val){
$i++;
$val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
echo str_replace(array('{unm}','{permalink}', '{title}'),array($i,$val['permalink'], $val['title']), $defaults['xformat']);
}
echo $defaults['after'];
}




//文章缩略图
function img_postthumb($cid) {
$db = Typecho_Db::get();
$rs = $db->fetchRow($db->select('table.contents.text')
->from('table.contents')
->where('table.contents.cid=?', $cid)
->order('table.contents.cid', Typecho_Db::SORT_ASC)
->limit(1));
 
preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $rs['text'], $thumbUrl);  //通过正则式获取图片地址
$img_src = $thumbUrl[1][0];  //将赋值给img_src
$img_counter = count($thumbUrl[0]);  //一个src地址的计数器
 
switch ($img_counter > 0) {
case $allPics = 1:
echo '
<img src="'.$img_src.'"  />
';  //当找到一个src地址的时候，输出缩略图
break;
default:
echo '';  //没找到(默认情况下)，不输出任何内容
};
}

//获得读者墙   
function getFriendWall()      
{      
    $db = Typecho_Db::get();      
   $sql = $db->select('COUNT(author) AS cnt', 'author', 'url', 'mail')      
              ->from('table.comments')      
              ->where('status = ?', 'approved')      
              ->where('type = ?', 'comment')      
             ->where('authorId = ?', '0')      
              ->where('mail != ?', 'admin@94ids.com')   //排除自己上墙   
              ->group('author')      
              ->order('cnt', Typecho_Db::SORT_DESC)      
              ->limit('15');    //读取几位用户的信息     
    $result = $db->fetchAll($sql);      
    
    if (count($result) > 0) {      
        $maxNum = $result[0]['cnt'];      
        foreach ($result as $value) {      
            $mostactive .= '<li><a target="_blank" rel="nofollow" href="' . $value['url'] . '"><span class="pic" style="background: url(http://1.gravatar.com/avatar/'.md5(strtolower($value['mail'])).'?s=36&d=&r=G) no-repeat; "></span><em>' . $value['author'] . '</em><strong>+' . $value['cnt'] . '</strong><br />' . $value['url'] . '</a></li>';          
        }      
        echo $mostactive;      
    }      
}  

//侧边栏


/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/
