<?php
namespace Kltong\Pay\Client;

use Kltong\Pay\ChargeContext;
use Kltong\Pay\Config\Channel;
use Kltong\Pay\Exception\PayException;

/**
 * 支付或者消费 入口类
 * Class Charge
 * @package Kltong\Pay\Client
 */
class Charge
{
    /**
     * 支持的交易类型
     * @var array
     */
    private static $support_channel=[
        Channel::PRECARD_MAGNETICANDPWD,
        Channel::PRECARD_CARDWITHPASS,
        ];

    /**
     * 类实例
     * @var
     */
    protected static $instance;

    protected static function getInstance($channel, $config){
        if(is_null(self::$instance)){
            self::$instance = new ChargeContext();
        }
        try{
            self::$instance->initContext($channel,$config);
        }catch (PayException $payException){
            throw $payException;
        }
        return self::$instance;
    }

    /**
     * 执行入口
     * @param $channel
     * @param $config
     * @param $data
     * @return mixed
     */
    public static function execute($channel,$config, $data){
        if(!in_array($channel,self::$support_channel)){
            throw  new PayException("当前不支持该渠道");
        }
        try{
            $instance = self::getInstance($channel, $config);
            $result = $instance->charge($data);
        }catch (PayException $payException){
            throw $payException;
        }
        return $result;
    }

}