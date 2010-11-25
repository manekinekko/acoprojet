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
 * The Ihm Observer
 * 
 * @author wassim Chegham & hugo Marchadour
 * @category Observer
 * @package observer
 * @version 0.1
 */
require_once ('Observer.php');
require_once ('Subject.php');
require_once ('Insert.php');
require_once ('Copy.php');
require_once ('Cut.php');
require_once ('Paste.php');

class Ihm implements Observer, Subject
{
   
   private $_crtime;
   private $_ihm_hash;
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
    */
   private $_current_char;  
   
   /**
    */
   private $_commands;  

   /**
    * The constructor of the class
    * @return void
    */
   public function __construct(&$buffer)
   {
      $this->_ihm_hash = spl_object_hash ($this);
      $this->_commands = array();
      $this->_observers = array();
      $this->_commands['insert']= new Insert($this, $buffer);
      $this->_commands['copy'] = new Copy($buffer);
      $this->_commands['cut'] = new Cut($buffer);
      $this->_commands['paste'] = new Paste($buffer);

      $this->_text = "";
      $this->_current_char = '#';
      $this->_selectionStart = 0;
      $this->_selectionEnd = 0;
      $this->_crtime = strftime("%T", time());
      $this->_hash = spl_object_hash($this);
   }

   public function getChar()
   {
      return $this->_current_char;
   }
   
   public function setChar($char)
   {
      $this->_current_char = $char;
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

   public function insert()
   {
       $this->_commands['insert']->execute();
   }

   public function copy()
   {
       $this->_commands['copy']->execute();
   }
   
   public function cut()
   {
      $this->_commands['cut']->execute();
   }
   
   public function paste()
   {
      $this->_commands['paste']->execute();
   }

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
   
   /**  Observer methods **/

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
      // the buffer subject which notifies that something has happened

      // update current state of ihm
      $this->_selectionStart = $s->_selectionStart;
      $this->_selectionEnd = $s->_selectionEnd;
      $this->_text = $s->_text;
   }
}

?>
