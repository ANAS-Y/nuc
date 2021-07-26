function confirmPassword(){
    var pwd = document.getElementById('pwd').value;
    var cpwd = document.getElementById('cpwd').value;
    if(pwd===cpwd){
        if(pwd.length>5){
        document.getElementById('msg').style.color ='green';
    document.getElementById('msg').innerHTML ='OK! Strong Password';
    }
    else{
       document.getElementById('msg').style.color ='red';
         document.getElementById('msg').innerHTML ='your password must be more than 5 Characters';
         document.getElementById('pwd').value="";
         document.getElementById('cpwd').value="";
    }
    
    }
    else{
        document.getElementById('msg').style.color ='red';
         document.getElementById('msg').innerHTML ='Password did Not Match';
         document.getElementById('pwd').value="";
         document.getElementById('cpwd').value="";
    }
}
function lawYes(){
    document.getElementById('Yes').checked='true';
    document.getElementById('No').checked='';
    document.getElementById('lawUpload').hidden='';
    document.getElementById('lawText').hidden='hidden'; 
    document.getElementById('lawUpload').required='required';
    document.getElementById('No').required='';
    document.getElementById('Plaw').value='Yes';
    
}
function lawNo(){
    document.getElementById('Yes').checked='';
    document.getElementById('No').checked='True';
    document.getElementById('lawText').hidden=''; 
    document.getElementById('lawUpload').hidden='hidden';
    document.getElementById('lawText').required='required';
    document.getElementById('Yes').required='';
    document.getElementById('Plaw').value='No';
    }
    
   function scoreSelect(){
    var obj = document.getElementById('objectives').value;
    var curr = document.getElementById('curriculum').value;
    if (obj ==='Clearly defined'){
        document.getElementById('score').value=1;
        
   }
    else{
        document.getElementById('score').value=0;
    } 
      
        if (curr ==='Adequate for the degree programme'){
        document.getElementById('score1').value=2;
        
  }
    else if (curr ==='Fairly Adequate for the degree programme'){
        document.getElementById('score1').value=1;
    } 
     else{
        document.getElementById('score1').value=0;
     }
      
      }
      
      function scoreSelect2(){
   var staff = document.getElementById('staff').value;
    
     if (staff ==='The ratio complies with the NUC guidelines more than 70%'){
        document.getElementById('score').value=8;  
       
   }
    else if (staff ==='The ratio complies less than 70% but more than 60% with the NUC guidelines'){
        document.getElementById('score').value=6;
    } 
    else if (staff ==='The ratio complies less than 60% but more than 50% with the NUC guidelines'){
        document.getElementById('score').value=4;
    } 
     else{
        document.getElementById('score').value=0;
     }
      
      }
      
      
     function deleteProgramme(programmeID,hodID){
         
         var deleteProg = confirm('Are you Sure you want to delete this Programme?');
         if(deleteProg==true){
         
         if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                location.href ="apply.php";
                document.getElementById('msg').innerHTML = xmlhttp.responseText;
                
          
            }
        };
        var urlString= "?pID="+programmeID;
         urlString+="&hodID="+hodID
        xmlhttp.open("GET","deleteProgramme.php"+urlString,true);
        xmlhttp.send();
     }
     else{
     }
     }
     
     function myProgramme(accID){
          
         if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                location.href ="request.php";
        
            }
        };
        xmlhttp.open("GET","selectSchool.php?accID="+accID,true);
        xmlhttp.send();
     
     }
     
         function addProgramme(accID){
     if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('forms').style.visibility='visible';
                //location.reload();
                
            }
        };
        xmlhttp.open("GET","addProgram.php?accID="+accID,true);
        xmlhttp.send();     
     }
     
      function viewProgramme(accID){
     if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                location.reload();
                                    }
        };
        xmlhttp.open("GET","addProgram.php?accID="+accID,true);
        xmlhttp.send();    
     }
     
     function printPanel(accID){
     if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                window.top.location=window.top.location;
                                 //document.getElementById('unName').innerHTML="nnnnnn";
                                    }
        };
        xmlhttp.open("GET","panelprint3.php?accID="+accID,true);
        xmlhttp.send();    
     }
     
    
     function approveProgramme(programmeID,hodID){
        
         if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('txt').innerHTML = xmlhttp.responseText;
                location.href ="admin.home.php";
               
            }
        };
        var accDate = document.getElementById(status).value;
        var urlString= "?pID="+programmeID;
         urlString+="&accDate="+accDate
        xmlhttp.open("GET","approveProgramme.php"+urlString,true);
        xmlhttp.send();
     }