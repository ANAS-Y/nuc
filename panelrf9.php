
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">ACCREDITATION PANEL REPORT FORM (APENDIX F)</h3>
<h6 style="text-align: center;">Summary of Panel s Findings</h6>
<h6 style="text-align: center;">"J" Library Books, Journals and other Resource Materials including e-brary </h6>
</div>

  

  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >
<div class="card-title " >
<h5 style="text-align: center;">PANEL MEMBERS SUBMITED REPORT</h5>
<h6 style="text-align:center;">Library Books Submited report</h6>  
</div>
<form>
 
    <div class="form-row" >
      <div class="form-group" >
 <table style="width: 100%; border: solid; border-color: silver;">
<tr>
	<td>STATUS</td>
	<td>SCORE</td>
	<td>COMMENTS</td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
</tr>
</table>
  </div>
  </div>

</div>
</div>
<br />


<!-- Second column start here-->
<div class="col" >
<div class="card form-category" >

<div class="card-title ">
<h5 style="text-align: center;">Library Books</h5>
<h6 style="text-align:center;">The Library Books of the Programme</h6>  
</div>
<form>
<div class="form-row" >
     <div class="form-group" >
        <textarea class="form-control" id="curriculum" rows="6" cols="60" name="objectives" required="required"> 
</textarea>
  </div>
  </div>
  
 <div class="form-row">
 <div class="col">
 <a class="btn btn-primary login-btn" href="panelrf8.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>
 </div>
 <div class="col">
 <button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; " onclick="score()">Next</button>
</div>
 </div>
<br />
 </form>
 </div>
 </div>
 
<!-- first row closing tag-->
 </div>
<!-- first div closing tag-->
</div>
</div>
</div>
<!-- Container closing tag-->

<?php require ('footer.inc');?>