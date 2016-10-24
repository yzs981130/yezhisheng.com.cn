<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<a id="toggle-nav"><i class="fa fa-bars"></i></a>
<div id="canvas">
    <div id="nav">
        <div class="author">
            <a href="<?php Helper::options()->siteUrl()?>/about.html">
                <img src="<?php Helper::options()->sideMenuAvatar();?>" alt="Avatar" width="100" height="100"/>
            </a>
        </div>
        <div class="search-box">
            <form class="form" id="search-form">
                <input id="search" type="text" name="s" required placeholder="<?php _e(LANG_CHN?'搜索...':'Search here...')?>" class="search">
                <button id="search_btn" type="submit" class="search-btn"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <ul class="menu">
            <?php if($this->user->hasLogin() || (!empty($this->options->otherOptions) && in_array('alwaysShowDashboardInSideMenu', $this->options->otherOptions))):?>
            <li style="margin-bottom: 30px;"><a href="<?php Helper::options()->adminUrl()?>" target="_blank"><?php _e(LANG_CHN?'控制台':'Dashboard')?></a></li>
            <?php endif?>
            <li><a href="<?php Helper::options()->siteUrl()?>"><?php _e(LANG_CHN?'首页':'Home')?></a></li>
            <li>
                <a class="slide-toggle"><?php _e(LANG_CHN?'文章分类':'Category')?></a>
                <div class="category-list hide">
                    <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=list'); ?>
                </div>
            </li>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
            <li><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
    </div>
</div>