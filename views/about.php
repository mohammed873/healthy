<?php
  include_once ('../controllers/appointement.php');
  $conn = new Appointement();
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
                            <h2>About Us</h2>
                            <p>Home<span>/</span>About Us</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

   <!-- our_ability part start-->
   <section class="our_ability section_padding">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 col-lg-6">
                    <div class="our_ability_img">
                        <img src="../assests/img/ability_img.png" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="our_ability_member_text">
                        <h2>Our Patients
                            Are at the Centre of
                            Everything We Do</h2>
                        <p>It is health that is real wealth and not pieces of gold and silver.<br> <strong>Mahatma Gandhi.</strong> <br>
                        we are here to provide you with whatever you need to keep your health good.
                        </p>
                        <ul>
                            <li><span class="ti-mouse"></span>Modern Technology</li>
                            <li><span class="ti-heart-broken"></span>Worldclass Facilities</li>
                            <li><span class="ti-package"></span>Experienced Nurse</li>
                            <li><span class="ti-headphone-alt"></span>24 Hours Support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our_ability part end-->

     <!--::review_part start::-->
     <section class="review_part" id="appointment_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="client_review_part owl-carousel">
                        <div class="client_review_single">
                            <img src="../assests/img/Quote.png" class="Quote" alt="quote">
                            <div class="client_review_text">
                                <p>Cheerfulness is the best promoter of health and is as friendly to the mind as to the body.
                                </p>
                            </div>
                            <h4>Joseph Addison</h4>
                        </div>
                        <div class="client_review_single">
                            <img src="../assests/img/Quote.png" class="Quote" alt="quote">
                            <div class="client_review_text media-body">
                                <p>There is one consolation in being sick; and that is the possibility that you may recover to a better state than you were ever in before.</p>
                            </div>
                            <h4>Henry David Thoreau</h4>
                        </div>
                        <div class="client_review_single">
                            <img src="../assests/img/Quote.png" class="Quote" alt="quote">
                            <div class="client_review_text">
                                <p>Give a man health and a course to steer, and he'll never stop to trouble about whether he's happy or not.</p>
                            </div>
                            <h4>George Bernard Shaw</h4>
                        </div>
                        <div class="client_review_single">
                            <img src="../assests/img/Quote.png" class="Quote" alt="quote">
                            <div class="client_review_text">
                                <p>Health is the soul that animates all the enjoyments of life, which fade and are tasteless without it.</p>
                            </div>
                            <h4>Lucius Annaeus Seneca</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--::review_part end::-->

<!--::regervation_part start::-->
<section class="regervation_part">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-7 col-md-6">
                    <div class="regervation_part_iner" style="padding: 6px;">

                    <!-- make an appointment -->
                    <h2 class="text-center">Make an Appointment</h2>
                        <?php if(count($error) > 0): ?>
                            <div class="alert alert-danger text-center">
                                <?php foreach($error as $error): ?>
                                <li style="list-style: none;"><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['message'])): ?>
                            <div class="alert alert-success text-center p-2">
                                <li style="list-style: none;"> 
                                <?php 
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                                ?> 
                                </li>
                            </div>
                        <?php endif; ?>
                        <form method="post">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="name" name="user_name" class="form-control" id="inputEmail4" placeholder="Name" value="<?php echo $user_name; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="user_email" class="form-control" id="inputPassword4" placeholder="Email address" value="<?php echo $user_email; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="Select" name="service_type">
                                        <option value="Select service" selected>Select service</option>
                                        <option value="Doctor care">Doctor care</option>
                                        <option value="Nursing care">Nursing care</option>
                                        <option value="Medical social services">Medical social services</option>
                                        <option value="Pharmaceutical services">Pharmaceutical services</option>
                                    </select>
                                </div>
                                <div class="form-group time_icon col-md-6">
                                    <select class="form-control" id="Select2" name="time">
                                        <option value="Time" selected>Time</option>
                                        <option value="8 AM TO 10AM">8 AM TO 10AM</option>
                                        <option value="10 AM TO 12PM">10 AM TO 12PM</option>
                                        <option value="12PM TO 2PM">12PM TO 2PM</option>
                                        <option value="2PM TO 4PM">2PM TO 4PM</option>
                                        <option value="4PM TO 6PM">4PM TO 6PM</option>
                                        <option value="6PM TO 8PM">6PM TO 8PM</option>
                                        <option value="4PM TO 10PM">4PM TO 10PM</option>
                                        <option value="4PM TO 10PM">10PM TO 12PM</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" id="Textarea"  name="message"placeholder="Your Note "></textarea>
                                </div>
                                <?php  
                                    $con = $conn->connect();
                                    $sql="SELECT * FROM admins WHERE admin_status = 'doctor'";
                                    $stm=$con->prepare($sql);
                                    $stm->execute();
                                    $result=$stm->get_result();
                                ?>
                                <?php while($row=$result->fetch_assoc()){ ?>
                                   <input type="hidden" name="doctor_id" value="<?=$row['admin_id'];?>">
                                <?php } ?>
                                <input type="hidden" name="appointement_status" value="On Hold">
                            </div><br>
                            <button type="submit" name="make_appointmet"  class="btn btn-block  btn-primary p-2" >make appointmet</button>
                        </form>

                        <!-- end -->
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="reservation_img">
                        <img src="../assests/img/reservation.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::regervation_part end::-->


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
    <script src="../assests/js/mail-script.js"></script>

</body>

</html>