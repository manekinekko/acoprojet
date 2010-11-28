<?php

/*
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

require_once ('Command.php');

/**
 * The copy command
 * 
 * @author wassim Chegham & hugo Marchadour
 * @package Command
 * @version 0.1
 */
class Copy implements Command
{

	/**
	 * @var Buffer The receiver object of the Copy command (the Buffer)
	 * @access protected
	 */
	protected $receiver;

	/**
	 * The constructor of the Copy command
	 * @return void
	 * @param Buffer $receiver The reference of the receiver object
	 * @access public
	 */
	public function __construct(&$receiver)
	{
		$this->receiver = $receiver;
	}
	
	/**
	 * Perfome the copy action
	 * @return void
	 * @access public
	 */
	public function execute()
	{
		$this->receiver->copyText();
	}
}

?>
