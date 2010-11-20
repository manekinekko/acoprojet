<?php


	$data = ( isset($_POST['text']) && !empty($_POST['text']) ? $_POST['text'] : "" );


	$tab = array();
	
	$tab["response"] = strtoupper($data);
	
	header('Content-Type: text/javascript');
	echo json_encode( $tab );


?>