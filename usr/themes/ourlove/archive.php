<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


    <div class="wraper">

        <div class="wrap clear">

            <div class="content-left fl">
                <div class="breadcrumb clear" >
                   <h3 class="archive-title"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类<span style="color:red;">  %s  </span>下的文章'),
            'search'    =>  _t('包含关键字<span style="color:red;">  %s  </span>的文章'),
            'tag'       =>  _t('标签<span style="color:red;">  %s  </span>下的文章'),
            'author'    =>  _t('<span style="color:red;">  %s  </span>发布的文章')
        ), '', ''); ?></h3>
                </div>
                <div class="article-cont">
                    <ul class="article-box">
                    <?php if ($this->have()): ?>
        <?php while($this->next()): ?>
                        <li>
                            
                            <?php echo img_postthumb($this->cid); ?>
                            <h3><a title="<?php $this->title() ?>" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h3>
                            <div class="cont-article-info">
                                <span>时间：<?php $this->date('Y年m月d日'); ?></span>
                                <span>作者：<a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></span>
                                <span>标签：[<?php $this->tags(', ', true, 'none'); ?>]</span>
                                <span>分类：<?php $this->category(','); ?></span>
                            </div>
                            <p><?php $this->excerpt($this->options->ArcNum, '...');?></p>
                            <a class="read-more fr" title="阅读全文" href="<?php $this->permalink() ?>">阅读全文>></a>
                        </li>
                    <?php endwhile;?>
                  <?php else:?>
                  <div class="article-cont">没有找到任何内容</div>
                  <?php endif;?>       
                       
                    <?php $this->pageNav('上一页', '下一页', 4, '...', array('wrapTag' => 'div', 'wrapClass' => 'page', 'itemTag' => '', 'textTag' => 'span', 'spanClass' => 'pages','currentClass' => 'cur', 'prevClass' => 'prev', 'nextClass' => 'next',)); ?>
                       
                </div>
            </div>
                <?php $this->need('sidebar.php');?>
        </div>
    </div>
    
<!-- end #main -->

	
	<?php $this->need('footer.php'); ?>
