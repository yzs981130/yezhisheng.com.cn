<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
    initTheme($this);
?>
<?php if(!isPjax() || !PJAX_ENABLED):?>
<!DOCTYPE HTML>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<?php
    $this->need('head.php');
    $this->need('headfix.php');
?>
</head>
<body class="<?=THEME_CLASS." ".$this->colorClass?>">
<?php if($this->options->disableAutoNightTheme <= 0 && !hasValue($this->options->disqusShortName) && THEME_CLASS != "theme-dark"):?>
    <script>
        if (USE_MIRAGES_DARK) {
            $('body').removeClass("theme-white").addClass("theme-dark");
        }
    </script>
<?php endif?>
<!--[if lt IE 9]>
<div class="browse-happy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<script type="text/javascript" class="n-progress">NProgress.inc(0.1);</script>
<span id="backtop" class="waves-effect waves-button"><i class="fa fa-angle-up"></i></span>
<div id="wrap">
    <?php $this->need('side_menu.php');?>

    <script type="text/javascript" class="n-progress">NProgress.inc(0.2);</script>
<?php else:?>
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
<?php endif?>
    <div id="body">
        <?php $this->need('headfix_pages.php');?>
        <script type="text/javascript">
            var bg = "<?=$this->banner?>";
            var getBgHeight = function(windowHeight){
                windowHeight = windowHeight || 560;
                if (windowHeight > window.screen.availHeight) {
                    windowHeight = window.screen.availHeight;
                }
                <?php if(hasValue($this->fields->bannerHeight)):?>
                var bgHeightP = "<?=$this->fields->bannerHeight?>";
                <?php else:?>
                var bgHeightP = "<?=$this->options->defaultBgHeight?>";
                <?php endif?>
                bgHeightP = bgHeightP.trim();
                bgHeightP = parseFloat(bgHeightP);
                bgHeightP =  windowHeight * bgHeightP / 100;
                return bgHeightP;
            };
            <?php if((!empty($this->options->otherOptions) && in_array('useQiniuImageResize', $this->options->otherOptions))):?>
            var addon = getImageAddon(width, height);
            bg = bg.trim();
            bg += addon;
            <?php endif?>
        </script>
        <?php if($this->showBanner):?>
        <header id="masthead" class="blog-background overlay align-center align-middle animated from-bottom animation-on" style="
        <?php if($this->is("page","about")):?>
            background-color: #2a2b2c;
        <?php endif?>
            height:
        <?php $this->options->defaultBgHeight();?>;" itemscope="" itemtype="http://schema.org/Organization">
            <script type="text/javascript">
                var head = document.getElementById("masthead");
                head.style.backgroundImage = "url("+bg+")";
                var bgHeight = getBgHeight(window.innerHeight);
                head.style.height = bgHeight+"px";
            </script>
            <div class="inner">
                <div class="">
                    <?php if($this->is('page','about')):?>
                        <div id="about-avatar">
                            <img class="rotate" src="<?php $this->options->sideMenuAvatar(); ?>" alt="Avatar" width="200" height="200"/>
                        </div>
                        <h1 class="blog-title light" itemprop="name"><?php $this->author(); ?>
                            <?php if($this->user->hasLogin()):?>
                                <a class="superscript" href="<?php Helper::options()->adminUrl()?>write-page.php?cid=<?=$this->cid?>" target="_blank"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <?php endif?>
                        </h1>
                        <h2 class="blog-description light bordered bordered-top" itemprop="description"><?=$this->fields->description?></h2>
                    <?php elseif($this->is('page','links')):?>
                        <h1 class="blog-title light" itemprop="name"><?php $this->title() ?>
                            <?php if($this->user->hasLogin()):?>
                                <a class="superscript" href="<?php Helper::options()->adminUrl()?>write-page.php?cid=<?=$this->cid?>" target="_blank"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <?php endif?>
                        </h1>

                    <?php elseif($this->is('index')):?>
                    <?php else:?>
                        <h1 class="blog-title" style="<?php if (hasValue($this->fields->mastheadTitleColor)) echo "color: ".$this->fields->mastheadTitleColor.";" ?>" itemprop="name">
                            <?php
                                if (hasValue($this->fields->mastheadTitle)) {
                                    echo $this->fields->mastheadTitle;
                                } elseif (isTrue($this->fields->headTitle)) {
                                    echo $this->title;
                                }
                            ?>
                        </h1>
                        <h2 class="blog-description light bordered bordered-top" style="<?php if (hasValue($this->fields->mastheadTitleColor)) echo "color: ".$this->fields->mastheadTitleColor.";" ?>" itemprop="description">
                            <?php
                                if (hasValue($this->fields->mastheadSubtitle)) {
                                    echo $this->fields->mastheadSubtitle;
                                } elseif (isTrue($this->fields->headTitle)) {
                                    if ($this->userNum > 1) {
                                        echo "<a itemprop=\"name\" href=\""; $this->author->permalink(); echo "\" rel=\"author\">"; $this->author(); echo "</a>";
//                                        $this->author();
                                        echo " • ";
                                    }
                                    $this->date($this->options->postDateFormat);
                                    if(intval($this->viewsNum) > 0) {
                                        echo " • 阅读: {$this->viewsNum}";
                                    }
                                    if (!$this->is("page")) {
                                        echo " • "; $this->category(',');
                                    }
                                    if($this->user->hasLogin()) {
                                        if ($this->is('page')) {
                                            echo " • "; echo "<a href=\"", Helper::options()->adminUrl, "write-page.php?cid={$this->cid}\" target=\"_blank\">"; _e('编辑'); echo "</a>";
                                        } else {
                                            echo " • "; echo "<a href=\"", Helper::options()->adminUrl, "write-post.php?cid={$this->cid}\" target=\"_blank\">"; _e('编辑'); echo "</a>";
                                        }
                                    }
                                }
                            ?>
                        </h2>
                    <?php endif?>
                </div>
            </div>
        </header>
    <?php endif?>
        <?php if(!isPjax() || !PJAX_ENABLED):?>
        <script type="text/javascript" class="n-progress">NProgress.inc(0.25);</script>
        <?php endif?>
        <?php if($this->is("archive")):?>
        <h2 class="archive-title"><?php $this->archiveTitle(array(
                'category'  =>  _t('分类 %s 下的文章'),
                'search'    =>  _t('包含关键字 %s 的文章'),
                'tag'       =>  _t('标签 %s 下的文章'),
                'author'    =>  _t('%s 发布的文章')), '', ''); ?></h2>
        <?php endif?>
        <div class="container">
            <div class="row">

    
    
