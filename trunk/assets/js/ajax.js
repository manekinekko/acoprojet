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


var Debbug_selection = true;
var Debbug_char = true;
var Debbug_paste = true;
var Debbug_copy = true;
var Debbug_cut = true;

var TextId = 'text';
var LogId = 'log';

function paste(str) 
{
   setText(str, TextId);
}

function cut() 
{
   removeSelection(TextId);
}

function copy() 
{
   
}

function insert(c) 
{
   setText(c, TextId);
}



$(function(){
   
   var default_target = "index.php?ajax";
   var default_type = "POST";
   var default_dataType = "json";
   
   var updateSelection = function() {
      $.ajax(
         {
            url : default_target,
            type : default_type,
            data : {
               // paramètres envoyés
               function_name: 'updateSelection',
               selStart: getSelectionStart(TextId),
               selEnd: getSelectionEnd(TextId)
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
   
   
   var updateChar = function(char) {
      $.ajax(
         {
            url : default_target,
            type : default_type,
            data : {
               // paramètres envoyés
               function_name: 'updateChar',
               char: char
            }, 
            dataType : default_dataType, // type de données recues
            
            beforeSend: function(){
               if(Debbug_char) {
                  console.log("__________________________");
                  console.log("updateChar");
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
               console.log("updateChar error" + e);
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
        	  updateChar(o.char);
           debug();
    	  }
    	  else{
            console.log('char:'+o.char+'; char code:'+o.code+'-> no action');
        }
      }
   );
   

   
   var cutText = function() {
      $.ajax(
         {
            url : default_target,
            type : default_type,
            data : {
               // paramètres envoyés
               function_name: 'cutText'
            }, 
            dataType : default_dataType, // type de données recues
            
            beforeSend: function(){
               if(Debbug_cut) {
                  console.log("__________________________");
                  console.log("cutText");
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
               console.log("cutText error" + e);
            },
            complete: function(){
            }
         }
      );
   };
   
   $('#cutText').click(
      function(e){
         e.preventDefault();
         cutText();
         debug();
      }
   );
   

   
   var copyText = function() {
      $.ajax(
         {
            url : default_target,
            type : default_type,
            data : {
               // paramètres envoyés
               function_name: 'copyText'
            }, 
            dataType : default_dataType, // type de données recues
            
            beforeSend: function(){
               if(Debbug_copy) {
                  console.log("__________________________");
                  console.log("copyText");
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
                  console.log("_PHP DEBUG_"); 
               }
               
               if(Debbug_copy) {
                  console.log("<--- in");
               }
            },
            error: function(e){
               console.log("copyText error" + e);
            },
            complete: function(){
               if(Debbug_copy) console.log("copyText complete");
            }
         }
      );
   };
   
   $('#copyText').click(
      function(e){
         e.preventDefault();
         copyText();
         debug();
      }
   );
   
   
   var pasteText = function() {
      $.ajax(
         {
            url : default_target,
            type : default_type,
            data : {
               // paramètres envoyés
               function_name: 'pasteText'
            }, 
            dataType : default_dataType, // type de données recues
             
            beforeSend: function(){
               if(Debbug_paste) {
                  console.log("__________________________");
                  console.log("pasteText");
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
   
   $('#pasteText').click(
      function(e){
         e.preventDefault();
         pasteText();
         debug();
      }
   );
   
   var debug = function(){
      $('#pre').load('index.php?debug');
   }
});