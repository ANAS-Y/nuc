<?php require ('panelheader1.inc');
$accreditationID=$_SESSION['accreditationID'];
$ID = $_SESSION['ID'];
if( $_SESSION["position"]="Chairman" ){ 
    }
    else{
        header('location:panelpef.php');
    }
?>
<div class="container-fluid" >
<!-- first div start here-->
<div class="col card" style="height:300px; color: white;">
<!-- first div title-->

<div class="row" >
<!-- first column start here-->

<div class=" card form-category"  >

<a class="btn btn-success " href="panelpef.php"> SUBMIT PROGRAMME EVALUATION FORM</a>

</div>
 
 <div class="col card form-category">
 <a class="btn btn-danger " href="panelpef.summary.php">Submit Panel Report Forms</a>
</div>

<br />
 </form>
 </div>
 
<!-- first row closing tag-->
 </div>
<!-- first div closing tag-->
</div>
<!-- Container closing tag-->

<?php require ('footer.inc');?>