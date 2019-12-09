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
     * 调用接口环境,开发为true,生产环境为false
     */
    const dev = true;

    /**
     * 磁卡及密码消费
     */
    const PRECARD_MAGNETICANDPWD = "payWithMagneticAndPwd";

}