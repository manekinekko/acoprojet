/*!
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */


/**
 * 
 * @param evt
 * @return
 */
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
	return {char:char, code:charCode};
}


/**
 * 
 * @return
 */
function debug(){
	$('#pre').load('index.php?debug');
}

/**
 * 
 * @return
 */
function copy() {
	
	var prev_selection = {};
	
	$.ajax({
				url : config.ajax.target,
				type : config.ajax.type,
				data : {
				// paramètres envoyés
				function_name: 'copy'
			}, 
			dataType : config.ajax.dataType, // type de données recues

			beforeSend: function(){
				if(config.debug.all && config.debug.copy) {
					console.log("__________________________");
					console.log("copy");
					console.log("out --->");
					console.log("nothing");
				}
				
				prev_selection.selStart = getSelectionStart(config.html.textareaId);
				prev_selection.selEnd = getSelectionEnd(config.html.textareaId);
				setSelection(config.html.textareaId, prev_selection);
				
			},
			success: function(response){

				if(response != undefined && response.ErrorMsg){ 
					console.log(response.ErrorMsg); 
					console.log(response.ErrorData); 
				}

				if(config.debug.all && response.debug) {
					console.log("_PHP DEBUG_"); 
					console.log("selStart:"+ response.debug.Ihm.selStart);
					console.log("selEnd:"+ response.debug.Ihm.selEnd);
					console.log("text:"+ response.debug.Ihm.text);
					console.log("ihm_hash:"+ response.debug.Ihm.ihm_hash);
					console.log("_PHP DEBUG_"); 
				}

				if(config.debug.all && config.debug.copy) {
					console.log("<--- in");
				}
				
			},
			
			error: function(e){
				console.log("copy error" + e);
			},
			
			complete: function(){
				if(config.debug.all && config.debug.copy) console.log("copy complete");
				
				setSelection(config.html.textareaId, prev_selection);
			}
			
		});
};

/**
 * 
 * @return
 */
function paste() {
	$.ajax(
			{
				url : config.ajax.target,
				type : config.ajax.type,
				data : {
				// paramètres envoyés
				function_name: 'paste'
			}, 
			dataType : config.ajax.dataType, // type de données recues

			beforeSend: function(){
				if(config.debug.all && config.debug.paste) {
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
				if(config.debug.all && response.debug) {
					console.log("_PHP DEBUG_"); 
					console.log("selStart:"+ response.debug.Ihm.selStart);
					console.log("selEnd:"+ response.debug.Ihm.selEnd);
					console.log("text:"+ response.debug.Ihm.text);
					console.log("ihm_hash:"+ response.debug.Ihm.ihm_hash);
					console.log("_PHP DEBUG_"); 
				}
				if(config.debug.all && config.debug.paste) {
					console.log("<--- in");
					console.log("selStart:"+ response.Ihm.selStart);
					console.log("selEnd:"+ response.Ihm.selEnd);
					console.log("text:"+ response.Ihm.text);
				}
				if(response != undefined && response.ErrorMsg){ console.log(response.Error); console.log(response.ErrorData); }
				update(config.html.textareaId, response.Ihm);
			},
			error: function(e){
				console.log("paste error" + e);
			},
			complete: function(){
			}
			}
	);
};

/**
 * 
 * @param char
 * @return
 */
function insert(char) {
	$.ajax(
			{
				url : config.ajax.target,
				type : config.ajax.type,
				data : {
				// paramètres envoyés
				function_name: 'insert', char: char
			}, 
			dataType : config.ajax.dataType, // type de données recues

			beforeSend: function(){
				if(config.debug.all && config.debug.char) {
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
				if(config.debug.all && response.debug) {
					console.log("_PHP DEBUG_"); 
					console.log("selStart:"+ response.debug.Ihm.selStart);
					console.log("selEnd:"+ response.debug.Ihm.selEnd);
					console.log("text:"+ response.debug.Ihm.text);
					console.log("ihm_hash:"+ response.debug.Ihm.ihm_hash);
					console.log("_PHP DEBUG_"); 
				}
				if(config.debug.all && config.debug.char) {
					console.log("<--- in");
					console.log("selStart:"+ response.Ihm.selStart);
					console.log("selEnd:"+ response.Ihm.selEnd);
					console.log("text:"+ response.Ihm.text);
				}
				update(config.html.textareaId, response.Ihm);

			},
			error: function(e){
				console.log("insert error" + e);
			},
			complete: function(){
			}
			}
	);
};


/**
 * 
 * @return
 */
function cut() {
	$.ajax(
			{
				url : config.ajax.target,
				type : config.ajax.type,
				data : {
				// paramètres envoyés
				function_name: 'cut'
			}, 
			dataType : config.ajax.dataType, // type de données recues

			beforeSend: function(){
				if(config.debug.all && config.debug.cut) {
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
				if(config.debug.all && response.debug) {
					console.log("_PHP DEBUG_"); 
					console.log("selStart:"+ response.debug.Ihm.selStart);
					console.log("selEnd:"+ response.debug.Ihm.selEnd);
					console.log("text:"+ response.debug.Ihm.text);
					console.log("ihm_hash:"+ response.debug.Ihm.ihm_hash);
					console.log("_PHP DEBUG_"); 
				}
				if(config.debug.all && config.debug.cut) {
					console.log("<--- in");
					console.log("selStart:"+ response.Ihm.selStart);
					console.log("selEnd:"+ response.Ihm.selEnd);
					console.log("text:"+ response.Ihm.text);
				}
				update(config.html.textareaId, response.Ihm);
			},
			error: function(e){
				console.log("cut error" + e);
			},
			complete: function(){
			}
			}
	);
};


/**
 * 
 * @return
 */
function updateSelection() {

	var textarea = config.html.textareaId;

	$.ajax({
		url : config.ajax.target,
		type : config.ajax.type,
		data : {
		// paramètres envoyés
		function_name: 'updateSelection', selStart: getSelectionStart(textarea), selEnd: getSelectionEnd(textarea)
	}, 

	dataType : config.ajax.dataType, // type de données recues

	beforeSend: function(){
		if(config.debug.all && config.debug.selection) {
			console.log("__________________________");
			console.log("updateSelection");
			console.log("out --->");
			console.log("selStart:"+ getSelectionStart(textarea));
			console.log("selEnd:"+ getSelectionEnd(textarea));
		}
	},

	success: function(response){
		if(response != undefined && response.ErrorMsg){ 
			console.log(response.ErrorMsg); 
			console.log(response.ErrorData); 
		}
		if(config.debug.all && response.debug) {
			console.log("_PHP DEBUG_"); 
			console.log("selStart:"+ response.debug.Ihm.selStart);
			console.log("selEnd:"+ response.debug.Ihm.selEnd);
			console.log("text:"+ response.debug.Ihm.text);
			console.log("ihm_hash:"+ response.debug.Ihm.ihm_hash);
			console.log("_PHP DEBUG_"); 
		}

		update(textarea, response.Ihm);

		if(config.debug.all && config.debug.selection) {
			console.log("<--- in");
			console.log("nothing");
		}
	},

	error: function(e){
		if(config.debug.all && config.debug.selection) console.log("updateSelection error" + e);
	},

	complete: function(){
	}

	});
};

/**
 * 
 * @param id
 * @return
 */
function getCursor(id) 
{
	var el = document.getElementById(id);

	if ( typeof el.selectionStart != 'undefined' )
		return el.selectionStart;
	// IE Support
	el.focus();
	var range = el.createTextRange();
	range.moveToBookmark(document.selection.createRange().getBookmark());
	range.moveEnd('character', el.value.length);
	return el.value.length - range.text.length;

}


/**
 * 
 * @param obj_id
 * @return
 */
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

/**
 * 
 * @param obj_id
 * @return
 */
function getSelectionEnd(obj_id) {
	var obj = document.getElementById(obj_id);

	var caretPos = getSelectionStart(obj_id);
	var text = getSelText(obj_id);
	if( text.length>0 || isNaN(text.length) ){
		caretPos +=  text.length;
	}

	return caretPos;
}

/**
 * 
 * @param obj_id
 * @return
 */
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

/**
 * 
 * @param obj_id
 * @return
 */
function getSelText(obj_id){
	var txtarea = document.getElementById(obj_id);

	var txt = '';
	if (window.getSelection)
	{
		txt = (txtarea.value).substring(txtarea.selectionStart,txtarea.selectionEnd); 
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

/**
 * 
 * @param obj_id
 * @param Ihm
 * @return
 */
function update(obj_id, Ihm){
	
	var obj = document.getElementById(obj_id);
	
	obj.value = Ihm.text;

	setSelection(obj_id, Ihm);

}

/**
 * 
 * @param obj_id
 * @param Ihm
 * @return
 */
function setSelection(obj_id, Ihm){
	var obj = document.getElementById(obj_id);
	console.log(Ihm);
	
	if(obj.setSelectionRange)
	{
		obj.focus();
		obj.setSelectionRange(Ihm.selStart,Ihm.selEnd);
	}
	else if (obj.createTextRange) {
		var range = obj.createTextRange();
		console.log(range);
		range.collapse(true);
		range.moveStart('character', Ihm.selStart);
		range.moveEnd('character', Ihm.selEnd);
		console.log(range);
		range.select();
	}
	
}

/**
 * 
 * @param pos
 * @param obj_id
 * @return
 */
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

/**
 * 
 * @param str
 * @param obj_id
 * @return
 */
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
	obj.selectionStart = end;
	obj.selectionEnd = end;
}

/**
 * 
 * @param obj_id
 * @return
 */
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
