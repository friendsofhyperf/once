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

class ForgetAspect extends AbstractAspect
{
    public $annotations = [
        Forget::class,
    ];

    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        Cache::getInstance()->forget($proceedingJoinPoint->getInstance());

        return $proceedingJoinPoint->process();
    }
}
