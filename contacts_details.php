<?php
require 'assets/includes/core.inc.php';
require 'assets/includes/connect.php';

$profile_name = 'Welcome '.get_profile_name();

$raw_user_profile_pic = get_user_profile_pic(); 
$user_pic = "assets".substr($raw_user_profile_pic, 2);

$_SESSION['redirect'] = "../../contacts_details.php";



if(loggedin()){
  ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">
<head>
  <!-- Basic need -->
  <title>Properti Connect</title>
  <meta charset="UTF-8">
    <meta name="description" content="Properti Connect - Real Estate Connect">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="profile" href="">
    <!-- <link rel="shortcut icon" href="images/favicon.ico"> -->

    <!-- Mobile specific meta -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="format-detection" content="telephone-no">

    <!-- External Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Raleway:400,700,800|Roboto:400,500,700" rel="stylesheet"> 

    <!-- CSS files -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="header header--blue">
        <div class="container">
          <div class="header__main">
            <div class="header__logo">
              <a href="index.php">
                <h1 class="screen-reader-text">OffKampus Accommodation</h1>
                 <img src="images/icon_search.png" alt="Realand">
            </a>
        </div><!-- .header__logo -->

        <div class="nav-mobile">
          <a href="#" class="nav-toggle">
            <span></span>
        </a><!-- .nav-toggle -->
    </div><!-- .nav-mobile -->

    <div class="header__menu header__menu--v1">
        <ul class="header__nav">
          <li class="header__nav-item">
            <a href="index.php" class="header__nav-link">Home</a>
        </li>
        <li class="header__nav-item">
            <a href="student/" class="header__nav-link">Find Roommate</a>
        </li>
        <li class="header__nav-item"><a href="submit_property.php" class="header__nav-link header__cta--outline">&plus; Submit New Property</a></li>

 <?php 
          if(!loggedin()){ ?>
         <li class="header__nav-item"><a href="sign_up.php" class="header__nav-link">SIGN UP | JOIN</a></li>
    <?php }else{ ?>
            <li class="header__nav-item">
              <a href="#" class="header__nav-link">Hi, <?php echo get_profile_name();?>!</a>
            <ul>
              <li class="setting"><a href="my_profile.php" class="setting__link"><i class="ion-ios-person-outline setting__icon"></i>My Profile</a></li>
              <li class="setting"><a href="my_property.php" class="setting__link"><i class="ion-ios-home-outline setting__icon"></i>My Property</a></li>
              <li class="setting"><a href="change_password.php" class="setting__link"><i class="ion-ios-unlocked-outline setting__icon"></i>Change Password</a></li>
              <li class="setting"><a href="logout.php" class="setting__link"><i class="ion-ios-undo-outline setting__icon"></i>Log Out</a></li>
          </ul>
          </li>
    <?php } ?>

    </ul><!-- .header__nav -->
</div><!-- .header__menu -->

</div><!-- .header__main -->
</div><!-- .container -->
</header><!-- .header -->
<section class="submit-property">
    <div class="container">
        <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding ht-breadcrumbs--b-border">
            <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">Home</span></a></li>
            <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">Pages</span></a></li>
            <li class="ht-breadcrumbs__item"><span class="ht-breadcrumbs__page">My Property</span></li>
        </ul><!-- .ht-breadcrumb -->

        <div class="submit-property__container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="bookmarked-listing__headline">Hello, <strong><?php echo get_profile_name();?></strong></h2>
                    <div class="settings-block">
                        <span class="settings-block__title">Manage Account</span>
                        <ul class="settings">
                            <li class="setting"><a href="my_profile.php" class="setting__link"><i class="ion-ios-person-outline setting__icon"></i>My Profile</a></li>
                        </ul><!-- settings -->
                    </div><!-- .settings-block -->

                    <div class="settings-block">
                        <span class="settings-block__title">Manage Listing</span>
                        <ul class="settings">
                            <li class="setting "><a href="my_property.php" class="setting__link"><i class="ion-ios-home-outline setting__icon"></i>My Property</a></li>
                            <li class="setting "><a href="create_open_property.php" class="setting__link"><i class="ion-ios-home-outline setting__icon"></i>Open house for Vacancy</a></li>
                            <li class="setting"><a href="open_property.php" class="setting__link"><i class="ion-ios-home-outline setting__icon"></i>View Open Property</a></li>
                            <li class="setting setting--current"><a href="contacts_details.php" class="setting__link"><i class="ion-ios-home-outline setting__icon"></i>View Contacts</a></li>
                            <li class="setting"><a href="submit_property.php" class="setting__link"><i class="ion-ios-upload-outline setting__icon"></i>Submit New Property</a></li>
                            <li class="setting"><a href="package.php" class="setting__link"><i class="ion-ios-cart-outline setting__icon"></i>My Packages</a></li>
                        </ul><!-- settings -->
                    </div><!-- .settings-block -->

                    <div class="settings-block">
                        <ul class="settings">
                            <li class="setting"><a href="change_password.php" class="setting__link"><i class="ion-ios-unlocked-outline setting__icon"></i>Change Password</a></li>
                            <li class="setting"><a href="logout.php" class="setting__link"><i class="ion-ios-undo-outline setting__icon"></i>Log Out</a></li>
                        </ul><!-- settings -->
                    </div><!-- .settings-block -->
                </div><!-- .col -->

                <div class="col-md-9">
                    <ul class="manage-list manage-list--my-property">
                        <li class="manage-list__header">
                            <span  class="manage-list__title"><i class="fa fa-calendar-o" aria-hidden="true"></i> Schedule</span>
                            <span class="manage-list__title"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Name | Contact | Message</span>
                        </li>  
                        <div style="max-height: 500px; overflow-y: scroll;"> 
                          <?php populate_contact_details(); ?>
                        </div>
                         </div>                        
                    </ul>
                </div><!-- .col -->

            </div><!-- .row -->
        </div><!-- .my-property__container -->
    </div><!-- .container -->
</section><!-- my-property -->
<section class="newsletter">
  <div class="container">
    <div class="row">
      <div class="col-md-6 newsletter__content">
        <img src="assets/images/icon_mail.png" alt="Newsletter" class="newsletter__icon">
        <div class="newsletter__text-content">
          <h2 class="newsletter__title">Newsletter</h2>
          <p class="newsletter__desc">Sign up for our newsletter to get up-to-date from us</p>
        </div>
      </div><!-- .col -->

      <div class="col-md-6">
        <form action="index.php" class="newsletter__form">
          <input type="email" class="newsletter__field" placeholder="Enter Your E-mail">
          <button type="submit" class="newsletter__submit">Subscribe</button>
        </form>
      </div><!-- .col -->   
    </div><!-- .row -->
  </div><!-- .container -->
</section><!-- .newsletter -->
<footer class="footer">
  <div class="footer__main">
    <div class="container">
      <div class="footer__logo">
        <h1 class="screen-reader-text">Properti Connect</h1>
        <img src="assets/images/uploads/logo_dark.png" alt="Properti Connect">
      </div><!-- .footer__logo -->
      <p class="footer__desc">Properti Connect is made for buying, selling, renting and leasing out houses faster in Nigeria, it's easy and customized for you.</p>
      <ul class="footer__social">
        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
      </ul><!-- .footer__social -->
            <p></p><br>
            <h3 class="footer__title" style="margin-bottom:3px;">Contact Us</h3>
            <ul class="footer__list">
                <li><span class="footer--highlighted">Address:</span> <a href="#">Somewhere in Nigeria</a></li>
                <li><span class="footer--highlighted">Email:</span> <a href="mailto:properticonnect@support.com">properticonnect@support.com</a></li>
                <li><span class="footer--highlighted">Phone:</span> <a href="tel:+2342993999">(+234)-70x-xxx-xxxx</a></li>
            </ul><!-- .footer__list -->
        </div><!-- .container -->
    </div><!-- .footer__main -->

    <div class="footer__copyright">
      <div class="container">
         <div class="footer__copyright-inner">
            <p class="footer__copyright-desc">
                &copy; 2019 <span class="footer--highlighted-v2">Properti Connect</span> Real Estate Platform in Nigeria. All Right Reserved.
            </p>
            <ul class="footer__copyright-list">
                <li><span class="footer--highlighted-v2">Site Developed By</span><a href="www.falconinnotech.com" target="blank"> Falcon Innovative Technologies</a></li>
            </ul>
        </div><!-- .footer__copyright-inner -->
    </div><!-- .container -->
</div><!-- .footer__copyright -->
</footer><!-- .footer --><a href="#" class="back-to-top"><span class="ion-ios-arrow-up"></span></a>



<!-- JS Files -->
<script src="assets/js/jquery-1.12.4.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDyCxHyc8z9gMA5IlipXpt0c33Ajzqix4"></script>
<script src="https://cdn.rawgit.com/googlemaps/v3-utility-library/master/infobox/src/infobox.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/custom2.js"></script>
</body>
</html>



<?php }else{header('LOCATION:sign_up.php');}?>