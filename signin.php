<?php

require_once 'header.php';
require_once 'dbconnect.php';

if (isset($_SESSION['userId'])) {
  header('location: profile.php');
}

if (isset($_POST['login'])) {
  $sqlSelect="SELECT * FROM `student` WHERE email='$_POST[email]' AND password='$_POST[password]' AND statues='Active'";
  $records=mysqli_query($connect,$sqlSelect);
  $count=mysqli_num_rows($records);
  if ($count==1) {
    $field=mysqli_fetch_array($records);
    $_SESSION['userId']=$field['id'];
    $_SESSION['name']=$field['name'];
    $_SESSION['fatherName']=$field['fatherName'];
    $_SESSION['motherName']=$field['motherName'];
    $_SESSION['mobile']=$field['mobile'];
    $_SESSION['email']=$field['email'];
    $_SESSION['password']=$field['password'];
    $_SESSION['address']=$field['address'];
    $_SESSION['profilePic']=$field['profilePic'];


    echo "<script language=Javascript>document.location.href='profile.php'</script> ";
}else {
  echo "<h3 style='color: red'>Login faild</h3>";
}
}
 ?>

<h1 style="text-align:center"><marquee width="100%" behavior="alternate" bgcolor="pink"> Signin Here</marquee></h1>

<div class="card" style="height: 300px">

<div class="card-body">
<form class="" action="" method="post" enctype="multipart/form-data">

<div class="form-group row">
  <label for="email" class=" col-sm-3 col-form-label col-form-label-md">Email </label>
  <div class="col-sm-9">
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your Email" >
  </div>
</div>
<div class="form-group row">
  <label for="password" class=" col-sm-3 col-form-label col-form-label-md">Password </label>
  <div class="col-sm-9">
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" >
  </div>
</div>

<div class=" btn btn-info btn-block">
                  Plaese Signin, <input type="submit" class="btn btn-outline-danger " name="login" value="Signin">
                  </div>

<div class=" btn btn-info btn-block">
                  No account?,  <a href="signup.php"><button type="button" class="btn btn-outline-danger">Signup</button></a>
    </div>
</form>
</div>
</div>
 <?php
// require_once 'footer.php';
   ?>
