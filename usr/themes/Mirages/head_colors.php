<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
$hexColor = $this->options->themeColor;
?>
<!-- 主题主色调 -->
<style type="text/css">
    /* Color - Custom */
    body.color-custom a {
        color: <?=$hexColor?>;
    }
    body.color-custom *::selection {
        background: <?=$hexColor?>;
    }
    body.color-custom #index article a, body.color-custom #post article a, body.color-custom #archive article a {
        color: <?=$hexColor?>;
    }
    body.color-custom #footer a:after, body.color-custom #header .nav li a:after, body.color-custom #post .post-meta a:after, body.color-custom #index .comments a:after, body.color-custom #index .post-content a:after, body.color-custom #post .post-content a:after, body.color-custom #archive .post-content a:after, body.color-custom #archive .comments a:after{
        border-color: <?=$hexColor?>;
    }
    body.color-custom #index .page-navigator li.current a:hover,body.color-custom #archive .page-navigator li.current a:hover {
        background: <?=$hexColor?>;
    }
    body.color-custom #index .page-navigator .current a,body.color-custom #archive .page-navigator .current a {
        background: <?=$hexColor?>;
        border-color: <?=$hexColor?>;
    }
    body.color-custom .post-content a {
        color: <?=$hexColor?>;
    }
    body.color-custom .post-near {
        color: <?=$hexColor?>;
    }
    body.color-custom #nprogress .bar {
        background: <?=$hexColor?>
    }
    body.color-custom #nprogress .peg {
        box-shadow: 0 0 10px <?=$hexColor?>,0 0 5px <?=$hexColor?>;
    }
    body.color-custom #nprogress .spinner-icon {
        border-top-color: <?=$hexColor?>;
        border-left-color: <?=$hexColor?>;
    }
    body.color-custom #backtop:hover {
        color: <?=$hexColor?>;
    }
    body.color-custom #nav .search-box .search{
        color: <?=$hexColor?>;
    }
    body.color-custom #comments a,body.color-custom #comments a:link,body.color-custom #comments a:visited {
        color: <?=$hexColor?>;
    }
    body.color-custom #comments .widget-title {
        color: <?=$hexColor?>;
    }
    body.color-custom #comment-form input:focus,body.color-custom #comment-form textarea:focus {
        border-color: <?=$hexColor?>;
    }
    body.color-custom #comment-form input#submit:hover {
        color: <?=$hexColor?>;
        border-color: <?=$hexColor?>;
    }
    body.color-custom #comments .page-navigator .current a {
        background: <?=$hexColor?>;
        border-color: <?=$hexColor?>;
        color: #fff;
    }
    body.color-custom #disqus_thread a {
        color: <?=$hexColor?>;
    }
    body.color-custom .ds-thread a {
        color: <?=$hexColor?>;
    }
    body.color-custom #footer a {
        color: <?=$hexColor?>;
    }
    body.color-custom .post-buttons a:hover {
        /*background-color: rgba(245, 135, 31, 0.5);*/
        background-color: <?=hex2RGBColor($hexColor, 0.5)?>;
        border-color: <?=$hexColor?>;
    }
    body.color-custom.show-post-qr-box a#toggle-post-qr-code, body.color-custom.show-reward-qr-box a#toggle-reward-qr-code {
        background-color: <?=$hexColor?>;
        border-color: <?=$hexColor?>;
    }
    body.color-custom form.protected input[type="submit"].submit:hover {
        border-color: <?=$hexColor?>;
        background-color: <?=hex2RGBColor($hexColor, 0.5)?>;
    }
    body.color-custom .github-box .github-box-download .download:hover{
        border-color: <?=$hexColor?> !important;
        background-color: <?=hex2RGBColor($hexColor, 0.4)?> !important;
    }
    body.color-custom.theme-white #comment-form input#submit:hover {
        color: <?=$hexColor?>;
        border-color: <?=$hexColor?>;
    }
    body.color-custom.theme-dark #index .post-content a:not(.no-icon), body.color-custom.theme-dark #archive .post-content a:not(.no-icon),body.color-custom.theme-dark #post .post-content a:not(.no-icon) {
        color: <?=$hexColor?>;
    }

    /* Color - Duoshuo */
    body.color-custom #ds-thread #ds-reset a.ds-like-thread-button {
        border-color: <?=$hexColor?>;
    }
    body.color-custom #ds-thread #ds-reset a.ds-like-thread-button:hover {
        background-color: <?=hex2RGBColor($hexColor, 0.5)?>;
    }
    body.color-custom #ds-reset .ds-highlight {
        color: <?=$hexColor?> !important;
    }
    body.color-custom #ds-thread #ds-reset a:hover {
        color: <?=$hexColor?>;
    }
    body.color-custom #ds-thread #ds-reset .ds-account-control.ds-active span {
        color: <?=$hexColor?>;
    }
    body.color-custom #ds-thread #ds-reset .ds-account-control span:hover {
        color: <?=$hexColor?>;
    }
    body.color-custom #ds-thread #ds-reset .ds-post-toolbar .ds-post-options .ds-sync label:hover {
        color: <?=$hexColor?>;
    }
    body.color-custom #ds-thread #ds-reset .ds-post-button:hover {
        color: <?=$hexColor?>;
        border-color: <?=$hexColor?>;
        background-color: <?=hex2RGBColor($hexColor, 0.5)?>;
    }
    body.color-custom #ds-thread #ds-reset .ds-login-buttons .ds-more-services:hover {
        color: <?=$hexColor?> !important;
    }
    body.color-custom #ds-thread #ds-reset .ds-sync a.ds-service-icon {
        color: <?=$hexColor?>;
    }
    body.color-custom #ds-thread #ds-reset a.ds-comment-context {
        color: <?=$hexColor?>;
    }
    body.color-custom #ds-thread #ds-reset li.ds-tab a.ds-current {
        border-bottom-color: <?=$hexColor?>;
    }
    body.color-custom #ds-thread #ds-reset .ds-sort a.ds-current, #ds-thread #ds-reset .ds-sort a:active {
        border-bottom-color: <?=$hexColor?>;
    }
    body.color-custom #ds-thread #ds-reset .ds-user-name {
        color: <?=$hexColor?>;
    }
    body.color-custom #ds-thread #ds-reset .ds-sort a:hover {
        border-bottom-color: <?=$hexColor?>;
    }
    body.color-custom #ds-thread #ds-reset .ds-post-liked a.ds-post-likes, body.color-custom #ds-thread #ds-reset .ds-reply-active .ds-post-reply {
        color: <?=$hexColor?>;
    }
    body.color-custom #ds-thread #ds-reset .ds-paginator a:hover, body.color-custom #ds-thread #ds-reset .ds-paginator a.ds-current {
        border-color: <?=$hexColor?>;
        background-color: <?=$hexColor?>;
        color: #fff;
    }
    body.color-custom #ds-thread #ds-reset a.ds-unread-comments-count {
        background-color: <?=$hexColor?>;
    }
    body.color-custom #ds-wrapper #ds-reset .ds-unread-list li a {
        color: <?=$hexColor?>;
    }
    body.color-custom.theme-white #ds-thread #ds-reset .ds-post-button:hover {
        color: <?=$hexColor?>;
        border-color: <?=$hexColor?>;
        background-color: <?=hex2RGBColor($hexColor, 0.5)?>;
    }
<?php if(isMobile()):?>
<?php else:?>
    /*桌面端*/
    body.color-custom #index .post .post-title:hover,body.color-custom #archive .post .post-title:hover {
        color: <?=$hexColor?>;
    }
    body.color-custom #index .more>a:hover,body.color-custom #archive .more>a:hover {
        border-color: <?=$hexColor?>;
        background-color: <?=hex2RGBColor($hexColor, 0.5)?>;
    }
<?php endif?>
</style>