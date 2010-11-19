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

/**
 * The copy command
 * 
 * @author wassim Chegham & hugo Marchadour
 * @category Command
 * @package command
 * @version 0.1
 */

require_once ('./bin/patterns/command/Command.php');

class Copy implements Command
{
	/**
	 * @var the object receiver that 
	 * @access protected
	 * @type Buffer
	 */
	protected $_receiver;

	/**
	 * The constructor of the class
	 * @return void
	 * @param Buffer $receiver the object receiver
	 * @access public
	 */
	public function __construct($receiver)
	{
		$this->_receiver = $receiver;
	}
	
	/**
	 * Perfome the copy action
	 * @return void
	 * @access public
	 */
	public function execute()
	{
		$this->_receiver->copyText();
	}
}

?>