<?php
namespace app\index\controller;

use app\index\model\Wechat;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $wechatModel = new Wechat();
        $jssdk = $wechatModel->getJssdk();
        $title = '《牛不牛？看我造艘游艇逛文博》';
        $link = 'www.chingso.com';
        $desc = '';
        $imgUrl = '';
        $this->assign([
            'jssdk' => $jssdk,
            'title' => $title,
            'link' => $link,
            'desc' => $desc,
            'imgUrl' => $imgUrl,
        ]);
        return $this->fetch('index/index');
    }

    public function miss()
    {
        return $this->index();
    }
}
