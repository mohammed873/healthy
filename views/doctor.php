<?php
   include_once ('../controllers/admin.php');
   $conn = new Admins();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>medical</title>
    <link rel="icon" href="../assests/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="../assests/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="../assests/css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="../assests/css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="../assests/css/flaticon.css">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="../assests/css/magnific-popup.css">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="../assests/css/nice-select.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="../assests/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="../assests/css/style.css">
</head>

<body>
     <!--::header part start::-->
     <header class="main_menu home_menu" style="background-color: #f2f6f8;position: fixed;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="home.php"> <img src="../assests/img/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="home.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">about</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Doctor.php">Doctors</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="profile.php">profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                                <br>
                                <li>
                                    <a class="btn btn-block bg-primary ml-4 text-white" href="index.php">log out</a>
                                </li>
                                <br>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg text-center" style="margin-top: 75px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Doctors</h2>
                            <p>Home<span>/</span>Doctors</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::doctor_part start::-->
    <section class="doctor_part section_padding single_doctor_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2> Experienced Doctor</h2>
                        <p>The Best Doctor For Your Health And For A Fast & Secure Secovery</>
                        <br>
                    </div>
                </div>
            </div>
            <div class="p-2">
                   <div class="text-center">
                       <?php
                            $con = $conn->connect();
                            $sql="SELECT * from admins WHERE admin_status = 'doctor'";
                            $stm=$con->prepare($sql);
                            $stm->execute();
                            $result=$stm->get_result();
                       ?>
                       <?php while($row=$result->fetch_assoc()){ ?>
                          <img src="<?php echo '../uploads/' . $row['admin_picture']; ?>" alt="profile_pic" style="width: 210px;">
                          <hr class="bg-primary">
                          <hr class="bg-primary">
                          <br>
                          <div class="doctor_info d-flex justify-content-spacearound">

                    </div>
                    <div style="text-align: initial;">
                        <h5 class="text-primary">Doctor Name: 
                            <span style="font-weight: bold; color:black">
                                <?=$row['admin_name'];?>
                            </span>
                        </h5>
                        <h5 class="text-primary">Doctor Email: 
                            <span style="font-weight: bold; color:black">
                                <?=$row['admin_email'];?>
                            </span>
                        </h5>
                        <h5 class="text-primary">Doctor Phone Number: 
                            <span style="font-weight: bold; color:black">
                               <?=$row['doctor_phone'];?>
                            </span>
                        </h5>
                        <h5 class="text-primary">linkdin Profile: 
                            <span style="font-weight: bold; color:black">
                                <a href="<?=$row['doctor_linkdin'];?>" class="text-dark">
                                    <?=$row['doctor_linkdin'];?>
                                </a>
                            </span>
                        </h5>
                        <h5 class="text-primary">Years of Experience: 
                            <span style="font-weight: bold; color:black">
                                <?=$row['years_experience'] . ' years';?>
                            </span>
                        </h5>
                        <h5 class="text-primary">Sergeries Number: 
                            <span style="font-weight: bold; color:black">
                               <?=$row['surgeries_number'] . ' times';?>
                            </span>
                        </h5>
                        <h5 class="text-primary">Doctor Specialization: 
                            <span style="font-weight: bold; color:black">
                                <?=$row['doctor_specialization'];?>
                            </span>
                        </h5>
                        <h5 class="text-primary">More About Doctor: 
                            <span style="font-weight: bold; color:black">
                                <?=$row['about_doctor'];?>
                            </span>
                        </h5>
                    </div>
            <?php } ?>    
            </div>
        </div>
    </section>
    <!--::doctor_part end::-->

    <!-- footer part start-->
    <footer class="footer-area">
        <div class="footer section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                        <h4>Services Link</h4>
                        <ul>
                            <li><a href="#">Eye treatment</a></li>
                            <li><a href="#">Skin Surgery</a></li>
                            <li><a href="#">Diagnosis clinic</a></li>
                            <li><a href="#"> Dental care</a></li>
                            <li><a href="#">Neurology service</a></li>
                            <li><a href="#">Plastic surgery</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Department</a></li>
                            <li><a href="#"> Online payment</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Department</a></li>
                        </ul>
                    </div>

                    <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                        <h4>Explore</h4>
                        <ul>
                            <li><a href="#">In the community</a></li>
                            <li><a href="#">IU health foundation</a></li>
                            <li><a href="#">Family support </a></li>
                            <li><a href="#">Business solution</a></li>
                            <li><a href="#">Community clinic</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                        <h4>Resources</h4>
                        <ul>
                            <li><a href="#">Lights were season</a></li>
                            <li><a href="#"> Their is let wherein</a></li>
                            <li><a href="#">which given over</a></li>
                            <li><a href="#">Without given She</a></li>
                            <li><a href="#">Isn two signs think</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-4 col-sm-8 col-md-8 mb-4 mb-xl-0 single-footer-widget">
                        <h4>Newsletter</h4>
                        <p>Seed good winged wherein which night multiply
                            midst does not fruitful</p>
                        <div class="form-wrap" id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="form-inline">
                                <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                                    required="" type="email">
                                <button class="click-btn btn btn-default text-uppercase">subscribe</button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                        type="text">
                                </div>

                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright_part">
            <div class="container">
                <div class="row align-items-center">
                    <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="healthy" target="_blank">healthy</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"> <i class="ti-twitter"></i> </a>
                        <a href="#"><i class="ti-instagram"></i></a>
                        <a href="#"><i class="ti-skype"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- footer part end-->

    <!-- jquery plugins here-->

    <script src="../assests/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="../assests/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="../assests/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="../assests/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="../assests/js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="../assests/js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="../assests/js/owl.carousel.min.js"></script>
    <script src="../assests/js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="../assests/js/slick.min.js"></script>
    <script src="../assests/js/jquery.counterup.min.js"></script>
    <script src="../assests/js/waypoints.min.js"></script>
    <!-- contact js -->
    <script src="../assests/js/jquery.ajaxchimp.min.js"></script>
    <script src="../assests/js/jquery.form.js"></script>
    <script src="../assests/js/jquery.validate.min.js"></script>
</body>

</html>