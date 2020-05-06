<?php require ('hodheader1.inc');
$accreditationID=$_SESSION['accreditationID'];
$hodID=$_SESSION['hodID'];
function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
    }
    
    include_once("connection.php");
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
  $sql = "SELECT * FROM `programmeinfo_ssf` WHERE accreditationID= '$accreditationID' AND hodID ='$hodID'";
             if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
  
$title1 = $fetch["programmeTitle"]; 
$type1 = $fetch["accreditationType"];
$faculty1 = $fetch["faculty"];
$department1 = $fetch["department"];
$deanName1 = $fetch["deanName"]; 
$dQualification1 = $fetch["deanQualification"];
$hodName1 = $fetch["hodName"];
$hQualification1=$fetch["hodQualification"];  
}
else{
 $title1 = '';
 $type1 = '';
 $faculty1 = '';
 $department1 = '';
 $deanName1 = '';
 $dQualification1 = '';
 $hodName1 = '';
 $hQualification1 = '';
}

  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $programmeID = rand(1,1000000);
       $title=  input_check($_POST["title"]);
       $faculty=  input_check($_POST["faculty"]);
       $department=  input_check($_POST["department"]);
       $pdate=  input_check($_POST["pdate"]);
       $type=  input_check($_POST["type"]);
       $dFname=  input_check($_POST["dFname"]);
       $dQualification=  input_check($_POST["dqualification"]);
       $hFname=  input_check($_POST["hFname"]);
       $hQualification=  input_check($_POST["hqualification"]);
   
                 
             /* Performing SQL query */
  $sql = "SELECT * FROM `programmeinfo_ssf` WHERE accreditationID= '$accreditationID'AND hodID='$hodID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
   $sql= "UPDATE `programmeinfo_ssf` SET `programmeTitle` ='$title',`accreditationType` ='$type',`faculty`='$faculty',`department`='$department',
   `dateEstablished`='$pdate',`deanName`='$dFname',`deanQualification`='$dQualification',`hodName`='$hFname',`hodQualification`='$hQualification'
    WHERE `accreditationID`='$accreditationID'";
 if(!mysqli_query($db_link,$sql)){die("Faild  to update programme information" . mysqli_error($db_link)); }
/* Closing connection */
mysqli_close($db_link);
header('location:hodssf1.php');
}
else{
  
$sql = "INSERT INTO `programmeinfo_ssf`(`programmeID`, `accreditationID`, `programmeTitle`, `accreditationType`, `faculty`, `department`, `visitedBefore`,
 `dateEstablished`, `deanName`, `deanQualification`, `hodName`, `hodQualification`, `programmehistory`, `programmeAdministration`, `studentsWelfare`,
  `academicAtmosphere`, `dateSubmited`, `officerFname`, `officerSurname`, `officerOname`, `rank`, `submissionStatus`,`hodID` ) VALUES ('$programmeID','$accreditationID','$title',
  '$type','$faculty','$department','','$cdate','$dFName','$dQualification','$hFname','$hQualification','','','','','','','','','','$hodID')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert programme information" . mysqli_error($db_link));}
/* Closing connection */
mysqli_close($db_link);
header('location:hodssf1.php');
}
}
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:B Part I (PROGRAMME/SUB-DISCIPLINE/DISCIPLINE TO BE ACCREDITED)</h6>
</div>

  
  </div>
  </div>
  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >
<div class="card-title " >
<h5 style="text-align: center;">PROGRAMME TO BE ACCREDITED</h5>
</div>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
    <div class="form-row">
    <div class="col">
      <input type="text" required="required" id="faculty" name="title"  value="<?php echo $title1 ;?>" class="form-control" placeholder="Title of programme/sub-discipline/discipline to be accredited ">
    </div>
  </div>
  <div class="form-row">
  <div class="col">
      <select id="owner" class="form-control" name="type">
        <option selected>Select Accreditation Type</option>
        <option>Initial Accreditation</option>
        <option>Re-accreditation</option>
      </select>
    </div>
    <div class="col">
      <input type="text" required="required" id="faculty" value="<?php echo $faculty1 ;?>"  name="faculty"class="form-control" placeholder="Name of Faculty/School/College">
    </div>
  </div>
      
    <div class="form-row">
    <label class=" col text-responsive" >Has any NUC Accreditation Panel visited your University to determine if the 
Programme/sub-discipline/discipline can be accredited? <label class="form-check-label" for="Yes"> Yes</label>
    <input class="" type="radio" name="Yes" id="Yes" value="Yes" onclick="lawYes()"/>
    
    <label class="form-check-label" for="No"> No</label>
    <input class="" type="radio" name="No" id="No" value="No" onclick="lawNo()"/>
  </label>
   <div class="form-group" hidden="hidden"style="float: right;" id="lawUpload" >
    <label for="lawCopy" style="color: red;">Attach a photocopy of NUC Decision</label>
    <input type="file" class="form-control-file" id="lawCopy" name="lawCopy">
  </div>
  </div>
  <div class="form-row">
      <div class="col">
      <input type="text" required="required" id="department" value="<?php echo $department1 ;?>"  name="department" class="form-control" placeholder="Department">
  </div>
     <label for="pdate" >Date Established </label>
     <div class="col">
      <input type="date" class="form-control" value="<?php echo $cdate1 ;?>" placeholder="Established Date" id="pdate"name="pdate">
    
    </div>
  </div>
  
  
<div class="card-title ">
<h5 style="text-align: center;"></h5>
</div>


</div>
</div>
<br />


<!-- Second column start here-->
<div class="col" >
<div class="card form-category" >

<div class="card-title ">
<h5 style="text-align: center;">FACULTY DEAN's/HOD's INFORMATION</h5>
</div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="dFame" name="dFname" required="required" value="<?php echo $deanName1 ;?>"  class="form-control" placeholder="Dean's Full name">
      </div>
      <div class="col">
      <input type="text" id="dqualification" name="dqualification" required="required" value="<?php echo $dQualification1 ;?>" class="form-control" placeholder=" Dean's Quqlification(s)">
      </div>
  </div>
  
  <div class="form-row">
    <div class="col">
     <input type="text" id="hFame" name="hFname" required="required" class="form-control" value="<?php echo $hodName1 ;?>"  placeholder="HOD's Full name">
      </div>
      <div class="col">
       <input type="text" id="hqualification" name="hqualification" required="required"class="form-control" value="<?php echo $hQualification1 ;?>"  placeholder=" HOD's Quqlification(s)">
     </div>
</div>

</div>
 
 <div class="form-row">

 <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 88%; ">Next</button>
 </div>
 </div>

 </form>
 </div>
 </div>
 
<!-- first row closing tag-->
</div>
<!-- first div closing tag-->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');?>