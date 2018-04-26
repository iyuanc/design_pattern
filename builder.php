<?php
/**
 * 建造者模式 将一个复杂对象的构造与它的表示分离，使同样的构建过程可以创建不同的表示的设计模式。
 * Created by PhpStorm.
 * User: wangyuan
 * Date: 18-2-8
 * Time: 下午3:26
 */

class UserInfo
{
    protected $_userName;
    protected $_userAge;
    protected $_userHobby;

    public function setUserName($userName)
    {
        $this->_userName = $userName;
    }

    public function setUserAge($userAge)
    {
        $this->_userAge = $userAge;
    }

    public function setUserHobby($userHobby)
    {
        $this->_userHobby = $userHobby;
    }

    public function getPeopleInfo()
    {
        echo  "<br>这个人的名字是：" . $this->_userName . "<br>年龄为：" . $this->_userAge . "<br>爱好：" . $this->_userHobby;
    }
}

//建造类 将用户的一些信息封装起来
class UserBuilder
{
    protected $_obj;

    public function __construct()
    {
        $this->_obj = new UserInfo();
    }

    public function builderPeople($userInfo)
    {
        $this->_obj->setUserName($userInfo['userName']);
        $this->_obj->setUserAge($userInfo['userAge']);
        $this->_obj->setUserHobby($userInfo['userHobby']);
    }

    public function getBuliderPeopleInfo()
    {
        $this->_obj->getPeopleInfo();
    }
}


$userArr = array(
    'userName' => '松涛',
    'userAge' => '23',
    'userHobby' => '推理小说'
);

$modelUserBuilder = new UserBuilder();
$modelUserBuilder->builderPeople($userArr);
$modelUserBuilder->getBuliderPeopleInfo();