<?php
	session_start();
$accreditationID = $_SESSION['accreditationID'];
$universityID=$_SESSION['universityID'];
	include_once("connection.php");
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
$sql = "SELECT * FROM `panelreport_summary` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}
if(mysqli_num_rows(mysqli_query($db_link,$sql)) <=0){   
    $_SESSION["msg"]='Complete Panel Report Not Yet Submited by the Chairman of the Panel!';
   header('location:admin.home.php');
   echo 'Panel Report Not Submited Yet!';
}

$sql = "SELECT * FROM `panelreport` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check panel report" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$numb=mysqli_num_rows($result);


if($numb>0){
      
$academicContent=0;
$employersrating=0;
$funding=0;
$library=0;
$staffing=0;
$physicalfacilities=0;

while($fetch=mysqli_fetch_assoc($result)){    
$academicContent = $fetch["academicContent"]+ $academicContent;        
$employersrating = $fetch["employersRating"]+ $employersrating;        
$funding = $fetch["funding"]+$funding;       
$library = $fetch["library"]+ $library;      
$physicalfacilities = $fetch["physicalFacilities"]+ $physicalfacilities;        
$staffing = $fetch["staffing"]+ $staffing;  

$academicContent1 = $fetch["academicContent"];        
$employersrating1 = $fetch["employersRating"];        
$funding1 = $fetch["funding"];       
$library1 = $fetch["library"];      
$physicalfacilities1 = $fetch["physicalFacilities"];        
$staffing1 = $fetch["staffing"];     
}

$total = $academicContent + $employersrating + $funding + $library + $physicalfacilities + $staffing;
$avg1 =$total/6;
$academicContentAvg=$academicContent/$numb;
$employersratingAvg=$employersrating/$numb;
$fundingAvg=$funding/$numb;
$libraryAvg=$library/$numb;
$physicalfacilitiesAvg=$physicalfacilities/$numb;
$staffingAvg=$staffing/$numb;
$avg2 =$total/6;
$totalAvg = $academicContentAvg + $employersratingAvg + $fundingAvg + $libraryAvg + $physicalfacilitiesAvg + $staffingAvg;
}
else{
    $_SESSION["msg"]= "No any Panel Member Submited the Report Yet!";
   //header('panelpef.summary.php');
}
$sql = "SELECT * FROM  visitationdetails_pef WHERE accreditationID= '$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

//if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
  
$universityName = $fetch["universityName"];
$program  = $fetch["titleProgramme"];
$dateFrom  = $fetch["dateFrom"];
$dateTo  = $fetch["dateTo"];
    
//}


require('fpdf.php');

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		// GFG logo image
		$this->Image('images/nuc-header-new2.png', 90, 8, 35);
		
		// Set font-family and font-size
		$this->SetFont('Times','B',20);
		
		// Move to the right
		$this->Cell(80);
		
		// Set the title of pages.
		$this->Cell(30, 80, 'NATIONAL UNIVERSITIES COMMISSION ', 0, 2, 'C');
        
        // Set font format and font-size
        $this->SetFont('Times','B',18);

        // Framed rectangular area
        $this->Cell(30 ,-60 , 'PROGRAMME EVALUATION FORM (NUC/PEF)', 0, 2, 'C');	
		// Break line with given space
		$this->Ln(40);
	}
	
	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		
		// Set font-family and font-size of footer.
		$this->SetFont('Arial', 'I', 8);
		
		// set page number
		$this->Cell(0, 10, 'Page ' . $this->PageNo() .
			'/{nb}', 0, 0, 'C');
	}
    
    // Simple table
public function FillHeadInfo() //$info would be an array of the stuff to fill the small table at the top
     {
          $this->SetY(0); //reset the Y to the original, since we moved it down to write INVOICE
          $this->SetFont('Arial','',12);
          $this->SetFillColor(224,224,224); //Set background of the cell to be that grey color
          $this->Cell(20,12,"S/N",1,0,'C',true);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
          $this->Cell(20,12,"Title",1,0,'C',true);
          $this->Cell(20,12,"Remark",1,1,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
          
          //$this->Cell(20,12,$info['ordernum'],1,0,'C');
          //$this->Cell(20,12,$info['coding'],1,0,'C');
          //$this->Cell(20,12,$info['salescode'],1,1,'C');
          
              }
}

// Create new object.
$pdf = new PDF();
$pdf->AliasNbPages();

// Add new pages
$pdf->AddPage();
 
// Set font-family and font-size.
$pdf->SetFont('Times','',12);
$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'Name of University: '.$universityName.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Title of Programme : '.$program.'', 0, 2, 'L'); 
$pdf->Cell(30, 10, 'Date of Visit: From: '.$dateFrom.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'To: '.$dateTo.'', 0, 2, 'L');
$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'ACADEMIC MATTERS', 0, 2, 'L');

$pdf->SetFillColor(53,162,86); //Set background of the cell to be that grey color
$sql = "SELECT * FROM `academiccontent_pef` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check panel report" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
$i=0;
while($fetch=mysqli_fetch_assoc($result)){ 
  $i=$i+1;  
$content = $fetch["content"]; 
$remark = $fetch["remark"];
$score = $fetch["score"];
$comment = $fetch["comments"];

$pdf->Cell(40,12,"Report No:",1,0,'C',true);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(155,12,'( '.$i.' )',1,1,'C',false);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(40,12,"Title",1,0,'C',true);
$pdf->Cell(155,12,$content,1,1,'C',false);
$pdf->Cell(40,12,"Score",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$score,1,1,'C',false);
$pdf->Cell(40,12,"Comment",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$comment,1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(40,12,"Remark",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$remark,1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(195,12,'',1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this

}       

$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'EMPLOYERS RATING OF GRADUATES', 0, 2, 'L');
$sql = "SELECT * FROM `employersrating_pef` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check panel report" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
$i=0;
while($fetch=mysqli_fetch_assoc($result)){ 
  $i=$i+1;  
$content = $fetch["content"]; 
$remark = $fetch["remark"];
$score = $fetch["score"];
$comment = $fetch["comment"];

$pdf->Cell(40,12,"Report No:",1,0,'C',true);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(155,12,'( '.$i.' )',1,1,'C',false);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(40,12,"Title",1,0,'C',true);
$pdf->Cell(155,12,$content,1,1,'C',false);
$pdf->Cell(40,12,"Score",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$score,1,1,'C',false);
$pdf->Cell(40,12,"Comment",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$comment,1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(40,12,"Remark",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$remark,1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(195,12,'',1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this

}   

$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'FUNDING - FINANCING OF PROGRAMME BY THE UNIVERSITY', 0, 2, 'L');
$sql = "SELECT * FROM `funding_pef` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check panel report" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
$i=0;
while($fetch=mysqli_fetch_assoc($result)){ 
  $i=$i+1;  
$content = $fetch["content"]; 
$remark = $fetch["remark"];
$score = $fetch["score"];
$comment = $fetch["comment"];

$pdf->Cell(40,12,"Report No:",1,0,'C',true);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(155,12,'( '.$i.' )',1,1,'C',false);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(40,12,"Title",1,0,'C',true);
$pdf->Cell(155,12,$content,1,1,'C',false);
$pdf->Cell(40,12,"Score",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$score,1,1,'C',false);
$pdf->Cell(40,12,"Comment",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$comment,1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(40,12,"Remark",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$remark,1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(195,12,'',1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this

}   

$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'LIBRARY: BOOKS, JOURNALS AND OTHER RESOURCE MATERIALS FOR THE 
PROGRAMME ', 0, 2, 'L');
$sql = "SELECT * FROM `library_pef`WHERE accreditationID ='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check panel report" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
$i=0;
while($fetch=mysqli_fetch_assoc($result)){ 
  $i=$i+1;  
$content = $fetch["content"]; 
$remark = $fetch["remark"];
$score = $fetch["score"];
$comment = $fetch["comment"];

$pdf->Cell(40,12,"Report No:",1,0,'C',true);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(155,12,'( '.$i.' )',1,1,'C',false);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(40,12,"Title",1,0,'C',true);
$pdf->Cell(155,12,$content,1,1,'C',false);
$pdf->Cell(40,12,"Score",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$score,1,1,'C',false);
$pdf->Cell(40,12,"Comment",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$comment,1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(40,12,"Remark",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$remark,1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(195,12,'',1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this

}   

$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'PHYSICAL FACILITIES', 0, 2, 'L');
$sql = "SELECT * FROM `physicalfacilities_pef` WHERE accreditationID ='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check panel report" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
$i=0;
while($fetch=mysqli_fetch_assoc($result)){ 
  $i=$i+1;  
$content = $fetch["content"]; 
$remark = $fetch["remark"];
$score = $fetch["score"];
$comment = $fetch["comment"];

$pdf->Cell(40,12,"Report No:",1,0,'C',true);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(155,12,'( '.$i.' )',1,1,'C',false);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(40,12,"Title",1,0,'C',true);
$pdf->Cell(155,12,$content,1,1,'C',false);
$pdf->Cell(40,12,"Score",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$score,1,1,'C',false);
$pdf->Cell(40,12,"Comment",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$comment,1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(40,12,"Remark",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$remark,1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(195,12,'',1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this

}   
$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'STAFFING (TEACHING AND NON-TEACHING STAFF) ', 0, 2, 'L');
$sql = "SELECT * FROM `staffing_pef` WHERE accreditationID ='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check panel report" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
$i=0;
while($fetch=mysqli_fetch_assoc($result)){ 
  $i=$i+1;  
$content = $fetch["content"]; 
$remark = $fetch["remark"];
$score = $fetch["score"];
$comment = $fetch["comment"];

$pdf->Cell(40,12,"Report No:",1,0,'C',true);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(155,12,'( '.$i.' )',1,1,'C',false);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(40,12,"Title",1,0,'C',true);
$pdf->Cell(155,12,$content,1,1,'C',false);
$pdf->Cell(40,12,"Score",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$score,1,1,'C',false);
$pdf->Cell(40,12,"Comment",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$comment,1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(40,12,"Remark",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(155,12,$remark,1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
}   
$pdf->Cell(195,12,'',0,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(195,12,'PANEL MEMBERS ACCREDITATION REPORT SUMMARY',1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this



$pdf->Cell(15,12,"SN",1,0,'C',true);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(35,12,"Academic Content",1,0,'C',true);
$pdf->Cell(35,12,"Employers Rating",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(20,12,"Funding",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(20,12,"Library",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(35,12,"Physical Facilities",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(20,12,"Staffing",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(16,12,"Total",1,1,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this


 $sql = "SELECT * FROM `panelreport` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check panel report" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$i=0;
while($fetch=mysqli_fetch_assoc($result)){  
    $i=$i+1;
$academicContent1 = $fetch["academicContent"];        
$employersrating1 = $fetch["employersRating"];        
$funding1 = $fetch["funding"];       
$library1 = $fetch["library"];      
$physicalfacilities1 = $fetch["physicalFacilities"];        
$staffing1 = $fetch["staffing"];
$total2 = $academicContent1 + $employersrating1 + $funding1 + $library1 + $physicalfacilities1 + $staffing1;


$pdf->Cell(15,12,'( '.$i.' )',1,0,'C',false);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(35,12,$academicContent1,1,0,'C',false);
$pdf->Cell(35,12,$employersrating1,1,0,'C',false);
$pdf->Cell(20,12,$funding1,1,0,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(20,12,$library1,1,0,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(35,12,$physicalfacilities1,1,0,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(20,12,$staffing1,1,0,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(16,12,$total2,1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
}

$sql1 = "SELECT * FROM `panelmembers` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql1)){die("Faild  to check panel Members" . mysqli_error($db_link));}
$result1 = mysqli_query($db_link,$sql1);
$panel_members=mysqli_num_rows($result1);


$sql = "SELECT * FROM `panelreport` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check panel report" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$numb=mysqli_num_rows($result);
if($numb>0){
      
$academicContent=0;
$employersrating=0;
$funding=0;
$library=0;
$staffing=0;
$physicalfacilities=0;

while($fetch=mysqli_fetch_assoc($result)){    
$academicContent = $fetch["academicContent"]+ $academicContent;        
$employersrating = $fetch["employersRating"]+ $employersrating;        
$funding = $fetch["funding"]+$funding;       
$library = $fetch["library"]+ $library;      
$physicalfacilities = $fetch["physicalFacilities"]+ $physicalfacilities;        
$staffing = $fetch["staffing"]+ $staffing;  

$academicContent1 = $fetch["academicContent"];        
$employersrating1 = $fetch["employersRating"];        
$funding1 = $fetch["funding"];       
$library1 = $fetch["library"];      
$physicalfacilities1 = $fetch["physicalFacilities"];        
$staffing1 = $fetch["staffing"];     
}

$total = $academicContent + $employersrating + $funding + $library + $physicalfacilities + $staffing;
$avg1 =$total/6;
$academicContentAvg=$academicContent/$numb;
$employersratingAvg=$employersrating/$numb;
$fundingAvg=$funding/$numb;
$libraryAvg=$library/$numb;
$physicalfacilitiesAvg=$physicalfacilities/$numb;
$staffingAvg=$staffing/$numb;
$avg2 =$total/6;
$totalAvg = $academicContentAvg + $employersratingAvg + $fundingAvg + $libraryAvg + $physicalfacilitiesAvg + $staffingAvg;

$pdf->Cell(196,12,"Overall Total Points",1,1,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this

$pdf->Cell(15,12,'',1,0,'C',false);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(35,12,$academicContent,1,0,'C',false);
$pdf->Cell(35,12,$employersrating,1,0,'C',false);
$pdf->Cell(20,12,$funding,1,0,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(20,12,$library,1,0,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(35,12,$physicalfacilities,1,0,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(20,12,$staffing,1,0,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(16,12,$total,1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this

$pdf->Cell(196,12,"Overall Total Percentage",1,1,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this

$pdf->Cell(15,12,'',1,0,'C',false);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(35,12,$academicContentAvg.'%',1,0,'C',false);
$pdf->Cell(35,12,$employersratingAvg.'%',1,0,'C',false);
$pdf->Cell(20,12,$fundingAvg.'%',1,0,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(20,12,$libraryAvg.'%',1,0,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(35,12,$physicalfacilitiesAvg.'%',1,0,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(20,12,$staffingAvg.'%',1,0,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(16,12,$totalAvg.'%',1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this


}
$pdf->Cell(195,12,'',0,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this

$pdf->Cell(195,12,'LIST OF PANEL MEMBERS',1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(15,12,"S/N",1,0,'C',true);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(70,12,"Name",1,0,'C',true);
$pdf->Cell(70,12,"Email",1,0,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$pdf->Cell(40,12,"Phone Number",1,1,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this

$sql1 = "SELECT * FROM `panelmembers` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql1)){die("Faild  to check panel Members" . mysqli_error($db_link));}
$result1 = mysqli_query($db_link,$sql1);
$panel_members=mysqli_num_rows($result1);
$i=0;
 while($fetch1=mysqli_fetch_assoc($result1)){
    $i=$i+1;
   $full_name= $fetch1['firstName']." ".$fetch1['surname']." ".$fetch1['otherName'];  
    $email= $fetch1['email'];
    $phone= $fetch1['telephone1'];
    
$pdf->Cell(15,12,$i,1,0,'C',false);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(70,12,$full_name,1,0,'C',false);  //Write a cell 20 wide, 12 high, filled and bordered, with Order # centered inside, last argument 'true' tells it to fill the cell with the color specified
$pdf->Cell(70,12,$email,1,0,'C',false);
$pdf->Cell(40,12,$phone,1,1,'C',false);
}


$pdf->Cell(195,12,'',1,1,'C',false); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
$sql = "SELECT * FROM `panelreport_summary` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql1)){die("Faild  to check panel Members" . mysqli_error($db_link));}
$result1 = mysqli_query($db_link,$sql1);
$panel_members=mysqli_num_rows($result1);
$i=0;
 while($fetch1=mysqli_fetch_assoc($result1)){
    $i=$i+1;
   $full_name= $fetch1['firstName']." ".$fetch1['surname']." ".$fetch1['otherName'];  
    //$sdate= $fetch1['sdate'];
}


$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, ' Submited By..........: '.$full_name.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Designation: Chairman Of The Panel', 0, 2, 'L');
$pdf->Cell(30, 10, ' Signature/Date: ..............................................', 0, 2, 'L');


// Loop to display line number content
//for($i = 0; $i < 10; $i++)
	//$pdf->Cell(30, 12, 'Line Number ' . $i, 0, 2, 'L');
	
$pdf->Output();

?>
