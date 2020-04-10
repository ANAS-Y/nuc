
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part IV-V (STUDENTS WELFARE AND EXAMINATION STRUCTURE OF THE PROGRAMME)</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">STUDENTS WELFARE</h5>
</div>
<form>
<div class="form-row" >
 <label class="form-row"for="history">Discribe how the programme/sub-discipline/discipline structured it's Students Welfare.
 the description should highlight (a)  Handling of academic grievances (b)  Student academic advising. </label>
    <div class="form-group" >
        <textarea class="form-control" id="history" rows="5" cols="60" name="welfare" required="required"></textarea>
  </div>
  </div>
  
  </div>
  
  



<!-- Second column start here-->
<div class="col second-category" >
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">THE PROGRAMM EXAMINATION STRUCTURE</h5>
</div>
<div class="form-row" style="margin-left: 1%;">
 <label class="form-row"for="lawText">Discribe how the programme/sub-discipline/discipline structured it's Examination
the description should highlight the Setting, conduct, evaluation schemes, moderation schemes internal 
and external for degree examinations and the issuance of results.</label>
    <div class="form-group">
        <textarea class="form-control" id="administration" required="required" rows="3" cols="58" name="administration"></textarea>
  </div>
  </div>

</div>
 
 <div class="form-row">
 <div class="col">
 <a class="btn btn-primary login-btn" href="hodssf1.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>

 </div>

  <div class="col">
  <button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Next</button>

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