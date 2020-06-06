<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/6/6 0006
 * Time: 17:33
 */

namespace App\Exception\Handler;


use App\Exception\FooException;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Psr\Http\Message\ResponseInterface;
use Throwable;
class FooExceptionHandler extends ExceptionHandler
{
    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $this->stopPropagation(); //禁止异常传递到下一个异常处理器

        return $response->withStatus(500)->withBody(new SwooleStream("This is the FooExceptionHandler"));
    }

    public function isValid(Throwable $throwable): bool
    {
        return $throwable instanceof FooException;
    }
}