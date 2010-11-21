<?php


  // function name
	$fn = isset($_POST['fn']) && !empty($_POST['fn']) ? $_POST['fn'] : false;
  
	// the begining of the selection
	$selStart = isset($_POST['selStart']) && !empty($_POST['selStart']) ? $_POST['selStart'] : false;
	
	// the end of the selection
	$selEnd = isset($_POST['selEnd']) && !empty($_POST['selEnd']) ? $_POST['selEnd'] : false;
  
	// the character to be stored
	$char = isset($_POST['char']) && !empty($_POST['char']) ? $_POST['char'] : false;
	
	
	
	$json = array();
	
	$json["response"]["function"] = $fn;
	$json["response"]["selection"]["start"] = $selStart;
  $json["response"]["selection"]["end"] = $selEnd;
  $json["response"]["character"] = $char;
  
	
	header('Content-Type: text/javascript');
	echo json_encode( $json );


?>