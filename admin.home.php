<?php 
require ('admin.header.inc');
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title "  >
<h3 style="text-align: center; color: red;" ><strong>ADMINISTRATOR PANEL</strong></h3>

<div class="alert">
<h3 id="msg" style="text-align: center; color: red;" class="alert-link" >Print</h3>
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
<a class="btn btn-primary login-btn"  href="<?php echo $ahref;?>" style="float: right; width: 100%; ">Download</a>
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
<a class="btn btn-primary login-btn" href="<?php echo $ahref1;?>" style="width: 100%; ">Print</a>
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
