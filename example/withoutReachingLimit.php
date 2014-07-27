<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-07-27 
 */

require_once __DIR__ . '/../vendor/autoload.php';

echo 'starting example' . PHP_EOL;

$manager = new Net\Bazzline\Component\MemoryLimitManager\MemoryLimitManager();

$currentMemoryUsageInBytes = memory_get_usage(true);

$manager->setBufferInMegaBytes(0);
$manager->setLimitInBytes(($currentMemoryUsageInBytes * 2));

$data = array();

for ($iterator = 0; $iterator < 10; ++$iterator) {
    $data[$iterator] = true;
    if ($manager->isLimitReached()) {
        echo 'error - memory limit of ' . $manager->getLimitInBytes() . ' bytes reached (current usage: ' . $manager->getCurrentUsageInBytes() . ' bytes)' . PHP_EOL;
        exit(1);
    }
}

echo 'finished example with memory usage of ' . $manager->getCurrentUsageInMegaBytes() . ' mb' . PHP_EOL;
