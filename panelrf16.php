
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">ACCREDITATION PANEL REPORT FORM (APENDIX F)</h3>
<h6 style="text-align: center;">RECOMMENDATION OF THE PANEL ON THE ACCREDITATION STATUS TO BE ACCORDED THE PROGRAMME</h6>
</div>

  

  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >
<div class="card-title " >
<h5 style="text-align: center;">ACCREDITATION STATUS</h5>  
</div>
<form>
 
 <table style="margin:auto;">
   <tr>
     <td>ACCREDITATION STATUS</td>
     
     <td>TOTAL % SCORE</td>
   </tr>
    <tr>
     <td> </td>
     <td></td>
     

 </table>
 <div class="form-row" style="margin-left: 1%">
 <label class="form-row"for="history">Please highlight below the major deficiencies identified.</label>
    <div class="form-group" >
        <textarea class="form-control" id="history" rows="4" cols="60" name="history" required="required"></textarea>
  </div>
  </div>
</div>
</div>

<br />


<!-- Second column start here-->
<div class="col" >
<div class="card form-category" >

<div class="card-title ">
<h5 style="text-align: center;">NAME AND DECLARATION OF THE PANEL CHAIRMAN </h5>
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
  <label class="col-sm-3" >Date Submited</label>
  <div class="col">
      <input type="date" id="date" name="date"  required="required"class="form-control" placeholder="date">
      </div>
</div>
  <div class="form-row" style="margin-left:0%;">
      <div class="col"><input type="checkbox"  checked="checked" name="remember"> <label for="remeber" >I Confirmed that the Information
      provided Here are correct</label></div>
     
    </div>

  
  
 <div class="form-row">
 <div class="col">
 <a class="btn btn-primary login-btn" href="panelrf15.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>
 </div>
 <div class="col">
 <button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; " >Submit</button>
</div>
 </div>
<br />
 </form>
 </div>
 </div>
 
<!-- first row closing tag-->

<!-- first div closing tag-->
</div>
</div>
</div>
</div>
<!-- Container closing tag-->

<?php require ('footer.inc');?>