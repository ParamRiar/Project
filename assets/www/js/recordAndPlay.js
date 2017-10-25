 
 


 
 function hideRecord ()
{
    document.getElementById('myRecordDIV').style.display = "none";
}



   //Wait for Cordova to load
        //
        document.addEventListener("deviceready", onDeviceReady, false);
 
 // Cordova is ready
        //
        function onDeviceReady() 
        {
           
        }

        // Audio player
        //
        var my_media = null;
        var mediaTimer = null;

        // Play audio
        //
        function playAudio(src) {
            
            
            // Create Media object from src
            my_media = new Media(src, onSuccess, onError);

            // Play audio
            my_media.play();

            // Update my_media position every second
            if (mediaTimer == null) {
                mediaTimer = setInterval(function() {
                    // get my_media position
                    my_media.getCurrentPosition(
                        // success callback
                        function(position) {
                            if (position > -1) {
                                setAudioPosition((position) + " sec");
                            }
                        },
                        // error callback
                        function(e) {
                            console.log("Error getting pos=" + e);
                            setAudioPosition("Error: " + e);
                        }
                    );
                }, 1000);
            }
        }

        // Pause audio
        // 
        function pauseAudio() {
            
           
            if (my_media) {
                my_media.pause();
            }
        }

        // Stop audio
        // 
        function stopAudio() {
            if (my_media) {
                my_media.stop();
            }
            clearInterval(mediaTimer);
            mediaTimer = null;
        }

        // onSuccess Callback
        //
        function onSuccess() {
            console.log("playAudio():Audio Success");
        }

        // onError Callback 
        //
        function onError(error) {
            alert('code: '    + error.code    + '\n' + 
                  'message: ' + error.message + '\n');
        }

        // Set audio position
        // 
        function setAudioPosition(position) {
            document.getElementById('audio_position').innerHTML = position;
        }

        
        
        // Record audio
    // 
    function recordAudio() {
        var src = "myrecording.mp3";
        var mediaRec = new Media(src, onSuccess, onError);

        // Record audio
        mediaRec.startRecord();

        // Stop recording after 10 sec
        var recTime = 0;
        var recInterval = setInterval(function() {
            recTime = recTime + 1;
            setAudioPosition(recTime + " sec");
            if (recTime >= 1000) {
                clearInterval(recInterval);
                mediaRec.stopRecord();
            }
        }, 1000);
    }

    // Cordova is ready
    //
    function onDeviceReady() {
       // recordAudio();
    }

    // onSuccess Callback
    //
    function onSuccess() {
        console.log("recordAudio():Audio Success");
    }

    // onError Callback 
    //
    function onError(error) {
        alert('code: '    + error.code    + '\n' + 
              'message: ' + error.message + '\n');
    }

    // Set audio position
    // 
    function setAudioPosition(position) {
        document.getElementById('audio_position').innerHTML = position;
    }

   
    