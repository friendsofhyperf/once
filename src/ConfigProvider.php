<?php

declare(strict_types=1);
/**
 * This file is part of friendsofhyperf-once.
 *
 * @link     https://github.com/friendsofhyperf/once
 * @document https://github.com/friendsofhyperf/once/blob/1.x/README.md
 * @contact  huangdijia@gmail.com
 */
namespace FriendsOfHyperf\Once;

defined('BASE_PATH') or define('BASE_PATH', '');

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            // 'annotations' => [
            //     'scan' => [
            //         'paths' => [
            //             __DIR__,
            //         ],
            //     ],
            // ],
            'aspects' => [
                Annotation\ForgetAspect::class,
                Annotation\OnceAspect::class,
            ],
        ];
    }
}
