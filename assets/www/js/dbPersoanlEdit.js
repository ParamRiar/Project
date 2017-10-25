    alert('A Kam EDIT'); 
    
    
    var dbPer = prepareDatabase (); 
    
    dspResultsEdPg();
    
    var createSQL = 'CREATE TABLE IF NOT EXISTS tPersonal (' +
        'perId INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,' +
        'perName VARCHAR(50) NOT NULL,' +
        'perLstName VARCHAR(50) NOT NULL,' +
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
        'perPassword VARCHAR(15),' +
        'perMedIns VARCHAR(50)' +
    ')';

    function getOpenDatabase() {
    try {
        if( !! window.openDatabase ) return window.openDatabase;
        else return undefined;
    } catch(e) {
        return undefined;
      }
    }

    function prepareDatabase() {
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
    

// add or update rows in the table
    function addRow() {
        var f = document.getElementById('personalFormEd');
        var Vaction = f.elements['inputAction'].value;
        var VperName = f.elements['perName1Ed'].value;
        var VperLstName = f.elements['perLstName1Ed'].value;
        var VperAddr = f.elements['perAddr1Ed'].value;
        var VperCity = f.elements['perCity1Ed'].value;
        var VperProv = f.elements['perProv1Ed'].value;
        var VperPostal = f.elements['perPostal1Ed'].value;
        var VperCountry = f.elements['perCountry1Ed'].value;
        var VperEmail = f.elements['perEmail1Ed'].value;
        var VperDOB = f.elements['perDOB1Ed'].value;
        var VperBloodTyp = f.elements['perBloodTyp1Ed'].value;
        var VperContactLense = f.elements['perContactLense1Ed'].value;
        var VperPaceMaker = f.elements['perPaceMaker1Ed'].value;
        var VperOrganDonor = f.elements['perOrganDonor1Ed'].value;
        var VperMedIns = f.elements['perMedIns1Ed'].value;
        //var Vkey = f.elements['inputKey'].value;
        Vkey = '1';
        //alert ('Add row after VAR' + VperName + ' ' + VperAddr + ' '  + VperLstName);
        //alert ('Action is ' + Vaction);           
        switch(Vaction) {
        case 'add': 
    //if(VperName || VperAddr || VperCity) { -->
            dbPer.transaction( function(t) {
                t.executeSql(' INSERT INTO tPersonal ( perName, perLstName, perAddr, perCity, perProv, perPostal, perCountry, perEmail, perDOB, perBloodTyp, perContactLense, perPaceMaker, perOrganDonor, perMedIns) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ',
                             [ VperName, VperLstName, VperAddr, VperCity, VperProv, VperPostal, VperCountry, VperEmail, VperDOB, VperBloodTyp, VperContactLense, VperPaceMaker, VperOrganDonor, VperMedIns ]
                );
            }, function(t, r){ alert('Insert Personal row successful.'); }, function(t,e) {
                alert ('Error inserting Personal row :' + e.message);
            });
        //}
            break;
        case 'update':
            // if(! (VperName || VperAddr || VperCity)) break;
            dbPer.transaction( function(t) {
                t.executeSql(' UPDATE tPersonal SET perName = ?, perLstName= ?, perAddr = ?, perCity = ?, perProv = ?, perPostal = ?, perCountry = ?, perEmail = ?,perDOB = ?, perBloodTyp = ?, perContactLense = ?, perPaceMaker = ?, perOrganDonor = ?, perMedIns = ? WHERE perId = ?',
                               [ VperName, VperLstName, VperAddr, VperCity, VperProv, VperPostal, VperCountry, VperEmail, VperDOB, VperBloodTyp, VperContactLense, VperPaceMaker, VperOrganDonor, VperMedIns, Vkey ]
                );
            }, function(t, r){ alert('Update Personal row successful. '); }, function(t, e){ 
                 alert('Error Updating Personal row : ' + e.message); 
            });
            break;
        }   
    }

    function dspResultsEdPg () {
        //var Vkey = document.getElementById('personalFormEd').elements['inputKey'].value;
        Vkey = '1'
        if(dbPer) {
            document.getElementById('personalFormEd').elements['inputAction'].value = 'add';
            dbPer.readTransaction(function(t) {    // readTransaction sets the database to read-only
                t.executeSql('SELECT * FROM tPersonal where perId = ?', [Vkey], function(t, r) {
                    var row = r.rows.item(0);
                    if(row) {
                        var f = document.getElementById('personalFormEd');
                        f.elements['perName1Ed'].value = row.perName;
                        f.elements['perLstName1Ed'].value = row.perLstName;
                        f.elements['perAddr1Ed'].value  = row.perAddr;
                        f.elements['perCity1Ed'].value = row.perCity;
                        f.elements['perProv1Ed'].value = row.perProv;
                        f.elements['perPostal1Ed'].value = row.perPostal;
                        f.elements['perCountry1Ed'].value = row.perCountry;
                        f.elements['perEmail1Ed'].value = row.perEmail;
                        f.elements['perDOB1Ed'].value = row.perDOB;
                        f.elements['perBloodTyp1Ed'].value  = row.perBloodTyp;
                        f.elements['perContactLense1Ed'].value = row.perContactLense;
                        f.elements['perPaceMaker1Ed'].value = row.perPaceMaker;
                        f.elements['perOrganDonor1Ed'].value  = row.perOrganDonor;
                        f.elements['perMedIns1Ed'].value = row.perMedIns;
                        f.elements['inputAction'].value = 'update'; 
                        }
                        document.getElementById('personalFormEd').elements['perName1Ed'].focus();
                    });
                });
            }
    }
    