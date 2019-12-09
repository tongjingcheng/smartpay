<?php
/**
 * 预付卡消费实例
 */
require "../../vendor/autoload.php";
use Kltong\Pay\Client\Charge;
use Kltong\Pay\Channel;
use Kltong\Pay\Exception\PayException;

$pre_card_config = require_once __DIR__.'/precardconfig.php';
$data = [
    'cardId'=>'8889990010000028810',
    'txAt'=>1,
    'reqSeq'=>date("mdHis").random_int(1,100000),
    'pin1'=>'580058',
    'strk2'=>'8889990010000028810=99125000180000???'

];
try{
     $result = Charge::execute(Channel::PRECARD_MAGNETICANDPWD,$pre_card_config,$data);
}catch (PayException $e){
    exit($e->getMessage());
}catch(Exception $e){
    exit($e->getMessage());
}
print_r($result);

