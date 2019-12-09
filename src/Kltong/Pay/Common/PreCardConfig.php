<?php
namespace Kltong\Pay\Common;

use Kltong\Pay\Exception\PayException;

/**
 * 预付卡配置信息
 * Class PreCardConfig
 * @package Kltong\Pay\Common
 */
final class PreCardConfig extends AbstractConfig
{
    /**
     * 终端号
     * @var
     */
    public $termId;

    /**
     * 卡号
     * @var
     */
    public $cardId;

    /**
     * 交易金额
     * @var
     */
    public $txAt;

    /**
     * 请求日期 8位
     * @var
     */
    public $reqDt;

    /**
     * 请求时间 10位 可选
     * @var
     */
    public $reqTm;


    /**
     * 请求流水
     * @var
     */
    public $reqSeq;

    /**
     * 接入方参考号（不能超过32位）
     * @var
     */
    public $srefSeq;

    /**
     * 密码
     * @var
     */
    public $pin1;

    /**
     * 磁条号
     * @var
     */
    public $strk2;

    /**
     * @var 证书
     */
    protected  $app_cert;
    protected $app_pass;


    protected function initConfig(array $config)
    {
        if(key_exists('merchantId',$config) && !empty($config['merchantId'])){
            $this->merchantId = $config['merchantId'];
        }
        if(key_exists('version',$config) && !empty($config['version'])){
            $this->version = $config['version'];
        }

        if(key_exists('signType',$config) && !empty($config['signType'])){
            $this->signType = $config['signType'];
        }

        if(key_exists('srefSeq',$config) && !empty($config['srefSeq'])){
            $this->srefSeq = $config['srefSeq'];
        }

        if(key_exists('appCert',$config) && !empty($config['appCert'])){
            $this->app_cert = $config['appCert'];
        }

        if(key_exists('appCertPass',$config) && !empty($config['appCertPass'])){
            $this->app_pass = $config['appCertPass'];
        }

        $this->reqDt = date('Ymd', time());
        $this->reqTm = time();
    }

    /**
     * @param array $data
     */
    public function process_data( array $data){
        if(!isset($data['cardId']) || empty($data['cardId'])){
            throw new PayException("卡号没传");
        }
        if(!isset($data['txAt']) || empty($data['txAt'])){
            throw new PayException("txAt没传");
        }
        if(!isset($data['reqSeq']) || empty($data['reqSeq'])){
            throw new PayException("reqSeq没传");
        }
        if(!isset($data['pin1']) || empty($data['pin1'])){
            throw new PayException("pin1没传");
        }

        $this->cardId = $data['cardId'];
        $this->txAt = $data['txAt'];
        $this->reqSeq = $data['reqSeq'];
        $this->pin1 = $data['pin1'];
        $this->strk2 = $data['strk2'];
    }

    public function get_app_cert(){
        if(!file_exists($this->app_cert)){
            throw new PayException("证书不存在!!!");
        }
        return file_get_contents($this->app_cert);
    }

    public function get_app_pass(){
        return $this->app_pass;
    }
}