<?php

function ajax_handle(){
	$debug = true;
	global $session;
	
	$function_name_allowed = array('updateSelection', 'updateChar' ,'pasteText', 'copyText', 'cutText');
	$function_name = 'default'; // function name
	$function_valid = false; // status of function validation
	$params_valid = false; // status of params validation
	$output = array(); // output data
	$output_type = 'default'; //output type

	$function_valid = validPostArg('function_name') && validPostFunction($function_name_allowed);

	if($function_valid){
		$function_name = $_REQUEST['function_name'];

		switch($function_name){

// 			// the end of the selection
			case 'updateSelection':
				// check args

				$params_valid = validPostArg('selStart') && validPostArg('selEnd');
				if($params_valid){
               $output['debug'] = debug_me();
					$selStart = $_REQUEST['selStart'];
					$selEnd = $_REQUEST['selEnd'];
					 
					// work with IHM and Buffer
					$session->ihm->setSelectionStart($selStart);
               $session->ihm->setSelectionStart($selEnd);
               
					// output define
					$output_type = 'json';
               $output['Ihm'] = getIhmAttributes();
				}
				break;

         // the character to be stored
			case 'updateChar':
				// check args
				$params_valid = validPostArg('char');
				if($params_valid){
               $output['debug'] = debug_me();
					$char = $_REQUEST['char'];

					// work with IHM and Buffer
               $session->ihm->setChar($char);

					// output define
					$output_type = 'json';
               $output['Ihm'] = getIhmAttributes();
				}
				break;

			case 'cutText':
            $output['debug'] = debug_me();
				/* We don't need to get any args because the real IHM user (Web browser)
				 * and its image(Ihm.php) are syncronized at every command
				 * Ihm.php must have the positionStart & positionEnd that IHM (Web browser)
				 */
				$params_valid = true;

				// work with IHM and Buffer
				$session->ihm->cut();

				// output define
				$output_type = 'json';
            $output['Ihm'] = getIhmAttributes();
            $output['debug'] = debug_me();
				break;

			case 'copyText':
				/* We don't need to get any args because the real IHM user (Web browser)
				 * and its image(Ihm.php) are syncronized at every command
				 * Ihm.php must have the positionStart & positionEnd that IHM (Web browser)
				 */
				$params_valid = true;

				// work with IHM and Buffer
				$session->ihm->copy();

				// output define
				$output_type = 'json';
            
				break;

			case 'pasteText':
            $output['debug'] = debug_me();
				/* We don't need to get any args because the real user IHM (Web browser)
				 * and its image(Ihm.php) are syncronized at every command
				 * Ihm.php must have the positionStart & positionEnd that IHM (Web browser)
				 */
				$params_valid = true;
				
				// work with IHM and Buffer
				$session->ihm->paste();

				// output define
            $output_type = 'json';
				$output['Ihm'] = getIhmAttributes();
				
				break;
		}

		if($params_valid){
			switch($output_type){
				case 'json':
					outputJson($output);
					break;

					/*
					 * add another output type
					 */

				default :
					outputJson($output);
					break;
			}
		}
		else{
			outputJsonError('Params or one of params have not a correct form', $output);
		}
	}
	else{
		outputJsonError('Function name "'.$function_name.'" didn\'t recognize', $output);
	}
	
}

function validPostFunction($function_name_allowed){
	return is_array($function_name_allowed) && in_array($_REQUEST['function_name'], $function_name_allowed);
}

function validPostArg($arg_label){
	return isset($_REQUEST[$arg_label]) && (!empty($_REQUEST[$arg_label]) || $_REQUEST[$arg_label]==0 || $_REQUEST[$arg_label]=='0');
}
 
function validGetArg($arg_label){
	return isset($_GET[$arg_label]) && (!empty($_GET[$arg_label]) || $_GET[$arg_label]==0 || $_GET[$arg_label]=='0');
}

function outputJson($json){

	// output filter
	if( is_array($json) ) {
		header('Content-Type: text/javascript');
		echo json_encode( $json );
	}
	else{
		outputJsonError('Can not output with an array not initialized');
	}
	
}

function outputJsonError($msg, $json_error){
	$output_json = array();

	// output filter
	if( isset($msg) ){
      $output_json['ErrorMsg'] = $msg;
      $output_json['ErrorData'] = $json_error;
	}else{
		$output_json['Error'] = 'Error without feedback';
	}
	header('Content-Type: text/javascript');
	echo json_encode( $output_json );
}

function getIhmAttributes(){
   global $session;

   //todo : delete hack
   /*
   return array('text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'selStart' => '3','selEnd' => '9');
   */
   
   //*/
   return array(
      'text' => $session->ihm->getText(),
      'selStart' => $session->ihm->getSelectionStart(),
      'selEnd' => $session->ihm->getSelectionEnd()
   );
   //*/
}

function debug_me(){
   global $session;
   return array('Ihm' => array_merge(getIhmAttributes(), array('ihm_hash' => spl_object_hash($session->ihm))));
}

ajax_handle();

?>