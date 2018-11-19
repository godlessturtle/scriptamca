<!DOCTYPE html>
<?php $path = base_url('application/assets/admin/'); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kategoriler - Yönetim | Script Amca</title>
    <?php $this->load->view('admin/inc/header'); ?>

    <!--  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yeni Kategori Oluştur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php form_open(); ?>
                <form action="<?php echo base_url('panel/create/category'); ?>" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="text" name="cat_name" class="form-control" id="inputEmail3" placeholder="Kategori Adı">

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
                Kategoriler<small>Toplam <?php echo $categories->num_rows(); ?> Kategori </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('panel'); ?>">Anasayfa</a></li>
                <li class="active">Kategoriler</li>
            </ol>
        </section>

        <section class="content container-fluid">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">
                                <button type="button" class="btn btn-primary pull-left btn-xs" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-plus"></i> Yeni Kategori Ekle
                                </button>
                            </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>ID</th>
                                    <th>Kategori Adı</th>
                                    <th>İçerik Sayısı</th>
                                    <th>Slug</th>
                                    <th>İşlem</th>
                                </tr>

                                <?php foreach($categories->result() as $cat){ ?>
                                    <tr>
                                        <td><b>#<?php echo $cat->cat_id; ?></b></td>

                                        <td><?php echo $cat->cat_name; ?></td>
                                        <?php $count = catPostCount($cat->cat_id); ($count==0 ? $label="warning":$label="success"); ?>
                                        <td><span style="padding: 5px 20px!important;" class="label label-<?php echo $label ?>"><?php echo $count;  ?> İçerik</span></td>
                                        <td><?php echo $cat->cat_slug; ?></td>
                                        <td><a href="<?php echo base_url('panel/edit/category/') . $cat->cat_id; ?>" name="edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Düzenle</a>
                                            <a href="<?php echo base_url('panel/delete/cat/') . $cat->cat_id; ?>" name="edit" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Sil</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody></table>
                            <div style="padding: 5px 10px;" class="box-tools pull-right">
                                <div class="input-group input-group-sm" style="width: 100%;">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                            <?php echo $pagination; ?>
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
<?php $this->load->view('admin/inc/footer'); ?>