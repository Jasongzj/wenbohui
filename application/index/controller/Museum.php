<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/24
 * Time: 12:00
 */

namespace app\index\controller;

use app\index\model\Wechat;
use think\Controller;


class Museum extends Controller
{
    public function index()
    {
        $wechatModel = new Wechat();
        $jssdk = $wechatModel->getJssdk();
        $title = '是时候，对一个博览会动手了';
        $link = 'https://www.chingso.com/museum';
        $desc = '恭喜你，成为第20180726位唤醒人';
        $imgUrl = 'https://www.chingso.com/static/images/museum-thumb.png';
        $this->assign([
            'jssdk' => $jssdk,
            'title' => $title,
            'link' => $link,
            'desc' => $desc,
            'imgUrl' => $imgUrl,
        ]);
        return $this->fetch('museum/index');
    }
}