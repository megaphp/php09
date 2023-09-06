<?php

 require_once 'header.php';
 require_once 'dbconnect.php';


 if (isset($_POST['change'])) {
   $oldPass=$_POST['currentPassword'];
   $sql="SELECT * FROM student WHERE email='$_SESSION[email]' AND password='$_POST[currentPassword]'";
   $rs=mysqli_query($connect,$sql);
   $count=mysqli_num_rows($rs);
   if ($count) {
             $error=0;
             if ($_POST['password']!=$_POST['cpass']) {
               $mispass="Password and Confirm-Password mismatch.<br>";
               $error=1;

        }

             if (strlen($_POST['password'])<6) {
               $passLength="Password must be nore than 6 character";
               $error=1;
             }


             if ($error>0) {
              echo "<h3 style='color: red'Please Flow the instruction</h3>";
            }else {
              $password=$_POST['password'];
              $updatePassword="UPDATE student SET `password`='$password' WHERE id='$_SESSION[userId]'";
              mysqli_query($connect,$updatePassword);
              echo "<h3 style='color: green'>Successfully update your Password</h3>";
            }
   }else {
     echo "<h3 style='color:red'>Your given password is invalid.Please re-type your current password</h3>";
   }
 }
 ?>
 <h1 style="text-align:center"><marquee width="100%" behavior="alternate" bgcolor="pink"> Change Password</marquee></h1>

 <div class="card" style="height: 300px">

 <div class="card-body">
 <form class="" action="" method="post" enctype="multipart/form-data">


   <div class="form-group row">
     <label for="currentPassword" class=" col-sm-3 col-form-label col-form-label-md" >Currrent Password </label>
     <div class="col-sm-9">
       <input type="password" name="currentPassword" class="form-control" id="password" placeholder="Enter your password"required value="">
     </div>
   </div>

   <div class="form-group row">
     <label for="password" class=" col-sm-3 col-form-label col-form-label-md" >New Password </label>
     <div class="col-sm-9">
       <input type="password" name="password" class="form-control" id="password" placeholder="Enter New password"required value="<?php if (isset($_POST['password'])) {  echo $_POST['password'];  } ?>"><b style="color:red"><?php if (isset($mispass)) {  echo $mispass;  }?><?php if (isset($passLength)) {
         echo $passLength;
       }?></b>
     </div>
   </div>

   <div class="form-group row">
     <label for="password" class=" col-sm-3 col-form-label col-form-label-md">Confirm Password </label>
     <div class="col-sm-9">
       <input type="password" name="cpass" class="form-control" id="password" placeholder="Enter Confirm Password" requireds value="<?php if (isset($_POST['cpass'])) {  echo $_POST['cpass'];  } ?>">
     </div>
   </div>

 <div class=" btn btn-info btn-block">
       <input type="submit" class="btn btn-outline-danger " name="change" value="Change">
   </div>
 </form>
 </div>
 </div>


 <?php
// require_once 'footer.php';
  ?>
