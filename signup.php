<?php


require_once 'dbconnect.php';
require_once 'header.php';



if (isset($_POST['sub'])) {
          $error=0;
          if ($_POST['password']!=$_POST['cpass']) {
            $mispass="Password and Confirm-Password mismatch.<br>";
            $error=1;

  }

          if (strlen($_POST['password'])<6) {
            $passLength="Password must be nore than 6 character";
            $error=1;
          }
          $sqlCheck ="SELECT * FROM student WHERE email='$_POST[email]'";
          $recheck=mysqli_query($connect,$sqlCheck);
          $count=mysqli_num_rows($recheck);
          if ($count>0) {
            $exist="Already Have an account for this email.Please Login another or <a href='signin.php'><button type='button' class='btn btn-outline-danger'>Login</button></a>";
            echo $exist;                                                                               
    }
if ($error==0) {


    
                  $name = $_POST['name'];
                  $fatherName = $_POST['fatherName'];
                   $motherName = $_POST['motherName'];
                   $mobile= $_POST['mobile'];
                   $email = $_POST['email'];
                   $password= $_POST['password'];
                   $address = $_POST['address'];
                   $statues = 'Active';

                  $result = mysqli_query($connect,"INSERT INTO student(name, fatherName, motherName, mobile, email, password, address,statues) VALUES ('$name','$fatherName','$motherName','$mobile','$email','$password','$address','$statues')");
                    
             $lastId=mysqli_insert_id($connect);
             $picName="uploadPic/".$lastId.$_FILES['profilePic']['name'];
             move_uploaded_file($_FILES['profilePic']['tmp_name'],$picName);
            $sqlUpdate = "UPDATE student SET profilePic='$picName' WHERE id='$lastId'";
            mysqli_query($connect,$sqlUpdate);

              
                   $sqlSelect="SELECT *from student WHERE id='$lastId'";
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
                   echo "not success:Try again";
                 }

        }
   }

 ?>

  <div class="card">
<h1><marquee width="100%" behavior="alternate" bgcolor="pink">  Signup Here</marquee></h1>
<div class="card-body">
  <form class="" action="" method="post" enctype="multipart/form-data">
  <div class="form-group row ">
    <label for="name" class="col-sm-3 col-form-label col-form-label-md">Name  </label>
    <div class="col-sm-9">
      <input type="text" name="name" class="form-control" id="colFormLabelSm" placeholder="Enter Your Name" required value="<?php if (isset($_POST['name'])) {  echo $_POST['name'];  } ?>">

    </div>
  </div>
  <div class="form-group row">
    <label for="fatherName" class=" col-sm-3 col-form-label-md">Father's Name </label>
    <div class="col-sm-9">
      <input type="text" name="fatherName" class="form-control" id="colFormLabel" placeholder="Enter Your father's name" value="<?php if (isset($_POST['fatherName'])) {  echo $_POST['fatherName'];  } ?>">

    </div>
  </div>
  <div class="form-group row">
    <label for="motherName" class=" col-sm-3 col-form-label col-form-label-md">Mother's Name </label>
    <div class="col-sm-9">
      <input type="text" name="motherName" class="form-control" id="colFormLabelLg" placeholder="Enter your Mother's Name" value="<?php if (isset($_POST['motherName'])) {  echo $_POST['motherName'];  } ?>">

    </div>

  </div>
  <div class="form-group row">
    <label for="mobile" class=" col-sm-3 col-form-label col-form-label-md">Mobile No </label>
    <div class="col-sm-9">
      <input type="number" name="mobile" class="form-control" id="colFormLabelLg" placeholder="Enter your Mobile number" value="<?php if (isset($_POST['mobile'])) {  echo $_POST['mobile'];  } ?>">

    </div>
  </div>

  <div class="form-group row">
    <label for="email" class=" col-sm-3 col-form-label col-form-label-md">Email </label>
    <div class="col-sm-9">
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter your Email" required value="<?php if (isset($_POST['email'])) {  echo $_POST['email'];  } ?>">

    </div>
  </div>
  <div class="form-group row">
    <label for="password" class=" col-sm-3 col-form-label col-form-label-md" >Password </label>
    <div class="col-sm-9">
      <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password"required value="<?php if (isset($_POST['password'])) {  echo $_POST['password'];  } ?>"><b style="color:red"><?php if (isset($mispass)) {  echo $mispass;  }?><?php if (isset($passLength)) {
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

  <div class="form-group row">
    <label for="address" name="address" class=" col-sm-3 col-form-label col-form-label-md">Address </label>
    <div class="col-sm-9">
      <textarea id="textarea" name="address" rows="4" cols="73" class="form-control"><?php if (isset($_POST['address'])) {  echo $_POST['address'];  } ?> </textarea>

    </div>
  </div>
  <div class="form-group row">
    <label for="profilePic" class=" col-sm-3 col-form-label col-form-label-md">Profile Pic</label>
    <div class="col-sm-9">
      <input type="file" name="profilePic" class="form-control" id="profilePic" placeholder="Enter your Photo">
    </div>
  </div>


  <div class=" btn btn-info btn-block">
              No Account,Signup;<input type="submit" class="btn btn-outline-danger" name="sub" value="Signup">
                </div>

  <div class=" btn btn-info btn-block">
                    Have an account?; <a href="signin.php"><button type="button" class="btn btn-outline-danger">Signin</button></a>
                </div>
</form>
</div>
</div>


 <?php
// require_once 'footer.php';
   ?>
