<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/6/6 0006
 * Time: 17:06
 */

namespace App\Controller;

use http\Exception\RuntimeException;
use Hyperf\HttpServer\Annotation\AutoController;
/**
 * Class TestController
 * @AutoController()
 */
class TestController
{
    public function co()
    {
        co(function () {
            while (true) {
                echo 1;
                sleep(1);
            }
        });
        return 1;
    }

    public function exception()
    {
        throw new \RuntimeException("test");
    }
}