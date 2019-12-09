<?php
namespace Kltong\Pay\Common\Precard;


use GuzzleHttp\Client;
use Kltong\Pay\Common\BaseStrategy;
use Kltong\Pay\Common\PreCardConfig;
use Kltong\Pay\Exception\PayException;

class PreCardBaseStrategy implements BaseStrategy
{
    /**
     * 支付请求方法
     * @var
     */
    protected $method;

    /**
     * @var 预付卡支付配置
     */
    protected $pre_card_config;

    /**
     * @var 业务请求参数
     */
    protected $request_data;

    public function __construct(array $config)
    {
        try {
            $this->pre_card_config = new PreCardConfig($config);
        } catch (PayException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function handle(array $data)
    {
        $url = 'https://ipay.chinasmartpay.cn/openapi/prepaidEntityCard/payWithMagneticAndPwd';
        try {
            $this->pre_card_config->process_data($data);
            $this->retParams();
        }catch (PayException $e){
            throw $e;
        }

        $client = new Client([
            'timeout' => '10.0'
        ]);
        $response = $client->request('POST', $url, ['timeout'=>5,'verify'=>false,'json'=>$this->request_data]);
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
}