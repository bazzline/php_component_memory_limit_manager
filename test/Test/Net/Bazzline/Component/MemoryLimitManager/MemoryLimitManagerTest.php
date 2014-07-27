<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-07-27 
 */

namespace Test\Net\Bazzline\Component\MemoryLimitManager;

use Net\Bazzline\Component\MemoryLimitManager\MemoryLimitManager;
use PHPUnit_Framework_TestCase;
use RuntimeException;

/**
 * Class MemoryLimitManagerTest
 * @package Test\Net\Bazzline\Component\MemoryLimitManager
 */
class MemoryLimitManagerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    private $initialLimit;

    protected function setUp()
    {
        $this->initialLimit = ini_get('memory_limit');
    }

    /**
     * @throws \RuntimeException
     */
    protected function tearDown()
    {
        $wasNotSet = (ini_set('memory_limit', $this->initialLimit) === false);

        if ($wasNotSet) {
            throw new RuntimeException(
                'could not restore ini setting memory_limit with value ' . $this->initialLimit
            );
        }
    }

    public function testLimitSetterAndGetter()
    {
        ini_set('memory_limit', '1025M');

        $limitInGigaBytes = 1;
        $limitInMegaBytes = ((int) ($limitInGigaBytes * 1024));
        $limitInKiloBytes = ((int) ($limitInMegaBytes * 1024));
        $limitInBytes = ((int) ($limitInKiloBytes * 1024));

        $manager = $this->getNewManager();
        $expectedLimitInBytes = $limitInBytes;
        $expectedLimitInKiloBytes = ((int) ($expectedLimitInBytes / 1024));
        $expectedLimitInMegaBytes = ((int) ($expectedLimitInKiloBytes / 1024));
        $expectedLimitInGigaBytes = ((int) ($expectedLimitInMegaBytes / 1024));

        $manager->setLimitInBytes($limitInBytes);
        $this->assertEquals($expectedLimitInBytes, $manager->getLimitInBytes(), 'bytes in bytes');
        $this->assertEquals($expectedLimitInKiloBytes, $manager->getLimitInKiloBytes(), 'bytes in kilo bytes');
        $this->assertEquals($expectedLimitInMegaBytes, $manager->getLimitInMegaBytes(), 'bytes in mega bytes');
        $this->assertEquals($expectedLimitInGigaBytes, $manager->getLimitInGigaBytes(), 'bytes in giga bytes');

        $manager->setLimitInKiloBytes($limitInKiloBytes);
        $this->assertEquals($expectedLimitInBytes, $manager->getLimitInBytes(), 'kilo bytes in bytes');
        $this->assertEquals($expectedLimitInKiloBytes, $manager->getLimitInKiloBytes(), 'kilo bytes in kilo bytes');
        $this->assertEquals($expectedLimitInMegaBytes, $manager->getLimitInMegaBytes(), 'kilo bytes in mega bytes');
        $this->assertEquals($expectedLimitInGigaBytes, $manager->getLimitInGigaBytes(), 'kilo bytes in giga bytes');

        $manager->setLimitInMegaBytes($limitInMegaBytes);
        $this->assertEquals($expectedLimitInBytes, $manager->getLimitInBytes(), 'mega bytes in bytes');
        $this->assertEquals($expectedLimitInKiloBytes, $manager->getLimitInKiloBytes(), 'mega bytes in kilo bytes');
        $this->assertEquals($expectedLimitInMegaBytes, $manager->getLimitInMegaBytes(), 'mega bytes in mega bytes');
        $this->assertEquals($expectedLimitInGigaBytes, $manager->getLimitInGigaBytes(), 'mega bytes in giga bytes');

        $manager->setLimitInGigaBytes($limitInGigaBytes);
        $this->assertEquals($expectedLimitInBytes, $manager->getLimitInBytes(), 'giga bytes in bytes');
        $this->assertEquals($expectedLimitInKiloBytes, $manager->getLimitInKiloBytes(), 'giga bytes in kilo bytes');
        $this->assertEquals($expectedLimitInMegaBytes, $manager->getLimitInMegaBytes(), 'giga bytes in mega bytes');
        $this->assertEquals($expectedLimitInGigaBytes, $manager->getLimitInGigaBytes(), 'giga bytes in giga bytes');
    }

    public function testBufferSetterAndGetter()
    {
        ini_set('memory_limit', '1025M');

        $bufferInGigaBytes = 1;
        $bufferInMegaBytes = ((int) ($bufferInGigaBytes * 1024));
        $bufferInKiloBytes = ((int) ($bufferInMegaBytes * 1024));
        $bufferInBytes = ((int) ($bufferInKiloBytes * 1024));

        $manager = $this->getNewManager();
        $expectedBufferInBytes = $bufferInBytes;
        $expectedBufferInKiloBytes = ((int) ($expectedBufferInBytes / 1024));
        $expectedBufferInMegaBytes = ((int) ($expectedBufferInKiloBytes / 1024));
        $expectedBufferInGigaBytes = ((int) ($expectedBufferInMegaBytes / 1024));

        $manager->setBufferInBytes($bufferInBytes);
        $this->assertEquals($expectedBufferInBytes, $manager->getBufferInBytes(), 'bytes in bytes');
        $this->assertEquals($expectedBufferInKiloBytes, $manager->getBufferInKiloBytes(), 'bytes in kilo bytes');
        $this->assertEquals($expectedBufferInMegaBytes, $manager->getBufferInMegaBytes(), 'bytes in mega bytes');
        $this->assertEquals($expectedBufferInGigaBytes, $manager->getBufferInGigaBytes(), 'bytes in giga bytes');

        $manager->setBufferInKiloBytes($bufferInKiloBytes);
        $this->assertEquals($expectedBufferInBytes, $manager->getBufferInBytes(), 'kilo bytes in bytes');
        $this->assertEquals($expectedBufferInKiloBytes, $manager->getBufferInKiloBytes(), 'kilo bytes in kilo bytes');
        $this->assertEquals($expectedBufferInMegaBytes, $manager->getBufferInMegaBytes(), 'kilo bytes in mega bytes');
        $this->assertEquals($expectedBufferInGigaBytes, $manager->getBufferInGigaBytes(), 'kilo bytes in giga bytes');

        $manager->setBufferInMegaBytes($bufferInMegaBytes);
        $this->assertEquals($expectedBufferInBytes, $manager->getBufferInBytes(), 'mega bytes in bytes');
        $this->assertEquals($expectedBufferInKiloBytes, $manager->getBufferInKiloBytes(), 'mega bytes in kilo bytes');
        $this->assertEquals($expectedBufferInMegaBytes, $manager->getBufferInMegaBytes(), 'mega bytes in mega bytes');
        $this->assertEquals($expectedBufferInGigaBytes, $manager->getBufferInGigaBytes(), 'mega bytes in giga bytes');

        $manager->setBufferInGigaBytes($bufferInGigaBytes);
        $this->assertEquals($expectedBufferInBytes, $manager->getBufferInBytes(), 'giga bytes in bytes');
        $this->assertEquals($expectedBufferInKiloBytes, $manager->getBufferInKiloBytes(), 'giga bytes in kilo bytes');
        $this->assertEquals($expectedBufferInMegaBytes, $manager->getBufferInMegaBytes(), 'giga bytes in mega bytes');
        $this->assertEquals($expectedBufferInGigaBytes, $manager->getBufferInGigaBytes(), 'giga bytes in giga bytes');
    }

    public function testIsLimitReached()
    {
        $manager = $this->getNewManager();
        $manager->setBufferInMegaBytes(0);
        $manager->setLimitInMegaBytes(32);

        $this->assertFalse($manager->isLimitReached());

        $manager->setBufferInMegaBytes(32);
        $this->assertTrue($manager->isLimitReached());
    }

    public function testGetCurrentUsage()
    {
        $manager = $this->getNewManager();

        $currentUsageInBytes = memory_get_usage(true);
        $currentUsageInKiloBytes = ((int) ($currentUsageInBytes / 1024));
        $currentUsageInMegaBytes = ((int) ($currentUsageInKiloBytes / 1024));
        $currentUsageInGigaBytes = ((int) ($currentUsageInMegaBytes / 1024));

        $this->assertEquals($currentUsageInBytes, $manager->getCurrentUsageInBytes());
        $this->assertEquals($currentUsageInKiloBytes, $manager->getCurrentUsageInKiloBytes());
        $this->assertEquals($currentUsageInMegaBytes, $manager->getCurrentUsageInMegaBytes());
        $this->assertEquals($currentUsageInGigaBytes, $manager->getCurrentUsageInGigaBytes());
    }

    /**
     * @expectedException \Net\Bazzline\Component\MemoryLimitManager\InvalidArgumentException
     * @expectedExceptionMessage provided limit (105906176) is above ini limit (104857600)
     * @expectedExceptionCode 1
     */
    public function testInvalidArgumentProvided()
    {
        //100 MB = 100 * 1024 * 1024 = 104857600
        //101 MB = 101 * 1024 * 1024 = 105906176
        if (ini_set('memory_limit', '100M') === false) {
            $this->fail('could not set ini value memory_limit');
        } else {
            $manager = $this->getNewManager();
            $manager->setLimitInMegaBytes(101);
        }
    }

    /**
     * @return MemoryLimitManager
     */
    private function getNewManager()
    {
        return new MemoryLimitManager();
    }
} 