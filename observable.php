<?php
/** 观察者模式
 * 观察者模式，也称发布-订阅模式，定义了一个被观察者和多个观察者的、一对多的对象关系。

* 在被观察者状态发生变化的时候，它的所有观察者都会收到通知，并自动更新。

* 观察者模式通常用在实时事件处理系统、组件间解耦、数据库驱动的消息队列系统，同时也是MVC设计模式中的重要组成部分。
 * Created by PhpStorm.
 * User: wangyuan
 * Date: 18-2-7
 * Time: 上午10:38
 */

/**
 * 观察者接口
 * Interface Observer
 */
interface Observer{
    // 接收到通知的处理方法
    public function update(Observable $observable);
}


//邮件通知
class Email implements Observer{

    public function update(Observable $observable)
    {
        // TODO: Implement update() method.
        $state = $observable->getState();
        if ($state) {
            echo '发送邮件：您已经成功下单。';
        } else {
            echo '发送邮件：下单失败，请重试。';
        }
    }

}


//短信通知
class Message implements Observer{
    public function update(Observable $observable)
    {
        // TODO: Implement update() method.
        $state = $observable->getState();
        if ($state) {
            echo '短信通知：您已下单成功。';
        } else {
            echo '短信通知：下单失败，请重试。';
        }
    }
}

/**
 * 观察者3：记录日志
 */
class Log implements Observer
{
    public function update(Observable $observable)
    {
        echo '记录日志：生成了一个订单记录。';
    }
}


/**
 * 被观察者接口 是一些具体的实例
 */
interface Observable
{
    // 添加/注册观察者
    public function attach(Observer $observer);
    // 删除观察者
    public function detach(Observer $observer);
    // 触发通知
    public function notify();
}


class Order implements Observable{

    private $observers = array(); //保存观察者

    private $state = 0; //订单状态

    public function attach(Observer $observer)
    {
        // TODO: Implement attach() method.
        $key = array_search($observer, $this->observers);
        if ($key === false) {
            $this->observers[] = $observer;
        }
    }

    public function detach(Observer $observer)
    {
        // TODO: Implement detach() method.
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify()
    {
        // TODO: Implement notify() method.
        foreach ($this->observers as $observer) {
            // 把本类对象传给观察者，以便观察者获取当前类对象的信息
            $observer->update($this);
        }
    }

    // 订单状态有变化时发送通知
    public function addOrder()
    {
        $this->state = 1;
        $this->notify();
    }

    // 获取提供给观察者的状态
    public function getState()
    {
        return $this->state;
    }
}


// 创建观察者对象
$email = new Email();
$message = new Message();
$log = new Log();

//创建一个被观察者
$order = new Order();
$order->attach($email);
$order->attach($message);
$order->attach($log);
$order->addOrder();

echo '<br />';
//删除一个观察者
$order->detach($email);
$order->addOrder();

