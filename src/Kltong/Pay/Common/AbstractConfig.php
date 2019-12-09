<?php
namespace Kltong\Pay\Common;

use Kltong\Pay\Exception\PayException;

/**
 * 配置基础
 * Interface ConfigInterface
 * @package Kltong\Pay\Common
 */
abstract class AbstractConfig
{
    public $version='1.0';
    public $merchantId;
    public $signType=2;//1-md5 2-rsa
    public $sign = '';

    public function toArray(){
        return get_object_vars($this);
    }
    abstract protected function initConfig(array $config);

    public function __construct(array $config){
        try{
            $this->initConfig($config);
        }catch (PayException $payException){
            throw $payException;
        }

    }

}