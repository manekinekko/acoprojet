<?php

include_once(BINPATH . 'Ihm.php');
include_once(BINPATH . 'Buffer.php');

class IhmTest extends PHPUnit_Framework_TestCase
{

	public $ihm;

	public function setUp()
	{
		$this->b = new Buffer();
		$this->ihm = new Ihm($this->b);
	}

	public function tearDown()
	{
	}

	public function testConstructeur()
	{
		$ihm = new Ihm($this->b);
		$this->assertTrue($this->ihm !== null);
		$this->assertNotSame($this->ihm, $ihm);
	}

	public function testgetChar(){
		$this->assertEquals("#", $this->ihm->getChar());
	}

	public function testSetChar(){
		$this->ihm->setChar("H");
		$this->assertEquals("H", $this->ihm->getChar());
	}

	public function testgetText(){
		$this->assertEquals("", $this->ihm->getText());
	}

	public function testSetText(){
		$this->ihm->setText("Hello");
		$this->assertEquals("Hello", $this->ihm->getText());
	}

	public function testgetSelectionStart(){
		$this->assertEquals(0, $this->ihm->getSelectionStart());

		$this->ihm->setSelectionStart(2);
		$this->assertEquals(2, $this->ihm->getSelectionStart());

	}

	public function testgetSelectionEnd(){
		$this->assertEquals(0, $this->ihm->getSelectionEnd());

		$this->ihm->setSelectionEnd(2);
		$this->assertEquals(2, $this->ihm->getSelectionEnd());

	}

	public function testinsert(){
		$this->ihm->setChar('H');
		$this->ihm->insert();
		$this->assertEquals("H", $this->b->getText());

		$this->ihm->setChar('e');
		$this->ihm->insert();
		$this->assertEquals("He", $this->b->getText());

		$this->ihm->setChar('l');
		$this->ihm->insert();
		$this->assertEquals("Hel", $this->b->getText());

		$this->ihm->setChar('l');
		$this->ihm->insert();
		$this->assertEquals("Hell", $this->b->getText());

		$this->ihm->setChar('o');
		$this->ihm->insert();
		$this->assertEquals("Hello", $this->b->getText());

	}
	
	public function testcopy(){
		
		$this->ihm->setText("Hello");
		$this->ihm->setSelectionStart(0);
		$this->ihm->setSelectionEnd(3);
		$this->ihm->copy();
		
		$this->assertEquals("Hell", $this->b->_getTextFromClipBoard());
	}

}
?>
