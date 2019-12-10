<?php
namespace Kltong\Pay;
use Kltong\Pay\Biz\CardWithPassBiz;
use Kltong\Pay\Charge\Precard\PreCardCharge;
use Kltong\Pay\Common\BaseStrategy;
use Kltong\Pay\Config\Channel;
use Kltong\Pay\Exception\PayException;

/**
 * 支付的上下文
 * Class ChargeContext
 * @package Kltong\Pay
 */
class ChargeContext{

    /**
     * @var 业务渠道
     */
    protected   $channel;

    /**
     * 初始化渠道信息
     * @param $channel
     * @param $config
     */
    public function initContext($channel, $config){
        switch ($channel){
            case Channel::PRECARD_MAGNETICANDPWD;
                $this->channel = new PreCardCharge($config);
                break;
            case Channel::PRECARD_CARDWITHPASS;
                $this->channel = new CardWithPassBiz($config);
                break;
            default :
                throw new PayException("传入的支付通道不支持！请检查channel");
        }
    }


    /**
     * 调用业务处理
     * @param array $data
     * @return mixed
     */
    public function charge(array $data)
    {
        if (! $this->channel instanceof BaseStrategy) {
            throw new PayException('请检查初始化是否正确');
        }

        try {
            return $this->channel->handle($data);
        } catch (PayException $e) {
            throw $e;
        }
    }
}
