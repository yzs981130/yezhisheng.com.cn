<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<style type="text/css">
    /*根据操作系统及浏览器优化font-family*/
    <?php if(isELCapitanOrAbove()): ?>
    /*Mac OS X - El Capitan*/
    body, #index .post .post-title,#archive .post .post-title, #nav .menu li a {
        font-weight: 400;
    }
    #post .post-title, .post-content h1, .post-content h2 {
        font-weight: 300;
    }
    @media screen and (min-device-pixel-ratio: 1.5), screen and (-webkit-min-device-pixel-ratio: 1.5), screen and (-o-min-device-pixel-ratio: 1.5/1.5){
        body, #post .post-title, #index .post .post-title,#archive .post .post-title, #nav .menu li a,
        .post-content h1, .post-content h2 {
            font-weight: 300;
        }
    }
    @media screen and (min--moz-device-pixel-ratio: 1.5){
        body, #post .post-title, #index .post .post-title,#archive .post .post-title, #nav .menu li a,
        .post-content h1, .post-content h2 {
            font-weight: 400;
        }
    }
    <?php endif?>
</style>
<style type="text/css">
    /*根据操作系统及浏览器进行样式修正*/

    <?php if(isMobile()):?>
    /*移动端*/
    html, body, div, p, ol, ul, li, dl, dt, dd, h1, h2, h3, h4, h5, h6, form, input, select, button, textarea, iframe, table, th, td, blockquote, img{
        -webkit-font-smoothing: auto !important;
    }
    #backtop.show {
        opacity: 0;
        display: none;
    }
    #nav .menu li a:hover{
        background: #191919;
        color: #9ba3ad;
    }
    #nav .category-list li a:hover{
        background: #131313;
        color: #9ba3ad;
    }
    #nav .menu li a:focus{
        background: #2a2b2c;
        color: #fff;
    }
    #index .more>a:hover,#archive .more>a:hover {
        width: 15.625rem;
    }
    .link-box a:active {
        box-shadow: 0 1.375rem 2.6875rem rgba(0, 0, 0, 0.15);
        -webkit-box-shadow: 0 1.375rem 2.6875rem rgba(0, 0, 0, 0.15);
        -webkit-transform: translateY(-0.25rem);
        transform: translateY(-0.25rem);
        -moz-transform: none;
    }
    <?php else:?>
    /*桌面端*/
    #index .post .post-title:hover,#archive .post .post-title:hover {
        color: #1abc9c;
    }
    #index .more>a:hover,#archive .more>a:hover {
        color: #FFF !important;
        border: .0625rem dashed #1abc9c;
        background-color: rgba(24,188,156,0.5);
        width: 15.625rem;
    }
    .link-box a:hover {
        box-shadow: 0 1.375rem 2.6875rem rgba(0, 0, 0, 0.15);
        -webkit-box-shadow: 0 1.375rem 2.6875rem rgba(0, 0, 0, 0.15);
        -webkit-transform: translateY(-0.25rem);
        transform: translateY(-0.25rem);
        -moz-transform: none;
    }
    <?php endif?>
    <?php if(isPhone()):?>
    /*Phone*/
    .post-content {
        /*font-weight: 400;*/
        font-size: 1.125rem
    }
    .post-content pre {
        font-size: .875rem
    }
    .container {
        max-width: 38.75rem
    }
    <?php endif?>
    <?php if(deviceIs("iPad")):?>
    /*iPad*/
    .post-content {
        /*font-weight: 400;*/
        font-size: 1.125rem
    }
    .post-content pre {
        font-size: .875rem
    }
    <?php endif?>
    <?php if(shouldEnableBlurFilter()):?>
    #wrap.display-nav #body, #footer.display-nav {
        -webkit-filter: blur(10px);
        -moz-filter: blur(10px);
        -ms-filter: blur(10px);
        -o-filter: blur(10px);
        filter: blur(10px);
    }
    <?php else:?>
    #wrap.display-nav #body, #footer.display-nav {
        opacity: 0.1;
    }
    <?php endif?>

    <?php if(isSafari()):?>
    /*Safari*/
    /*a#toggle-nav {*/
    /*padding-bottom: 0;*/
    /*}*/
    <?php else:?>
    /*Not Safari*/
    /*
    *webkit浏览器滚动条样式
    */
    ::-webkit-scrollbar {
        height:8px;
        width:6px;
    }
    ::-webkit-scrollbar-button {
        height:0;
        width:0;
    }
    ::-webkit-scrollbar-button:start:decrement,::-webkit-scrollbar-button:end:increment {
        display:block;
    }
    ::-webkit-scrollbar-button:vertical:start:increment,::-webkit-scrollbar-button:vertical:end:decrement {
        display:none;
    }
    ::-webkit-scrollbar-track:vertical,::-webkit-scrollbar-track:horizontal,::-webkit-scrollbar-thumb:vertical,::-webkit-scrollbar-thumb:horizontal,::-webkit-scrollbar-track:vertical,::-webkit-scrollbar-track:horizontal,::-webkit-scrollbar-thumb:vertical,::-webkit-scrollbar-thumb:horizontal {
        border-style:solid;
        border-color:transparent;
    }
    ::-webkit-scrollbar-track:vertical::-webkit-scrollbar-track:horizontal{
        background-clip:padding-box;
        background-color:#fff;
    }
    ::-webkit-scrollbar-thumb {
        -webkit-box-shadow:inset 1px 1px 0 rgba(0,0,0,.1),inset 0 -1px 0 rgba(0,0,0,.07);
        background-clip:padding-box;
        background-color:rgba(0,0,0,.5);
        min-height:28px;
        padding-top:100px;
    }
    ::-webkit-scrollbar-thumb:hover {
        -webkit-box-shadow:inset 1px 1px 1px rgba(0,0,0,.25);
        background-color:rgba(0,0,0,.4);
    }
    ::-webkit-scrollbar-thumb:active {
        -webkit-box-shadow:inset 1px 1px 3px rgba(0,0,0,.35);
        background-color:rgba(0,0,0,.5);
    }
    ::-webkit-scrollbar-track:vertical,::-webkit-scrollbar-track:horizontal,::-webkit-scrollbar-thumb:vertical,::-webkit-scrollbar-thumb:horizontal {
        border-width:0;
    }
    ::-webkit-scrollbar-track:hover {
        -webkit-box-shadow:inset 1px 0 0 rgba(0,0,0,.1);
        background-color:rgba(0,0,0,.05);
    }
    ::-webkit-scrollbar-track:active {
        -webkit-box-shadow:inset 1px 0 0 rgba(0,0,0,.14),inset -1px -1px 0 rgba(0,0,0,.07);
        background-color:rgba(0,0,0,.05);
    }
    /*
     *  end webkit浏览器滚动条样式
     */
    <?php endif?>
    <?php if(deviceIs('Edge')):?>
    /*Edge*/
    #footer a:after,#header .nav li a:after,#post .post-meta a:after,#index .comments a:after,#index .post-content a:after,#post .post-content a:after,#archive .post-content a:after, #archive .comments a:after{
        transition: none
    }
    <?php endif?>
    <?php if(isWindows()): ?>
    /*Windows*/
    body {
        font-weight: 400;
    }
    .post-content p {
        letter-spacing: 0;
    }
    <?php endif?>
    <?php if(isWindowsAboveVista()): ?>
    /*Windows Vista +*/
    #index .more>a, #archive .more>a {
        letter-spacing: 0;
    }
    <?php endif?>
</style>
<style type="text/css">
    /** 页面样式调整 */
    <?php if(!hasValue($this->options->postQRCodeURL) || !hasValue($this->options->rewardQRCodeURL)): ?>
    .post-buttons a {
        width: calc(100% / 2);
    }
    <?php endif?>

    <?php if(hasValue($this->options->duoshuoShortName)):?>
    #ds-thread #ds-reset a.ds-user-name[data-user-id='<?=$this->options->duoshuoUserId?>']:after {
        content: "博主";
        margin-left: .375rem;
        font-size: .75rem;
        color: #fff;
        background: rgba(255, 255, 255, .35);
        border-radius: .25rem;
        padding: .0625rem .1875rem;
    }
    body.theme-white #ds-thread #ds-reset a.ds-user-name[data-user-id='<?=$this->options->duoshuoUserId?>']:after {
        background: rgba(0, 0, 0, .35);
    }
    <?php endif?>
</style>
<?php
if(isHexColor($this->options->themeColor)) {
    $this->need('head_colors.php');
}
?>
<style type="text/css">
    <?php
        if(hasValue($this->options->customCss)) {
            echo $this->options->customCss;
        }
    ?>
</style>