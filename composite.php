<?php
/**
 * 组合模式  其实就是树状结构
 * 组合模式分为安全模式和透明模式，这是根据接口中是否包含管理对象的方法来区分的。
 * 在组合模式中，组合对象和独立对象必须实现一个接口。其中，组合对象必须包含添加和删除节点对象。
 * Created by PhpStorm.
 * User: wangyuan
 * Date: 18-2-7
 * Time: 下午2:55
 */


//组合类,如果独立对象之间有差异,就不能组合在一起
abstract class FileSystem{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public abstract function getName();
    public abstract function getSize();
}

//目录类  组合对象必须提供对象管理的方法
class Dir extends FileSystem{

    private $filesystems = [];

    public function addFile(FileSystem $fileSystem){
        $key = array_search($fileSystem,$this->filesystems);
        if ($key === false){
            $this->filesystems[] = $fileSystem;
        }
    }

    public function removeFile(FileSystem $fileSystem){
        $key = array_search($fileSystem,$this->filesystems);
        if ($key !== false){
            unset($this->filesystems[$key]);
        }
    }

    public function getName()
    {
        // TODO: Implement getName() method.
        return '目录：' . $this->name;
    }


    public function getSize()
    {
        // TODO: Implement getSize() method.
        $size = 0;
        foreach ($this->filesystems as $filesystem) {
            $size += $filesystem->getSize();
        }

        return $size;
    }


}


//文件类
class Text extends FileSystem{
    public function getName()
    {
        return '文本文件：' . $this->name;
    }

    public function getSize()
    {
        return 10;
    }
}

//图片类

class Image extends FileSystem{
    public function getName()
    {
        // TODO: Implement getName() method.
        return '文本文件：' . $this->name;
    }

    public function getSize()
    {
        // TODO: Implement getSize() method.
        return 100;
    }
}


// 创建home目录，并加入三个文件
$dir = new Dir('home');
$dir->addFile(new Text('text1.txt'));
$dir->addFile(new Image('bg1.png'));

// 在home下创建子目录source
$subDir = new Dir('source');
$dir->addFile($subDir);

// 创建一个text2.txt，并放到子目录source中
$text2 = new Text('text2.txt');
$subDir->addFile($text2);

// 打印信息
echo $text2->getName(), '-->', $text2->getSize();
echo '<br />';
echo $subDir->getName(), ' --> ',$subDir->getSize();
echo '<br />';
echo $dir->getName(), ' --> ', $dir->getSize();
