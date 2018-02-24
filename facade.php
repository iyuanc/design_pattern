<?php
/**
 * 外观模式 就是对一系列操作进行封装，并对外提供一个接口
 * 客户端无须关心子系统的工作细节，通过外观角色即可调用相关功能
 * Created by PhpStorm.
 * User: wangyuan
 * Date: 18-2-7
 * Time: 下午3:22
 */

//子类
class SystemA{

    public function actionOne(){
        echo '方法1';
    }
}


class SystemB{
    public function actionTwo(){
        echo '方法2';
    }
}

class SystemC{
    public function actionThree(){
        echo '方法3';
    }
}


class Facade{
    private $systemA = null;
    private $systemB = null;
    private $systemC = null;

    public function __construct()
    {
        $this->systemA = new SystemA();
        $this->systemB =new SystemB();
        $this->systemC = new SystemC();
    }

    public function actionOne(){
        $this->systemA->actionOne();
    }

    public function actionTwo(){
        $this->systemB->actionTwo();
    }

    public function actionThree(){
        $this->systemC->actionThree();
    }

    public function actionFour(){
        $this->systemA->actionOne();
        $this->systemB->actionTwo();
        $this->systemC->actionThree();
    }
}



$facade = new Facade();

$facade->actionOne();
$facade->actionTwo();
$facade->actionThree();