<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/6/6 0006
 * Time: 22:41
 */

namespace App\Event;


class UserRegistered
{
    /**
     * @var int
     */
    public $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }
}