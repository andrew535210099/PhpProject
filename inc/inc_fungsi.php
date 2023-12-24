<?php
function url_dasar(){
    // $_SERVER['SERVER_NAME'] : alamat website, misalkan websitemu.com
    // $_SERVER['SCRIPT_NAME'] : directory website, websitemu.com/blog/
    $port = $_SERVER['SERVER_PORT'] == 3000 ? ':3000' : ''; // Adjust the port number as needed
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
?>