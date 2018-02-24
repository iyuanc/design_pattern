<?php
/**
 * 迭代器模式
 * 1. 迭代器模式，在不需要了解内部实现的前提下，遍历一个聚合对象的内部元素。
 * 2. 相比传统的编程模式，迭代器模式可以隐藏遍历元素的所需操作。
 * current() 返回当前元素
 * key() 返回当前元素的键
 * next() 向前移动到下一个元素
 * rewind() 返回到迭代器的第一个元素
 * Created by PhpStorm.
 * User: wangyuan
 * Date: 18-2-8
 * Time: 下午1:03
 */

class User implements \Iterator{

    private $_key = 0; // 当前的key
    private $_data = []; //存数据的data的key

    public function __construct()
    {
        $this->_data = array_keys($_SESSION);
    }

    /**
     * 验证当前的迭代器是否有数据
     */
    public function valid()
    {
        return $this->_key !== false;
        // TODO: Implement valid() method.
    }

    /**
     * 获取迭代器的位置
     */

    public function key()
    {
        return $this->_key;
        // TODO: Implement key() method.
    }

    /**
     * 获取下一个迭代器的内容
     */

    public function next()
    {
        // TODO: Implement next() method.
        do{
            $this->_key = next($this->_data);
        }while (!isset($_SESSION[$this->_key]) && $this->_key !== false);
    }

    /**
     * 获取当前的内容
     */
    public function current()
    {
        return isset($_SESSION[$this->_key]) ? $_SESSION[$this->_key] : null;
        // TODO: Implement current() method.
    }

    /**
     * 重置迭代器
     */
    public function rewind()
    {
        $this->_key = reset($this->_data);
        // TODO: Implement rewind() method.
    }
}