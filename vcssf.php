
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part I (GENERAL INFORMATION ON UNIVERSITY)</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">University Information</h5>
</div>
<form>
<div class="form-row">
    <div class="col">
      <input type="text"name="schoolName" required="requird" id="schoolName"class="form-control" placeholder="University Name">
    </div>
    </div>
    <div class="form-row">
    <div class="col-sm-8">
    <input type="text"name="address" required="requird" id="address"class="form-control" placeholder="University Address">
      </div>
    <div class="col-sm-4">
    <input type="text"name="telephone" required="requird" id="telephone"class="form-control" placeholder="Telephone">
      </div>
  </div>
  <div class="form-row">
  <p class=" col-sm-3 text-responsive" >Date Founded</p>
    <div class="col-sm-3">
      <input type="date" class="form-control" required="required"  id="fdate"name="fdate">
    </div>
    <div class="col">
      <input type="text" id="pname" name="pname" required="required" class="form-control" placeholder="University Proprietor's Full Name">
      </div>
  </div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="pTelphone1" name="ptelphone2" required="required" class="form-control" placeholder="Proprietor's Office Telephone">
      </div>
      <div class="col">
      <input type="text" id="pTelphone2" name="pTelphone2" required="required"class="form-control" placeholder=" Proprietor's Home Telephone">
      </div>
   </div>
    <div class="form-row">
    <label class=" col text-responsive" >Has the University been established pursuant to a federal 
    law (Degree)or state law (edict)? <label class="form-check-label" for="Yes"> Yes</label>
    <input class="" type="radio" name="Yes" id="Yes" value="Yes" onclick="lawYes()"/>
    
    <label class="form-check-label" for="No"> No</label>
    <input class="" type="radio" name="No" id="No" value="No" onclick="lawNo()"/>
  </label>
  </div>
  <div class="form-group" hidden="hidden"style="float: right;" id="lawUpload" >
    <label for="lawCopy">Upload Law(Edict) Copy</label>
    <input type="file" class="form-control-file" id="lawCopy" name="lawCopy">
  </div>
   <div class="form-group" hidden="hidden" id="lawText">
    <label for="lawText">Explained steps being taken by proprietor for not establishe pursuant to a law</label>
    <textarea class="form-control" id="lawText2" rows="3" name="lawText"></textarea>
  </div>
  </div>
  



<!-- Second column start here-->
<div class="col second-category " >
<div class="card form-category" >

<div class="card-title ">
<h5 style="text-align: center;">Vice-Chancellor's Information</h5>
</div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="vcFame" name="vcFname" required="required" class="form-control" placeholder="First name">
      </div>
      <div class="col">
      <input type="text" id="vcLame" name="vcLname" required="required"class="form-control" placeholder=" Surname">
      </div>
    <div class="col">
      <input type="text" id="vcOname" name="vcOname" required="required"class="form-control" placeholder="Other name">
      </div>
  </div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="vcTelephone1" name="vcTelephone1" required="required" class="form-control" placeholder="Office Telephone">
      </div>
      <div class="col">
      <input type="text" id="Telephone" name="vcTelephone" required="required"class="form-control" placeholder="Home Telephone">
      </div>
    <div class="col">
      <input type="text" id="Qualification" name="Qualification" required="required"class="form-control" placeholder="Highest Qualification">
      </div>
</div>
<div class="form-row">
    <div class="col">
      <input type="text" id="vcAddress" name="vcAddress" required="required" class="form-control" placeholder="Vice-chancellor Home Address">
      </div>
      </div>
<div class="form-row">
      <label class="col"id="msg" style="color: red;margin:auto ;text-align: center;">Click Save before you procced!</label>
      </div>

</div>
 
 <div class="form-row">
 <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Save</button>
 </div>
 <div class="col">
<a class="btn btn-primary login-btn" href="vcssf2.php" style="float: right;margin-right: 4%; width: 95%; ">Next</a>
 </div>
 </div>

 </form>
 </div>
 </div>
 
<!-- first row closing tag-->
</div>
<!-- first div closing tag-->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');?>