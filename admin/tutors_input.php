<?php include("inc_header.php") ?>
<?php
$nama = "";

$isi = "";
$foto = "";
$foto_name = "";

$error = "";
$sukses = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if ($id != '') {
    $sql1 = "select * from tutors where '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nama = $r1['nama'];
    $foto = $r1['foto'];
    $isi = $r1['isi'];

    if ($isi == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $isi = $_POST['isi'];

    if ($nama == '' or $isi == '') {
        $error = "Silahkan masukkan semua data yakni adalah data isi dan nama.";
    }
    // Array ( [foto] => Array ( [name] => OKC.jpg [type] => image/jpeg [tmp_name] => C:\xampp\tmp\phpEAFA.tmp [error] => 0 [size] => 157189 ) [files] => Array ( [name] => [type] => [tmp_name] => [error] => 4 [size] => 0 ) )
    // print_r($_FILES);

    if ($_FILES['foto']['name']) {
        $foto_name = $_FILES['foto']['name'];
        $foto_file = $_FILES['foto']['tmp_name'];

        $detail_file = pathinfo($foto_name);
        $foto_ekstensi = $detail_file['extension'];
        // Array ( [dirname] => . [basename] => Background Untar.jpg [extension] => jpg [filename] => Background Untar )
        $ekstensi_yang_diperbolehkan = array("jpg", "jpeg", "png", "gif");
        if (!in_array($foto_ekstensi, $ekstensi_yang_diperbolehkan)) {
            $error = "Ekstensi yang diperbolehkan adalah jpg, jpeg, png, dan gif";
        }
    }
    
    if (empty($error)) {
        if ($foto_name) {
            $direktori = "../gambar";

            @unlink($direktori."/$foto"); // delete data

            $foto_name = "tutors_" . time() . "_" . $foto_name;
            move_uploaded_file($foto_file, $direktori . "/" . $foto_name);

            $foto = $foto_name;
        }else{
            $foto_name = $foto; // memasukkan data dari data yang sebelumnya ada
        }


        if ($id != "") {
            $sql1 = "update tutors set nama = '$nama', foto ='$foto_name', isi = '$isi', tgl_isi=now() where id='$id' ";
        } else {
            $sql1 = "insert into tutors(nama, foto, isi) values('$nama', '$foto_name', '$isi')";
        }
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Sukses memasukkan data";
        } else {
            $error = "Gagal memasukkan data";
        }
    }
}
?>
<h1>tutors Admin Input Data Tutors</h1>
<div class="mb-3 row">
    <a href="tutors.php">
        <<< Kembali ke tutors admin Tutors</a>
</div>
<?php
if ($error) {
?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>
<?php
}
?>
<?php
if ($sukses) {
?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
    </div>
<?php
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" value="<?php echo $nama ?>" name="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
            <?php
            if($foto){
                echo "<img src = '../gambar/$foto' style='max-height:100px; max-width:100px'/>";
            }
            ?>
            <input type="file" class="form-control" id="foto" name="foto" value="<?php echo $foto ?>" >
        </div>
    </div>
    <div class="mb-3 row">
        <label for="isi" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
            <textarea name="isi" class="form-control" id="summernote"><?php echo $isi ?></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
        </div>
    </div>
</form>
<?php include("inc_footer.php") ?>