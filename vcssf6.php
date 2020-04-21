<?php require ('header1.inc');
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
  
$aquisition = $fetch["aquisitionPolicy"];
$services = $fetch["libraryservices"];    
}
else{
 $aquisition = '';
$services = ''; 
}

  if($_SERVER["REQUEST_METHOD"]=="POST"){
       $policy=  input_check($_POST["policy"]);
       $Services = input_check($_POST["services"]);
       
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
  $sql = "SELECT * FROM vcselfstudy_ssf WHERE accreditationID= '$accreditationID'";
             if (!mysqli_query($db_link,$sql)){
  die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));    
}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
   $sql= "UPDATE vcselfstudy_ssf SET `aquisitionPolicy` ='$policy', `libraryservices`='$Services' WHERE `accreditationID`='$accreditationID'";
 if(!mysqli_query($db_link,$sql)){
     die("Faild  to update ownership and control" . mysqli_error($db_link));
      }
 
/* Closing connection */
mysqli_close($db_link);
header('location:vcssf7.php');
}
else{
  
$sql = "INSERT INTO `vcselfstudy_ssf`(`accreditationID`, `ownershipControl`, `organisationAdministration`, `phillosophyObjectives`, `utilityServices`,
 `curriculumDesign`, `updatingCurricula`, `bookList`, `aquisitionPolicy`, `libraryservices`, `staffAccomodation`, `sportFacilities`, `healthFacilities`, 
 `recruitmentPolicy`, `staffDevelopment`, `firstName`, `surname`, `otherName`, `rank`, `dateSubmited`, `submissonStatus`) VALUES ('$accreditationID','',
 '','','','','','$policy','$Services','','','','','','','','','','','','')";

if (!mysqli_query($db_link,$sql)){die("Faild  to insert vc self study form " . mysqli_error($db_link));}
/* Closing connection */
mysqli_close($db_link);
header('location:vcssf7.php');
}
}
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part X-XI (AQUISION POLICY AND PROFFESSIONAL SERVICES OFFERED BY THE LIBRARY)</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">LIBRARY AQUISION POLICY</h5>
</div>

<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<div class="form-row" >
 <label class="form-row"for="apolicy">Indicate how the Library is organized to effectively cope with its smooth 
administration and use (include organization chart).</label>
    <div class="form-group" >
        <textarea class="form-control" id="apolicy" rows="5" cols="60" name="policy" required="required"><?php echo $aquisition;?></textarea>
  </div>
  </div>
  </div>
  
  



<!-- Second column start here-->
<div class="col second-category" >
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">PROFFESSIONAL SERVICES OFFERED BY THE LIBRARY</h5>
</div>
<div class="form-row" style="margin-left: 1%;">
 <label class="form-row"for="services">Describe briefly the services offered by the library including deliberate efforts 
made to ensure maximum use of the library by both staff and students.</label>
    <div class="form-group">
        <textarea class="form-control" id="services" required="required" rows="3" cols="58" name="services"><?php echo $services;?></textarea>
  </div>
  </div>

</div>
 
 <div class="form-row">

 <div class="col">
<a class="btn btn-primary login-btn" href="vcssf5.php" style=" width: 95%; ">Pevious</a>
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