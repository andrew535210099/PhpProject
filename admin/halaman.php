<?php include("inc_header.php") ?>
<?php
$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
?>
<h1>Halaman Admin</h1>
<p>
    <a href="halaman_input.php">
        <input type="button" class="btn btn-primary" value="Buat Halaman Baru">
    </a>
</p>
<form class="row g-3" method="get">
    <div class="col-auto">
        <input type="text" class="form-control" placeholder="Masukkan kata kunci" name="katakunci" value="<?php echo $katakunci ?>" />
    </div>
    <div class="col-auto">
        <input type="submit" name="cari" value="Cari tulisan" class="btn btn-secondary">
    </div>
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-1"></th>
            <th>Judul</th>
            <th>Kutipan</th>
            <th class="col-2"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sqltambahan = "";
        if($katakunci != ''){
            $array_katakunci = explode(" ", $katakunci);
            for($x=0;$x<count($array_katakunci);$x++){
                $sqlcari[] = "(judul like '%".$array_katakunci[$x]."%' or kutipan like '%".$array_katakunci[$x]."%' or isi like '%".$array_katakunci[$x]."%')";
            }
            $sqltambahan = "where ".implode(" or ", $sqlcari);
        }
        $sql1 = "select * from halaman $sqltambahan order by id desc";
        $q1 = mysqli_query($koneksi, $sql1);
        $nomor = 1;
        while ($r1 = mysqli_fetch_array($q1)) {
        ?>
            <tr>
                <td><?php echo $nomor++ ?></td>
                <td><?php echo $r1['judul'] ?></td>
                <td><?php echo $r1['kutipan'] ?></td>
                <td>
                    <button type="button" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-warning text-dark">Edit</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php include("inc_footer.php") ?>