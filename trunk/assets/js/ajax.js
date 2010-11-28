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

$(function(){

	// triggered on load
	init();
	
	$('#'+config.html.textareaId).bind("select, click", function(e){

		updateSelection(e);		
		debug();

	}).keypress(function(e){

		var o = getChar(e);
		var char = o.char;
		e.preventDefault();

		// allow ascii chars only:
		// [!] => 33
		// ["] => 34
		// [#] => 35
		// [$] => 36
		// [%] => 37
		// [&] => 38
		// ['] => 39
		// [(] => 40
		// [)] => 41
		// [*] => 42
		// [+] => 43
		// [,] => 44
		// [-] => 45
		// [.] => 46
		// [/] => 47
		// [0] => 48
		// [1] => 49
		// [2] => 50
		// [3] => 51
		// [4] => 52
		// [5] => 53
		// [6] => 54
		// [7] => 55
		// [8] => 56
		// [9] => 57
		// [:] => 58
		// [;] => 59
		// [<] => 60
		// [=] => 61
		// [>] => 62
		// [?] => 63
		// [@] => 64
		// [A] => 65
		// [B] => 66
		// [C] => 67
		// [D] => 68
		// [E] => 69
		// [F] => 70
		// [G] => 71
		// [H] => 72
		// [I] => 73
		// [J] => 74
		// [K] => 75
		// [L] => 76
		// [M] => 77
		// [N] => 78
		// [O] => 79
		// [P] => 80
		// [Q] => 81
		// [R] => 82
		// [S] => 83
		// [T] => 84
		// [U] => 85
		// [V] => 86
		// [W] => 87
		// [X] => 88
		// [Y] => 89
		// [Z] => 90
		// [[] => 91
		// [\] => 92
		// []] => 93
		// [^] => 94
		// [_] => 95
		// [`] => 96
		// [a] => 97
		// [b] => 98
		// [c] => 99
		// [d] => 100
		// [e] => 101
		// [f] => 102
		// [g] => 103
		// [h] => 104
		// [i] => 105
		// [j] => 106
		// [k] => 107
		// [l] => 108
		// [m] => 109
		// [n] => 110
		// [o] => 111
		// [p] => 112
		// [q] => 113
		// [r] => 114
		// [s] => 115
		// [t] => 116
		// [u] => 117
		// [v] => 118
		// [w] => 119
		// [x] => 120
		// [y] => 121
		// [z] => 122
		// [{] => 123
		// [|] => 124
		// [}] => 125
		// [~] => 126
		if( (o.code >= 33 && o.code <= 126) 
				|| o.code == 13 
				|| o.code == 32 ){
			insert(o.char);
			debug();
		}
	
		console.log('char:'+o.char+'; char code:'+o.code);

	});

	$('#cut').click(
			function(e){
				e.preventDefault();
				if ( getSelText(config.html.textareaId) != "" )
				{
					cut();
					debug();
				}
				
			}
	);

	$('#copy').click(
			function(e){
				e.preventDefault();
				if ( getSelText(config.html.textareaId) != "" )
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