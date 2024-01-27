<?php
session_start();
include "config/koneksi.php";
if (!empty($_SESSION['username'])) {
  @$user = $_SESSION['username'];
  @$level = $_SESSION['level'];
}
?>
<?php

if (!empty($_SESSION['username'])) {
  $user = $_SESSION['username'];

  @$p = $_GET['p'];
  switch ($p) {
    case 'login':
      include "pages/login.php";
      break;
    case 'profil':
        include "pages/profil.php";
        break;
    case 'list_barang':
      include "pages/list_barang.php";
      break;

    case 'detail_barang':
      include "pages/detail_barang.php";
      break;

    case 'tambah_barang':
      include "pages/tambah_barang.php";
      break;

    case 'edit_barang':
      include "pages/edit_barang.php";
      break;

    case 'peminjaman':
      include "pages/peminjaman.php";
      break;

    case 'peminjaman1':
      include "pages/peminjaman1.php";
      break;

    case 'pengembalian':
      include "pages/pengembalian.php";
      break;

    case 'detail_pengembalian':
      include "pages/detail_pengembalian.php";
      break;

    case 'laporan':
      include "pages/laporan.php";
      break;

    case 'home':
      include "pages/home.php";
      break;

    case 'hapus':
      include "pages/hapus.php";
      break;

    default:
      include "pages/login.php";
      break;
  }
} else {
  include "pages/login.php";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="dist/js/bootstrap.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
<style>
  .file {
    visibility: hidden;
    position: absolute;
  }
</style>
<script type="text/javascript">
  $(document).on('click', '#cetak', function() {
    var tgl_awal = $("#tgl_awal").val();
    var tgl_sampai = $("#tgl_sampai").val();
    window.open('pages/cetak_laporan.php?tgl_awal=' + tgl_awal + "&tgl_sampai=" + tgl_sampai, '_blank');
  });
</script>
<script>
  function konfirmasi() {
    konfirmasi = confirm("Apakah anda yakin ingin menghapus gambar ini?")
    document.writeln(konfirmasi)
  }

  $(document).on("click", "#pilih_gambar", function() {
    var file = $(this).parents().find(".file");
    file.trigger("click");
  });

  $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
      // get loaded data and render thumbnail.
      document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
  });
</script>