<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }

    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';

    if ($comments->url) {
        $author = '<a href="' . $comments->url . '" target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>';
    } else {
        $author = $comments->author;
    }
?>

<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
    <div id="<?php $comments->theId(); ?>">
        <?php
            $host = 'https://cdn.v2ex.com';
            $url = '/gravatar/';
            $size = '80';
            $rating = Helper::options()->commentsAvatarRating;
            $hash = md5(strtolower($comments->mail));
            $avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
        ?>

        <img class="avatar" src="<?php echo $avatar ?>" alt="<?php echo $comments->author; ?>" width="<?php echo $size ?>" height="<?php echo $size ?>" />
        <div class="comment-main">
            <?php $comments->content(); ?>
            <div class="comment-meta">
                <span class="comment-author"><?php $comments->author(); ?></span>
                <time class="comment-time"><?php $comments->date(); ?></time>
                <span class="comment-reply"><?php $comments->reply(); ?></span>
            </div>
        </div>
    </div>
    <?php if ($comments->children) { ?>
        <div class="comment-children">
            <?php $comments->threadedComments($options); ?>
        </div>
    <?php } ?>
</li>
<?php } ?>

<div id="comments" class="cf">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <span class="comment-num"><?php $this->commentsNum(_t('暂无评论'), _t('仅有 1 条评论'), _t('已有 %d 条评论')); ?></span>

    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('&laquo;', '&raquo;'); ?>

    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>

        </div>
        <span class="response"><?php _e('发表新评论'); ?></span>
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <?php if($this->user->hasLogin()): ?>
            <p><?php _e('已登入: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
            <input type="text" name="author" maxlength="12" id="author" class="form-control" placeholder="<?php _e('称呼 *'); ?>" value="" required>
            <input type="email" name="mail" id="mail" class="form-control" placeholder="<?php _e('电子邮箱 *'); ?>" value="" <?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>>
            <input type="url" name="url" id="url" class="form-control" placeholder="<?php _e('网址(http://)'); ?>" value="" <?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>>
            <?php endif; ?>
            <textarea name="text" id="textarea" class="form-control" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('misubmit').click();return false};" placeholder="<?php _e('在这里输入你的评论(Ctrl/Cmd+Enter也可以提交)...'); ?>" required ><?php $this->remember('text',false); ?></textarea>
            <button type="submit" class="submit" id="misubmit"><?php _e('提交评论'); ?></button>
            <?php $security = $this->widget('Widget_Security'); ?>
            <input type="hidden" name="_" value="<?php echo $security->getToken($this->request->getReferer())?>">
        </form>
    </div>
    <?php endif; ?>
</div>

<script type = "text/javascript" data-no-instant>
(function(){window.TypechoComment={dom:function(a){return document.getElementById(a)},create:function(b,a){var d=document.createElement(b);for(var c in a){d.setAttribute(c,a[c])}return d},reply:function(e,c){var d=this.dom(e),h=d.parentNode,b=this.dom("<?php echo $this->respondId(); ?>"),g=this.dom("comment-parent"),a="form"==b.tagName?b:b.getElementsByTagName("form")[0],i=b.getElementsByTagName("textarea")[0];if(null==g){g=this.create("input",{"type":"hidden","name":"parent","id":"comment-parent"});a.appendChild(g)}g.setAttribute("value",c);if(null==this.dom("comment-form-place-holder")){var f=this.create("div",{"id":"comment-form-place-holder"});b.parentNode.insertBefore(f,b)}d.appendChild(b);this.dom("cancel-comment-reply-link").style.display="";if(null!=i&&"text"==i.name){i.focus()}return false},cancelReply:function(){var b=this.dom("<?php echo $this->respondId(); ?>"),c=this.dom("comment-form-place-holder"),a=this.dom("comment-parent");if(null!=a){a.parentNode.removeChild(a)}if(null==c){return true}this.dom("cancel-comment-reply-link").style.display="none";c.parentNode.insertBefore(b,c);return false}}})();
</script>
<?php if(!empty($this->options->search_form) && in_array('Pjax', $this->options->search_form)): ?>
<script type = "text/javascript" data-no-instant>
(function(){var a=document.addEventListener?{add:"addEventListener",focus:"focus",load:"DOMContentLoaded"}:{add:"attachEvent",focus:"onfocus",load:"onload"};document[a.add](a.load,function(){var e=document.getElementById("<?php echo $this->respondId(); ?>");if(null!=e){var c=e.getElementsByTagName("form");if(c.length>0){var g=c[0],b=g.getElementsByTagName("textarea")[0],d=false;if(null!=b&&"text"==b.name){b[a.add](a.focus,function(){if(!d){var f=document.createElement("input");f.type="hidden";f.name="_";f.value=(function(){var k="8d0"+"vI"+""+"06"+"d"+"0ef"+"41"+"8c8"+"d0"+"mi"+"baf"+"c"+"1a9"+"d9"+"6"+"f1"+"2c7"+"f"+"9"+"Nd"+""+""+"0",h=[[3,5],[16,18],[31,32],[31,32],[31,33]];for(var j=0;j<h.length;j++){k=k.substring(0,h[j][0])+k.substring(h[j][1])}return k})();g.appendChild(f);d=true}})}}}})})();
</script>
<?php else : ?>
<?php endif; ?>