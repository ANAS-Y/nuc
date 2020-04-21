<?php 
require ('header1.inc');
$accreditationID=$_SESSION['accreditationID'];
    
include_once("connection.php");
            /* Performing SQL query */
$sql = "SELECT * FROM vcselfstudy_ssf WHERE accreditationID= '$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$result = mysqli_query($db_link,$sql);
$fetch = mysqli_fetch_assoc($result);

$status = $fetch["submissonStatus"];
if ($status =='submited'){
    $ahref='#';
    $notice = 'THE SELF-STUDY FORM SECTION "A" HAS BEEN SUBMITED';
    $buttonText = 'Print Submited Self-Study Form Section A';
}
else{
$ahref='vcssf.php';
$notice = 'THE SELF-STUDY FORM SECTION "A" IS NOT SUBMITED  YET! THE VICE CHANCELLOR SHOULD TRY AND SUBMIT THE FORM IN TIME';
$buttonText = ' Self-Study Form Section A not Yet Submited Click here to CONTINUE';
}
}
else{
$ahref='vcssf.php';
$notice = 'THE SELF-STUDY FORM SECTION "A" IS NOT SUBMITED  YET! THE VICE CHANCELLOR SHOULD TRY AND SUBMIT THE FORM IN TIME';
$buttonText = ' Self-Study Form Section A not Yet Submited Click here to CONTINUE';
}
include_once("connection.php");
            /* Performing SQL query */
$sql = "SELECT * FROM programmeinfo_ssf WHERE accreditationID= '$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$result = mysqli_query($db_link,$sql);
$fetch = mysqli_fetch_assoc($result);

$status = $fetch["submissonStatus"];
if ($status =='submited'){
    $ahref1='#';
    $notice1 = 'THE SELF-STUDY FORM SECTION "B" HAS BEEN SUBMITED';
    $buttonText1 = 'Print Submited Self-Study Form Section B';
}
else{
$ahref1='hodssf.php';
$notice1 = 'THE SELF-STUDY FORM SECTION "B" NOT SUBMITED  YET! THE HEAD OF DEPARTMENTS SHOULD TRY AND SUBMIT THEIR FORMS IN TIME';
$buttonText1 = ' Self-Study Form Section B not Yet Submited Click here to CONTINUE';
}
}
else{
$ahref1='hodssf.php';
$notice1 = 'THE SELF-STUDY FORM SECTION "B" NOT SUBMITED  YET! THE HEAD OF DEPARTMENTS SHOULD TRY AND SUBMIT THEIR FORMS IN TIME';
$buttonText1 = ' Self-Study Form Section B not Yet Submited Click here to CONTINUE';
}
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title "  >
<h3 style="text-align: center; color: red;" ><strong>SELF-STUDY FORM (NUC/SSF)SUBMITED</strong></h3>

<div class="alert">
<h3 id="msg" style="text-align: center; color: red;" class="alert-link" ><?php echo $_SESSION["msg"];?></h3>
</div>
</div>
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"   >
<div class="form-row">
      <label class="col"  style="color: red;margin-left: 8%; font-size:12px;font-family: fantasy;"><strong></strong></label>
      </div>
 <div class="form-row">
 <div class="col alert">
<a class="btn btn-primary login-btn" href="<?php echo $ahref;?>" style="float: right; width: 100%; "><?php echo $buttonText;?></a>
 </div>
 </div>

</div>
</div>
</div>
<!-- first div closing tag-->
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"   >
<div class="form-row">
      <label class="col"id="msg" style="color: red;margin-left: 8%; font-size: 25px;"></label>
      </div>
 
 <div class="form-row">
 <div class="col alert">
<a class="btn btn-primary login-btn" href="<?php echo $ahref1;?>" style="width: 100%; "><?php echo $buttonText1;?></a>
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
