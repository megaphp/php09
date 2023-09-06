<?php
require_once 'header.php';
require_once 'dbconnect.php';
if (isset($_SESSION['adminUser'])) {


 ?>

<?php

if (isset($_GET['editId'])) {
 $editId=$_GET['editId'];
 $sqlEdit="SELECT * FROM photogallery WHERE id='$editId'";
 $rsEdit=mysqli_query($connect,$sqlEdit);
 $rowEdit=mysqli_fetch_array($rsEdit);        

}


 ?>

 <h1 style="text-align:center"><marquee width="100%" behavior="alternate" bgcolor="pink"> Control Photo Gallery</marquee></h1>

 <div class="card-body">
   <form class="" action="" method="post" enctype="multipart/form-data">

     <div class="form-group row">
       <label for="pic" class=" col-sm-3 col-form-label col-form-label-md">Upload Picture</label>
       <div class="col-sm-9">
         <input type="file" name="picName" class="form-control" id="pic" placeholder="Enter your Photo">
       </div>
     </div>
   <div class="form-group row ">
     <label for="name" class="col-sm-3 col-form-label col-form-label-md">Title</label>
     <div class="col-sm-9">
       <input type="text" name="title" class="form-control" id="colFormLabelSm" placeholder="Enter Pic Name" required value="">

     </div>
   </div>

   <div class="form-group row">
     <label for="description" name="description" class=" col-sm-3 col-form-label col-form-label-md">Description</label>
     <div class="col-sm-9">
       <textarea id="textarea" name="description" rows="4" cols="73" class="form-control"></textarea>

     </div>
   </div>

   <div class=" btn btn-info btn-block">
   <input type="submit" class="btn btn-outline-danger" name="submit" value="Upload">
     </div>


 </form>
 </div>
 <?php
 }
 else {
  echo "<script language='Javascript'>document.location.href='index.php'</script>";
 }
//  require_once 'footer.php';
  ?>
