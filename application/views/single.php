<!DOCTYPE html>
<html lang="tr-TR" class="dark-skin">
<head>
	<?php $single = $getSingle[0]; ?>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="<?php echo html_escape(mb_substr(strip_tags($single->post_text), 0, 160)); ?>" />
	<meta name="keywords" content="<?php echo html_escape($settings[0]->set_keywords); ?>" />
	<link rel="canonical" href="<?php echo base_url(); ?>" />
	<title><?php echo html_escape($single->post_title); ?> | <?php echo html_escape($settings[0]->set_title_suffix); ?></title>
	<?php  $this->load->view('includes/header'); ?>
	<div class="container">
		<div style="text-align: center;" class="container-wrapper fullwidth-entry-title"> <header class="entry-header-outer">
			<nav style="margin:0px;" id="breadcrumb"><a href="<?php echo base_url(); ?>"><span class="fa fa-home" aria-hidden="true"></span> Anasayfa</a><em class="delimiter">/</em><a href="<?php echo base_url('kategori/' . getCatSlugByID($single->post_category)); ?>"><?php echo getCatNameByID(html_escape($single->post_category)); ?></a><em class="delimiter">/</em><span class="current"><?php echo html_escape($single->post_title); ?></span></nav>
			<div class="entry-header">
				<h5 class="post-cat-wrap"><a class="post-cat tie-cat-5" href="<?php echo base_url('kategori/' . getCatSlugByID($single->post_category)); ?>"><?php echo getCatNameByID(html_escape($single->post_category)); ?></a></h5>
				<h1 class="post-title entry-title"><?php echo html_escape($single->post_title); ?></h1>
				<div class="post-meta">
					<span class="meta-author-avatar">
						<a title="Script Amca, script indir" href="javascript:void(0);"><img src="<?php echo base_url('assets/images/scriptamca.jpg'); ?>" width="140" height="140" alt="Script Amca" class="avatar avatar-140 wp-user-avatar wp-user-avatar-140 alignnone photo" />
						</a>
					</span>
					<span class="meta-author meta-item"><a href="javascript:void(0);" class="author-name" title="Script Amca">Script Amca</a>
					</span>
					<span class="date meta-item"><span class="fa fa-clock-o" aria-hidden="true"></span> <span><?php echo dateTranslate(date('d M Y', strtotime($single->createdAt))); ?></span></span><div class="tie-alignright"><span class="meta-comment meta-item"><a href="#disqus_thread"><span class="fa fa-comments" aria-hidden="true"></span> 0</a></span><span class="meta-views meta-item "><span class="fa fa-eye" aria-hidden="true"></span> <?php echo html_escape($single->post_views); ?> </span> </div><div class="clearfix"></div></div> </div>
				</header>
			</div>
		</div>
		<div class="container"></div>
		<div id="content" class="site-content container">
			<div class="tie-row main-content-row">
				<div class="main-content tie-col-md-8 tie-col-xs-12" role="main">
					<article id="the-post" class="container-wrapper post-content tie_standard">
						<div class="entry-content entry clearfix">
							<p><img style="width: 100%;max-height:400px;object-fit: cover;" class="size-full wp-image-2113 aligncenter" src="<?php echo base_url(html_escape($single->post_thumbnail)); ?>" alt="<?php echo html_escape($single->post_title); ?>" width="590" height="300"  sizes="(max-width: 590px) 100vw, 590px" /></p>
							<p style="text-align: center;">
								<center><?php echo $single->post_text; ?>
							</center>
						</p>
						<p style="text-align: center;"><a target="_blank" href="<?php echo html_escape($single->post_link); ?>" class="shortc-button big green "><span class="fa fa fa-download" aria-hidden="true"></span> Scripti İndir</a>


							<div class="clearfix"></div>
							<div class="toggle tie-sc-close">
								<h3 class="toggle-head">RAR Şifresi <span class="fa fa-angle-down" aria-hidden="true"></span></h3>
								<div class="toggle-content"><a href="https://www.scriptamca.com">www.scriptamca.com</a>
								</div>
							</div>
							<p style="text-align: center;">
								<div class="post-bottom-meta">
									<div class="post-bottom-meta-title">
										<span class="fa fa-tags" aria-hidden="true"></span> Etiketler
									</div>
									<span class="tagcloud">
										<?php $tags = explode(',', $single->post_tags);
										foreach($tags as $tag){ ?>
											<a title="<?php echo html_escape($tag); ?>,scriptleri indir" href="javascript:void(0);" rel="tag"><?php echo html_escape($tag); ?></a>
										<?php } ?>
									</span>
								</div>
							</div>
							<hr style="margin-top:20px; margin-bottom:20px;" class="divider divider-solid">
							<div class="post-footer post-footer-on-bottom">
								<div class="post-footer-inner">
									<?php $current_url = current_url(); ?>
									<div class="share-links  share-centered">
										<a href="https://www.facebook.com/sharer.php?u=<?php echo $current_url; ?>" rel="external" target="_blank" class="facebook-share-btn large-share-button"><span class="fa fa-facebook"></span> <span class="social-text">Facebook</span></a>

										<a href="https://twitter.com/intent/tweet?text=<?php echo $single->post_title; ?>&url=<?php echo $current_url; ?>" rel="external nofollow" target="_blank" class="twitter-share-btn large-share-button external"><span class="fa fa-twitter"></span> <span class="social-text">Twitter</span></a>


										<a href="https://plusone.google.com/_/+1/confirm?hl=tr&#038;url=<?php echo $current_url; ?>&name=<?php echo html_escape($single->post_title); ?>" rel="external nofollow" target="_blank" class="google-share-btn large-share-button external"><span class="fa fa-google"></span> <span class="social-text">Google+</span></a>

										<a href="https://www.linkedin.com/shareArticle?mini=true&#038;url=<?php echo $current_url; ?>&title=<?php echo html_escape($single->post_title); ?>" rel="external" target="_blank" class="linkedin-share-btn"><span class="fa fa-linkedin"></span> <span class="screen-reader-text">LinkedIn</span></a>

										

										<a href="https://pinterest.com/pin/create/button/?url=<?php echo $current_url; ?>&;description=<?php echo html_escape($single->post_title); ?>&media=<?php echo base_url($single->post_thumbnail); ?>" rel="external" target="_blank" class="pinterest-share-btn"><span class="fa fa-pinterest"></span> <span class="screen-reader-text">Pinterest</span></a>

										<a href="whatsapp://send?text=<?php echo html_escape($single->post_title); ?> - <?php echo $current_url; ?>" rel="external nofollow" target="_blank" class="whatsapp-share-btn external"><span class="fa fa-whatsapp"></span> <span class="screen-reader-text">WhatsApp ile Paylaş</span></a> </div>
									</div>
								</div>
							</article>
							<div class="post-components">
								<div class="about-author container-wrapper">
									<div class="author-avatar">
										<a href="javascript:void(0);">
											<img style="object-fit: cover" src="<?php echo base_url('assets/images/scriptamca.jpg'); ?>" width="150" height="150" alt="Script Amca" class="avatar avatar-180 wp-user-avatar wp-user-avatar-180 alignnone photo" /> </a>
										</div>
										<div class="author-info">
											<h3 class="author-name"><a href="javascript:void(0);">Script Amca</a></h3>
											<div class="author-bio">
											Bazen hayat seni öyle zorlar ki yeğenim yolun başında kimdin unutursun. </div>
											<ul class="social-icons">
												<li class="social-icons-item">
													<a href="<?php echo base_url(); ?>" rel="external" target="_blank" class="social-link url-social-icon">
														<span class="fa fa-fa fa-home" aria-hidden="true"></span>
														<span class="screen-reader-text">Script Amca, Script İndir</span>
													</a>
												</li>

											</ul> </div>
											<div class="clearfix"></div>
										</div>
										<div class="prev-next-post-nav container-wrapper media-overlay">

											<?php $randomPost1 = $randomPosts[0]; $randomPost2 = $randomPosts[1]; ?>
											<div class="tie-col-xs-6 prev-post">
												<a href="<?php echo base_url(html_escape($randomPost1->post_slug)); ?>" style="background-image: url(<?php echo base_url(html_escape($randomPost1->post_thumbnail)); ?>)" class="post-thumb" rel="prev">
													<div class="post-thumb-overlay-wrap">
														<div class="post-thumb-overlay">
															<span class="icon"></span>
														</div>
													</div>
												</a>
												<a href="<?php echo base_url(html_escape($randomPost1->post_slug)); ?>" rel="prev">
													<h3 class="post-title"><?php echo html_escape($randomPost1->post_title); ?></h3>
												</a>
											</div>
											<div class="tie-col-xs-6 next-post">
												<a href="<?php echo base_url(html_escape($randomPost2->post_slug)); ?>" style="background-image: url(<?php echo base_url(html_escape($randomPost2->post_thumbnail)); ?>)" class="post-thumb" rel="next">
													<div class="post-thumb-overlay-wrap">
														<div class="post-thumb-overlay">
															<span class="icon"></span>
														</div>
													</div>
												</a>
												<a href="<?php echo base_url(html_escape($randomPost2->post_slug)); ?>" rel="next">
													<h3 class="post-title"><?php echo html_escape($randomPost2->post_title); ?></h3>
												</a>
											</div>



										</div>
										<div id="related-posts" class="container-wrapper has-extra-post">
											<div class="mag-box-title the-global-title">
												<h3>Benzer Scriptler</h3>
											</div>
											<div class="related-posts-list">

												<?php foreach($relatedPosts as $rel){ ?>
													<div class="related-item tie_standard">
														<a href="<?php echo base_url(html_escape($rel->post_slug)); ?>" title="<?php echo html_escape($rel->post_title); ?> Script indir" class="post-thumb">
															<div class="post-thumb-overlay-wrap">
																<div class="post-thumb-overlay">
																	<span class="icon"></span>
																</div>
															</div>
															<img style="object-fit: cover;width: 100%; height: 160px;" width="390" height="220" src="<?php echo base_url(html_escape($rel->post_thumbnail)); ?>" class="attachment-jannah-image-large size-jannah-image-large wp-post-image" alt="<?php echo html_escape($rel->post_title); ?> Script indir" /></a><div class="post-meta"><span class="date meta-item"><span class="fa fa-clock-o" aria-hidden="true"></span> <span><?php echo dateTranslate(date('d M Y', strtotime($rel->createdAt))); ?></span></span><div class="tie-alignright"><span class="meta-views meta-item "><span class="fa fa-eye" aria-hidden="true"></span> <?php echo html_escape($rel->post_views); ?> </span> </div><div class="clearfix"></div></div>
															<h3 class="post-title"><a href="<?php echo base_url(html_escape($rel->post_slug)); ?>" title="<?php echo html_escape($rel->post_slug); ?> script full indir, scriptamca"><?php echo html_escape($rel->post_title); ?></a></h3>
														</div>
													<?php } ?>
												</div>
											</div><script id="dsq-count-scr" src="//scriptamcam.disqus.com/count.js" async></script>
											<div id="comments" class="comments-area">
												<div id="disqus_thread"></div>
												<script>

(function() { // DON'T EDIT BELOW THIS LINE
	var d = document, s = d.createElement('script');
	s.src = 'https://scriptamcam.disqus.com/embed.js';
	s.setAttribute('data-timestamp', +new Date());
	(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Javascript'i etkinleştirdiğinizden emin olunuz. <a rel="nofollow" href="https://disqus.com/?ref_noscript">Disqus ile oluşturuldu.</a></noscript>
<script id="dsq-count-scr" src="//scriptamcam.disqus.com/count.js" async></script>
</div>
</div>
</div>
<?php $this->load->view('includes/sidebar'); ?>
</div>
</div>
<?php $this->load->view('includes/footer'); ?>

