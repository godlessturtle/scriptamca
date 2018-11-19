<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <!DOCTYPE html>
    <?php $path = base_url('assets/admin/'); ?>
    <html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo $path; ?>bower_components/select2/dist/css/select2.min.css">
    <title>Genel Ayarlar - Yönetim | Script Amca</title>


    <?php $this->load->view('admin/inc/header'); ?>


    <aside class="main-sidebar">
        <?php $this->load->view('admin/inc/sidebar'); ?>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Genel Ayarlar
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('panel'); ?>">Anasayfa</a></li>
                <li class="active">Genel Ayarlar</li>
            </ol>
        </section>
        <br>

        <section style="padding-top: 0!important" class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url('panel/update/settings'); ?>" method="POST"
                              enctype="multipart/form-data">
                            <div class="box-body">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                       value="<?php echo $this->security->get_csrf_hash(); ?>">

                                <div style="margin-bottom: 15px;" class="col-md-12">
                                    <div class="col-md-4">
                                        <label>Sayfa Son Eki (suffix) * </label>
                                        <input type="text" name="set_title_suffix"
                                               value="<?php echo $setting[0]->set_title_suffix; ?>"
                                               placeholder="Örnek: Scriptamca" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Site Açıklaması * </label>
                                        <input type="text" name="set_description"
                                               value="<?php echo $setting[0]->set_description; ?>"
                                               placeholder="siteyi tanımlayan bir açıklama" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Site Anahtar Kelimeleri * </label>
                                        <input type="text" name="set_keywords"
                                               value="<?php echo $setting[0]->set_keywords; ?>"
                                               placeholder="Virgülle ayırın" class="form-control">
                                    </div>
                                </div>

                                <div style="margin-bottom: 15px;" class="col-md-12">
                                    <div class="col-md-4">
                                        <label>Pinterest </label>
                                        <input type="text" name="set_pinterest"
                                               value="<?php echo $setting[0]->set_pt; ?>"
                                               placeholder="Pinterest" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Google-Plus </label>
                                        <input type="text" name="set_googleplus"
                                               value="<?php echo $setting[0]->set_gp; ?>"
                                               placeholder="Google Plus" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label> Youtube</label>
                                        <input type="text" name="set_youtube"
                                               value="<?php echo $setting[0]->set_yt; ?>" placeholder="youtube"
                                               class="form-control">
                                    </div>
                                </div>

                                <div style="margin-bottom: 15px;" class="col-md-12">
                                    <div class="col-md-4">
                                        <label>Facebook </label>
                                        <input type="text" name="set_facebook"
                                               value="<?php echo $setting[0]->set_fb; ?>"
                                               placeholder="facebook" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Twitter </label>
                                        <input type="text" name="set_twitter"
                                               value="<?php echo $setting[0]->set_tw; ?>"
                                               placeholder="twitter" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Instagram </label>
                                        <input type="text" name="set_instagram"
                                               value="<?php echo $setting[0]->set_ig; ?>" placeholder="instagram"
                                               class="form-control">
                                    </div>
                                </div>

                                <div style="margin-top: 30px;" class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Google Analytics Kodu * </label>
                                        <input type="text" name="set_analytics"
                                               value="<?php echo $setting[0]->set_analytics; ?>"
                                               placeholder="<script>...</script>" class="form-control">
                                    </div>
                                </div>

                            </div>


                            <div class="box-footer">

                                <button type="submit" class="btn btn-success pull-right col-md-4">Kaydet</button>
                                <a style="margin-right: 10px" href="<?php echo base_url('panel/settings'); ?>"
                                   class="btn btn-danger pull-right">İptal</a>


                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>
<?php $this->load->view('admin/inc/footer'); ?>