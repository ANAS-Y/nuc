<?php
	session_start();
$accreditationID=$_SESSION['accreditationID'];
$universityID=$_SESSION['universityID'];
	include_once("connection.php");
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");

$sql = "SELECT * FROM vcselfstudy_ssf WHERE accreditationID= '$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
  
$ownership = $fetch["ownershipControl"];
$organisation = $fetch["organisationAdministration"];
$objectives = $fetch["phillosophyObjectives"];
$utility = $fetch["utilityServices"];
$Curriculum = $fetch["curriculumDesign"];
$Curricula = $fetch["updatingCurricula"];
$bookList= $fetch["bookList"];
$aquisition = $fetch["aquisitionPolicy"];
$services = $fetch["libraryservices"];  
$accomodation = $fetch["staffAccomodation"]; 
$Facilities = $fetch["sportFacilities"];
$health = $fetch["healthFacilities"]; 
$recruitment = $fetch["recruitmentPolicy"]; 
$staffDevelopment = $fetch["staffDevelopment"]; 
$officerName = $fetch["firstName"]." ".$fetch["surname"]." ".$fetch["otherName"];;
$rank = $fetch["rank"];
$Sdate = $fetch["dateSubmited"];
      
}
else{
    $_SESSION["msg"]='VC Self-Study Form Not Submited Yet!';
    header('location:admin.home.php');
}
    
    //performing central library SQL
  $sql = "SELECT * FROM `centrallibrary_ssf` WHERE accreditationID= '$accreditationID'";
             if (!mysqli_query($db_link,$sql)){
  die("Faild  to check the existance of central library" . mysqli_error($db_link));    
}
if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result); 

$fullName = $fetch["officerName"]; 
$Designation = $fetch["designation"]; 
$Grade = $fetch["gradeLevel"]; 
$FloorArea = $fetch["floorArea"]; 
$Population = $fetch["studentPopulation"]; 
$capacity = $fetch["sittingCapacity"];
$open = $fetch["openHour"]; 
$close = $fetch["closingHour"]; 
$StaffPolicy = $fetch["staffLendingPolicy"]; 
$StudentPolicy = $fetch["studentLendingPolicy"]; 
}
else{
$fullName = ''; 
$Designation = ''; 
$Grade = ''; 
$FloorArea = ''; 
$Population = ''; 
$capacity = '';
$open = ''; 
$close = ''; 
$StaffPolicy = ''; 
$StudentPolicy =''; 
}   

            
             /*Performing SQL query */
  $sql = "SELECT * FROM universityinfo_ssf,vcinformation_ssf
   WHERE universityinfo_ssf.universityID ='$universityID' AND vcinformation_ssf.universityID= '$universityID'
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
        $this->Cell(30 ,-60 , 'SELF-STUDY FORM (NUC/SSF)', 0, 2, 'C');	
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
}

// Create new object.
$pdf = new PDF();
$pdf->AliasNbPages();

// Add new pages
$pdf->AddPage();
 
// Set font-family and font-size.
$pdf->SetFont('Times','',12);
$pdf->Cell(30, 10, 'SECTION:A Part I (GENERAL INFORMATION ON UNIVERSITY)', 0, 2, 'L');
$pdf->Cell(30, 10, 'The University and Chief Executive', 0, 2, 'L');
$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'Name of University: '.$schoolName.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Address: '.$address.'', 0, 2, 'L'); 
$pdf->Cell(30, 10, 'Telephone: '.$proprietorPhone1.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Date Founded: '.$foundedDate.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Name and address of the Proprietor of the University:', 0, 2, 'L');
$pdf->Cell(30, 10, 'Name: '.$proprietor.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Address: '.$address.'', 0, 2, 'L');
$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'Name and Qualification of Vice-Chancellor:', 0, 2, 'L');
$pdf->Cell(30, 10, 'Name: '.$vcFname.' '.$vcLname.' '.$vcOname.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Address: '.$vcAddress.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Email: '.$email.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Telephone 1 : '.$vcPhone.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Telephone 2 : '.$vcPhone2.'', 0, 2, 'L');
$pdf->Cell(30, 10, '', 0, 2, 'L');
$pdf->Cell(30, 10, 'Qualification : '.$vcQualification.'', 0, 2, 'L');
$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'ORGANISATION, ADMINISTRATION AND CONTROL', 0, 2, 'L');
$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'Organisation and Administration: '.$organisation.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Ownership and Control: '.$ownership.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Philosophy and Objectives of the Universities : '.$objectives.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Utility Services: '.$services.'', 0, 2, 'L');
$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'CURRICULUM', 0, 2, 'L');
$pdf->Cell(30, 10, 'Process of Curriculum Design : '.$Curriculum.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Updating Curricula of Programmes : '.$Curricula.'', 0, 2, 'L');
$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'PHYSICAL FACILITIES', 0, 2, 'L');
$pdf->Cell(30, 10, 'The Central Library', 0, 2, 'L');
$pdf->Cell(30, 10, 'Name of highest officer in-charge of the main library : '.$fullName.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Designation : '.$Designation.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Salary Grade Level : '.$Grade.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Floor Area : '.$FloorArea.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Student Population serve : '.$Population.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Stting Capacity : '.$Grade.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Opening and Closign Hours : '.$open.'- '.$close.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Lending Policy For Academic Staff : '.$StaffPolicy.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Lending Policy For Student : '.$StudentPolicy.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Aquisition Policy  : '.$aquisition.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Professional Services Offered by the Library  : '.$services.'', 0, 2, 'L');
$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'Teaching Accommodation ', 0, 2, 'L');
$pdf->Cell(30, 10, ' Staff and Students  : '.$accomodation.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Health Facilities  : '.$health.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Staff Development : '.$staffDevelopment.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Students Guidance and Councelling : '.$staffDevelopment.'', 0, 2, 'L');
$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');

$pdf->Cell(30, 10, ' Submited By: '.$officerName.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Designation: '.$rank.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Date Submited: '.$Sdate.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' ', 0, 2, 'L');
$pdf->Cell(30, 10, ' ', 0, 2, 'L');

//HOD FORM STARTBNYHERE
$sql = "SELECT * FROM `programmeinfo_ssf` WHERE accreditationID= '$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
  
$title = $fetch["programmeTitle"]; 
$faculty = $fetch["faculty"];
$department = $fetch["department"];
$dateE = $fetch["dateEstablished"];
$deanName = $fetch["deanName"];
$deanQual = $fetch["deanQualification"];
$hodName = $fetch["hodName"];
$hodQual = $fetch["hodQualification"];
$programmehistory = $fetch["programmehistory"];
$programmeAdministration = $fetch["programmeAdministration"];
$studentsWelfare = $fetch["studentsWelfare"];
$academicAtmosphere = $fetch["academicAtmosphere"];
$dateSubmited = $fetch["dateSubmited"];
$officerFname = $fetch["officerFname"];
$officerLname = $fetch["officerSurname"];
$rank = $fetch["rank"];
}
else{
  $_SESSION["msg"]='VC Self-Study Form Not Submited Yet!';
    header('location:admin.home.php');
}
    
    //performing central library SQL
  $sql = "SELECT * FROM `centrallibrary_ssf` WHERE accreditationID= '$accreditationID'";
             if (!mysqli_query($db_link,$sql)){
  die("Faild  to check the existance of central library" . mysqli_error($db_link));    
}
if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result); 

$fullName = $fetch["officerName"]; 
$Designation = $fetch["designation"]; 
$Grade = $fetch["gradeLevel"]; 
$FloorArea = $fetch["floorArea"]; 
$Population = $fetch["studentPopulation"]; 
$capacity = $fetch["sittingCapacity"];
$open = $fetch["openHour"]; 
$close = $fetch["closingHour"]; 
$StaffPolicy = $fetch["staffLendingPolicy"]; 
$StudentPolicy = $fetch["studentLendingPolicy"]; 
}
else{
$fullName = ''; 
$Designation = ''; 
$Grade = ''; 
$FloorArea = ''; 
$Population = ''; 
$capacity = '';
$open = ''; 
$close = ''; 
$StaffPolicy = ''; 
$StudentPolicy =''; 
}   

            
             /*Performing SQL query */
  $sql = "SELECT * FROM universityinfo_ssf,vcinformation_ssf
   WHERE universityinfo_ssf.universityID ='$universityID' AND vcinformation_ssf.universityID= '$universityID'
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
$pdf->Cell(30, 10, 'SECTION:B PROGRAMME/SUB-DISCIPLINE/DISCIPLINE TO BE ACCREDITED', 0, 2, 'L');
$pdf->Cell(30, 10, 'Title of programme/sub-discipline/discipline to be accredited: ', 0, 2, 'L');
$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'Title of programme: '.$title.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Name of Department: '.$department.'', 0, 2, 'L'); 
$pdf->Cell(30, 10, 'Date of Establishment of Department: '.$dateE.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'NAME AND QUALIFICATION(S) OF DEAN OF FACULTY/OR PROVOST/DEAN OF COLLEGE/SCHOOL', 0, 2, 'L');
$pdf->Cell(30, 10, 'Head of Department Name: '.$deanName.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'HOD Qualification : '.$deanQual.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'NAME AND QUALIFICATION(S) OF HEAD OF DEPARTMENT OFFERING THE PROGRAMME TO BE ACCREDITED', 0, 2, 'L');
$pdf->Cell(30, 10, 'Head of Department Name: '.$hodName.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'HOD Qualification : '.$hodQual.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'HISTORY OF THE PROGRAMME/SUB-DISCIPLINE/DISCIPLINE ', 0, 2, 'L');
$pdf->Cell(30, 10, 'History: '.$programmehistory.'', 0, 2, 'L');
$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'ADMINISTRATION IN GENERAL OF PROGRAMME/SUB-
DISCIPLINE/DISCIPLINE', 0, 2, 'L');
$pdf->Cell(30, 10, 'Personnel Administration : '.$programmeAdministration.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Academic Atmosphere: '.$academicAtmosphere.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'PHYSICAL FACILITIES', 0, 2, 'L');
$pdf->Cell(30, 10, 'The Central Library', 0, 2, 'L');
$pdf->Cell(30, 10, 'Name of highest officer in-charge of the main library : '.$fullName.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Designation : '.$Designation.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Salary Grade Level : '.$Grade.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Floor Area : '.$FloorArea.'', 0, 2, 'L');
$pdf->Cell(30, 10, 'Student Population serve : '.$Population.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Stting Capacity : '.$Grade.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Opening and Closign Hours : '.$open.'- '.$close.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Lending Policy For Academic Staff : '.$StaffPolicy.'', 0, 2, 'L');
$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, 'STUDENTS WELFARE ', 0, 2, 'L');
$pdf->Cell(30, 10, ' Students  Walfare: '.$studentsWelfare.'', 0, 2, 'L');
$pdf->Cell(30, 10, '..................................................................................................................................................................................', 0, 2, 'L');
$pdf->Cell(30, 10, ' Name of officer Submited the Form: '.$officerFname.' '.$officerLname.'.....', 0, 2, 'L');
$pdf->Cell(30, 10, ' Designation:....'.$rank.'', 0, 2, 'L');
$pdf->Cell(30, 10, ' Submited Date: '.$dateSubmited.'', 0, 2, 'L');



// Loop to display line number content
//for($i = 0; $i < 10; $i++)
	//$pdf->Cell(30, 12, 'Line Number ' . $i, 0, 2, 'L');
	
$pdf->Output();

?>
