<?php

require_once 'header.php';
require_once 'dbconnect.php';

 ?>
<?php
if (isset($_POST['login'])) {
  $sql="SELECT * FROM admin WHERE adminUser='$_POST[username]' AND password='$_POST[userpass]'";
  echo $sql;
  $rs=mysqli_query($connect,$sql);
  $count=mysqli_num_rows($rs);
  if ($count==1) {
    $adminField=mysqli_fetch_array($rs);
    $_SESSION['adminId']=$adminField['id'];
    $_SESSION['adminUser']=$adminField['adminUser'];
    $_SESSION['adminPass']=$adminField['password'];
    echo "<script  language='Javascript'>document.location.href='dashboard.php'</script>";
  }
}

 ?>
	<h1><marquee width="100%" behavior="alternate" bgcolor="pink">  Dashboard here</marquee></h1>
  <div class="card" style="height: 300px">

  <div class="card-body">
  <form class="" action="" method="post">

  <div class="form-group row">
    <label  class=" col-sm-3 col-form-label col-form-label-md">User Name </label>
    <div class="col-sm-9">
      <input type="text" name="username" class="form-control"  placeholder="Enter userName" >
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class=" col-sm-3 col-form-label col-form-label-md">Password </label>
    <div class="col-sm-9">
      <input type="password" name="userpass" class="form-control"  placeholder="Enter your password" >
    </div>
  </div>

  <div class=" btn btn-info btn-block">
    <input type="submit" class="btn btn-outline-danger " name="login" value="Login">
      </div>

  </form>
  </div>
  </div>

		<?php

require_once 'footer.php';
		 ?>
