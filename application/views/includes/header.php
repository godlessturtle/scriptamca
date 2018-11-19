<meta name="theme-color" content="#0088ff" />
<link rel="sitemap" href="<?php echo base_url('sitemap/sitemap.xml'); ?>" type="application/xml" />
<link rel='stylesheet' href='<?php echo base_url('assets/css/style.css');  ?>' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/skin.css' type='text/css' media='all' />
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' type='text/css' media='all' />
<script type='text/javascript' src='<?php echo base_url('assets/'); ?>js/jquery.js'></script>
<script type='text/javascript' src='<?php echo base_url('assets/'); ?>js/jquery-migrate.min.js'></script>

<link rel="icon" href="<?php echo base_url('assets/images/favicon'); ?>" sizes="32x32" />

<script type='text/javascript'>
	/* <![CDATA[ */
	var tie = {"is_rtl":"","ajaxurl":"","mobile_menu_active":"true","mobile_menu_top":"","mobile_menu_parent":"","lightbox_all":"true","lightbox_gallery":"true","lightbox_skin":"dark","lightbox_thumb":"horizontal","lightbox_arrows":"true","is_singular":"1","is_sticky_video":"","reading_indicator":"true","lazyload":"","select_share":"","select_share_twitter":"true","select_share_facebook":"","select_share_linkedin":"true","select_share_email":"true","facebook_app_id":"","twitter_username":"scriptamca","responsive_tables":"true","sticky_behavior":"upwards","sticky_desktop":"true","sticky_mobile":"true","is_buddypress_active":"","ajax_loader":"","type_to_search":"1","lang_no_results":"Hi\u00e7bir\u015fey Bulunamad\u0131"};
	/* ]]> */
</script>

</head>
<body id="tie-body"  class="home page-template-default page page-id-619 boxed-layout wrapper-has-shadow blocks-title-style-1 magazine2 is-desktop is-header-layout-2 has-builder hide_banner_header">
	<div class="background-overlay">
		<div id="tie-container" class="site tie-container">
			<div id="tie-wrapper">
				<header id="theme-header" class="header-layout-2 main-nav-dark main-nav-below main-nav-boxed top-nav-active top-nav-dark top-nav-above has-shadow mobile-header-centered">
					<nav id="top-nav" data-skin="search-in-top-nav live-search-dark" class="has-date-breaking-components has-breaking-news live-search-parent" aria-label="Secondary Navigation">
						<div class="container">
							<div class="topbar-wrapper">
								<div class="topbar-today-date">
									<span class="fa fa-clock-o" aria-hidden="true"></span>
									<strong class="inner-text"><?php echo dateTranslate(date('d M Y, D')); ?></strong>
								</div>
								<div class="tie-alignleft">
									<div class="breaking controls-is-active">
										<span class="breaking-title">
											<span class="fa fa-bolt" aria-hidden="true"></span>
											<span class="breaking-title-text">Yeni Eklenenler</span>
										</span>
										<ul id="breaking-news-in-header" class="breaking-news" data-type="reveal" data-arrows="true">

											<?php foreach($topSlider as $top){ ?>
												<li class="news-item">
													<a href="<?php echo html_escape($top->post_slug); ?>" title="<?php echo html_escape($top->post_title); ?> indir, script indir"><?php echo html_escape($top->post_title); ?></a>
												</li>
											<?php } ?>

										</ul>
									</div>
								</div>
								<div class="tie-alignright">
									<ul class="components"> <li class="search-compact-icon menu-item custom-menu-link">
										<a href="#" data-type="modal-trigger" class="tie-search-trigger">
											<span class="fa fa-search" aria-hidden="true"></span>
											<span class="screen-reader-text">Ara</span>
										</a>
										<span class="cd-modal-bg"></span>
									</li>
									<li class="random-post-icon menu-item custom-menu-link">
										<a href="<?php echo base_url('rastgele/script'); ?>" class="random-post" title="Rastgele Script">
											<span class="fa fa-random" aria-hidden="true"></span>
											<span class="screen-reader-text">Rastgele Script</span>
										</a>
									</li>
									
								</ul> </div>
							</div>
						</div>
					</nav>
					<div class="container">
						<div class="tie-row logo-row">
							<div class="logo-wrapper">
								<div class="tie-col-md-4 logo-container">
									<a href="#" id="mobile-menu-icon">
										<span class="nav-icon"></span>
									</a>
									<div id="logo" style="margin-top: 20px; margin-bottom: 20px;">
										<a title="Script Amca, nulled, script, indir" href="<?php echo base_url(); ?>">
											<img src="<?php echo base_url('assets/images/scriptamca-logo.png'); ?>" alt="Script Amca - Ücretsiz - Full Script İndir" class="logo_normal" width="190" height="114" style="max-height:114px; width: auto;">
											<img src="<?php echo base_url('assets/images/scriptamca-logo.png'); ?>" alt="Script Amca - Ücretsiz - Full Script İndir" class="logo_2x" width="190" height="114" style="max-height:114px; width: auto;">
											<h1 class="h1-off">Script Amca</h1>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="main-nav-wrapper">
						<nav id="main-nav" class="" aria-label="Primary Navigation">
							<div class="container">
								<div class="main-menu-wrapper">
									<div id="menu-components-wrap">
										<div class="main-menu main-menu-wrap tie-alignleft">

											<div id="main-nav-menu" class="main-menu">

												<ul id="menu-header-menu" class="menu" role="menubar">
													<li id="menu-item-1479" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1479 menu-item-has-icon"><a href="<?php echo base_url(); ?>"> <span aria-hidden="true" class="fa fa-home"></span> Anasayfa</a>

													</li>
													<?php foreach($menus as $menu){ if($menu->menu_type == 1){ ?>

														<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children mega-menu mega-cat" aria-haspopup="true" aria-expanded="false" tabindex="0"><a href="<?php echo html_escape(base_url($menu->menu_url)); ?>"> <span aria-hidden="true" class="<?php echo html_escape($menu->menu_icon); ?>"></span> <?php echo html_escape($menu->menu_title); ?></a>



															<div class="mega-menu-block menu-sub-content" style="opacity: 0; display: none; transform: translateY(-2.82025px);">
																
																<div class="mega-menu-content">
																	<div class="mega-cat-wrapper">
																		<ul class="mega-cat-sub-categories cats-vertical">
																			<li><a href="<?php echo html_escape(base_url($menu->menu_url)); ?>" class="is-active mega-sub-cat"><?php echo html_escape(getCatNameByID($menu->menu_kategori)); ?></a></li>
																		</ul>
																		<div class="mega-cat-content mega-cat-sub-exists vertical-posts">
																			
																			<div class="mega-ajax-content mega-cat-posts-container clearfix">
																				<ul id="loaded-8" style="display: block;">

																					<?php foreach(getCatPosts($menu->menu_kategori, 4) as $cat){ ?>
																						<li class="mega-menu-post tie_standard" style="display: list-item; opacity: 1; transform: translateY(0px);">


																							<div class="post-thumbnail">
																								<a class="post-thumb" href="<?php echo base_url($cat->post_slug); ?>" title="<?php echo html_escape($cat->post_title); ?>">

																									<div class="post-thumb-overlay-wrap">
																										<div class="post-thumb-overlay">
																											<span class="icon"></span>
																										</div>
																									</div>

																									<img width="390" height="220" src="<?php echo html_escape(base_url($cat->post_thumbnail)); ?>" class="attachment-jannah-image-large size-jannah-image-large wp-post-image" alt="<?php echo html_escape($cat->post_title); ?>">
																								</a>
																							</div><!-- .post-thumbnail /-->

																							<div class="post-details">

																								<h3 class="post-box-title">
																									<a class="mega-menu-link" href="<?php echo base_url($cat->post_slug); ?>" title="<?php echo html_escape($cat->post_title); ?> indir, full, scriptamca"><?php echo html_escape($cat->post_title); ?></a>
																								</h3>

																								<div class="post-meta"><span class="date meta-item"><span class="fa fa-clock-o" aria-hidden="true"></span> <span><?php echo dateTranslate(date('d M Y', strtotime($cat->createdAt))); ?></span></span><div class="clearfix"></div></div><!-- .post-meta -->
																							</div>

																						</li>
																					<?php } ?>
																					
																				</ul>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</li>

													<?php } elseif($menu->menu_type == 0){ ?>

														<li id="menu-item-1479" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1479 menu-item-has-icon"><a href="<?php echo base_url($menu->menu_url); ?>"> <span aria-hidden="true" class="<?php echo html_escape($menu->menu_icon); ?>"></span> <?php echo html_escape($menu->menu_title); ?></a>

														</li>
													<?php } elseif ($menu->menu_type == 2) { ?>
														<li id="menu-item-1479" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1479"><a href="<?php echo html_escape($menu->menu_url); ?>"> <span aria-hidden="true" class="<?php echo html_escape($menu->menu_icon); ?>"></span> <?php echo html_escape($menu->menu_title); ?></a>
														</li>
													<?php } } ?>
												</ul>
											</div> 
										</div>
									</div>
								</div>
							</div>
						</nav>
					</div>
				</header>
