<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/6/6 0006
 * Time: 22:34
 */

namespace App\Service;


use App\Event\BeforeUserRegister;
use App\Event\UserRegistered;
use Psr\EventDispatcher\EventDispatcherInterface;
use Hyperf\Di\Annotation\Inject;
class UserService
{

    /**
     * // 注入事件调度
     * @Inject()
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    public function register()
    {
        // 注册成功前
        $beforeUserRegister = new BeforeUserRegister();
        $this->eventDispatcher->dispatch($beforeUserRegister); //通过事件调度器触发事件

        if ($beforeUserRegister->shouldRegister) {
            // 注册用户
            $userId = rand(0, 9999);
        } else {
            return false;
        }

        // 注册成功后
        if ($userId) {
            // 普通的逻辑迭代
            // 发送短信
            //$this->sendSms();

            // 发送邮件
            //$this->sendEmail();

            // 同步用户信息到其他系统
            // 将用户注册成功的信息收集到用户行为分析系统
            // ......

            // 引入事件机制之后的写法
            // 用户注册成功之后，触发UserRegistered事件
            $this->eventDispatcher->dispatch(new UserRegistered($userId));
        }
        return $userId;
    }

    // 普通的业务逻辑写法
    public function sendSms()
    {
        // 发送短信
        return true;
    }

    // 普通的业务逻辑写法
    public function sendEmail()
    {
        // 发送邮件
        return true;
    }
}