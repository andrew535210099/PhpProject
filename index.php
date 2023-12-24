<?php
include_once("inc/inc_fungsi.php");
include_once("inc/inc_koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programming di RumahRafif.</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>RumahRafif.</a></div>
            <div class="menu">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#courses">Courses</a></li>
                    <li><a href="#tutors">Tutors</a></li>
                    <li><a href="#partners">Partners</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="" class="tbl-biru">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <!-- untuk home -->
        <section id="home">
            <img src="<?php echo ambil_gambar('7')?>"/>
            <div class="kolom">
                <p class="deskripsi"> <?php echo ambil_kutipan('7') ?> </p>
                <h2><?php echo ambil_judul('7') ?> </h2>
                <?php echo ambil_isi('7') ?>
                <p><a href="" class="tbl-pink">Pelajari Lebih Lanjut</a></p>
            </div>
        </section>

        <!-- untuk courses -->
        <section id="courses">
            <div class="kolom">
                <p class="deskripsi">You Will Need This</p>
                <h2>Online Courses</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed deserunt voluptatibus possimus blanditiis reiciendis. Qui, facilis! Delectus exercitationem dolores sapiente?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed deserunt voluptatibus possimus blanditiis reiciendis. Qui, facilis! Delectus exercitationem dolores sapiente?</p>
                <p><a href="" class="tbl-biru">Pelajari Lebih Lanjut</a></p>
            </div>
            <img src="https://img.freepik.com/free-vector/online-learning-isometric-concept_1284-17947.jpg?size=626&ext=jpg&ga=GA1.2.1769275626.1605867161"/>
        </section>

        <!-- untuk tutors -->
        <section id="tutors">
            <div class="tengah">
                <div class="kolom">
                    <p class="deskripsi">Our Top Tutors</p>
                    <h2>Tutors</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, optio!</p>
                </div>

                <div class="tutor-list">
                    <div class="kartu-tutor">
                        <img src="https://dfu1k3y1rami2.cloudfront.net/wp-content/uploads/2014/07/26195109/2020_cb.jpg"/>
                        <p>Jason Lee Scott</p>
                    </div>
                    <div class="kartu-tutor">
                        <img src="https://images.ctfassets.net/1wryd5vd9xez/4DxzhQY7WFsbtTkoYntq23/a4a04701649e92a929010a6a860b66bf/https___cdn-images-1.medium.com_max_2000_1_Y6l_FDhxOI1AhjL56dHh8g.jpeg"/>
                        <p>John Doe</p>
                    </div>
                    <div class="kartu-tutor">
                        <img src="https://images.fastcompany.net/image/upload/w_596,c_limit,q_auto:best,f_auto/fc/3021752-inline-i-1-why-square-designed-its-new-offices-to-work-like-a-city.jpg"/>
                        <p>Michael Dell</p>
                    </div>
                    <div class="kartu-tutor">
                        <img src="https://blogs-images.forbes.com/jackkelly/files/2019/06/Jack-Kelly_avatar_1559658819-400x400.jpg"/>
                        <p>Bruce Wills</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- untuk partners -->
        <section id="partners">
            <div class="tengah">
                <div class="kolom">
                    <p class="deskripsi">Our Top Partners</p>
                    <h2>Partners</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi magni tempore expedita sequi. Similique rerum doloremque impedit saepe atque maxime.</p>
                </div>

                <div class="partner-list">
                    <div class="kartu-partner">
                        <img src="https://www.designevo.com/res/templates/thumb_small/black-wheat-and-mortarboard.png"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-63.jpg"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-62.jpg"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="https://www.designevo.com/res/templates/thumb_small/encircled-branches-and-book.png"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-64.jpg"/>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="contact">
        <div class="wrapper">
            <div class="footer">
                <div class="footer-section">
                    <h3>RumahRafif.</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint, culpa!</p>
                </div>
                <div class="footer-section">
                    <h3>About</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint, culpa!</p>
                </div>
                <div class="footer-section">
                    <h3>Contact</h3>
                    <p>Jl. Laksda Adisucipto Sleman Yogyakarta</p>
                    <p>Kode Pos: 57365</p>
                </div>
                <div class="footer-section">
                    <h3>Social</h3>
                    <p><b>YouTube: </b>Programming di RumahRafif</p>
                </div>
            </div>
        </div>
    </div>

    <div id="copyright">
        <div class="wrapper">
            &copy; 2020. <b>RumahRafif.</b> All Rights Reserved.
        </div>
    </div>

    <!-- <div>
        <?php
        $sql1 = "select * from halaman";
        $q1 = mysqli_query($koneksi, $sql1);
        while($r1 = mysqli_fetch_array($q1)){
            ?>
            <div class="kolom">
                <h2><?php echo $r1['judul'] ?></h2>
                <p><?php echo $r1['kutipan'] ?></p>
                <p><?php echo $r1['isi'] ?></p>
            </div>
            <?php
        }
        ?>
        
    </div> -->
    
</body>
</html>