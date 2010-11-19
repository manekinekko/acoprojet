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
 * This class represents the main entry of the application
 * 
 * @author wassim Chegham & hugo Marchadour
 * @category Command
 * @package command
 * @version 0.1
 */

require_once ("patterns/Ihm.php");
require_once ("patterns/Copy.php");
require_once ("patterns/Cut.php");
require_once ("patterns/Paste.php");
require_once ("patterns/Buffer.php");

class Main
{
	
	/**
	 * @var
	 * @access
	 * @type
	 */
	private static $_instance;

	/**
	 * The constructor of the class
	 * @return void
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Save the current objet into session
	 * @return void
	 * @access public
	 */
	public function __destruct()
	{
		$_SESSION[self::$_instance] = serialize($this);
	}
	
	/**
	 * Singleton Pattern: keep one instance of the current object
	 * @return the instance of the current object
	 * @access public
	 */
	public static function instance()
	{
		/**
		 * Permet d'avoir l'instance courante de l'application
		 */
		session_start();
		
		if(isset($_SESSION[self::$_instance]) === TRUE)
		{
			return unserialize($_SESSION[self::$_instance]);
		}
		
		return new Main();
	}
}

?>