
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part VI-VII (PROCESSES OF CURRICULUM DESIGN AND UPDATING)</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">PROCESSES OF CURRICULUM DESIGN</h5>
</div>
<form>
<div class="form-row" >
 <label class="form-row"for="curriculum">Briefly explain the basis for and process of curriculum development for the 
Degree Programmes offered by the University</label>
    <div class="form-group" >
        <textarea class="form-control" id="curriculum" rows="5" cols="60" name="curriculum" required="required"></textarea>
  </div>
  </div>
  
  </div>
  
  



<!-- Second column start here-->
<div class="col second-category" >
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">UPDATING CURRICULA OF PROGRAMMES</h5>
</div>
<div class="form-row" style="margin-left: 1%;">
 <label class="form-row"for="curricula">Explain briefly the provision made by the University for updating the curriculum 
of each programme offered.</label>
    <div class="form-group">
        <textarea class="form-control" id="curricula" required="required" rows="3" cols="58" name="curricula"></textarea>
  </div>
  </div>

</div>
 
 <div class="form-row">
 <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Save</button>
 </div>
 <div class="col">
<a class="btn btn-primary login-btn" href="vcssf3.php" style=" width: 95%; ">Pevious</a>
 </div>
  <div class="col">
<a class="btn btn-primary login-btn" href="vcssf5.php" style="float: right;margin-right: 4%; width: 95%; ">Next</a>
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