<?php
/**
 * Created by PhpStorm.
 * User=> jason
 * Date=> 2018/5/9
 * Time=> 1=>33
 */

namespace app\index\model;


use EasyWeChat\Factory;

class Wechat
{
    public function getJssdk()
    {
        $config = [
            'app_id' => config('wechat.appid'),
            'secret' => config('wechat.secret'),

        ];
        $app = Factory::officialAccount($config);
        //$jssdk = $app->jssdk->buildConfig(['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo', 'onMenuShareQZone']);
        $jssdk = [
            'debug' => true,
            'appId' => 'wx3cf0f39249eb0e60',
            'timestamp'=> 1430009304,
            'nonceStr'=> 'qey94m021ik',
            'signature'=> '4F76593A4245644FAE4E1BC940F6422A0C3EC03E',
            'jsApiList'=> ['onMenuShareQQ', 'onMenuShareWeibo']
        ];
        return json_encode($jssdk);
    }
}