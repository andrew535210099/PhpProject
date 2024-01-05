<?php
$host = "localhost:8111";
$user = "root";
$pass = "";
$db = "companyprofile";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if(!$koneksi){
    die("Gagal terkoneksi");
}else{
    // echo "Koneksi berhasil";
}