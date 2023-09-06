<?php
require_once 'header.php';
require_once 'dbconnect.php';
if (isset($_SESSION['adminUser'])) {
  // code...

 ?>
 <?php
if (isset($_GET['editId'])) {
$editId=$_GET['editId'];
$sqlEdit="SELECT `statues` FROM `student` WHERE id='$editId'";
$rs=mysqli_query($connect,$sqlEdit);
$row=mysqli_fetch_array($rs);
if ($row['statues']=='Active') {
  $st='Inactive';
}else {
  $st="Active";
}
$sqlUpdate="UPDATE student SET statues='$st' WHERE id='$editId'";
mysqli_query($connect,$sqlUpdate);
}
 ?>

 <?php

if (isset($_GET['deleteId'])) {
  $deleteId=$_GET['deleteId'];
  $sqlDelete="DELETE FROM student WHERE id='$deleteId'";
  mysqli_query($connect,$sqlDelete);
}

  ?>
  <?php


  if (isset($_POST['searchSubmit'])) {
  $sqlSearch = "SELECT * FROM student WHERE name LIKE '%$_POST[search]%' OR fatherName LIKE '%$_POST[search]%' OR motherName LIKE '%$_POST[search]%' OR mobile LIKE '%$_POST[search]%' OR email LIKE '%$_POST[search]%' OR address LIKE '%$_POST[search]%' ";
  $rsSearch=mysqli_query($connect,$sqlSearch);
  $countSearch=mysqli_num_rows($rsSearch);
if ($countSearch) {
?>
<caption><h2 style="center;color: green">Your Searching Result for <u style="color: #ff00ff"><?php echo $_POST['search']; ?></u> is<u style="color: #ff0080"> <?php echo   $countSearch ; ?></u></h2></caption>
<table class="table table-bordered">

<thead class="thead-dark">
  <tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Father'sName</th>
    <th scope="col">Mother'sName</th>
    <th scope="col">Mobile</th>
    <th scope="col">E-mail</th>
    <th scope="col">Address</th>
    <th scope="col">Picture</th>
    <th scope="col">Statues</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<?php
$j=0;
while($rowSearch=mysqli_fetch_array($rsSearch)){
$j++;
?>
<tbody>
  <tr>
    <th scope="row"><?php echo $j; ?></th>
    <td><?php echo $rowSearch['name']; ?></td>
    <td><?php echo $rowSearch['fatherName']; ?></td>
    <td><?php echo $rowSearch['motherName']; ?></td>
    <td><?php echo $rowSearch['mobile']; ?></td>
    <td><?php echo $rowSearch['email']; ?></td>
    <td><?php echo $rowSearch['address']; ?></td>
    <td><img src="../<?php echo $rowSearch['profilePic']; ?>" width="60px" style="border-radius: 10px"></td>
    <td><a href="alluser.php?editId=<?php echo $rowSearch['id']; ?>"><?php echo $rowSearch['statues']; ?></a></td>
    <td><a href="alluser.php?deleteId=<?php echo $rowSearch['id']; ?>" onClick="return confirm('Do you want to delete this user ? ');">Delete</a></td>
  </tr>
</tbody>

<?php

}
echo "</table>";


}else {
  ?>
<h2 style="center;color: green">Your Searching Result for <u style="color: #ff00ff"><?php echo $_POST['search']; ?></u> is not found !!</h2>
  <?php
}
  }

   ?>
  <h1 style="text-align:center"><marquee width="100%" behavior="alternate" bgcolor="pink"> All User Of Your Website </marquee></h1>

<hr>
<?php

$sql="SELECT * FROM `student` ORDER BY id DESC";
$records=mysqli_query($connect,$sql);
$count=mysqli_num_rows($records);
if ($count>0) {
  ?>
  <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Father'sName</th>
      <th scope="col">Mother'sName</th>
      <th scope="col">Mobile</th>
      <th scope="col">E-mail</th>
      <th scope="col">Address</th>
      <th scope="col">Picture</th>
      <th scope="col">Statues</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php
  $i=0;
while($row=mysqli_fetch_array($records)){
$i++;
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['fatherName']; ?></td>
      <td><?php echo $row['motherName']; ?></td>
      <td><?php echo $row['mobile']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <td><img src="../<?php echo $row['profilePic']; ?>" width="60px" style="border-radius: 10px"></td>
      <td><a href="alluser.php?editId=<?php echo $row['id']; ?>"><?php echo $row['statues']; ?></a></td>
      <td><a href="alluser.php?deleteId=<?php echo $row['id']; ?>" onClick="return confirm('Do you want to delete this user ? ');">Delete</a></td>
    </tr>
  </tbody>

  <?php

}
echo "</table>";

}else {
  echo "<h1>No User in your website</h1>";
}

 ?>
 <?php
}
else {
  echo "<script language='Javascript'>document.location.href='index.php'</script>";
}
 require_once 'footer.php';


  ?>
