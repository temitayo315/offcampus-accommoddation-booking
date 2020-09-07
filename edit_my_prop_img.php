<?php
require 'assets/includes/core.inc.php';
require 'assets/includes/connect.php';

$profile_name = 'Welcome ' . get_profile_name();

$raw_user_profile_pic = get_user_profile_pic();
$user_pic = "assets" . substr($raw_user_profile_pic, 2);

$_SESSION['redirect'] = "../../edit_my_prop.php";

$imgpropid = $_GET['imgid'];

if (loggedin()) {
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
            <title>Properti Connect - Edit My Property</title>
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
            <link rel="stylesheet" href="css/plugins.css">
            <link rel="stylesheet" href="css/style.css">
        </head>

        <body>
            <header class="header header--blue">
                <div class="container">
                    <div class="header__main">
                        <div class="header__logo">
                            <a href="index.php">
                                <h1 class="screen-reader-text">Properti Connect</h1>
                                <img src="images/uploads/logo.png" alt="Realand">
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
                                    <a href="listing_2.php" class="header__nav-link">Listing</a>
                                </li>
                                <li class="header__nav-item"><a href="blog.php" class="header__nav-link">Blog</a></li>
                                <li class="header__nav-item"><a href="submit_property.php" class="header__nav-link header__cta--outline">&plus; Submit New Property</a></li>

                                <?php if (!loggedin()) { ?>
                                    <li class="header__nav-item"><a href="sign_up.php" class="header__nav-link">SIGN UP | JOIN</a></li>
                                <?php } else { ?>
                                    <li class="header__nav-item">
                                        <a href="#" class="header__nav-link">Hi, <?php echo get_profile_name(); ?>!</a>
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
                                <h2 class="bookmarked-listing__headline">Hello, <strong><?php echo get_profile_name(); ?></strong></h2>
                                <div class="settings-block">
                                    <span class="settings-block__title">Manage Account</span>
                                    <ul class="settings">
                                        <li class="setting"><a href="my_profile.php" class="setting__link"><i class="ion-ios-person-outline setting__icon"></i>My Profile</a></li>
                                    </ul><!-- settings -->
                                </div><!-- .settings-block -->

                                <div class="settings-block">
                                    <span class="settings-block__title">Manage Listing</span>
                                    <ul class="settings">
                                        <li class="setting setting--current"><a href="my_property.php" class="setting__link"><i class="ion-ios-home-outline setting__icon"></i>My Property</a></li>
                                        <li class="setting"><a href="create_open_property.php" class="setting__link"><i class="ion-ios-home-outline setting__icon"></i>Create Open Property</a></li>
                                        <li class="setting"><a href="open_property.php" class="setting__link"><i class="ion-ios-home-outline setting__icon"></i>View Open Property</a></li>
              <li class="setting"><a href="contacts_details.php" class="setting__link"><i class="ion-ios-home-outline setting__icon"></i>View Contacts</a></li>
                                        <li class="setting "><a href="submit_property.php" class="setting__link"><i class="ion-ios-upload-outline setting__icon"></i>Submit New Property</a></li>
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

                                <?php
                                $query = "SELECT * FROM `property_details` WHERE `user_id` = '" . $_SESSION['id'] . "' AND $imgpropid = `prop_id` ";
                                $query_run = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_array($query_run)) {
                                    $imgprid = $row['prop_id'];
                                    ?>

                                    <form action="assets/includes/edit_prop_img.php?getid=<?php echo $row['prop_id']; ?>" method="post" enctype="multipart/form-data">
                                        <div class="col-md-9">
                                            <div class="submit-property__block">
                                                <h3 class="submit-property__headline">Property Images</h3>

                                                <div class="submit-property__group">
                                                    <label for="property-title" class="submit-property__label">Property Title *</label>
                                                    <input type="text" disabled value="<?php echo $row['prop_title']; ?>" class="submit-property__field" name="title" id="property-title" placeholder="Perfect House for Sale" >
                                                </div><!-- .submit-property__group -->

                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="submit-property__group">
                                                            <label for="property-featured-image" class="submit-property__label">Featured Image *</label>
                                                            <img src="<?php
                                                            if ($row['featured_img'] == "") {
                                                                echo "assets/images/noimage.jpg";
                                                            } else if ($row['featured_img'] == ".." . substr($row['featured_img'], 2)) {
                                                                echo "assets" . substr($row['featured_img'], 2);
                                                            } else {
                                                                echo $row['featured_img'];
                                                            }
                                                            ?>" width="170px" height="200px" alt="<?php echo $row['prop_title'] . ' image'; ?>" class="listing__img"><p></p>
                                                            <div class="submit-property__upload">
                                                                <input type="file" required name="feat_image">
                                                                <div class="submit-property__upload-inner">
                                                                    <span class="ion-ios-plus-outline submit-property__icon"></span>
                                                                    <span class="submit-property__upload-desc">Drop image here or click to upload</span>
                                                                </div>
                                                            </div><!-- .submit-proeprty__upload -->
                                                        </div><!-- .submit-property__group -->
                                                    </div><!-- .col -->


                                                </div><!-- .row -->

                                                <button type="submit" name="submit_update_feat_img" class="submit-property__submit">Update Featured Image</button>

                                                </form>

                                                <form style="margin-top: 90px;" action="assets/includes/edit_prop_img.php?getid=<?php echo $row['prop_id']; ?>" method="post" enctype="multipart/form-data">


                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <div class="submit-property__group">
                                                                <label for="property-media" class="submit-property__label">All Images or Video *</label><p></p>

                                                                <div style="max-height: 250px; overflow-x: hidden; overflow-y: scroll;  margin:5px;">

                                                                    <?php
                                                                    $query2 = "SELECT * FROM `images_table` WHERE `prop_id` = $imgpropid ";
                                                                    $query_run2 = mysqli_query($con, $query2);
                                                                    while ($qrow = mysqli_fetch_array($query_run2)) {
                                                                        $Iid = $qrow['id'];
                                                                        ?>
                                                                        <?php
                                                                        $ext = array("png", "jpg", "jpeg", "gif");
                                                                        if ($qrow['images_path'] == "" || array_search(explode(".", $qrow['images_path'])[3], $ext)):
                                                                            ?>
                                                                            <img src="<?php
                                                                            if ($qrow['images_path'] == "") {
                                                                                echo "assets/images/noimage.jpg";
                                                                            } else if ($qrow['images_path'] == ".." . substr($qrow['images_path'], 2)) {
                                                                                echo "assets" . substr($qrow['images_path'], 2);
                                                                            } else {
                                                                                echo $qrow['images_path'];
                                                                            }
                                                                            ?>"   alt="Image 1">
                                                                             <?php else: ?>
                                                                            <video  controls>
                                                                                <source src="<?php
                                                                                if ($qrow['images_path'] == "") {
                                                                                    echo "assets/images/noimage.jpg";
                                                                                } else if ($qrow['images_path'] == ".." . substr($qrow['images_path'], 2)) {
                                                                                    echo "assets" . substr($qrow['images_path'], 2);
                                                                                } else {
                                                                                    echo $qrow['images_path'];
                                                                                }
                                                                                ?>" type="video/mp4">
                                                                            </video>
                                                                        <?php endif; ?>


                                                                    <?php } ?>

                                                                </div>

                                                                <div class="submit-property__upload">
                                                                    <input type="file" required name="images[]" multiple>
                                                                    <div class="submit-property__upload-inner">
                                                                        <span class="ion-ios-plus-outline submit-property__icon"></span>
                                                                        <span class="submit-property__upload-desc">Drop all images here or click to upload</span>
                                                                    </div>
                                                                </div><!-- .submit-proeprty__upload -->
                                                            </div><!-- .submit-property__group -->
                                                        </div><!-- .col -->
                                                    </div><!-- .row -->
                                            </div><!-- .submit-property__block --><p></p>

                                            <button type="submit" name="submit_update_other_img" class="submit-property__submit">Update Multiple Images</button>
                                        </div><!-- .col -->
                                    </form>
                                <?php } ?>
                            </div><!-- .col -->

                        </div><!-- .row -->
                    </div><!-- .my-property__container -->
                </div><!-- .container -->
            </section><!-- my-property -->
            <section class="newsletter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 newsletter__content">
                            <img src="images/icon_mail.png" alt="Newsletter" class="newsletter__icon">
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
                            <h1 class="screen-reader-text">ReaLand</h1>
                            <img src="images/uploads/logo_dark.png" alt="ReaLand">
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
            <script src="js/jquery-1.12.4.min.js"></script>
            <script src="js/plugins.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDyCxHyc8z9gMA5IlipXpt0c33Ajzqix4"></script>
            <script src="https://cdn.rawgit.com/googlemaps/v3-utility-library/master/infobox/src/infobox.js"></script>
            <script src="js/custom.js"></script>




        </body>
    </html>
    <?php
} else {
    header('LOCATION:sign_up.php');
}?>