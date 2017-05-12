<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
     <div class="content-right fr">
    <?php if ($this->is('post')): ?>
                <div class="personal-info">
                    <img class="personal-img" src="<?php $this->options->themeUrl('images/article/personal_img.png'); ?>" />
                    <h4><?php $this->author(); ?></h4>
                    <p class="personal-signed"><i class="iconfont pers-icon">&#xe606;</i>
                  <?php if($this->author->screenName==$this->options->girlName):?>
                 <?php $this->options->grilDes();?>
             <?php elseif ($this->author->screenName==$this->options->boyName):?>
                <?php $this->options->boyDes();?>
             <?php endif;?>
                 <i class="iconfont pers-icon">&#xe605;</i></p>
                    <div class="personal-box">
                    <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
                       <?php _e('<li>本站文章数量：%s 篇</li>
    <li>本站评论数量：%s 条</li>
  
    <li>搭建平台：腾讯云，贴图库，Typecho</li>',$stat->publishedPostsNum,$stat->publishedCommentsNum);?>  
                    </div>

                </div>
                 <?php endif;?>
                  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentContents', $this->options->sidebarBlock)): ?>
                <div class="side-column">
                    <h4>最新文章</h4>
                    <ul class="article-list clear">
                   <?php $this->widget('Widget_Contents_Post_Recent')->to($newlog); ?>
                    <?php while($newlog->next()): ?>
                    <li><i><?php $newlog->sequence(); ?></i><a href="<?php $newlog->permalink(); ?>" target="_blank"><?php $newlog->title();?></a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif;?>
                 <?php if (!empty($this->options->sidebarBlock) && in_array('ShowSideBox', $this->options->sidebarBlock)): ?>

    <!--广告图片开始-->
                <div class="pic-box">

                    <img src="<?php $this->options->themeUrl('images/article/article_01.jpg'); ?>">
                </div>
                <!--广告图片结束-->
    <?php endif;?>
      <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRandPosts', $this->options->sidebarBlock)): ?>
                <div class="side-column">
                    <h4>随机文章</h4>
                    <ul  class="article-list clear">
                      <?php theme_random_posts();?>
                    </ul>
                </div>
                 <?php endif;?>
                <?php if (!empty($this->options->sidebarBlock) && in_array('ShowSideTags', $this->options->sidebarBlock)): ?>
                <div class="side-column">
                    <h4>标签云</h4>
                    <ul class="tag-cloud">

        <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=30')->to($tags); ?>
            <?php while($tags->next()): ?>
           <li> <a rel="tag" href="<?php $tags->permalink(); ?>" title='<?php $tags->name(); ?>'><?php $tags->name(); ?></a>
        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif;?> 
            </div>