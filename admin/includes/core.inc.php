<?php
ob_start();
session_start();
//shows the path like/my/series/index.html of the page that have required the core.php on its page
$currentfile = $_SERVER['SCRIPT_NAME'];

// Shows the page a user was on before they loggedout back but this time they wont be logged in
@$referer = $_SERVER['HTTP_REFERER'];



// checks if a user have loggd in
function loggedin(){
	require 'connect.php';
	if(isset($_SESSION['id'])&& !empty($_SESSION['id'])){
	// anything about logged in users homepage or original homepage for logged in users
		return true;
	}else{
		return false;
	}

}


function user_login($email,$pass){
	require 'connect.php';
	$pass=sha1($pass);
	$query = "SELECT `id` FROM `agents` WHERE `email`='".mysqli_real_escape_string($con,$email)."' AND `password`='".mysqli_real_escape_string($con,($pass))."' LIMIT 1 ";
	if ($query_run = mysqli_query($con,$query)) {
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
		
		
	}
	else{
		return false;
	}
	
}


function get_profile_name(){
	require 'connect.php';
	$query = "SELECT `name` FROM `agents` WHERE id = '".$_SESSION['id']."' LIMIT 1";
	if ($query_run = mysqli_query($con,$query)) {
		if($result = mysqli_fetch_assoc($query_run)){
			return $result['name'];
		}
	} 
	
}


function get_agent_id(){
	require 'connect.php';
	$query = "SELECT `id` FROM `agents` WHERE id = '".$_SESSION['id']."' LIMIT 1";
	if ($query_run = mysqli_query($con,$query)) {
		if($result = mysqli_fetch_assoc($query_run)){
			return $result['id'];
		}
	} 
	
}

function get_user_type(){
	require 'connect.php';
	$query = "SELECT `type` FROM `agents` WHERE id = '".$_SESSION['id']."' LIMIT 1";
	if ($query_run = mysqli_query($con,$query)) {
		if($result = mysqli_fetch_assoc($query_run)){
			return $result['type'];
		}
	} 
	
}



function get_email(){
	require 'connect.php';
	$query = "SELECT `email` FROM `agents` WHERE id = '".$_SESSION['id']."' LIMIT 1";
	if ($query_run = mysqli_query($con,$query)) {
		if($result = mysqli_fetch_assoc($query_run)){
			return $result['email'];
		}
	} 
	
}



function user_notexist($email){
	require 'connect.php';
	$query = "SELECT `email` FROM `agents` WHERE `email`= '".mysqli_real_escape_string($con,$email)."'";
	if($query_run = mysqli_query($con,$query)){
		$query_row = mysqli_num_rows($query_run);
		if ($query_row == 0) {
			return true;
		} 
		else {
			return false;
		}
	}
	else{
		return false;
	}

}


function get_user_profile_pic(){
	require 'connect.php';
	$query = "SELECT `profile_pic` FROM `agents` WHERE id = '".$_SESSION['id']."' LIMIT 1";
	if ($query_run = mysqli_query($con,$query)) {
		if($result = mysqli_fetch_assoc($query_run)){
			return $result['profile_pic'];
		}
	} 
	
}


function register($name,$email,$pass){
	require 'connect.php';
	$pass=sha1($pass);
	$query = "INSERT INTO `agents` (`name`, `email`, `businessName`, `phone`, `about`, `twitter`, `facebook`, `password`, `clearance`, `type`,  `profile_pic`, `date`) VALUES ('".mysqli_real_escape_string($con,$name)."', '".mysqli_real_escape_string($con,$email)."', 'Title', '070xxxxxxxx', 'Hello there, write about yourself', 'https://www.twitter.com/@example', 'https://www.facebook.com/example', '".mysqli_real_escape_string($con,($pass))."', '1', '0', 'user', 'profile_pic_goes_here', CURDATE())";
	if($query_run = mysqli_query($con,$query)){
		return true;
	}else{
		return false;
	}

}

//this function gives the detail of the property owner
function ownerDetail(){ 
	require 'connect.php';
	if (isset($_GET['owner'])) {
		$owner = $_GET['owner'];

	$query = "select * from property_details left join agents on agents.id=property_details.agent_id join room_types on room_types.r_id = property_details.roomtype_id where id=$owner";
	$query_run = mysqli_query($con,$query);
	$num_rows = mysqli_num_rows($query_run);
	$query_row=mysqli_fetch_array($query_run); ?>

	<div class="row">
        <div class="col-md-3 col-sm-3">
        	<img src="<?php if($query_row['profile_pic'] == "profile_pic_goes_here"){echo "../assets/images/noimage.jpg";}else if($query_row['profile_pic'] == "..".substr($query_row['profile_pic'], 2) ){ echo "../assets/".substr($query_row['profile_pic'], 3); }else{echo $query_row['profile_pic'];} ?>" width="150px" height="150px" />
          <ul class="list-inline" style="margin: 20px 20px 20px 0px; font-size: 30px">
            <a href="<?php echo $query_row['facebook'];?>"> <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="<?php echo $query_row['twitter'];?>"><i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
          </ul><!-- .famous_agents__social -->
        </div><!-- .famous-agents__header -->
        <div class="col-md-5 col-sm-5" style="line-height: 25px">
          <h4 class="famous-agents__name"><?php echo $query_row['fname']." ".$query_row['lname'];?></h4>
          <span class="famous-agents__position"><?php echo $query_row['businessName'];?>&reg;</span>
          <ul class="famous-agents__contact">
            <li class="famous-agents__phone"> <i class="fa fa-phone fa-fw" aria-hidden="true"></i><?php echo $query_row['phone'];?></li>
            <li class="famous-agents__email"> <i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i><?php echo $query_row['email'];?></li>
            <li class="famous-agent"> <i class="fa fa-check fa-fw" aria-hidden="true"></i>Registered on:<?php echo $query_row['date'];?></li>
           
          </ul><!-- .famous-agents__contact -->
		</div>
    <!-- .famous-agents__content -->
        <div class="col-md-4 col-sm-4">
        	<h3  class="content-panel" >About</h3>
        	<span class="famous-agents__position"><?php echo $query_row['about'];?></span>
        </div>
      </div>
    <div class="row" style="margin-top: 40px">
    	<div class="col-sm-12 col-md-12"> 
    		<h3 class="content-panel" style="background: #ccc">Property Details</h3>
    		<ul class="famous-agents__content">
    		 <li class="famous-agent">
    		 <h5 style="color: #660066;font-weight: bold; text-align: right">Number of Property Listings: <?php echo $num_rows; ?></h5></li>	
    		</ul>
    	</div>
    </div>

    <div class="row" style="margin-top: 50px">
    	<div class="col-md-4 col-sm-4">
    		<h5 class="content-panel">Property Title:</h5> <a href="#"><?php echo $query_row['prop_name']; ?></a>	
    	</div>
    	<div class="col-md-5 col-sm-5">
    		<h5 class="content-panel">Property Address: </h5> <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span><?php echo $query_row['prop_address']; ?></p>
    	</div>
    	<div class="col-md-3 col-sm-3">
    		<h5 class="content-panel">Property Price:</h5><p class="listing__price">#<?php echo $query_row['prop_price']; ?></p>
    	</div>
            
         </div> 

     <div class="row">
    	<div class="col-md-4 col-sm-4">
    		<h5 class="content-panel">Property Type:</h5> <?php echo $query_row['types']; ?>	
    	</div>
    	<div class="col-md-5 col-sm-5">
    		<h5 class="content-panel">Rules: </h5> <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span><?php echo $query_row['rules']; ?></p>
    	</div>
    	<div class="col-md-3 col-sm-3">
    		<h5 class="content-panel">Status:</h5><p class="listing"><?php echo $query_row['prop_status']; ?></p>
    	</div>
      </div>    
   			
<?php 
	 
	}
}

//view Registered Sellers function
function populate_famous_agents(){ 
	require 'connect.php';
	$query = "SELECT * FROM `agents`";
	$query_run = mysqli_query($con,$query);
	while($query_row=mysqli_fetch_array($query_run)){ ?>

		<tr>
			<td>
			<img src="<?php if($query_row['profile_pic'] == "profile_pic_goes_here"){echo "../assets/images/noimage.jpg";}else if($query_row['profile_pic'] == "..".substr($query_row['profile_pic'], 2) ){ echo "../assets/".substr($query_row['profile_pic'], 3); }else{echo $query_row['profile_pic'];} ?>" width="100px" height="100px" />
		          <ul class="list" style="font-size: 20px; margin-top: 20px; word-spacing: 15px;">
		            <a href="<?php echo $query_row['facebook'];?>"> <i class="fa fa-facebook" aria-hidden="true"></i>
		            </a>
		        <a href="<?php echo $query_row['twitter'];?>"><i class="fa fa-twitter" aria-hidden="true"></i>
		            </a>
		          </ul><!-- .famous_agents__social -->
				          <!-- .famous-agents__header -->
    		</td>
        <td>
          <h4 class="famous-agents__name" style="font-weight: bolder;"><?php echo $query_row['fname']." ".$query_row['lname'];?></h4>
          <span class="famous-agents__position"><?php echo $query_row['businessName'];?></span><br/>
           <span class="famous-agents__position"><?php echo $query_row['package'];?> Package</span><br/>
           <span class="famous-agents__position"><?php echo "Registered on: ".$query_row['date'];?></span>
          <ul class="famous-agents__contact">
            <li class="famous-agents__phone"> <i class="fa fa-phone fa-fw" aria-hidden="true"></i><?php echo $query_row['phone'];?></li>
            <li class="famous-agents__email"> <i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i><?php echo $query_row['email'];?></li>
          </ul><!-- .famous-agents__contact -->
      	</td>
        <!-- .famous-agents__content -->
        <td>
        	<span class="famous-agents__position"><?php echo $query_row['about'];?></span>
        
    	</td>
  	</tr>
<?php }
}
//view all uploads
function populate_my_property(){ 
	require 'connect.php';
	$query = "SELECT * from `property_details` left join `agents` on agents.id=property_details.agent_id join `room_types` on room_types.r_id = property_details.roomtype_id where `prop_status`= 'Approved' order by `prop_id` desc";
	$query_run = mysqli_query($con,$query);
	$i = 1;
	while($row=mysqli_fetch_array($query_run)){
		$prpid = $row['prop_id'];
	 ?>

		<div class="manage-list__item">
	        <tr class="manage-list__item-container">
	        <td><?php echo $i++; ?></td>
	        <td class="manage-list__item-img">
	         <img src="<?php
	        if ($row['featured_img'] == "") {
	            echo "../assets/images/noimage.jpg";
	        } else if ($row['featured_img'] == ".." . substr($row['featured_img'], 2)) {
	            echo "../assets" . substr($row['featured_img'], 2);
	        } else {
	            echo $row['featured_img'];
	        }
	        ?>"  alt="<?php echo $row['prop_name']; ?>" class="listing__img" width="150" height="150">
	               
            </td><!-- manage-list__item-img -->
    
            <td class="manage-list__item-detail">
                <h4 class="blog"><a href="#"><?php echo $row['prop_name']; ?></a></h4>
                <p class="listing__location"><i class="fa fa-building"></i> <?php echo $row['prop_address']; ?></p>
                <p class="listing__price"><i class="fa fa-money"></i> #<?php echo $row['prop_price']; ?></p>
                 <p class="listing__price"><i class="fa fa-road"></i> <?php echo $row['proximity']; ?></p>
                 <p class="listing__price"><i class="fa fa-list"></i> <?php echo $row['rules']; ?></p>
                 <p class="listing__price"><i class="fa fa-list"></i> <?php echo $row['types']; ?></p>
                 <p class="property__details-item"><span class="property__details-item--cat">Available Services/Amenities:</span></p>
                                            <?php 
                                           
                                             $query = mysqli_query($con,"SELECT * FROM amenities JOIN prop_amenities ON prop_amenities.amenities_id = amenities.id WHERE prop_id = $prpid");
                                             while ($fetch = mysqli_fetch_array($query)) {
                                                  echo "<i class='fa fa-check'></i>"." ".$fetch['amenities_name']." ";
                                            
                                             }
                                            
                                            ?>

            </td>
                            <!-- .manage-list__item-container -->

            <td class="manage-list__expire-date"><?php echo date("F d, Y", strtotime($row['date'])); ?></td>

            <td class="manage-list__action">
               <p><?php echo $row['fname']." ".$row['lname']; ?></p>
               <p><?php echo $row['phone']; ?></p>
               <a href="ownerDetail.php?owner=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Checkout Owner</a>
               <a href="includes/disApprove.php?disapprove=<?php echo $row['prop_id']; ?>" class="btn btn-danger btn-sm">DisApprove</a>
            	</td>
            </tr>
        </div><!-- .manage-list__item" -->
	
<?php }
}
//UnApproved Listings
function unApprove_listings(){
	require 'connect.php';
	$query = "SELECT * from `property_details` left join `agents` on agents.id=property_details.agent_id join `room_types` on room_types.r_id = property_details.roomtype_id where `prop_status`= 'unApproved' order by `prop_id` desc";
	$query_run = mysqli_query($con,$query);
	$i = 1;
	while($row=mysqli_fetch_array($query_run)){
		$prpid = $row['prop_id'];
	 ?>

	<div class="manage-list__item">
        <tr class="manage-list__item-container">
        <td><?php echo $i++; ?></td>
        <td class="manage-list__item-img">
        <div class="item-grid__image-overlay"></div><!-- .item-grid__image-overlay -->
        <img src="<?php
        if ($row['featured_img'] == "") {
            echo "../assets/images/noimage.jpg";
        } else if ($row['featured_img'] == ".." . substr($row['featured_img'], 2)) {
            echo "../assets" . substr($row['featured_img'], 2);
        } else {
            echo $row['featured_img'];
        }
        ?>"  alt="<?php echo $row['prop_name']; ?>" class="listing__img" width="150" height="150">
            </td><!-- manage-list__item-img -->
    
            <td class="manage-list__item-detail">
                 <h4 class="blog"><a href="#"><?php echo $row['prop_name']; ?></a></h4>
                <p class="listing__location"><i class="fa fa-building"></i> <?php echo $row['prop_address']; ?></p>
                <p class="listing__price"><i class="fa fa-money"></i> #<?php echo $row['prop_price']; ?></p>
                <p class="listing__price"><i class="fa fa-road"></i> <?php echo $row['proximity']; ?></p>
                <p class="listing__price"><i class="fa fa-list"></i> <?php echo $row['rules']; ?></p>
                <p class="listing__price"><i class="fa fa-list"></i> <?php echo $row['types']; ?></p>
                <p class="property__details-item"><span class="property__details-item--cat">Available Services/Amenities:</span></p>
                                            <?php 
                                           
                                             $query = mysqli_query($con,"SELECT * FROM amenities JOIN prop_amenities ON prop_amenities.amenities_id = amenities.id WHERE prop_id = $prpid");
                                             while ($fetch = mysqli_fetch_array($query)) {
                                                  echo "<i class='fa fa-check'></i>"." ".$fetch['amenities_name']." ";
                                            
                                             }
                                            
                                            ?>

            </td>
        <!-- .manage-list__item-container -->

        <td class="manage-list__expire-date"><?php echo date("F d, Y", strtotime($row['date'])); ?></td>

        <td class="manage-list__action">
           <a href="includes/approve_property.php?status=<?php echo $row['prop_id']; ?>" class="btn btn-success btn-sm">Approve</a>
        	</td>
        </tr>
    </div><!-- .manage-list__item" -->
	<?php
	}
}

function usersFeedback(){
	require 'connect.php';
	$query = "SELECT * FROM `users_feedback`";
	$query_run = mysqli_query($con,$query);
	$i = 1;
	while($row=mysqli_fetch_array($query_run)){ ?>

	<div class="manage-list__item" style="line-height: 20px">
        <tr class="manage-list__item-container">
        <td><?php echo $i++; ?></td>
    
          <td class="manage-list__item-detail">
           <h4 class="blog"><a href="#"><?php echo $row['firstname']." ".$row['lastname']; ?></a></h4>
           <ul class="famous-agents__contact">
            <li class="famous-agents__location"> <i class="fa fa-location fa-fw" aria-hidden="true"></i> <?php echo $row['address'];?></li>
            <li class="famous-agents__email"> <i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i> <?php echo $row['email'];?></li>
            <li class="famous-agent"> <i class="fa fa-check fa-fw" aria-hidden="true"></i> Posted on: <?php echo $row['date'];?></li>
           
          </ul>
         </td>
        <!-- .manage-list__item-container -->

        <td class="manage-list__expire-date"><?php echo $row['reaction']; ?></td>
         <td class="manage-list__expire-date"><?php echo $row['message']; ?></td>

        <td class="manage-list__action">
           <a href="" class="btn btn-primary btn-sm approve" id="<?php echo $row['feedback_id']; ?>">Approve</a>
        	</td>
        </tr>
    </div><!-- .manage-list__item" -->
	<?php
	}
}



?>


