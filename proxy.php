<?php
/**
 * 代理模式
 * 代理模式能够协调调用者和被调用者，在一定程度上降低了系 统的耦合度。
 * 远程代理使得客户端可以访问在远程机器上的对象，远程机器 可能具有更好的计算性能与处理速度，可以快速响应并处理客户端请求。
 * 虚拟代理通过使用一个小对象来代表一个大对象，可以减少系 统资源的消耗，对系统进行优化并提高运行速度。
 * 保护代理可以控制对真实对象的使用权限。
 *
 * 原本的实体和代理方法同时实现一个接口
 * Created by PhpStorm.
 * User: wangyuan
 * Date: 18-2-8
 * Time: 下午3:26
 */

//interface subject{
//    public function say();
//    public function send();
//}
//
//class RealSubject  implements subject{
//    public $name = null;
//    public function __construct($name)
//    {
//        $this->name = $name;
//    }
//
//    public function say()
//    {
//        // TODO: Implement say() method.
//        echo $this->name.'say';
//    }
//
//    public function send()
//    {
//        // TODO: Implement send() method.
//        echo $this->name.'send';
//    }
//}
//
//
//class Proxy implements subject{
//    public $realObject = null;
//
//    public function __construct(RealSubject $realObj)
//    {
//        $this->realObject = $realObj;
//    }
//
//
//    public function say()
//    {
//        // TODO: Implement say() method.
//        $this->realObject->say();
//    }
//
//
//    public function send()
//    {
//        // TODO: Implement send() method.
//        $this->realObject->send();
//    }
//}
//
//$subject = new RealSubject('xxx');
//$proxy = new Proxy($subject);
//$proxy->say();
//$proxy->send();

//代理抽象接口
interface shop{
    public function buy($title);
}

//原来的CD商店，被代理对象
class CDshop implements shop{
    public function buy($title){
        echo "购买成功，这是你的《{$title}》唱片".PHP_EOL;
    }
}

//CD代理
class Proxy implements shop{
    public function buy($title){
        $this->go();
        $CDshop = new CDshop;
        $CDshop->buy($title);
    }
    public function go(){
        echo "跑去香港代购".PHP_EOL;
    }
}

//你93年买了张 吻别
$CDshop = new CDshop;
$CDshop->buy("吻别");
//14年你想买张 醒着做梦 找不到CD商店了，和做梦似的，不得不找了个代理去香港帮你代购。
$proxy = new Proxy;
$proxy->buy('xxx');

