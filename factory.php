<?php
/**
 * 工厂模式，就是负责生成其他对象的类或方法。
 * Created by PhpStorm.
 * User: wangyuan
 * Date: 18-2-7
 * Time: 上午9:47
 */
interface Vehicle{
    public function drive();
}

class Car implements Vehicle{

    public function drive()
    {
        // TODO: Implement drive() method.
        echo '小汽车';
    }
}

class Bus implements Vehicle{
    public function drive()
    {
        // TODO: Implement drive() method.
        echo '公共汽车';
    }
}

class VehicleFactory{ // 这里可以用swich 和case 来完成
    public static function buildVehicle($className){
        $className = ucfirst($className);
        if ($className && class_exists($className)) {
            return new $className();
        }
        return null;
    }
}

VehicleFactory::buildVehicle('Car')->drive();

VehicleFactory::buildVehicle('Bus')->drive();