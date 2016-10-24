<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="post" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <?php if(!(isTrue($this->fields->headTitle))): ?>
        <h2 class="post-title" itemprop="name headline"><?php $this->title() ?></h2>
        <ul class="post-meta">
            <?php if ($this->userNum > 1):?>
            <li itemprop="author" itemscope itemtype="http://schema.org/Person"><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a> • </li>
            <?php endif?>
            <li><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date($this->options->postDateFormat); ?></time></li>
            <?php if(intval($this->viewsNum) > 0): ?>
            <li> • <?php _e('阅读: '); ?><?php $this->viewsNum();?></li>
            <?php endif?>
            <li> • <?php $this->category(','); ?></li>
            <?php if($this->user->hasLogin()):?>
            <li class="edit"> • <a href="<?php Helper::options()->adminUrl()?>write-post.php?cid=<?=$this->cid?>" target="_blank"><?php _e('编辑'); ?></a></li>
            <?php endif?>
        </ul>
        <?php endif?>
        <div class="post-content" itemprop="articleBody">
            <?php echo render($this->content) ?>
        </div>
		<div class="tags">
			<div class="dkeywords">
			   <div itemprop="keywords" class="keywords"><?php _e('标签: '); ?><?php $this->tags(', ', true, '无'); ?></div>
			</div>
		</div>
        <?php if(!isPhone() && (hasValue($this->options->postQRCodeURL) || hasValue($this->options->rewardQRCodeURL))): ?>
        <div class="post-buttons">
            <a id="toggle-archives" href="<?php $this->options->rootUrl();?>/archives.html">返回文章列表</a>
            <?php if(hasValue($this->options->postQRCodeURL)):?>
            <a id="toggle-post-qr-code">文章二维码</a>
            <?php endif?>
            <?php if(hasValue($this->options->rewardQRCodeURL)): ?>
            <a id="toggle-reward-qr-code">打赏</a>
            <?php endif?>
        </div>
        <?php endif?>
    </article>
</div><!-- end #post-->
<?php $this->need('footer.php'); ?>
