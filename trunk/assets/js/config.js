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

var config = {};
config.debug = {};
config.ajax = {};
config.html = {};

config.ajax.target = "index.php?ajax";
config.ajax.type = "POST";
config.ajax.dataType = "json";

config.debug.all = true;
config.debug.selection = true;
config.debug.char = true;
config.debug.paste = true;
config.debug.copy = true;
config.debug.cut = true;

config.html.textareaId = 'text';
config.html.logId = 'log';