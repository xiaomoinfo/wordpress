<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="totop" style="display: block;"><i class="iconfont icon-xiangshang"></i></div>
		<footer id="footer">
			<div class="wrap footer-fat">
				<section class="about">
					<ul>
						<li>
							<h5>关于我们</h5>
							<a target="_blank" href="#">爱情告白</a>
							<a href="#">博主档案</a>
							<a href="#">留言板</a>
						</li>
						<li>
							<h5>网站赞助</h5>
							<a href="#">热点标签</a>
							<a href="#">sitemap</a>
						</li>
					</ul>
				</section>

				<section class="links">
					<h5>友情链接</h5>
					<ul>
						<?php sidelink($this->options->SideLinks);?>

					</ul>
					
				</section>
				
				<section class="contact">
					<h5>看看大神怎么说...</h5>
					<ul>
					<?php $this->widget('Widget_Comments_Recent','pageSize=10','ignoreAuthor=true')->to($comments); ?>
<?php while($comments->next()): ?>
<li><a rel="nofollow" title="<?php $comments->author(false); ?>的评论" href="<?php $comments->permalink(); ?>"><?php $comments->gravatar();?></a>
<?php $comments->date('Y-m-d'); ?>:
<?php $comments->excerpt(30, '...'); ?>
	</li>
<?php endwhile; ?>
					</ul>
					<br/>
					<p>本站运行：<span id="htmer_time"></span></p>
				</section>
			</div>
		    <section class="copy">
		    	版权所有(c)2015-<?php echo date('Y')?> · <a href=""><?php $this->options->footericp();?></a> · 基于<a href="http://www.typecho.org">Typecho</a> · Designed By 胡小呆 & 曹小萌 · Modify by：小劣博客 
		    </section>

		</footer>
		<script>function secondToDate(second){if(!second){return 0}var time=new Array(0,0,0,0,0);if(second>=365*24*3600){time[0]=parseInt(second/(365*24*3600));second%=365*24*3600}if(second>=24*3600){time[1]=parseInt(second/(24*3600));second%=24*3600}if(second>=3600){time[2]=parseInt(second/3600);second%=3600}if(second>=60){time[3]=parseInt(second/60);second%=60}if(second>0){time[4]=second}return time}function setTime(){var create_time=Math.round(new Date(Date.UTC(<?php $this->options->SideDate();?>,0,0,0)).getTime()/1000);var timestamp=Math.round((new Date().getTime()+8*60*60*1000)/1000);currentTime=secondToDate((timestamp-create_time));currentTimeHtml=currentTime[0]+"年"+currentTime[1]+"天"+currentTime[2]+"时"+currentTime[3]+"分"+currentTime[4]+"秒";document.getElementById("htmer_time").innerHTML=currentTimeHtml}setInterval(setTime,1000);
</script>
		<script type="text/javascript" src="<?php $this->options->themeUrl('js/jquery-1.10.1.min.js');?>"></script>
		<script type="text/javascript" src="<?php $this->options->themeUrl('js/footer.js');?>"></script>
		<?php $this->footer(); ?>
	</body>
</html>
