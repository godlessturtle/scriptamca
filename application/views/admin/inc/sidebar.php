<section class="sidebar">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $path = base_url('assets/admin/'); ?>
    <div class="user-panel">
        <div class="pull-left image">
            <img style="height: 100%;min-height: 48px;object-fit: cover;" src="<?php echo base_url($adminDetails[0]->admin_profile_img); ?>" class="img-circle">
        </div>
        <div class="pull-left info">
            <p>
                <?php echo html_escape($adminDetails[0]->admin_fullname); ?>
            </p>
            </a>
        </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menü</li>
        <li class="active"><a href="<?php echo base_url('panel/main') ?>"><i class="fa fa-home text-red"></i> <span>Anasayfa</span></a></li>
        <li class="treeview">
            <a href="#"><i class="fa fa-file-text text-green"></i> <span>Yazılar</span>
                <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url('panel/posts'); ?>"> <i class="fa fa-circle-o text-blue"></i>Tümünü Görüntüle</a></li>
                <li><a href="<?php echo base_url('panel/new/post'); ?>"> <i class="fa fa-circle-o text-yellow"></i>Yeni Oluştur</a></li>
            </ul>
        </li>
        <li><a href="<?php echo base_url('panel/categories'); ?>"><i class="fa fa-list text-light-blue"></i> <span>Kategoriler</span></a></li>
        <li><a href="<?php echo base_url('panel/pages'); ?>"><i class="fa fa-file text-green"></i> <span>Sayfalar</span></a></li>
        <li><a href="<?php echo base_url('panel/menus'); ?>"><i class="fa fa-list text-blue"></i> <span>Menüler</span></a></li>
        <li><a href="<?php echo base_url('panel/modules'); ?>"><i class="fa fa-magnet text-green"></i> <span>Modüller</span></a></li>
        <li><a href="<?php echo base_url('panel/settings'); ?>"><i class="fa fa-cog text-blue"></i> <span>Ayarlar</span></a></li>
    </ul>
</section>