<?php
namespace Kltong\Pay\Common;

/**
 * 策略类接口
 * Interface BaseStrategy
 * @package Kltong\Pay\Common
 */
interface BaseStrategy
{
    /**
     * 处理具体的业务
     * @param array $data
     * @return mixed
     */
    public function handle(array $data);
}