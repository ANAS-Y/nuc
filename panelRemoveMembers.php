<?php require ('admin.header.inc');
$_SESSION['MSG']='';
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
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
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
      <input type="text" id="accID" name="accID" required="required" class="form-control" placeholder="Accreditation ID">
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
 </div><div style="margin-top:13%;></div>
 
<!-- first row closing tag-->
</div>
<!-- first div closing tag-->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');?>