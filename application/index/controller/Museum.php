<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/24
 * Time: 12:00
 */

namespace app\index\controller;

use app\index\model\Wechat;
use EasyWeChat\Factory;
use think\Controller;
use think\Session;
use think\Cache;


class Museum extends Controller
{
    public function index()
    {
        $wechatModel = new Wechat();
        $jssdk = $wechatModel->OAuthAndJssdk();
        $num = Cache::get('view_num');
        if ($num) {
            $num++;
            Cache::inc('view_num');
        } else {
            $num = 20180726;
            Cache::set('view_num', $num);
        }
        $title = '是时候，对一个博览会动手了';
        $link = 'https://www.chingso.com/museum';
        $desc = '恭喜你，成为第20180726位代言人';
        $imgUrl = 'https://www.chingso.com/static/images/museum-thumb.jpg';
    
        $this->assign([
            'jssdk' => $jssdk,
            'title' => $title,
            'link' => $link,
            'desc' => $desc,
            'imgUrl' => $imgUrl,
            'nickName' => Session::get('wechat_user'),
            'num' => $num,
        ]);
        return $this->fetch('museum/index');
    }

    public function callback()
    {
        $config = [
            'app_id' => config('wechat.appid'),
            'secret' => config('wechat.app_secret'),
            'oauth' => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => '/museum/callback',
            ],
        ];

        $app = Factory::officialAccount($config);
        $oauth = $app->oauth;

        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();

        Session::set('wechat_user', $user->getNickname());

        $targetUrl = Session::get('target_url');

        $this->redirect($targetUrl);
    }
}