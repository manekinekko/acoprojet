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

require_once (BINPATH . "Memento.php");

/**
 *
 *
 * @author wassim Chegham & hugo Marchadour
 * @package Memento
 * @version 0.1
 */

class ConcreteMementoPaste implements Memento
{

	private $_clipboardText;
	private $_selectionStart;
	private $_selectionEnd;
	private $_command;

	public function __construct(&$command, $attrs)
	{
		$this->_command = $command;
		$this->_clipboardText = $attrs['clipboardText'];
		$this->_selectionStart = $attr['selStart'];
		$this->_selectionEnd = $attrs['selEnd'];
	}
	
	public function &getCommand()
	{
		return $this->_command;
	}
	
	public function redo()
	{
		$this->_command->setMemento($this)->execute();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see bin/patterns/Memento#undo()
	 */
	public function undo()
	{ 
	}

}