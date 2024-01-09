<?php include("inc_header.php") ?>

<h3>Pendaftaran</h3>
<?php
$email = "";
$nama_lengkap = "";
$password = "";
$konfirmasi_password = "";
$err = "";
$sukses = "";
$isi_email = "";

if(isset($_POST['simpan'])){
    $email = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    if($email =='' or $nama_lengkap =='' or $password == '' or $konfirmasi_password ==''){
        $err .= "<li> Silahkan masukkan semua isian</li>";
    }

    // cek di bagian db, apakah email sudah ada atau belum
    if($email != ''){
        $sql1 = "select email from members where email = '$email'";
        $q1 = mysqli_query($koneksi, $sql1);
        $n1 = mysqli_num_rows($q1);
        if($n1 > 0){
            $err .= "<li> Email yang kamu masukkan sudah terdaftar</li>";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $err .= "<li> Email yang kamu masukkan tidak valid  </li>";
        }
    }

    if($password != $konfirmasi_password){
        $err .= "<li> Password dan konfirmasi password tidak sesuai </li>";
    }
    if(strlen($password)<6){
        $err .= "<li> Panjang karakter yang diizinkan minimal 6 karakter</li>";
    }
    if(empty($err)){
        $status = md5(rand(0,1000));
        $judul_email = "Halaman Konfirmasi Pendaftaran";
        $isi_email = "Akun <b>$email</b> telah berhasil dibuat";
        $isi_email .= "Sebelumnya lakukan aktivasi email";
        $isi_email .= url_dasar()."/verifikasi.php?email=$email&kode=$status";

        kirim_email($email, $nama_lengkap, $judul_email, $isi_email);

        $sql1 = "insert into members(email, nama_lengkap, password, status) values ('$email', '$nama_lengkap', md5('$password'), '$status')";
        $q1 = mysqli_query($koneksi, $sql1);
        if($q1){
            $sukses = "Proses berhasil. Silahkan cek email untuk verifikasi. ";
        }

        $sukses .= "Proses berhasil";
    }
}

?>
<?php
if($err){
    echo "<div class = 'error'> <ul> $err </ul> </div>";
}
if($sukses){
    echo "<div class = 'sukses'> $sukses </div>";
}
?>

<form action="" method="POST">
    <table>
        <tr>
            <td class="label">Email</td>
            <td>
                <input type="text" name="email" class="input" value="<?php echo $email ?>">
            </td>
        </tr>
        <tr>
            <td class="label">Nama Lengkap</td>
            <td>
                <input type="text" name="nama_lengkap" class="input" value="<?php echo $nama_lengkap ?>">
            </td>
        </tr>
        <tr>
            <td class="label">Password</td>
            <td>
                <input type="password" name="password" class="input" value="<?php echo $password ?>">
            </td>
        </tr>
        <tr>
            <td class="label">Konfirmasi Password</td>
            <td>
                <input type="password" name="konfirmasi_password" class="input" value="<?php echo $konfirmasi_password ?>">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="simpan" value="simpan" class="tb1-biru" />
            </td>
        </tr>
    </table>
</form>

<?php include("inc_footer.php") ?>