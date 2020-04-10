
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part II-III (ORGANISATION, ADMINISTRATION AND CONTROL)</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">OWNERSHIP AND CONTROL </h5>
</div>
<form>
<div class="form-row" >
 <label class="form-row"for="lawText">Describe below the ownership and system of control of the University. The description should also include the membership and role of the governing 
council and senate/Academic board/board of studies.</label>
    <div class="form-group"  id="ownership">
        <textarea class="form-control" id="ownership" rows="5" cols="60" name="ownership" required="required"></textarea>
  </div>
  </div>
  
  </div>
  
  



<!-- Second column start here-->
<div class="col second-category" >
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">ORGANISATION AND ADMINISTRATION</h5>
</div>
<div class="form-row" style="margin-left: 1%;">
 <label class="form-row"for="lawText">Describe below the major components of the University; attach the current organizational structure  in 
relation to  the  programme to be accredited</label>
    <div class="form-group"  id="ownership">
        <textarea class="form-control" id="ownership" required="required" rows="2" cols="52" name="ownership"></textarea>
  </div>
  <div class="form-group" style="float: right;" id="lawUpload" >
    <label for="organisationChat">Upload image diagram of Organisation Structure  </label>
    <input type="file" class="form-control-file" id="organisationChat" name="organisationChat">
  </div>
  </div>

</div>
 
 <div class="form-row">
 <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Save</button>
 </div>
 <div class="col">
<a class="btn btn-primary login-btn" href="vcssf.php" style=" width: 95%; ">Pevious</a>
 </div>
  <div class="col">
<a class="btn btn-primary login-btn" href="vcssf3.php" style="float: right;margin-right: 4%; width: 95%; ">Next</a>
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