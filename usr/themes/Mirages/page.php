<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="post" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting" style="margin-bottom: 20px;">
        <?php if(!isTrue($this->fields->headTitle) && !$this->is('page','about') && !$this->is('page','links')): ?>
        <h2 class="post-title" itemprop="name headline"><?php $this->title() ?>
            <?php if($this->user->hasLogin()):?>
                <a class="superscript" href="<?php Helper::options()->adminUrl()?>write-page.php?cid=<?=$this->cid?>" target="_blank"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <?php endif?>
        </h2>
        <?php endif?>
        <div class="post-content" itemprop="articleBody">
            <?php echo render($this->content) ?>
        </div>
    </article>
</div><!-- end #post-->
<?php $this->need('footer.php'); ?>
