    
    var count =0;
    
   // alert('I am here');
    
    var dbPer = prepareDatabase (); 
   
    dspResults ();
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
        
        //alert('prepareDatabase');
        
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
        if(dbPer) {
            dbPer.readTransaction(function(t) {    // readTransaction sets the database to read-only
                t.executeSql('SELECT * FROM tPersonal ORDER BY LOWER(perName)', [], function(t, r) 
                {
                    
                    count=r.rows.length;
                   //alert ('Count inside the Database '+count);
                    hideRegister ();
                   // hideRegister ();
                   // for( var i = 0; i < r.rows.length; i++ ) {
                       //     var row = r.rows.item(i);
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
                      //  }
                        //document.getElementById('personalForm').elements['perName1'].focus();
                    });
                    
                });
            }
    }
    
    
    
    
    function hideRegister ()
    {
        
        if(count > 0)
        {
           document.getElementById('registFirstTime').style.display = "none";  
        }
        
    }
