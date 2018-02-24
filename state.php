<?php
/**
 * 状态模式
 * 一个对象的行为取决于一个或多个动态变化的属性，这样的属性叫做状态
 * 对象状态的变化以及对象如何在每一种状态下表现出不同的行为
 * Created by PhpStorm.
 * User: wangyuan
 * Date: 18-2-8
 * Time: 下午3:42
 */

abstract class State{
    abstract public function recommend(); //状态变化表现的不同行为
}

class First extends State{
    public function recommend()
    {
        // TODO: Implement recommend() method.
        echo 'the first state';
    }
}


class Second extends State{

    public function recommend()
    {
        // TODO: Implement recommend() method.
        echo 'the second state';
    }
}


class Three extends State{

    public function recommend()
    {
        // TODO: Implement recommend() method.
        echo 'the three state';
    }
}


class TrueObject{

    protected $state;

    public function getState($balance){
        if ($balance < 10){
            $this->state = new First();
        }else if ($balance < 50){
            $this->state = new Second();
        }else{
            $this->state = new Three();
        }
    }

    public function trueRecommend(){
        $this->state->recommend();
    }
}


$obj = new TrueObject();
$obj->getState(15);
$obj->trueRecommend();
