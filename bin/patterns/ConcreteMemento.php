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

require_once (BINPATH . 'Memento.php');

/**
 * The ConcreteMemento should be used only in the Originator
 * (and in testing).
 *
 * @author wassim Chegham & hugo Marchadour
 * @package Memento
 * @version 0.1
 */
class ConcreteMemento implements Memento
{
  
	/**
	 * @var Memento[] $_undoArray The undo array that memories the undone commands.
	 * @access private
	 */
	private $_undoArray;
	
	/**
	 * @var Memento[] $_redoArray The redo array that memeories the redone commands.
	 * @access private
	 */
	private $_redoArray;
	
	/**
	 * 
	 * @var Integer $_maxActionSaved The maximum number of actions to be saved.
	 * @access private
	 */
	private $_maxActionSaved;
	
	/**
	 * @var ConcreteMemento $_instance The current instance of this object
	 * @access private
	 * @static
	 */
	private static $_instance;

	/**
	 * The constructor of the ConcreteMemento
	 * @access public 
	 */
	public function __construct()
	{
		$this->_undoArray = array();
		$this->_maxActionSaved = 10;
	}

	/**
	 * Get the current instance of the ConcreteMemeto object
	 * @access public
	 * @return ConcreteMemento The current instance of the ConcreteMemento
	 * @static
	 */
	public static function getInstance()
	{
		if ( is_null($this->_instance) ) 
		{
			$c = __CLASS__;
			$this->_instance = new $c();
		}
		return $this->_instance;
	}

	/**
	 * The redo action
	 * @access public
	 * @return Memento The last saved memento to be redone
	 */
	public function redo()
	{

		$mem = null;
    
		if( count($this->_redoArray) > 0)
		{

			$mem = array_pop($this->_redoArray);

		}

		return $mem;

	}

	/**
	 * The undo action
	 * @access public
	 * @return The last saved memento to be undone
	 */
	public function undo()
	{

		$mem = null;

		if( count($this->_undoArray) > 0)
		{

			$mem = array_pop($this->_undoArray);

		}

		return $mem;

	}

	/**
	 * Save the current command so it can be played again
	 * @param Command $o The command to be saved
	 * @access public
	 * @return void
	 */
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

	/**
	 * Save the current action and clear all the previous actions
	 * @param Command $o The command
	 * @access public
	 * @return void
	 */
	public function saveRedoAction($o){

		$mem = new Memento();

		foreach($o as $i)
		{

			$mem[$i] = $o[$i];

		}
    
		// clear the previous arrat
		$this->_redoArray = array();
		
		// add the new action
		$this->_redoArray[] = $mem;

	}

	/**
	 * Set the new maximum allowed actions
	 * @param Integer $val The maximum number of actions that can be stored
	 * @return void
	 * @access public
	 */
	public function setMaxActions($val)
	{

		$this->_maxActionSaved = $val;

	}

}


?>