<?php

include_once(BINPATH . 'Ihm.php');

class IhmTest extends PHPUnit_Framework_TestCase
{

  public $ihm;

  public function setUp()
  {
    $this->ihm = new Ihm();
  }

  public function tearDown()
  {
  }
  
  public function testConstructeur()
  {
    $this->ihm = new Ihm();
    $this->assertTrue($this->ihm !== null);
    $this->assertNotSame($this->ihm, $this->ihm);
  }

  public function testgetText(){
    $this->assertEquals("", $this->ihm->getText());
  }

  public function testSetText(){
    $this->ihm->setText("Hello");
    $this->assertEquals("Hello", $this->ihm->getText());
  }

  
}
?>
