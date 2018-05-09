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
        $link = 'https://www.chingso.com';
        $desc = '现代“最美新娘”长啥样？来文博会大鹏新区分会场寻答案';
        $imgUrl = 'https://www.chingso.com/static/images/thumb.png';
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
