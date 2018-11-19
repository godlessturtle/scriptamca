<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <!DOCTYPE html>
    <?php $path = base_url('assets/admin/'); ?>
    <html>
<head>
    <meta name="robots" content="noindex, nofollow">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profil - Yönetim | Script Amca</title>
    <?php $this->load->view('admin/inc/header'); ?>
    <aside class="main-sidebar">
        <?php $this->load->view('admin/inc/sidebar'); ?>
    </aside>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Profili Düzenle
            </h1>
        </section>
        <section class="content container-fluid">

            <div class="row">

                <div class="col-md-8">

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Şifre</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="post" action="<?php echo base_url('panel/update/password'); ?>" class="form-horizontal">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="box-body">
                                    <?php echo $this->session->flashdata('not'); ?>
                                  <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Eski Şifre</label>

                                    <div class="col-sm-10">
                                        <input type="text" required="required" class="form-control" name="old_pass" id="inputEmail3" >
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Yeni Şifre</label>

                                    <div class="col-sm-10">
                                        <input type="text" required="required" class="form-control" name="new_pass" id="inputEmail3" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Yeni Şifre Tekrar</label>

                                    <div class="col-sm-10">
                                        <input type="text" required="required" class="form-control" name="re_pass" id="inputEmail3" >
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a class="btn btn-danger" href="<?php echo base_url('panel/categories'); ?>">İptal</a>
                                <button type="submit" class="btn btn-info pull-right">Güncelle</button>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>

                </div>


            </div>

        </section>
    </div>
    <!-- Footer -->
<?php $this->load->view('admin/inc/footer'); ?>