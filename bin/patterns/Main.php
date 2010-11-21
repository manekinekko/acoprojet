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

require_once (BINPATH . 'Ihm.php');
require_once (BINPATH . 'Copy.php');
require_once (BINPATH . 'Cut.php');
require_once (BINPATH . 'Paste.php');
require_once (BINPATH . 'Buffer.php');

class Main
{

	/**
	 * @var represents the instance of the current object
	 * @access private
	 * @type Main
	 */
	private static $_instance;

	/**
	 * The constructor of the class
	 * @return void
	 */
	public function __construct()
	{

		if ( isset($_SESSION[self::$_instance]) == false )
		{
			trigger_error( 'Singleton can only be accessed through Main::instance().', E_USER_ERROR );
		}

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
	 * Instance cloning is forbidden!
	 * @return void
	 * @access public
	 */
	public function __clone()
	{
		trigger_error( 'Clone is not allowed.', E_USER_ERROR );
	}

	/**
	 * Singleton Pattern: keep one instance of the current object
	 * @return the instance of the current object
	 * @access public
	 */
	public static function instance()
	{

		session_start();

		if(isset($_SESSION[self::$_instance]) === true)
		{
			return unserialize($_SESSION[self::$_instance]);
		}

		return new Main();
	}

	/**  **/
	public function scenario()
	{
		 




	}

}

?>
