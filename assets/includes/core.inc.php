<?php
ob_start();
session_start();
//shows the path like/my/series/index.html of the page that have required the core.php on its page
$currentfile = $_SERVER['SCRIPT_NAME'];

// Shows the page a user was on before they loggedout back but this time they wont be logged in
@$referer = $_SERVER['HTTP_REFERER'];

// checks if a user have loggd in
function loggedin() {
    require 'connect.php';
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        // anything about logged in users homepage or original homepage for logged in users
        return true;
    } else {
        return false;
    }
}

function user_login($email, $pass) {
    require 'connect.php';
    $pass = sha1($pass);
    $query = "SELECT `id` FROM `agents` WHERE `email`='" . mysqli_real_escape_string($con, $email) . "' AND `password`='" . mysqli_real_escape_string($con, ($pass)) . "' LIMIT 1 ";
    if ($query_run = mysqli_query($con, $query)) {
        $query_row = mysqli_num_rows($query_run);
        if ($query_row == 1) {
            if ($result = mysqli_fetch_assoc($query_run)) {
                $_SESSION['id'] = $result['id'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function get_profile_name() {
    require 'connect.php';
    $query = "SELECT `fname`, `lname` FROM `agents` WHERE id = '" . $_SESSION['id'] . "' LIMIT 1";
    if ($query_run = mysqli_query($con, $query)) {
        if ($result = mysqli_fetch_assoc($query_run)) {
            return $result['fname']." ".$result['lname'];
        }
    }
}

function get_agent_id() {
    require 'connect.php';
    $query = "SELECT `id` FROM `agents` WHERE id = '" . $_SESSION['id'] . "' LIMIT 1";
    if ($query_run = mysqli_query($con, $query)) {
        if ($result = mysqli_fetch_assoc($query_run)) {
            return $result['id'];
        }
    }
}

function get_user_type() {
    require 'connect.php';
    $query = "SELECT `type` FROM `agents` WHERE id = '" . $_SESSION['id'] . "' LIMIT 1";
    if ($query_run = mysqli_query($con, $query)) {
        if ($result = mysqli_fetch_assoc($query_run)) {
            return $result['type'];
        }
    }
}

function get_email() {
    require 'connect.php';
    $query = "SELECT `email` FROM `agents` WHERE id = '" . $_SESSION['id'] . "' LIMIT 1";
    if ($query_run = mysqli_query($con, $query)) {
        if ($result = mysqli_fetch_assoc($query_run)) {
            return $result['email'];
        }
    }
}

function user_notexist($email) {
    require 'connect.php';
    $query = "SELECT `email` FROM `agents` WHERE `email`= '" . mysqli_real_escape_string($con, $email) . "'";
    if ($query_run = mysqli_query($con, $query)) {
        $query_row = mysqli_num_rows($query_run);
        if ($query_row == 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function get_user_profile_pic() {
    require 'connect.php';
    $query = "SELECT `profile_pic` FROM `agents` WHERE id = '" . $_SESSION['id'] . "' LIMIT 1";
    if ($query_run = mysqli_query($con, $query)) {
        if ($result = mysqli_fetch_assoc($query_run)) {
            return $result['profile_pic'];
        }
    }
}

function register($fname, $lname, $email, $pass) {
    require 'connect.php';
    $pass = sha1($pass);
    $query = "INSERT INTO `agents` (`fname`, `lname`, `email`, `businessName`, `phone`, `address`, `about`, `twitter`, `facebook`, `password`, `clearance`, `package`,  `profile_pic`, `date`) VALUES ('" . mysqli_real_escape_string($con, $fname) . "','" . mysqli_real_escape_string($con, $lname) . "', '" . mysqli_real_escape_string($con, $email) . "', 'Business Name', '070xxxxxxxx','your address', 'Hello there, write about yourself', 'https://www.twitter.com/@example', 'https://www.facebook.com/example', '" . mysqli_real_escape_string($con, ($pass)) . "', '0', 'Basic', 'profile_pic_goes_here', CURDATE())";
    if ($query_run = mysqli_query($con, $query)) {
        return true;
    } else {
        return false;
    }
}

function get_location() {
    require 'connect.php';
    $query = "SELECT * FROM `location`";
    if ($query_run = mysqli_query($con, $query)) {
        while ($query_row = mysqli_fetch_array($query_run)) {
            ?>
            <option value ="<?php echo $query_row['id']; ?>"><?php echo $query_row['location_name']; ?></option>
            <?php
        }
    }
}

function get_amenities() {
    require 'connect.php';
    $query = "SELECT * FROM `amenities`";
    if ($query_run = mysqli_query($con, $query)) {
        while ($query_row = mysqli_fetch_array($query_run)) {
            ?>
            <div class="submit-property__wrapper">
                <input type="checkbox" value="<?php echo $query_row['id']; ?>" name="checkA[]" id="amenities">
                <label for="<?php echo $query_row['amenities_name']; ?>"><?php echo $query_row['amenities_name']; ?></label>
            </div>
            <?php
        }
    }
}

function get_roomTypes() {
    require 'connect.php';
    $query = "SELECT * FROM `room_types`";
    if ($query_run = mysqli_query($con, $query)) {
        while ($query_row = mysqli_fetch_array($query_run)) {
            ?>
            <option value="<?php echo $query_row['r_id']; ?>"><?php echo $query_row['types']; ?></option>
            <?php
        }
    }
}

function populate_listings_on_index($pagenumb = 1, $limit) {
    if (!is_integer((int) $pagenumb)) {
        $pagenumb = 1;
    }
    require 'connect.php';
    $pagenum = ($pagenumb - 1) * $limit;
    $query = "SELECT * FROM `property_details` INNER JOIN `room_types` ON room_types.r_id =property_details.roomtype_id WHERE `prop_status` ='Approved' ORDER BY `prop_id` DESC LIMIT $pagenum, $limit  ";
    $query_run = mysqli_query($con, $query);
    $query_row = mysqli_num_rows($query_run);
    if ($query_row == 0) {
        echo "No Listings Yet";
    } else {
        while ($row = mysqli_fetch_array($query_run)) {
            ?>

            <div class="col-md-4 item-grid__container">
                <div class="listing">
                    <div class="item-grid__image-container">
                        <a href="single_property_2.php?propID=<?php echo $row['prop_id']; ?>">
                            <div class="item-grid__image-overlay"></div><!-- .item-grid__image-overlay -->
                            <img src="<?php
                            if ($row['featured_img'] == "") {
                                echo "assets/images/noimage.jpg";
                            } else if ($row['featured_img'] == ".." . substr($row['featured_img'], 2)) {
                                echo "assets" . substr($row['featured_img'], 2);
                            } else {
                                echo $row['featured_img'];
                            }
                            ?>"  alt="<?php echo $row['prop_name']; ?>" class="listing__img">
                            <span class="listing__favorite"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                        </a>
                    </div><!-- .item-grid__image-container -->
                    <div class="item-grid__content-container">
                        <div class="listing__content">
                            <h2 class="listing__title" style="color: green"><a href="single_property_2.php?propID=<?php echo $row['prop_id']; ?>"><?php echo $row['prop_name']; ?></a></h2>
                            <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span> 
                                Location: <?php echo $row['prop_address']; ?></p>
                            <p class="listing__price"><i class="fa fa-money"></i> Price: ₦<?php echo $row['prop_price']; ?> /year</p>

                            <p class="listing__price"><i class="fa fa-check"></i> Room Type: <?php echo $row['types']; ?></p>

                            <p class="listing__price"><i class="fa fa-building"></i> Proximity to school: <?php echo $row['proximity']; ?></p>
                            <div class="listing__details">
                                <!-- .listing__stats -->
                                <a href="single_property_2.php?propID=<?php echo $row['prop_id']; ?>" class="listing__btn">Checkout Details <span class="listing__btn-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            </div><!-- .listing__details -->
                        </div><!-- .listing-content -->
                    </div>
                </div><!-- .listing -->
            </div><!-- .col -->	

            <?php
        }
    }
}

function populate_listings_for_single_agent($agentid){
    require 'connect.php';
    $query = "SELECT * FROM `property_details` WHERE `prop_status` ='Approved' AND `agent_id`='$agentid' ORDER BY `prop_id` DESC";
    $query_run = mysqli_query($con, $query);
    $query_row = mysqli_num_rows($query_run);
    if ($query_row == 0) {
        echo "No Listings Yet";
    } else {
        while ($row = mysqli_fetch_array($query_run)) {
            ?>

            <div class="col-md-4 item-grid__container">
                <div class="listing">
                    <div class="item-grid__image-container">
                        <a href="single_property_2.php?propID=<?php echo $row['prop_id']; ?>">
                            <div class="item-grid__image-overlay"></div><!-- .item-grid__image-overlay -->
                            <img src="<?php
                            if ($row['featured_img'] == "") {
                                echo "assets/images/noimage.jpg";
                            } else if ($row['featured_img'] == ".." . substr($row['featured_img'], 2)) {
                                echo "assets" . substr($row['featured_img'], 2);
                            } else {
                                echo $row['featured_img'];
                            }
                            ?>"  alt="<?php echo $row['prop_name']; ?>" class="listing__img">
                            <span class="listing__favorite"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                        </a>
                    </div><!-- .item-grid__image-container -->
                    <div class="item-grid__content-container">
                        <div class="listing__content">
                            <h3 class="listing__title"><a href="single_property_2.php?propID=<?php echo $row['prop_id']; ?>"><?php echo $row['prop_name']; ?></a></h3>
                            <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span><?php echo $row['prop_address']; ?></p>
                            <p class="listing__price">₦<?php echo $row['prop_price']; ?></p>
                            <div class="listing__details">
                                
                                <a href="single_property_2.php?propID=<?php echo $row['prop_id']; ?>" class="listing__btn">Details <span class="listing__btn-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            </div><!-- .listing__details -->
                        </div><!-- .listing-content -->
                    </div>
                </div><!-- .listing -->
            </div><!-- .col -->	

            <?php
        }
    }
}

function populate_featured_listings_on_index() {
    require 'connect.php';
    $query = "SELECT * FROM `property_details` LEFT JOIN `agents` ON `agents`.`id` = `property_details`.`agent_id` JOIN `room_types` ON room_types.r_id = property_details.roomtype_id WHERE `prop_status` ='Approved' ORDER BY `prop_id` DESC ";
    $query_run = mysqli_query($con, $query);
    $query_row = mysqli_num_rows($query_run);
    if ($query_row == 0) {
        echo "No Featured Listings Yet";
    } else {
        while ($row = mysqli_fetch_array($query_run)) {
                ?>

                <div class="col-md-4 featured-listing__container">
                     <div class="listing">
                    <div class="item-grid__image-container">
                        <a href="single_property_2.php?propID=<?php echo $row['prop_id']; ?>">
                            <div class="item-grid__image-overlay"></div><!-- .item-grid__image-overlay -->
                            <img src="<?php
                            if ($row['featured_img'] == "") {
                                echo "assets/images/noimage.jpg";
                            } else if ($row['featured_img'] == ".." . substr($row['featured_img'], 2)) {
                                echo "assets" . substr($row['featured_img'], 2);
                            } else {
                                echo $row['featured_img'];
                            }
                            ?>"  alt="<?php echo $row['prop_name']; ?>" class="listing__img">
                            <span class="listing__favorite"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                        </a>
                    </div><!-- .item-grid__image-container -->
                    <div class="item-grid__content-container">
                        <div class="listing__content">
                            <h3 class="listing__title"><a href="single_property_2.php?propID=<?php echo $row['prop_id']; ?>"><?php echo $row['prop_name']; ?></a></h3>
                            <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span> 
                                Location: <?php echo $row['prop_address']; ?></p>
                            <p class="listing__price"><i class="fa fa-money"></i> Price: ₦<?php echo $row['prop_price']; ?> /year</p>

                            <p class="listing__price"><i class="fa fa-check"></i> Room Type: <?php echo $row['types']; ?></p>

                            <p class="listing__price"><i class="fa fa-building"></i> Proximity to school: <?php echo $row['proximity']; ?></p>
                            <div class="listing__details">
                                <!-- .listing__stats -->
                                <a href="single_property_2.php?propID=<?php echo $row['prop_id']; ?>" class="listing__btn">Checkout Details <span class="listing__btn-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            </div><!-- .listing__details -->
                        </div><!-- .listing-content -->
                    </div>
                </div><!-- .col -->

                <?php
        }
    }
}

function populate_famous_agents() {
    require 'connect.php';
    $query = "SELECT * FROM `agents` LIMIT 1,5"; 
    $query_run = mysqli_query($con, $query);
    $query_row = mysqli_num_rows($query_run);
    if ($query_row == 0) {
        echo "No Famous Agents Yet";
    } else {
        while ($query_row = mysqli_fetch_array($query_run)) {
            ?>

            <div class="famous-agents__single">
                <div class="famous-agents__header">
                    <img src="<?php
                    if ($query_row['profile_pic'] == "profile_pic_goes_here") {
                        echo "assets/images/noimage.jpg";
                    } else if ($query_row['profile_pic'] == ".." . substr($query_row['profile_pic'], 2)) {
                        echo "assets/" . substr($query_row['profile_pic'], 3);
                    } else {
                        echo $query_row['profile_pic'];
                    }
                    ?>" width="170px" height="200px">
                    <ul class="famous-agents__social">
                        <li><a href="<?php echo $query_row['facebook']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i>
                            </a></li>
                        <li><a href="<?php echo $query_row['twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i>
                            </a></li>
                    </ul><!-- .famous_agents__social -->
                </div><!-- .famous-agents__header -->
                <div class="famous-agents__content">
                    <h4 class="famous-agents__name"><a href="agents_single.php?usrid=<?php echo $query_row['id']; ?>"><?php echo $query_row['fname']." ".$query_row['lname']; ?></a></h4>
                    <span class="famous-agents__position"><?php echo $query_row['businessName']; ?>&reg;</span>
                    <ul class="famous-agents__contact">
                        <li class="famous-agents__phone"><i class="fa fa-phone fa-fw" aria-hidden="true"></i><a href="tel:<?php echo $query_row['phone']; ?>"><?php echo $query_row['phone']; ?></a></li>
                        <li class="famous-agents__email"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i><a href="mailto:<?php echo $query_row['email']; ?>"><?php echo $query_row['email']; ?></a></li>
                    </ul><!-- .famous-agents__contact -->
                </div><!-- .famous-agents__content -->
            </div><!-- .famous-agents__single -->
            <?php
        }
    }
}

function populate_my_property() {
    require 'connect.php';
    $query = "SELECT * FROM `property_details` WHERE `prop_status`='Approved' AND `agent_id` = '" . $_SESSION['id'] . "' ORDER by `prop_id` DESC";
    $query_run = mysqli_query($con, $query);
    $query_row = mysqli_num_rows($query_run);
    if ($query_row == 0) {
        echo "None of your Properties Approved Yet";
    } else {
        while ($row = mysqli_fetch_array($query_run)) {
            ?>

            <li class="manage-list__item">
                <div class="manage-list__item-container">
                    <div class="manage-list__item-img">
                        <a href="single_property_1.php?propID=<?php echo $row['prop_id']; ?>">
                            <img src="<?php
                            if ($row['featured_img'] == "") {
                                echo "assets/images/noimage.jpg";
                            } else if ($row['featured_img'] == ".." . substr($row['featured_img'], 2)) {
                                echo "assets" . substr($row['featured_img'], 2);
                            } else {
                                echo $row['featured_img'];
                            }
                            ?>" width="170px" height="200px" alt="<?php echo $row['prop_name'] . 'image'; ?>" class="listing__img">
                        </a>
                    </div><!-- manage-list__item-img -->

                    <div class="manage-list__item-detail">
                        <h3 class="listing__title"><a href="single_property_1.php?propID=<?php echo $row['prop_id']; ?>">&nbsp;&nbsp;<?php echo $row['prop_name']; ?></a></h3>
                        <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span>&nbsp;&nbsp;<?php echo $row['prop_address']; ?></p>
                        &nbsp;&nbsp;<p class="listing__price">₦<?php echo $row['prop_price']; ?></p>
                    </div>
                </div><!-- .manage-list__item-container -->

                <div class="manage-list__expire-date"><?php echo date("F d, Y", strtotime($row['date'])); ?></div>

                <div class="manage-list__action">
                    <a href="edit_my_prop.php?propertid=<?php echo $row['prop_id']; ?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a><p></p><br>
                    <a href="#" class="remove" id="<?php echo $row['prop_id']; ?>"><i class="fa fa-times" aria-hidden="true"></i> Remove</a>
                </div>
            </li><!-- .manage-list__item" -->

            <?php
        }
    }
}

function populate_open_property() {
    require 'connect.php';
    $query_run = mysqli_query($con, "select * from open_property_details left join property_details on property_details.prop_id = open_property_details.prop_id where agent_id = '" . $_SESSION['id'] . "' order by open_prop_id desc");
    $query_row = mysqli_num_rows($query_run);
    if ($query_row == 0) {
        echo "No Open Property Yet";
    } else {
        while ($row = mysqli_fetch_array($query_run)) {
            ?>
            <li class="manage-list__item">
                <div class="manage-list__item-container">
                    <div class="manage-list__item-img">
                        <a href="single_property_2.php?propID=<?php echo $row['prop_id']; ?>">
                            <img src="<?php
                            if ($row['featured_img'] == "") {
                                echo "assets/images/noimage.jpg";
                            } else if ($row['featured_img'] == ".." . substr($row['featured_img'], 2)) {
                                echo "assets" . substr($row['featured_img'], 2);
                            } else {
                                echo $row['featured_img'];
                            }
                            ?>" width="170px" height="200px" alt="<?php echo $row['prop_name'] . ' image'; ?>" class="listing__img">
                        </a>
                    </div><!-- manage-list__item-img -->

                    <div class="manage-list__item-detail">
                        <h3 class="listing__title"><a href="single_property_2.php?propID=<?php echo $row['prop_id']; ?>"><?php echo $row['prop_name']; ?></a></h3>
                        <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span> <?php echo $row['prop_address']; ?></p>
                        <p class="listing__price"><i class="fa fa-money"></i> ₦<?php echo $row['prop_price']; ?></p>
                    </div>
                </div><!-- .manage-list__item-container -->

                <div class="manage-list__expire-date"><?php echo $row['day'] . " - " . $row['time']; ?></div>

                <div >
                    <a href="edit_open_prop.php?id=<?php echo $row['prop_id']; ?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a><p></p>
                    <a href="view_schedule_open_prop.php?id=<?php echo $row['prop_id']; ?>" class="edit"><i class="fa fa-eye" aria-hidden="true"></i> View Schedules</a><p></p>
                    <?php if ($row['status'] == "open") { ?>
                        <a href = "#" class="close" style="color:red;" id="<?php echo $row['prop_id']; ?>"><i class="fa fa-times" aria-hidden="true"></i> Close Vacancy</a><p></p>
                    <?php } else { ?>
                        <a href = "#" style="color:green;" class="open" id="<?php echo $row['prop_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i> Open Vacancy</a><p></p>
                    <?php } ?>
                    <a href = "#" style="color:red;" class="removeopenhouse" id="<?php echo $row['open_prop_id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a>
                </div>
            </li><!-- .manage-list__item" -->

            <?php
        }
    }
}

function populate_contact_open_property($id) {
    require 'connect.php';
    $query_run = mysqli_query($con, "select * from booking left join property_details on property_details.prop_id = booking.open_prop_id where open_prop_id = $id order by open_prop_id desc");
    $query_row = mysqli_num_rows($query_run);
    if ($query_row == 0) {
        echo "<h3>No Contacts Yet</h3>";
    } else {
        while ($row = mysqli_fetch_array($query_run)) {
            ?>
            <div class="col-sm-6">
                <div class="property__form-wrapper">
                    <div class="property__form-field property__form-date">
                        <h6>Contact Schedule:</h6>
                        <?php echo $row['schedule_date']." "."at"." ".$row['schedule_time']; ?>
                    </div>
                </div>
            </div>  
            <div class="col-sm-6">
                <div class="property__form-wrapper">      
                    <div class="property__form-field">
                        <h6>Name:</h6>
                        <?php echo $row['firstname']." ".$row['lastname']; ?>
                    </div>
                </div>
            </div>  

            <div class="col-sm-6">
                <div class="property__form-wrapper"> 
                    <div class="property__form-field">
                        <h6>Contact:</h6>
                        <?php echo $row['contact_no']; ?>
                    </div>
                </div>
            </div>  
            <div class="col-sm-6">
                <div class="property__form-wrapper">
                    <div class="property__form-field">
                        <h6>Message:</h6>
                        <?php echo $row['message']; ?>
                    </div>
                </div>
            </div><!-- .property__form-wrapper -->
            
            Schedule:
            <hr style="background-color:red;">

            <?php
        }
    }
}

function populate_contact_details() {
    require 'connect.php';
    $query_run = mysqli_query($con, "select * from contact_details where prop_owner = '" . $_SESSION['id'] . "' order by contact_id desc");
    $query_row = mysqli_num_rows($query_run);
    if ($query_row == 0) {
        echo "No Contacts Yet";
    } else {
        while ($row = mysqli_fetch_array($query_run)) {
            ?>
            <div class="col-sm-6">
                <div class="property__form-wrapper">
                    <h4>Name </h4>
                    <div class="property__form-field"><?php echo $row['firstname']." ".$row['lastname']; ?>
                    </div>
                </div>
            </div>  
            <div class="col-sm-6">
                <div class="property__form-wrapper"> 
                    <h4>Email </h4>
                    <div class="property__form-field">
                        <?php echo $row['email']; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="property__form-wrapper"> 
                    <h4>Phone </h4>
                    <div class="property__form-field">
                        <?php echo $row['phone']; ?>
                    </div>
                </div>
            </div>   
            <div class="col-sm-6">
                <div class="property__form-wrapper">
                    <h4>Message </h4>
                    <div class="property__form-field">
                        <?php
                        echo $row['comment'];?>
                        <div> 
                    </div>            
                </div>
            </div>
            </div><!-- .property__form-wrapper -->

            Contact
            <hr style="background-color:red;">

            <?php
        }
    }
}

function populate_main_listing($pagenumb = 1, $limit) {
    if (!is_integer((int) $pagenumb)) {
        $pagenumb = 1;
    }
    require 'connect.php';
    $pagenum = ($pagenumb - 1) * $limit;
    $query = "SELECT * FROM `property_details` WHERE `prop_status` ='Approved' ORDER BY `prop_id` DESC LIMIT $pagenum, $limit ";
    $query_run = mysqli_query($con, $query);
    $query_row = mysqli_num_rows($query_run);
    if ($query_row == 0) {
        echo "No Listings Yet";
    } else {
        while ($row = mysqli_fetch_array($query_run)) {
            ?>

            <div class="item-grid__container">
                <div class="listing">
                    <div class="item-grid__image-container">
                        <a href="single_property_2.php?propID=<?php echo $row['prop_id']; ?>">
                            <div class="item-grid__image-overlay"></div><!-- .item-grid__image-overlay -->
                            <img src="<?php
                            if ($row['featured_img'] == "") {
                                echo "assets/images/noimage.jpg";
                            } else if ($row['featured_img'] == ".." . substr($row['featured_img'], 2)) {
                                echo "assets" . substr($row['featured_img'], 2);
                            } else {
                                echo $row['featured_img'];
                            }
                            ?>" alt="<?php echo $row['prop_name'] . ' image'; ?>" class="listing__img">
                            <span class="listing__favorite"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                        </a>
                    </div>  

                    <div class="item-grid__content-container">
                        <div class="listing__content">
                            <h3 class="listing__title"><a href="single_property_2.php?propID=<?php echo $row['prop_id']; ?>"><?php echo $row['prop_name']; ?></a></h3>
                            <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span> <?php echo $row['prop_address']; ?></p>
                            <p class="listing__price">₦<?php echo $row['prop_price']; ?></p>
                            <div class="listing__details">
                                <a href="single_property_2.php?propID=<?php echo $row['prop_id']; ?>" class="listing__btn">Details <span class="listing__btn-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            </div><!-- .listing__details -->
                        </div><!-- .listing-content -->
                    </div>
                </div><!-- .listing -->
            </div><!-- .col -->

            <?php
        }
    }
}

function populate_main_listing_total_num() {
    require 'connect.php';
    $query = "SELECT * FROM `property_details` WHERE `prop_status` ='Approved' ORDER BY `prop_id` DESC";
    if ($query_run = mysqli_query($con, $query)) {
        if ($query_row = mysqli_num_rows($query_run)) {
            return $query_row;
        }
    }
}

function populate_listings_number_for_single_agent($agentID){
    require 'connect.php';
    $query = "SELECT * FROM `property_details` WHERE `agent_id` ='$agentID'";
    if ($query_run = mysqli_query($con, $query)) {
        if ($query_row = mysqli_num_rows($query_run)) {
            return $query_row;
        }
    }
}


function populate_similar_homes_buyer($similar, $similar_price) {
    require 'connect.php';
    $query = "SELECT * FROM `property_details` JOIN `room_types` ON room_types.r_id = property_details.roomtype_id WHERE `prop_status`='Approved' AND `types` LIKE '%$similar%' OR `prop_price` LIKE '%$similar_price%'  LIMIT 3";
    $query_run = mysqli_query($con, $query);
    $query_row = mysqli_num_rows($query_run);
    if ($query_row == 0) {
        echo "No Similar HOmes";
    } else {
        while ($row = mysqli_fetch_array($query_run)) {
            ?>

            <div class="similar-home">
                <a href="single_property_2.php?propID=<?php echo $row['prop_id']; ?>">
                    <div class="similar-home__image">
                        <div class="similar-home__overlay"></div><!-- .similar-home__overlay -->
                        <img src="<?php
                        if ($row['featured_img'] == "") {
                            echo "assets/images/noimage.jpg";
                        } else if ($row['featured_img'] == ".." . substr($row['featured_img'], 2)) {
                            echo "assets" . substr($row['featured_img'], 2);
                        } else {
                            echo $row['featured_img'];
                        }
                        ?>" alt="property_featured_image">
                        <span class="similar-home__favorite"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                    </div><!-- .similar-home__image -->
                    <div class="similar-home__content">
                        <h3 class="similar-home__title"><?php echo $row['prop_name']; ?></h3>
                        <span class="similar-home__price">₦<?php echo $row['prop_price']; ?></span>
                    </div><!-- .similar-home__content -->
                </a>
            </div><!-- .similar-home -->

            <?php
        }
    }
}

function number_of_happy_client_feedback() {
    require 'connect.php';
    $query = "SELECT * FROM `users_feedback` WHERE `reaction`='Happy' AND `posted` = '1'";
    $query_run = mysqli_query($con, $query);
    $query_row = mysqli_num_rows($query_run);
    echo $query_row;
}

function populate_single_agent($agent_id) {
    require 'connect.php';
    $query = "SELECT * FROM `agents` WHERE `id`='$agent_id'";
    $query_run = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($query_run)) {
        ?>
        <div class="single__avatar agents-single__avatar">
            <img src="<?php
            if ($row['profile_pic'] == "profile_pic_goes_here") {
                echo "assets/images/noimage.jpg";
            } else if ($row['profile_pic'] == ".." . substr($row['profile_pic'], 2)) {
                echo "assets/" . substr($row['profile_pic'], 3);
            } else {
                echo $row['profile_pic'];
            }
            ?>" alt="<?php echo $row['fname']; ?>">
        </div><!-- .agents-single__avatar -->    
        <div class="single__detail agents-single__detail">
            <h3 class="agents-single__name"><?php echo $row['fname']." ".$row['lname']; ?></h3>
            <span class="famous-agents__position"><?php echo $row['businessName']; ?>®</span>
            <ul class="famous-agents__contact agents-single__contact">
                <li class="famous-agents__phone"><i class="fa fa-phone fa-fw" aria-hidden="true"></i><a href="tel:<?php echo $row['phone']; ?>"><?php echo $row['phone']; ?></a></li>
                <li class="famous-agents__email"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></li>
            </ul>
            <ul class="agency__social agents-single__social">
                <li><a href="<?php echo $row['facebook']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo $row['twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
            <p class="agents-single__desc">
                <?php echo $row['about']; ?>
            </p>
        </div><!-- .agents-single__detail -->
        <?php
    }
}

function log_it($what, $who) {
    require'connect.php';

    $query_log = "INSERT INTO `user_logs` (`what`, `who`, `date`) VALUES ('" . mysqli_real_escape_string($con, $what) . "', '" . mysqli_real_escape_string($con, $who) . "', NOW())";
    if ($query_run = mysqli_query($con, $query_log)) {
        return true;
    } else {
        return false;
    }
}

function system_log_it($what, $who, $user_log_date) {
    require'connect.php';

    $query_log = "INSERT INTO `system_logs` (`what`, `who`, `user_log_date`, `date`) VALUES ('" . mysqli_real_escape_string($con, $what) . "', '" . mysqli_real_escape_string($con, $who) . "', '$user_log_date', NOW())";
    if ($query_run = mysqli_query($con, $query_log)) {
        return true;
    } else {
        return false;
    }
}

function system_log_it2($what, $who) {
    require'connect.php';

    $query_log = "INSERT INTO `system_logs` (`what`, `who`, `user_log_date`, `date`) VALUES ('" . mysqli_real_escape_string($con, $what) . "', '" . mysqli_real_escape_string($con, $who) . "', NOW(), NOW())";
    if ($query_run = mysqli_query($con, $query_log)) {
        return true;
    } else {
        return false;
    }
}

function getdatejoined() {
    require 'connect.php';
    $query = "SELECT `date` FROM `users` WHERE `id` = '" . $_SESSION['id'] . "'";
    if ($query_run = mysqli_query($con, $query)) {
        if ($result = mysqli_fetch_assoc($query_run)) {
            return $result['date'];
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function check_user(){
    require 'connect.php';
     $query = "SELECT `clearance` FROM `agents` WHERE `id` = '" . $_SESSION['id'] . "'";
    if ($query_run = mysqli_query($con, $query)) {
        if ($result = mysqli_fetch_assoc($query_run)) {
            return $result['clearance'];
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/* function profit_stats_year2(){ 
  require 'connect.php';
  $query = "SELECT `profit` FROM `sales` WHERE date('sales_date') = '2019' " ;
  if ($query_run = mysqli_query($con,$query)) {
  if($result = mysqli_fetch_assoc($query_run)) {
  return $result['profit'];

  }else{
  echo "nothing";
  }
  }else{
  echo "nothing happened";
  }
  } */

function sendsms($recipients, $message) {
    // Be sure to include the file you've just downloaded
    require_once 'AfricasTalkingGateway.php';
// Specify your authentication credentials
    $username = "smartbinsms";
    $apikey = "c6d69b4b04ae5d1a6925065b9ce703b33264fd027b31354c6c0cbe0dab2b832d";

    $gateway = new AfricasTalkingGateway($username, $apikey);
    try {
        // Thats it, hit send and we'll take care of the rest. 
        $results = $gateway->sendMessage($recipients, $message);

        foreach ($results as $result) {
            // status is either "Success" or "error message"
            echo " Number: " . $result->number;
            echo " Status: " . $result->status;
            echo " MessageId: " . $result->messageId;
            echo " Cost: " . $result->cost . "\n";
        }
    } catch (AfricasTalkingGatewayException $e) {
        echo "Encountered an error while sending: " . $e->getMessage();
    }
// DONE!!! 
}

function forwardSMS($phoneNumber) {

    $recipient = $phoneNumber;
    $message = "THIS BIN IS FULL AND READY FOR PICK UP: CLICK THE LINK TO VIEW LOCATION; https://www.google.com/maps/place/" . getLat() . "+" . getLong() . "/@" . getLat() . "," . getLong() . "," . "14z";
    sendsms($recipient, $message);
}

function forwardEmailMsg($mailTo) {


    $to = $mailTo;

// brief info abt what the message body is all about like main heading
    $subject = "WASTE BIN PICKUP LOCATION ALERT!!";


// the main content of the message you want to send, can jst be a plain message i.e a message that wouldnt involve styling n designs or an html message that contains styling

    $message = "THIS BIN IS FULL AND READY FOR PICK UP: CLICK THE LINK TO VIEW LOCATION; https://www.google.com/maps/place/" . getLat() . "+" . getLong() . "/@" . getLat() . "," . getLong() . "," . "14z";

    $headers = 'From: smartbin@youngtemmy.byethost7.com' . "\r\n" .
            'Reply-To: smartbin@youngtemmy.byethost7.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();


    mail($to, $subject, $message, $headers);
}
?>


