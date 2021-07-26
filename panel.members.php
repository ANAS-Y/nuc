<?php require ('admin.header.inc');
$_SESSION['MSG']='';
$universityID = $_SESSION["universityID"];
if(empty($universityID)){
    $_SESSION['MSG']='Please Select University';
    ?>
   <script>window.location="addpanel2.php"</script> 
  <?php
}
include_once("connection.php");
  
if($_SERVER["REQUEST_METHOD"]=="POST"){
    function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
}
if (!isset($_POST["accID"])){
    $_SESSION['MSG']='Please Select Programme First';
    ?>
   <script>window.location="addpanel2.php"</script> 
  <?php
}
$accID = input_check($_POST["accID"]);
$email =  input_check($_POST["email"]);
$fname = input_check($_POST["vcFname"]);
$Lname = input_check($_POST["vcLname"]);
$Oname = input_check($_POST["vcOname"]);
$Telephone = input_check($_POST["phone"]);
$position = input_check($_POST["position"]);
$ID= $Telephone.rand(10,99);
$password= sha1($ID);
include_once("connection.php");
            /* Performing SQL query */
$sql = "SELECT * FROM `panelmembers` WHERE  email ='$email'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check Panel Member email" . mysqli_error($db_link));}   
$result = mysqli_query($db_link,$sql);
if(mysqli_num_rows($result) > 0){
     $_SESSION["MSG"]='Member with this email Already exist';	
	}
    else {
$sql = "INSERT INTO `panelmembers`(`firstName`, `surname`, `otherName`, `position`, `email`, `telephone1`, `password`, `accreditationID`,ID)
 VALUES ('$fname','$Lname','$Oname','$position','$email','$Telephone','$password','$accID','$ID')";
if (!mysqli_query($db_link,$sql)){die("Faild  to Insert Panel Member details" . mysqli_error($db_link));}
mail(
$email,
"ACCREDITATION NOTICE",
"Dear ".$fname." ".$Lname." The National University Commission (NUC) whish to Inform you that You are Added as".$position. "
of the accreditation of Panel, click this link www.nuc.comto login using your Email: ".$email." and Password:".$ID."","nucnotice@gmail.com");

   $_SESSION["MSG"]='Panel Member Added Sucessfully'; 
    }
    }
    
    $sql = "SELECT* FROM programme_apply WHERE universityID ='$universityID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programmes" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);

?>

<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">ADDING ACCREDITATION PANEL MEMBER</h3>
</div>
<div class="card-title ">
<h5 style="text-align:center;color: red;"><?php echo $_SESSION["MSG"]; ?></h5>
</div>
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class="card form-category" >


<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<div class="form-row">
    <div class="col">
    Select program <select required name="accID" class=" form-control" arial-label=".form-select example" id="program " > 
    <option value="" >Select Programme</option>
<?php
$numRow =  mysqli_num_rows($result); 
if ($numRow >0 ){
while($fetch=mysqli_fetch_assoc($result) ){
$programme =$fetch["programme"];
$programmeID =$fetch["accreditationID"];
echo '<option value="'.$programmeID.'" >'.$programme.'</option>';
}
}
?>
</select>
</div>
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
      <select id="position" name="position" required="required"class="form-control" placeholder="Position">
      <option>Member</option>
      <option>Chairman</option>
      </select>
      </div>
</div

</div>
 
 <div class="form-row">
 <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin:2%;margin-left:35%; width:30%; ">ADD PANEL MEMBER</button>
 </div>
<br />
 </div>

 </form>
 </div>
 </div>
 
<!-- first row closing tag-->
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
<div class="col card" id="filled-section"  style="font-size:11px;">
<div style="background-color:#7CC68D; color: white;font-size:8px;">
<h5 style="text-align:center;">LIST OF THE ADDED PANEL MEMBERS </h5>
</div>
    <table class="table" colspan="12">
<tr class="trheader" >
	<td >Faculty</td>
	<td>Department</td>
	<td>Programme</td>
    <td>Name and Email of the Panel Members</td>
	
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
$department=$fetch["department"];	
$programme =$fetch["programme"];
$status=$fetch["status"];
$establishDate =$fetch["dateEstablished"];
$programmeID =$fetch["pID"];
$hodID =$fetch["hodID"];


$hod_fulName =$fetch2["firstName"]." ".$fetch2["surname"];
$hod_contact =$fetch2["telephone"]."/".$fetch2["email"];
$hod_qualification =$fetch2["qualification"];

$sql = "SELECT* FROM panelmembers WHERE accreditationID ='$accreditationID'";
$result = mysqli_query($db_link,$sql);
$numRow =  mysqli_num_rows($result); 
 
if ($numRow >0 ){

    echo'
    <tr class="tr">
	<td>'.$faculty.'</td>
	<td>'.$department.'</td>
	<td>'.$programme.'</td><td>';
 while($fetch=mysqli_fetch_assoc($result)){
  echo $fetch["surname"].' '.$fetch["firstName"].' '.$fetch["email"].'<br/>';
   }
   echo '</td></tr>';
   }
   else{
    break;
    echo 'No Panel Member added';
   }
   }
   
   
    $result->close();
    $result2->close();
     echo'</table>';
    }

?>

<!-- first div closing tag-->
</div>
<!-- Container closing tag-->
</div>
 </div>
 </div>
  </div>
<?php require ('footer.inc');
//$_SESSION["msg"]='';?>
