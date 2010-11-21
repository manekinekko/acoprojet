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

  error_reporting(E_ALL);
  
  define("APPPATH", dirname(__FILE__) . "/");
  define("BINPATH", APPPATH . "bin/patterns/");
  define("TESTPATH", APPPATH . "bin/tests/");
  
  // a hack for the PHPUnit framework!
  ini_set('include_path', ini_get('include_path').':'.TESTPATH);
  
?>