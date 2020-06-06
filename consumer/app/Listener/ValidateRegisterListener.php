<?php

declare(strict_types=1);

namespace App\Listener;

use App\Event\BeforeUserRegister;
use Hyperf\Event\Annotation\Listener;
use Psr\Container\ContainerInterface;
use Hyperf\Event\Contract\ListenerInterface;

/**
 * @Listener
 */
class ValidateRegisterListener implements ListenerInterface
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
            BeforeUserRegister::class,
        ];
    }

    /**
     * @param BeforeUserRegister $event
     */
    public function process(object $event)
    {
        $event->shouldRegister  = (bool) rand(0, 1);
        echo $event->shouldRegister;
    }
}
