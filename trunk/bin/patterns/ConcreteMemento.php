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
 * The ConcreteMemento should be used only in the Originator
 * (and in testing).
 *
 * @author wassim Chegham & hugo Marchadour
 * @category Memento
 * @package memento
 * @version 0.1
 */

require_once (BINPATH . 'Memento.php');

class ConcreteMemento implements Memento
{

	private $_undoArray;
	private $_redoArray;
	private $_maxActionSaved;
	private static $_instance;

	public function __construct()
	{
		$this->_undoArray = array();
		$this->_maxActionSaved = 10;
	}

	public static function getInstance()
	{
		if ( is_null($this->_instance) ) 
		{
			$c = __CLASS__;
			$this->_instance = new $c();
		}
		return $this->_instance;
	}

	public function redo()
	{

		$mem = null;
    
		if( count($this->_redoArray) > 0)
		{

			$mem = array_pop($this->_redoArray);

		}

		return $mem;

	}

	public function undo()
	{

		$mem = null;

		if( count($this->_undoArray) > 0)
		{

			$mem = array_pop($this->_undoArray);

		}

		return $mem;

	}

	public function saveAction($o)
	{

		$mem = new Memento();

		foreach($o as $i){

			$mem[$i] = $o[$i];

		}

		if( count($this->_undoArray) >= $this->_maxActionSaved)
		{

			array_shift($this->_undoArray);

		}

		$this->_undoArray[] = $mem;

	}

	public function saveRedoAction($o){

		$mem = new Memento();

		foreach($o as $i)
		{

			$mem[$i] = $o[$i];

		}

		$this->_redoArray = array();
		$this->_redoArray[] = $mem;

	}

	public function setMaxActions($vam)
	{

		$this->_maxActionSaved = $val;

	}

	public function geUndoArrayLen()
	{

		return cpunt($this->_undoArray);

	}
}


?>