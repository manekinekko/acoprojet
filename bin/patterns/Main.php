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

require_once (BINPATH . 'Singleton.php');
require_once (BINPATH . 'ConcreteMemento.php');
require_once (BINPATH . 'Ihm.php');
require_once (BINPATH . 'Copy.php');
require_once (BINPATH . 'Cut.php');
require_once (BINPATH . 'Paste.php');
require_once (BINPATH . 'Buffer.php');

class Main extends Singleton
{

  public function __construct()
  {
  	parent::instance();
  }
  
  public function __destruct()
  {
  	parent::__destruct();
  }
	
	/** a mock methode **/
	public function debug()
	{
	   echo "<pre>"; var_dump($_SESSION); echo "</pre>";
	}

}

?>
