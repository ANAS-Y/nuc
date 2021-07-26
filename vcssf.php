
<?php require ('vcheader1.inc');
$accreditationID=$_SESSION['universityID'];
?>
<?php
	include_once("connection.php");
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
  $sql = "SELECT * FROM universityinfo_ssf,vcinformation_ssf
   WHERE universityinfo_ssf.universityID ='$accreditationID' AND vcinformation_ssf.universityID= '$accreditationID'
 ";
             if (!mysqli_query($db_link,$sql)){
  die("Faild  to check the existance of request" . mysqli_error($db_link));    
}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
    $result = mysqli_query($db_link,$sql);
    $fetch=mysqli_fetch_assoc($result);
    
    $schoolName = $fetch["universityName"];
       $address = $fetch["universityAddress"];
       $telephone =$fetch["telephone"];
       $foundedDate= $fetch["dateFounded"];
       $proprietor = $fetch["proprietorsName"];
       $proprietorPhone1 = $fetch["proprietorsTelephone1"];
       $proprietorPhone2 =$fetch["proprietorsTelephone2"];
       $parsuantLaw = $fetch["parsuantLaw"];
       $parsuantEstablishe = $fetch["parsuantEstablishe"];
       $vcFname = $fetch["firstName"];
        $vcLname = $fetch["surname"];
        $vcOname = $fetch["otherName"];
        $email = $fetch["email"];
        $vcPhone =$fetch["telephone1"];
        $vcPhone2 =$fetch["telephone2"];
        $vcQualification = $fetch["qualification"];
         $vcAddress =$fetch["homeAddress"];
}
?>
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
<form action="ssfUpdate1.php" method="post">
<div class="form-row">
    <div class="col">
      <input type="text"name="schoolName" value="<?php echo $schoolName?>" required="requird" id="schoolName"class="form-control" placeholder="University Name">
    </div>
    </div>
    <div class="form-row">
    <div class="col-sm-8">
    <input type="text"name="address" value="<?php echo $address ?> "required="requird" id="address"class="form-control" placeholder="University Address">
      </div>
    <div class="col-sm-4">
    <input type="text"name="telephone" value="<?php echo $telephone ?> "required="requird" id="telephone"class="form-control" placeholder="Telephone">
      </div>
  </div>
  <div class="form-row">
  <p class=" col-sm-3 text-responsive" >Date Founded</p>
    <div class="col-sm-3">
      <input type="date" class="form-control" value="<?php echo $foundedDate ?> "required="required"  id="fdate"name="fdate">
    </div>
    <div class="col">
      <input type="text" id="pname" name="pname" required="required" value="<?php echo $proprietor ?>" class="form-control" placeholder="University Proprietor's Full Name">
      </div>
  </div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="pTelphone1" name="pTelphone1" required="required" value="<?php echo $proprietorPhone1  ?> "class="form-control" placeholder="Proprietor's Office Telephone">
      </div>
      <div class="col">
      <input type="text" id="pTelphone2" name="pTelphone2" required="required"class="form-control" value="<?php echo  $proprietorPhone2?>" placeholder=" Proprietor's Home Telephone">
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
    <textarea class="form-control" id="lawText2" rows="3" name="lawText"> <?php echo $parsuantEstablishe ?></textarea>
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
      <input type="text" id="vcFame" name="vcFname" value="<?php echo $vcFname  ?>" required="required" class="form-control" placeholder="First name">
      </div>
      <div class="col">
      <input type="text" id="vcLame" name="vcLname" value="<?php echo $vcLname ?>" required="required"class="form-control" placeholder=" Surname">
      </div>
    <div class="col">
      <input type="text" id="vcOname" name="vcOname"value="<?php echo $vcOname  ?>"  class="form-control" placeholder="Other name">
      </div>
  </div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="vcTelephone1" name="vcTelephone1" value="<?php echo $vcPhone  ?>" required="required" class="form-control" placeholder="Office Telephone">
      </div>
      <div class="col">
      <input type="text" id="Telephone" name="vcTelephone" value="<?php echo $vcPhone2  ?>" required="required"class="form-control" placeholder="Home Telephone">
      </div>
    <div class="col">
      <input type="text" id="Qualification" name="Qualification" value="<?php echo $vcQualification ?>" required="required"class="form-control" placeholder="Highest Qualification">
      </div>
</div>
<div class="form-row">
    <div class="col">
      <input type="text" id="vcAddress" name="vcAddress" required="required" value="<?php echo $vcAddress  ?>" class="form-control" placeholder="Vice-chancellor Home Address">
      </div>
      </div>

</div>
 
 <div class="form-row">
 <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Update</button>
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