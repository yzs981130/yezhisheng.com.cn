<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
if (IS_HTTPS) {
    $highlightJSPath = "//cdn.bootcss.com/highlight.js/9.5.0/";
} else {
    $highlightJSPath = "http://apps.bdimg.com/libs/highlight.js/9.1.0/";
}

//Add-on highlight language
$addOnHighlightLang = array();
$highlightLanguages = array(
    "swift" => "languages/swift.min.js",
);
$rawContentText = $this->text;
$rawContentText = strtolower($rawContentText);
foreach ($highlightLanguages as $lang => $url) {
    $lang = '```' . strtolower($lang);
    if (strpos($rawContentText, $lang) >= 0) {
        $addOnHighlightLang[] = $url;
    }
}

$addOnHighlightLangHtml = "";
foreach ($addOnHighlightLang as $url) {
    $addOnHighlightLangHtml .= '<script src="' . $highlightJSPath . $url . '" type="text/javascript"></script>' . "\n";
}
?>
<meta charset="<?php $this->options->charset(); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta property="og:site_name" content="<?php $this->options->title(); ?>" >
<meta property="og:image" content="https://yzs-10036964.file.myqcloud.com/avatar.jpg">
<meta property="og:title" content="<?php $this->archiveTitle(array(
        'category'  =>  _t('分类 %s 下的文章'),
        'search'    =>  _t('包含关键字 %s 的文章'),
        'tag'       =>  _t('标签 %s 下的文章'),
        'author'    =>  _t('%s 发布的文章')
    ), '', ' - '); ?><?php $this->options->title(); ?>">
<link rel="shortcut icon" href="https://yzs-10036964.file.myqcloud.com/avatar.jpg" type="image/x-icon">
<script type="text/javascript" src="https://qzonestyle.gtimg.cn/qzone/qzact/common/share/share.js"></script>
<script type="text/javascript">
setShareInfo({
        title:          '<?php $this->archiveTitle(array(
        'category'  =>  _t('分类 %s 下的文章'),
        'search'    =>  _t('包含关键字 %s 的文章'),
        'tag'       =>  _t('标签 %s 下的文章'),
        'author'    =>  _t('%s 发布的文章')
    ), '', ' - '); ?><?php $this->options->title(); ?>',
        summary:        '<?php $this->excerpt(20); ?>',
        pic:            'https://yzs-10036964.file.myqcloud.com/avatar.jpg',
        url:            '',
});
</script>
<title><?php $this->archiveTitle(array(
        'category' => _t('分类 %s 下的文章'),
        'search' => _t('包含关键字 %s 的文章'),
        'tag' => _t('标签 %s 下的文章'),
        'author' => _t('%s 发布的文章')
    ), '', ' - '); ?><?php $this->options->title(); ?></title>
<?php $this->options->bowserInsight() ?>
<?php $this->options->customMeta() ?>
<script type="text/javascript">
    var BASE_SCRIPT_URL = "<?= STATIC_PATH ?>";
    var width = window.screen.availWidth;
    var height = window.screen.availHeight;
    var CSS = function (css) {
        var link = document.createElement('link');
        link.setAttribute('rel', 'stylesheet');
        link.href = css;
        document.head.appendChild(link);
    };
    var STYLE = function (style, type) {
        type = type || 'text/css';
        var s = document.createElement('style');
        s.type = type;
        s.textContent = style;
        document.head.appendChild(s);
    };
    var JS = function (js, async) {
        async = async || false;
        var sc = document.createElement('script'), s = document.scripts[0];
        sc.src = js; sc.async = async;
        s.parentNode.insertBefore(sc, s);
    };
    var getImageAddon = function (width, height) {
        var addon = "?";
        var ratio = window.devicePixelRatio || 1;
        width = width || 0;
        height = height || 0;
        if (width == 0 && height == 0) {
            return "";
        }
        var format = "";
        <?php if(!empty($this->options->otherOptions) && in_array('enableWebP', $this->options->otherOptions) && shouldEnableWebP()):?>
        format = "/format/webp";
        <?php endif?>
        if (width >= height) {
            addon += "imageView2/2/w/" + parseInt(width * ratio) + "/q/75" + format;
        } else {
            addon += "imageView2/2/h/" + parseInt(height * ratio) + "/q/75" + format;
        }
        return addon;
    };
    var IS_MOBILE = false,
        IS_PHONE = false,
        IS_TABLET = false,
        IS_HTTPS = false;
    <?php if(isMobile()):?>
    IS_MOBILE = true;
    <?php endif?>
    <?php if(isPhone()):?>
    IS_PHONE = true;
    <?php endif?>
    <?php if(isTablet()):?>
    IS_TABLET = true;
    <?php endif?>
    <?php if(IS_HTTPS):?>
    IS_HTTPS = true;
    <?php endif?>
</script>
<!-- 使用url函数转换相关路径 -->
<link rel="stylesheet" href="//cdn.bootcss.com/normalize/3.0.3/normalize.min.css">
<link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= STATIC_PATH ?>css/base.css">

<?php if (IS_HTTPS): ?>
    <link rel="stylesheet" href="//cdn.bootcss.com/nprogress/0.2.0/nprogress.min.css">
<?php else: ?>
    <link rel="stylesheet" href="http://apps.bdimg.com/libs/nprogress/0.1.2/nprogress.css">
<?php endif ?>

<?php if ($this->options->disableAutoNightTheme <= 0 && !hasValue($this->options->disqusShortName) && THEME_CLASS != "theme-dark"): ?>
    <script>
        var hour = new Date().getHours();
        var USE_MIRAGES_DARK = false;
        if (hour <= 5 || hour >= 22) {
            USE_MIRAGES_DARK = true;
        }
    </script>
<?php endif ?>
<?php if (USE_EMBED_FONTS) $this->need('head_font.php');?>
<!--<link rel="stylesheet" href="--><?//= TEST_STATIC_PATH ?><!--css/theme.css">-->
<link rel="stylesheet" href="<?= STATIC_PATH ?>css/theme-1472385696000.css">
<?php if (hasValue($this->options->disqusShortName)): ?>
<?php elseif (hasValue($this->options->duoshuoShortName)): ?>
    <link rel="stylesheet" href="<?= STATIC_PATH ?>css/embed.duoshuo.min.css">
<?php endif ?>
<?php if (strlen($this->options->shortcutIcon) > 5): ?>
    <link rel="shortcut icon" href="<?php $this->options->shortcutIcon(); ?>">
<?php else: ?>
    <link rel="shortcut icon" href="<?php $this->options->siteUrl(); ?>favicon.ico">
<?php endif ?>

<script src="<?= $highlightJSPath ?>highlight.min.js" type="text/javascript"></script>
<?php if (IS_HTTPS): ?>
    <script src="//cdn.bootcss.com/jquery/2.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="//cdn.bootcss.com/nprogress/0.2.0/nprogress.min.js" type="text/javascript"></script>
<?php else: ?>
    <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="http://apps.bdimg.com/libs/nprogress/0.1.2/nprogress.js" type="text/javascript"></script>
<?php endif ?>
<?= $addOnHighlightLangHtml; ?>

<?php if ((!empty($this->options->texOptions) && in_array('showJax', $this->options->texOptions))): ?>
    <?php if ((!empty($this->options->texOptions) && in_array('useDollarForInline', $this->options->texOptions))): ?>
        <script type="text/x-mathjax-config">
    MathJax.Hub.Config({
      tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
    });

        </script>
    <?php endif ?>
    <script src="//cdn.bootcss.com/mathjax/2.5.3/MathJax.js" type="text/javascript"></script>
    <script src="<?= STATIC_PATH ?>js/TeX-AMS-MML_HTMLorMML.js" type="text/javascript"></script>
<?php endif ?>
<script type="text/javascript">
    hljs.initHighlightingOnLoad();
</script>
<!--[if lt IE 9]>
<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- 通过自有函数输出HTML头部信息 -->
<?php $this->header("generator=&");
echo "\n"; ?>
<?php if (!$this->user->hasLogin()): ?>
    <?php $this->options->tongJi();
    echo "\n"; ?>
<?php endif ?>
<script>
    //声明_czc对象:
    var _czc = _czc || [];
    var _hmt = _hmt || [];
</script>