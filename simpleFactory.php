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
