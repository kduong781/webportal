AdobeCreativeSDK.init({
    /* 2) Add your Client ID (API Key) */
  //  response.addHeader("Access-Control-Allow-Origin", "*"),
    clientID: 'cd727ecb27e64982801e54549d3a7f67',
    onError: function(error) {
        /* 3) Handle any global or config errors */
        if (error.type === AdobeCreativeSDK.ErrorTypes.AUTHENTICATION) {
            /*
                Note: this error will occur when you try
                to launch a component without checking if
                the user has authorized your app.

                From here, you can trigger
                AdobeCreativeSDK.loginWithRedirect().
            */
            console.log('You must be logged in to use the Creative SDK');
        } else if (error.type === AdobeCreativeSDK.ErrorTypes.GLOBAL_CONFIGURATION) {
            console.log('Please check your configuration');
        } else if (error.type === AdobeCreativeSDK.ErrorTypes.SERVER_ERROR) {
            console.log('Oops, something went wrong');
        }
    }
});

$(document).ready(function() {

	var originalImageSrc = $('#editable-image').attr('src');
	var currentImage; // assigned when the Edit button is clicked

	// Image Editor configuration
	var csdkImageEditor = new Aviary.Feather({
		apiKey: 'cd727ecb27e64982801e54549d3a7f67',
		onSave: function(imageID, newURL) {
			currentImage.src = newURL;
			csdkImageEditor.close();
			console.log(newURL);
		},
		onError: function(errorObj) {
			console.log(errorObj.code);
			console.log(errorObj.message);
			console.log(errorObj.args);
		}
	});

	// Launch Image Editor
	$('#edit-image-button').click(function() {

		// Get the image to be edited
		// `[0]` gets the image itself, not the jQuery object
		currentImage = $('#editable-image')[0];

		csdkImageEditor.launch({
			image: currentImage.id,
			url: currentImage.src
		});
	});

	// Reset
	$('#reset-image-button').click(function() {

		if ($('#editable-image').attr('src') === originalImageSrc) {
			alert('Nothing to reset.');
		}
		else {
			$('#editable-image').attr('src', originalImageSrc);
		}
	});
});

$("#save-image").mouseenter(function(){
  $img = $('#editable-image')[0].src;
  $input = $("input")[0];
  $input.value = $img;
//  $("#savedImage").value = $img;
//  $("#savedImage").attr('val', $img);
});


$('#edit').click(
  function(){
      $('.delete').toggleClass("remove");
  }
);
