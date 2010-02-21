<?php
require_once 'PHPUnit/Framework.php';

require_once JPATH_BASE.'/libraries/joomla/registry/registry.php';
require_once JPATH_BASE.'/libraries/joomla/registry/format.php';

/**
 * Test class for JRegistry.
 * Generated by PHPUnit on 2009-10-27 at 15:08:41.
 */
class JRegistryTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Test the JRegistry::__clone method.
	 */
	public function test__clone()
	{
		$a = new JRegistry;
		$a->set('foo', 'bar');
		$b = clone $a;

		$this->assertThat(
			serialize($a),
			$this->equalTo(serialize($b))
		);

		$this->assertThat(
			$a,
			$this->logicalNot($this->identicalTo($b))
		);
	}

	/**
	 * Test the JRegistry::__toString method.
	 */
	public function test__toString()
	{
		$a = new JRegistry;
		$a->set('foo', 'bar');

		// __toString only allows for a JSON value.
		$this->assertThat(
			(string) $a,
			$this->equalTo('{"foo":"bar"}')
		);
	}

	/**
	 * @todo Implement testDef().
	 */
	/*public function testDef()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
		'This test has not been implemented yet.'
		);
	}*/

	/**
	 * @todo Implement testGet().
	 */
	/*public function testGet()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
		'This test has not been implemented yet.'
		);
	}*/

	/**
	 * Test the JRegistry::getInstance method.
	 */
	public function testGetInstance()
	{
		// Test INI format.
		$a = JRegistry::getInstance('a');
		$b = JRegistry::getInstance('a');
		$c = JRegistry::getInstance('c');

		// Check the object type.
		$this->assertThat(
			$a instanceof JRegistry,
			$this->isTrue()
		);

		// Check cache handling for same registry id.
		$this->assertThat(
			$a,
			$this->identicalTo($b)
		);

		// Check cache handling for different registry id.
		$this->assertThat(
			$a,
			$this->logicalNot($this->identicalTo($c))
		);
	}

	/**
	 * Test the JRegistry::getNamespaces method.
	 */
	public function testGetNameSpaces()
	{
		$a = new JRegistry;
		$a->set('foo', 'bar1');
		$a->set('config.foo', 'bar2');

		$this->assertThat(
			$a->getNameSpaces(),
			//$this->identicalTo(array('_default', 'config'))
			$this->identicalTo(array())
		);
	}

	/**
	 * Test the JRegistry::getValue method.
	 * @deprecated	1.6
	 */
	public function testGetValue()
	{
		$a = new JRegistry;
		$a->set('foo', 'bar1');
		$a->set('config.foo', 'bar2');
		$a->set('deep.level.foo', 'bar3');

		$this->assertThat(
			$a->get('foo'),
			$this->equalTo('bar1')
		);

		$this->assertThat(
			$a->get('config.foo'),
			$this->equalTo('bar2')
		);

		$this->assertThat(
			$a->get('deep.level.foo'),
			$this->equalTo('bar3')
		);

		// Check for a null value, the default is used.
		$a->set('null', null);
		$this->assertThat(
			$a->get('null', 'null'),
			$this->equalTo('null')
		);

		// Check for an empty string, the default is used.
		$a->set('empty', '');
		$this->assertThat(
			$a->get('empty', 'empty'),
			$this->equalTo('empty')
		);
	}

	/**
	 * Test the JRegistry::loadArray method.
	 */
	public function testLoadArray()
	{
		$array = array(
			'foo' => 'bar'
		);
		$registry = new JRegistry;
		$result = $registry->loadArray($array);

		// Result is always true, no error checking in method.

		// Test getting a known value.
		$this->assertThat(
			$registry->get('foo'),
			$this->equalTo('bar')
		);
	}

	/**
	 * Test the JRegistry::loadFile method.
	 */
	public function testLoadFile()
	{
		$registry = new JRegistry;

		// Result is always true, no error checking in method.

		// JSON.
		$result = $registry->loadFile(dirname(__FILE__).'/jregistry.json');

		// Test getting a known value.
		$this->assertThat(
			$registry->get('foo'),
			$this->equalTo('bar')
		);

		// INI.
		$result = $registry->loadFile(dirname(__FILE__).'/jregistry.ini', 'ini');

		// Test getting a known value.
		$this->assertThat(
			$registry->get('foo'),
			$this->equalTo('bar')
		);

		// XML and PHP versions do not support stringToObject.
	}

	/**
	 * Test the JRegistry::loadIni method.
	 */
	public function testLoadINI()
	{
		//$string = "[section]\nfoo=\"testloadini\"";

		$registry = new JRegistry;
		$result = $registry->loadIni("foo=\"testloadini1\"");

		// Result is always true, no error checking in method.

		// Test getting a known value.
		$this->assertThat(
			$registry->get('foo'),
			$this->equalTo('testloadini1')
		);

		$result = $registry->loadIni("[section]\nfoo=\"testloadini2\"");
		// Test getting a known value.
		$this->assertThat(
			$registry->get('foo'),
			$this->equalTo('testloadini2')
		);

		$result = $registry->loadIni("[section]\nfoo=\"testloadini3\"", null, true);
		// Test getting a known value after processing sections.
		$this->assertThat(
			$registry->get('section.foo'),
			$this->equalTo('testloadini3')
		);
	}

	/**
	 * Test the JRegistry::loadJson method.
	 */
	public function testLoadJSON()
	{
		$string = '{"foo":"testloadjson"}';

		$registry = new JRegistry;
		$result = $registry->loadJson($string);

		// Result is always true, no error checking in method.

		// Test getting a known value.
		$this->assertThat(
			$registry->get('foo'),
			$this->equalTo('testloadjson')
		);
	}

	/**
	 * Test the JRegistry::loadObject method.
	 */
	public function testLoadObject()
	{
		$object = new stdClass;
		$object->foo = 'testloadobject';

		$registry = new JRegistry;
		$result = $registry->loadObject($object);

		// Result is always true, no error checking in method.

		// Test getting a known value.
		$this->assertThat(
			$registry->get('foo'),
			$this->equalTo('testloadobject')
		);
	}

	/**
	 * Test the JRegistry::loadXML method.
	 */
	public function testLoadXML()
	{
		// Cannot test since stringToObject is not implemented yet.
	}

	/**
	 * Test the JRegistry::makeNamespace method.
	 */
	public function testMakeNameSpace()
	{
		$a = new JRegistry;
		$a->makeNameSpace('foo');

		$this->assertThat(
			//in_array('foo', $a->getNameSpaces()),
			//$this->isTrue()
			$a->getNameSpaces(),
			$this->equalTo(array())
		);
	}

	/**
	 * Test the JRegistry::merge method.
	 */
	public function testMerge()
	{
		$array1 = array(
			'foo' => 'bar',
			'hoo' => 'hum',
			'dum' => array(
				'dee' => 'dum'
			)
		);

		$array2 = array(
			'foo' => 'soap',
			'dum' => 'huh'
		);
		$registry1 = new JRegistry;
		$registry1->loadArray($array1);

		$registry2 = new JRegistry;
		$registry2->loadArray($array2);

		$registry1->merge($registry2);

		// Test getting a known value.
		$this->assertThat(
			$registry1->get('foo'),
			$this->equalTo('soap')
		);

		$this->assertThat(
			$registry1->get('dum'),
			$this->equalTo('huh')
		);
	}

	/**
	 * Test the JRegistry::set method.
	 */
	/*public function testSet()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
		'This test has not been implemented yet.'
		);
	}*/

	/**
	 * Test the JRegistry::set method.
	 * @deprecated	1.6
	 */
	public function testSet()
	{
		$a = new JRegistry;
		$a->set('foo', 'testsetvalue1');

		$this->assertThat(
			$a->set('foo', 'testsetvalue2'),
			$this->equalTo('testsetvalue2')
		);
	}

	/**
	 * Test the JRegistry::toArray method.
	 */
	public function testToArray()
	{
		$a = new JRegistry;
		$a->set('foo1', 'testtoarray1');
		$a->set('foo2', 'testtoarray2');
		$a->set('config.foo3', 'testtoarray3');

		$expected = array(
			'foo1' => 'testtoarray1',
			'foo2' => 'testtoarray2',
			'config' => array('foo3' => 'testtoarray3')
		);

		$this->assertThat(
			$a->toArray(),
			$this->equalTo($expected)
		);
	}

	/**
	 * Test the JRegistry::toObject method.
	 */
	public function testToObject()
	{
		$a = new JRegistry;
		$a->set('foo1', 'testtoobject1');
		$a->set('foo2', 'testtoobject2');
		$a->set('config.foo3', 'testtoobject3');

		$expected = new stdClass;
		$expected->foo1 = 'testtoobject1';
		$expected->foo2 = 'testtoobject2';
		$expected->config = new StdClass;
		$expected->config->foo3 = 'testtoobject3';

		$this->assertThat(
			$a->toObject(),
			$this->equalTo(
				$expected
			)
		);
	}

	/**
	 * Test the JRegistry::toString method.
	 */
	public function testToString()
	{
		$a = new JRegistry;
		$a->set('foo1', 'testtostring1');
		$a->set('foo2', 'testtostring2');
		$a->set('config.foo3', 'testtostring3');

		$this->assertThat(
			trim($a->toString('JSON')),
			$this->equalTo(
				'{"foo1":"testtostring1","foo2":"testtostring2","config":{"foo3":"testtostring3"}}'
			)
		);

		$this->assertThat(
			trim($a->toString('INI')),
			$this->equalTo(
				"foo1=\"testtostring1\"\nfoo2=\"testtostring2\"\n\n[config]\nfoo3=\"testtostring3\""
			)
		);
	}
}