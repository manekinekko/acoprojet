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

require_once (BINPATH . "Command.php" );
require_once (BINPATH . "Cut.php");
require_once (BINPATH . "ConcreteMementoCut.php");

/**
 *
 *
 * @author wassim Chegham & hugo Marchadour
 * @package Memento
 * @version 0.1
 */

class CutSave implements Command
{
	/**
	 * @var unknown_type
	 */
	private $_cut, $_caretaker;

	public function __construct(& $insert, & $caretaker)
	{
		$this->_cut = $insert;
		$this->_caretaker = $caretaker;
	}

	public function execute()
	{
		$this->_cut->execute();
		$this->_caretaker->save($this);
	}

	public function &getMemento()
	{
		$mem = new ConcreteMementoCut(
			$this->_insert->receiver->getTextFromClipBoard(),
			$this->_insert->receiver->getSelectionStart(),
			$this->_insert->receiver->getSelectionEnd()
		);
		return $mem;
	}
}