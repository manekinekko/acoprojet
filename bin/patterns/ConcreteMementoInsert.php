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

require_once (BINPATH . "Memento.php");

/**
 * 
 * 
 * @author wassim Chegham & hugo Marchadour
 * @package Memento
 * @version 0.1
 */
 
class ConcreteMementoInsert implements Memento
{
  private $_char;
  private $_selectionStart;
  private $_selectionEnd;
  public function __construct($char, $selStart, $selEnd)
  {
      $this->_char = $char;
      $this->_selectionStart = $selStart;
      $this->_selectionEnd = $selEnd;
  }
}