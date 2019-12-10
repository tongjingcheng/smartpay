<?php
namespace Kltong\Pay\Config;

/**
 * 商户信信配置
 * Class PreCardConfig
 * @package Kltong\Pay\Config
 */
class PreCardConfig
{
    public $merchantId;
    public $pkcs12;
    public $pkcsPassword;
    public $signType = 2;
    public $dev = 1;
    public $version = '1.0';

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param $merchantId
     * @return $this
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPkcs12()
    {
        return $this->pkcs12;
    }

    /**
     * @param $pkcs12
     * @return $this
     */
    public function setPkcs12($pkcs12)
    {
        $this->pkcs12 = $pkcs12;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPkcsPassword()
    {
        return $this->pkcsPassword;
    }

    /**
     * @param $pkcsPassword
     * @return $this
     */
    public function setPkcsPassword($pkcsPassword)
    {
        $this->pkcsPassword = $pkcsPassword;
        return $this;
    }

    /**
     * @return int
     */
    public function getSignType()
    {
        return $this->signType;
    }

    /**
     * @param $signType
     * @return $this
     */
    public function setSignType($signType)
    {
        if(empty($signType)){
            return $this;
        }
        $this->signType = $signType == 1 ? 1 :2;
        return $this;
    }

    /**
     * @return int
     */
    public function getDev()
    {
        return $this->dev;
    }

    /**
     * @param $dev
     * @return $this
     */
    public function setDev($dev)
    {
        $this->dev = $dev == 1 ? 1 :2;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }


}