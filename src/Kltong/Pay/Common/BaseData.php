<?php
namespace Kltong\Pay\Common;

/**
 * 支付相关数据接口底层
 * Class BaseData
 * @package Kltong\Pay\Common
 */
abstract class BaseData
{
    /**
     * @var 请求参数
     */
    protected $request;

    /**
     * @var 返回结果
     */
    protected $return_data;

    /**
     * @var 渠道
     */
    protected $channel;


}