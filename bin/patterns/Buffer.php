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
 * This class represents a buffer, which contains a temporary text content;
 * This is also the concrete subject of the Obsever Design Pattern
 *
 * @author wassim Chegham & hugo Marchadour
 * @category Command
 * @package command
 * @version 0.1
 */
require_once (BINPATH . 'Observer.php');
require_once (BINPATH . 'Subject.php');
require_once (BINPATH . 'Clipboard.php');
require_once (BINPATH . 'Ihm.php');


class Buffer implements Observer, Subject
{

	/**
	 * The content of the current text
	 * @var _text
	 * @access private
	 * @type String
	 */
	private $_text;

	/**
	 * The begining of a selection.
	 * @var _selectionStart
	 * @access private
	 * @type Integer
	 */
	private $_selectionStart;

	/**
	 * The end of a selection
	 * @var _selectionEnd
	 * @access private
	 * @type Integer
	 */
	private $_selectionEnd;

	/**
	 * The clipboard object
	 * @var _clipboard
	 * @access private
	 * @type Clipboard
	 */
	private $_clipboard;

	/**
	 * The array who contains all observers
	 * @var _observers
	 * @access private
	 * @type array observer
	 */
	private $_observers;
	 
	/**
	 * The constructor of the class
	 * @return void
	 */
	public function __construct()
	{
		$this->_text = "";
		$this->_selectionStart = 0;
		$this->_selectionEnd = 0;
		$this->_clipboard = new Clipboard();
	}

	/**
	 * Get the current text
	 * @return the current text
	 * @access public
	 */
	public function getText()
	{
		return $this->_text;
	}

	/**
	 * Set the content of the current text
	 * @return void
	 * @param String $text the new content
	 * @access public
	 */
	public function setText($text)
	{
		$this->_text = $text;
	}

	/**
	 * Get the begining of the selection
	 * @return int the position of the begining of the selection
	 * @access public
	 */
	public function getSelectionStart()
	{
		return $this->_selectionStart;
	}

	/**
	 * Set the end of the selection
	 * @return int the position of the begining of the selection
	 * @access public
	 */
	public function getSelectionEnd()
	{
		return $this->_selectionEnd;
	}

	/**
	 * Set the begining of the selection
	 * @return void
	 * @param Integer $val the begining of the selection
	 * @access public
	 */
	public function setSelectionStart($val)
	{
		$this->_selectionStart = $val;
	}

	/**
	 * Set the end of the selection
	 * @return void
	 * @param Integer $val the end of the selection
	 * @access public
	 */
	public function setSelectionEnd($val)
	{
		$this->_selectionEnd = $val;
	}

	/**
	 * Set the begining and the end of the selection
	 * @return void
	 * @param Integer $start the begining of the selection
	 * @param Integer $end the end of the selection
	 */
	public function setSelection($start, $end)
	{
		if($start <= $end)
		{
			$this->_selectionStart = $start;
			$this->_selectionEnd = $end;
		}
		else
		{
			$this->_selectionStart = $end;
			$this->_selectionEnd = $start;
		}
	}

	/**
	 * Insert a character into the buffer
	 * @return void
	 * @param Character $char the character to be inserted
	 */
	public function insert($char)
	{
		$tmp_str = $this->_text;

		$this->_text = substr($tmp_str, 0, $this->_selectionStart);
		$this->_text .= $char;
		$this->_text .= substr($tmp_str, $this->_selectionEnd);

		$this->_selectionStart++;

		if($this->_selectionStart !== $this->_selectionEnd)
		{
			$this->_selectionEnd = $this->_selectionStart;
		}

	}

	/**
	 * Set a text content into the clipboard
	 * @return void
	 * @access private
	 */
	public function _setTextIntoClipBoard($text)
	{
		$this->_clipboard->setText($text);
	}

	/**
	 * Get a text content from the clipboard
	 * @return String the text content from the clipboard
	 */
	public function _getTextFromClipBoard()
	{
		return $this->_clipboard->getText();
	}

	/** Command methods **/

	/**
	 * Copy the current selection into clipboard
	 * @return void
	 * @access public
	 */
	public function copyText()
	{
		$text = substr($this->_text, $this->_selectionStart, $this->_selectionEnd);

		if ( $text !== "" )
		$this->_setTextIntoClipBoard($text);
	}

	/**
	 * Cut the current selection into clipboard
	 * @return void
	 * @access public
	 */
	public function cutText()
	{

		if( $this->_selectionStart !== $this->_selectionEnd)
		{
			$tmp_str = $this->_text;
				
			$text = substr($tmp_str, $this->_selectionStart, $this->_selectionEnd);
			$this->_setTextIntoClipBoard($text);
				
			$tmp_str = substr($tmp_str, 0, $this->_selectionStart);
			$tmp_str .= substr($tmp_str, $this->_selectionEnd);

			// deselection
			$this->_selectionEnd = $this->_selectionStart;
				
			$this->_text = $tmp_str;

		}

	}

	/**
	 * Paste the content of the clipboard into the buffer
	 * @return void
	 * @access public
	 */
	public function pasteText()
	{

		if( $this->_clipboard->getText() !== "")
		{
				
			$tmp_str = $this->_text;

			$paste = $this->_getTextFromClipBoard();
				
			$tmp_res = substr($tmp_str, 0, $this->_selectionStart);
			$tmp_res .= $paste;
			$tmp_res .= substr($tmp_str, $this->_selectionEnd);
				
			if( $this->_selectionStart !== $this->_selectionEnd )
			{
				// deselection
				$this->_selectionStart += strlen($paste);
			}

			$this->_text = $tmp_res;

		}

	}

	/**  Observer methods **/

	/**
	 * Attach an observer to this concrete subject
	 * @return void
	 * @param Observer $o the observer of this concrete subject
	 */
	public function attach(&$o)
	{
		if(!in_array($o, $this->_observers))
		{
			$this->_observers[] = $o;
		}
	}

	/**
	 * Detach an observer from this concrete subject
	 * @return void
	 * @param Observer $o the observer to be detached
	 */
	public function detach(&$o)
	{
		$index = array_search($o, $this->_observers);
		if($index)
		{
			unset($this->_observers[$index]);
		}
	}

	/**
	 * Notify the observers of this concrete subject
	 * @return void
	 * @access public
	 */
	public function notify()
	{
		foreach($this->_observers as $k => $o)
		{
			$o->update($this);
		}
	}

	/**  Subject methods **/

	public function update(&$s)
	{
		// the IHM subject which notifies the buffer

		// update current state of buffer
		$this->_selectionStart = $s->_selectionStart;
		$this->_selectionEnd = $s->_selectionEnd;
		$this->_text = $s->_text;
	}
}

?>
