<?php
interface Vehicle
{
    public function ride();
}

class Bike implements Vehicle
{
    public function ride()
    {
        echo 'bike';
    }
}

class Car implements Vehicle
{
    public function ride()
    {
        echo 'car';
    }
}

class simpleFactory
{
    public function produce($type)
    {
        if ($type == 'bike') {
            return new Bike();
        } elseif ($type == 'car') {
            return new Car();
        }
    }
}

$create = new simpleFactory();
$result = $create->produce('car');
echo $result->ride();

class simpleFactory1
{
    public static function produceBike()
    {
        return new Bike();
    }

    public static function produceCar()
    {
        return new Car();
    }
}

class Test
{
    public function create()
    {
        $bike = simpleFactory1::produceBike();
        $bike->ride();
        $car = simpleFactory1::produceCar();
        $car->ride();
    }
}