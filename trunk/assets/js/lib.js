function getChar(evt) {
   var char = '#';
   var charCode = (evt.which) ? evt.which : event.keyCode
   // redefine the char
   /*
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
   */
   char = String.fromCharCode(charCode);
   return char;
}

function getSelectionStart(obj_id) {
   var obj = document.getElementById(obj_id);

   var CaretPos = 0;
   // IE Support
   if (document.selection) {

      obj.focus ();
      var Sel = document.selection.createRange ();

      Sel.moveStart ('character', -obj.value.length);

      CaretPos = Sel.text.length;
   }
   // Firefox support
   else if (obj.selectionStart || obj.selectionStart == '0')
      CaretPos = obj.selectionStart;

   return (CaretPos);
}


function getSelectionEnd(obj_id) {
   var obj = document.getElementById(obj_id);
   
   var caretPos = getSelectionStart(obj_id);
   var text = getSelText(obj_id);
   if( text.length>0 || isNaN(text.length) ){
      caretPos +=  text.length;
   }
   

   return caretPos;
}

function getSelectedText(obj_id){
   var obj = document.getElementById(obj_id);
   
   if (window.getSelection){
      var str = window.getSelection();
   }else if (document.getSelection){
      var str = document.getSelection();
   }else {
      var str = document.selection.createRange().text;
   }
   return str;
}

function getSelText(obj_id){
   var obj = document.getElementById(obj_id);
   
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
   return txt;
}

function setCursor(pos, obj_id){
   var obj = document.getElementById(obj_id);
   
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
}

function setText(str, obj_id){
   var obj = document.getElementById(obj_id);

   //Get the selection bounds
   var start = obj.selectionStart;
   var end = obj.selectionEnd;
 
   //Break up the text by selection
   var text = obj.value;
   var pre = text.substring(0, start);
   var sel = text.substring(start, end);
   var post = text.substring(end,text.length);
 
   //Insert the text at the beginning of the selection
   text = pre + str + sel + post;
 
   //Put the text in the textarea
   obj.value = text;
 
   //Re-establish the selection, adjusted for the added characters.
   obj.selectionStart = start+str.length;
   obj.selectionEnd = end+str.length;
}

function removeSelection(obj_id){
   var obj = document.getElementById(obj_id);
   
   //Get the selection bounds
   var start = obj.selectionStart;
   var end = obj.selectionEnd;
 
   //Break up the text by selection
   var text = obj.value;
   var pre = text.substring(0, start);
   var sel = text.substring(start, end);
   var post = text.substring(end,text.length);
 
   //Insert the text at the beginning of the selection
   text = pre + post;
 
   //Put the text in the textarea
   obj.value = text;
 
   //Re-establish the selection, adjusted for the added characters.
   obj.selectionStart = start;
   obj.selectionEnd = end;
}