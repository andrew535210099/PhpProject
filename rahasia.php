<?php include("inc_header.php") ?>

<?php
// if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
//     echo "<div class='error'>" . $_SESSION['error'] . "</div>";
// }
if(isset($_SESSION['error'])){
    $_SESSION['error'] .= "Error";
    echo "<div class='error'>" .$_SESSION['error']. "</div>";
    }
?>
<?php
if(empty($_SESSION['error'])){
    ?>
<div style="background-color: red; font-size:large; padding: 50px; color:white">
    Selamat datang <?php echo $_SESSION['members_nama_lengkap'] ?> di halaman rahasia
</div>
<?php
}
?>
<?php include("inc_footer.php") ?>