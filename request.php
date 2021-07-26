<?php 
require ('admin.header.inc');   
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card p-3" >
<!-- first div title-->
<div class="card-title "  >
<h4 id="txt"style="text-align: center; color:green;" ><strong >UPDATING ACCREDITATION STATUS</strong></h4>
</div>
<div class="row" >
<!-- first column start here-->
<div class="col" >

<div class="navdiv" >  
<div class=" navbar" >
<ul class="navbar-nav mr-auto" style=" width: 100%;">
<li class="nav-item dropdown" >
<a class=" nav-link dropdown-toggle btn btn-outline-success   " style=" width: 100%; color: black;"
         onclick="showDropDown()"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">Click here to Select University</a>   
<div class="dropdown-menu" id="accID" style=" color: white; text-align: center; width: 100%;" aria-labelledby="navbarDropdown" >

<?php
include_once("connection.php");
$sql2 = "SELECT * FROM `universityinfo_ssf`";
if (!mysqli_query($db_link,$sql2)){die("Faild  to check the university info" . mysqli_error($db_link));}
$result2 = mysqli_query($db_link,$sql2);
while($fetch2 = mysqli_fetch_assoc($result2)){
  $University = $fetch2["universityName"];
$universityID = $fetch2["universityID"];
  echo'<a class="dropdown-item" id="'.$universityID.'"  onclick="myProgramme(this.id)" href="">'. $University.'</a>';
  echo'<div class="divider dropdown-item"></div>'; 
}
	
?>           
          </div>
            </li>
            </ul>

  
    </div>
 </div>
 </form>
<?php
$universityID = $_SESSION['accID'];
include_once("connection.php");
$sql = "SELECT* FROM programme_apply WHERE universityID ='$universityID' AND accreditation_status='Ready'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programmes" . mysqli_error($db_link)); }

$result = mysqli_query($db_link,$sql);
 $numRow =  mysqli_num_rows($result); 
 
if ($numRow >0 ){
    echo'<div class="row">
<!-- Third column start here-->
<div class="col card form-category" id="filled-section"  style="font-size:11px;">
<div style="background-color:#7CC68D; color: white;font-size:8px;">
<h5 style="text-align:center;">PENDING ACCREDITATION PROGRAMMES</h5>
</div>
    <table class="table">
<tr class="trheader">
	<td>Faculty</td>
	<td>Department</td>
	<td>Programme</td>
    <td>Status</td>
	<td>Date Establish</td>
	<td> HOD Name</td>
	<td>HOD Qualification</td>
    <td>Select the type of Accreditation</td>
    <td>Action</td>
    
</tr>';
    while($fetch=mysqli_fetch_assoc($result) ){
       
        $hodID =$fetch['hodID'];
          //check for HOD's Details
$sql2 = "SELECT* FROM hods_account WHERE hodID = '$hodID'";
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
    <form method="post" enctype="multipart/form-data" action="approveProgramme.php">

	<td>'.$faculty.'</td>
	<td>'.$department.'</td>
	<td>'.$programme.'</td>
	<td>'.$status.'</td>
	<td>'.$establishDate.'</td>
	<td>'.$hod_fulName.'</td>
	<td>'.$hod_qualification.'</td>
 
  <td><select size="1" id="status" name="accStatus" required style="width:150px;" class=" form-control" >
	<option value="">Select Accreditation Type</option>
    <option value=" Approved"> Interim Accreditation</option>
	<option value="Denied">Denied Accreditation</option>
	<option value="Approved">Full Accreditation  </option>
</select>
  </td>  
 <td>
 <input type="hidden"   name="pID" value="'.$programmeID.'"  />
  <input type="submit"  style="color:white; background-color:#2C7337;" id="'.$programmeID.'" value="Update" />
 </td>

 </form>
    </tr>';
    }
    $result->close();
    $result2->close();
    }
   
 echo'</table>';
$accreditationID ='';	
?>

 </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Container closing tag-->
<?php require ('footer.inc');
$_SESSION["msg"]='';
?>
