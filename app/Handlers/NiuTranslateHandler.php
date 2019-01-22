<?php

namespace App\Handlers;

use GuzzleHttp\Client;

class NiuTranslateHandler
{
    public function translate($text,$from,$to)
    {
        // 实例化 HTTP 客户端
        $http = new Client;

        // 初始化配置信息
        $api = 'http://api.niutrans.vip/NiuTransServer/translation?';
        $apikey = config('services.niu_translate.apikey');


        // 构建请求参数
        $query = http_build_query([
            "from"  => $from,
            "to"    => $to,
            "apikey" => $apikey,
            "src_text" => $text,
        ]);

        // 发送 HTTP Get 请求
        $response = $http->post($api.$query);

        $result = json_decode($response->getBody(), true);

        /**
        获取结果，如果请求成功，dd($result) 结果如下：

        {
           "tgt_text": "hello \n",
           "to": "en",
           "from": "zh"
         }
         如果请求失败，dd($result) 结果如下
        {
           "to": null,
           "result_code": "10000",
           "from":null,
           ""result_msg": "Input is empty",
           ""src_text": null
         }
        **/

        // 尝试获取获取翻译结果
        return $result['tgt_text'];

    }


}