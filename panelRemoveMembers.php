<?php require ('admin.header.inc');
$_SESSION['MSG']='';
$universityID = $_SESSION["universityID"];

if($_SERVER["REQUEST_METHOD"]=="POST"){
    function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
}
$accID = input_check($_POST["accID"]);
include_once("connection.php");
            /* Performing SQL query */
$sql = "SELECT*FROM `panelmembers` WHERE  `accreditationID` ='$accID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check Panel Member email" . mysqli_error($db_link));}   
$result = mysqli_query($db_link,$sql);
if(mysqli_num_rows($result) > 0){
$sql = "DELETE FROM `panelmembers` WHERE  `accreditationID` ='$accID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to Delete Panel Members " . mysqli_error($db_link));}   
    $_SESSION["MSG"]='Panel Member Deleted Sucessfully';
    }
    else {
        $_SESSION["MSG"]='Panel Members associate to this Accreditation ID '.$accID.' are not Found'; 
    }
    }
?>

<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">REMOVING PANEL ACCREDITATION MEMBERS</h3>
</div>

<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class="card form-category" >

<div class="card-title ">
<h5 style="text-align: center;">Removing  Panel Members' Details </h5>
<h5 style="text-align:center;color: red;"><?php echo $_SESSION["MSG"]; ?></h5>

</div>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<div class="form-row" >
    <div class="col">
    <?php
    include_once("connection.php");
$sql = "SELECT* FROM programme_apply WHERE universityID ='$universityID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programmes" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);

?>
</div> 
</div>
<div class="form-row">
    <div class="col">Select program<select name="accID"  class=" form-control" arial-label=".form-select example" id="program " name="program"> 
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

 <div class="form-row" >
 <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="background-color: red; margin-left:70%; width: 30%; ">REMOVE ALL PANEL MEMBERS</button>
 </div>
 </div>
 </div>

 </form>
 </div>
 </div>
  </div>
 </div> </div>
 </div>
 <?php require ('footer.inc');?>