<?php

include_once(BINPATH . 'Buffer.php');

class BufferTest extends PHPUnit_Framework_TestCase
{

	public $b;

	public function setUp()
	{
		$this->b = new Buffer();
	}

	public function tearDown()
	{
	}

	public function testConstructeur()
	{
		$thisb = new Buffer();
		$this->assertTrue($this->b !== null);
		$this->assertNotSame($this->b, $thisb);
	}

	public function testgetText(){
		$this->assertEquals("", $this->b->getText());
	}

	public function testSetText(){
		$this->b->setText("Hello");
		$this->assertEquals("Hello", $this->b->getText());
	}

	public function testgetSelectionStart(){
		$this->assertEquals(0, $this->b->getSelectionStart());

		$this->b->setSelectionStart(2);
		$this->assertEquals(2, $this->b->getSelectionStart());

	}

	public function testgetSelectionEnd(){
		$this->assertEquals(0, $this->b->getSelectionEnd());

		$this->b->setSelectionEnd(2);
		$this->assertEquals(2, $this->b->getSelectionEnd());

	}

	public function testSetSelection(){
		$this->b->setSelection(0, 10);
		$this->assertEquals(0, $this->b->getSelectionStart());
		$this->assertEquals(10, $this->b->getSelectionEnd());
	}

	public function testcopyText() {
		$this->b->setText("Hello");

		$this->b->setSelection(0, 4);
		$this->b->copyText();
		$this->assertEquals("Hell", $this->b->_getTextFromClipboard());

		$this->b->setSelection(4, 0);
		$this->b->copyText();
		$this->assertEquals("Hell", $this->b->_getTextFromClipboard());

		$this->b->setSelection(2, 2);
		$this->b->copyText(); // ne doit rien changer
		$this->assertEquals("ll", $this->b->_getTextFromClipboard());
	}

	public function testpasteText() {

		$this->b->_setTextIntoClipboard("Hello"); // Hello dans le PP
		$this->b->pasteText();
		$this->assertEquals("Hello", $this->b->getText());

		$this->b->setSelection(2, 4);
		$this->b->pasteText();
		$this->assertEquals("HeHelloo", $this->b->getText());

		$this->b->_setTextIntoClipboard(""); // rien dans le PP
		$this->b->pasteText();
		$this->assertEquals("HeHelloo", $this->b->getText());
	}

	public function testcutText() {
		// Test cutText
		$this->b->setText("Hello");
		$this->b->setSelection(2, 4);
		$this->b->cutText();
		$this->assertEquals("He", $this->b->getText());
		$this->assertEquals("llo", $this->b->_getTextFromClipboard());

		$this->assertEquals(2, $this->b->getSelectionStart());
		$this->assertEquals(2, $this->b->getSelectionEnd());

		// Test cutText inverse
		$this->b->setText("Hello");
		$this->b->setSelection(4, 2);
		$this->b->cutText();
		$this->assertEquals("He", $this->b->getText());
		$this->assertEquals("llo", $this->b->_getTextFromClipboard());

		$this->assertEquals(2, $this->b->getSelectionStart());
		$this->assertEquals(2, $this->b->getSelectionEnd());

		// Test cutText qui ne change pas l'état du buffer & pp
		$this->b->setSelection(3, 3);
		$this->b->cutText();
		$this->assertEquals("He", $this->b->getText());
		$this->assertEquals("llo", $this->b->_getTextFromClipboard());

		$this->assertEquals(3, $this->b->getSelectionStart());
		$this->assertEquals(3, $this->b->getSelectionEnd());

	}

	public function testinsert() {

		$this->b->insert('H');
		$this->b->insert('e');
		$this->b->insert('l');
		$this->b->insert('l');
		$this->b->insert('o');
		$this->assertEquals("Hello", $this->b->getText());

		$this->assertEquals(5, $this->b->getSelectionStart());
		$this->assertEquals(5, $this->b->getSelectionEnd());

		$this->b->setSelection(2, 5);
		$this->b->insert('o');
		$this->assertEquals("Heo", $this->b->getText());

		$this->assertEquals(3, $this->b->getSelectionStart());
		$this->assertEquals(3, $this->b->getSelectionEnd());

		$this->b->setSelection(2, 2);
		$this->b->insert('l');
		$this->b->insert('l');
		$this->assertEquals("Hello", $this->b->getText());


		$this->assertEquals(4, $this->b->getSelectionStart());
		$this->assertEquals(4, $this->b->getSelectionEnd());

		$this->b->setSelection(5, 2);
		$this->b->insert('o');
		$this->assertEquals("Heo", $this->b->getText());

		$this->assertEquals(3, $this->b->getSelectionStart());
		$this->assertEquals(3, $this->b->getSelectionEnd());

		$this->b->setSelection(2, 3);
		$this->b->insert('l');
		$this->b->insert('l');
		$this->assertEquals("Hell", $this->b->getText());

		$this->assertEquals(4, $this->b->getSelectionStart());
		$this->assertEquals(4, $this->b->getSelectionEnd());

		$this->b->setSelection(4, 4);
		$this->b->insert('o');
		$this->assertEquals("Hello", $this->b->getText());

		$this->assertEquals(5, $this->b->getSelectionStart());
		$this->assertEquals(5, $this->b->getSelectionEnd());
	}

}

?>
