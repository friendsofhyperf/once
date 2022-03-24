<?php

declare(strict_types=1);
/**
 * This file is part of friendsofhyperf-once.
 *
 * @link     https://github.com/friendsofhyperf/once
 * @document https://github.com/friendsofhyperf/once/blob/1.x/README.md
 * @contact  huangdijia@gmail.com
 */
namespace FriendsOfHyperf\Once\Annotation;

use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;
use Spatie\Once\Cache;

class OnceAspect extends AbstractAspect
{
    public $annotations = [
        Once::class,
    ];

    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        $cache = Cache::getInstance();
        $object = $proceedingJoinPoint->getInstance();
        $arguments = $proceedingJoinPoint->getArguments();
        $hash = md5(
            $proceedingJoinPoint->className .
            $proceedingJoinPoint->methodName .
            serialize(
                array_map(
                    fn ($argument) => is_object($argument) ? spl_object_hash($argument) : $argument,
                    $arguments
                )
            )
        );

        if ($cache->has($object, $hash)) {
            return $cache->get($object, $hash);
        }

        return tap($proceedingJoinPoint->process(), function ($result) use ($cache, $object, $hash) {
            $cache->set($object, $hash, $result);
        });
    }
}
