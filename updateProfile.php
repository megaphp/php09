<?php

require_once 'header.php';
require_once 'dbconnect.php';

if (isset($_POST['update'])) {

                  $name = $_POST['name'];
                  $fatherName = $_POST['fatherName'];
                   $motherName = $_POST['motherName'];
                   $mobile= $_POST['mobile'];
                   $email = $_POST['email'];
                   $address = $_POST['address'];



                  $resultUpdate = mysqli_query($connect,"UPDATE student SET name='$name', fatherName='$fatherName', motherName='$motherName', mobile='$mobile', email='$email',  address='$address' WHERE id='$_SESSION[userId]'");
                    //pic Uploaded in Database
    if (!empty($_FILES['profilePic']['name'])) {
           unlink($_SESSION['profilePic']);
             $picName="uploadPic/".$_SESSION['userId'].$_FILES['profilePic']['name'];
             move_uploaded_file($_FILES['profilePic']['tmp_name'],$picName);
            $sqlUpdate = "UPDATE student SET profilePic='$picName' WHERE id='$_SESSION[userId]'";
            mysqli_query($connect,$sqlUpdate);
  }
              //if reg successfully then show message
                   $sqlSelect="SELECT *from student WHERE id='$_SESSION[userId]'";
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


?>
<div class="card">
<h1><marquee width="100%" behavior="alternate" bgcolor="pink">  Update Your Profile</marquee></h1>
<div class="card-body">
<form class="" action="" method="post" enctype="multipart/form-data">
<div class="form-group row ">
  <label for="name" class="col-sm-3 col-form-label col-form-label-md">Name  </label>
  <div class="col-sm-9">
    <input type="text" name="name" class="form-control" id="colFormLabelSm" placeholder="Enter Your Name" required value="<?php  echo $_SESSION['name'];   ?>">

  </div>
</div>
<div class="form-group row">
  <label for="fatherName" class=" col-sm-3 col-form-label-md">Father's Name </label>
  <div class="col-sm-9">
    <input type="text" name="fatherName" class="form-control" id="colFormLabel" placeholder="Enter Your father's name" value="<?php   echo $_SESSION['fatherName'];   ?>">

  </div>
</div>
<div class="form-group row">
  <label for="motherName" class=" col-sm-3 col-form-label col-form-label-md">Mother's Name </label>
  <div class="col-sm-9">
    <input type="text" name="motherName" class="form-control" id="colFormLabelLg" placeholder="Enter your Mother's Name" value="<?php   echo $_SESSION['motherName'];   ?>">

  </div>

</div>
<div class="form-group row">
  <label for="mobile" class=" col-sm-3 col-form-label col-form-label-md">Mobile No </label>
  <div class="col-sm-9">
    <input type="number" name="mobile" class="form-control" id="colFormLabelLg" placeholder="Enter your Mobile number" value="<?php  echo $_SESSION['mobile'];   ?>">

  </div>
</div>

<div class="form-group row">
  <label for="email" class=" col-sm-3 col-form-label col-form-label-md">Email</label>
  <div class="col-sm-9">
    <input type="email" name="email" class="form-control" id="colFormLabelLg" placeholder="Enter your Mobile number" value="<?php  echo $_SESSION['email'];   ?>">

  </div>
</div>

<div class="form-group row">
  <label for="address" name="address" class=" col-sm-3 col-form-label col-form-label-md">Address </label>
  <div class="col-sm-9">
    <textarea id="textarea" name="address" rows="4" cols="73" class="form-control"><?php  echo $_SESSION['address'];   ?> </textarea>

  </div>
</div>
<div class="form-group row">
  <label for="profilePic" class=" col-sm-3 col-form-label col-form-label-md">Profile Pic</label>
  <div class="col-sm-9">
    <input type="file" name="profilePic" class="form-control" id="profilePic" placeholder="Enter your Photo">
  </div>
  <div class="col-sm-9">
  <img src="<?php   echo $_SESSION['profilePic'];   ?>" width="100px" class="rounded float-right">
  </div>


</div>


<div class=" btn btn-info btn-block">
      <input type="submit" class="btn btn-outline-danger" name="update" value="Update">
  </div>


</form>
</div>
</div>


<?php

// require_once 'footer.php';



?>
