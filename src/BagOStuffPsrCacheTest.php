<?php

namespace Addshore\Psr\Cache\MWBagOStuffAdapter;

use Cache\IntegrationTests\CachePoolTest;
use Wikimedia\ObjectCache\HashBagOStuff;

require_once __DIR__ . '/../vendor/cache/integration-tests/src/CachePoolTest.php';

/**
 * @covers \Addshore\Psr\Cache\MWBagOStuffAdapter\BagOStuffPsrCache
 */
class BagOStuffPsrCacheTest extends CachePoolTest {

	/**
	 * Simple BagOStuff implementation to use for the test
	 * @var HashBagOStuff
	 */
	private HashBagOStuff $bagOStuff;

	public function setUp(): void {
		// One HashBagOStuff per used per test (this is a cache after all)...
		$this->bagOStuff = new HashBagOStuff();

		parent::setUp();
	}

	public function createCachePool() {
		return new BagOStuffPsrCache( $this->bagOStuff );
	}

}
