
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part IV-V (PHILOSOPhY,OBJECTIVES AND UTILITY SERVICES)</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">PHILOSOPhY AND OBJECTIVES OF THE UNIVERSITY</h5>
</div>
<form>
<div class="form-row" >
 <label class="form-row"for="lawText">Briefly state the Philosophy and Objectives of the University</label>
    <div class="form-group" >
        <textarea class="form-control" id="philosophy" rows="5" cols="60" name="philosophy" required="required"></textarea>
  </div>
  </div>
  
  </div>
  
  



<!-- Second column start here-->
<div class="col second-category" >
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">UTILITY SERVICES</h5>
</div>
<div class="form-row" style="margin-left: 1%;">
 <label class="form-row"for="lawText">Describe the availability of utility services such as water, light, etc. provided by 
itself or Municipal utilities.</label>
    <div class="form-group">
        <textarea class="form-control" id="utility" required="required" rows="3" cols="58" name="utility"></textarea>
  </div>
  </div>

</div>
 
 <div class="form-row">
 <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Save</button>
 </div>
 <div class="col">
<a class="btn btn-primary login-btn" href="vcssf2.php" style=" width: 95%; ">Pevious</a>
 </div>
  <div class="col">
<a class="btn btn-primary login-btn" href="vcssf4.php" style="float: right;margin-right: 4%; width: 95%; ">Next</a>
 </div>
 
 </div>

 </form>
 </div>
 
<!-- first row closing tag-->
</div>
<!-- first div closing tag-->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');?>