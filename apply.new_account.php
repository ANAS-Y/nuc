
<?php
$_SESSION["msg"]="";
	 require ('mainHeader.inc');
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h4 style="text-align: center; font-family: fantasy;color:#2C7337 ;">VC SIGN UP AREA</h4>
<h6 style="text-align: center; font-family: fantasy;color:#2C7337 ;"><?php $_SESSION['msg']?></h6>
</div>

 
 
<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">University Information</h5>
</div>
<form name="requestForm" action="submitSignup.php" method="post" enctype="multipart/form-data" autocomplete="on">
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
      <input type="text" id="pTelphone1" name="pTelphone1" required="required" class="form-control" placeholder="Proprietor's Office Telephone">
      </div>
      <div class="col">
      <input type="text" id="pTelphone2" name="pTelphone2" required="required"class="form-control" placeholder=" Proprietor's Home Telephone">
      </div>
   </div>
    <div class="form-row">
    <label class=" col text-responsive" >Has the University been established pursuant to a federal 
    law (Degree)or state law (edict)? <label class="form-check-label" for="Yes"> Yes</label>
    <input class="" type="radio" name="Yess" id="Yes" required="required" value="Yes" onclick="lawYes()"/>
    
    <label class="form-check-label" for="No"> No</label>
    <input class="" type="hidden" name="Plaw" id="Plaw"  required="required" onclick="lawNo()"/>
    <input class="" type="radio" name="Noo" id="No" value="No" required="required" onclick="lawNo()"/>
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
  <br />
  <div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">Vice Chancellor's Information</h5>
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
      <input type="email" id="email" name="email" required="required" class="form-control" placeholder="Email">
      </div>
      <div class="col">
      <input type="text" id="phone" name="phone" required="required"class="form-control" placeholder="Phone Number">
      </div>
    <div class="col">
      <input type="text" id="Qualification" name="Qualification" required="required"class="form-control" placeholder="Highest Qualification">
      </div>
  </div>
  <div class="form-row">
      <div class="col">
      <input type="password" id="pwd" name="pwd" required="required"class="form-control" placeholder="password" >
      </div>
      <div class="col">
      <input type="password" onmouseout="confirmPassword()" id="cpwd" name="cpwd" required="required"class="form-control" placeholder="Confirm password">
      </div>
      </div>
      
      <div class="form-row">
       <div class="col">
      <select id="squestion" class="form-control" name="squestion">
        <option selected>Secuirity Question</option>
        <option>Who is your Mentor?</option>
        <option>What is your pet Name?</option>
        <option>who is your best friend?</option>
      </select>
    </div>
      <div class="col">
      <input type="password" id="sanswer" name="sanswer" required="required"class="form-control" placeholder="answer to secuiry Question">
      </div>
      </div>
      <div class="form-row">
      <label id="msg" style="color: red;">Password must be more than 5 characters</label>
      </div>
  </div>
</div>
<div class="form-row">
<button type="submit" class="btn btn-primary login-btn" style="margin-left: 38%;margin-bottom:1% ;">Submit</button>
 </div>
 </form>
<!-- first div closing tag -->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');?>