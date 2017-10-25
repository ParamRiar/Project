    
    var count =0;
    
   //alert('I am here');
    
    var dbPer = prepareDatabase (); 
   
   // dspResults ();
    //hideRegister ();
    /*  
    var createSQL = 'CREATE TABLE IF NOT EXISTS tPersonal (' +
        'perId INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,' +
        'perName VARCHAR(100) NOT NULL,' +
        'perAddr VARCAHR(100) NOT NULL,' +
        'perCity VARCHAR(50)  NOT NULL,' +
        'perProv VARCHAR(50)  NOT NULL,' +
        'perPostal VARCHAR(50)  NOT NULL,' +
        'perCountry VARCHAR(50)  NOT NULL,' +
        'perEmail VARCHAR(50)  NOT NULL,' +
        'perDOB  VARCHAR(20)  NOT NULL,' +
        'perBloodTyp  VARCHAR(15)  NOT NULL,' +
        'perContactLense VARCHAR(5)  NOT NULL,' +
        'perPaceMaker VARCHAR(5)  NOT NULL,' +
        'perOrganDonor VARCHAR(15)  NOT NULL,' +
        'perMedIns VARCHAR(50)' +
    ')';
    */
    
    function getOpenDatabase() {
    try {
        if( !! window.openDatabase ) return window.openDatabase;
        else return undefined;
    } catch(e) {
        return undefined;
      }
    }

    function prepareDatabase() {
        
       // alert('prepareDatabase');
        
        var odb = getOpenDatabase();
        if(!odb) {
            alert('Web SQL Not Supported');
            return undefined;
        } else {
            var db = odb( 'medicalDB', '1.0', 'Medical Database', 5 * 1024 * 1024 );
            db.transaction(function (t) {
                t.executeSql( createSQL, [], function(t, r) {}, function(t, e) {
                    alert('Error creating Personal table: ' + e.message);
                });
            });
            return db;
        }
    }
    
    function dspResults () 
    {
        
			alert ('dspResults inside the Database ');
		
		if(dbPer) 
		{
            dbPer.readTransaction(function(t) {    // readTransaction sets the database to read-only
                t.executeSql('SELECT * FROM tPersonal ORDER BY LOWER(perName)', [], function(t, r) 
                {
                    
                    count=r.rows.length;
                   // alert ('Count inside the Database '+count);
                   // hideRegister ();
					
				
                   // hideRegister ();
                   for( var i = 0; i < r.rows.length; i++ ) 
				  {
				            var row = r.rows.item(i);
                            
							
							//var f = document.getElementById('personalForm');
                            //f.elements['perName1'].value = row.perName;
                            //f.elements['perAddr1'].value  = row.perAddr;
                            //f.elements['perCity1'].value = row.perCity;
                            //f.elements['perProv1'].value = row.perProv;
                            //f.elements['perPostal1'].value = row.perPostal;
                            //f.elements['perCountry1'].value = row.perCountry;
							//  f.elements['perEmail1'].value = row.perEmail;
                            //f.elements['perDOB1'].value = row.perDOB;
                            //f.elements['perBloodTyp1'].value  = row.perBloodTyp;
                            //f.elements['perContactLense1'].value = row.perContactLense;
                            //f.elements['perPaceMaker1'].value = row.perPaceMaker;
                            //f.elements['perOrganDonor1'].value  = row.perOrganDonor;
							//f.elements['perMedIns1'].value = row.perMedIns;
						
						//perEmail
						var userDBname=row.perEmail;
						var userDBPassword=row.perPassword;
						
						alert ('user Name  ---- '+userDBname);
						alert ('user Passwor  ---- '+userDBPassword);
						
						alert ('dspResults inside the Database  2222');
						
						
                        loginCheck2(userDBname, userDBPassword);
                        //loginCheck("UserName-Kamal", "passWord-abc123");
                        alert ('dspResults inside the Database 333 ');
                   }
					   //document.getElementById('personalForm').elements['perName1'].focus();
					
					});                 
                });
        }
    }
	
	
	function loginCheck2(userDBname, userDBPassword)
	{
			alert("loginCheck ");
			
			alert("User Name  " +userName);
			alert("User Password " +userPassword);
			
			var userName=document.forms["loginFormId"]["loginUserName"].value;
			var userPassword=document.forms["loginFormId"]["loingpasswordID"].value;
			
			//var userName="UserName-Kamala";
			//var userPassword="passWord-abc123";
			
			if (userName==null || userName=="") 
			  {
				alert("User Name Is Missing");
				//return false;
			  }
			else if (userPassword==null ||  userPassword=="")
			{
				alert("Password Is Missing ");
				//return false;
			}
			
			if((userName.toLowerCase() != userDBname.toLowerCase() ) ||  (userPassword.toLowerCase() != userDBPassword.toLowerCase() ) )  
			{
				alert("User Name OR Password is not correct ");
			
			}
			else if((userName.toLowerCase() == userDBname.toLowerCase() ) &&  (userPassword.toLowerCase() == userDBPassword.toLowerCase() ) )  
			{  
				alert("User Name & Password match  " +userName  +  "Password "+userPassword);
				
				window.location="myPersonalInfoEdit.html";
				
				//return true;
			} 
			
		
			
			
			
		
	}
    
    
    
