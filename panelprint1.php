<?php 
require ('admin.header.inc');
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card p-5" >
<div class="card-title">
<h5 style="text-align:center;" id="un">PRINT OF SUBMITED SELF-STUDY FORM</h5>
</div>
<!-- first div title--> 
<select class="form-control" id="unControl" onchange="printPanel(this.value)" >
<option>Please Select University</option>
<?php
include_once("connection.php");
$sql2 = "SELECT * FROM `universityinfo_ssf`";
if (!mysqli_query($db_link,$sql2)){die("Faild  to check the university info" . mysqli_error($db_link));}
$result2 = mysqli_query($db_link,$sql2);
while($fetch2 = mysqli_fetch_assoc($result2)){
  $University = $fetch2["universityName"];
$universityID = $fetch2["universityID"];


  //echo'<a class="dropdown-item"    ></a>';
  echo'<option value="'.$universityID.'" id="unName" >'. $University.'</option>'; 
}
	
?>           
  </select>
  </div>      
<?php
$universityID = $_SESSION["universityID"];
$sql = "SELECT* FROM programme_apply WHERE universityID ='$universityID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programmes" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
 $numRow =  mysqli_num_rows($result); 
 
if ($numRow >0 ){
    
    echo'<div class="row">
<!-- Third column start here-->
<div class="col card form-category" id="filled-section"  style="font-size:11px;">
<h5 style="text-align:center;" id="un">'.$_SESSION["universityName"].'</h5>
<div id="forms" style="background-color:#7CC68D; color: white;font-size:8px;">
</div>';
?>

<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<select required class="form-control"  name="accID">
	<option value="">Select Program</option>
	
    <?php while($fetch=mysqli_fetch_assoc($result) ){
        $accreditationID = $fetch['accreditationID'];
        $program = $fetch['programme'];
        echo'<option value="'.$accreditationID.'">'.$program.'</option>';
    }
    }?>
  <td><input type="submit"class="btn btn-lg btn-success" value="Print"   /> </td>
  </select>
 </form>
 </tr>
 </table>
 </div>
</div>
</div>
</div>
</div>
</div>

<!-- first div closing tag-->
<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
    } 
$accreditationID = input_check($_POST["accID"]);
$_SESSION['accreditationID']=$accreditationID;
//header('location:printpanelReport.php');
?>
<script type="text/javascript">
window.location="printadminssf.php"
</script>
<?php
              }
require ('footer.inc');
$_SESSION["msg"]='';
?>
</div>
<!-- Container closing tag-->

