<?php

declare(strict_types=1);

namespace App\Command;

use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Command\Annotation\Command;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

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

        //定义命令行参数: 可以定义多个参数
        //$this->addArgument('name', InputArgument::OPTIONAL, 'name', 'Hyperf');
        //$this->addArgument('name2', InputArgument::OPTIONAL, 'name2', 'Hyperf');

        // 定义可选参数
        //$this->addOption('name', 'n1', InputOption::VALUE_OPTIONAL, '名字', 'Hyperf');
        //$this->addOption('name', 'n1', InputOption::VALUE_IS_ARRAY | InputOption::VALUE_OPTIONAL, '名字', ['Hyperf']);
    }

    public function handle()
    {
        // 这里写命令类要执行的业务逻辑
        //$this->line('Hello Hyperf!', 'info');

        // 获取命令行参数
        //$name = $this->input->getArgument('name');
        //$name2 = $this->input->getArgument('name2');

        // 获取可选参数
        //$name = $this->input->getOption('name');
        //$this->line(sprintf('Hello %s', implode(',', $name)), 'info');

        // 常用的输出函数
        //$this->output->writeln("<error>Hello</error> World"); //换行输出
        //$this->output->writeln("Hello World");

        // 询问方式
        $value = $this->output->ask("Hello World?", 'Hyperf');
        $this->output->writeln($value);
    }
}
