
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part XVI-XVII (RECRUITMENT, RETENTION, DISMISSAL,WELFARE AND HEALTH FACILITIES)</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">HEALTH FACILITIES</h5>
</div>
<form>
<div class="form-row" >
 <label class="form-row"for="health">Describe the health care delivery system maintained by the University or other 
facilities for the benefit of both staff and students.</label>
    <div class="form-group" >
        <textarea class="form-control" id="health" rows="5" cols="60" name="health" required="required"></textarea>
  </div>
  </div>
  
  </div>
  
  



<!-- Second column start here-->
<div class="col second-category" >
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">RECRUITMENT, RETENTION, DISMISSAL AND WELFARE</h5>
</div>
<div class="form-row" style="margin-left: 1%;">
 <label class="form-row"for="recruitment">Briefly describe the University s policy on staff recruitment, promotion, retention, 
dismissal, termination and welfare. </label>
    <div class="form-group">
        <textarea class="form-control" id="recruitment" required="required" rows="3" cols="58" placeholder="Also discuss the main highlights of the 
University s staff working conditions " name="recruitment"></textarea>
        <div class="form-group" style="float: right;color: red;" id="lawUpload" >
    <label for="condition">Attach a copy of the current written conditions of service (if any) *.PDF or *.doc </label>
    <input type="file" class="form-control-file" id="condition" name="condition">
  </div>
  </div>
  </div>

</div>
 
 <div class="form-row">
 <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Save</button>
 </div>
 <div class="col">
<a class="btn btn-primary login-btn" href="vcssf8.php" style=" width: 95%; ">Pevious</a>
 </div>
  <div class="col">
<a class="btn btn-primary login-btn" href="vcssf10.php" style="float: right;margin-right: 4%; width: 95%; ">Next</a>
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