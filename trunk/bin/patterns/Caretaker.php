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

	private $_index;

	public function __construct()
	{
		$this->_index = 0;
		$this->_mementos = array();
	}
	 
	public function size()
	{
		return count( $this->_mementos);
	}
	
	public function save(&$commandSave){
		$this->_mementos[$this->_index++] =& $commandSave->getMemento();
	}

	public function &getMemento($index)
	{
		if ( $index <= $this->_index )
		{
			// this will allow us to oversave new mementos over old ones
			// Uncomment for version 3
			//$this->_index = $index;
			
			return $this->_mementos[$index];
		}
		
		return null;
	}

}


?>