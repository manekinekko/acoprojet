/*
 * @dep : lib.js
 * lib function getChar(evt);
 * lib function getSelectionStart(obj);
 * lib function getSelectionEnd(obj);
 * lib function getSelectedText(obj);
 * lib function getSelText(obj);
 * lib function setCursor(pos, obj);
 * lib function setText(obj, str);
 * lib function removeSelection(obj);
 */




$(function(){
   var default_target = "index.php?ajax";
   var default_type = "POST";
   var default_dataType = "json";

   var Debbug_selection = true;
   var Debbug_char = true;
   var Debbug_paste = true;
   var Debbug_copy = true;
   var Debbug_cut = true;

   var TextId = 'text';
   var LogId = 'log';

   
   var updateSelection = function() {
      $.ajax(
         {
            url : default_target,
            type : default_type,
            data : {
               // paramètres envoyés
               function_name: 'updateSelection', selStart: getSelectionStart(TextId), selEnd: getSelectionEnd(TextId)
            }, 
            dataType : default_dataType, // type de données recues
            
            beforeSend: function(){
               if(Debbug_selection) {
                  console.log("__________________________");
                  console.log("updateSelection");
                  console.log("out --->");
                  console.log("selStart:"+ getSelectionStart(TextId));
                  console.log("selEnd:"+ getSelectionEnd(TextId));
               }
            },
            success: function(response){
               if(response != undefined && response.ErrorMsg){ 
                  console.log(response.ErrorMsg); 
                  console.log(response.ErrorData); 
               }
               if(response.debug) {
                  console.log("_PHP DEBUG_"); 
                  console.log("selStart:"+ response.debug.Ihm.selStart);
                  console.log("selEnd:"+ response.debug.Ihm.selEnd);
                  console.log("text:"+ response.debug.Ihm.text);
                  console.log("ihm_hash:"+ response.debug.Ihm.ihm_hash);
                  console.log("_PHP DEBUG_"); 
               }
               update(TextId, response.Ihm);
               
               if(Debbug_selection) {
                  console.log("<--- in");
                  console.log("nothing");
               }
            },
            error: function(e){
               if(Debbug_selection) console.log("updateSelection error" + e);
            },
            complete: function(){
            }
         }
      );
   };
   
   $('#'+TextId).mouseup(
      function(e){
         e.preventDefault();
         updateSelection();
         debug();
      }
   );
   
   
   var insert = function(char) {
      $.ajax(
         {
            url : default_target,
            type : default_type,
            data : {
               // paramètres envoyés
               function_name: 'insert', char: char
            }, 
            dataType : default_dataType, // type de données recues
            
            beforeSend: function(){
               if(Debbug_char) {
                  console.log("__________________________");
                  console.log("insert");
                  console.log("out --->");
                  console.log("char:"+ char);
               }
            },
            success: function(response){
               if(response != undefined && response.ErrorMsg){ 
                  console.log(response.ErrorMsg); 
                  console.log(response.ErrorData); 
               }
               if(response.debug) {
                  console.log("_PHP DEBUG_"); 
                  console.log("selStart:"+ response.debug.Ihm.selStart);
                  console.log("selEnd:"+ response.debug.Ihm.selEnd);
                  console.log("text:"+ response.debug.Ihm.text);
                  console.log("ihm_hash:"+ response.debug.Ihm.ihm_hash);
                  console.log("_PHP DEBUG_"); 
               }
               if(Debbug_char) {
                  console.log("<--- in");
                  console.log("selStart:"+ response.Ihm.selStart);
                  console.log("selEnd:"+ response.Ihm.selEnd);
                  console.log("text:"+ response.Ihm.text);
               }
               update(TextId, response.Ihm);
               
            },
            error: function(e){
               console.log("insert error" + e);
            },
            complete: function(){
            }
         }
      );
   };
   
   $('#'+TextId).keypress(
      function(e){
    	  
    	  var o = getChar(e);
    	  var char = o.char;
    	  e.preventDefault();
        console.log(o.code);
        
    	  // allow ascii chars only
    	  if( ( o.code == 8 || o.code == 9 ) 
    		  || ( o.code >= 13 && o.code <= 111) 
    		  || ( o.code >= 114 && o.code <= 222 ) 
    	  )
    	  {
            console.log('char:'+o.char+'; char.code:'+o.code+'-> action');
            insert(o.char);
            debug();
    	  }
    	  else{
            console.log('char:'+o.char+'; char code:'+o.code+'-> no action');
        }
      }
   );
   

   
   var cut = function() {
      $.ajax(
         {
            url : default_target,
            type : default_type,
            data : {
               // paramètres envoyés
               function_name: 'cut'
            }, 
            dataType : default_dataType, // type de données recues
            
            beforeSend: function(){
               if(Debbug_cut) {
                  console.log("__________________________");
                  console.log("cut");
                  console.log("out --->");
                  console.log("nothing");
               }
            },
            success: function(response){
               if(response != undefined && response.ErrorMsg){ 
                  console.log(response.ErrorMsg); 
                  console.log(response.ErrorData); 
               }
               if(response.debug) {
                  console.log("_PHP DEBUG_"); 
                  console.log("selStart:"+ response.debug.Ihm.selStart);
                  console.log("selEnd:"+ response.debug.Ihm.selEnd);
                  console.log("text:"+ response.debug.Ihm.text);
                  console.log("ihm_hash:"+ response.debug.Ihm.ihm_hash);
                  console.log("_PHP DEBUG_"); 
               }
               if(Debbug_cut) {
                  console.log("<--- in");
                  console.log("selStart:"+ response.Ihm.selStart);
                  console.log("selEnd:"+ response.Ihm.selEnd);
                  console.log("text:"+ response.Ihm.text);
               }
               update(TextId, response.Ihm);
            },
            error: function(e){
               console.log("cut error" + e);
            },
            complete: function(){
            }
         }
      );
   };
   
   $('#cut').click(
      function(e){
         e.preventDefault();
         cut();
         debug();
      }
   );
   

   
   var copy = function() {
      $.ajax(
         {
            url : default_target,
            type : default_type,
            data : {
               // paramètres envoyés
               function_name: 'copy'
            }, 
            dataType : default_dataType, // type de données recues
            
            beforeSend: function(){
               if(Debbug_copy) {
                  console.log("__________________________");
                  console.log("copy");
                  console.log("out --->");
                  console.log("nothing");
               }
            },
            success: function(response){
               
               if(response != undefined && response.ErrorMsg){ 
                  console.log(response.ErrorMsg); 
                  console.log(response.ErrorData); 
               }
               if(response.debug) {
                  console.log("_PHP DEBUG_"); 
                  console.log("selStart:"+ response.debug.Ihm.selStart);
                  console.log("selEnd:"+ response.debug.Ihm.selEnd);
                  console.log("text:"+ response.debug.Ihm.text);
                  console.log("ihm_hash:"+ response.debug.Ihm.ihm_hash);
                  console.log("_PHP DEBUG_"); 
               }
               
               if(Debbug_copy) {
                  console.log("<--- in");
               }
            },
            error: function(e){
               console.log("copy error" + e);
            },
            complete: function(){
               if(Debbug_copy) console.log("copy complete");
            }
         }
      );
   };
   
   $('#copy').click(
      function(e){
         e.preventDefault();
         copy();
         debug();
      }
   );
   
   
   var paste = function() {
      $.ajax(
         {
            url : default_target,
            type : default_type,
            data : {
               // paramètres envoyés
               function_name: 'paste'
            }, 
            dataType : default_dataType, // type de données recues
             
            beforeSend: function(){
               if(Debbug_paste) {
                  console.log("__________________________");
                  console.log("paste");
                  console.log("out --->");
                  console.log("nothing");
               }
            },
            success: function(response){
               if(response != undefined && response.ErrorMsg){ 
                  console.log(response.ErrorMsg); 
                  console.log(response.ErrorData); 
               }
               if(response.debug) {
                  console.log("_PHP DEBUG_"); 
                  console.log("selStart:"+ response.debug.Ihm.selStart);
                  console.log("selEnd:"+ response.debug.Ihm.selEnd);
                  console.log("text:"+ response.debug.Ihm.text);
                  console.log("ihm_hash:"+ response.debug.Ihm.ihm_hash);
                  console.log("_PHP DEBUG_"); 
               }
               if(Debbug_paste) {
                  console.log("<--- in");
                  console.log("selStart:"+ response.Ihm.selStart);
                  console.log("selEnd:"+ response.Ihm.selEnd);
                  console.log("text:"+ response.Ihm.text);
               }
               if(response != undefined &&response.ErrorMsg){ console.log(response.Error); console.log(response.ErrorData); }
               update(TextId, response.Ihm);
            },
            error: function(e){
               console.log("paste error" + e);
            },
            complete: function(){
            }
         }
      );
   };
   
   $('#paste').click(
      function(e){
         e.preventDefault();
         paste();
         debug();
      }
   );
   
   var debug = function(){
      $('#pre').load('index.php?debug');
   }
});