<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <!DOCTYPE html>
    <?php $path = base_url('assets/admin/'); ?>
    <html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo $path; ?>bower_components/select2/dist/css/select2.min.css">
    <title>Yeni Menü - Yönetim | Script Amca</title>
    <?php $this->load->view('admin/inc/header'); ?>
    <aside class="main-sidebar">
        <?php $this->load->view('admin/inc/sidebar'); ?>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('panel'); ?>">Anasayfa</a></li>
                <li><a href="<?php echo base_url('panel/posts'); ?>">Yazılar</a></li>
                <li class="active">Yeni Yazı Oluştur</li>
            </ol>
        </section>
        <br>

        <section class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Yeni Yazı Oluştur</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url('panel/create/menu'); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="box-body">
                                <div class="form-group col-md-7">
                                    <label for="exampleInputEmail1">Menü Başlığı</label>
                                    <input type="text" required="required" name="menu_title" class="form-control">
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="exampleInputEmail1">Menü Başlığı</label>
                                    <input type="text" required="required" name="menu_title" class="form-control">
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="exampleInputEmail1">Menü Başlığı</label>
                                    <input type="text" required="required" name="menu_title" class="form-control">
                                </div>




                            </div>


                            <div class="box-footer">

                                <button type="submit" class="btn btn-success pull-right col-md-4">Kaydet</button>
                                <a style="margin-right: 10px" href="<?php echo base_url('panel/posts'); ?>" class="btn btn-danger pull-right">İptal</a>


                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>

    <!-- Footer -->

<?php $this->load->view('admin/inc/footer'); ?>