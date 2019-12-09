<?php
namespace Kltong\Pay\Exception;

/**
 * 支付异常类
 * Class PayException
 * @package Kltong\Pay\Exception
 */
class PayException extends \RuntimeException
{
    public function errorMessage()
    {
        return $this->getMessage();
    }
}