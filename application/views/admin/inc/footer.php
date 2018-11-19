<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$path = base_url('assets/admin/'); ?>
<footer class="main-footer">
    <strong>Copyright &copy; 2018 <a target="_blank" href="<?php echo base_url(); ?>">Script Amca</a></strong>
</footer>
</div>

<script src="<?php echo $path ?>bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo $path ?>plugins/jquery.pShorten.min.js"></script>
<script src="<?php echo $path ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo $path ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo $path ?>bower_components/ckeditor/ckeditor.js"></script>
<script src="<?php echo $path ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo $path ?>dist/js/jquery-ui.min.js"></script>
<script src="<?php echo $path ?>bower_components/jquery-ui/ui/sortable.js"></script>
<?php echo validation_errors('<script>', '</script>'); ?>
<?php if($this->session->flashdata('notification')){ echo '<script>'.$this->session->flashdata('notification') . '</script>'; } ?>
<script type="text/javascript">
    $(function () {
        CKEDITOR.replace('editor1')
    });

    $('.select2').select2()
</script>
<script>
    $(document).ready(function(){
        $('#sortable').sortable({
            handle: '.handle',
            update: function(){
                let newOrder = $('#sortable').sortable('serialize');
                $('#sonuc').load('menuorder?' + newOrder);
            }
        });
    });

</script>
</body>
</html>