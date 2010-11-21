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
 * This class represents a singleton pattern
 *
 * @author wassim Chegham & hugo Marchadour
 * @category Singleton
 * @package singleton
 * @version 0.1
 */


class Singleton
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

		if ( isset($_SESSION[self::$_instance]) )
		{
			trigger_error( 'Singleton can only be accessed through ' .__CLASS__. '::instance().', E_USER_ERROR );
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
	 * Object cloning is forbidden!
	 * @return void
	 * @access public
	 */
	public function __clone()
	{
		trigger_error( 'Clone is not allowed.', E_USER_ERROR );
	}

	/**
	 * Singleton Pattern: keep a single instance of the current object
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
  
		$c = __CLASS__;
		return new $c();
		 
	}




}

?>