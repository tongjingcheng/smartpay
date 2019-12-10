<?php
namespace Kltong\Pay\Request;

/**
 * 卡号与卡密支付
 * Class CardPassContent
 * @package Kltong\Pay\Request
 */
class CardPassContent extends Head
{
    /**
     * 卡号
     * @var
     */
    public $cardId;

    /**
     * 密码
     * @var
     */
    public $pin1;

    /**
     * 交易金额 单位分
     * @var
     */
    public $txAt;

    /**
     * 请求日期 年月日8位
     * @var
     */
    public $reqDt;

    /**
     * 请求时间 可选 时分秒 6位
     * @var
     */
    public $reqTm;

    /**
     * 商户流水号 10位，不可重复
     * @var
     */
    public $reqSeq;

}