<?php
namespace Kltong\Pay\Params;
/**
 * 下单请求参数
 * Class RequestOrder
 * @package Kltong\Pay\Params
 */
class RequestOrder{

    /**
     * String	10 M
     * @var string 接入方机构号
     *
     */
    private $reqBr;

    /**
     * 4	M
     * @var string 产品号
     */
    private  $cardType;

    /**
     * 	19	M
     * @var string 卡号
     */
    private $cardid;

    /**
     * 8	M
     * @var string 密码
     */
    private $pin1;

    /**
     * 8	O
     * @var string 终端号
     */
    private $termid;

    /**
     * 12	M
     * @var int 交易金额 单位分
     */
    private $txat;

    /**
     * 8	M
     * @var int 请求日期
     */
    private $reqdt;

    /**
     * 10	M
     * @var string 请求流水号不能超过10位
     */
    private $reqSeq;

    /**
     * 10	M
     * @var string 发卡机构号
     */
    private $sopnBrhId;

    /**
     * 10	M
     * @var string 发卡品牌号
     */
    private $sopnBrandId;
}
