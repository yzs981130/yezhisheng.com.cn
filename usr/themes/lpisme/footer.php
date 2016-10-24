<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

	<div id="footer" class="cf">
		<div class="social-wrapper">
		<?php if ($this->options->socialgithub): ?>
			<a class="social github" target="blank" href="<?php $this->options->socialgithub(); ?>">
				<i class="icon icon-github"></i>
			</a>
		<?php endif; ?>
		<?php if ($this->options->socialgoogle): ?>
			<a class="social google-plus" target="blank" href="<?php $this->options->socialgoogle(); ?>">
				<i class="icon icon-google-plus"></i>
			</a>
		<?php endif; ?>
			<a class="social rss" target="blank" href="<?php $this->options->siteUrl(); ?>feed/">
				<i class="icon icon-rss"></i>
			</a>
		<?php if ($this->options->socialtwitter): ?>
			<a class="social twitter" target="blank" href="<?php $this->options->socialtwitter(); ?>">
				<i class="icon icon-twitter"></i>
			</a>
		<?php endif; ?>
		<?php if ($this->options->socialweibo): ?>
			<a class="social weibo" target="blank" href="<?php $this->options->socialweibo(); ?>">
				<i class="icon icon-weibo"></i>
			</a>
		<?php endif; ?>
		</div>
		&copy; <?php echo date('Y'); ?> <a rel="nofollow" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a> &nbsp;<a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank">京ICP备16021535-1号</a>
		<br><a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802021290" ><img src="//img.yezhisheng.com.cn/usr/uploads/beian.png" width="12px" height="12px"/>&nbsp;京公网安备 11010802021290号     </a>
		</div>
	</div>
	<?php $this->footer(); ?>

	<script src="<?php $this->options->themeUrl('js/functions.js'); ?>"></script>
	<?php if(!empty($this->options->search_form) && in_array('Pjax', $this->options->search_form)): ?>

	<script src="<?php $this->options->themeUrl('js/prism.js'); ?>" data-no-instant></script>
	<script src="<?php $this->options->themeUrl('js/instantclick.min.js'); ?>" data-no-instant></script>
	<script data-no-instant>
	//Here is for Google Analytics.
	</script>
	<script data-no-instant>
	InstantClick.on('change', function(isInitialLoad) {
		if (isInitialLoad === false) {
			if (typeof Prism !== 'undefined') Prism.highlightAll(true,null);
			if (typeof ga !== 'undefined') ga('send', 'pageview', location.pathname + location.search);
		}
	});
	InstantClick.init();
	</script>
	<?php else : ?>

	<script src="<?php $this->options->themeUrl('js/prism.js'); ?>" ></script>
	<?php endif; ?>
	
	</body>
</html>
<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    extensions: ["tex2jax.js"],
    jax: ["input/TeX", "output/HTML-CSS"],
    tex2jax: {
      inlineMath: [ ['$','$'], ["\\(","\\)"] ],
      displayMath: [ ['$$','$$'], ["\\[","\\]"] ],
      processEscapes: true
    },
    "HTML-CSS": { availableFonts: ["TeX"] }
  });
</script>
<script type="text/javascript"
  src="//cdn.bootcss.com/mathjax/2.7.0-beta.0/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
</script>