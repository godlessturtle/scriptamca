<!DOCTYPE html>
<?php $path = base_url('assets/admin/'); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Menüler - Yönetim | Script Amca</title>
    <script src="<?php echo $path ?>bower_components/jquery/dist/jquery.min.js"></script>
    <?php $this->load->view('admin/inc/header'); ?>

    <!--  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yeni Menü Oluştur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php form_open(); ?>
                <form action="<?php echo base_url('panel/create/menu'); ?>" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="form-group">
                            <input type="text" name="menu_title" class="form-control" id="inputEmail3" placeholder="Menü Başlığı">
                        </div>
                         <div class="form-group">
                            <input type="text" name="menu_icon" class="form-control" id="inputEmail3" placeholder="Menü İkonu">
                        </div>
                        <div class="form-group">
                            <label>Menü Tipi</label>
                            <select id="selectBox0" name="selectBox0" class="form-control">
                                <option value="sec" selected disabled>Seçiniz</option>
                                <option value="0">Sayfa</option>
                                <option value="1">Kategori</option>
                                <option value="2">Dış Link</option>
                            </select>
                        </div>

                        <div id="sayfalar" class="form-group">
                            <label>Sayfalar</label>
                            <select id="selectSayfa" name="selectSayfa" class="form-control">
                                <?php foreach($pages as $page){ ?>
                                <option value="<?php echo $page->page_id; ?>"><?php echo html_escape($page->page_title); ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div id="kategoriler" class="form-group">
                            <label>Kategoriler</label>
                            <select id="selectCat" name="selectCat" class="form-control">
                                <?php foreach($categories as $cat){ ?>
                                    <option value="<?php echo $cat->cat_id; ?>"><?php echo html_escape($cat->cat_name); ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div id="dis-link" class="form-group">
                            <label for="external_link">Dış Link</label>
                            <input type="text" name="external_link" class="form-control" id="inputEmail3" placeholder="http://...">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                        <button type="submit" class="btn btn-primary">Oluştur</button>
                    </div>
                </form>
                <?php form_close(); ?>
            </div>
        </div>
    </div>

    <aside class="main-sidebar">
        <?php $this->load->view('admin/inc/sidebar'); ?>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Menüler
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('panel'); ?>">Anasayfa</a></li>
                <li class="active">Menüler</li>
            </ol>
        </section>

        <section class="content container-fluid">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">
                                <button type="button" class="btn btn-primary pull-left btn-xs" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-plus"></i> Yeni Menü Ekle
                                </button>
                            </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody id="sortable"><tr>
                                    <span id="sonuc" class="label label-success"></span>
                                    <th>Sırala</th>
                                    <th>Başlık</th>
                                    <th>Sıra</th>
                                    <th>Tür</th>
                                    <th>İşlem</th>
                                </tr>

                                <?php foreach($menus as $menu){ ?>
                                    <tr  id="<?php echo "menu_" . $menu->menu_id; ?>" >
                                        <td class="fa fa-arrows handle"></td>
                                        <td><?php echo $menu->menu_title; ?></td>
                                        <td><?php echo $menu->menu_order; ?></td>
                                        <td>
                                            <?php $type = $menu->menu_type; if($type == 0){
                                                echo '<span class="label label-primary">Sayfa</span>';} ?>
                                            <?php $type = $menu->menu_type; if($type == 1){
                                                echo '<span class="label label-warning">Kategori</span>';} ?>
                                            <?php $type = $menu->menu_type; if($type == 2){
                                                echo '<span class="label label-success">Harici Link</span>';} ?>

                                        </td>
                                        <td><a class="btn btn-danger btn-xs" href="<?php echo base_url('panel/delete/menu/' . $menu->menu_id); ?>"><i class="fa fa-remove"></i> Sil</a></td>
                                    </tr>
                                <?php } ?>
                                </tbody></table>
                            <div style="padding: 5px 10px;" class="box-tools pull-right">
                                <div class="input-group input-group-sm" style="width: 100%;">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <?php //echo $pagination; ?>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <!-- /.box -->
                    </div>
                </div>





        </section>
    </div>


    <!-- Footer -->
    <script>
        let disLink = $('#dis-link');
        let sayfalar = $('#sayfalar');
        let kategoriler = $('#kategoriler');

        kategoriler.css('display', 'none');
        sayfalar.css('display', 'none');
        disLink.css('display', 'none');
        let sBox = $('#selectBox0');
        sBox.change(function(){
            let sVal = sBox.val();
            if(sVal == 0){
                sayfalar.css('display', 'block');
                disLink.css('display', 'none');
                kategoriler.css('display', 'none');
            }
            if(sVal == 1){
                sayfalar.css('display', 'none');
                disLink.css('display', 'none');
                kategoriler.css('display', 'block');
            }
            if(sVal == 2){
                sayfalar.css('display', 'none');
                disLink.css('display', 'block');
                kategoriler.css('display', 'none');
            }
        });



    </script>

<?php $this->load->view('admin/inc/footer'); ?>

