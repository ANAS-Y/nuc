<?php 
require('header1.inc');
include_once("connection.php");
$accreditationID = $_SESSION["accreditationID"];
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
  $sql = "SELECT * FROM accreditationrequest_apply WHERE accreditationID = '$accreditationID'";
 if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of request" . mysqli_error($db_link)); }

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
    $result = mysqli_query($db_link,$sql);
    $fetch=mysqli_fetch_assoc($result);
    $status =$fetch['status'];
    $position = $_SESSION["position"];
    $hodID = $_SESSION["hodID"];
    
    
if($status =='approved' OR $status =='approved some' ){
        if( $position=='VC'){
            header('location:vcssf.php');
            }
        else{
            
$sql = "SELECT* FROM programmeinfo_ssf WHERE hodID ='$hodID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programmes" . mysqli_error($db_link)); }
$result = mysqli_query($db_link,$sql);
$numRow =  mysqli_num_rows($result); 
if ($numRow >0 ){header('location:hodssf.php'); }
else{ header('location:apply.home.php');}

            }
      
    }
else{
    header('location:apply.home.php');
    }
   
}
else{
  
}
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title "  >
<h3 style="text-align: center; " >ACCREDITATION REQUEST</h3>

<div class="alert">
<h3 id="msg" style="text-align: center; color: red;" class="alert-link" ><?php echo $_SESSION["msg"];?></h3>
</div>
</div>
<?php
$accreditationID = $_SESSION["accreditationID"];
include_once("connection.php");
$sql = "SELECT* FROM programme_apply WHERE accreditationID ='$accreditationID'";
            
             if (!mysqli_query($db_link,$sql)){
  die("Faild  to check the existance of programmes" . mysqli_error($db_link));    
}
$result = mysqli_query($db_link,$sql);
 $numRow =  mysqli_num_rows($result); 
 
if ($numRow >0 ){
    echo'<div class="row">
<!-- Third column start here-->
<div class="col card form-category" id="filled-section"  style="font-size:11px;">
<div style="background-color:#7CC68D; color: white;font-size:8px;">
<h5 style="text-align:center;">SAVED PROGRAMMES</h5>
</div>
    <table class="table">
<tr class="trheader">
	<td>Faculty</td>
	<td>Department</td>
	<td>Programme</td>
    <td>Status</td>
	<td>Date Establish</td>
	<td> HOD Name</td>
	<td>HOD Contact</td>
	<td>HOD Qualification</td>
    <td>Action Button</td>
</tr>';
    while($fetch=mysqli_fetch_assoc($result) ){
       
        $hodID =$fetch['hodID'];
          //check for HOD's Details
    $sql2 = "SELECT* FROM hods_account WHERE accreditationID ='$accreditationID'AND hodID = '$hodID'";
            
if (!mysqli_query($db_link,$sql2)){die("Faild  to check the HOD's Details" . mysqli_error($db_link)); }
    
$result2 = mysqli_query($db_link,$sql2);
$fetch2=mysqli_fetch_assoc($result2); 
        
$faculty =$fetch['faculty'];
$department=$fetch["department"];;	
$programme =$fetch["programme"];;
$status=$fetch["status"];
$establishDate =$fetch["dateEstablished"];
$programmeID =$fetch["pID"];
$hodID =$fetch["hodID"];


$hod_fulName =$fetch2["firstName"]." ".$fetch2["surname"]." ".$fetch2["otherName"];
$hod_contact =$fetch2["telephone"]."/".$fetch2["email"];
$hod_qualification =$fetch2["qualification"];


    echo'
    <tr class="tr">
    <form method="post" enctype="text/plain">
	<td>'.$faculty.'</td>
	<td>'.$department.'</td>
	<td>'.$programme.'</td>
	<td>'.$status.'</td>
	<td>'.$establishDate.'</td>
	<td>'.$hod_fulName.'</td>
	<td>'.$hod_contact.'</td>
	<td>'.$hod_qualification.'</td>
 <td><input type="button"  style="color:white; background-color:red;" name="'.$hodID.'" id="'.$programmeID.'" value="Delete" onclick="deleteProgramme(this.id,this.name)" /> </td>
 </form>
    </tr>';
    }
    $result->close();
    $result2->close();
    }
   
 echo'</table>';
?>

 

  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"   >
<div class="card-title " >
<h5 style="text-align: center;">Programme Details</h5>
<h6  class="alert" style="  text-align: center; color: red;   font-size: 14px;"  > </h6>
</div>
<form action="applyNext1.php" method="post" >
    <div class="form-row">
    <div class="col">
      <input type="text" required="required" id="faculty" onclick="" name="faculty"class="form-control" placeholder="Faculty">
    </div>
  </div>
  <div class="form-row">
   <div class="col">
      <input type="text" required="required" id="department"   name="department"class="form-control" placeholder="Department">
    </div>
    <div class="col">
      <input type="text" required="required" id="programme"  name="programme"class="form-control" placeholder="programme">
    </div>
  </div>
  <div class="form-row">
  <label for="satus" class="col-sm-4 text-responsive">Current Programe Status</label>
    <div class="col-sm-8">
    <select id="status"   name="status"class="form-control">
        <option selected >Select status</option>
        <option>New programe/New Department</option>
        <option>Accreditated Department/New Programme</option>
        <option>Other</option>
      </select>
          </div>
      </div>
  <div class="form-row">
     <label for="pdate" class="col-sm-3" >Date Established </label>
     <div class="col-sm-9">
      <input type="date" class="form-control" placeholder="Established Date" id="pdate"name="pdate">
    
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
<h5 style="text-align: center;">HOD's Information</h5>
</div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="vcFame" name="vcFname" required="required" class="form-control" placeholder="First name">
      </div>
      <div class="col">
      <input type="text" id="vcLame" name="vcLname" required="required"class="form-control" placeholder=" Surname">
      </div>
    <div class="col">
      <input type="text" id="vcOname" name="vcOname" class="form-control" placeholder="Other name">
      </div>
  </div>
  <div class="form-row">
    <div class="col">
      <input type="email" id="email" name="email" required="required" class="form-control" placeholder="Email">
      </div>
      <div class="col">
      <input type="text" id="phone" name="phone" required="required"class="form-control" placeholder="Phone Number">
      </div>
    <div class="col">
      <input type="text" id="Qualification" name="Qualification" required="required"class="form-control" placeholder="Highest Qualification">
      </div>
</div>
<div class="form-row">
      <label class="col"id="msg" style="color: red;margin:auto ;text-align: center;">Click Save before you procced!</label>
      </div>

</div>
 
 <div class="form-row">
 <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Save</button>
 </div>
 <div class="col">
<a class="btn btn-primary login-btn" href="apply.submit.php" style="float: right;margin-right: 4%; width: 95%; ">Next</a>
 </div>
 </div>

 </form>
 </div>
 </div>
 
<!-- first row closing tag-->
</div>
<!-- first div closing tag-->
<?php require ('footer.inc');
$_SESSION["msg"]='';
?>
</div>
<!-- Container closing tag-->

