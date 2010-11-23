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

//require_once (BINPATH . 'ConcreteMemento.php');
require_once (BINPATH . 'Ihm.php');
require_once (BINPATH . 'Copy.php');
require_once (BINPATH . 'Cut.php');
require_once (BINPATH . 'Paste.php');
require_once (BINPATH . 'Buffer.php');

class Main
{

  private $_buffer;
  private $_copy;
  private $_cut;
  private $_paste;
  private $_ihm;


  /**
   * @var represents the instance of the current object
   * @access private
   * @type Main
   */
  private static $_instance = __CLASS__;

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
    else {
    
      session_start();
      $this->_buffer = new Buffer();
      $this->_copy = new Copy($this->_buffer);
      $this->_cut = new Cut($this->_buffer);
      $this->_paste = new Paste($this->_buffer);
      $this->_ihm = new Ihm();
    }

  }

  /**
   * Save the current objet into session
   * @return void
   * @access public
   */
  public function __destruct()
  {
    //$_SESSION[self::$_instance] = serialize($this);
    $_SESSION[self::$_instance] = $this;
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
  public static function getInstance()
  {

    if(isset($_SESSION[self::$_instance]) === false)
    {
      $c = __CLASS__;
      //$_SESSION[self::$_instance] = serialize(new $c());
      $_SESSION[self::$_instance] = new $c();
    }

    //return unserialize($_SESSION[self::$_instance]);
    return $_SESSION[self::$_instance];

  }

  public function executeCopy()
  {
  	$this->_copy->execute();
  }
  
  public function executeCut()
  {
    $this->_cut->execute();
  }
  
  public function executePaste()
  {
    $this->_paste->execute();
  }
  
  public function getText()
  {
  	return $this->_buffer->getText();
  }
  
  public function getSelectionStart()
  {
    return $this->_buffer->getSelectionStart();
  }
  
  public function getSelectionEnd()
  {
    return $this->_buffer->getSelectionEnd();
  }
}

/**/

Main::getInstance();

?>
