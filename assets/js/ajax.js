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


var Debbug_selection = false;
var Debbug_char = false;
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
   removeSelection();
}

function copy() 
{
   
}

function insert(c) 
{
   setText(c, TextId);
}



$(function(){
   
   var default_target = "../bin/ajax.php";
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
            success: function(d){
               /*$('#resultat').html(d.response);*/
               if(Debbug_selection) console.log("updateSelection success");
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
            success: function(d){
               insert(char);
               if(Debbug_char) console.log("updateChar success");
            },
            error: function(e){
               if(Debbug_char) console.log("updateChar error" + e);
            },
            complete: function(){
               if(Debbug_char) console.log("updateChar complete");
            }
         }
      );
   };
   
   $('#'+TextId).keypress(
      function(e){
         e.preventDefault();
         updateChar(getChar(e));
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
            success: function(d){
               cut();
               if(Debbug_cut) console.log("cutText success");
            },
            error: function(e){
               if(Debbug_cut) console.log("cutText error" + e);
            },
            complete: function(){
               if(Debbug_cut) console.log("cutText complete");
            }
         }
      );
   };
   
   $('#cutText').submit(
      function(e){
         e.preventDefault();
         cutText();
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
            success: function(d){
               copy();
               if(Debbug_copy) console.log("copyText success");
            },
            error: function(e){
               if(Debbug_copy) console.log("copyText error" + e);
            },
            complete: function(){
               if(Debbug_copy) console.log("copyText complete");
            }
         }
      );
   };
   
   $('#copyText').submit(
      function(e){
         e.preventDefault();
         copyText();
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
            success: function(d){
               paste(d.text);
               if(Debbug_paste) console.log("paste success");
            },
            error: function(e){
               if(Debbug_paste) console.log("paste error" + e);
            },
            complete: function(){
               if(Debbug_paste) console.log("paste complete");
            }
         }
      );
   };
   
   $('#pasteText').submit(
      function(e){
         e.preventDefault();
         pasteText();
      }
   );
});