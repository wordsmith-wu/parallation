<?php

namespace App\Handlers;

use GuzzleHttp\Client;

class TranslationHandler
{
    public function niuTranslate($text,$from,$to)
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

    public function baiduTranslate($text,$from,$to)
    {
        // 实例化 HTTP 客户端
        $http = new Client;

        // 初始化配置信息
        $api = 'http://api.fanyi.baidu.com/api/trans/vip/translate?';
        $appid = config('services.baidu_translate.appid');
        $key = config('services.baidu_translate.key');
        $salt = time();

        // 根据文档，生成 sign
        // http://api.fanyi.baidu.com/api/trans/product/apidoc
        // appid+q+salt+密钥 的MD5值
        $sign = md5($appid. $text . $salt . $key);

        // 构建请求参数
        $query = http_build_query([
            "q"     => $text,
            "from"  => $from,
            "to"    => $to,
            "appid" => $appid,
            "salt"  => $salt,
            "sign"  => $sign,
        ]);

        // 发送 HTTP Get 请求
        $response = $http->get($api.$query);

        $result = json_decode($response->getBody(), true);

        /**
        获取结果，如果请求成功，dd($result) 结果如下：

        array:3 [▼
            "from" => "zh"
            "to" => "en"
            "trans_result" => array:1 [▼
                0 => array:2 [▼
                    "src" => "XSS 安全漏洞"
                    "dst" => "XSS security vulnerability"
                ]
            ]
        ]

        **/

        // 尝试获取获取翻译结果
        return $result['trans_result'][0]['dst'];

    }


}