<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php $this->options->charset(); ?>">
	    <meta http-equiv="X-UA-Compatible" content="ie=EmulateIE9,chrome=1">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
		<link rel="stylesheet" href="<?php $this->options->themeUrl('css/base.css')?>" />
		<?php if($this->is('index')):?>
		<link rel="stylesheet" href="<?php $this->options->themeUrl('css/index.css')?>" />
	<?php elseif ($this->is('post')):?> 
		<script type="text/javascript" src="http://www.jzdlink.com/wp-content/themes/wordpress_thems/js/prettify.js"></script>
		<script type="text/javascript" src="http://www.jzdlink.com/wp-content/themes/wordpress_thems/js/single.js"></script>
		<link rel="stylesheet" href="<?php $this->options->themeUrl('css/article.css')?>" />
	<?php elseif ($this->is('page') or $this->is('pages')):?> 
		<link rel="stylesheet" href="<?php $this->options->themeUrl('css/article.css')?>" />
	<?php elseif ($this->is('archive')):?> 
		<link rel="stylesheet" href="<?php $this->options->themeUrl('css/list.css')?>" />
	<?php endif;?>
        <?php $this->header(); ?>
	</head>
	<body>
		<header id="header">
		
			<nav class="header-nav clear">
			<?php if ($this->options->logoUrl): ?>
                    <a class="logo fl" href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>"><img class="logos" src="<?php $this->options->logoUrl() ?>" /></a>
             <?php else:?>
                         <a class="logo fl" href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>"><img src="<?php $this->options->themeUrl('images/lib/logo.png');?>"></a>
                    <?php endif; ?>
				
				<ul class="fr">
					<li><a <?php if($this->is('index')): ?>class="active" <?php endif; ?>href="<?php $this->options->siteUrl(); ?>">首页</a></li></a>
					<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                   <li> <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                    <?php endwhile; ?>
                     <?php if($this->user->hasLogin()): ?>
				<li><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
            <?php else: ?>
                <li><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
            <?php endif; ?>
				</ul>
	 
			</nav> 
			
			<!--nav end-->
		</header>
		<!--header end-->