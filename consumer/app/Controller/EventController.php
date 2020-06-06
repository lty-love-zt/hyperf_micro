<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/6/6 0006
 * Time: 23:08
 */

namespace App\Controller;

use Hyperf\Di\Annotation\Inject;
use App\Service\UserService;
use Hyperf\HttpServer\Annotation\AutoController;
/**
 * Class EventController
 * @AutoController()
 */
class EventController
{

    /**
     * // 将UserService注入进来
     * @Inject()
     * @var UserService
     */
    private $userService;

    public function test()
    {
        //调用用户注册方法
        $this->userService->register();
    }

}