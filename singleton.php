<?php
/**
 * 单例模式  * 一个私有静态属性，构造方法私有，克隆方法私有，重建方法私有，一个公共静态方法。
 * Created by PhpStorm.
 * User: wangyuan
 * Date: 18-2-7
 * Time: 上午10:18
 */

class Singleton{
    private static $_instance = null;
    public static function getInstance(){
        if (self::$_instance == null){
            self::$_instance = new self();
        }else{
            return self::$_instance;
        }
    }
    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){} //unserialize 会调用
}