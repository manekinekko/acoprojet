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

	$('#'+config.html.textareaId).bind("select, click", function(e){

		updateSelection(e);		
		debug();

	}).keypress(function(e){

		var o = getChar(e);
		var char = o.char;
		e.preventDefault();

		// allow ascii chars only
		if( ( o.code == 8 || o.code == 9 ) 
				|| ( o.code >= 13 && o.code <= 111) 
				|| ( o.code >= 114 && o.code <= 222 ) 
		)
		{
			insert(o.char);
			debug();
		}
	
		console.log('char:'+o.char+'; char code:'+o.code);

	});

	$('#cut').click(
			function(e){
				e.preventDefault();
				if ( getSelectedText() != "" )
				{
					cut();
					debug();
				}
				
			}
	);

	$('#copy').click(
			function(e){
				e.preventDefault();
				if ( getSelectedText() != "" )
				{
					copy();
					debug();
				}
			}
	);

	$('#paste').click(
			function(e){
				e.preventDefault();
				paste();
				debug();
			}
	);

});