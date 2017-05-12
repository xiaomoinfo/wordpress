<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
 $this->need('header.php');?>

    <div class="wraper">
        <div class="wrap clear">
            <div class="content-left fl">
                <div class="breadcrumb clear" >
                <a href="<?php $this->options->siteUrl(); ?>">Home</a> <i>»</i>
                <?php if ($this->is('post')): ?><!-- 页面为文章单页时 -->
                <?php $this->category(); ?> <i>»</i> <span class="current"><?php $this->title() ?></span>
                <?php else: ?><!-- 页面为其他页时 -->
                <?php $this->archiveTitle('<i>»</i>','',''); ?>
                <?php endif; ?>                
                </div>
                <div class="article-cont">
                    <h3><?php $this->title(); ?></h3>
                    <div class="article-info">
                        <span>作者：<?php $this->author(); ?></span>
                        <span>发布时间：<?php $this->date('Y年m月d日'); ?></span>
                        <span>标签: <?php $this->tags(',', true, 'none'); ?></span>
                        <span>评论（<?php $this->commentsNum(); ?></a>）</span>
                    </div>
                    <div class="article-text"><?php $this->content(); ?></div>
                    <div class="article-bootom">
                        <p><img src="<?php $this->options->themeUrl('images/article/article_code.png'); ?>" />觉得本文不错，打赏作者。</p>
                        
                                <div class="nextinfo"><?php $this->theNext('%s','已经是最新'); ?><span>:上一篇&下一篇:</span><?php $this->thePrev('%s','已经没有了'); ?>
                                </div>
                    </div>
                     <?php $this->need('comments.php'); ?>   
                </div>
            </div>
             <?php $this->need('sidebar.php');?>   
        </div>

        
<?php $this->need('footer.php'); ?>