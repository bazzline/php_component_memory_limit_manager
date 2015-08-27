# Memory Limit Manager Component for PHP

This free as in freedom component helps you to validate if your script reaches the allowed maximum memory limit.

Furthermore, you can set your own memory limit (as long as it is below the limit in you php.ini).

The build status of the current master branch is tracked by Travis CI:
[![build status](https://travis-ci.org/bazzline/php_component_memory_limit_manager.png?branch=master)](http://travis-ci.org/bazzline/php_component_memory_limit_manager)
[![Latest stable](https://img.shields.io/packagist/v/net_bazzline/php_component_memory_limit_manager.svg)](https://packagist.org/packages/net_bazzline/php_component_memory_limit_manager)

The scrutinizer status are:
[![code quality](https://scrutinizer-ci.com/g/bazzline/php_component_memory_limit_manager/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_memory_limit_manager/) | [![code coverage](https://scrutinizer-ci.com/g/bazzline/php_component_memory_limit_manager/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_memory_limit_manager/) | [![build status](https://scrutinizer-ci.com/g/bazzline/php_component_memory_limit_manager/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_memory_limit_manager/)

The versioneye status is:
[![dependencies](https://www.versioneye.com/user/projects/53e4ecade0a229bcec000123/badge.svg?style=flat)](https://www.versioneye.com/user/projects/53e4ecade0a229bcec000123)

Downloads:
[![Downloads this Month](https://img.shields.io/packagist/dm/net_bazzline/php_component_memory_limit_manager.svg)](https://packagist.org/packages/net_bazzline/php_component_memory_limit_manager)

It is also available at [openhub.net](http://www.openhub.net/p/718010).

# Benefits

* provides easy setting of memory limit
* gives you the advantage to add a buffer before reaching the limit to easy up reacting when limit is reached
* helps you to set the limit in bytes, kilo bytes, mega bytes or giga bytes (same for the buffer)
* comes with [DependentInterface](https://github.com/bazzline/php_component_memory_limit_manager/blob/master/source/Net/Bazzline/Component/MemoryLimitManager/MemoryLimitManagerDependentInterface.php) and [AwareInterface](https://github.com/bazzline/php_component_memory_limit_manager/blob/master/source/Net/Bazzline/Component/MemoryLimitManager/MemoryLimitManagerAwareInterface.php)

# Examples

* [with reaching memory limit](https://github.com/bazzline/php_component_memory_limit_manager/blob/master/example/Example/withReachingLimit.php)
* [without reaching memory limit](https://github.com/bazzline/php_component_memory_limit_manager/blob/master/example/Example/withoutReachingLimit.php)

# Install

## By Hand

    mkdir -p vendor/net_bazzline/php_component_memory_limit_manager
    cd vendor/net_bazzline/php_component_memory_limit_manager
    git clone https://github.com/bazzline/php_component_memory_limit_manager

## With [Packagist](https://packagist.org/packages/net_bazzline/php_component_memory_limit_manager)

    composer require net_bazzline/php_component_memory_limit_manager:dev-master

# Usage

```php
$manager = new Net\Bazzline\Component\MemoryLimitManager\MemoryLimitManager();
$manager->setBufferInMegaBytes(4);
$manager->setLimitInMegaBytes(64);

while (!empty($dataSet)) {
    if ($manager->isLimitReached()) {
        //exit while loop, shutdown process
    } else {
        $data = array_shift($dataSet);
        //work on data set
    }
}
```

# API

Thanks to [apigen](https://github.com/apigen/apigen), the api is available in the [document](https://github.com/bazzline/php_component_memory_limit_manager/blob/master/document/index.html) section or [online](http://code.bazzline.net/).

# History

* upcomming
    * @todo
        * implement way of measure/calculate the amount of memory for next iteration
    * removed dependency to phpmd
    * updated dependencies
* [1.0.7](https://github.com/bazzline/php_component_memory_limit_manager/tree/1.0.7) - released at 27.08.2015
    * updated dependencies
* [1.0.6](https://github.com/bazzline/php_component_memory_limit_manager/tree/1.0.6) - released at 04.07.2015
    * updated dependencies
* [1.0.5](https://github.com/bazzline/php_component_memory_limit_manager/tree/1.0.5) - released at 22.05.2015
    * updated dependencies
* [1.0.4](https://github.com/bazzline/php_component_memory_limit_manager/tree/1.0.4) - released at 02.08.2015
    * updated dependencies
    * removed dependency to apigen
* [1.0.3](https://github.com/bazzline/php_component_memory_limit_manager/tree/1.0.3) - released at 31.08.2014
    * fixed broken composer.json
* [1.0.2](https://github.com/bazzline/php_component_memory_limit_manager/tree/1.0.2) - released at 31.08.2014
    * added versioneye
    * added scrutinizer
    * fixed small bugs
    * updated dependencies
* [1.0.1](https://github.com/bazzline/php_component_memory_limit_manager/tree/1.0.1) - released at 27.07.2014
    * added missing [DependentInterface](https://github.com/bazzline/php_component_memory_limit_manager/blob/master/source/Net/Bazzline/Component/MemoryLimitManager/MemoryLimitManagerDependentInterface.php) and [AwareInterface](https://github.com/bazzline/php_component_memory_limit_manager/blob/master/source/Net/Bazzline/Component/MemoryLimitManager/MemoryLimitManagerAwareInterface.php)
* [1.0.0](https://github.com/bazzline/php_component_memory_limit_manager/tree/1.0.0) - released at 27.07.2014
    * initial commit with examples, unit tests and api documentation

# Future Improvements

* if you have one, create a feature request, fork it (and push it back :-))
