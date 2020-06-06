<?php

declare(strict_types=1);

namespace App\Listener;

use App\Event\UserRegistered;
use Hyperf\Event\Annotation\Listener;
use Psr\Container\ContainerInterface;
use Hyperf\Event\Contract\ListenerInterface;

/**
 * // 设置监听器的优先级：值越大，优先级越高
 * @Listener(priority=10)
 */
class SendSmsListener implements ListenerInterface
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
            // 监听其他事件...
        ];
    }

    /**
     * @param UserRegistered $event
     */
    public function process(object $event)
    {
        // 编写发送短信的逻辑
        echo "发送短信给" . $event->userId . PHP_EOL;
    }
}
