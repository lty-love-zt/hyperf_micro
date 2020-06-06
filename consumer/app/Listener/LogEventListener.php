<?php

declare(strict_types=1);

namespace App\Listener;

use App\Event\BeforeUserRegister;
use App\Event\UserRegistered;
use Hyperf\Event\Annotation\Listener;
use Psr\Container\ContainerInterface;
use Hyperf\Event\Contract\ListenerInterface;

/**
 * @Listener
 */
class LogEventListener implements ListenerInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function listen(): array
    {
        return [
            // 监听多个跟用户注册相关的事件
            BeforeUserRegister::class,
            UserRegistered::class,
        ];
    }

    public function process(object $event)
    {
        if ($event instanceof BeforeUserRegister) {
            echo get_class($event) . $event->shouldRegister . PHP_EOL;
        } elseif ($event instanceof UserRegistered) {
            echo get_class($event) . $event->userId . PHP_EOL;
        }
    }
}
