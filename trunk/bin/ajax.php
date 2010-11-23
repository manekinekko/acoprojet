<?php

$o = Main::getInstance();

function ajax_handle(){
	
	global $o;
	
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

			// the end of the selection
			case 'updateSelection':
				// check args
				$params_valid = validPostArg('selStart') && validPostArg('selEnd');
				if($params_valid){
					$selStart = $_REQUEST['selStart'];
					$selEnd = $_REQUEST['selEnd'];
					 
					// work with IHM and Buffer
					updateSelection($selStart, $selEnd);
					 
					// output define
					$output = array(); // nothing
					$output_type = 'json';
               $output['Ihm'] = getIhmAttributes();
				}
				break;

				// the character to be stored
			case 'updateChar':
				// check args
				$params_valid = validPostArg('char');
				if($params_valid){
					$char = $_REQUEST['char'];

					// work with IHM and Buffer
					updateChar($char);

					// output define
					$output = array(); // nothing
					$output_type = 'json';
               $output['Ihm'] = getIhmAttributes();
				}
				break;

			case 'cutText':
				/* We don't need to get any args because the real IHM user (Web browser)
				 * and its image(Ihm.php) are syncronized at every command
				 * Ihm.php must have the positionStart & positionEnd that IHM (Web browser)
				 */
				$params_valid = true;

				// work with IHM and Buffer
				$o->executeCut();

				// output define
				/* nothing
				 * the IHM (Web browser) will deleted the cut text from the textarea by himself
				 */
				$output = array();
				$output_type = 'json';
            $output['Ihm'] = getIhmAttributes();
				break;

			case 'copyText':
				/* We don't need to get any args because the real IHM user (Web browser)
				 * and its image(Ihm.php) are syncronized at every command
				 * Ihm.php must have the positionStart & positionEnd that IHM (Web browser)
				 */
				$params_valid = true;

				// work with IHM and Buffer
				$o->executeCopy();

				// output define
				$output = array(); // nothing
				$output_type = 'json';
            
				break;

			case 'pasteText':
				/* We don't need to get any args because the real user IHM (Web browser)
				 * and its image(Ihm.php) are syncronized at every command
				 * Ihm.php must have the positionStart & positionEnd that IHM (Web browser)
				 */

				$params_valid = true;

				
				// work with IHM and Buffer
				$o->executePaste();

				// output define
				/*
				 * The real user IHM (Web browser) need to get the paste text contain in the clipboard
				 * of the buffer.
				 * IHM (Web browser) and its image(Ihm.php) will update there attributs :
				 * positionStart & positionEnd & text
				 */
				$output['Ihm'] = getIhmAttributes();
				$output_type = 'json';
				break;

				/*
				 // add your commandTemplate label in $function_name_allowed array
				 case 'commandTemplate':
				 // check args
				 $params_valid = true;
				 // work with IHM and Buffer
				 // output define
				 $output = array();
				 $output_type = 'json';
				 */

			default:

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
			outputJsonError('Params or one of params have not a correct form');
		}
	}
	else{
		outputJsonError('Function name "'.$function_name.'" didn\'t recognize');
	}
	
}

function validPostFunction($function_name_allowed){
	return is_array($function_name_allowed) && in_array($_REQUEST['function_name'], $function_name_allowed);
}

function validPostArg($arg_label){
	return isset($_REQUEST[$arg_label]) && !empty($_REQUEST[$arg_label]);
}
 
function validGetArg($arg_label){
	return isset($_GET[$arg_label]) && !empty($_GET[$arg_label]);
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

function outputJsonError($msg){
	$output_json = array();

	// output filter
	if( isset($msg) )
	$output_json['Error'] = $msg;
	else{
		$output_json['Error'] = 'Error without feedback';
	}
	header('Content-Type: text/javascript');
	echo json_encode( $output_json );
}

function updateChar(){

}

function updateSelection($selStart, $selEnd){

}

function getIhmAttributes(){
   global $o;

   //todo : delete hack
   //*
   return array(
      'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
      'selStart' => '3',
      'selEnd' => '9'
   );
   //*/
   
   /*
   return array(
      'text' => $o->getText(),
      'selStart' => $o->getSelectionStart(),
      'selEnd' => $o->getSelectionEnd()
   );
   //*/
}

ajax_handle();

?>