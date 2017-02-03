<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$( function() {
		  $( "#dialog-message" ).dialog({
		    modal: true,
		    buttons: {
		      Ok: function() {
		        $( this ).dialog( "close" );
		      }
		    }
		  });
		} );
	</script>
</head>
<body>
<div id="dialog-message" title="Download complete">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Your files have downloaded successfully into the My Downloads folder.
  </p>
  <p>
    Currently using <b>36% of your storage space</b>.
  </p>
</div>
 

 
 
</body>
</html>