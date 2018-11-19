<aside class="sidebar tie-col-md-4 tie-col-xs-12 normal-side is-sticky" aria-label="Primary Sidebar">
    <div class="theiaStickySidebar">
        <div class="widget social-icons-widget widget-content-only">
            <ul class="solid-social-icons">
                <?php 
                $link = html_escape($settings[0]->set_gp);
                if($link != '' || $link != null){ ?>
                    <li class="social-icons-item">
                        <a class="social-link  google-social-icon external" title="Google+" rel="nofollow" target="_blank" href="<?php echo html_escape($link); ?>
                        ">
                        <span class="fa fa-google-plus"></span>
                    </a>
                </li>
            <?php } ?>
            <?php 
            $link = html_escape($settings[0]->set_fb);
            if($link != '' || $link != null){ ?>
                <li class="social-icons-item">
                    <a class="social-link  facebook-social-icon external" title="Facebook" rel="nofollow" target="_blank" href="<?php echo html_escape($link); ?>
                    ">
                    <span class="fa fa-facebook"></span>
                </a>
            </li>
        <?php } ?>
        <?php 
        $link = html_escape($settings[0]->set_tw);
        if($link != '' || $link != null){ ?>
            <li class="social-icons-item">
                <a class="social-link  twitter-social-icon external" title="Twitter" rel="nofollow" target="_blank" href="<?php echo html_escape($link); ?>
                ">
                <span class="fa fa-twitter"></span>
            </a>
        </li>
    <?php } 
    $link = html_escape($settings[0]->set_pt);
    if($link != '' || $link != null){ ?>
        <li class="social-icons-item">
            <a class="social-link  pinterest-social-icon external" title="Pinterest" rel="nofollow" target="_blank" href="<?php echo html_escape($link); ?>
            ">
            <span class="fa fa-pinterest"></span>
        </a>
    </li>
<?php } $link = html_escape($settings[0]->set_ig);
if($link != '' || $link != null){ ?>
    <li class="social-icons-item">
        <a class="social-link  instagram-social-icon external" title="Instagram" rel="nofollow" target="_blank" href="<?php echo html_escape($link); ?>
        ">
        <span class="fa fa-instagram"></span>
    </a>
</li>
<?php } $link = html_escape($settings[0]->set_yt);
if($link != '' || $link != null){ ?>
    <li class="social-icons-item">
        <a class="social-link  youtube-social-icon external" title="Youtube" rel="nofollow" target="_blank" href="<?php echo html_escape($link); ?>
        ">
        <span class="fa fa-youtube"></span>
    </a>
</li>
<?php } ?>
</ul>
<div class="clearfix"></div>
</div>
<div id="search-3" class="container-wrapper widget widget_search">
    <div class="widget-title the-global-title">
        <h4>Ara<span class="widget-title-icon fa"></span></h4>
    </div>
    <form role="search" method="post" class="search-form" action="<?php echo base_url('script/ara/'); ?>">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <label>
            <span class="screen-reader-text">Arama:</span>
            <input type="search" class="search-field" placeholder="Ara &hellip;" value="" name="q" />
        </label>
        <input type="submit" class="search-submit" value="Ara" />
    </form>
    <div class="clearfix"></div>
</div>

<div id="text-html-widget-3" class="container-wrapper widget text-html">
    <div class="widget-title the-global-title">
        <h4>Duyuru<span class="widget-title-icon fa"></span></h4>
    </div>
    <div style="text-align:center;">
       Çalışmayan linkleri yorumlar kısmından amcanıza bildirin.
   </div>
   <div class="clearfix"></div>
</div>

    <div id="posts-list-widget-2" class="container-wrapper widget posts-list">
        <div class="widget-title the-global-title">
            <h4>Popüler Scriptler<span class="widget-title-icon fa"></span></h4>
        </div>
        <div class="">
            <ul class="posts-list-items">

               <?php foreach($popular as $pop){ ?>
                <li class="widget-post-list tie_standard">
                    <div class="post-widget-thumbnail">
                        <a href="<?php echo html_escape(base_url($pop->post_slug)); ?>" title="<?php echo html_escape($pop->post_title); ?> script indir, scriptamca" class="post-thumb">
                            <div class="post-thumb-overlay-wrap">
                                <div class="post-thumb-overlay">
                                    <span class="icon"></span>
                                </div>
                            </div>
                            <img width="220" height="72" style="max-height: 72px; height: 72px!important;
                            object-fit: cover;" src="<?php echo html_escape(base_url($pop->post_thumbnail)); ?>" class="attachment-jannah-image-small size-jannah-image-small wp-post-image" alt="<?php echo html_escape($pop->post_title); ?> Script indir,scriptamca"
                            /></a>
                        </div>
                        <div class="post-widget-body">
                            <h3 class="post-title"><a href="<?php echo html_escape(base_url($pop->post_slug)); ?>" title="<?php echo html_escape($pop->post_title); ?>"><?php echo html_escape($pop->post_title); ?></a></h3>
                            <div class="post-meta">
                                <span class="date meta-item"><span class="fa fa-clock-o" aria-hidden="true"></span> <span><?php echo dateTranslate(date('d M Y', strtotime($pop->createdAt))); ?></span></span>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>

    <div id="comments_avatar-widget-2" class="container-wrapper widget recent-comments-widget">
        <div class="widget-title the-global-title">
            <h4>Son Yorumlar<span class="widget-title-icon fa"></span></h4>
        </div>
        <ul>

            <li>
             <script type="text/javascript" src="http://scriptamcam.disqus.com/recent_comments_widget.js?num_items=5&hide_avatars=0&avatar_size=60&excerpt_length=100"></script>
         </li>
     </ul>
     <div class="clearfix"></div>
 </div>
 
<div id="posts-list-widget-3" class="container-wrapper widget posts-list">
    <div class="widget-title the-global-title">
        <h4>Yeni Scriptler<span class="widget-title-icon fa"></span></h4>
    </div>
    <div class="">
        <ul class="posts-list-items">
            <?php foreach($slider as $slide){ ?>
                <li class="widget-post-list tie_standard">
                    <div class="post-widget-thumbnail">
                        <a href="<?php echo html_escape(base_url($slide->post_slug)); ?>" title="<?php echo html_escape($slide->post_title); ?> script indir, scriptamca" class="post-thumb">
                            <div class="post-thumb-overlay-wrap">
                                <div class="post-thumb-overlay">
                                    <span class="icon"></span>
                                </div>
                            </div>
                            <img width="220" height="72" style="max-height: 72px;height: 72px!important;
                            object-fit: cover;" src="<?php echo html_escape(base_url($slide->post_thumbnail)); ?>" class="attachment-jannah-image-small size-jannah-image-small wp-post-image" alt="<?php echo html_escape($slide->post_title); ?> Script indir,scriptamca"
                            /></a>
                        </div>
                        <div class="post-widget-body">
                            <h3 class="post-title"><a href="<?php echo html_escape(base_url($slide->post_slug)); ?>" title="<?php echo html_escape($slide->post_title); ?>"><?php echo html_escape($slide->post_title); ?></a></h3>
                            <div class="post-meta">
                                <span class="date meta-item"><span class="fa fa-clock-o" aria-hidden="true"></span> <span><?php echo dateTranslate(date('d M Y', strtotime($slide->createdAt))); ?></span></span>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
 <div id="tag_cloud-2" class="container-wrapper widget widget_tag_cloud">
    <div class="widget-title the-global-title">
        <h4>Tüm Kategoriler<span class="widget-title-icon fa"></span></h4>
    </div>
    <div class="tagcloud">
        <?php foreach($categories as $cat){ ?>
            <a href="<?php echo html_escape(base_url('kategori/' . $cat->cat_slug)); ?>" class="tag-cloud-link tag-link-71 tag-link-position-1" style="font-size: 8pt;" aria-label="<?php echo html_escape($cat->cat_name) . "indir,full,scriptamca"; ?>">
                <?php echo html_escape($cat->cat_name); ?>
            </a>
        <?php } ?>

    </div>
    <div class="clearfix"></div>
</div>
<!-- Reklam 
<div id="stream-item-widget-5" class="container-wrapper widget stream-item-widget">
    <div class="stream-item-widget-content">
     reklam
 </div>
 <div class="clearfix"></div>
</div>-->
</div>
</aside>
