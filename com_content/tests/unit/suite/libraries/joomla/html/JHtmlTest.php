<?php
require_once 'PHPUnit/Framework.php';

require_once JPATH_BASE. DS . 'libraries' . DS . 'joomla' . DS . 'filesystem' . DS . 'path.php';
require_once JPATH_BASE. DS . 'libraries' . DS . 'joomla' . DS . 'html' . DS . 'html.php';

/**
 * Test class for JHtml.
 * Generated by PHPUnit on 2009-10-27 at 15:36:23.
 */
class JHtmlTest extends JoomlaTestCase
{
	/**
	 * @var JHtml
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->saveFactoryState();
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
		$this->restoreFactoryState();
	}

	/**
	 * @todo Implement test_().
	 */
	public function test_()
	{
		// first we test to ensure that if a handler is properly registered, it gets called
		$registered = $this->getMock('MyHtmlClass', array('mockFunction'));

		// test that we can register the method
		JHtml::register('file.testfunction', array($registered, 'mockFunction'));

		// test that calling _ actually calls the function
		$registered->expects($this->once())
			->method('mockFunction')
			->with('Test Return Value')
			->will($this->returnValue('My Expected Return Value'));

		$this->assertThat(
			JHtml::_('file.testfunction', 'Test Return Value'),
			$this->equalTo('My Expected Return Value')
		);

		// we unregister the method to return to our original state
		JHtml::unregister('prefix.file.testfunction');

		// now we test with a class that will be found in the expected file
		JHtml::addIncludePath(array(JPATH_BASE.'/tests/unit/suite/libraries/joomla/html/htmltests'));
		
		$this->assertThat(
			JHtml::_('mocktest.method1', 'argument1', 'argument2'),
			$this->equalTo('JHtml Mock Called')
		);

		$this->assertThat(
			JHtmlMockTest::$arguments[0],
			$this->equalTo(array('argument1', 'argument2'))
		);
		JHtmlMockTest::$arguments = array();

		$this->saveErrorHandlers();
		$mock1 = $this->getMock('errorCallback', array('error1', 'error2', 'error3'));

		JError::setErrorHandling(E_ERROR, 'callback', array($mock1, 'error1'));

		$mock1->expects($this->once())
			->method('error1');

		// we ensure that we get an error if we can find the file but the file does not contain the class
		$this->assertThat(
			JHtml::_('mocktest2.function1'),
			$this->isFalse()
		);

		JError::setErrorHandling(E_ERROR, 'callback', array($mock1, 'error2'));

		$mock1->expects($this->once())
			->method('error2');

		// we ensure that we get an error if we can't find the file
		$this->assertThat(
			JHtml::_('mocktestnotthere.function1'),
			$this->isFalse()
		);

		JError::setErrorHandling(E_ERROR, 'callback', array($mock1, 'error3'));

		$mock1->expects($this->once())
			->method('error3');

		// we ensure that we get an error if we have the class but not the method
		$this->assertThat(
			JHtml::_('mocktest.nomethod'),
			$this->isFalse()
		);

		// restore our error handlers
		$this->setErrorHandlers($this->savedErrorState);
	}

	/**
	 * @todo Implement testRegister().
	 */
	public function testRegister()
	{
		$registered = $this->getMock('MyHtmlClass', array('mockFunction'));

		// test that we can register the method
		$this->assertThat(
			JHtml::register('prefix.file.testfunction', array($registered, 'mockFunction')),
			$this->isTrue(),
			'Function registers properly'
		);

		// test that calling _ actually calls the function
		$registered->expects($this->once())
			->method('mockFunction');

		JHtml::_('prefix.file.testfunction');

		$this->assertThat(
			JHtml::register('prefix.file.missingtestfunction', array($registered, 'missingFunction')),
			$this->isFalse(),
			'If function is missing, we do not register'
		);		
		JHtml::unregister('prefix.file.testfunction');
		JHtml::unregister('prefix.file.missingtestfunction');
	}


	/**
	 * @todo Implement testUnregister().
	 */
	public function testUnregister()
	{
		$registered = $this->getMock('MyHtmlClass', array('mockFunction'));

		// test that we can register the method
		JHtml::register('prefix.file.testfunction', array($registered, 'mockFunction'));

		$this->assertThat(
			JHtml::unregister('prefix.file.testfunction'),
			$this->isTrue(),
			'Function did not unregister'
		);		

		$this->assertThat(
			JHtml::unregister('prefix.file.testkeynotthere'),
			$this->isFalse(),
			'Unregister return true when it should have failed'
		);		

	}

	/**
	 * @todo Implement testCore().
	 */
	public function testCore()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
		'This test has not been implemented yet.'
		);
	}

	public function linkData() {
		return array(
			array(
				'http://www.example.com',
				'Link Text',
				'title="My Link Title"',
				'<a href="http://www.example.com" title="My Link Title">Link Text</a>',
				'Standard link with string attribs failed'
			),
			array(
				'http://www.example.com',
				'Link Text',
				array('title' => 'My Link Title'),
				'<a href="http://www.example.com" title="My Link Title">Link Text</a>',
				'Standard link with array attribs failed'
			)

		);
	} 

	/**
	 * @todo Implement testLink().
	 * @dataProvider linkData
	 */
	public function testLink($url, $text, $attribs, $expected, $msg = '')
	{
		$this->assertThat(
			JHtml::link($url, $text, $attribs),
			$this->equalTo($expected),
			$msg
		);
	}

	/**
	 * @todo Implement testImage().
	 */
	public function testImage()
	{
		if(!is_array($_SERVER)) {
			$_SERVER = array();
		}

		// we save the state of $_SERVER for later and set it to appropriate values
		$http_host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null;
		$script_name = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : null;
		$_SERVER['HTTP_HOST'] = 'example.com';
		$_SERVER['SCRIPT_NAME'] = '/index.php';

		// these are some paths to pass to JHtml for testing purposes
		$urlpath = 'test1/';
		$urlfilename = 'image1.jpg';

		// we generate a random template name so that we don't collide or hit anything
		$template = 'mytemplate'.rand(1,10000);

		// we create a stub (not a mock because we don't enforce whether it is called or not)
		// to return a value from getTemplate
		$mock = $this->getMock('myMockObject', array('getTemplate'));
		$mock->expects($this->any())
			->method('getTemplate')
			->will($this->returnValue($template));

		JFactory::$application = $mock;

		// we create the file that JHtml::image will look for
		mkdir(JPATH_THEMES .'/'. $template .'/images/'. $urlpath, 0777, true);
		file_put_contents(JPATH_THEMES .'/'. $template .'/images/'. $urlpath.$urlfilename, 'test');

		// we do a test for the case that the image is in the templates directory
		$this->assertThat(
			JHtml::image($urlpath.$urlfilename, 'My Alt Text', null, true),
			$this->equalTo('<img src="'.JURI::base(true).'/templates/'.$template.'/images/'.$urlpath.$urlfilename.'" alt="My Alt Text"  />'),
			'JHtml::image failed when we should get it from the templates directory'
		);

		$this->assertThat(
			JHtml::image($urlpath.$urlfilename, 'My Alt Text', null, true, true),
			$this->equalTo(JURI::base(true).'/templates/'.$template.'/images/'.$urlpath.$urlfilename),
			'JHtml::image failed in URL only mode when it should come from the templates directory'
		);

		unlink(JPATH_THEMES .'/'. $template .'/images/'. $urlpath.$urlfilename);
		rmdir(JPATH_THEMES .'/'. $template .'/images/'. $urlpath);
		rmdir(JPATH_THEMES .'/'. $template .'/images');
		rmdir(JPATH_THEMES .'/'. $template);

		$this->assertThat(
			JHtml::image($urlpath.$urlfilename, 'My Alt Text', null, true),
			$this->equalTo('<img src="'.JURI::base(true).'/media/'.$urlpath.'images/'.$urlfilename.'" alt="My Alt Text"  />'),
			'JHtml::image failed when we should get it from the media directory'
		);

		$this->assertThat(
			JHtml::image($urlpath.$urlfilename, 'My Alt Text', null, true, true),
			$this->equalTo(JURI::base(true).'/media/'.$urlpath.'images/'.$urlfilename),
			'JHtml::image failed when we should get it from the media directory in path only mode'
		);

		$extension = 'testextension';
		$element = 'element';
		$urlpath = 'path1/';
		$urlfilename = 'image1.jpg';

		mkdir(JPATH_ROOT .'/media/'. $extension.'/'.$element .'/images/'. $urlpath, 0777, true);
		file_put_contents(JPATH_ROOT .'/media/'. $extension.'/'.$element .'/images/'. $urlpath.$urlfilename, 'test');

		$this->assertThat(
			JHtml::image($extension.'/'.$element.'/'.$urlpath.$urlfilename, 'My Alt Text', null, true),
			$this->equalTo('<img src="'.JURI::base(true).'/media/'. $extension.'/'.$element .'/images/'. $urlpath.$urlfilename.'" alt="My Alt Text"  />'),
			'JHtml::image failed when we should get it from the media directory, with the plugin fix'
		);

		$this->assertThat(
			JHtml::image($extension.'/'.$element.'/'.$urlpath.$urlfilename, 'My Alt Text', null, true, true),
			$this->equalTo(JURI::base(true).'/media/'. $extension.'/'.$element .'/images/'. $urlpath.$urlfilename),
			'JHtml::image failed when we should get it from the media directory, with the plugin fix path only mode'
		);
		// we remove the file from the media directory
		unlink(JPATH_ROOT .'/media/'. $extension.'/'.$element .'/images/'. $urlpath.$urlfilename);
		rmdir(JPATH_ROOT .'/media/'. $extension.'/'.$element .'/images/'. $urlpath);
		rmdir(JPATH_ROOT .'/media/'. $extension.'/'.$element .'/images');
		rmdir(JPATH_ROOT .'/media/'. $extension.'/'.$element);
		rmdir(JPATH_ROOT .'/media/'. $extension);

		$this->assertThat(
			JHtml::image($extension.'/'.$element.'/'.$urlpath.$urlfilename, 'My Alt Text', null, true),
			$this->equalTo('<img src="'.JURI::base(true).'/media/'. $extension.'/images/'.$element.'/'. $urlpath.$urlfilename.'" alt="My Alt Text"  />')
		);

		$this->assertThat(
			JHtml::image($extension.'/'.$element.'/'.$urlpath.$urlfilename, 'My Alt Text', null, true, true),
			$this->equalTo(JURI::base(true).'/media/'. $extension.'/images/'.$element.'/'.$urlpath.$urlfilename)
		);

		$this->assertThat(
			JHtml::image('http://www.example.com/test/image.jpg', 'My Alt Text',
				array(
					'width' => 150,
					'height' => 150
				)
			),
			$this->equalTo('<img src="http://www.example.com/test/image.jpg" alt="My Alt Text" width="150" height="150" />'),
			'JHtml::image with an absolute path'
		);

		$this->assertThat(
			JHtml::image('test/image.jpg', 'My Alt Text',
				array(
					'width' => 150,
					'height' => 150
				)
			),
			$this->equalTo('<img src="'.JURI::root(true).'/test/image.jpg" alt="My Alt Text" width="150" height="150" />'),
			'JHtml::image with an absolute path, URL does not start with http'
		);


		$_SERVER['HTTP_HOST'] = $http_host;
		$_SERVER['SCRIPT_NAME'] = $script_name;

	}

	public function iframeData() {
		return array(
			array(
				'http://www.example.com',
				'Link Text',
				'title="My Link Title"',
				'',
				'<iframe src="http://www.example.com" title="My Link Title" name="Link Text"></iframe>',
				'Iframe with text attribs, no noframes text failed'
			),
			array(
				'http://www.example.com',
				'Link Text',
				array('title' => 'My Link Title'),
				'',
				'<iframe src="http://www.example.com" title="My Link Title" name="Link Text"></iframe>',
				'Iframe with array attribs failed'
			)

		);
	} 


	/**
	 * @todo Implement testIframe().
	 * @dataProvider iframeData
	 */
	public function testIframe($url, $name, $attribs, $noFrames, $expected, $msg = '')
	{
		$this->assertThat(
			JHtml::iframe($url, $name, $attribs, $noFrames),
			$this->equalTo($expected),
			$msg
		);
	}

	/**
	 * @todo Implement testScript().
	 */
	public function testScript()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
		'This test has not been implemented yet.'
		);
	}

	/**
	 * @todo Implement testSetFormatOptions().
	 */
	public function testSetFormatOptions()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
		'This test has not been implemented yet.'
		);
	}

	/**
	 * @todo Implement testImage().
	 */
	public function testStylesheet()
	{
		if(!is_array($_SERVER)) {
			$_SERVER = array();
		}

		// we save the state of $_SERVER for later and set it to appropriate values
		$http_host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null;
		$script_name = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : null;
		$_SERVER['HTTP_HOST'] = 'example.com';
		$_SERVER['SCRIPT_NAME'] = '/index.php';

		// these are some paths to pass to JHtml for testing purposes
		$extension = 'testextension';
		$element = 'element';
		$cssfilename = 'stylesheet.css';


		// we generate a random template name so that we don't collide or hit anything
		$template = 'mytemplate'.rand(1,10000);

		// we create a stub (not a mock because we don't enforce whether it is called or not)
		// to return a value from getTemplate
		$mock = $this->getMock('myMockObject', array('getTemplate'));
		$mock->expects($this->any())
			->method('getTemplate')
			->will($this->returnValue($template));

		JFactory::$application = $mock;

		// we create the file that JHtml::image will look for
		mkdir(JPATH_THEMES .'/'. $template .'/css/'.$extension, 0777, true);
		file_put_contents(JPATH_THEMES .'/'. $template .'/css/'.$extension.'/'.$cssfilename, 'test');

		$docMock1 = $this->getMock('myMockDoc1', array('addStylesheet'));

		$docMock1->expects($this->once())
			->method('addStylesheet')
			->with(
				JURI::base(true).'/templates/'.$template.'/css/'.$extension.'/'.$cssfilename,
				'text/css',
				null,
				null
		);

		JFactory::$document = $docMock1;

		// we can't directly assert anything about the return value because it doesn't return anything
		JHtml::stylesheet($extension.'/'.$cssfilename, null, true);

		$this->assertThat(
			JHtml::stylesheet($extension.'/'.$cssfilename, null, true, true),
			$this->equalTo(JURI::base(true).'/templates/'.$template.'/css/'.$extension.'/'.$cssfilename),
			'Stylesheet in the template directory failed'
		);

		unlink(JPATH_THEMES .'/'. $template .'/css/'.$extension.'/'. $cssfilename);
		rmdir(JPATH_THEMES .'/'. $template .'/css/'.$extension);
		rmdir(JPATH_THEMES .'/'. $template .'/css');
		rmdir(JPATH_THEMES .'/'. $template);

		$docMock2 = $this->getMock('myMockDoc2', array('addStylesheet'));

		$docMock2->expects($this->once())
			->method('addStylesheet')
			->with(
				JURI::base(true).'/media/'.$extension.'/css/'.$cssfilename,
				'text/css',
				null,
				null
		);

		JFactory::$document = $docMock2;

		JHtml::stylesheet($extension.'/'.$cssfilename, null, true);

		$this->assertThat(
			JHtml::stylesheet($extension.'/'.$cssfilename, null, true, true),
			$this->equalTo(JURI::root(true).'/media/'.$extension.'/css/'.$cssfilename),
			'Stylesheet in the media directory failed - path only'
		);

		// we create the file that JHtml::stylesheet will look for
		mkdir(JPATH_ROOT .'/media/'.$extension.'/'.$element.'/css/', 0777, true);
		file_put_contents(JPATH_ROOT .'/media/'.$extension.'/'.$element.'/css/'.$cssfilename, 'test');

		$this->assertThat(
			JHtml::stylesheet($extension.'/'.$element.'/'.$cssfilename, null, true, true),
			$this->equalTo(JURI::root(true).'/media/'.$extension.'/'.$element.'/css/'.$cssfilename),
			'Stylesheet in the media directory -plugins group code - failed - path only'
		);

		unlink(JPATH_ROOT .'/media/'.$extension.'/'.$element.'/css/'.$cssfilename);
		rmdir(JPATH_ROOT .'/media/'.$extension.'/'.$element.'/css/');
		rmdir(JPATH_ROOT .'/media/'.$extension.'/'.$element);
		rmdir(JPATH_ROOT .'/media/'.$extension);
		
		$this->assertThat(
			JHtml::stylesheet($extension.'/'.$element.'/'.$cssfilename, null, true, true),
			$this->equalTo(JURI::root(true).'/media/'.$extension.'/css/'.$element.'/'.$cssfilename),
			'Stylesheet in the media directory -plugins group code - failed - path only'
		);


		$docMock3 = $this->getMock('myMockDoc3', array('addStylesheet'));

		$docMock3->expects($this->once())
			->method('addStylesheet')
			->with(
				JURI::root(true).'/path/to/stylesheet.css',
				'text/css',
				null,
				'media="print" title="sample title"'
		);

		JFactory::$document = $docMock3;

		JHtml::stylesheet('path/to/stylesheet.css', array('media' => 'print', 'title' => 'sample title'));

		$_SERVER['HTTP_HOST'] = $http_host;
		$_SERVER['SCRIPT_NAME'] = $script_name;

	}

	/**
	 * @todo Implement testDate().
	 */
	public function testDate()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
		'This test has not been implemented yet.'
		);
	}

	/**
	 * @todo Implement testTooltip().
	 */
	public function testTooltip()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
		'This test has not been implemented yet.'
		);
	}

	/**
	 * @todo Implement testCalendar().
	 */
	public function testCalendar()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
		'This test has not been implemented yet.'
		);
	}

	/**
	 * @todo Implement testAddIncludePath().
	 */
	public function testAddIncludePath()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
		'This test has not been implemented yet.'
		);
	}
}