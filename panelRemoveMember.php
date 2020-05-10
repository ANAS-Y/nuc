<?php require ('admin.header.inc');
$_SESSION['MSG']='';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
}

$email =  input_check($_POST["email"]);
include_once("connection.php");
            /* Performing SQL query */
$sql = "SELECT*FROM `panelmembers` WHERE  `email` ='$email'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check Panel Member email" . mysqli_error($db_link));}   
$result = mysqli_query($db_link,$sql);
if(mysqli_num_rows($result) > 0){
$sql = "DELETE FROM `panelmembers` WHERE  `email` ='$email'";
if (!mysqli_query($db_link,$sql)){die("Faild  to Delete Panel Members " . mysqli_error($db_link));}   
    $_SESSION["MSG"]='Panel Member Deleted Sucessfully';
    }
    else {
        $_SESSION["MSG"]='No Panel Member with this Email:  '.$email; 
    }
    }
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;"> ACCREDITATION PANEL MEMBER</h3>
</div>

<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class="card form-category" >

<div class="card-title ">
<h5 style="text-align: center;">Removing Accreditation Panel Member</h5>
<h5 style="text-align:center;color: red;"><?php echo $_SESSION["MSG"]; ?></h5>

</div>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<div class="form-row">
    <div class="col-sm-8">
      <input type="email" id="email" name="email" required="required" class="form-control" placeholder="Email">
      </div>
     
<button type="submit" class="btn btn-primary login-btn" style="background-color: red; ">REMOVE PANEL MEMBER</button> 
  </div>


 
 <div class="form-row">
 
 </div>
 </div>
 <div class="form-row" style="margin-top:15%;">
 <div class="col">
<a  href="panelRemoveMembers.php" style="margin:2%; color: red; ">TO REMOVE ALL ACCREDITATION PANEL MEMBERS Click here</a>
 </div>
<br />
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