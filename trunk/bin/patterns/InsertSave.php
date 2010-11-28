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

require_once (BINPATH . "Command.php");
require_once (BINPATH . "Insert.php");

/**
 *
 *
 * @author wassim Chegham & hugo Marchadour
 * @package Memento
 * @version 0.1
 */

class InsertSave implements Command
{
	/**
	 * @var unknown_type
	 */
	private $_insert, $_caretaker;

	public function __construct(& $insert, & $caretaker)
	{
		$this->_insert = $insert;
		$this->_caretaker = $caretaker;
	}

	public function execute()
	{
		$this->_insert->execute();
		$this->_caretaker->save($this);
	}

	public function &getMemento()
	{
		return new ConcreteMementoInsert(
			$this->_insert->current_char,
			$this->_insert->receiver->getSelectionStart(),
			$this->_insert->receiver->getSelectionEnd()
		);
	}

}