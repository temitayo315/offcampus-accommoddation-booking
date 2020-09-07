<?php
require 'assets/includes/core.inc.php';
require 'assets/includes/connect.php';
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
  <link rel="stylesheet" href="css/plugins.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header class="header header--blue header--top">
    <div class="container">
      <div class="topbar">
        <ul class="topbar__contact">
          <li><span class="ion-ios-telephone-outline topbar__icon"></span><a href="tel:7034650880" class="topbar__link">+2347034650880</a></li>
          <li><span class="ion-ios-email-outline topbar__icon"></span><a href="mailto:properticonnect@support.com" class="topbar__link">properticonnect@support.com</a></li>
        </ul><!-- .topbar__contact -->
    </div><!-- .topbar -->

    <div class="header__main">
      <div class="header__logo">
        <a href="index.php">
          <h1 class="screen-reader-text">Properti Connect</h1>
          <img src="images/uploads/logo.png" alt="Realand">
        </a>
      </div><!-- .header__main -->

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
          <li class="header__nav-item"><a href="coming_soon.php" class="header__nav-link">Blog</a></li>
          <li class="header__nav-item"><a href="submit_property.php" class="header__nav-link header__cta--outline">&plus; Submit New Property</a></li>

          <li class="header__nav-item"><a href="#Feedbackform" class="header__nav-link">Send Feedback</a></li>

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

<section class="main-slider">
  <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="realand-slider-1" data-source="gallery" style="margin:0px auto;background:rgba(0,0,0,0.5);padding:0px;margin-top:0px;margin-bottom:0px;">
    <!-- START REVOLUTION SLIDER 5.4.6 fullwidth mode -->
    <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.6">
      <ul>
        <!-- SLIDE  -->
        <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="images/revslider/main_slider_1-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
          <!-- MAIN IMAGE -->
          <img src="images/revslider/dummy.png" alt="" title="main_slider_1" width="1920" height="820" data-lazyload="images/revslider/main_slider_1.jpg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
          <!-- LAYERS -->

          <!-- LAYER NR. 1 -->
          <div class="tp-caption   tp-resizeme" id="slide-1-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-60','-40']" data-fontsize="['18','18','16','14']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 18px; line-height: 22px; font-weight: 400; color: #f3f3f3; letter-spacing: 0px;font-family:Roboto;">THE BEST REAL ESTATE DEALS </div>

          <!-- LAYER NR. 2 -->
          <div class="tp-caption   tp-resizeme" id="slide-1-layer-2" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-fontsize="['60','60','40','26']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; font-size: 60px; line-height: 22px; font-weight: 900; color: #ffffff; letter-spacing: 0px;font-family:Raleway;">Discover Your Perfect Home </div>

          <!-- LAYER NR. 3 -->
          <a href="https://www.youtube.com/watch?v=Q0CbN8sfihY" data-lity class="tp-caption   tp-resizeme" target="_self" id="slide-1-layer-7" data-x="['center','center','center','center']" data-hoffset="['6','6','6','6']" data-y="['top','top','top','top']" data-voffset="['480','380','300','230']" data-fontsize="['60','60','36','36']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-actions='' data-responsive_offset="on" data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; font-size: 60px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Open Sans;text-decoration: none;"><i class="fa fa-play-circle-o"></i> </a>
        </li>
        <!-- SLIDE  -->
        <li data-index="rs-12" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="images/revslider/main_slider_1-2-100x50.jpeg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
          <!-- MAIN IMAGE -->
          <img src="images/revslider/dummy.png" alt="" title="Main Slider 1-2" width="1920" height="820" data-lazyload="images/revslider/main_slider_1-2.jpeg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
          <!-- LAYERS -->

          <!-- LAYER NR. 4 -->
          <div class="tp-caption   tp-resizeme" id="slide-12-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-60','-40']" data-fontsize="['18','18','16','14']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 18px; line-height: 22px; font-weight: 400; color: #f3f3f3; letter-spacing: 0px;font-family:Roboto;">THE BEST REAL ESTATE DEALS </div>

          <!-- LAYER NR. 5 -->
          <div class="tp-caption   tp-resizeme" id="slide-12-layer-2" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-fontsize="['60','60','40','26']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; font-size: 60px; line-height: 22px; font-weight: 900; color: #ffffff; letter-spacing: 0px;font-family:Raleway;">Discover Your Perfect Home </div>

          <!-- LAYER NR. 6 -->
          <a href="https://www.youtube.com/watch?v=Q0CbN8sfihY" data-lity class="tp-caption   tp-resizeme" target="_self" id="slide-12-layer-7" data-x="['center','center','center','center']" data-hoffset="['6','6','6','6']" data-y="['top','top','top','top']" data-voffset="['480','380','300','230']" data-fontsize="['60','60','36','36']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-actions='' data-responsive_offset="on" data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; font-size: 60px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Open Sans;text-decoration: none;"><i class="fa fa-play-circle-o"></i> </a>
        </li>
      </ul>
      <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
    </div>
  </div>
  <!-- END REVOLUTION SLIDER -->

  <section class="main-search main-search--absolute">
    <div class="container">
      <div class="main-search__container">
        <section class="listing-search">
          <form action="index.php" method="get" class="listing-search__form">
            <div class="row">
              <div class="col-sm-3">
                <label for="listing-type" class="listing-search__label">Listing Types</label>
                <select name="listing-type" id="listing-type" class="ht-field">
                  <option disabled value="All" selected>All Listing Type</option>
                  <option value="For Rent">For Rent</option>
                  <option value="For Sale">For Sale</option>
                  <option value="Open House">For Lease</option>
                </select>
              </div><!-- .col -->

              <div class="col-sm-3">
                <label for="offer-type" class="listing-search__label">Price Range</label>
                <select name="offer-type" id="offer-type" class="ht-field">
                  <option disabled value="All" selected>Prices</option>
                  <option value="20-50">20,000 - 50,000</option>
                  <option value="50-80">50,000 - 80,000</option>
                  <option value="80-120">80,000 - 120,000</option>
                  <option value="80-120">1,000,000 - Above</option>
                </select>
              </div><!-- .col -->

              <div class="col-sm-3">
                <label for="city" class="listing-search__label">Select Your State</label>
                <select name="city" id="city" class="ht-field">
                  <option disabled value="All" selected>All States</option>
                  
                  <?php get_states();?>

                </select>
              </div><!-- .col -->

              <div class="col-sm-3">
                <button type="submit" class="btn btn-success btn-lg" style="background-color: #1fc341; margin-top: 20px">Search</button>
              </div><!-- .col -->
            </div><!-- row -->

            
          </form><!-- .listing-search__form -->
        </section><!-- .listing-search -->

        <section class="listing-sort">
          <div class="listing-sort__inner">
            <ul class="listing-sort__list">
              <li class="listing-sort__item"><a href="#" class="listing-sort__link"><i class="fa fa-th-list" aria-hidden="true" class="listing-sort__icon"></i></a></li>
              <li class="listing-sort__item"><a href="#" class="listing-sort__link"><i class="fa fa-th" aria-hidden="true" class="listing-sort__icon"></i></a></li>
              <li class="listing-sort__item"><a href="#" class="listing-sort__link listing-sort__link--active"><i class="fa fa-th-large" aria-hidden="true" class="listing-sort__icon"></i></a></li>
            </ul>

            <span class="listing-sort__result">1-9 of 25 results</span>

            <p class="listing-sort__sort">
              <label for="sort-type" class="listing-sort__label"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Sort by </label>
              <select name="sort-type" id="sort-type" class="ht-field listing-sort__field">
                <option value="default">Default</option>
                <option value="low-price">Price (Low to High)</option>
                <option value="high-price">Price (High to Low)</option>
                <option value="featured">Featured</option>
              </select>
            </p>
          </div><!-- .listing-sort__inner -->
        </section><!-- .listing-sort -->
      </div><!-- .main-search__container -->
    </div><!-- .container -->
  </section><!-- .main-search -->
</section><!-- .main-slider -->

<section class="item-grid">
  <div class="container">
    <div class="row">
      <div class="col-md-4 item-grid__container">
        <div class="listing">
          <div class="item-grid__image-container">
            <a href="single_property_2.php">
              <div class="item-grid__image-overlay"></div><!-- .item-grid__image-overlay -->
              <img src="images/uploads/real_house_luxury_villa.jpg" alt="Real House Luxury Villa" class="listing__img">
              <span class="listing__favorite"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
            </a>
          </div><!-- .item-grid__image-container -->
          <div class="item-grid__content-container">
            <div class="listing__content">
              <h3 class="listing__title"><a href="single_property_2.php">Real House Luxury Villa</a></h3>
              <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span> 157 Park 57th St, 77 - Central Area Garki, Abuja</p>
              <p class="listing__price">#2,285,500</p>
              <div class="listing__details">
                <ul class="listing__stats">
                  <li><span class="listing__figure">5<sup>&plus;</sup></span> Beds</li>
                  <li><span class="listing__figure">3</span> Baths</li>
                  <li><span class="listing__figure">1,250</span> sq.ft</li>
                </ul><!-- .listing__stats -->
                <a href="single_property_2.php" class="listing__btn">Details <span class="listing__btn-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
              </div><!-- .listing__details -->
            </div><!-- .listing-content -->
          </div>
        </div><!-- .listing -->
      </div><!-- .col -->

      <div class="col-md-4 item-grid__container">
        <div class="listing">
          <div class="item-grid__image-container">
            <a href="single_property_2.php">
              <div class="item-grid__image-overlay"></div><!-- .item-grid__image-overlay -->
              <img src="images/uploads/real_house_luxury_villa.jpg" alt="Real House Luxury Villa" class="listing__img">
              <span class="listing__favorite"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
            </a>
          </div><!-- .item-grid__image-container -->
          <div class="item-grid__content-container">
            <div class="listing__content">
              <h3 class="listing__title"><a href="single_property_2.php">Real House Luxury Villa</a></h3>
              <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span> 157 Park 57th St, 77 - Central Area Garki, Abuja</p>
              <p class="listing__price">#2,285,500</p>
              <div class="listing__details">
                <ul class="listing__stats">
                  <li><span class="listing__figure">5<sup>&plus;</sup></span> Beds</li>
                  <li><span class="listing__figure">3</span> Baths</li>
                  <li><span class="listing__figure">1,250</span> sq.ft</li>
                </ul><!-- .listing__stats -->
                <a href="single_property_2.php" class="listing__btn">Details <span class="listing__btn-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
              </div><!-- .listing__details -->
            </div><!-- .listing-content -->
          </div>
        </div><!-- .listing -->
      </div><!-- .col -->

      <div class="col-md-4 item-grid__container">
        <div class="listing">
          <div class="item-grid__image-container">
            <a href="single_property_2.php">
              <div class="item-grid__image-overlay"></div><!-- .item-grid__image-overlay -->
              <img src="images/uploads/real_house_luxury_villa.jpg" alt="Real House Luxury Villa" class="listing__img">
              <span class="listing__favorite"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
            </a>
          </div><!-- .item-grid__image-container -->
          <div class="item-grid__content-container">
            <div class="listing__content">
              <h3 class="listing__title"><a href="single_property_2.php">Real House Luxury Villa</a></h3>
              <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span> 157 Park 57th St, 77 - Central Area Garki, Abuja</p>
              <p class="listing__price">#2,285,500</p>
              <div class="listing__details">
                <ul class="listing__stats">
                  <li><span class="listing__figure">5<sup>&plus;</sup></span> Beds</li>
                  <li><span class="listing__figure">3</span> Baths</li>
                  <li><span class="listing__figure">1,250</span> sq.ft</li>
                </ul><!-- .listing__stats -->
                <a href="single_property_2.php" class="listing__btn">Details <span class="listing__btn-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
              </div><!-- .listing__details -->
            </div><!-- .listing-content -->
          </div>
        </div><!-- .listing -->
      </div><!-- .col -->

      <div class="col-md-4 item-grid__container">
        <div class="listing">
          <div class="item-grid__image-container">
            <a href="single_property_2.php">
              <div class="item-grid__image-overlay"></div><!-- .item-grid__image-overlay -->
              <img src="images/uploads/real_house_luxury_villa.jpg" alt="Real House Luxury Villa" class="listing__img">
              <span class="listing__favorite"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
            </a>
          </div><!-- .item-grid__image-container -->
          <div class="item-grid__content-container">
            <div class="listing__content">
              <h3 class="listing__title"><a href="single_property_2.php">Real House Luxury Villa</a></h3>
              <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span> 157 Park 57th St, 77 - Central Area Garki, Abuja</p>
              <p class="listing__price">#2,285,500</p>
              <div class="listing__details">
                <ul class="listing__stats">
                  <li><span class="listing__figure">5<sup>&plus;</sup></span> Beds</li>
                  <li><span class="listing__figure">3</span> Baths</li>
                  <li><span class="listing__figure">1,250</span> sq.ft</li>
                </ul><!-- .listing__stats -->
                <a href="single_property_2.php" class="listing__btn">Details <span class="listing__btn-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
              </div><!-- .listing__details -->
            </div><!-- .listing-content -->
          </div>
        </div><!-- .listing -->
      </div><!-- .col -->

      <div class="col-md-4 item-grid__container">
        <div class="listing">
          <div class="item-grid__image-container">
            <a href="single_property_2.php">
              <div class="item-grid__image-overlay"></div><!-- .item-grid__image-overlay -->
              <img src="images/uploads/real_house_luxury_villa.jpg" alt="Real House Luxury Villa" class="listing__img">
              <span class="listing__favorite"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
            </a>
          </div><!-- .item-grid__image-container -->
          <div class="item-grid__content-container">
            <div class="listing__content">
              <h3 class="listing__title"><a href="single_property_2.php">Real House Luxury Villa</a></h3>
              <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span> 157 Park 57th St, 77 - Central Area Garki, Abuja</p>
              <p class="listing__price">#2,285,500</p>
              <div class="listing__details">
                <ul class="listing__stats">
                  <li><span class="listing__figure">5<sup>&plus;</sup></span> Beds</li>
                  <li><span class="listing__figure">3</span> Baths</li>
                  <li><span class="listing__figure">1,250</span> sq.ft</li>
                </ul><!-- .listing__stats -->
                <a href="single_property_2.php" class="listing__btn">Details <span class="listing__btn-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
              </div><!-- .listing__details -->
            </div><!-- .listing-content -->
          </div>
        </div><!-- .listing -->
      </div><!-- .col -->

      <div class="col-md-4 item-grid__container">
        <div class="listing">
          <div class="item-grid__image-container">
            <a href="single_property_2.php">
              <div class="item-grid__image-overlay"></div><!-- .item-grid__image-overlay -->
              <img src="images/uploads/real_house_luxury_villa.jpg" alt="Real House Luxury Villa" class="listing__img">
              <span class="listing__favorite"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
            </a>
          </div><!-- .item-grid__image-container -->
          <div class="item-grid__content-container">
            <div class="listing__content">
              <h3 class="listing__title"><a href="single_property_2.php">Real House Luxury Villa</a></h3>
              <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span> 157 Park 57th St, 77 - Central Area Garki, Abuja</p>
              <p class="listing__price">#2,285,500</p>
              <div class="listing__details">
                <ul class="listing__stats">
                  <li><span class="listing__figure">5<sup>&plus;</sup></span> Beds</li>
                  <li><span class="listing__figure">3</span> Baths</li>
                  <li><span class="listing__figure">1,250</span> sq.ft</li>
                </ul><!-- .listing__stats -->
                <a href="single_property_2.php" class="listing__btn">Details <span class="listing__btn-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
              </div><!-- .listing__details -->
            </div><!-- .listing-content -->
          </div>
        </div><!-- .listing -->
      </div><!-- .col -->
      
    </div><!-- .row -->

    <div class="item-grid--centered">
      <a href="#" class="item-grid__load-more">Load More</a>
    </div>
  </div><!-- .container -->
</section><!-- .item-grid-3 -->
<section class="new-listing">
  <div class="container">
    <div class="new-listing__header">
      <h2 class="section__title section__title--b-margin">New Listing By State</h2>
      <a href="#" class="new-listing__all">View all states <i class="fa fa-angle-right" aria-hidden="true"></i></a>
    </div>

    <div class="new-listing__container">
      <div class="new-listing--col-md-6">
        <div class="new-listing__block">
          <a href="#">
            <div class="new-listing__bg new-listing__bg--new-york-1 new-listing--large"></div><!-- .new-listing__child -->

            <div class="new-listing__content">  
              <h3 class="new-listing__title">Kano</h3>
              <p class="new-listing__desc">55 Listings</p>
            </div><!-- .new-listing__content -->
          </a>
        </div><!-- .new-listing__block -->
      </div><!-- .col -->

      <div class="new-listing--col-md-6">
        <div class="new-listing__block">
          <a href="#">
            <div class="new-listing__bg new-listing__bg--ohio-1 new-listing--wide"></div><!-- .new-listing__bg -->

            <div class="new-listing__content">  
              <h3 class="new-listing__title">Lagos</h3>
              <p class="new-listing__desc">13 Listings</p>
            </div><!-- .new-listing__content -->
          </a>
        </div><!-- .new-listing__block -->

        <div class="new-listing__parent">
          <div class="row">
            <div class="col-md-6">
              <div class="new-listing__block">
                <a href="#">
                  <div class="new-listing__bg new-listing__bg--san-diego-1 new-listing--small"></div><!-- .new-listing__bg -->

                  <div class="new-listing__content">  
                    <h3 class="new-listing__title">Kaduna</h3>
                    <p class="new-listing__desc">35 Listings</p>
                  </div><!-- .new-listing__content -->
                </a>
              </div><!-- .new-listing__block -->
            </div><!-- .col-md-6 -->

            <div class="col-md-6">
              <div class="new-listing__block">
                <a href="#">
                  <div class="new-listing__bg new-listing__bg--new-jersey-1 new-listing--small"></div><!-- .new-listing__bg -->

                  <div class="new-listing__content">  
                    <h3 class="new-listing__title">Port Harcourt</h3>
                    <p class="new-listing__desc">20 Listings</p>
                  </div><!-- .new-listing__content -->
                </a>
              </div><!-- .new-listing__block -->
            </div><!-- .col-md-6 -->
          </div><!-- .row -->
        </div><!-- .new-listing__parent -->
      </div><!-- .col -->
    </div><!-- .new-listing__container -->
  </div><!-- .container -->
</section><!-- .new-listing -->
<section class="features">
  <div class="features__overlay">
    <h1 style="color:#ffffff; font-weight:bold;" align="center"> Why Choose Us!</h1><p></p>
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="feature">
            <img src="images/icon_map.png" alt="Map" class="feature__icon">
            <h3 class="feature__title">Freshest Market Info</h3>
            <p class="feature__desc">
              Our extensive database of listings and market info provide you the all the information you reequire at the convinience of your finger tips.
            </p>
          </div><!-- .feature -->
        </div><!-- .col -->

        <div class="col-sm-4">
          <div class="feature">
            <img src="images/icon_search.png" alt="Search" class="feature__icon">
            <h3 class="feature__title">Top Local Agents</h3>
            <p class="feature__desc">
              We can serve you with the best agents in the market that would gurantee your housing needs.
            </p>
          </div><!-- .feature -->
        </div><!-- .col -->
        <div class="col-sm-4">
          <div class="feature">
            <img src="images/icon_negotiation.png" alt="Negotiation" class="feature__icon">
            <h3 class="feature__title">Connecting You..</h3>
            <p class="feature__desc">
              We bring buyers and sellers together.
            </p>
          </div><!-- .feature -->
        </div><!-- .col -->  
      </div><!-- .row -->
    </div><!-- .container -->
  </div><!-- .features__overlay -->
</section><!-- .features -->
<section class="famous-agents">
  <div class="container">
    <div class="famous-agents__title">
      <h2 class="section__title">Famous Agents</h2>
      <ul class="slick__navigation famous-agents__navigation">
        <li class="slick-prev famous-agents__navigation-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></li>
        <li class="slick-next famous-agents__navigation-next"><i class="fa fa-angle-right" aria-hidden="true"></i></li>
      </ul>
    </div><!-- .famous-agents__title -->
    <div class="famous-agents__wrapper">

      <?php populate_famous_agents(); ?>

      

    </div><!-- .famous-agents__wrapper -->
  </div><!-- .container -->
  </section><!-- .famous_agents -->

  <section  style="margin-top:50px; margin-bottom:50px;"  id="Feedbackform">
  <div class="container">
    <div class="row">
      <div class="col-md-12 item-grid__container">
        <div style="margin-left:70px;">
          <form method="POST" action="assets/includes/feedback_form.php" >
            <div class="col-md-4">
              <label for="profile-first-name" class="my-profile__label">Full Name</label>
              <input type="text" name="fullname" class="my-profile__field" id="profile-first-name">

              <label for="profile-email" class="my-profile__label">Email*</label>
              <input type="email" required name="email" class="my-profile__field" id="profile-email">

              <label for="profile-location" class="my-profile__label">Address*</label>
              <input type="text" required name="location" class="my-profile__field" id="profile-location">

              <div>
                <label for="offer-type" class="my-profile__label">Reaction</label>
                <select name="reaction" id="offer-type" class="my-profile__field">
                  <option disabled value="All" selected>Feedback Reaction</option>
                  <option value="Happy">Happy</option>
                  <option value="Fairly Happy">Fairly Happy</option>
                  <option value="Neutral">Neutral</option>
                  <option value="Not Happy">Not Happy</option>
                </select>
              </div><!-- .col -->

              <label for="profile-twitter" class="my-profile__label">Message</label>
              <textarea name="comment" cols="50px" rows="11px" required value="" class="my-profile__field" id="profile-twitter"></textarea>
              <button type="submit" name="submit_feedback" class="my-profile__submit">Send</button>
            </div><!-- .col -->
          </form>

        </div><!-- .testimonial__content -->
      </div><!-- .testimonial--center --> 
    </div><!-- .testimonial__container -->
  </div><!-- .container -->
</section>




<section class="testimonial">
  <div class="container">
    <div class="testimonial__container testimonial--b-border">
      <div class="testimonial--centered">
        <h2 class="section__title section__title--large"><?php number_of_happy_client_feedback(); ?>&plus; Happy Clients</h2>
        <img src="images/icon_chat.png" alt="Testimonial" class="testimonial__icon">
        <div class="testimonial__content">
          <div class="testimonial__slider testimonial__slider--top">
            <?php 
                  $query = "SELECT * FROM `client_feedback` WHERE `reaction`='Happy' AND `posted` = '1'" ;
                  $query_run = mysqli_query($con,$query);
                  while($rc=mysqli_fetch_array($query_run)){ ?>
            <p>
              <?php echo $rc['message']; ?>
            </p>
             <?php } ?>
          </div><!-- .testimonial__slider -->

          <ul class="testimonial__slider testimonial__list testimonial__slider--middle">
            <li><img src="images/uploads/testimonial_avatar_2.png" alt="Mary Jane"></li>
            <li><img src="images/uploads/testimonial_avatar_1.png" alt="Karty & Will"></li>
            <li><img src="images/uploads/testimonial_avatar_3.png" alt="Jim Kay"></li>
          </ul><!-- .testimonial__slider --> 

          <div class="testimonial__slider testimonial__slider--bottom">
            <?php 
                  $query_fc = "SELECT * FROM `client_feedback` WHERE `reaction`='Happy' AND `posted` = '1'" ;
                  $query_run_fc = mysqli_query($con,$query_fc);
                  while($rc_fc=mysqli_fetch_array($query_run_fc)){ ?>
            <div class="testimonial__slider-wrapper">
              <h4 class="testimonial__customer-name"><?php echo $rc_fc['name']; ?></h4>
              <p class="testimonial__customer-company">Location:<?php echo $rc_fc['address']; ?></p>
              <img src="images/rating.png" alt="Five Stars Rating">
            </div><!-- .testimonial__slider-wrapper -->

          <?php } ?>
        </div><!-- .testimonial__content -->
      </div><!-- .testimonial--center --> 
    </div><!-- .testimonial__container -->
  </div><!-- .container -->
</section>

<!-- partners and popular links were here -->


<footer class="footer">
	<div class="footer__main footer__main--v2">
		<div class="container">
			<div class="footer__logo">
				<h1 class="screen-reader-text">Properti Connect</h1>
				<img src="images/uploads/logo.png" alt="ReaLand">
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
      <h3 class="footer__title" style="color: #ffffff; margin-bottom: 3px;">Contact Us</h3>
      <ul class="footer__list">
        <li><span class="footer--highlighted"  style="color: #ffffff;">Address:</span> <a >Somewhere in Nigeria</a></li>
        <li><span class="footer--highlighted" style="color: #ffffff;">Email:</span> <a href="mailto:ReaLand@support.com">properticonnect@support.com</a></li>
        <li><span class="footer--highlighted" style="color: #ffffff;">Phone:</span> <a href="tel:+8802993999">(+234)-70x-xxx-xxxx</a></li>
      </ul><!-- .footer__list -->
    </div><!-- .container -->
  </div><!-- .footer__main -->

  <div class="footer__copyright footer__copyright--v2">
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
</footer><!-- .footer -->
<a href="#" class="back-to-top"><span class="ion-ios-arrow-up"></span></a>

<div id="page-loader">
    <div class="page-loader__logo">
        <img src="images/uploads/logo_dark.png" alt="ReaLand Logo">
    </div><!-- .page-loader__logo -->
    
    <div class="sk-folding-cube">
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
    </div><!-- .sk-folding-cube -->
</div><!-- .page-loader -->

<!-- JS Files -->
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/plugins.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDyCxHyc8z9gMA5IlipXpt0c33Ajzqix4"></script>
<script src="https://cdn.rawgit.com/googlemaps/v3-utility-library/master/infobox/src/infobox.js"></script>
<script src="js/custom.js"></script>



</body>
</html>