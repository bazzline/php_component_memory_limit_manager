<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-07-27 
 */

namespace Net\Bazzline\Component\MemoryLimitManager;

/**
 * Interface MemoryLimitManagerAwareInterface
 * @package Net\Bazzline\Component\MemoryLimitManager
 */
interface MemoryLimitManagerAwareInterface
{
    /**
     * @return MemoryLimitManager
     */
    public function getMemoryLimitManager();

    /**
     * @return bool
     */
    public function hasMemoryLimitManager();

    /**
     * @param MemoryLimitManager $manager
     */
    public function setMemoryLimitManager(MemoryLimitManager $manager);
} 