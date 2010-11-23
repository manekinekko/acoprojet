<?php

   function main(){
      $function_name_allowed = array('updateSelection', 'updateChar' ,'pasteText', 'copyText', 'cutText');
      $function_name = 'default'; // function name
      $function_valid = false; // status of function validation
      $params_valid = false; // status of params validation
      $output = array(); // output data
      $output_type = 'default'; //output type


      if($function_valid = (validPostArg('function_name') && validPostFunction('function_name', &$array_func_allowed))){
         $function_name = $_POST['function_name'];

         switch($function_name){

            // the end of the selection
            case 'updateSelection': 
                  // check args
                  if($params_valid = validPostArg('selStart') && validPostArg('selEnd')){
                     $selStart = $_POST['selStart'];
                     $selEnd = $_POST['selEnd'];
                     
                     // work with IHM and Buffer
                     updateSelection($selStart, $selEnd);
                     
                     // output define
                     $output = array(); // nothing
                     $output_type = 'json';
                  }
               break;

            // the character to be stored
            case 'updateChar':
                  // check args
                  if($params_valid = validPostArg('char')){
                     $char = $_POST['char'];

                     // work with IHM and Buffer
                     updateChar($char);

                     // output define
                     $output = array(); // nothing
                     $output_type = 'json';
                  }
               break;

            case 'cutText': 
                  /* We don't need to get any args because the real IHM user (Web browser) 
                  * and its image(Ihm.php) are syncronized at every command
                  * Ihm.php must have the positionStart & positionEnd that IHM (Web browser)
                  */
                  $params_valid = true;

                  // work with IHM and Buffer
                  cutText();

                  // output define
                  /* nothing 
                  * the IHM (Web browser) will deleted the cut text from the textarea by himself
                  */
                  $output = array(); 
                  $output_type = 'json';
               break;

            case 'copyText': 
                  /* We don't need to get any args because the real IHM user (Web browser) 
                  * and its image(Ihm.php) are syncronized at every command
                  * Ihm.php must have the positionStart & positionEnd that IHM (Web browser)
                  */
                  $params_valid = true;

                  // work with IHM and Buffer
                  cutText();

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
                  $pasteText = pasteText();

                  // output define
                  /*
                  * The real user IHM (Web browser) need to get the paste text contain in the clipboard
                  * of the buffer.
                  * IHM (Web browser) and its image(Ihm.php) will update there attributs :
                  * positionStart & positionEnd & text
                  */
                  $output = array('return' => $pasteText);
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
      }
      if($function_valid){
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
         outputJsonError('Function name didn\'t recognize');
      }
   }

   function validPostFunction($func_label, &$array_func_allowed){
      return is_array($array_func_allowed) && in_array($_POST[$func_label], $array_func_allowed);
   }

   function validPostArg($arg_label){
      return isset($_POST[$arg_label]) && !empty($_POST[$arg_label]);
   }
   
   function validGetArg($arg_label){
      return isset($_GET[$arg_label]) && !empty($_GET[$arg_label]);
   }

   function outputJson($json){
      $output_json = array();

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

   function pasteText(){

   }

   function copyText(){

   }

   function cutText(){

   }

   function updateChar(){

   }

   function updateSelectionStart(){

   }

   function updateSelectionEnd(){

   }

   main();

?>