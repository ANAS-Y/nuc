<?php require ('admin.header.inc');
$_SESSION['MSG']='';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
}
$accID = input_check($_POST["accID"]);
$email =  input_check($_POST["email"]);
$fname = input_check($_POST["vcFname"]);
$Lname = input_check($_POST["vcLname"]);
$Oname = input_check($_POST["vcOname"]);
$Telephone = input_check($_POST["phone"]);
$position = input_check($_POST["position"]);
$ID= $Telephone.rand(10,99);
$password= sha1($ID);
include_once("connection.php");
            /* Performing SQL query */
$sql = "SELECT * FROM `panelmembers` WHERE  email ='$email'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check Panel Member email" . mysqli_error($db_link));}   
$result = mysqli_query($db_link,$sql);
if(mysqli_num_rows($result) > 0){
     $_SESSION["MSG"]='Member with this email Already exist';
    }
    else {
$sql = "INSERT INTO `panelmembers`(`firstName`, `surname`, `otherName`, `position`, `email`, `telephone1`, `password`, `accreditationID`,ID)
 VALUES ('$fname','$Lname','$Oname','$position','$email','$Telephone','$password','$accID','$ID')";
if (!mysqli_query($db_link,$sql)){die("Faild  to Insert Panel Member details" . mysqli_error($db_link));}   

        $_SESSION["MSG"]='Panel Member Added Sucessfully'; 
    }
    }
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">ADDING ACCREDITATION PANEL MEMBERS</h3>
</div>

<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class="card form-category" >

<div class="card-title ">
<h5 style="text-align: center;">Member of Panel Details</h5>
<h5 style="text-align:center;color: red;"><?php echo $_SESSION["MSG"]; ?></h5>

</div>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<div class="form-row">
    <div class="col">
      <input type="text" id="accID" name="accID" required="required" class="form-control" placeholder="Accreditation ID">
      </div>
      
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
      <select id="position" name="position" required="required"class="form-control" placeholder="Position">
      <option>Member</option>
      <option>Chairman</option>
      </select>
      </div>
</div

</div>
 
 <div class="form-row">
 <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin:2%;margin-left:35%; width:30%; ">ADD PANEL MEMBER</button>
 </div>
<br />
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