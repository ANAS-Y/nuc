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
    }
    
    }
    else{
        document.getElementById('msg').style.color ='red';
         document.getElementById('msg').innerHTML ='Password did Not Match';
    }
}
function lawYes(){
    document.getElementById('Yes').checked='true';
    document.getElementById('No').checked='';
    document.getElementById('lawUpload').hidden='';
    document.getElementById('lawText').hidden='hidden'; 
    document.getElementById('lawUpload').required='required';
    
}
function lawNo(){
    document.getElementById('Yes').checked='';
    document.getElementById('No').checked='True';
    document.getElementById('lawText').hidden=''; 
    document.getElementById('lawUpload').hidden='hidden';
    document.getElementById('lawText').required='required';
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