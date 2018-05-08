<?php

namespace app\wechat\controller;

use think\Controller;
use think\Request;

class Index extends Controller
{
    /**
     * 响应微信请求
     * @param Request $request
     */
    public function index(Request $request)
    {
        $param = $request->param();
        //获得参数 signature nonce token timestamp echostr
        $nonce     = $param['nonce'];
        $token     = 'opadszh5_token';
        $timestamp = $param['timestamp'];
        $echostr   = $param['echostr'];
        $signature = $param['signature'];
        //形成数组，然后按字典序排序
        $array = array($nonce, $timestamp, $token);
        sort($array);
        //拼接成字符串,sha1加密 ，然后与signature进行校验
        $str = sha1( implode( $array ) );
        if( $str  == $signature && $echostr ){
            //第一次接入weixin api接口的时候
            echo  $echostr;
            exit;
        }
    }
}
