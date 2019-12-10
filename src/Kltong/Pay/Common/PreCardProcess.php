<?php
namespace Kltong\Pay\Common;

use GuzzleHttp\Client;
use Kltong\Pay\Config\PreCardConfig;
use Kltong\Pay\Exception\PayException;

class PreCardProcess implements BaseStrategy
{
    /**
     * 商户配置
     * @var PreCardConfig|null
     */
    public $pre_card_config = null;

    public $pre_card_data = array();

    public $cardPassContent = array();
    /**
     * 请求参数
     * @var array
     */
    public $requestData = array();


    public function __construct(PreCardConfig $config)
    {
        if(empty($config->merchantId)){
            throw new PayException("未设置商户号");
        }
        if(empty($config->pkcs12)){
            throw new PayException("未设置证书");
        }
        if(empty($config->pkcsPassword)){
            throw new PayException("未设置证书密码");
        }
        $this->pre_card_config = $config;
    }

    /**
     * @inheritDoc
     */
    public function handle(array $data)
    {
        $this->pre_card_data = $data;
        $data = $this->process();
        if($this->pre_card_config->getDev() =="1"){
            $url = 'https://ipay.chinasmartpay.cn/openapi/LianxinCard/pay';
        }else{
            $url = 'https://openapi.openepay.com/openapi/LianxinCard/pay';
        }

        $client = new Client([
            'timeout' => '10.0'
        ]);
        $response = $client->request('POST', $url, ['timeout'=>5,'verify'=>false,'json'=>$data]);
        if ($response->getStatusCode() != '200') {
            throw new PayException('网络发生错误，请稍后再试curl返回码：' . $response->getReasonPhrase());
        }
        $body = $response->getBody();
        // 格式化为数组
        $retData = json_decode($body,true);
        if (isset($retData['responseCode']) &&  $retData['responseCode']!= 'SUCCESS') {
            throw new PayException('支付失败：' . $retData['responseMsg']);
        }
        return $retData;


    }


    public function get_header(){
        return array(
            'version'=>$this->cardPassContent->version,
            'merchantId'=>$this->cardPassContent->merchantId,
            'signType'=>$this->cardPassContent->signType,
            'sign' => $this->cardPassContent->sign
        );
    }


}