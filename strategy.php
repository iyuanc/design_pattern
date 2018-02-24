<?php
/**
 * 策略模式定义了一族相同类型的算法，算法之间独立封装，并且可以互换代替
 * Created by PhpStorm.
 * User: wangyuan
 * Date: 18-2-7
 * Time: 上午10:27
 */

interface  OutputStrategy{
    public function render($array);
}

class SerializeStrategy implements OutputStrategy{
    public function render($array)
    {
        // TODO: Implement render() method.
        return serialize($array);
    }
}

class JsonStrategy implements OutputStrategy{
    public function render($array)
    {
        // TODO: Implement render() method.
        return json_encode($array);
    }
}

class ArrayStrategy implements OutputStrategy{
    public function render($array)
    {
        // TODO: Implement render() method.
        return $array;
    }
}

//环境类 用来管理所有的策略

class Output{
    private $outputStrategy;
    public function __construct(OutputStrategy $outputStrategy)
    {
        $this->outputStrategy = $outputStrategy;
    }

    public function renderOutput($array)
    {
        return $this->outputStrategy->render($array);
    }
}


$test = [1,2,3];

$serilize = (new Output(new SerializeStrategy()))->renderOutput($test);
print_r($serilize);

$json = (new Output(new JsonStrategy()))->renderOutput($test);
print_r($json);