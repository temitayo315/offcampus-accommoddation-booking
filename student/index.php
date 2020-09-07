<?php include 'includes/core.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>OffKampus Roommate Matching</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/plugins.css">
  <link rel="stylesheet" href="../css/style.css">

  <style type="text/css">
    .card img{
      padding: 5px;
      border-radius:50px;
      width: 150px;
      height: 150px;
    }
    .card h5{
      padding: 70px 40px;
      line-height: 30px;
    }
  </style>
</head>

<body>

  <!-- Navigation -->

    <header class="header header--blue">
    <div class="container">
      <div class="header__main">
        <div class="header__logo">
          <a href="index.php">
            <h1 class="screen-reader-text">OffKampus Accommodation</h1>
            <h3 style="color: #fff">Student Roommates</h3>
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
              <a href="../index.php" class="header__nav-link">Home</a>
            </li>
            <li class="header__nav-item">
              <a href="login.php" class="header__nav-link">Login</a>
            </li>
          </ul><!-- .header__nav -->
        </div><!-- .header__menu -->

        
     </div><!-- .header__main -->
   </div><!-- .container -->
 </header><!-- .header -->

  <!-- Page Content -->
  <div class="container">
    <div class="jumbotron">
      <div class="row">
       <div class="col-md-3"></div>
      <!-- Blog Entries Column -->
      <div class="col-md-6" style="text-align: center;">
      <div class="row">
        <div class="col-md-12" style="line-height: 1.5em; padding: 15px; font-family:Arial">
          <h3>OffKampus Roommate Matching</h3>
          <p>One of our utmost effort is to make use of information Technology in all facets of life to improve and make life easy for student.</p>
        </div>
      </div>
        <?php
        $select = mysqli_query($con, "SELECT * FROM  `students` WHERE `clearance` = 1");
        while ($row = mysqli_fetch_array($select)) {
          # code...
         ?>
        <!-- Blog Post -->
        <div class="card" style="margin-top: 30px; text-align: center;">
          <div class="row">
            <div class="col-md-6">
          <img class="card-img-top img-circle" src="uploads/<?php echo $row['photo']; ?>" alt="Card image cap" width="50" height="50">
          <h5 style="text-align: center; padding: 20px 25px"><i class="fa fa-check"></i> <?php echo $row['gender']; ?></h5>
            </div>
          <div class="col-md-6">
            <h5 class="card-title"><?php echo $row['firstname'].' '.$row['lastname']; ?></h5>
          </div>
          </div>
          <div class="card-body">
            <p class="card-text"><?php echo $row['descr']; ?></p>
            <a href="stu_details.php?more=<?php echo $row['stu_id']; ?>" class="btn btn-sm btn-danger">More details &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?php echo $row['date']; ?>
          </div>
        </div>
      <?php } ?>

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-3"></div>

    </div>
    <!-- /.row -->
  </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Ayanda Temitayo Project 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
