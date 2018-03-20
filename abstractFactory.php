<?php
/*
抽象工厂：围绕一个超级工厂创建其他工厂。该超级工厂又称为其他工厂的工厂
注意：这里和工厂方法的区别是：一系列，而工厂方法则是一个。
那么，我们是否就可以想到在接口create里再增加创建“一系列”对象的方法呢？
*/

interface people
{
    public function givGift();
}

class YoungMan implements people
{
    public function givGift()
    {
        echo "暗恋";
    }
}

class OldMan implements people
{
    public function givGift()
    {
        echo "送钻戒";
    }
}

class YoungWoman implements people
{
    public function givGift()
    {
        echo "害羞";
    }
}

class OldWoman implements people
{
    public function givGift()
    {
        echo "接受";
    }
}

interface AbstractFactory
{
    public function createOpen();
    public function createOld();
}

class ManFactory implements AbstractFactory
{
    public function createOpen()
    {
        return new OldMan();
    }

    public function createOld()
    {
        return new YoungMan();
    }
}

class WomanFactory implements AbstractFactory
{
    public function createOpen()
    {
        return new OldWoman();
    }

    public function createOld()
    {
        return new YoungWoman();
    }
}

class Client
{
    public static function main()
    {
        self::run(new ManFactory());
        self::run(new WomanFactory());
    }

    public static function run(AbstractFactory $factory)
    {
        $res = $factory->createOld();
        $res->giveGift();
        $factory->createOpen();
        $res->giveGift();
    }
}

$client = new Client();
$client->main();


###############################################

//抽象工厂
interface AnimalFactory {

    public function createCat();
    public function createDog();

}

//具体工厂
class BlackAnimalFactory implements AnimalFactory {

    function createCat(){
        return new BlackCat();
    }

    function createDog(){
        return new BlackDog();
    }
}

class WhiteAnimalFactory implements AnimalFactory {

    function createCat(){
        return new WhiteCat();
    }

    function createDog(){
        return new WhiteDog();
    }
}

//抽象产品
interface Cat {
    function Voice();
}

interface Dog {
    function Voice();
}

//具体产品
class BlackCat implements Cat {

    function Voice(){
        echo '黑猫喵喵……';
    }
}

class WhiteCat implements Cat {

    function Voice(){
        echo '白猫喵喵……';
    }
}

class BlackDog implements Dog {

    function Voice(){
        echo '黑狗汪汪……';
    }
}

class WhiteDog implements Dog {

    function Voice(){
        echo '白狗汪汪……';
    }
}

//客户端
class Client {

    public static function main() {
        self::run(new BlackAnimalFactory());
        self::run(new WhiteAnimalFactory());
    }

    public static function run(AnimalFactory $AnimalFactory){
        $cat = $AnimalFactory->createCat();
        $cat->Voice();

        $dog = $AnimalFactory->createDog();
        $dog->Voice();
    }
}
Client::main();
?>