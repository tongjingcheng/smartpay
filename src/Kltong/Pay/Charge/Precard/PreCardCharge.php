<?php
namespace Kltong\Pay\Charge\Precard;

use Kltong\Pay\Common\Precard\PreCardBaseStrategy;
use Kltong\Pay\Utils\ArrayParams;
use Kltong\Pay\Utils\RSA;

/**
 * 消费接口
 * Class precardCharge
 * @package Kltong\Pay\Charge\Precard
 */
class PreCardCharge extends PreCardBaseStrategy
{

    /**
     * 请求参数
     */
    public function retParams(){

        $content = array(
            'cardId'=>$this->pre_card_config->cardId,
            'termId'=>$this->pre_card_config->termId,
            'txAt'=>$this->pre_card_config->txAt,
            'reqDt'=>$this->pre_card_config->reqDt,
            'reqTm'=>$this->pre_card_config->reqTm,
            'reqSeq'=>$this->pre_card_config->reqSeq,
            'pin1'=>$this->pre_card_config->pin1,
            'srefSeq'=>$this->pre_card_config->srefSeq,
            'strk2'=>$this->pre_card_config->strk2
        );
        $newContent = array();
        foreach ($content as $k=>$val){
            if(!empty($val)){
                $newContent[$k]=$val;
            }
        }
        $requet_data = array(
            'head'=>$this->get_header(),
            'content'=> $newContent
        );
       $this->request_data = ($requet_data);
    }

    public function get_header(){
        return array(
            'version'=>$this->pre_card_config->version,
            'merchantId'=>$this->pre_card_config->merchantId,
            'signType'=>$this->pre_card_config->signType,
            'sign'=>RSA::getSign(ArrayParams::get_sign_string($this->pre_card_config->toArray()),$this->pre_card_config->get_app_cert(),$this->pre_card_config->get_app_pass())
        );
    }





}