<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

        <div class="container">
            <div class="wrapper main" role="main">
                <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                    <h1 class="post-title" itemprop="name headline"><a href="<?php $this->permalink() ?>" itemtype="url"><?php $this->title() ?></a></h1>
                    <div class="post-meta">
                        <span datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('F jS , Y'); ?></span>
                    </div>
                    <div class="post-content cf" itemprop="articleBody">
                        <?php parseContent($this); ?>

<!-- 打赏 -->
  <div style="padding: 10px 0; margin: 20px auto; width: 100%; font-size:16px; text-align: center;">

    <button id="rewardButton" disable="enable" onclick="var qr = document.getElementById('QR'); if (qr.style.display === 'none') {qr.style.display='block';} else {qr.style.display='none'}">
      <span>打赏</span>
    </button>
    <div id="QR" style="display: none;">
      
        <div id="wechat" style="display: inline-block">
          <a class="fancybox" rel="group"><img id="wechat_qr" src="https://img.yezhisheng.com.cn/usr/uploads/wechat.jpg" alt="WeChat Pay"></a>
          <p>微信打赏</p>
        </div>
        <div id="alipay" style="display: inline-block">
          <a class="fancybox" rel="group"><img id="alipay_qr" src="https://img.yezhisheng.com.cn/usr/uploads/alipay.jpg" alt="Alipay"></a>
          <p>支付宝打赏</p>
        </div>
    </div>
  </div>
<!-- 打赏 -->

                        <div class="post-copyright" align="center">
                            <div class="alert" role="alert">最后编辑时间为: <?php echo date('F jS , Y \\a\t h:i a' , $this->modified); ?><br>本文由 <a href="<?php $this->author->permalink(); ?>"><?php $this->author() ?></a> 创作，采用 <a target="_blank" href="https://creativecommons.org/licenses/by/4.0/" rel="external nofollow">知识共享署名 4.0</a> 国际许可协议进行许可<br>可自由转载、引用，但需署名作者且注明文章出处</div>
                        </div>
                        <div class="post-tags"><?php $this->tags(' ', true, ''); ?></div>
                    </div>
                </article>
                <?php $this->need('comments.php'); ?>
            </div>
        </div>
<?php $this->need('footer.php'); ?>