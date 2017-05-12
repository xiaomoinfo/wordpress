<?php
/**
 * 自定义页面模板
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
?>
<?php $this->need('header.php'); ?>
<div class="wraper">
        <div class="wrap clear">
            <div class="content-left fl">
                <?php if($this->title=='留言板'||$this->title=='留言'||$this->title=='Guestbook'):?>
                	
                <div class="article-cont">

                    <h3><?php $this->title(); ?></h3>
                    <header>
            <div class="post-context">
            <div class="blue">
	        ❤ 欢迎光临本博客，来了就吐槽几句吧！这是一堵水墙，没有节操限制，你可以自由吐槽...<br>
            ❤ 遵循先友情后链接的原则，如果需要<span style="color:#EE33EE;">交换友情链接</span>，请留言申请。<br>
            ❤ 网站名：<span style="color:#E53333;"><?php $this->options->title() ?></span> 网址：<span style="color:#E53333;"><?php $this->options->siteUrl(); ?></span>&nbsp;描述：<span style="color:#E53333;"><?php $this->options->description() ?></span><br>
            ❤ <strong>请不要在本博客发布无意义广告评论，相信我！删除真的只需要1秒！</strong><br>
            </div>
            </div>
            </header>
                   
                    <div class="article-text">
                    <?php $this->content(); ?>
                    </div>
                    <div class="article-info">
                        <span>本站封神榜</span>
                    </div>
                   <div id="list-post"> 			
<ul class='readers-list'> 
<?php getFriendWall(); ?> 
</ul></div>          
              <?php $this->need('comments.php'); ?>              
                </div>

<?php $this->need('sidebar.php');?>
            </div>
        </div>

       </div>        
         
            	<?php elseif($this->title=='归档'||$this->title=='文章归档'||$this->title=='Archiver'||$this->title=='Archivers'): ?>
                	
                <div class="article-cont">

                    <h3><?php $this->title(); ?></h3>
                   
                    <div class="article-text">
                    <?php $this->content(); ?>

                    </div>
                   <div id="list-post"> 			
<ul class='readers-list'> 
<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y年m月')
               ->parse('<li><a href="{permalink}"><em>{date}</em><strong>{count}篇</strong></a></li>'); ?>

</ul></div>          
                     
<?php $this->need('comments.php'); ?>              
                </div>

<?php $this->need('sidebar.php');?>
            </div>
        </div>

       </div> 
<?php elseif($this->title=='友链'||$this->title=='友情链接'||$this->title=='Links'): ?>
                	
                <div class="article-cont">

                    <h3><?php $this->title(); ?></h3>
                     <header>
            <div class="post-context">
            <div class="green">
	        ❤ 欢迎光临本博客，请在此页面申请友链！<br />
            ❤ 遵循先友情后链接的原则，如果需要<span style="color:#EE33EE;">交换友情链接</span>，请留言申请。<br />
            ❤ 本网站名：<span style="color:#E53333;"><?php $this->options->title() ?></span> 网址：<span style="color:#E53333;"><?php $this->options->siteUrl(); ?></span><br />
             ❤ <strong>交换友链请主动添加自己网站，并留下自己的网站地址！</strong><br />
            ❤ <strong>请不要在本博客发布无意义广告评论，相信我！删除真的只需要1秒！</strong>
            </div>
            </div>
            </header>
                    <div class="article-text">
                    <?php $this->content(); ?>

                    </div>
                   <div id="list-post"> 			
<ul class='readers-list'> 

			<?php pageslink($this->options->PagesLinks);?>

</ul></div>          
             <?php $this->need('comments.php'); ?>    

                </div>


            </div>
            <?php $this->need('sidebar.php');?>          
        </div>

       </div>   
       <?php elseif($this->title=='分类'||$this->title=='分类归档'||$this->title=='Category'||$this->title=='Categorys'): ?>
                	
                <div class="article-cont">

                    <h3><?php $this->title(); ?></h3>
                   
                    <div class="article-text">
                    <?php $this->content(); ?>

                    </div>
                   <div id="list-post"> 			
<ul class='readers-list'> 
<?php $this->widget('Widget_Metas_Category_List')
               ->parse('<li><a href="{permalink}" title="{name}"><em>{name}</em><strong>{count}篇</strong></a></li>'); ?>

</ul></div>          
                     
<?php $this->need('comments.php'); ?>              
                </div>


            </div>
            <?php $this->need('sidebar.php');?>
        </div>

       </div>     
			<?php else: ?>
			<div class="article-cont">

                    <h3><?php $this->title(); ?></h3>
                  
                    <div class="article-text">
                    <?php $this->content(); ?>

                    </div>
                
         <?php $this->need('comments.php'); ?>              
                </div>

<?php $this->need('sidebar.php');?>
            </div>
        </div>

       </div> 
			<?php endif;?>
	
<?php $this->need('footer.php'); ?>