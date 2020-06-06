<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/6/6 0006
 * Time: 23:14
 */

namespace App\Event;


class BeforeUserRegister
{
    /**
     * @var bool
     */
    public $shouldRegister = true;
}