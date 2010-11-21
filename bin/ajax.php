<?php

   main();

   function main(){

      
      // function name
      $fn = isset($_POST['fn']) && !empty($_POST['fn']) ? $_POST['fn'] : false;

      switch($fn){
         case "pasteText": 
               $text="paste";
               pasteText();
            break;
         
         case "copyText": 
               copyText();
            break;

         case "cutText": 
               $text="cut";
               cutText();
            break;

         case "updateSelectionStart": 
               // the begining of the selection
               $selStart = isset($_POST['selStart']) && !empty($_POST['selStart']) ? $_POST['selStart'] : false;
               updateSelectionStart();
            break;

         case "updateSelectionEnd": 
               // the begining of the selection
               $selEnd = isset($_POST['selEnd']) && !empty($_POST['selEnd']) ? $_POST['selEnd'] : false;
               updateSelectionEnd();
            break;
         
         case "updateChar":
               // the character to be stored
               $char = isset($_POST['char']) && !empty($_POST['char']) ? $_POST['char'] : false;
               updateChar();
            break;
         
         default: 
            
            break;
      }

      $json = array();

      if( isset($text) ) $json["function"] = $fn;
      if( isset($selStart) ) $json["selection"]["start"] = $selStart;
      if( isset($selEnd) ) $json["selection"]["end"] = $selEnd;
      if( isset($char) ) $json["character"] = $char;

      header('Content-Type: text/javascript');
      echo json_encode( $json );
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



?>