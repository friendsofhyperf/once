<?php

declare(strict_types=1);
/**
 * This file is part of friendsofhyperf-once.
 *
 * @link     https://github.com/friendsofhyperf/once
 * @document https://github.com/friendsofhyperf/once/blob/2.x/README.md
 * @contact  huangdijia@gmail.com
 */
namespace FriendsOfHyperf\Once\Annotation;

use Attribute;
use Hyperf\Di\Annotation\AbstractAnnotation;

#[Attribute(Attribute::TARGET_METHOD)]
class Once extends AbstractAnnotation
{
}
