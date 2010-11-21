var Debbug = true;
var Debbug1 = false;
var TextId = 'text';

function getChar(evt) {
   var char = '#';
   var charCode = (evt.which) ? evt.which : event.keyCode
   char = String.fromCharCode(charCode);
   
   if (charCode == 8) char = "backspace"; //  backspace
   if (charCode == 9) char = "tab"; //  tab
   if (charCode == 13) char = "enter"; //  enter
   if (charCode == 16) char = "shift"; //  shift
   if (charCode == 17) char = "ctrl"; //  ctrl
   if (charCode == 18) char = "alt"; //  alt
   if (charCode == 19) char = "pause/break"; //  pause/break
   if (charCode == 20) char = "caps lock"; //  caps lock
   if (charCode == 27) char = "escape"; //  escape
   if (charCode == 33) char = "page up"; // page up, to avoid displaying alternate character and confusing people            
   if (charCode == 34) char = "page down"; // page down
   if (charCode == 35) char = "end"; // end
   if (charCode == 36) char = "home"; // home
   if (charCode == 37) char = "left arrow"; // left arrow
   if (charCode == 38) char = "up arrow"; // up arrow
   if (charCode == 39) char = "right arrow"; // right arrow
   if (charCode == 40) char = "down arrow"; // down arrow
   if (charCode == 45) char = "insert"; // insert
   if (charCode == 46) char = "delete"; // delete
   if (charCode == 91) char = "left window"; // left window
   if (charCode == 92) char = "right window"; // right window
   if (charCode == 93) char = "select key"; // select key
   if (charCode == 96) char = "numpad 0"; // numpad 0
   if (charCode == 97) char = "numpad 1"; // numpad 1
   if (charCode == 98) char = "numpad 2"; // numpad 2
   if (charCode == 99) char = "numpad 3"; // numpad 3
   if (charCode == 100) char = "numpad 4"; // numpad 4
   if (charCode == 101) char = "numpad 5"; // numpad 5
   if (charCode == 102) char = "numpad 6"; // numpad 6
   if (charCode == 103) char = "numpad 7"; // numpad 7
   if (charCode == 104) char = "numpad 8"; // numpad 8
   if (charCode == 105) char = "numpad 9"; // numpad 9
   if (charCode == 106) char = "multiply"; // multiply
   if (charCode == 107) char = "add"; // add
   if (charCode == 109) char = "subtract"; // subtract
   if (charCode == 110) char = "decimal point"; // decimal point
   if (charCode == 111) char = "divide"; // divide
   if (charCode == 112) char = "F1"; // F1
   if (charCode == 113) char = "F2"; // F2
   if (charCode == 114) char = "F3"; // F3
   if (charCode == 115) char = "F4"; // F4
   if (charCode == 116) char = "F5"; // F5
   if (charCode == 117) char = "F6"; // F6
   if (charCode == 118) char = "F7"; // F7
   if (charCode == 119) char = "F8"; // F8
   if (charCode == 120) char = "F9"; // F9
   if (charCode == 121) char = "F10"; // F10
   if (charCode == 122) char = "F11"; // F11
   if (charCode == 123) char = "F12"; // F12
   if (charCode == 144) char = "num lock"; // num lock
   if (charCode == 145) char = "scroll lock"; // scroll lock
   if (charCode == 186) char = ";"; // semi-colon
   if (charCode == 187) char = "="; // equal-sign
   if (charCode == 188) char = ","; // comma
   if (charCode == 189) char = "-"; // dash
   if (charCode == 190) char = "."; // period
   if (charCode == 191) char = "/"; // forward slash
   if (charCode == 192) char = "`"; // grave accent
   if (charCode == 219) char = "["; // open bracket
   if (charCode == 220) char = "\\"; // back slash
   if (charCode == 221) char = "]"; // close bracket
   if (charCode == 222) char = "'"; // single quote
   return char;
}

function getSelectionStart () {
   var ctrl = document.getElementById(TextId);
   var CaretPos = 0;
   // IE Support
   if (document.selection) {

      ctrl.focus ();
      var Sel = document.selection.createRange ();

      Sel.moveStart ('character', -ctrl.value.length);

      CaretPos = Sel.text.length;
   }
   // Firefox support
   else if (ctrl.selectionStart || ctrl.selectionStart == '0')
      CaretPos = ctrl.selectionStart;

   return (CaretPos);
}


function getSelectionEnd () {
   var caretPos = getSelectionStart();
   var text = getSelText();
   if( text.length>0 || isNaN(text.length) ){
      caretPos +=  text.length;
   }
   

   return caretPos;
}


/*function setCursor(pos, obj){
   if(obj.setSelectionRange)
   {
      obj.focus();
      obj.setSelectionRange(pos,pos);
   }
   else if (obj.createTextRange) {
      var range = obj.createTextRange();
      range.collapse(true);
      range.moveEnd('character', pos);
      range.moveStart('character', pos);
      range.select();
   }
}*/

function getSelectedText(){
   if (window.getSelection){
      var str = window.getSelection();
   }else if (document.getSelection){
      var str = document.getSelection();
   }else {
      var str = document.selection.createRange().text;
   }
   return str;
}

function getSelText()
{
   var txt = '';
   if (window.getSelection)
   {
      txt = window.getSelection().toString();
   }
   else if (document.getSelection)
   {
      txt = document.getSelection().toString();
   }
   else if (document.selection)
   {
      txt = document.selection.createRange().text;
   }
   console.log(txt);
   return txt;
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
               fn: 'updateSelectionStart',
               selStart: getSelectionStart()
            }, 
            dataType : default_dataType, // type de données recues
            
            beforeSend: function(){
               if(Debbug) console.log("updateSelectionStart beforeSend");
               if(Debbug) console.log("selStart:"+ getSelectionStart());
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
               fn: 'updateSelectionEnd',
               selEnd: getSelectionEnd()
            }, 
            dataType : default_dataType, // type de données recues
            
            beforeSend: function(){
               if(Debbug) console.log("updateSelectionEnd beforeSend");
               if(Debbug) console.log("selEnd:"+ getSelectionEnd());
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
               fn: 'updateChar',
               char: char
            }, 
            dataType : default_dataType, // type de données recues
            
            beforeSend: function(){
               if(Debbug) console.log("updateChar beforeSend");
               if(Debbug) console.log("char:"+ char);
            },
            success: function(d){
               /*$('#resultat').html(d.response);*/
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
               fn: 'cutText'
            }, 
            dataType : default_dataType, // type de données recues
            
            beforeSend: function(){
               if(Debbug) console.log("cutText beforeSend");
            },
            success: function(d){
               /*$('#resultat').html(d.response);*/
               if(Debbug) console.log("cutText success");
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
               fn: 'copyText'
            }, 
            dataType : default_dataType, // type de données recues
            
            beforeSend: function(){
               if(Debbug) console.log("copyText beforeSend");
            },
            success: function(d){
               /*$('#resultat').html(d.response);*/
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
               fn: 'pasteText'
            }, 
            
            beforeSend: function(){
               if(Debbug) console.log("paste beforeSend");
            },
            success: function(d){
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