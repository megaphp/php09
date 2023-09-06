<?php
require_once 'header.php';
require_once 'dbconnect.php';
if (isset($_SESSION['adminUser'])) {
  // code...

 ?>

<?php
if (isset($_GET['editId'])) {
 $editId=$_GET['editId'];
 $sqlEdit="SELECT * FROm photogallery WHERE id='$editId'";
 $rsEdit=mysqli_query($connect,$sqlEdit);
 $rowEdit=mysqli_fetch_array($rsEdit);
}

if (isset($_POST['update'])) {
$sql="UPDATE photogallery SET title='$_POST[title]'  WHERE id='$_POST[picId]'";
$pic ="SELECT picName FROM photogallery WHERE id='$_POST[picId]'";
$rsPic=mysqli_query($connect,$pic);
$rowPic=mysqli_fetch_array($rsPic);


  mysqli_query($connect,$sql);

  if ($_FILES['pic']['name']) {
      unlink($rowPic['picName']);
     $picName="photoGallery/".$_POST['picId'].$_FILES['pic']['name'];
     move_uploaded_file($_FILES['pic']['tmp_name'],$picName);
     $picUpdate="UPDATE photogallery SET picName='$picName'  WHERE id='$_POST[picId]'";
     mysqli_query($connect,$picUpdate);


 }
echo "<script language='Javascript'>document.location.href='photoGallery.php'<script>";
}
 ?>
 <h1 style="text-align:center"><marquee width="100%" behavior="alternate" bgcolor="pink"> Edit Photo </marquee></h1>

 <div class="card-body">
   <form class="" action="" method="post" enctype="multipart/form-data">

     <div class="form-group row">
       <label for="pic" class=" col-sm-3 col-form-label col-form-label-md">Upload Picture</label>
       <div class="col-sm-9">
         <input type="file" name="pic" class="form-control" id="pic" placeholder="Enter your Photo"><img src="<?php echo $rowEdit['picName']; ?>" width="60px" height="40px">
       </div>
     </div>
   <div class="form-group row ">
     <label for="name" class="col-sm-3 col-form-label col-form-label-md">Title</label>
     <div class="col-sm-9">
       <input type="text" name="title" class="form-control" id="colFormLabelSm" placeholder="Enter Pic Name" value="<?php echo $rowEdit['title']; ?>">
      <input type="hidden" name="picId" value="<?php echo $rowEdit['id'];?>">
     </div>
   </div>


   <div class=" btn btn-info btn-block">
   <input type="submit" class="btn btn-outline-danger" name="update" value="Update">
     </div>


 </form>
 </div>
 <?php
 }
 else {
  echo "<script language='Javascript'>document.location.href='index.php'</script>";
 }
 require_once 'footer.php';


  ?>
