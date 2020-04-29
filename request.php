<?php 
require ('admin.header.inc');   
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title "  >
<h3 id="txt"style="text-align: center; color: red;" ><strong >ADMINISTRATOR PANEL</strong></h3>

<div class="alert">
<h3 id="msg" style="text-align: center; color:Blue;" class="alert-link" >SELECT FROM THE LIST OF AVAILABLE ACCREDITATION REQUESTS ON THE LIST OF UNIVERSITIEST</h3>
</div>
</div>
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category">
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">

<div class="navdiv" >  
<div class=" navbar" >
<ul class="navbar-nav mr-auto" style=" width: 100%;">
<li class="nav-item dropdown" >
        <a class=" nav-link dropdown-toggle btn btn-primary  login-btn" style=" width: 100%;"
         onclick="showDropDown()"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">Select the University's Requests from the Dropdown list</a>   
        <div class="dropdown-menu" id="accID" style=" width: 100%;" aria-labelledby="navbarDropdown" >

<?php
include_once("connection.php");
            /* Performing SQL query */
$sql = "SELECT * FROM `accreditationrequest_apply`  WHERE status= 'submited'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

$result = mysqli_query($db_link,$sql);
$numRow = mysqli_num_rows($result);

if ($numRow>0){
while($fetch = mysqli_fetch_assoc($result)){
$submitedDate = $fetch["Oname"];
$accreditationID = $fetch["accreditationID"];

$sql = "SELECT * FROM `universityinfo_ssf`  WHERE accreditationID= '$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the university info" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$fetch = mysqli_fetch_assoc($result);
$University = $fetch["universityName"];
  //echo '<option ></option>'; 
  echo'<a class="dropdown-item" id="'.$accreditationID.'"  onclick="myProgramme(this.id)" href="">'. $University.' Submited the request on '.$submitedDate.' </a>';
  echo'<div class="divider dropdown-item"></div>';

}
$result->close();
 }
	
?>           
          </div>
            </li>
            </ul>

  
    </div>
 </div>
 </form>
<?php
$accreditationID = $_SESSION['accID'];
include_once("connection.php");
$sql = "SELECT* FROM programme_apply WHERE accreditationID ='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programmes" . mysqli_error($db_link)); }

$result = mysqli_query($db_link,$sql);
 $numRow =  mysqli_num_rows($result); 
 
if ($numRow >0 ){
    echo'<div class="row">
<!-- Third column start here-->
<div class="col card form-category" id="filled-section"  style="font-size:11px;">
<div style="background-color:#7CC68D; color: white;font-size:8px;">
<h5 style="text-align:center;">THE PROGRAMMES REQUESTING FOR ACCREDITATION</h5>
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
    <td>Rejection button/Reasons</td>
    <td>Accreditation button/Date</td>
    
</tr>';
    while($fetch=mysqli_fetch_assoc($result) ){
       
        $hodID =$fetch['hodID'];
          //check for HOD's Details
    $sql2 = "SELECT* FROM hods_account WHERE accreditationID ='$accreditationID'AND hodID = '$hodID'";
            
             if (!mysqli_query($db_link,$sql2)){
  die("Faild  to check the HOD's Details" . mysqli_error($db_link));    
}
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
	<td>'.$hod_qualification.'</td>
 <td><input type="button"  style="color:white; background-color:red;" name="'.$hodID.'" 
 id="'.$programmeID.'" value="Reject" onclick="deleteProgramme(this.id,this.name)" /> <textarea id ="'.$programmeID.'" 
rows="2" >Rejection reasons if rejected </textarea></td>
 
 <td><input type="button"  style="color:white; background-color:#2C7337;" name="'.$hodID.'" 
 id="'.$programmeID.'" value="Approve" onclick="approveProgramme(this.id,this.name)" /> <input id ="'.$hodID.'" type="date" " 
 placeholder="accreditation Date" size="10" /></td>
 
 
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
<!-- Container closing tag-->
<?php require ('footer.inc');
$_SESSION["msg"]='';
?>
