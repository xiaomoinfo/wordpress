<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

    <?php $this->comments()->to($comments); ?>

    <?php if($this->allow('comment')): ?>
      <div id="comment-place">

        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>
            <div class="comment-post" id="comment-post">
            <h3><i class="fa fa-pencil"></i><?php _e('发表评论'); ?></h3>
            <form method="post" name="commentform" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <?php if($this->user->hasLogin()): ?>
                    <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
                <?php else: ?>
               
                    <div class="author-input">
                        <label for="author" class="required"><?php _e('昵称'); ?></label>
                        <input type="text" name="author" maxlength="32" size="22" tabindex="1" placeholder="nickname" id="author" class="text" value="<?php $this->remember('author'); ?>" required />

                   
                        <label for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('邮箱'); ?></label>
                        <input type="email" name="mail" id="mail" maxlength="128" size="22" tabindex="2" placeholder="name@example.com" class="text" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                    <ul class="emaillist"></ul>
                   
                        <label for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></label>
                        <input type="url" name="url" id="url" maxlength="128" size="22" tabindex="3" class="text" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                  
               </div>
                <?php endif; ?>
                
                <div class="comment-box">
                <p>

                    <textarea  rows="10" tabindex="4" name="text" id="textarea" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" placeholder="来了就评论一下，有什么大不了" class="textarea" required ><?php $this->remember('text'); ?></textarea>
                </p>
                    
                    <p><button type="submit" id="submit">提交评论</button><button type="reset" id="reset">清除</button></p>
                </div>
                    </div>
            </form>

              </div>

    <?php else: ?>
        <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>

</div>

    <?php if ($comments->have()): ?>
        <h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
<div class="conments1">
        <?php $comments->listComments(); ?>


       
<?php $comments->pageNav('上一页', '下一页', 4, '...', array('wrapTag' => 'div', 'wrapClass' => 'commentnav', 'itemTag' => '', 'textTag' => 'span', 'currentClass' => 'current', 'prevClass' => 'prev', 'nextClass' => 'next',)); ?>
       
</div>

    <?php endif; ?>
