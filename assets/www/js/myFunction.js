
/* Scroll*/
var myScroll;
function loaded()
{
    myScroll = new iScroll('wrapper');
 }
 document.addEventListener('DOMContentLoaded', loaded, false); 
 /* Scroll*/
 
 
 //this to call the Java Method from scritp
//this to call the Java Method from scritp
 function callNewActivity() 
 {
     hideMediaButton ();
    
     var firstPage = document.getElementById('firstPageid');
     var smsPhoneNumJava=firstPage.elements['primaryPhoneid'].value ; 
     if (confirm('Are You Sure You Want To Call Your Primary Contact Number : ' +smsPhoneNumJava+ ' ?')) 
     {
        
        window.MainActivity.call(smsPhoneNumJava);
    } 
    else 
    {
        alert("Call Cancelled");
    }  
}

function sendSMSActivity() 
{
     hideMediaButton ();
     //alert("Are you sure you want send SMS");  
            var smsLatLong = document.getElementById('sendSMSFrom');
            var smslongitudeJava=smsLatLong.elements['smsLatitudeId'].value ;
            var smsLatitudeJava=smsLatLong.elements['smslongitudeId'].value ;
            var smsSpecialInstJava=smsLatLong.elements['smsSpecialInstId'].value ;
            var smsPhoneNumJava=smsLatLong.elements['smsPrimaryContactID'].value ;
              
     if (confirm('Are You Sure You Want To Send A SMS to Primary Contact '+ smsPhoneNumJava + ' ?')) 
     { 
            
            window.MainActivity.sendSMS(smslongitudeJava,  smsLatitudeJava , smsSpecialInstJava,  smsPhoneNumJava   );          
    } 
    else 
    {
        alert("SMS Cancelled");
    }    
   
}
    



function hideMediaButton ()
{
    document.getElementById('recordButtons').style.display = "none";
}

