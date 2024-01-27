<?php
$id_inventaris = $_GET['id_inventaris'];
if (empty($id_inventaris)) {
?>
    <script type="text/javascript">
        window.location.href = "?p=list_barang";
    </script>
<?php
}
$sql = "SELECT *, inventaris.keterangan as ket FROM inventaris LEFT JOIN ruang ON ruang.id_ruang = inventaris.id_ruang LEFT JOIN jenis ON jenis.id_jenis = inventaris.id_jenis WHERE id_inventaris = '$id_inventaris'";
$query = mysqli_query($koneksi, $sql);
$cek = mysqli_num_rows($query);

if ($cek > 0) {
    $data = mysqli_fetch_array($query);
} else {
    $data = NULL;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="gambar/logoinven.JPG">
    <title>InvenApp</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="stylesheet" href="css/uppy.min.css">
    <link rel="stylesheet" href="css/jquery.steps.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
    <style>
      body {
  /* min-height: 2000px; */
  padding-top: 0.5rem;
}

.input-group-append {
  margin-left: -1px;
}

.input-group-append,
.input-group-prepend {
  display: -ms-flexbox;
  display: flex;
}

.input-group {
  position: relative;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -ms-flex-align: stretch;
  align-items: stretch;
  width: 100%;
}

.table-striped>tbody>tr:nth-of-type(odd) {
  background-color:;
}

.mb-3,
.my-3 {
  margin-bottom: 1rem !important;
}

.mt-3,
.my-3 {
  margin-top: 1rem !important;
}

.file {
  visibility: hidden;
  position: absolute;
}
.panel {
  margin-bottom: 20px;
  /* background-color: #fff; */
  border: 1px solid transparent;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
          box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
}
.panel-body {
  padding: 15px;
}
.panel-heading {
  padding: 10px 15px;
  border-bottom: 1px solid transparent;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
}
.panel-heading > .dropdown .dropdown-toggle {
  color: inherit;
}
.panel-title {
  margin-top: 0;
  margin-bottom: 0;
  font-size: 16px;
  color: inherit;
}
.panel-title > a,
.panel-title > small,
.panel-title > .small,
.panel-title > small > a,
.panel-title > .small > a {
  color: inherit;
}
.panel-footer {
  padding: 10px 15px;
  background-color: #f5f5f5;
  border-top: 1px solid #ddd;
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px;
}
.panel > .list-group,
.panel > .panel-collapse > .list-group {
  margin-bottom: 0;
}
.panel > .list-group .list-group-item,
.panel > .panel-collapse > .list-group .list-group-item {
  border-width: 1px 0;
  border-radius: 0;
}
.panel > .list-group:first-child .list-group-item:first-child,
.panel > .panel-collapse > .list-group:first-child .list-group-item:first-child {
  border-top: 0;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
}
.panel > .list-group:last-child .list-group-item:last-child,
.panel > .panel-collapse > .list-group:last-child .list-group-item:last-child {
  border-bottom: 0;
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px;
}
.panel > .panel-heading + .panel-collapse > .list-group .list-group-item:first-child {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.panel-heading + .list-group .list-group-item:first-child {
  border-top-width: 0;
}
.list-group + .panel-footer {
  border-top-width: 0;
}

button,
input {
  overflow: visible;
}

.input-group>.form-control {
  position: relative;
  -ms-flex: 1 1 0%;
  flex: 1 1 0%;
  min-width: 0;
  margin-bottom: 0;
}

.btn-dark {
  color: #fff;
  background-color: #343a40;
  border-color: #343a40;
}

.btn-dark:hover {
  color: #fff;
  background-color: black;
  border-color: black;

}

.themed-grid-col {
  padding-top: .75rem;
  padding-bottom: .75rem;
  background-color: rgba(112.520718, 44.062154, 249.437846, .15);
  border: 1px solid rgba(112.520718, 44.062154, 249.437846, .3);
}

.themed-container {
  padding: .75rem;
  margin-bottom: 1.5rem;
  background-color: rgba(112.520718, 44.062154, 249.437846, .15);
  border: 1px solid rgba(112.520718, 44.062154, 249.437846, .3);
}

.table-nobordered>tbody>tr>td,
.table-nobordered>tbody>tr>th {
  border: 0px solid #ddd;
  float: left;
}

.table-nobordered>tbody>tr>th {
  width: 30%;
}

.mainwrapper {
  background: #fefefe;
  display: flex;
  width: 100%;
  height: 650px;
  justify-content: center;
  align-items: center;
}

img.imgthumb {
  width: 150px;
  border-radius: 10px;
}

/* overlay by webprogramminunpas and modified by nelayankode.com*/
.overlay {
  width: 0;
  height: 0;
  overflow: hidden;
  position: fixed;
  top: 0;
  left: 0;
  background: rgba(0, 0, 0, 0);
  z-index: 9999;
  transition: .8s;
  text-align: center;
  padding: 50px 0;
}

.overlay:target {
  width: auto;
  height: auto;
  bottom: 0;
  right: 0;
  background: rgba(0, 0, 0, .7);
}

.overlay img {
  max-height: 100%;
  box-shadow: 2px 2px 7px rgba(0, 0, 0, .5);
}

.overlay:target img {
  animation: zoomDanFade 1s;
}

.overlay .close {
  /* position: absolute; */
  top: 2%;
  left: 2%;
  margin-left: -20px;
  color: white;
  text-decoration: none;
  line-height: 14px;
  padding: 5px;
  opacity: 0;
}

.overlay:target .close {
  animation: slideDownFade .5s .5s forwards;
}

/* animasi */
@keyframes zoomDanFade {
  0% {
    transform: scale(0);
    opacity: 0;
  }

  100% {
    transform: scale(1);
    opacity: 1;
  }
}

@keyframes slideDownFade {
  0% {
    opacity: 0;
    margin-top: -20px;
  }

  100% {
    opacity: 1;
    margin-top: 0;
  }
}
    </style>
  </head>
  <body class="vertical  light  ">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
              <i class="fe fe-sun fe-16"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="./assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Profile</a>
              <?php
                    if (!empty($user)) {
                    ?>
              <a class="dropdown-item" href="pages/keluar.php">Keluar</a>
              <?php
                  }
                  ?>
            </div>
          </li>
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
              <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="?p=home">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Aplikasi Inventaris</span><span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Halaman</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
          <?php
          if (@$level == "1") {
          ?>
            <li class="nav-item">
              <a href="?p=list_barang" class="nav-link">
                <i class="fe fe-server fe-16"></i>
                <span class="ml-3 item-text">Daftar Inventaris</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="?p=peminjaman" class="nav-link">
                <i class="fe fe-folder-minus fe-16"></i>
                <span class="ml-3 item-text">Peminjaman</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="?p=pengembalian" class=" nav-link">
                <i class="fe fe-folder-plus fe-16"></i>
                <span class="ml-3 item-text">Pengembalian</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="?p=laporan" class=" nav-link">
                <i class="fe fe-clipboard fe-16"></i>
                <span class="ml-3 item-text">Laporan</span>
              </a>
                </li>
                <?php
          }
          ?>
          <?php
          if (@$level == "2") {
          ?>
          <li class="nav-item">
              <a href="?p=list_barang" class="nav-link">
                <i class="fe fe-server fe-16"></i>
                <span class="ml-3 item-text">Daftar Inventaris</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="?p=peminjaman" class="nav-link">
                <i class="fe fe-folder-minus fe-16"></i>
                <span class="ml-3 item-text">Peminjaman</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="?p=pengembalian" class=" nav-link">
                <i class="fe fe-folder-plus fe-16"></i>
                <span class="ml-3 item-text">Pengembalian</span>
              </a>
            </li>
            <?php
          }
          ?>
          <?php
          if (@$level == "3") {
          ?>
          <li class="nav-item">
              <a href="?p=peminjaman1" class="nav-link">
                <i class="fe fe-folder-minus fe-16"></i>
                <span class="ml-3 item-text">Peminjaman</span>
              </a>
            </li>
            <?php
          }
          ?>
          </ul>
          <div class="btn-box w-100 mt-4 mb-1">
          <?php
                    if (!empty($user)) {
                    ?>
            <a href="pages/keluar.php" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
              <i class="fe fe-log-out fe-12 mx-2"></i><span class="small">Keluar</span>
            </a>
            <?php
                  }
                  ?>
          </div>
        </nav>
      </aside>
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-2">
                <div class="col-auto">
                  <form class="form-inline">
                    <div class="form-group d-none d-lg-inline">
                      <label for="reportrange" class="sr-only">Date Ranges</label>
                      <div id="reportrange" class="px-2 py-2 text-muted">
                        <span class="small"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                      <button type="button" class="btn btn-sm mr-2"><span class="fe fe-filter fe-16 text-muted"></span></button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="mb-2 align-items-center">
                <div class="card shadow mb-4">
                  <div class="card-body">
                    <div class="row mt-1 align-items-center">
                      <div class="col-12 col-lg-19 text-left pl-4">
                      <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
        <center><h2>Edit Inventaris <?= $data['nama'] ?></h2></center><br>
            <div class="panel-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <label for="">Kode Inventaris</label>
                        <input type="text" class="form-control" name="kode_inventaris" value="<?= $data['kode_inventaris'] ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Nama Inventaris</label>
                        <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Kondisi</label>
                        <select name="kondisi" id="" class="form-control">
                            <option value="<?= $data['kondisi'] ?>" name="kondisi" class="form-control"><?= $data['kondisi'] ?></option>
                            <option value="Baik" name="kondisi" class="form-control">Baik</option>
                            <option value="Rusak" name="kondisi" class="form-control">Rusak</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" value="<?= $data['jumlah'] ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Jenis Inventaris</label>
                        <select name="id_jenis" id="" class="form-control">
                            <option value="<?= $data['id_jenis'] ?>" class="form-control"><?= $data['nama_jenis'] ?></option>
                            <?php
                            $sql_jenis = "SELECT * FROM jenis";
                            $q_jenis = mysqli_query($koneksi, $sql_jenis);
                            while ($jenis = mysqli_fetch_array($q_jenis)) {
                            ?>
                                <option value="<?= $jenis['id_jenis'] ?>"><?= $jenis['nama_jenis'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Nama Ruang</label>
                        <select name="id_ruang" id="" class="form-control">
                            <option value="<?= $data['id_ruang'] ?>" class="form-control"><?= $data['nama_ruang'] ?></option>
                            <?php
                            $sql_ruang = "SELECT * FROM ruang";
                            $q_ruang = mysqli_query($koneksi, $sql_ruang);
                            while ($ruang = mysqli_fetch_array($q_ruang)) {
                            ?>
                                <option value="<?= $ruang['id_ruang'] ?>"><?= $ruang['nama_ruang'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Keterangan</label>
                        <textarea name="ket" id="" cols="30" rows="5" class="form-control" value="<?= $data['ket'] ?>"><?= $data['ket'] ?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <div id="msg"></div>
                        <input type="file" name="gambar" class="file">
                        <div class="input-group my-3">
                            <input type="text" class="form-control" disabled placeholder="Upload Gambar" id="file">
                            <div class="input-group-append">
                                <button type="button" id="pilih_gambar" class="browse btn btn-dark">Pilih Gambar</button>
                            </div>
                        </div>
                        <img src="gambar/<?php echo $data['gambar']; ?>" id="preview" class="img-thumbnail">
                    </div><br>
                    <div class="form-group col-md-12">
                                    <a href="?p=detail_barang&id_inventaris=<?= $data['id_inventaris'] ?>" class="btn btn-md btn-success"><span class="fe fe-eye"></span></a>
                                    <!-- <a href="?p=edit_barang&id_inventaris=<?= $data['id_inventaris'] ?>" class="btn btn-md btn-primary"><span class="fe fe-edit"></span></a> -->
                                    <a onclick="return confirm('Apakah anda yakin untuk menghapusnya?')" href="pages/hapus_barang.php?id_inventaris=<?= $data['id_inventaris'] ?>" class="btn btn-md btn-danger"><span class="fe fe-trash"></span></a>
                    </div><br>
                    <div class="form-group col-md-12">
                        <button class="btn btn-md btn-primary" name="simpan" type="submit">Simpan</button>
                        <a href="?p=list_barang" class="btn btn-md btn-default">Kembali</a>
                    </div>
                </form>

                <?php
                if (isset($_POST['simpan'])) {
                    // membuat variabel untuk menampung data dari form
                    $kode_inventaris = $_POST['kode_inventaris'];
                    $nama = $_POST['nama'];
                    $kondisi = $_POST['kondisi'];
                    $jumlah = $_POST['jumlah'];
                    $id_jenis = $_POST['id_jenis'];
                    $id_ruang = $_POST['id_ruang'];
                    $ket = $_POST['ket'];
                    $gambar = $_FILES['gambar']['name'];
                    //cek dulu jika merubah gambar produk jalankan coding ini
                    if ($gambar != "") {
                        $ekstensi_diperbolehkan = array('png', 'jpg', 'JPG'); //ekstensi file gambar yang bisa diupload 
                        $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
                        $ekstensi = strtolower(end($x));
                        $file_tmp = $_FILES['gambar']['tmp_name'];
                        $angka_acak     = rand(1, 999);
                        $nama_gambar_baru = $angka_acak . '-' . $gambar; //menggabungkan angka acak dengan nama file sebenarnya
                        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                            move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru); //memindah file gambar ke folder gambar

                            // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                            // $query  = "UPDATE produk SET nama_produk = '$nama_produk', deskripsi = '$deskripsi', harga_beli = '$harga_beli', harga_jual = '$harga_jual', gambar_produk = '$nama_gambar_baru'";
                            $query = "UPDATE inventaris SET 
                            kode_inventaris='$kode_inventaris',
                            nama='$nama', 
                            kondisi='$kondisi',
                            jumlah='$jumlah', 
                            id_jenis='$id_jenis', 
                            id_ruang='$id_ruang', 
                            keterangan='$ket',
                            gambar= '$nama_gambar_baru'";
                            $query .= "WHERE id_inventaris = '$id_inventaris'";
                            $result = mysqli_query($koneksi, $query);
                            // periska query apakah ada error
                            if (!$result) {
                                die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                                    " - " . mysqli_error($koneksi));
                            } else {
                                //tampil alert dan akan redirect ke halaman index.php
                                //silahkan ganti index.php sesuai halaman yang akan dituju
                                echo "<script>alert('Data berhasil diubah.');window.location='?p=list_barang';</script>";
                            }
                        } else {
                            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='?p=list_barang';</script>";
                        }
                    } else {
                        // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                        $query  = "UPDATE inventaris SET 
                        kode_inventaris='$kode_inventaris',
                        nama='$nama', 
                        kondisi='$kondisi',
                        jumlah='$jumlah', 
                        id_jenis='$id_jenis', 
                        id_ruang='$id_ruang', 
                        keterangan='$ket'";
                        $query .= "WHERE id_inventaris = '$id_inventaris'";
                        $result = mysqli_query($koneksi, $query);
                        // periska query apakah ada error
                        if (!$result) {
                            die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                                " - " . mysqli_error($koneksi));
                        } else {
                            //tampil alert dan akan redirect ke halaman index.php
                            //silahkan ganti index.php sesuai halaman yang akan dituju
                            echo "<script>alert('Data berhasil diubah.');window.location='?p=list_barang';</script>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

</div>
                  </div> <!-- / .row -->
                </div> <!-- / .list-group -->
                </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/d3.min.js"></script>
    <script src="js/topojson.min.js"></script>
    <script src="js/datamaps.all.min.js"></script>
    <script src="js/datamaps-zoomto.js"></script>
    <script src="js/datamaps.custom.js"></script>
    <script src="js/Chart.min.js"></script>
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="js/gauge.min.js"></script>
    <script src="js/jquery.sparkline.min.js"></script>
    <script src="js/apexcharts.min.js"></script>
    <script src="js/apexcharts.custom.js"></script>
    <script src='js/jquery.mask.min.js'></script>
    <script src='js/select2.min.js'></script>
    <script src='js/jquery.steps.min.js'></script>
    <script src='js/jquery.validate.min.js'></script>
    <script src='js/jquery.timepicker.js'></script>
    <script src='js/dropzone.min.js'></script>
    <script src='js/uppy.min.js'></script>
    <script src='js/quill.min.js'></script>
    <script>
      $('.select2').select2(
      {
        theme: 'bootstrap4',
      });
      $('.select2-multi').select2(
      {
        multiple: true,
        theme: 'bootstrap4',
      });
      $('.drgpicker').daterangepicker(
      {
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale:
        {
          format: 'MM/DD/YYYY'
        }
      });
      $('.time-input').timepicker(
      {
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
      });
      /** date range picker */
      if ($('.datetimes').length)
      {
        $('.datetimes').daterangepicker(
        {
          timePicker: true,
          startDate: moment().startOf('hour'),
          endDate: moment().startOf('hour').add(32, 'hour'),
          locale:
          {
            format: 'M/DD hh:mm A'
          }
        });
      }
      var start = moment().subtract(29, 'days');
      var end = moment();

      function cb(start, end)
      {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
      $('#reportrange').daterangepicker(
      {
        startDate: start,
        endDate: end,
        ranges:
        {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
      cb(start, end);
      $('.input-placeholder').mask("00/00/0000",
      {
        placeholder: "__/__/____"
      });
      $('.input-zip').mask('00000-000',
      {
        placeholder: "____-___"
      });
      $('.input-money').mask("#.##0,00",
      {
        reverse: true
      });
      $('.input-phoneus').mask('(000) 000-0000');
      $('.input-mixed').mask('AAA 000-S0S');
      $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
      {
        translation:
        {
          'Z':
          {
            pattern: /[0-9]/,
            optional: true
          }
        },
        placeholder: "___.___.___.___"
      });
      // editor
      var editor = document.getElementById('editor');
      if (editor)
      {
        var toolbarOptions = [
          [
          {
            'font': []
          }],
          [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [
          {
            'header': 1
          },
          {
            'header': 2
          }],
          [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
          [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
          [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
          [
          {
            'direction': 'rtl'
          }], // text direction
          [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
          [
          {
            'align': []
          }],
          ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
      }
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function()
      {
        'use strict';
        window.addEventListener('load', function()
        {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form)
          {
            form.addEventListener('submit', function(event)
            {
              if (form.checkValidity() === false)
              {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <script>
      var uptarg = document.getElementById('drag-drop-area');
      if (uptarg)
      {
        var uppy = Uppy.Core().use(Uppy.Dashboard,
        {
          inline: true,
          target: uptarg,
          proudlyDisplayPoweredByUppy: false,
          theme: 'dark',
          width: 770,
          height: 210,
          plugins: ['Webcam']
        }).use(Uppy.Tus,
        {
          endpoint: 'https://master.tus.io/files/'
        });
        uppy.on('complete', (result) =>
        {
          console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
      }
    </script>
    <script src="js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
</html>