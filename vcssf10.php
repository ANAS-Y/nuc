
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part XVIII-IX (STAFF DEVELOPMENT PROGRAMME,STUDENT ADMISSION AND GRADUATION POLICY )</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">STAFF DEVELOPMENT PROGRAMME</h5>
</div>
<form>
<div class="form-row" >
 <label class="form-row"for="staffDevelopment">Describe any scheme of staff development by the University for upgrading and 
updating academic and other staff in specialized fields they are teaching and if this 
privilege is extended to all Departments including the Department offering the 
programme to be accredited.</label>
    <div class="form-group" >
        <textarea class="form-control" id="staffDevelopment" rows="5" cols="60" name="staffDevelopment" required="required"></textarea>
  </div>
  </div>
  
  </div>
  
  



<!-- Second column start here-->
<div class="col second-category" >
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">STUDENT ADMISSION AND GRADUATION POLICY </h5>
</div>
<div class="form-row" style="margin-left: 1%;">
 <div class="form-group" >
        Print and fill the STUDENT ADMISSION AND GRADUATION POLICY  from 
    the Accreditation Manual on page 40-48,then scan and Upload it below.
  </div>
    <div class="form-group">
        <div class="form-group" style="float: right;color: red;" id="lawUpload" >
    <label for="admission">Attach a scan copy of the Student Admission And Graduation Policy only 
    *.PDF or *.doc Format accepted</label>
    <input type="file" class="form-control-file" id="admission" name="admission">
  </div>
  </div>
  </div>

</div>
 
 <div class="form-row">
 <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Save</button>
 </div>
 <div class="col">
<a class="btn btn-primary login-btn" href="vcssf9.php" style=" width: 95%; ">Pevious</a>
 </div>
  <div class="col">
<a class="btn btn-primary login-btn" href="vcssf.submit.php" style="float: right;margin-right: 4%; width: 95%; ">Next</a>
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