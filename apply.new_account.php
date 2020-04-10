<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h4 style="text-align: center; font-family: fantasy;color:#2C7337 ;">VC SIGN UP AREA</h4>
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
    <div class="col">
      <select id="type" class="form-control" name="uniType" >
        <option selected>Select University type</option>
        <option>Public</option>
        <option>Private</option>
      </select>
    </div>
    <div class="col">
      <select id="owner" class="form-control" name="owner">
        <option selected>Select Owner</option>
        <option>Federal government</option>
        <option>Stategovernment</option>
        <option>Organisation</option>
        <option>Private Individual</option>
        <option>Other</option>
      </select>
    </div>
     <div class="col">
      <select id="category" class="form-control" name="category">
        <option selected>Select Category </option>
        <option>Conventional</option>
        <option>Technology</option>
        <option>Agriculture</option>
        <option>Other</option>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="col-5">
      <input type="text" class="form-control" required="required" name="city" id="city" placeholder="City">
    </div>
    <div class="col">
    <select id="state" class="form-control" >
        <option selected>Select state</option>
        <option>...</option>
      </select>
          </div>
    <div class="col">
      <input type="text" class="form-control" required="required" id="code" name="code" placeholder="University Code">
    </div>
  </div>
  
  <div class="form-row">
    <div class="col">
    <label for="edate" class="text-responsive" >Date Established
      <input type="date" class="form-control" required="required" placeholder="Established Date" id="edate"name="edate">
      </label>
    </div>
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
      <input type="email" id="email" name="vcFname" required="required" class="form-control" placeholder="Email">
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
      <input type="password" id="pwd" name="pwd" required="required"class="form-control" placeholder="password">
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
<!-- first div closing tag -->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');?>