
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part VIII-IX (PHYSICAL FACILITIES)</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">THE CENTRAL LIBRARY AND LENDING POLICY</h5>
</div>
<form>
<div class="form-row">
    <div class="col">
      <input type="text"name="librarinName" required="requird" id="librarinName"class="form-control"
       placeholder="Full Name of highest officer in-charge of the main library">
    </div>
    </div>
   <div class="form-row">
    <div class="col-sm-8">
    <input type="text"name="designation" required="requird" id="designation"class="form-control" placeholder="Designation">
      </div>
    <div class="col-sm-4">
    <input type="text"name="salary" required="requird" id="salary"class="form-control" placeholder="Salary Grade Level">
      </div>
  </div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="floorArea" name="floorArea" required="required" class="form-control" placeholder="Useable floor area in Meter SQuare">
      </div>
      <div class="col">
      <input type="text" id="population" name="population" required="required"class="form-control" placeholder=" Student population served">
      </div>
   </div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="sittingCapacity" name="sittingCapacity" required="required" class="form-control" placeholder="Sitting Capacity">
      </div>
      <div class="col">
      <input type="text" id="population" name="opening" required="required"class="form-control" placeholder=" Opening Hours">
      </div>
      <div class="col">
      <input type="text" id="closing" name="closing" required="required"class="form-control" placeholder=" Closing Hours">
      </div>
   </div>
    <div class="form-row">
    <div class="col">
      <input type="text" id="staffPolicy" name="staffPolicy" required="required" class="form-control" placeholder="Lending Policy For academic staff">
      </div>
      <div class="col">
      <input type="text" id="studentPolicy" name="studentPolicy" required="required"class="form-control" placeholder=" Lending Policy For students">
      </div>
   </div>
  
  </div>
  
  



<!-- Second column start here-->
<div class="col second-category" >
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">LIST OF BOOKS</h5>
</div>
<div class="form-row" style="margin-left: 1%;">
 <label class="form-row"for="books">List all books, journals and related facilities for: 
(1) General reading 
(2) General education 
(3) Degree programmes 
(4) Programme to be accredited. </label>
    <div class="form-group">
        <textarea class="form-control" id="books" required="required" rows="3" cols="58" name="books"></textarea>
  </div>
  </div>

</div>
 
 <div class="form-row">
 <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Save</button>
 </div>
 <div class="col">
<a class="btn btn-primary login-btn" href="vcssf4.php" style=" width: 95%; ">Pevious</a>
 </div>
  <div class="col">
<a class="btn btn-primary login-btn" href="vcssf6.php" style="float: right;margin-right: 4%; width: 95%; ">Next</a>
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