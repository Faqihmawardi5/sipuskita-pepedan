<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="clearfix"></div>
<footer class="main-footer">
<div id="mycredit">
    <strong>
        Copyright &copy; <?= date('Y'); ?>
        <span style="color:#1098e8;">Sistem Informasi Perpustakaan Pustaka Kita Desa Pepedan</span>
    </strong>
    <br>
    <small>
        Versi 1.0 | All Rights Reserved
    </small>
 
    <!--<div class="pull-right">
     <span>Made with <i class="fa fa-heart text-red"></i> by <strong>Faqih Mawardi</strong></span>
    </div>-->
</div>
</footer>

<div id="logout"></div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets_style/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets_style/assets/bower_components/bootstrap/dist/js/bootstrap.js"></script>

<!-- Summernote -->
<script src="<?php echo base_url();?>assets_style/assets/plugins/summernote/summernote-lite.js"></script>
<script>
$('#summernotehal').summernote({
    height: 150,
    tabsize: 1,
    direction: 'rtl',
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['view', ['fullscreen', 'help']],
        ['table', ['table']],
    ],
});
</script>

<!-- Select2 -->
<script src="<?php echo base_url();?>assets_style/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
$(function() {
    // Initialize Select2 Elements
    $('.select2').select2();
});

// Restrict input to numbers only
(function($) {
    $.fn.inputFilter = function(inputFilter) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            }
        });
    };
}(jQuery));

$("#uintTextBox, #uintTextBox2, #uintTextBox3").inputFilter(function(value) {
    return /^\d*$/.test(value);
});
</script>

<!-- Notifikasi fade out -->
<script>
    $(function () {
        setTimeout(function() {
            $("#notifikasi").fadeOut('slow');
        }, 3000);  
    });
</script>

<!-- Custom JS -->
<script src="<?php echo base_url();?>assets_style/assets/dist/js/custom.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets_style/assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url();?>assets_style/assets/dist/js/demo.js"></script>

<!-- PACE -->
<script src="<?php echo base_url();?>assets_style/assets/bower_components/PACE/pace.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url();?>assets_style/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets_style/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    // Semua tabel dengan class "table" akan menjadi DataTable
    $('table.table').DataTable({
        "destroy": true,              // supaya bisa re-initialize
        "pageLength": 3,              // default show 3 entries
        "lengthMenu": [ [3, 5, 10, 25, 50, -1], [3, 5, 10, 25, 50, "All"] ],
        "responsive": true,           // responsive untuk mobile
        "autoWidth": false
    });
});
</script>

<!-- Bootstrap Datepicker -->
<script src="<?php echo base_url();?>assets_style/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap Timepicker -->
<script src="<?php echo base_url();?>assets_style/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

</body>
</html>
