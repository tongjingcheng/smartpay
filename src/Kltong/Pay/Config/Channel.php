<?php
namespace Kltong\Pay;

/**
 * 常量
 * Class Config
 * @package Kltong\Pay
 */
final class Channel
{
    /**
     * 磁卡及密码消费
     */
    const PRECARD_MAGNETICANDPWD = 'payWithMagneticAndPwd';

    /**
     * 实体卡,卡号和卡密码消费
     */
    const PRECARD_CARDWITHPASS = 'precard_cardwithpassword';

}