<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-07-27 
 */

namespace Net\Bazzline\Component\MemoryLimitManager;

/**
 * Class MemoryLimitManagerDependentInterface
 * @package Net\Bazzline\Component\MemoryLimitManager
 */
interface MemoryLimitManagerDependentInterface
{
    /**
     * @param MemoryLimitManager $manager
     */
    public function injectMemoryLimitManager(MemoryLimitManager $manager);
} 