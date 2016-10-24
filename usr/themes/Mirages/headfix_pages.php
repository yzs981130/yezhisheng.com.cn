<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<style type="text/css">
    /** 页面样式调整 */
    <?php if($this->showBanner && (!empty($this->options->otherOptions) && in_array('showBannerCurveStyle', $this->options->otherOptions))):?>
    #masthead::after {
        content: '';
        width: 150%;
        height: 4.375rem;
        background: #fff;
        left: -25%;
        bottom: -1.875rem;
        border-radius: 100%;
        position: absolute;
    }
    .inner::after {
        content: '';
        width: 150%;
        height: 4.375rem;
        background-color: #fff;
        left: -25%;
        bottom: -1.875rem;
        border-radius: 100%;
        position: absolute;
    }
    @media screen and (max-width: 37.4375rem){
        #masthead::after {
            width: 200%;
            left: -50%;
        }
        .inner::after {
            width: 200%;
            left: -50%;
        }
    }
    body.theme-dark #masthead {
        box-shadow: none;
        -webkit-box-shadow: none;
    }
    body.theme-dark #masthead::after {
        background-color: #2c2a2a;
    }
    body.theme-dark .inner::after {
        background-color: #2c2a2a;
    }
    #post article {
        margin-top: -0.625rem;
    }
    #index {
        padding-top: 0.375rem;
    }
    <?php endif?>
    <?php if($this->is('post')):?>
    div#comments{
        margin-top: 0;
    }
    <?php endif?>
    <?php if(!$this->is('post') || isPhone()):?>
    #qr-box {
        background-color: transparent;
    }
    <?php endif?>
    <?php if(!($this->is('post') && !isPhone() && (hasValue($this->options->postQRCodeURL) || hasValue($this->options->rewardQRCodeURL)))):?>
    .post-buttons, #qr-box {
        display: none;
    }
    #body-bottom {
        margin-top: 0;
    }
    <?php endif?>
    <?php if($this->is('page','links')): ?>
    #wrap {
        font-weight: 300;
    }
    #body .container {
        margin-top: 3.125rem;
    }
    .row{
        margin-left: 0;
        margin-right: 0;
    }
    <?php endif ?>
    <?php if($this->is('post') || $this->is('page')):?>
    #footer{
        padding: 1.25rem 0;
    }
    <?php if(hasValue($this->fields->contentWidth)):?>
    @media(min-width: 62rem) {
        .container {
            max-width: <?=is_numeric($this->fields->contentWidth)?($this->fields->contentWidth."px"):$this->fields->contentWidth?>;
        }
    }
    <?php endif?>
    <?php endif?>

    <?php if($this->fields->textAlign == 'left' || $this->fields->textAlign == 'center' || $this->fields->textAlign == 'right' || $this->fields->textAlign == 'justify'):?>
    .post-content p,.post-content blockquote,.post-content ul,.post-content ol,.post-content dl,.post-content table,.post-content pre {
        text-align: <?=$this->fields->textAlign?>;
    }
    <?php endif?>
    <?php if ($this->showBanner && (isTrue($this->fields->headTitle) || hasValue($this->fields->mastheadTitle || hasValue($this->fields->mastheadSubtitle)))):?>
    .inner {
        background-color: rgba(0,0,0,0.17);
    }
    #masthead {
        min-height: 12.5rem;
    }
    <?php endif?>
</style>
<style type="text/css">
    <?php
        if(hasValue($this->fields->css)) {
            echo $this->fields->css;
        }
    ?>
</style>