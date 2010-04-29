<?php
/**
 * JCacheTest class -- testing framework for JCache
 *
 * @version		$Id$
 * @package	Joomla.UnitTest
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
/**
 * Test class for JCache.
 * Generated by PHPUnit on 2009-10-08 at 21:39:47.
 *
 * @package	Joomla.UnitTest
 * @subpackage Cache
 *
 */
class JCacheTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var	JCache
	 * @access protected
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return void
	 * @access protected
	 */
	protected function setUp()
	{
		include_once JPATH_BASE.'/libraries/joomla/cache/cache.php';
		//$this->object = new JCache;
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 *
	 * @return void
	 * @access protected
	 */
	protected function tearDown()
	{
	}

	/**
	 * Test Cases for getInstance
	 *
	 * @return array
	 */
	function casesGetInstance()
	{
		return array(
			'simple' => array(
				'output',
				array(),
				'JCacheControllerOutput',
			),
			'complexOutput' => array(
				'output',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/tests/unit/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
				'JCacheControllerOutput',
			),
			'complexPage' => array(
				'page',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/tests/unit/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
				'JCacheControllerPage',
			),
			'complexView' => array(
				'view',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/tests/unit/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
				'JCacheControllerView',
			),
			'complexCallback' => array(
				'callback',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/tests/unit/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
				'JCacheControllerCallback',
			),
		);
	}

	/**
	 * Testing getInstance, set_state, setCaching, and setLifeTime
	 *
	 * @param	string	cache handler
	 * @param	array	options for cache handler
	 * @param	string	name of expected cache class
	 *
	 * @return void
	 * @dataProvider casesGetInstance
	 */
	public function testGetInstance( $handler, $options, $expClass)
	{
		$this->object = JCache::getInstance($handler, $options);
		$this->assertThat(
			$this->object,
			$this->isInstanceOf($expClass)
		);

		//$state = $this->object->__set_state((array)$this->object);
		//$this->assertThat(
		//	$state,
		//	$this->equalTo($this->object)
		//);
	}

	/**
	 * Test Cases for setCaching
	 *
	 * @return array
	 */
	function casesSetCaching()
	{
		return array(
			'simple' => array(
				'output',
				array(),
			),
			'complexOutput' => array(
				'output',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/unittest/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
			),
			'complexPage' => array(
				'page',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/unittest/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
			),
			'complexView' => array(
				'view',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/unittest/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
			),
			'complexCallback' => array(
				'callback',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/unittest/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
			),
		);
	}

	/**
	 * Testing setCaching
	 *
	 * @param	string	cache handler
	 * @param	array	options for cache handler
	 *
	 * @return void
	 * @dataProvider casesSetCaching
	 */
	public function testSetCaching( $handler, $options )
	{
		$this->object = JCache::getInstance($handler, $options);

		$caching = (bool)$this->object->options['caching'];
		$this->object->setCaching(!$caching);
		$this->assertThat(
			$this->object->options['caching'],
			$this->equalTo(!$caching)
		);
	}

	/**
	 * Test Cases for setLifetime
	 *
	 * @return array
	 */
	function casesSetLifetime()
	{
		return array(
			'simple' => array(
				'output',
				array(),
				900,
			),
			'complexOutput' => array(
				'output',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/unittest/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
				15*60,
			),
			'complexPage' => array(
				'page',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/unittest/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
				15*60,
			),
			'complexView' => array(
				'view',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/unittest/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
				15*60,
			),
			'complexCallback' => array(
				'callback',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/unittest/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
				15*60,
			),
		);
	}

	/**
	 * Testing setLifeTime
	 *
	 * @param	string	cache handler
	 * @param	array	options for cache handler
	 * @param	integer	lifetime of cache to be set
	 *
	 * @return void
	 * @dataProvider casesSetLifetime
	 */
	public function testSetLifeTime( $handler, $options, $lifetime)
	{
		$this->object = JCache::getInstance($handler, $options);
		$this->object->setLifeTime($lifetime);
		$this->assertThat(
			$this->object->options['lifetime'],
			$this->equalTo($lifetime)
		);
	}

	/**
	 * Test Cases for getStores
	 *
	 * @return array
	 */
	function casesGetStores()
	{
		return array(
			'simple' => array(
				'output',
				array(),
				array( 'file' ),
			),
			'complexOutput' => array(
				'output',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/unittest/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
				array( 'file' ),
			),
			'complexPage' => array(
				'page',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/unittest/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
				array( 'file' ),
			),
			'complexView' => array(
				'view',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/unittest/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
				array( 'file' ),
			),
			'complexCallback' => array(
				'callback',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/unittest/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
				array( 'file' ),
			),
		);
	}

	/**
	 *	Testing getStores
	 *
	 * @param	string	cache handler
	 * @param	array	options for cache handler
	 * @param	string	returned stores
	 *
	 * @return void
	 * @dataProvider	casesGetStores
	 */
	public function testGetStores( $handler, $options, $expected )
	{
		$this->object = JCache::getInstance($handler, $options);
		$this->assertThat(
			$this->object->getStores(),
			$this->equalTo($expected)
		);
	}

	/**
	 * Test Cases for get() / store()
	 *
	 * @return array
	 */
	function casesStore()
	{
		return array(
			'simple' => array(
				'output',
				array( 'lifetime'	=> 600),
				42,
				'',
				'And this is the cache that tries men\'s souls',
				false,
			),
			'complexOutput' => array(
				'output',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/tests/unit/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
				42,
				'',
				'And this is the cache that tries men\'s souls',
				false,
			),
			/** This does not work since JCacheControllerPage retrieves the page-body and does not work with a parameter
				'complexPage' => array(
				'page',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/tests/unit/cache',
					'lifetime'		=> 20 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
				42,
				'',
				'And this is the cache that tries men\'s souls',
				false,
			),**/
		);
	}

	/**
	 * Testing store() and get()
	 *
	 * @param	string	cache handler
	 * @param	array	options for cache handler
	 * @param	string	cache element ID
	 * @param	string	cache group
	 * @param	string	data to be cached
	 * @param	string	expected return
	 *
	 * @return void
	 * @dataProvider casesStore
	 */
	public function testStoreAndGet( $handler, $options, $id, $group, $data, $expected )
	{
		$this->object = JCache::getInstance($handler, $options);
		$this->object->setCaching(true);
		$this->assertThat(
			$this->object->store($data, $id, $group),
			$this->equalTo($data),
			'Should store the data properly'
		);
		$this->assertThat(
			$this->object->get($id, $group),
			$this->equalTo($data),
			'Should retrieve the data properly'
		);
	}

	/**
	 * Testing remove().
	 *
	 * @return void
	 */
	public function testRemove()
	{
		$this->object = JCache::getInstance('output');
		$this->object->setCaching(true);
		$this->object->store(
			'Now is the time for all good people to throw a party.',
			42,
			''
		);
		$this->object->store(
			'And this is the cache that tries men\'s souls',
			43,
			''
		);

		$this->assertThat(
			$this->object->get(43, ''),
			$this->equalTo('And this is the cache that tries men\'s souls'),
			'Should retrieve the data properly'
		);
		$this->assertThat(
			$this->object->remove(43, ''),
			$this->isTrue(),
			'Should remove cached data'
		);
		$this->assertThat(
			$this->object->get(43, ''),
			$this->isFalse(),
			'Should not retrieve the data properly'
		);
		$this->assertThat(
			$this->object->get(42, ''),
			$this->equalTo('Now is the time for all good people to throw a party.'),
			'Should retrieve the data properly'
		);
	}

	/**
	 * Testing clean().
	 *
	 * @return void
	 */
	public function testClean()
	{
		$this->object = JCache::getInstance('output');
		$this->object->setCaching(true);
		$this->object->store(
			'Now is the time for all good people to throw a party.',
			42,
			''
		);
		$this->object->store(
			'And this is the cache that tries men\'s souls',
			43,
			''
		);
		$this->assertThat(
			$this->object->get(43, ''),
			$this->equalTo('And this is the cache that tries men\'s souls'),
			'Should retrieve the data properly'
		);
		$this->assertThat(
			$this->object->clean(''),
			$this->isTrue(),
			'Should remove cached data'
		);
		$this->assertThat(
			$this->object->get(43, ''),
			$this->isFalse(),
			'Should not retrieve the data properly'
		);
		$this->assertThat(
			$this->object->get(42, ''),
			$this->isFalse(),
			'Should not retrieve the data properly'
		);
	}

	/**
	 * Testing Gc().
	 *
	 * @return void
	 */
	public function testGc()
	{
		$this->object = JCache::getInstance('output', array('lifetime' => 2, 'defaultgroup' => '' ));
		$this->object->store(
			'Now is the time for all good people to throw a party.',
			42,
			''
		);
		$this->object->store(
			'And this is the cache that tries men\'s souls',
			42,
			''
		);
		sleep(5);
		$this->object->gc();
		$this->assertThat(
			$this->object->get(42, ''),
			$this->isFalse(),
			'Should not retrieve the data properly'
		);
		$this->assertThat(
			$this->object->get(42, ''),
			$this->isFalse(),
			'Should not retrieve the data properly'
		);
	}

	/**
	 * Test Cases for getStorage
	 *
	 * @return array
	 */
	function casesGetStorage()
	{
		return array(
			'file' => array(
				'output',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/unittest/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'file',
				),
				'JCacheStorageFile',
			),
			'apc' => array(
				'output',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/unittest/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'apc',
				),
				'JCacheStorageApc',
			),
			'xcache' => array(
				'output',
				array(
					'defaultgroup'	=> '',
					'cachebase'		=> JPATH_BASE . '/unittest/cache',
					'lifetime'		=> 15 * 60,	// minutes to seconds
					'storage'		=> 'xcache',
				),
				'JCacheStorageXCache',
			),
//			'memcache' => array(
//				'output',
//				array(
//					'defaultgroup'	=> '',
//					'cachebase'		=> JPATH_BASE . '/unittest/cache',
//					'lifetime'		=> 15 * 60,	// minutes to seconds
//					'storage'		=> 'memcache',
//				),
//				'JCacheView',
//			),
//			'eaccelerator' => array(
//				'output',
//				array(
//					'defaultgroup'	=> '',
//					'cachebase'		=> JPATH_BASE . '/unittest/cache',
//					'lifetime'		=> 15 * 60,	// minutes to seconds
//					'storage'		=> 'eaccelerator',
//				),
//				'JCacheCallback',
//			),
		);
	}

	/**
	 * Testing getStorage
	 *
	 * @param	string	cache handler
	 * @param	array	options for cache handler
	 * @param	string	expected storage class
	 *
	 * @return void
	 * @dataProvider casesGetStorage
	 * @todo Implement test_getStorage().
	 */
	public function testGetStorage( $handler, $options, $expected )
	{
		$this->object = JCache::getInstance($handler, $options);

		$this->assertThat(
			$this->object->cache->_getStorage(),
			$this->isInstanceOf($expected)
		);
	}
}
?>
