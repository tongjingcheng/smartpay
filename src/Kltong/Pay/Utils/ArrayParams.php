<?php
namespace Kltong\Pay\Utils;
/**
 * 处理数组转为加签前字符串
 * Class ArrayParams
 * @package Kltong\Pay\Utils
 */
class ArrayParams
{
    public static function get_sign_string(array $data){
        ksort($data);
        $pre_array = array();
        foreach ($data as $k=>$val) {
            if(!empty($val) && !in_array($k,array('dev','sign','app_cert','app_pass'))){
                $pre_array[] = $k.'='.$val;
            }
        }
        return implode("&",$pre_array);
    }
}