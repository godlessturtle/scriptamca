<!DOCTYPE html>
<html lang="tr-TR" class="dark-skin">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo html_escape($settings[0]->set_description); ?>" />
    <meta name="keywords" content="<?php echo html_escape($settings[0]->set_keywords); ?>" />
    <link rel="canonical" href="<?php echo base_url(); ?>" />
    <title>"<?php echo html_escape($term); ?>" arama sonucu &bull; Script Amca | <?php echo html_escape($settings[0]->set_title_suffix); ?></title>
    <?php $this->load->view('includes/header');?>

    <div id="tiepost-619-section-1818" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-right has-sidebar " style="">
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    <div class="main-content tie-col-md-8 tie-col-xs-12" role="main">
                        <header class="entry-header-outer container-wrapper">
                            <nav id="breadcrumb"><a href="<?php echo base_url(); ?>"><span class="fa fa-home" aria-hidden="true"></span> Anasayfa</a><em class="delimiter">/</em><span class="current">Script Ara</span></nav><h1 class="page-title">"<?php echo html_escape($term); ?>"</h1><small>Sorgusu için arama sonuçları</small></header><br>
                            <div class="mag-box wide-post-box">
                                <div class="container-wrapper">
                                    <div class="mag-box-container clearfix">
                                        <ul id="posts-container" data-layout="default" data-settings="{'uncropped_image':'jannah-image-grid','category_meta':true,'post_meta':true,'excerpt':true,'excerpt_length':'20','read_more':true,'title_length':0,'is_full':false}" class="posts-items">

                                            <?php foreach($searchPosts as $post){ ?>
                                            <li name="<?php echo $post->post_id; ?>" class="post-item cat-post post-2040 post type-post status-publish format-standard has-post-thumbnail category-php-scriptler category-tum-scriptler tag-easy-php-contact-form-script-v2-3-indir tie_standard">
                                                <a href="<?php echo html_escape(base_url($post->post_slug)); ?>" title="<?php echo html_escape($post->post_title); ?> - script indir, scriptamca" class="post-thumb">
                                                    <h5 class="post-cat-wrap"><span class="post-cat tie-cat-5"><?php echo html_escape(getCatNameByID(html_escape($post->post_category))); ?></span></h5>
                                                    <div class="post-thumb-overlay-wrap">
                                                        <div class="post-thumb-overlay">
                                                            <span class="icon"><i class="fa fa-eye"></i></span>
                                                        </div>
                                                    </div>
                                                    <img width="390" height="220" id="post_thumbnail" src="<?php echo html_escape(base_url($post->post_thumbnail)); ?>" class="attachment-jannah-image-large size-jannah-image-large wp-post-image" alt="<?php echo html_escape($post->post_title); ?> - script indir, scriptamca"
                                                    />
                                                </a>
                                                <div class="post-meta">
                                                    <span class="meta-author meta-item"><a href="javascript:void(0);"
                                                        class="author-name" title="Script Amca"><span class="fa fa-user"
                                                        aria-hidden="true"></span> Script Amca</a>
                                                    </span>
                                                    <span class="date meta-item"><span class="fa fa-clock-o" aria-hidden="true"></span>
                                                    <span><?php echo dateTranslate(date('d M Y', strtotime($post->createdAt))); ?></span></span>
                                                    <div class="tie-alignright"><span class="meta-comment meta-item">
                                                    </span><span class="meta-views meta-item "><span class="fa fa-eye"
                                                        aria-hidden="true"></span> <?php echo html_escape($post->post_views); ?> </span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="post-details">
                                                    <h3 class="post-title"><a href="<?php echo html_escape(base_url($post->post_slug)); ?>" title="<?php echo html_escape($post->post_title); ?>"><?php echo html_escape($post->post_title); ?></a></h3>
                                                    <p class="post-excerpt"><?php echo html_escape(limitChars(strip_tags($post->post_text), 180)); ?></p>
                                                    <a class="more-link" href="<?php echo html_escape(base_url($post->post_slug)); ?>">Devamını Gör <i class="fa fa-arrow-right"></i></a>
                                                </div>
                                            </li>
                                            <?php } ?>

                                        </ul>

                                        <div class="clearfix"></div>
                                        <br>               
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