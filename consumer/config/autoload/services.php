<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/6/5 0005
 * Time: 21:12
 */
return [
    'consumers' => [
        [
            'name' => 'CalculatorService',
            'service' => \App\Rpc\CalculatorServiceInterface::class,
            'nodes' => [
                'host' => '127.0.0.1', 'port' => 9502
            ],
        ],
    ],
];