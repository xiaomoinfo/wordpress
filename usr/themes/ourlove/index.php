<?php
/**
 * 这是 小劣移植的wp模板 我们的爱
 * 
 * @package 我们的爱
 * @author 小劣博客
 * @version 1.0
 * @link http://mxsky.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
 	<div class="banner">
			<span class="banner-title"><?php $this->options->bannertitle();?></span>
			<span class="banner-introduce"><?php $this->options->bannercontent();?></span>
			<span class="banner-sign">——<?php $this->options->boyName();?>&<?php $this->options->girlName();?></span>
		</div>
		<!-- banner end -->
		<div class="wraper">
			<div class="wrap">
				<div class="cont-info clear">
					<img class="cont-info-heart" src="<?php $this->options->themeUrl('images/index/blog_heart.png');?>" />
					<div class="cont-info-boy fl">
						<img src="<?php $this->options->themeUrl('images/index/blog_boy.png');?>" />
						<h5><?php $this->options->boyName();?></h5>
						<p><?php $this->options->boyDes();?></p>
					</div>
					<div class="cont-info-girl fr">
						<img src="<?php $this->options->themeUrl('images/index/blog_girl.png');?>" />
						<h5><?php $this->options->girlName();?></h5>
						<p><?php $this->options->grilDes();?></p>
					</div>
				</div>
				<div class="cont-article clear">
					<div class="cont-article-line">&nbsp;</div>
						
					<div class="cont-article-boy fl">
						<ul class="cont-article-list">
							<?php while($this->next()): ?>
						
					<?php if($this->author->screenName==$this->options->boyName):?>
							<li>
								<div class="cont-timeline-img"><i class="iconfont icon-img-icon"></i></div>
								<a href="<?php $this->permalink() ?>" target="_blank">
									<h2><?php $this->title() ?></h2>
									<?php echo img_postthumb($this->cid); ?>
									<p><?php $this->excerpt($this->options->IndexNum, '...');?></p>
								</a>
								<div class="cont-article-info">
									<span class="cont-article-time"><i class="iconfont info-icon">&#xe600;</i><?php $this->date('Y年m月d日'); ?></span>
									<span class="cont-article-author"><i class="iconfont info-icon">&#xe603;</i><a href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></span>
									<span class="cont-article-tag"><i class="iconfont info-icon">&#xe602;</i><?php $this->tags(', ', true, 'none'); ?></span>
									<span class="cont-article-classify"><i class="iconfont info-icon">&#xe601;</i><?php $this->category(','); ?></span>
								</div>
							</li>
							<?php endif;?>
				<?php endwhile; ?>		
						</ul>
					</div>
				
					<div class="cont-article-girl fr">
						<ul class="cont-article-list">
							<?php while($this->next()): ?>
								<?php if($this->author->screenName==$this->options->girlName):?>
							<li>
							
								<div class="cont-timeline-img"><i class="iconfont icon-img-icon"></i></div>
								<a href="<?php $this->permalink() ?>" target="_blank">
									<h2><?php $this->title() ?></h2>
                      <?php echo img_postthumb($this->cid); ?>
									<p><?php $this->excerpt($this->options->IndexNum, '...');?></p>
								</a>
								<div class="cont-article-info">
									<span class="cont-article-time"><i class="iconfont info-icon">&#xe600;</i><?php $this->date('Y年m月d日'); ?></span>
									<span class="cont-article-author"><i class="iconfont info-icon">&#xe603;</i><a href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></span>
									<span class="cont-article-tag"><i class="iconfont info-icon">&#xe602;</i><?php $this->tags(', ', true, 'none'); ?></span>
									<span class="cont-article-classify"><i class="iconfont info-icon">&#xe601;</i><?php $this->category(','); ?></span>
								</div>
							
							</li>	
							<?php endif;?>
				<?php endwhile; ?>		
						</ul>
					</div>
				
						</div>
				<div class="page_navi">
   
<?php if ($this->_currentPage == 1): ?>
            <?php $this->pageLink('下一页','next'); ?>
        <?php else: ?>
            <?php $this->pageLink('上一页','prev'); ?>
            <?php $this->pageLink('下一页','next'); ?>
        <?php endif; ?>
        <a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a>
            <a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a>
        </div>
				</div>	
				 
			</div>
		
				
				<?php $this->need('footer.php'); ?>