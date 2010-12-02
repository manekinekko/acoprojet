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
 *
 *
 * @author wassim Chegham & hugo Marchadour
 * @package Memento
 * @version 0.1
 */
class Caretaker
{

	/**
	 * @var unknown_type
	 */
	private $_mementos;

	private $_end;

	private $_current;
	
	private $_buffer;

	public function __construct(&$buffer)
	{
		$this->_end = 0;
		$this->_current = 0;
		$this->_mementos = array();
		$this->_buffer = $buffer;
	}


	public function save(&$commandSave){
		if( $this->_current%10 == 0 ){
			$this->_mementos[$this->_current] = & $this->_buffer->getMemento();
			$this->_current++;
		}
		$this->_mementos[$this->_current] = & $commandSave->getMemento();
		$this->_current++;
		// reset the end
		$this->_end = $this->_current;
	}

	public function getCurrent()
	{ return $this->_current; }

	public function resetCurrent($current){
		$this->_current = $current;
	}

	public function atTheEnd(){
		return !($this->_current < $this->_end);
	}

	public function &getNextMemento()
	{
		if( !$this->atTheEnd() ){
			return $this->_mementos[$this->_current++];
		}
		else
			return null;
	}

	public function decCurrent(){
		if($this->_current > 0){
			$this->_current--;
		}
	}

}


?>