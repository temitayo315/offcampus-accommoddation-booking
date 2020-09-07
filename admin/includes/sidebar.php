<aside>
  <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
              
  <?php $query=mysqli_query($con,"select firstname,lastname from admin where username='".$_SESSION['login']."'");
  $row=mysqli_fetch_array($query);
  $fn = $row['firstname'];
  $ln = $row['lastname']; 

 ?> 
 
                  <h3 class="centered">Welcome <?php echo $fn." ".$ln; ?></h3>
                  <li class="mt">
                      <a href="dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                   <li class="sub-menu">
                      <a href="registeredAgent.php" >
                          <i class="fa fa-eye"></i>
                          <span>View Registered Agent</span>
                      </a>
                    </li>
                  <li class="sub-menu">
                      <a href="viewUploads.php" >
                          <i class="fa fa-eye"></i>
                          <span>View Uploaded property</span>
                      </a>
                      
                  </li>
                 
                  <li class="sub-menu">
                      <a href="unApprove.php" >
                          <i class="fa fa-book"></i>
                          <span>UnApproved listings</span>
                      </a>
                    </li>
                  <li class="sub-menu">
                      <a href="usersFeedback.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Users Feedback</span>
                      </a>
                      
                  </li>
                 

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Account Setting</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="change-password.php">Change Password</a></li>
                           <li><a  href="createAdmin.php">Create Admin</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>