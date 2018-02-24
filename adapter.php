<?php
/**
 * 适配器模式，即根据客户端需要，将某个类的接口转换成特定样式的接口，以解决类之间的兼容问题。
   如果我们的代码依赖一些外部的API，或者依赖一些可能会经常更改的类，那么应该考虑用适配器模式。
 * Created by PhpStorm.
 * User: wangyuan
 * Date: 18-2-7
 * Time: 上午11:38
 */
interface PayAdapter{
    public function pay();
}

class AlipayAdapter implements PayAdapter
{
    public function pay()
    {
        // 实例化Alipay类，并用Alipay的方法实现支付
        $alipay = new Alipay();
        $alipay->sendPayment();
    }
}

Class WeixinAdapter implements PayAdapter{
    public function pay(){
        // 实例化Alipay类，并用Alipay的方法实现支付
        $wechatPay = new WechatPay();
        $wechatPay->scan();
        $wechatPay->doPay();
    }
}

$alipay = new AlipayAdapter();
$alipay->pay();