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
  
$staffDevelopment = $fetch["staffDevelopment"];    
}
else{
 $staffDevelopment = '';
 
}

  if($_SERVER["REQUEST_METHOD"]=="POST"){
  $sDevelopment=  input_check($_POST["staffDevelopment"]); 
                 
             /* Performing SQL query */
  $sql = "SELECT * FROM vcselfstudy_ssf WHERE accreditationID= '$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
   $sql= "UPDATE vcselfstudy_ssf SET `staffDevelopment` ='$sDevelopment' WHERE `accreditationID`='$accreditationID'";
 if(!mysqli_query($db_link,$sql)){die("Faild  to update ownership and control" . mysqli_error($db_link)); }
 
/* Closing connection */
mysqli_close($db_link);
header('location:vcssf.submit.php');
}
else{
  
$sql = "INSERT INTO `vcselfstudy_ssf`(`accreditationID`, `ownershipControl`, `organisationAdministration`, `phillosophyObjectives`, `utilityServices`,
 `curriculumDesign`, `updatingCurricula`, `bookList`, `aquisitionPolicy`, `libraryservices`, `staffAccomodation`, `sportFacilities`, `healthFacilities`, 
 `recruitmentPolicy`, `staffDevelopment`, `firstName`, `surname`, `otherName`, `rank`, `dateSubmited`, `submissonStatus`) VALUES ('$accreditationID','',
 '','','','','','','','','','$sDevelopment','','','','','','','','','')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert vc self study form " . mysqli_error($db_link));}
/* Closing connection */
mysqli_close($db_link);
header('location:vcssf.submit.php');
}
}
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part XVIII-IX (STAFF DEVELOPMENT PROGRAMME,STUDENT ADMISSION AND GRADUATION POLICY )</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">STAFF DEVELOPMENT PROGRAMME</h5>
</div>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<div class="form-row" >
 <label class="form-row"for="staffDevelopment">Describe any scheme of staff development by the University for upgrading and 
updating academic and other staff in specialized fields they are teaching and if this 
privilege is extended to all Departments including the Department offering the 
programme to be accredited.</label>

<div class="form-group" >
<textarea class="form-control" id="staffDevelopment" rows="5" cols="60" name="staffDevelopment" required="required"><?php echo $staffDevelopment;?></textarea>
  </div>
  </div>
  
  </div>
  
  



<!-- Second column start here-->
<div class="col second-category" >
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">STUDENT ADMISSION AND GRADUATION POLICY </h5>
</div>
<div class="form-row" style="margin-left: 1%;">
 <div class="form-group" >
        Print and fill the STUDENT ADMISSION AND GRADUATION POLICY  from 
    the Accreditation Manual on page 40-48,then scan and Upload it below.
  </div>
    <div class="form-group">
        <div class="form-group" style="float: right;color: red;" id="lawUpload" >
    <label for="admission">Attach a scan copy of the Student Admission And Graduation Policy only 
    *.PDF or *.doc Format accepted</label>
    <input type="file" class="form-control-file" id="admission" name="admission">
  </div>
  </div>
  </div>

</div>
 
 <div class="form-row">

 <div class="col">
<a class="btn btn-primary login-btn" href="vcssf9.php" style=" width: 95%; ">Pevious</a>
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