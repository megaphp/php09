<?php

require_once 'header.php';
if (!isset($_SESSION['userId'])){ 
  header('location: signin.php');
}
?>

<h1>My Profile</h1>

<div class="card" style="float:right; width:200px;height: 200px;border: radius 2px solid black">
  <img src="<?php  echo  $_SESSION['profilePic']; ?>" width="300" height="200px">
</div>
<div class="profile">
  Name : <?php echo $_SESSION['name']; ?><br>
  Father' Name : <?php echo $_SESSION['fatherName']; ?><br>
  Mother's Name : <?php echo $_SESSION['motherName']; ?><br>
  Mobile No : <?php echo $_SESSION['mobile']; ?><br>
  Email : <?php echo $_SESSION['email']; ?><br>
  Address : <?php echo $_SESSION['address']; ?>
 <div class="" style="margin-top: 20px;"><a href="updateProfile.php">Update Profile</a> | <a href="changePassword.php">Update Password</a>

  </div>

</div>





