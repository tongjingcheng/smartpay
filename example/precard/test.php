<?php
require "../../vendor/autoload.php";

use Kltong\Pay\Config\Channel;
use Kltong\Pay\Client\Charge;
use Kltong\Pay\Exception\PayException;

$pre_card_config = new \Kltong\Pay\Config\PreCardConfig();
$pre_card_config->setDev(1)->setMerchantId('903310112340001')
    ->setPkcs12(dirname(__FILE__) . DIRECTORY_SEPARATOR .  '903310112340001-kltong.pfx')
    ->setPkcsPassword('123456');
$data = [
    'cardId'=>'8889990010000028810',
    'txAt'=>1,
    'reqSeq'=>date("mdHis").random_int(1,100000),
    'pin1'=>'580058',

];
try{
    $result = Charge::execute(Channel::PRECARD_CARDWITHPASS,$pre_card_config,$data);
}catch (PayException $e){
    exit($e->getMessage());
}catch(Exception $e){
    exit($e->getMessage());
}