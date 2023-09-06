
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
      <?php if (isset($_SESSION['name'])) {?>
      <span style="float: right"><img src="<?php echo $_SESSION['profilePic'];?>" width="50px" style="border-radius: 10px"><a style='color: white;padding: 10px; text-decoration: none;' href="profile.php">
        <?php echo $_SESSION['name']; ?></a></span>


    <?php
    } ?>
			<h1>Hello Web</h1>
		</div>
		<ul class="nav justify-content-center bg-primary">
	  <li class="nav-item">
	    <a class="nav-link active" href="index.php"><button type="button" class="btn btn-outline-dark">Home</button></a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="history.php"><button type="button" class="btn btn-outline-dark">History</button></a>
	  </li>


   <?php if (isset($_SESSION['name'])) {?>
     <li class="nav-item">
      <a class="nav-link" href="profile.php"><button type="button" class="btn btn-outline-dark">Profile</button></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php"><button type="button" class="btn btn-outline-dark">Logout</button></a>
    </li>
  <?php
}else {
  ?>
  <li class="nav-item">
    <a class="nav-link" href="signup.php"><button type="button" class="btn btn-outline-dark">Signup</button></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="signin.php"><button type="button" class="btn btn-outline-dark">Signin</button></a>
  </li>
<?php
   } ?>


		<li class="nav-item">
	    <a class="nav-link" href="photogallery.php"><button type="button" class="btn btn-outline-dark">Photo Gallery</button></a>
	  </li>
	</ul>
		<div class="main">
			<div class="leftbar"></div>
			<div class="content">
