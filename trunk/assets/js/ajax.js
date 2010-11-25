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
                  console.log("updateSelection beforeSend");
                  console.log("selStart:"+ getSelectionStart(TextId));
                  console.log("selEnd:"+ getSelectionEnd(TextId));
               }
            },
            success: function(response){
               if(Debbug_selection) console.log("updateSelection success");
               if(response != undefined &&response.ErrorMsg){ console.log(response.Error); console.log(response.ErrorData); }
               update(TextId, response.Ihm);
            },
            error: function(e){
               if(Debbug_selection) console.log("updateSelection error" + e);
            },
            complete: function(){
               if(Debbug_selection) console.log("updateSelection complete");
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
                  console.log("updateChar beforeSend");
                  console.log("char:"+ char);
               }
            },
            success: function(response){
               console.log("updateChar success");
               if(response != undefined && response.ErrorMsg){ console.log(response.Error); console.log(response.ErrorData); }
               update(TextId, response.Ihm);
               
            },
            error: function(e){
               console.log("updateChar error" + e);
            },
            complete: function(){
               if(Debbug_char) console.log("updateChar complete");
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
               if(Debbug_cut) console.log("cutText beforeSend");
            },
            success: function(response){
               cut();
               if(Debbug_cut) console.log("cutText success");
               if(response != undefined &&response.ErrorMsg){ console.log(response.Error); console.log(response.ErrorData); }
               update(TextId, response.Ihm);
            },
            error: function(e){
               console.log("cutText error" + e);
            },
            complete: function(){
               if(Debbug_cut) console.log("cutText complete");
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
               if(Debbug_copy) console.log("copyText beforeSend");
            },
            success: function(response){
               copy();
               if(Debbug_copy) console.log("copyText success");
               if(response != undefined &&response.ErrorMsg){ console.log(response.Error); console.log(response.ErrorData); }
               update(TextId, response.Ihm);
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
               if(Debbug_paste) console.log("paste beforeSend");
            },
            success: function(response){
               paste(response.text);
               
               if(Debbug_paste) {
                  console.log("paste success");
                  console.log(response);
                  console.log("paste from PP:"+response.text);
               }
               if(response != undefined &&response.ErrorMsg){ console.log(response.Error); console.log(response.ErrorData); }
               update(TextId, response.Ihm);
            },
            error: function(e){
               console.log("paste error" + e);
            },
            complete: function(){
               if(Debbug_paste) console.log("paste complete");
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