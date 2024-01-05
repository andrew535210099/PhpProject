<?php
function url_dasar(){
    // $_SERVER['SERVER_NAME'] : alamat website, misalkan websitemu.com
    // $_SERVER['SCRIPT_NAME'] : directory website, websitemu.com/blog/
    $port = $_SERVER['SERVER_PORT'] == 84 ? ':84' : ''; // Adjust the port number as needed
    $url_dasar = "http://".$_SERVER['SERVER_NAME'].$port.str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
        // Hapus garis miring di akhir URL dasar jika ada
    $url_dasar = rtrim($url_dasar, '/');
    return $url_dasar;
}

function ambil_gambar($id_tulisan){
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id = '$id_tulisan'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $text = $r1['isi'];

    // Use preg_match_all to find all image sources
    preg_match_all('/< *img[^>]*src *= *["\']?([^"\'>]*)/i', $text, $matches);

    // Check if any matches were found
    if (!empty($matches[1])) {
        // Return the first match
        $gambar = $matches[1][0];
        $gambar = str_replace("../gambar/", url_dasar()."/gambar/", $gambar);
        return $gambar;
    } else {
        // No matches found
        return null;
    }
}

function ambil_kutipan($id_tulisan) {
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id = '$id_tulisan'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $text = $r1['kutipan'];
    return $text;
}

function ambil_judul($id_tulisan) {
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id = '$id_tulisan'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $text = $r1['judul'];
    return $text;
}

function ambil_isi($id_tulisan) {
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id = '$id_tulisan'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $text = strip_tags($r1['isi']);
    return $text;
}

function bersihkan_judul($judul){
    $judul_baru = strtolower($judul);
    $judul_baru = preg_replace("/[^a-zA-Z0-0\s]/", "", $judul_baru);
    $judul_baru = str_replace(" ", "-", $judul_baru);
    return $judul_baru;
}

function buat_link_halaman($id){
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $judul = $r1['judul'];
    return url_dasar()."/halaman.php/$id/$judul";
    // return url_dasar()."halaman.php"."/$id"."/$judul";
}

function dapatkan_id(){
    $id = "";
    if(isset($_SERVER['PATH_INFO'])){
        $id = dirname($_SERVER['PATH_INFO']);
        $id = preg_replace("/[^0-9]/","",$id);
    }
    return $id;
}

function set_isi($isi){
    $isi = str_replace("../gambar/", url_dasar().'/gambar/', $isi);
    return $isi;
}

function maximum_kata($isi, $maximum){
    $array_isi = explode(" ", $isi);
    $array_isi = array_slice($array_isi,0, $maximum);
    $isi = implode(" ", $array_isi);
    return $isi;
}

function tutors_foto($id){
    global $koneksi;
    $sql1 = "SELECT * FROM tutors WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $foto = $r1['foto'];

    if($foto){
        return $foto;
    }else{
        return 'Default Picture';
    }
}       

?>