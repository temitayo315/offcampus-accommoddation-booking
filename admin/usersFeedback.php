<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>OffKampus | Registered Agents</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <style type="text/css">
      th{
        text-align: center;
        font-weight: bolder;
        font-size: 20px;
      }
    </style>
</head>
<body>
 <section id="container" >
  <?php include("includes/header.php");?>
   <?php include("includes/sidebar.php");?>
   <?php include("includes/core.inc.php");?>
   <section id="main-content">
    <section class="wrapper">
      <h3><i class="fa fa-angle-right"></i> Review/Feedback from website users</h3>
          <!-- BASIC FORM ELELEMNTS -->
    	<div class="row mt">
    		<div class="col-lg-12">
          <table class="table table-bordered table-striped" style="text-align: left; padding: 10px">
            <th>id</th>
            <th>User Details</th>
            <th>Reaction</th>
            <th>Message</th>
            <th>Action</th>
            <tbody style="line-height: 2em">
             <?php echo usersFeedback(); ?>
            </tbody> 
           </table>    
        </div>
      </div>
    </section>
  </section>
  <?php include("includes/footer.php");?>
</section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(document).ready(function(){

          $('.approve').click(function(e){
            e.preventDefault();
            var this_obj = $(this);
            var id = $(this).attr('id');
            
            $.ajax({
              url: "includes/approve_feedback.php",
              method: "GET",
              data:{id},
              success:function(data){
                alert(data);
                this_obj.html("<i class='fa fa-check'></i>");
                this_obj.attr('disabled','disabled')
                //$(this).disable();
              }
            });

          });
      });

  </script>

  </body>
</html>
<?php } ?>
