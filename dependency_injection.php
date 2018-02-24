<?php
/**
 * 依赖注入模式
 * Created by PhpStorm.
 * User: wangyuan
 * Date: 18-2-8
 * Time: 下午1:18
 */
//如果一个A类依赖B类和C类的话,那么如果B\C修改,就要去修改A类,违背了依赖倒置原则
//解决办法有两种,

// 1 构造函数

class B{
    public function method(){
        echo 'b';
    }
}


class C{
    public function method(){
        echo 'c';
    }
}
class A{
    public $b;
    public $c;

    public function __construct($b,$c){
        $this->b = $b;
        $this->c = $c;
    }

    public function method(){
        $this->b->method();
        $this->c->method();
    }
}


$a = (new A(new B(),new C()));
$a->method();


//2 工厂方法注入
class Factory{
    public function create($name){
        switch ($name){
            case 'B':
                return new B();
                break;
            case 'C':
                return new C();
                break;
            default:
                return null;
                break;
        }
    }
}


Class D
{
    public $b;
    public $c;
    public function method(){
        $factory = new Factory();
        $this->b = $factory->create('B');
        $this->c = $factory->create('C');

        $this->b->method();
        $this->c->method();
    }
}

//另外就是还可以把B和C的方法抽象出来成一个接口 然后再继承

//现在就改成了A依赖Factory  Factory依赖B C



//// ****************************************************************这是构造函数注入的例子
//class Comment extend yii\db\ActiveRecord
//{
//    // 用于引用发送邮件的库
//    private $_eMailSender;
//
//    // 构造函数注入
//    public function __construct($emailSender)
//{
//    ...
//    $this->_eMailSender = $emailSender;
//    ...
//}
//
//    // 当有新的评价，即 save() 方法被调用之后中，会触发以下方法
//    public function afterInsert()
//{
//    ...
//    //
//    $this->_eMailSender->send(...);
//    ...
//}
//}
//
//// 实例化两种不同的邮件服务，当然，他们都实现了EmailSenderInterface
//sender1 = new GmailSender();
//sender2 = new MyEmailSender();
//
//// 用构造函数将GmailSender注入
//$comment1 = new Comment(sender1);
//// 使用Gmail发送邮件
//$comment1.save();
//
//// 用构造函数将MyEmailSender注入
//$comment2 = new Comment(sender2);
//// 使用MyEmailSender发送邮件
//$comment2.save();


// **************************************************************************这是属性注入的例子
//class Comment extend yii\db\ActiveRecord
//{
//    // 用于引用发送邮件的库
//    private $_eMailSender;
//
//    // 定义了一个 setter()
//    public function setEmailSender($value)
//{
//    $this->_eMailSender = $value;
//}
//
//    // 当有新的评价，即 save() 方法被调用之后中，会触发以下方法
//    public function afterInsert()
//{
//    ...
//    //
//    $this->_eMailSender->send(...);
//    ...
//}
//}
//
//// 实例化两种不同的邮件服务，当然，他们都实现了EmailSenderInterface
//sender1 = new GmailSender();
//sender2 = new MyEmailSender();
//
//$comment1 = new Comment;
//// 使用属性注入
//$comment1->eMailSender = sender1;
//// 使用Gmail发送邮件
//$comment1.save();
//
//$comment2 = new Comment;
//// 使用属性注入
//$comment2->eMailSender = sender2;
//// 使用MyEmailSender发送邮件
