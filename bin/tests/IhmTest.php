<?php

include_once(BINPATH . 'Ihm.php');
include_once(BINPATH . 'Buffer.php');

class IhmTest extends PHPUnit_Framework_TestCase
{

	public $ihm, $b;

	public function setUp()
	{
		$this->b = new Buffer();
		$this->ihm = new Ihm($this->b);

		$this->b->attach($this->ihm);
		$this->ihm->attach($this->b);
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
		$this->b->setText("Hello");
		$this->ihm->setSelectionStart(0);
		$this->ihm->setSelectionEnd(4);
		$this->b->setSelectionStart(0);
		$this->b->setSelectionEnd(4);

		$this->ihm->copy();

		$this->assertEquals("Hello", $this->ihm->getText());
		$this->assertEquals("Hell", $this->b->getTextFromClipBoard());
	}

	/**
	 * TO DO
	 */
	public function testcut(){

		$this->ihm->setText("Hello");
		$this->b->setText("Hello");
		$this->ihm->setSelectionStart(0);
		$this->ihm->setSelectionEnd(4);
		$this->b->setSelectionStart(0);
		$this->b->setSelectionEnd(4);

		$this->ihm->cut();

		$this->assertEquals(0, $this->b->getSelectionStart());
		$this->assertEquals(0, $this->b->getSelectionEnd());
		$this->assertEquals("Hell", $this->b->getTextFromClipBoard());

		$this->assertEquals(0, $this->ihm->getSelectionStart());
		$this->assertEquals(0, $this->ihm->getSelectionEnd());

		//		$this->assertEquals("o", $this->ihm->getText());


	}

	public function testpaste(){

		$this->ihm->paste();

		$this->assertEquals("Hell", $this->ihm->getText());
	}

}
?>
