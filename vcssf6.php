
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part X-XI (AQUISION POLICY AND PROFFESSIONAL SERVICES OFFERED BY THE LIBRARY)</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">LIBRARY AQUISION POLICY</h5>
</div>
<form>
<div class="form-row" >
 <label class="form-row"for="apolicy">Indicate how the Library is organized to effectively cope with its smooth 
administration and use (include organization chart).</label>
    <div class="form-group" >
        <textarea class="form-control" id="apolicy" rows="5" cols="60" name="apolicy" required="required"></textarea>
  </div>
  </div>
  
  </div>
  
  



<!-- Second column start here-->
<div class="col second-category" >
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">PROFFESSIONAL SERVICES OFFERED BY THE LIBRARY</h5>
</div>
<div class="form-row" style="margin-left: 1%;">
 <label class="form-row"for="services">Describe briefly the services offered by the library including deliberate efforts 
made to ensure maximum use of the library by both staff and students.</label>
    <div class="form-group">
        <textarea class="form-control" id="services" required="required" rows="3" cols="58" name="services"></textarea>
  </div>
  </div>

</div>
 
 <div class="form-row">
 <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Save</button>
 </div>
 <div class="col">
<a class="btn btn-primary login-btn" href="vcssf5.php" style=" width: 95%; ">Pevious</a>
 </div>
  <div class="col">
<a class="btn btn-primary login-btn" href="vcssf7.php" style="float: right;margin-right: 4%; width: 95%; ">Next</a>
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