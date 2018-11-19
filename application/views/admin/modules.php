<!DOCTYPE html>
<?php $path = base_url('assets/admin/'); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modüller - Yönetim | Script Amca</title>
    <script src="<?php echo $path ?>bower_components/jquery/dist/jquery.min.js"></script>
    <?php $this->load->view('admin/inc/header'); ?>

    <!--  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yeni Modül Oluştur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php form_open(); ?>
                <form action="<?php echo base_url('panel/create/module'); ?>" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="form-group">
                            <input type="text" name="module_title" class="form-control" id="inputEmail3" placeholder="Modül Başlığı">
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select id="selectBox0" name="moduleCat" class="form-control">
                                <option value="sec" selected disabled>Seçiniz</option>
                                <?php foreach($categories as $cat){ ?>
                                <option id="<?php echo $cat->cat_id; ?>" value="<?php echo $cat->cat_id; ?>"><?php echo $cat->cat_name; ?></option>
                                <?php } ?>
                            </select>
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
                <li class="active">Modüller</li>
            </ol>
        </section>

        <section class="content container-fluid">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">
                                <button type="button" class="btn btn-primary pull-left btn-xs" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-plus"></i> Yeni Modül Ekle
                                </button>
                            </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody id="sortableModules"><tr>
                                    <span id="sonuc" class="label label-success"></span>
                                    <th>Sırala</th>
                                    <th>Başlık</th>
                                    <th>Sıra</th>
                                    <th>Kategori</th>
                                </tr>

                                <?php foreach($modules as $module){ ?>
                                    <tr  id="<?php echo "module_" . $module->module_id; ?>" >
                                        <td class="fa fa-arrows handle"></td>
                                        <td><?php echo $module->module_title; ?></td>
                                        <td><?php echo $module->module_order; ?></td>
                                        <td><span class="label label-primary"><?php echo getCatNameByID($module->module_category); ?></span>
                                        </td>
                                        <td><a class="btn btn-danger btn-xs" href="<?php echo base_url('panel/delete/module/' . $module->module_id); ?>"><i class="fa fa-remove"></i> Sil</a></td>
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
    <?php $this->load->view('admin/inc/footer'); ?>
    <script>
        $(document).ready(function(){
            $('#sortableModules').sortable({
                handle: '.handle',
                update: function(){
                    let newOrder = $('#sortableModules').sortable('serialize');
                    $('#sonuc').load('moduleOrder?' + newOrder);
                }
            });
        });

    </script>

