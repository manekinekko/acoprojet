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
 * The InsertChar command
 *
 * @author wassim Chegham & hugo Marchadour
 * @category Command
 * @package command
 * @version 0.1
 */

require_once ('Command.php');

class Insert implements Command
{
	/**
	 * @var the object receiver that
	 * @access protected
	 * @type Buffer
	 */
	protected $_receiver, $_sender;
  public $crtime,$insert_hash, $receiver_hash, $sender_hash;
	private $_current_char;

	/**
	 * The constructor of the class
	 * @return void
	 * @param Buffer $receiver the object receiver
	 * @access public
	 */
	public function __construct(&$sender, &$receiver)
	{
		$this->_receiver = $receiver;
		$this->_sender = $sender;
 
		$this->_current_char = '#';
		$this->crtime = strftime("%T", time());
		$this->insert_hash = spl_object_hash ($this);
      
    $this->sender_hash = $sender->ihm_hash;
    $this->receiver_hash = $receiver->buffer_hash;
    
	}

	/**
	 * Perfome the copy action
	 * @return void
	 * @access public
	 */
	public function execute()
	{
		$char = $this->_sender->getChar();
		$this->_current_char = $char;
		$this->_receiver->insert($char);
	}
}

?>
