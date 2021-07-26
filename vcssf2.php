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
  
$ownership = $fetch["ownershipControl"];
$organisation = $fetch["organisationAdministration"];    
}
else{
  $ownership = '';
$organisation = ''; 
}

  if($_SERVER["REQUEST_METHOD"]=="POST"){
       $ownership =  input_check($_POST["ownership"]);
       $organisation = input_check($_POST["organisation"]);
       
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
  $sql = "SELECT * FROM vcselfstudy_ssf WHERE accreditationID= '$accreditationID'";
             if (!mysqli_query($db_link,$sql)){
  die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));    
}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
   $sql= "UPDATE vcselfstudy_ssf SET `ownershipControl` ='$ownership', `organisationAdministration`='$organisation' WHERE `accreditationID`='$accreditationID'";
 if(!mysqli_query($db_link,$sql)){
     die("Faild  to update ownership and control" . mysqli_error($db_link));
      }
 $_SESSION["msg"]= "Updated Sucessfully";
/* Closing connection */
mysqli_close($db_link);
header('location:vcssf3.php');
}
else{
  
$sql = "INSERT INTO `vcselfstudy_ssf`(`accreditationID`, `ownershipControl`, `organisationAdministration`, `phillosophyObjectives`, `utilityServices`,
 `curriculumDesign`, `updatingCurricula`, `bookList`, `aquisitionPolicy`, `libraryservices`, `staffAccomodation`, `sportFacilities`, `healthFacilities`, 
 `recruitmentPolicy`, `staffDevelopment`, `firstName`, `surname`, `otherName`, `rank`, `dateSubmited`, `submissonStatus`) VALUES ('$accreditationID','$ownership',
 '$organisation','','','','','','','','','','','','','',
 '','','','','')";

if (!mysqli_query($db_link,$sql)){
    die("Faild  to insert vc self study form " . mysqli_error($db_link));    
}
$_SESSION["msg"]= "Updated Sucessfully";
/* Closing connection */
mysqli_close($db_link);
header('location:vcssf3.php');
}
}
?>

<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part II-III (ORGANISATION, ADMINISTRATION AND CONTROL)</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">OWNERSHIP AND CONTROL </h5>
</div>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<div class="form-row" >
 <label class="form-row"for="lawText">Describe below the ownership and system of control of the University. The description should also include the membership and role of the governing 
council and senate/Academic board/board of studies.</label>
    <div class="form-group"  id="ownership">
        <textarea class="form-control" id="ownership" rows="5" cols="60" name="ownership" required="required"><?php echo $ownership;?></textarea>
  </div>
  </div>
  
  </div>
  
  



<!-- Second column start here-->
<div class="col second-category" >
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">ORGANISATION AND ADMINISTRATION</h5>
</div>
<div class="form-row" style="margin-left: 1%;">
 <label class="form-row"for="lawText">Describe below the major components of the University; attach the current organizational structure  in 
relation to  the  programme to be accredited</label>
    <div class="form-group"  id="ownership">
        <textarea class="form-control" id="ownership" required="required" rows="2" cols="52" name="organisation"><?php echo $organisation;?></textarea>
  </div>
  <div class="form-group" style="float: right;" id="lawUpload" >
    <label for="organisationChat">Upload image diagram of Organisation Structure  </label>
    <input type="file" class="form-control-file" id="organisationChat" name="organisationChat">
  </div>
  </div>

</div>
 
 <div class="form-row">

 <div class="col">
<a class="btn btn-primary login-btn" href="vcssf.php" style="margin-left: 3%; width: 95%; ">Pevious</a>
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