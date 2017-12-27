<?php
/*
抽象工厂：围绕一个超级工厂创建其他工厂。该超级工厂又称为其他工厂的工厂
注意：这里和工厂方法的区别是：一系列，而工厂方法则是一个。
那么，我们是否就可以想到在接口create里再增加创建“一系列”对象的方法呢？
*/
interface people
{
    public function marry();
}

class oMan implements people
{
    public function marry()
    {
        echo '送钻戒';
    }
}

class yMan implements people
{
    public function marry()
    {
        echo '暗恋';
    }
}

class oWoman implements people
{
    public function marry()
    {
        echo '接受';
    }
}

class iWoman implements people
{
    public function marry()
    {
        echo '害羞';
    }
}

//这里是本质区别所在，将对象的创建抽象成一个接口
interface factoryCreate
{
    public function createOpen();  //外向
    public function createIntro(); //内向
}

class ss implements factoryCreate
{
    public function createOpen()
    {
        // TODO: Implement createOpen() method.
        echo 'da';
    }
    public function createIntro()
    {
        // TODO: Implement createIntro() method.
        echo 'd';
    }
}

class manFactory implements factoryCreate
{
    public function createOpen()
    {
        return new oMan();
    }

    public function createIntro()
    {
        return new yMan();
    }
}

class womanFactory implements factoryCreate
{
    public function createOpen()
    {
        return new oWoman();
    }

    public function createIntro()
    {
        return new iWoman();
    }
}