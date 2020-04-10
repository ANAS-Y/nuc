
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">ACCREDITATION PANEL REPORT FORM (APENDIX F)</h3>
<h6 style="text-align: center;">UPLOADING OF FILES</h6>
<h6 style="text-align: center;">Upload Names and Signatures file </h6>
</div>

  

  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >
<div class="card-title " >
<h5 style="text-align: center;">PANEL MEMBERS LIST (With Names, Signatures and Date) </h5>  
</div>
<form>
 <div class="form-row" style="margin-left: 1%;">
  <div class="form-group" style="float: right;color: red;" id="lawUpload" >
    <label for="panelList">Attach a scan copy of Panel Members List(With Names, Signatures and Date)<br /> *.PDF or *.doc </label>
    <input type="file" class="form-control-file" id="panelListn" name="panelyList">
  </div>
  </div>
</div>
</div>
<br />


<!-- Second column start here-->
<div class="col" >
<div class="card form-category" >

<div class="card-title " >
<h5 style="text-align: center;">VC s, HOD s AND DEAN LIST (With Names, Signatures and Date) </h5>  
</div>

 <div class="form-row" style="margin-left: 1%;">
  <div class="form-group" style="float: right;color: red;" id="lawUpload" >
    <label for="universityList">Attach a scan copy of VC/DEAN/HOD List List(With Names, Signatures and Date) *.PDF or *.doc </label>
    <input type="file" class="form-control-file" id="universityList" name="universityList">
  </div>
  </div>
  
  
 <div class="form-row">
 <div class="col">
 <a class="btn btn-primary login-btn" href="panelrf9.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>
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

<!-- first div closing tag-->
</div>
</div>
</div>
</div>
<!-- Container closing tag-->

<?php require ('footer.inc');?>