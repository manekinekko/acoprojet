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

class ConcreteMementoInsert implements Memento
{
	private $_char;
	private $_selectionStart;
	private $_selectionEnd;

	private $_saveCommand;

	public function __construct(&$command, $attrs)
	{
		$this->_saveCommand = $command;
		$this->_char = $attrs['char'];
		$this->_selectionStart = $attrs['selStart'];
		$this->_selectionEnd = $attrs['selEnd'];
	}

	public function getSelectionStart()
	{
		return $this->_selectionStart;
	}
	
	public function getSelectionEnd()
	{
		return $this->_selectionEnd;
	}

	public function getChar()
	{
		return $this->_char;
	}
	
	public function redo()
	{
		$this->_saveCommand->setMemento($this);
		$this->_saveCommand->getCommand()->execute();
	}

	/**
	 * (non-PHPdoc)
	 * @see bin/patterns/Memento#undo()
	 */
	public function undo()
	{
	}

}

?>