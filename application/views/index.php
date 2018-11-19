<!DOCTYPE html>
<html lang="tr-TR" class="dark-skin">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo html_escape($settings[0]->set_description); ?>" />
    <meta name="keywords" content="<?php echo html_escape($settings[0]->set_keywords); ?>" />
    <link rel="canonical" href="<?php echo base_url(); ?>" />
    <title>Anasayfa &bull; Script Amca | <?php echo html_escape($settings[0]->set_title_suffix); ?></title>
    <!-- header -->
    <?php $this->load->view('includes/header');?>
    <div id="tiepost-619-section-1639" class="section-wrapper container-full without-background">
        <div class="section-item full-width is-first-section" style="">
            <div class="container">
                <div class="tie-row main-content-row">
                    <div class="main-content tie-col-md-12">
                        <section id="tie-block_1550" class="slider-area mag-box">
                            <div id="tie-main-slider-12-block_1550" class="tie-main-slider main-slider grid-5-in-rows boxed-slider grid-slider-wrapper slide-mask tie-slick-slider-wrapper" data-slider-id="12" data-autoplay="true" data-speed="3000">
                                <div class="main-slider-wrapper">
                                    <div class="containerblock_1550">
                                        <div class="tie-slick-slider">
                                            <ul class="tie-slider-nav"></ul>
                                            <div class="slide">

                                                <?php for($i=0; $i<count($slider); $i++){ ?>
                                                    <div style="background-image: url(<?php echo base_url(html_escape($slider[$i]->post_thumbnail)); ?>)" class="grid-item slide-id-2128 tie-slide-<?php echo $i+1; ?> tie_standard">
                                                        <a href="<?php echo base_url($slider[$i]->post_slug); ?>" class="all-over-thumb-link"></a>
                                                        <div class="thumb-overlay">
                                                            <div class="thumb-content">
                                                                <h2 class="thumb-title"><a href="<?php echo base_url($slider[$i]->post_slug); ?>" title="<?php echo html_escape($slider[$i]->post_slug . "-" . $slider[$i]->post_tags); ?>">
                                                                    <?php echo html_escape($slider[$i]->post_title); ?></a></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tiepost-619-section-1818" class="section-wrapper container normal-width without-background">
            <div class="section-item sidebar-right has-sidebar " style="">
                <div class="container-normal">
                    <div class="tie-row main-content-row">
                        <div class="main-content tie-col-md-8 tie-col-xs-12" role="main">

                            <?php foreach($modules as $module){ ?>
                                <div id="tie-block_3167" class="mag-box big-post-left-box">
                                    <div class="container-wrapper">
                                        <div class="mag-box-title the-global-title">
                                            <h3><a href="<?php echo base_url('kategori/' . getCatSlugByID($module->module_category)); ?>" title="<?php echo html_escape($module->module_title); ?>"><?php echo html_escape($module->module_title); ?></a></h3>
                                        </div>
                                        <div class="mag-box-container clearfix">
                                            <ul class="posts-items posts-list-container">


                                                <?php $catposts = getCatPosts($module->module_category); for($i=0; $i<count($catposts);$i++){
                                                    if($i == 0){ ?>
                                                        <li class="post-item tie_standard">
                                                            <a href="<?php echo base_url(html_escape($catposts[$i]->post_slug)); ?>" title="<?php echo html_escape($catposts[$i]->post_title); ?>" class="post-thumb">
                                                                <h5 class="post-cat-wrap"><span class="post-cat tie-cat-5"><?php echo getCatNameByID(html_escape($catposts[$i]->post_category)); ?></span></h5>
                                                                <div class="post-thumb-overlay-wrap">
                                                                    <div class="post-thumb-overlay">
                                                                        <span class="icon"><i class="fa fa-eye"></i></span>
                                                                    </div>
                                                                </div>
                                                                <img width="390" height="220" src="<?php echo html_escape($catposts[$i]->post_thumbnail); ?>" class="attachment-jannah-image-large size-jannah-image-large wp-post-image" alt="<?php echo html_escape($catposts[$i]->post_title); ?> indir, full indir"
                                                                />
                                                            </a>
                                                            <div class="post-details">
                                                                <div class="post-meta">
                                                                    <span class="meta-author meta-item"><a href="javascript:void(0)"
                                                                     class="author-name" title="Script Amca"><span class="fa fa-user"
                                                                     aria-hidden="true"></span> Script Amca
                                                                 </a>
                                                             </span>
                                                             <span class="date meta-item">
                                                                <span class="fa fa-clock-o" aria-hidden="true"></span> <span><?php echo dateTranslate(date('d M Y', strtotime($catposts[$i]->createdAt))); ?></span></span>
                                                                <div class="tie-alignright"><span class="meta-comment meta-item">
                                                                </span>
                                                                <span class="meta-views meta-item ">
                                                                    <span class="fa fa-comment" aria-hidden="true"> </span> 58
                                                                    <span class="fa fa-eye" aria-hidden="true"></span> <?php echo html_escape($catposts[$i]->post_views); ?>
                                                                </span>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <h3 class="post-title"><a href="<?php echo base_url(html_escape($catposts[$i]->post_slug)); ?>" title="<?php echo html_escape($catposts[$i]->post_title) . "-indir-full-" . html_escape($catposts[$i]->post_tags); ?>"><?php echo html_escape($catposts[$i]->post_title); ?></a></h3>
                                                        <p class="post-excerpt"><?php echo html_escape(limitChars(strip_tags($catposts[$i]->post_text), 145)); ?></p>
                                                        <a class="more-link" href="<?php echo base_url($catposts[$i]->post_slug); ?>">Devamını Gör</a>
                                                    </div>
                                                </li>
                                            <?php } elseif ($i>=1){  ?>



                                                <li class="post-item tie_standard">
                                                    <a href="<?php echo base_url($catposts[$i]->post_slug); ?>" title="<?php echo html_escape($catposts[$i]->post_title); ?> indir, full indir, scriptamca" class="post-thumb">
                                                        <div class="post-thumb-overlay-wrap">
                                                            <div class="post-thumb-overlay">
                                                                <span class="icon"><i class="fa fa-eye"></i></span>
                                                            </div>
                                                        </div>
                                                        <img width="220" height="150" src="<?php echo base_url($catposts[$i]->post_thumbnail); ?>" class="attachment-jannah-image-small size-jannah-image-small wp-post-image" alt="<?php echo html_escape($catposts[$i]->post_title); ?> indir, full indir, full"
                                                        />
                                                    </a>
                                                    <div class="post-details">
                                                        <div class="post-meta"><span class="date meta-item"><span class="fa fa-clock-o"
                                                            aria-hidden="true"></span> <span><?php echo dateTranslate(date('d M Y', strtotime($catposts[$i]->createdAt))); ?></span></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <h3 class="post-title"><a href="<?php echo base_url($catposts[$i]->post_slug); ?>" title="<?php echo html_escape($catposts[$i]->post_title); ?> indir, full indir, scriptamca"><?php echo html_escape($catposts[$i]->post_title); ?></a></h3>
                                                    </div>
                                                </li>
                                            <?php }  } ?>


                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div id="tie-recent_1589" class="mag-box wide-post-box top-news-box" data-current="1">
                            <div class="container-wrapper">
                                <div class="mag-box-title the-global-title">
                                    <h3>Son Eklenenler</h3>
                                </div>
                                <div class="mag-box-container clearfix">
                                    <ul class="posts-items posts-list-container">


                                        <?php foreach($slider as $slide){ ?>
                                            <li class="post-item post-2040 post type-post status-publish format-standard has-post-thumbnail category-php-scriptler category-tum-scriptler tag-easy-php-contact-form-script-v2-3-indir tie_standard">
                                                <a href="<?php echo html_escape(base_url($slide->post_slug)); ?>" title="<?php echo html_escape($slide->post_title); ?> - script indir, scriptamca" class="post-thumb">
                                                    <h5 class="post-cat-wrap"><span class="post-cat tie-cat-5"><?php echo html_escape(getCatNameByID(html_escape($slide->post_category))); ?></span></h5>
                                                    <div class="post-thumb-overlay-wrap">
                                                        <div class="post-thumb-overlay">
                                                            <span class="icon"><i class="fa fa-eye"></i></span>
                                                        </div>
                                                    </div>
                                                    <img width="390" height="220" id="post_thumbnail" src="<?php echo html_escape(base_url($slide->post_thumbnail)); ?>" class="attachment-jannah-image-large size-jannah-image-large wp-post-image" alt="<?php echo html_escape($slide->post_title); ?> - script indir, scriptamca"
                                                    />
                                                </a>
                                                <div class="post-meta">
                                                    <span class="meta-author meta-item"><a href="javascript:void(0);"
                                                        class="author-name" title="Script Amca"><span class="fa fa-user"
                                                        aria-hidden="true"></span> Script Amca</a>
                                                    </span>
                                                    <span class="date meta-item"><span class="fa fa-clock-o" aria-hidden="true"></span>
                                                    <span><?php echo dateTranslate(date('d M Y', strtotime($slide->createdAt))); ?></span></span>
                                                    <div class="tie-alignright"><span class="meta-comment meta-item"><a
                                                        href="javascript:void(0);"><span
                                                        class="fa fa-comments" aria-hidden="true"></span> 0</a>
                                                    </span><span class="meta-views meta-item "><span class="fa fa-eye"
                                                        aria-hidden="true"></span> <?php echo html_escape($slide->post_views); ?> </span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="post-details">
                                                    <h3 class="post-title"><a href="<?php echo html_escape(base_url($slide->post_slug)); ?>" title="<?php echo html_escape($slide->post_title); ?>"><?php echo html_escape($slide->post_title); ?></a></h3>
                                                    <p class="post-excerpt"><?php echo html_escape(limitChars(strip_tags($slide->post_text), 180)); ?></p>
                                                    <a class="more-link" href="<?php echo html_escape(base_url($slide->post_slug)); ?>">Devamını Gör <i class="fa fa-arrow-right"></i></a>
                                                </div>
                                            </li>
                                        <?php } ?>



                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <?php $this->load->view('includes/sidebar');?>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php $this->load->view('includes/footer');?>
</body>

</html>