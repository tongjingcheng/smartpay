<?php
namespace Kltong\Pay\Params;
/**
 * Class Head 主要包含head头
 * @package Kltong\Pay\Params
 */
class Head{

    /**
     * @var string 接口版本
     */
    private $version = "1.0";

    /**
     * @var string 商户号
     */
    private $merchantId;

    /**
     * @var int 签名类型， 2：RSA(Sha256)
     */
    private  $signType=2;

    /**
     * @var string 签名信息
     */
    private $sign = "";


    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param string $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return int
     */
    public function getSignType()
    {
        return $this->signType;
    }

    /**
     * @param int $signType
     */
    public function setSignType($signType)
    {
        $this->signType = $signType;
    }

    /**
     * @return string
     */
    public function getSign()
    {
        return $this->sign;
    }

    /**
     * @param string $sign
     */
    public function setSign($sign)
    {
        $this->sign = $sign;
    }

}
