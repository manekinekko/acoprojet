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

var Debbug = false;
var Debbug1 = false;
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
   
   var updateSelectionStart = function() {
      $.ajax(
         {
            url : default_target,
            type : default_type,
            data : {
               // paramètres envoyés
               function_name: 'updateSelectionStart',
               selStart: getSelectionStart(TextId)
            }, 
            dataType : default_dataType, // type de données recues
            
            beforeSend: function(){
               if(Debbug) console.log("updateSelectionStart beforeSend");
               console.log("selStart:"+ getSelectionStart(TextId));
            },
            success: function(d){
               /*$('#resultat').html(d.response);*/
               if(Debbug) console.log("updateSelectionStart success");
            },
            error: function(e){
               if(Debbug) console.log("updateSelectionStart error" + e);
            },
            complete: function(){
               if(Debbug) console.log("updateSelectionStart complete");
            }
         }
      );
   };
   
   $('#'+TextId).click(
      function(e){
         e.preventDefault();
         updateSelectionStart();
      }
   );
   
   var updateSelectionEnd = function() {
      $.ajax(
         {
            url : default_target,
            type : default_type,
            data : {
               // paramètres envoyés
               function_name: 'updateSelectionEnd',
               selEnd: getSelectionEnd(TextId)
            }, 
            dataType : default_dataType, // type de données recues
            
            beforeSend: function(){
               if(Debbug) console.log("updateSelectionEnd beforeSend");
               console.log("selEnd:"+ getSelectionEnd(TextId));
            },
            success: function(d){
               /*$('#resultat').html(d.response);*/
               if(Debbug) console.log("updateSelectionEnd success");
            },
            error: function(e){
               if(Debbug) console.log("updateSelectionEnd error" + e);
            },
            complete: function(){
               if(Debbug) console.log("updateSelectionEnd complete");
            }
         }
      );
   };
   
   $('#'+TextId).click(
      function(e){
         e.preventDefault();
         updateSelectionEnd();
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
               if(Debbug) console.log("updateChar beforeSend");
               console.log("char:"+ char);
            },
            success: function(d){
               insert(d.character);
               if(Debbug) console.log("updateChar success");
            },
            error: function(e){
               if(Debbug) console.log("updateChar error" + e);
            },
            complete: function(){
               if(Debbug) console.log("updateChar complete");
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
               if(Debbug) console.log("cutText beforeSend");
            },
            success: function(d){
               cut();
               console.log("cutText success");
            },
            error: function(e){
               if(Debbug) console.log("cutText error" + e);
            },
            complete: function(){
               if(Debbug) console.log("cutText complete");
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
               if(Debbug) console.log("copyText beforeSend");
            },
            success: function(d){
               copy();
               if(Debbug) console.log("copyText success");
            },
            error: function(e){
               if(Debbug) console.log("copyText error" + e);
            },
            complete: function(){
               if(Debbug) console.log("copyText complete");
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
               if(Debbug) console.log("paste beforeSend");
            },
            success: function(d){
               paste(d.text);
               /*$('#resultat').html(d.response);*/
               if(Debbug) console.log("paste success");
            },
            error: function(e){
               if(Debbug) console.log("paste error" + e);
            },
            complete: function(){
               if(Debbug) console.log("paste complete");
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