<?php

declare(strict_types=1);

namespace App\Listener;

use App\Event\UserRegistered;
use Hyperf\Event\Annotation\Listener;
use Psr\Container\ContainerInterface;
use Hyperf\Event\Contract\ListenerInterface;

/**
 * @Listener(priority=9)
 */
class SendEmailListener implements ListenerInterface
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
            UserRegistered::class, //监听用户注册事件
        ];
    }

    /**
     * @param UserRegistered $event
     */
    public function process(object $event)
    {
        echo "发送Email给" . $event->userId . PHP_EOL;
    }
}
