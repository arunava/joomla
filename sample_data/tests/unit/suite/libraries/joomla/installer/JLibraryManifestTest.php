<?php
require_once 'PHPUnit/Framework.php';

require_once JPATH_BASE . '/libraries/joomla/installer/librarymanifest.php';

/**
 * Test class for JLibraryManifest.
 * Generated by PHPUnit on 2009-10-27 at 15:21:01.
 */
class JLibraryManifestTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var JLibraryManifest
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = new JLibraryManifest;
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}

	/**
	 * @todo Implement testLoadManifestFromXML().
	 */
	public function testLoadManifestFromXML()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
		'This test has not been implemented yet.'
		);
	}
}
?>
