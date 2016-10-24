<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

</div><!-- end .row -->
</div>
<?php if($this->is('post') && !isPhone() && (hasValue($this->options->postQRCodeURL) || hasValue($this->options->rewardQRCodeURL))):?>
<?php
    $postQRCodeURL = $this->options->postQRCodeURL;
    $postQRCodeURL = str_replace("{{%BASE64_LINK_WITHOUT_SLASH}}", str_replace('/', '-', base64_encode($this->permalink)), $postQRCodeURL);
    $postQRCodeURL = str_replace("{{%BASE64_LINK}}", base64_encode($this->permalink), $postQRCodeURL);
    $postQRCodeURL = str_replace("{{%LINK}}", $this->permalink, $postQRCodeURL);
?>
<div id="qr-box">
    <div class="post-qr-code-box">
        <img src="<?= $postQRCodeURL?>" width="250" height="250" alt="本页链接的二维码"/>
    </div>
    <div class="reward-qr-code-box">
        <img src="<?= $this->options->rewardQRCodeURL?>" height="250" alt="打赏二维码"/>
    </div>
</div>
<?php endif?>
<div id="body-bottom">
<?php if($this->is('post') || ($this->is('page') && $this->allow('comment')) || $this->is('attachment')):?>
<div class="container">
    <?php if($this->is('post')):?>
        <div class="post-near">
            <nav>
                <span class="prev"><span class="prev-t">上一篇: </span><?php $this->theNext('%s','没有了'); ?></span>
                <span class="next"><span class="prev-t">下一篇: </span><?php $this->thePrev('%s','没有了'); ?></span>
            </nav>
        </div>
    <?php endif?>
    <?php $this->need('comments.php'); ?>
</div>
<?php endif?>
</div>
<?php if($this->is('index') || $this->is('category') || $this->is('tag')):?>
    <?php if(hasValue($this->options->disqusShortName)):?>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = '<?=$this->options->disqusShortName?>'; // required: replace example with your forum shortname
            window.DISQUSWIDGETS = undefined;
            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function () {
                var s = document.createElement('script'); s.async = true;
                s.type = 'text/javascript';
                s.src = '//' + disqus_shortname + '.disqus.com/count.js';
                (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
            }());
        </script>
    <?php endif?>
<?php endif?>
<?php
if(hasValue($this->fields->js)) {
    echo "<script type=\"text/javascript\">\n";
    echo $this->fields->js;
    echo "\n</script>\n";
}
?>
</div><!-- end #body -->
<?php if(!isPjax() || !PJAX_ENABLED):?>
</div><!-- end #wrap -->
<footer id="footer" role="contentinfo">
    <div class="container">
        <p>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a> • Theme <a href="https://hran.me/mirages.html?copyright&v=142dev1" target="_blank">Mirages</a></p>
    </div>
</footer><!-- end #footer -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<?php $this->footer(); ?>
<script type="text/javascript" class="n-progress">NProgress.inc(0.8);</script>
<?php if(hasValue($this->options->disqusShortName)):?>

<?php elseif(hasValue($this->options->duoshuoShortName)):?>
    <!-- 多说js加载开始，一个页面只需要加载一次 -->
    <script type="text/javascript">
        var duoshuoQuery = {short_name:"<?=$this->options->duoshuoShortName ?>", theme:'none'};
        (function() {
            var ds = document.createElement('script');
            ds.type = 'text/javascript';ds.async = true;
            <?php if(strlen($this->options->duoshuoCustomEmbedJs) > 0):?>
            ds.src = "<?=(startsWith($this->options->duoshuoCustomEmbedJs, 'http://') || startsWith($this->options->duoshuoCustomEmbedJs, 'https://') || startsWith($this->options->duoshuoCustomEmbedJs, '//')) ? $this->options->duoshuoCustomEmbedJs : '//'.$this->options->duoshuoCustomEmbedJs ?>";
            <?php else:?>
            ds.src = '//static.duoshuo.com/embed.js';
            <?php endif;?>
            ds.charset = 'UTF-8';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
        })();
    </script>
    <!-- 多说js加载结束，一个页面只需要加载一次 -->
<?php endif?>
<?php if(PJAX_ENABLED):?>
<script src="//cdn.bootcss.com/jquery.pjax/1.9.6/jquery.pjax.min.js" type="text/javascript"></script>
<?php endif?>
<?php if(!isMobile()):?>
<?php endif?>
<script src="<?= STATIC_PATH ?>js/waves.min.js"></script>
<?php if(IS_HTTPS): ?>
<script src="//cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="//cdn.bootcss.com/headroom/0.7.0/headroom.min.js" type="text/javascript"></script>
<?php else:?>
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="http://apps.bdimg.com/libs/headroom/0.5.0/headroom.min.js" type="text/javascript"></script>
<?php endif?>
<script src="//cdn.bootcss.com/github-repo-widget/e23d85ab8f/jquery.githubRepoWidget.min.js" type="text/javascript"></script>
<script src="//cdn.bootcss.com/pangu/3.2.1/pangu.min.js" type="text/javascript"></script>

<script type="text/javascript">
    pangu.spacingElementById('body');
    Waves.displayEffect();
</script>
<script src="<?= STATIC_PATH ?>js/zoom.min.js" type="text/javascript"></script>
<script src="<?= STATIC_PATH ?>js/skin.js" type="text/javascript"></script>
<?php if((!empty($this->options->otherOptions) && in_array('enableSSCROnWindows', $this->options->otherOptions)) && !isMobile() && isWindowsAboveVista() && deviceIs('Chrome', 'Edge')):?>
<script src="<?= STATIC_PATH ?>js/sscr.js"></script>
<?php endif?>

<script type="text/javascript" class="n-progress">NProgress.done();</script>

<script type="text/javascript">
    (function ($) {
        var getPostImageAddon = function(){
            var addon = "?";
            var ratio = window.devicePixelRatio || 1;
            width = window.innerWidth || 0;
            height = window.innerHeight || 0;
            if(width == 0 || height == 0){
                return "";
            }
            var format = "";
            <?php if(!empty($this->options->otherOptions) && in_array('enableWebP', $this->options->otherOptions) && shouldEnableWebP()):?>
            format = "/format/webp";
            <?php endif?>
            if(width > height){
                addon += "imageView2/2/h/"+ parseInt(height * ratio) + "/q/75" + format;
            }else{
                addon += "imageView2/2/w/"+ parseInt(width * ratio) + "/q/75" + format;
            }
            return addon;
        };
        var setupImages = function () {
            var addon = getPostImageAddon();
            $("article img:not(code img, pre img)").each(function() {
                var src = $(this).attr('data-src');
                if (src != null && src != undefined && src != "") {
                    $(this).attr('src', src + addon);
                    $(this).removeAttr('data-src');
                }
            });
        };
        <?php if((!empty($this->options->otherOptions) && in_array('useQiniuImageResize', $this->options->otherOptions))):?>
        setupImages();
        <?php endif?>
        String.prototype.startWith = function(str){
            if (str == null || str == "" || this.length == 0 || str.length > this.length) {
                return false;
            }
            return this.substr(0, str.length) == str;
        };
        var pajx_loadDuoshuo = function(){
            DUOSHUO.EmbedThread($('.ds-thread'));
            DUOSHUO.ThreadCount($('.ds-thread-count'));
        };
        var pjax_loadDisqus = function () {
            if($('#disqus_thread').length) {
                if(window.DISQUS) {
                    DISQUS.reset({
                        reload: true
                    });
                } else {
                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                    dsq.src = '//' + '<?=$this->options->disqusShortName?>' + '.disqus.com/embed.js';
                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                }
            }
        };
        pjax_loadDisqus();
        var body_am = function(id) {
            id = isNaN(id) ? $('#' + id).offset().top : id;
            $("body,html").animate({
                scrollTop: id
            }, 0);
            return false;
        };
        var to_am = function() {
            var anchor = location.hash.indexOf('#'); // 用indexOf检查location.href中是否含有'#'号，如果没有则返回值为-1
            if (anchor < 0) {
                return;
            }
            anchor = window.location.hash.substring(anchor + 1);
            body_am(anchor);
        };
        var setupContents = function () {
            $("article img:not(article .link-box img, img[no-zoom])").each(function() {
                $(this).attr('data-action', 'zoom');
                if($(this).next().is('br')){
                    $(this).next().remove();
                }
            });
            $(".post-content a:not(code a, pre a), #content a:not(code a, pre a)").each(function() {
                var href = $(this).attr('href');
                if (href.startWith("http")) {
                    $(this).attr('target', "_blank");
                }
            });
            $(".post-content p.more a").each(function() {
                $(this).removeAttr("target")
            });
            $( ".post-content table" ).wrap( "<div class='table-responsive'></div>" );
        };
        var reHighlightCodeBlock = function () {
            $('pre code').each(function(i, block) {
                hljs.highlightBlock(block);
            });
        };
        var resetStatus = function () {
            $('#wrap').removeClass('display-nav');
            $('#footer').removeClass('display-nav');
            $('#body').off('click');
            $('body').removeClass('show-reward-qr-box').removeClass('show-post-qr-box');
        };
        var rebindEvents = function () {
            $('#toggle-post-qr-code').off('click').on('click', function (e) {
                var body = $('body');
                if (!body.hasClass('show-post-qr-box')) {
                    _hmt.push(['_trackEvent', '按钮', '点击', '二维码']);
                    _czc.push(['_trackEvent', '按钮', '点击', '二维码']);
                }
                body.removeClass('show-reward-qr-box').toggleClass('show-post-qr-box');
            });
            $('#toggle-reward-qr-code').off('click').on('click', function (e) {
                var body = $('body');
                if (!body.hasClass('show-reward-qr-box')) {
                    _hmt.push(['_trackEvent', '按钮', '点击', '打赏']);
                    _czc.push(['_trackEvent', '按钮', '点击', '打赏']);
                }
                body.removeClass('show-post-qr-box').toggleClass('show-reward-qr-box');
            });
        };
        setupContents();
        rebindEvents();
        <?php if(PJAX_ENABLED):?>
        $('body').pjax('a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[target="_blank"], a[no-pjax])', {
                container: '#body',
                fragment: '#body',
                timeout: 8000
            }
        ).on('pjax:click', function() {
            $('body').attr('data-prev-href', document.location.pathname + document.location.search + document.location.hash);
            <?= $this->options->pjaxClickAction?>
        }).on('pjax:send', function() {
            $('#loader-wrapper').addClass("in");
            resetStatus();
            <?= $this->options->pjaxSendAction?>
        }).on('pjax:complete', function() {
            $('#loader-wrapper').removeClass("in");
            var refer = $('body').attr('data-prev-href');
            var currentHref = document.location.pathname + document.location.search + document.location.hash;
            _czc.push(﻿['_trackPageview', currentHref, refer]);
            _hmt.push(['_trackPageview', currentHref]);
            pangu.spacingElementById('body');
            <?php if (hasValue($this->options->disqusShortName)):?>
            pjax_loadDisqus();
            <?php elseif (hasValue($this->options->duoshuoShortName)):?>
            pajx_loadDuoshuo();
            <?php endif?>
            setupImages();
            setupContents();
            reHighlightCodeBlock();
            rebindEvents();
            to_am();
            <?php if((!empty($this->options->texOptions) && in_array('showJax', $this->options->texOptions))):?>
            MathJax.Hub.Queue(["Typeset",MathJax.Hub,"body"]);
            <?php endif?>
            <?= $this->options->pjaxCompleteAction?>
        });
        <?php endif?>
        $(document).ready(function () {
            $('.n-progress').remove();
        });
    })(jQuery);
</script>
<?php if (USE_GOOGLE_FONTS):?>
<script>
    var fontname;
    if (window.devicePixelRatio >= 1.5) {
        fontname = "Merriweather:200,300,400:latin,latin-ext";
    } else {
        fontname = "Open Sans:300,400,700:latin,latin-ext";
    }
    WebFontConfig = {
        google: {
            families: [fontname]
        },
        timeout: 3000
    };

    (function(d) {
        var wf = d.createElement('script'), s = d.scripts[0];
        wf.src = '//cdn.bootcss.com/webfont/1.6.24/webfontloader.js';
        s.parentNode.insertBefore(wf, s);
    })(document);
</script>
<?php endif?>
<?php
if(hasValue($this->options->customJs)) {
    echo "<script type=\"text/javascript\">\n";
    echo $this->options->customJs;
    echo "\n</script>\n";
}
if(hasValue($this->options->beforeBodyClose)) {
    echo $this->options->beforeBodyClose;
}
?>
</body>
</html>
<?php endif?>