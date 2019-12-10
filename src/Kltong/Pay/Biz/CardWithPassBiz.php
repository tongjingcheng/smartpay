<?php
namespace Kltong\Pay\Biz;

use Kltong\Pay\Common\PreCardProcess;
use Kltong\Pay\Request\CardPassContent;
use Kltong\Pay\Utils\ArrayParams;
use Kltong\Pay\Utils\RSA;

/**
 * Class CardWithPassBiz
 * @package Kltong\Pay\Biz
 */
class CardWithPassBiz extends PreCardProcess
{

    public $head;
    public $content;


    private function process_data(){
        $cardPassContent = new CardPassContent();
        $cardPassContent->merchantId = $this->pre_card_config->getMerchantId();
        $cardPassContent->version = $this->pre_card_config->getVersion();
        $cardPassContent->signType = $this->pre_card_config->getSignType();
        $this->cardPassContent = $cardPassContent;
    }

    private function process_content(){
        $this->cardPassContent->cardId  = $this->pre_card_data['cardId'];
        $this->cardPassContent->pin1  = $this->pre_card_data['pin1'];
        $this->cardPassContent->txAt  = $this->pre_card_data['txAt'];
        $this->cardPassContent->reqDt  = date("Ymd");
        $this->cardPassContent->reqTm  = date("His");
        $this->cardPassContent->reqSeq  = $this->pre_card_data['reqSeq'];

    }

    public function process(){
        $this->process_data();
        $this->process_content();
        //处理加答前参数
        $string = ArrayParams::get_sign_string($this->cardPassContent->toArray());
        $sign = RSA::getSign($string,file_get_contents($this->pre_card_config->getPkcs12()),$this->pre_card_config->getPkcsPassword());
        $this->cardPassContent->sign = $sign ;

        $head = "";
        $content = '';
        $content = array(
            'cardId'=>$this->cardPassContent->cardId,
            'txAt'=>$this->cardPassContent->txAt,
            'reqDt'=>$this->cardPassContent->reqDt,
            'reqTm'=>$this->cardPassContent->reqTm,
            'reqSeq'=>$this->cardPassContent->reqSeq,
            'pin1'=>$this->cardPassContent->pin1,
        );
        $newContent = array();
        foreach ($content as $k=>$val){
            if(!empty($val)){
                $newContent[$k]=$val;
            }
        }
        $head = $this->get_header();
        $requet_data = array(
            'head'=>$head,
            'content'=> $newContent
        );
        return $requet_data;

    }



}