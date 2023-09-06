
<?php
session_start();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="style/design.css">
</head>
<body>
  <div class="wrapper">
		<div class="header">
      <?php if (isset($_SESSION['adminUser'])) {?>
      <span style="float: right;color: white;padding: 10px; text-decoration: none;">
        <?php echo $_SESSION['adminUser']; ?></span>


    <?php
    } ?>
		 <h1 style="color:pink;text-decoration: underline">Dashboard here</h1>
		</div>
		<!-- <ul class="nav justify-content-center bg-primary">


   <?php if (isset($_SESSION['adminUser'])) {?>
     <li class="nav-item">
      <a class="nav-link" href="alluser.php"><button type="button" class="btn btn-outline-dark">All User</button></a>
    </li>
    <li class="nav-item">
     <a class="nav-link" href="photoGallery.php"><button type="button" class="btn btn-outline-dark">Photo Gallery</button></a>
   </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php"><button type="button" class="btn btn-outline-dark">Logout</button></a>
    </li>

<?php
   } ?>
	</ul> -->

  <?php if (isset($_SESSION['adminUser'])) {?>
  <nav class="navbar navbar-expand-lg  bg-primary">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

          <li class="nav-item">
           <a class="nav-link" href="alluser.php"><button type="button" class="btn btn-outline-dark">All User</button></a>
         </li>
         <li class="nav-item">
          <a class="nav-link" href="photoGallery.php"><button type="button" class="btn btn-outline-dark">Photo Gallery</button></a>
        </li>
         <li class="nav-item">
           <a class="nav-link" href="logout.php"><button type="button" class="btn btn-outline-dark">Logout</button></a>
         </li>



      </ul>
      <form class="form-inline my-2 my-lg-0" accept-charse" action="alluser.php" method="post">
        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
        <input class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="searchSubmit" placeholder="Search">
      </form>

    </div>
  </nav>

  <?php
    } ?>

		<div class="main">
			<div class="leftbar"></div>
			<div class="content">
