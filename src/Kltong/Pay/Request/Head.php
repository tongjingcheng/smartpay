<?php
namespace Kltong\Pay\Request;

/**
 * 数据请求基础
 * Class Head
 * @package Kltong\Pay\Request
 */
abstract class Head
{
    public $version = '1.0';
    public $merchantId;
    public $signType = 2;
    public $sign;

    public function toArray(){
        return get_object_vars($this);
    }

}