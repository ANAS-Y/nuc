<?php 
require ('admin.header.inc');
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card p-5" >
<!-- first div title--> 
<select class="form-control" onchange="viewProgramme(this.value)" >
<option>Please Select University</option>
<?php
include_once("connection.php");
$sql2 = "SELECT * FROM `universityinfo_ssf`";
if (!mysqli_query($db_link,$sql2)){die("Faild  to check the university info" . mysqli_error($db_link));}
$result2 = mysqli_query($db_link,$sql2);
while($fetch2 = mysqli_fetch_assoc($result2)){
  $University = $fetch2["universityName"];
$universityID = $fetch2["universityID"];


  //echo'<a class="dropdown-item"    ></a>';
  echo'<option value="'.$universityID.'" id="unName" >'. $University.'</option>'; 
}
	
?>           
  </select>
  </div>      
<?php
$universityID = $_SESSION["universityID"];
include_once("connection.php");
$sql = "SELECT* FROM programme_apply WHERE universityID ='$universityID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programmes" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
 $numRow =  mysqli_num_rows($result); 
 
if ($numRow >0 ){
    echo'<div class="row">
<!-- Third column start here-->
<div class="col card form-category" id="filled-section"  style="font-size:11px;">
<div id="forms" style="background-color:#7CC68D; color: white;font-size:8px;">
<h5 style="text-align:center;" id="un">'.$_SESSION["universityName"].'</h5>
<h6 style="text-align:center;">LIST OF PROGRAMMES</h6>

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
    <td>Action Button</td>
</tr>';
    while($fetch=mysqli_fetch_assoc($result) ){
       
        $hodID =$fetch['hodID'];
        $accreditationID = $fetch['accreditationID'];
          //check for HOD's Details
    $sql2 = "SELECT* FROM hods_account WHERE accreditationID ='$accreditationID'AND hodID = '$hodID'";
            
if (!mysqli_query($db_link,$sql2)){die("Faild  to check the HOD's Details" . mysqli_error($db_link)); }
    
$result2 = mysqli_query($db_link,$sql2);
$fetch2=mysqli_fetch_assoc($result2); 
        
$faculty =$fetch['faculty'];
$department=$fetch["department"];;	
$programme =$fetch["programme"];
$status=$fetch["status"];
$establishDate =$fetch["dateEstablished"];
$programmeID =$fetch["pID"];
$hodID =$fetch["hodID"];


$hod_fulName =$fetch2["firstName"]." ".$fetch2["surname"];
$hod_contact =$fetch2["telephone"]." ".$fetch2["email"];
$hod_qualification =$fetch2["qualification"];


    echo'
    <tr class="tr">
	<td>'.$faculty.'</td>
	<td>'.$department.'</td>
	<td>'.$programme.'</td>
	<td>'.$status.'</td>
	<td>'.$establishDate.'</td>
	<td>'.$hod_fulName.'</td>
	<td>'.$hod_contact.'</td>
    <form action="deleteProgramme.php" method="POST" >
    <input type="hidden" size="100" value="'.$hodID.'"  name="hodID"/>
 <input type="hidden"  style="color:white; background-color:red;" name="pID" value="'.$programmeID.'" />
 <td><input type="submit" id="'.$hodID.'" name="'.$programmeID.'" onclick="deleteProgramme(this.id,this.name)" style="color:white; background-color:red;" value="Delete" /> </td>

 </form>
    </tr>';
    }
    $result->close();
    $result2->close();
     echo'</table>';
    }

?>


 </div>

</div>
</div>
</div>
</div>
</div>

<!-- first div closing tag-->
<?php require ('footer.inc');
$_SESSION["msg"]='';
?>
</div>
<!-- Container closing tag-->

