
<?php 
require ('mainHeader.inc');
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title "  >
<h3 style="text-align: center; color: red;" ><strong>ACCREDITATION REQUEST ALREADY SUBMITED</strong></h3>

<div class="alert">
<h3 id="msg" style="text-align: center; color: red;" class="alert-link" ><?php echo $_SESSION["msg"];?></h3>
</div>
</div>
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"   >
<div class="form-row">
      <label class="col"id="msg" style="color: red;margin-left: 8%; font-size: 25px;">Please bear with us! We are reviewing your request we would contact you
       Very Soon.<br/> Thank you.</label>
      </div>
 

</div>
</div>
</div>
<!-- first div closing tag-->
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"   >
<div class="card-title " >
<h5 style="text-align: center;"></h5>
<h6  class="alert" style="  text-align: center; color: red;   font-size: 14px;"  > </h6>
</div>
 <div class="form-row">
 <div class="col">
<a class="btn btn-primary login-btn" href="apply.submit.php" style="float: right;margin-right: 4%; width: 30%; ">Print Submited Application Form</a>
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
