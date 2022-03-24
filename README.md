# Once

[![Latest Test](https://github.com/friendsofhyperf/once/workflows/tests/badge.svg)](https://github.com/friendsofhyperf/once/actions)
[![Latest Stable Version](https://poser.pugx.org/friendsofhyperf/once/version.png)](https://packagist.org/packages/friendsofhyperf/once)
[![Total Downloads](https://poser.pugx.org/friendsofhyperf/once/d/total.png)](https://packagist.org/packages/friendsofhyperf/once)
[![GitHub license](https://img.shields.io/github/license/friendsofhyperf/once)](https://github.com/friendsofhyperf/once)

A magic memoization function for hyperf.

## Installation

- Installation

```bash
composer require friendsofhyperf/once
```

## Usage

The `once` function accepts a `callable`.

```php
$myClass = new class() {
    public function getNumber(): int
    {
        return once(function () {
            return rand(1, 10000);
        });
    }
};
```

No matter how many times you run `$myClass->getNumber()` you'll always get the same number.

The `once` function will only run once per combination of argument values the containing method receives.

```php
class MyClass
{
    /**
     * It also works in static context!
     */
    public static function getNumberForLetter($letter)
    {
        return once(function () use ($letter) {
            return $letter . rand(1, 10000000);
        });
    }
}
```

So calling `MyClass::getNumberForLetter('A')` will always return the same result, but calling `MyClass::getNumberForLetter('B')` will return something else.

### Flushing the cache

To flush the entire cache you can call:

```php
Cache::getInstance()->flush();
```

### Disabling the cache

In your tests you probably don't want to cache values. To disable the cache you can call:

```php
Cache::getInstance()->disable();
```

You can re-enable the cache with

```php
Cache::getInstance()->enable();
```
