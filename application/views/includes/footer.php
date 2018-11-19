<footer id="footer" class="site-footer dark-skin">
    <div id="site-info" class="">
        <div class="container">
            <div class="tie-row">
                <div class="tie-col-md-12">
                    <div class="copyright-text copyright-text-first">&copy; Copyright 2018, Tüm Hakları Saklıdır.<br>
                     <a rel="dofollow" href="<?php echo base_url(); ?>">Script Amca</a></div>
                     <div class="copyright-text copyright-text-second">
                        <a href="//www.dmca.com/Protection/Status.aspx?ID=f91884e6-a755-4a24-a3d5-b8f8f764df85" title="DMCA.com Protection Status" class="dmca-badge external" rel="nofollow" target="_blank"> <img src="//images.dmca.com/Badges/dmca-badge-w100-5x1-09.png?ID=f91884e6-a755-4a24-a3d5-b8f8f764df85" alt="DMCA.com Protection Status"></a>
                        <script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js">
                        </script>
                    </div>
                    <div class="footer-menu">
                        <ul id="menu-footer-menu" class="menu">
                            <li id="menu-item-1" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1786"><a href="<?php echo base_url('sayfa/gizlilik-politikasi'); ?>">Gizlilik Politikası</a></li>
                            <li id="menu-item-2" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1785"><a href="<?php echo base_url('sayfa/dmca-iletisim'); ?>">DMCA İletişim</a></li>
                            <li id="menu-item-3" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1787"><a href="<?php echo base_url('sayfa/iletisim'); ?>">İletişim</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a id="go-to-top" class="go-to-top-button" href="#go-to-tie-body"><span class="fa fa-angle-up"></span></a>
<div class="clear"></div>
</div>
<aside class="side-aside normal-side tie-aside-effect dark-skin is-fullwidth" aria-label="Secondary Sidebar">
    <div data-height="100%" class="side-aside-wrapper has-custom-scroll">
        <a href="#" class="close-side-aside remove big-btn light-btn">
            <span class="screen-reader-text">Kapat</span>
            <i class="fa fa-remove"></i>
        </a>
        <div id="mobile-container">
            <div id="mobile-menu" class="hide-menu-icons"></div>
            <div class="mobile-social-search">
                <div id="mobile-social-icons" class="social-icons-widget solid-social-icons">
                    <ul>
                        <?php 
                        $link = html_escape($settings[0]->set_gp);
                        if($link != '' || $link != null){ ?>
                            <li class="social-icons-item"><a class="social-link  google-social-icon external" title="Google+" rel="nofollow" target="_blank" href="<?php echo html_escape($link); ?>"><span class="fa fa-google-plus"></span></a></li>
                        <?php } ?>

                        <?php 
                        $link = html_escape($settings[0]->set_fb);
                        if($link != '' || $link != null){ ?>
                            <li class="social-icons-item"><a class="social-link  facebook-social-icon external" title="Facebook" rel="nofollow" target="_blank" href="<?php echo html_escape($link); ?>"><span class="fa fa-facebook"></span></a></li>
                        <?php } ?>

                        <?php 
                        $link = html_escape($settings[0]->set_tw);
                        if($link != '' || $link != null){ ?>
                            <li class="social-icons-item"><a class="social-link  twitter-social-icon external" title="Twitter" rel="nofollow" target="_blank" href="<?php echo html_escape($link); ?>"><span class="fa fa-twitter"></span></a></li>
                        <?php } ?>

                        <?php 
                        $link = html_escape($settings[0]->set_pt);
                        if($link != '' || $link != null){ ?>
                            <li class="social-icons-item"><a class="social-link  pinterest-social-icon external" title="Pinterest" rel="nofollow" target="_blank" href="<?php echo html_escape($link); ?>"><span class="fa fa-pinterest"></span></a></li>
                        <?php } ?>

                        <?php 
                        $link = html_escape($settings[0]->set_ig);
                        if($link != '' || $link != null){ ?>
                            <li class="social-icons-item"><a class="social-link  instagram-social-icon external" title="Instagram" rel="nofollow" target="_blank" href="<?php echo html_escape($link); ?>"><span class="fa fa-instagram"></span></a></li>
                        <?php } ?>

                        <?php 
                        $link = html_escape($settings[0]->set_yt);
                        if($link != '' || $link != null){ ?>
                            <li class="social-icons-item"><a class="social-link  youtube-social-icon external" title="Youtube" rel="nofollow" target="_blank" href="<?php echo html_escape($link); ?>"><span class="fa fa-youtube"></span></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div id="mobile-search">
                    <form role="search" method="post" class="search-form" action="<?php echo base_url('script/ara'); ?>">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <label>
                            <input type="submit" class="search-submit" name="q" value="Ara" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>
</div>
<div id="fb-root"></div>
<div id="tie-popup-search-wrap" class="tie-popup">
    <a href="#" class="tie-btn-close remove big-btn light-btn">
        <span class="screen-reader-text">Kapat</span>
    </a>
    <div class="container">
        <div class="popup-search-wrap-inner">
            <div class="tie-row">
                <div id="pop-up-live-search" class="tie-col-md-12 live-search-parent" data-skin="live-search-popup" aria-label="Script ara">
                    <form method="post" id="tie-popup-search-form" action="<?php echo base_url('script/ara'); ?>">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input id="tie-popup-search-input" class="is-ajax-search" type="text" name="q" title="Ara" autocomplete="off" placeholder="Yazın ve enter tuşuna basın" />
                        <button id="tie-popup-search-submit" type="submit"><span class="fa fa-search" aria-hidden="true"></span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript' src='<?php echo base_url('assets/'); ?>js/scripts.js'></script>
<script type='text/javascript' src='<?php echo base_url('assets/'); ?>js/imagesloaded.min.js'></script>
<script type='text/javascript' src='<?php echo base_url('assets/'); ?>js/sliders.js'></script>
<script type="text/javascript">
    var title = document.title;
    var alttitle = "Yeğen Nereye?";
    window.onblur = function() {
        document.title = alttitle;
    };
    window.onfocus = function() {
        document.title = title;
    };

</script>
<?php 
$link = html_escape($settings[0]->set_analytics);
if($link != '' || $link != null){ echo $link; } ?>
