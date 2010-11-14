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
 * @category Observer
 * @package observer
 * @version 0.1
 */

class Buffer
{

	/**
	 * The begining of a selection.
	 * @var selectionStart
	 * @access private
	 * @type Integer
	 */
	private $_selectionStart;
	
	/**
	 * The end of a selection
	 * @var selectionEnd
	 * @access private
	 * @type Integer
	 */
	private $selectionEnd;
	
	/**
	 * The constructor of the class
	 * @return void
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Get the current text
	 * @return the current text
	 * @access public
	 */
	public function getText()
	{
		
	}
	
	/**
	 * Set the content of the current text
	 * @return void
	 * @param String $text the new content
	 * @access public
	 */
	public function setText(String $text)
	{
		
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
	 * Insert a character into the buffer
	 * @return void
	 * @access public
	 */
	public function insert()
	{
		
	}
	
	/**
	 * Set a text content into the clipboard
	 * @return void
	 * @access private
	 */
	private function _setTextIntoClipBoard()
	{
		
	}
	
	/**
	 * Get a text content from the clipboard
	 * @return String the text content from the clipboard
	 */
	private function _getTextFromClipBoard()
	{
		
	}
	
	/** Command methods **/
	
	/**
	 * Copy the current selection into clipboard
	 * @return void
	 * @access public
	 */
	public function copyText()
	{
		
	}
	
	/**
	 * Cut the current selection into clipboard
	 * @return void
	 * @access public
	 */
	public function cutText()
	{
		
	}
	
	/**
	 * Paste the content of the clipboard into the buffer
	 * @return void
	 * @access public
	 */
	public function pasteText()
	{
		
	}
	
	/**  Observer methods **/
	
	/**
	 * Attach an observer to this concrete subject
	 * @return void
	 * @param Observer $o the observer of this concrete subject
	 */
	public function attach($o)
	{
		
	}
	
	/**
	 * Detach an observer from this concrete subject
	 * @return void
	 * @param Observer $o the observer to be detached
	 */
	public function detach($o)
	{
		
	}
	
	/**
	 * Notify the observers of this concrete subject
	 * @return void
	 * @access public
	 */
	public function notify()
	{
		
	}
}

?>