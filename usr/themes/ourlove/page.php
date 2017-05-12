
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
 $this->need('header.php');?>

    <div class="wraper">
        <div class="wrap clear">
            <div class="content-left fl">
                
                <div class="article-cont">
                    <h3><?php $this->title(); ?></h3>
                   
                    <div class="article-text"><?php $this->content(); ?></div>
                   
                     <?php $this->need('comments.php'); ?>              
                </div>
           
            </div>
             <?php $this->need('sidebar.php');?>
        </div>

       </div> 
<?php $this->need('footer.php'); ?>


