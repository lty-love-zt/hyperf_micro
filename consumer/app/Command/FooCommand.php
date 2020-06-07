<?php

declare(strict_types=1);

namespace App\Command;

use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Command\Annotation\Command;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * @Command
 */
class FooCommand extends HyperfCommand
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct('foo:test');
    }

    public function configure()
    {
        // 设置当前命令类的各个属性
        parent::configure();
        $this->setDescription('Hyperf Demo Command');

        //定义命令行参数
        $this->addArgument('name', InputArgument::OPTIONAL, 'name', 'Hyperf');
    }

    public function handle()
    {
        // 这里写命令类要执行的业务逻辑
        //$this->line('Hello Hyperf!', 'info');

        // 获取命令行参数
        $name = $this->input->getArgument('name');
        $this->line(sprintf('Hello %s!', $name), 'info');
    }
}
