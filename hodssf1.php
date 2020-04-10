
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part II-III (HISTORY AND ADMINISTRATION OF THE PROGRAMME)</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">HISTORY OF THE PROGRAMME</h5>
</div>
<form>
<div class="form-row" >
 <label class="form-row"for="history">Write  below, a brief history of the development of the programme/sub-
dicipline/Discipline to be accredited. </label>
    <div class="form-group" >
        <textarea class="form-control" id="history" rows="5" cols="60" name="history" required="required"></textarea>
  </div>
  </div>
  
  </div>
  
  



<!-- Second column start here-->
<div class="col second-category" >
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">ADMINISTRATION OF THE PROGRAMM</h5>
</div>
<div class="form-row" style="margin-left: 1%;">
 <label class="form-row"for="lawText">Discribe how the programme/sub-discipline/discipline structured it's Personnel Administration.
 The description should highlight the following:(a)Organization structure (Upload charts if necessary) 
(b)How staff are involved in the decision-making process and in general administration. 
(c)Policy and practice on staff development 
(d)Staff promotion</label>
    <div class="form-group">
        <textarea class="form-control" id="administration" required="required" rows="3" cols="58" name="administration"></textarea>
<label for="chart" style="color: red;">Upload Chart If Necessary</label>
<div style="float: right;color: red;" id="lawUpload" >
    <input type="file" class="form-control-file" id="chart" name="chart">
</div>
  </div>
  </div>

</div>
 
 <div class="form-row">
 <div class="col">
 <a class="btn btn-primary login-btn" href="hodssf.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>

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