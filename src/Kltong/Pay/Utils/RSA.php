<?php
namespace Kltong\Pay\Utils;

/**
 * RSA签名与验签
 * Class RSA
 * @package Kltong\Pay\Utils
 */
class RSA
{
    /***
     * 加签
     * @param string $data
     * @param string $pkcs12
     * @param string $password
     * @return string
     */
    public static function getSign(string $data,string $pkcs12,string $password)
    {
        $sign = '';
        if (openssl_pkcs12_read($pkcs12, $certs, $password)) {
            $privateKey = $certs['pkey']; //根据实际情况键值可能不同
            if (openssl_sign($data, $binarySignature, $privateKey, OPENSSL_ALGO_SHA256)) {
                $sign = base64_encode($binarySignature);
            }

        }
        return $sign;
    }

    /**
     * 验签
     * @param string $data
     * @param string $sign
     * @param string $pkcs12
     * @param string $password
     * @return bool
     */
    public static function verify(string $data, string $sign,string $pkcs12,string $password){
        $result = false;
        if (openssl_pkcs12_read($pkcs12, $certs, $password)) {
            $result = (bool)openssl_verify($data, base64_decode($sign), $certs['cert']);
        }
        return $result;
    }
}