<?php

namespace Addshore\Psr\Cache\MWBagOStuffAdapter\Tests\Integration;

use Addshore\Psr\Cache\MWBagOStuffAdapter\BagOStuffPsrCache;
use Cache\IntegrationTests\CachePoolTest;
use Psr\Cache\CacheItemPoolInterface;
use Wikimedia\ObjectCache\HashBagOStuff;

class BagOStuffCachePoolIntegrationTest extends CachePoolTest {

	private HashBagOStuff $hashBagOStuff;

	/** @var array<string, string> */
	protected array $skippedTests = [
		'testExpiration' => 'HashBagOStuff stub does not support TTL.',
		'testSaveExpired' => 'HashBagOStuff stub does not support TTL.',
		'testDeferredExpired' => 'HashBagOStuff stub does not support TTL.',
	];

	public function createCachePool(): CacheItemPoolInterface {
		if ( !isset( $this->hashBagOStuff ) ) {
			$this->hashBagOStuff = new HashBagOStuff();
		}
		return new BagOStuffPsrCache( $this->hashBagOStuff );
	}

}
