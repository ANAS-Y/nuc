<?php require ('vcheader1.inc');
$accreditationID=$_SESSION['accreditationID'];
function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
    }
    
    include_once("connection.php");
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
  $sql = "SELECT * FROM vcselfstudy_ssf WHERE accreditationID= '$accreditationID'";
             if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
  
$health = $fetch["healthFacilities"]; 
$recruitment = $fetch["recruitmentPolicy"];   
}
else{
 $health = '';
 $recruitment = '';
}

  if($_SERVER["REQUEST_METHOD"]=="POST"){
       $Health=  input_check($_POST["health"]);
       $Recruitment=  input_check($_POST["recruitment"]);
                 
             /* Performing SQL query */
  $sql = "SELECT * FROM vcselfstudy_ssf WHERE accreditationID= '$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
   $sql= "UPDATE vcselfstudy_ssf SET `healthFacilities` ='$Health',`recruitmentPolicy`='$Recruitment' WHERE `accreditationID`='$accreditationID'";
 if(!mysqli_query($db_link,$sql)){die("Faild  to update ownership and control" . mysqli_error($db_link)); }
 
/* Closing connection */
mysqli_close($db_link);
header('location:vcssf10.php');
}
else{
  
$sql = "INSERT INTO `vcselfstudy_ssf`(`accreditationID`, `ownershipControl`, `organisationAdministration`, `phillosophyObjectives`, `utilityServices`,
 `curriculumDesign`, `updatingCurricula`, `bookList`, `aquisitionPolicy`, `libraryservices`, `staffAccomodation`, `sportFacilities`, `healthFacilities`, 
 `recruitmentPolicy`, `staffDevelopment`, `firstName`, `surname`, `otherName`, `rank`, `dateSubmited`, `submissonStatus`) VALUES ('$accreditationID','',
 '','','','','','','','','','$Health','$Recruitment','','','','','','','','')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert vc self study form " . mysqli_error($db_link));}
/* Closing connection */
mysqli_close($db_link);
header('location:vcssf10.php');
}
}
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part XVI-XVII (RECRUITMENT, RETENTION, DISMISSAL,WELFARE AND HEALTH FACILITIES)</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">HEALTH FACILITIES</h5>
</div>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<div class="form-row" >
 <label class="form-row"for="health">Describe the health care delivery system maintained by the University or other 
facilities for the benefit of both staff and students.</label>
    <div class="form-group" >
        <textarea class="form-control" id="health" rows="5" cols="60" name="health" required="required"> <?php echo $health;?></textarea>
  </div>
  </div>
  </div>
<!-- Second column start here-->
<div class="col second-category" >
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">RECRUITMENT, RETENTION, DISMISSAL AND WELFARE</h5>
</div>
<div class="form-row" style="margin-left: 1%;">
 <label class="form-row"for="recruitment">Briefly describe the University s policy on staff recruitment, promotion, retention, 
dismissal, termination and welfare. </label>
    <div class="form-group">
        <textarea class="form-control" id="recruitment" required="required" rows="3" cols="58" placeholder="Also discuss the main highlights of the 
University s staff working conditions " name="recruitment"><?php echo $recruitment;?></textarea>
        <div class="form-group" style="float: right;color: red;" id="lawUpload" >
    <label for="condition">Attach a copy of the current written conditions of service (if any) *.PDF or *.doc </label>
    <input type="file" class="form-control-file" id="condition" name="condition">
  </div>
  </div>
  </div>

</div>
 
 <div class="form-row">

 <div class="col">
<a class="btn btn-primary login-btn" href="vcssf8.php" style=" width: 95%; ">Pevious</a>
 </div>
  <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Next</button>
 </div>
 
 </div>

 </form>
 </div>
 
<!-- first row closing tag-->
</div>
<!-- first div closing tag-->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');?>