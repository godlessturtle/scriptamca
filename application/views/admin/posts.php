<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <!DOCTYPE html>
    <?php $path = base_url('assets/admin/'); ?>
    <html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yazılar - Yönetim | Script Amca</title>
    <?php $this->load->view('admin/inc/header'); ?>


    <aside class="main-sidebar">
        <?php $this->load->view('admin/inc/sidebar'); ?>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Yazılar
                <small>Toplam <?php echo $postCount; ?> Yazı</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('panel'); ?>">Anasayfa</a></li>
                <li class="active">Yazılar</li>
            </ol>
        </section>

        <section class="content container-fluid">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">
                                <a href="<?php echo base_url('panel/new/post'); ?>" class="btn btn-success pull-left btn-xs"> <i class="fa fa-plus"></i> Yeni Yazı Oluştur</a>
                            </h3>


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>ID</th>
                                    <th><i class="fa fa-pencil"></i> Başlık</th>
                                    <th><i class="fa fa-list"></i> Kategori</th>
                                    <th><i class="fa fa-clock-o"></i> Oluşturulma</th>
                                    <th><i title="Görüntülenme Sayısı" class="fa fa-eye"></i></th>
                                    <th><i class="fa fa-user"></i> Yazar</th>
                                    <th>İşlem</th>
                                </tr>

                                <?php foreach($posts->result() as $post){ ?>
                                    <tr>
                                        <td><b>#<?php echo $post->post_id; ?></b></td>
                                        <td><?php echo substr(strip_tags($post->post_title), 0, 75); ?></td>

                                        <td>
                                            <?php  echo esc_zen(getCatNameByID($post->post_category)); ?>
                                        </td>

                                        <td><?php echo esc_zen($post->createdAt); ?></td>
                                        <td><?php echo $post->post_views; ?></td>
                                        <td><?php echo esc_zen(getAuthorNameByID(esc_zen($post->post_author))); ?></td>
                                        <td>
                                            <a href="<?php echo base_url('panel/edit/post/') . $post->post_id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Düzenle</a>
                                            <a href="<?php echo base_url('panel/delete/post/') . $post->post_id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Sil</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>

                            </table>
                            <div style="padding: 5px 10px;" class="box-tools pull-right">
                                <div class="input-group input-group-sm" style="width: 100%;">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <?php echo $pagination; ?>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->
                    </div>

                    <!-- /.box -->
                </div>

            </div>

        </section>
    </div>

    <!-- Footer -->
<?php $this->load->view('admin/inc/footer'); ?>