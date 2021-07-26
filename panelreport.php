<?php require ('admin.header.inc');?>
<div class="col card" >
<p style="color: red;"><?php echo $_SESSION["msg"];?></p>
 
<?php 
$accreditationID = $_SESSION['accreditationID'];
$ID = $_SESSION['ID'];
function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
    }
    
include_once("connection.php");
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
       
    echo '
<div class="form-row">
 <div class="col alert">
<a class="btn btn-primary login-btn" href="#" style="float: right; width: 100%; ">PRINT THE SUBMITED ACCREDITATION PANEL REPORTS</a>
 </div>
 </div>
</div>';
       
       
$sql1 = "SELECT * FROM `panelmembers` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql1)){die("Faild  to check panel Members" . mysqli_error($db_link));}
$result1 = mysqli_query($db_link,$sql1);
$panel_members=mysqli_num_rows($result1);


$sql = "SELECT * FROM `panelreport` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check panel report" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$numb=mysqli_num_rows($result);


if($numb>0){
      
$academicContent=0;
$employersrating=0;
$funding=0;
$library=0;
$staffing=0;
$physicalfacilities=0;

while($fetch=mysqli_fetch_assoc($result)){    
$academicContent = $fetch["academicContent"]+ $academicContent;        
$employersrating = $fetch["employersRating"]+ $employersrating;        
$funding = $fetch["funding"]+$funding;       
$library = $fetch["library"]+ $library;      
$physicalfacilities = $fetch["physicalFacilities"]+ $physicalfacilities;        
$staffing = $fetch["staffing"]+ $staffing;  

$academicContent1 = $fetch["academicContent"];        
$employersrating1 = $fetch["employersRating"];        
$funding1 = $fetch["funding"];       
$library1 = $fetch["library"];      
$physicalfacilities1 = $fetch["physicalFacilities"];        
$staffing1 = $fetch["staffing"];     
}

$total = $academicContent + $employersrating + $funding + $library + $physicalfacilities + $staffing;
$avg1 =$total/6;
$academicContentAvg=$academicContent/$numb;
$employersratingAvg=$employersrating/$numb;
$fundingAvg=$funding/$numb;
$libraryAvg=$library/$numb;
$physicalfacilitiesAvg=$physicalfacilities/$numb;
$staffingAvg=$staffing/$numb;
$avg2 =$total/6;
$totalAvg = $academicContentAvg + $employersratingAvg + $fundingAvg + $libraryAvg + $physicalfacilitiesAvg + $staffingAvg;
}
else{
    $_SESSION["msg"]= "No Panel Report Submited Yet!";
   //header('panelpef.summary.php');
}

?>

  <?php
  echo'<div class="row">
<!-- Third column start here-->
<div class="col card form-category" id="filled-section"  style="font-size:11px;">
<div class="row" >
 <div class="col" >
<select class="form-control" onchange="addProgramme(this.value)"">
<option>Please Select University</option>';

include_once("connection.php");
$sql2 = "SELECT * FROM `universityinfo_ssf`";
if (!mysqli_query($db_link,$sql2)){die("Faild  to check the university info" . mysqli_error($db_link));}
$result2 = mysqli_query($db_link,$sql2);
while($fetch2 = mysqli_fetch_assoc($result2)){
  $University = $fetch2["universityName"];
$universityID = $fetch2["universityID"];
 echo'<option value="'.$universityID.'" id="unName" >'. $University.'</option>'; 
}
?>
</select>       
</div>
</div>
<div class="col card p-5" >
<!-- first div title--> 
<select class="form-control" onchange="viewAccProgramme(this.value)" >
<option>Please Select University</option>
<?php
$universityID = $_SESSION["universityID"];
include_once("connection.php");
$sql = "SELECT* FROM programme_apply WHERE universityID ='$universityID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programmes" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
while($fetch = mysqli_fetch_assoc($result)){
  $programme =$fetch["programme"];
$accreditationID = $fetch['accreditationID'];


  //echo'<a class="dropdown-item"    ></a>';
  echo'<option value="'.$accreditationID.'" id="unName" >'. $programme.'</option>'; 
}
	
?>           
  </select>
  </div>
<?php echo'
<div id="forms" style="background-color:#7CC68D; color: white;font-size:8px;">
<h6 style="text-align:center;"> PANEL MEMBERS ACCREDITATION REPORT SUMMARY</h6>
</div>
    <table class="table">
<tr class="trheader">
	<td>Academic Content</td>
	<td>Employers Rating</td>
    <td>Funding</td>
	<td>Library</td>
	<td>Physical Facilities</td>
	<td>Staffing</td>
    <td>Total</td>
    
</tr>';

    $sql = "SELECT * FROM `panelreport` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check panel report" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);

    while($fetch=mysqli_fetch_assoc($result)){    
$academicContent1 = $fetch["academicContent"];        
$employersrating1 = $fetch["employersRating"];        
$funding1 = $fetch["funding"];       
$library1 = $fetch["library"];      
$physicalfacilities1 = $fetch["physicalFacilities"];        
$staffing1 = $fetch["staffing"];
$total2 = $academicContent1 + $employersrating1 + $funding1 + $library1 + $physicalfacilities1 + $staffing1;
    echo '<tr class="tr">
    <td>'.$academicContent1.'</td>
	<td>'.$employersrating1.'</td>
	<td>'.$funding1.'</td>
	<td>'.$library1.'</td>
	<td>'.$physicalfacilities1.'</td>
	<td>'.$staffing1.'</td>
      <td>'.$total2.'</td>
       </tr>';
       }
       echo'
       <tr class="trheader">
	<td>TOTAL POINTS</td>
	<td></td>
    <td></td>
	<td></td>
	<td></td>
	<td></td>
    <td>OVERALL TOTAL POINTS</td>
    </tr>              
       <tr class="tr">
    <td>'.$academicContent.'</td>
	<td>'.$employersrating.'</td>
	<td>'.$funding.'</td>
	<td>'.$library.'</td>
	<td>'.$physicalfacilities.'</td>
	<td>'.$staffing.'</td>
    <td>'.$total.'</td>
       </tr>
       <tr class="tr">
         <tr class="trheader">
	<td>TOTAL PERCENTAGE</td>
	<td></td>
    <td></td>
	<td></td>
	<td></td>
	<td></td>
    <td>OVERALL PERCENTAGE</td>
    </tr> 
    <td>'.$academicContentAvg.'%</td>
	<td>'.$employersratingAvg.'%</td>
	<td>'.$fundingAvg.'%</td>
	<td>'.$libraryAvg.'%</td>
	<td>'.$physicalfacilitiesAvg.'%</td>
	<td>'.$staffingAvg.'%</td>
    <td>'.$totalAvg.'%</td>
       </tr>';
         echo'</table>';
       
      echo'
    <table class="table">
<tr class="trheader">
	<td>Name of Panel Members</td>
	<td>Email</td>
    <td>Phone Number</td>
    
</tr>';
       while($fetch1=mysqli_fetch_assoc($result1)){
   $full_name= $fetch1['firstName']." ".$fetch1['surname']." ".$fetch1['otherName'];  
    $email= $fetch1['email'];
    $phone= $fetch1['telephone1'];
    
    echo'
    <tr class="tr">
	<td>'.$full_name.'</td>
     <td>'.$email.'</td>
	<td>'.$phone.'</td>
    </tr>';
    }
      echo'</table>';

?>

 </div>
 
<!-- first row closing tag-->
</div>
<!-- first div closing tag-->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');
$_SESSION["msg"]="";?>