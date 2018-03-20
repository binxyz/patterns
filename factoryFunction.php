<?php
interface people
{
    public function marry();
}

class Man implements people
{
    public function marry()
    {
        echo "man";
    }
}

class Woman implements people
{
    public function marry()
    {
        echo "Woman";
    }
}

interface Factory
{
    public function create();
}

class ManFactory implements Factory
{
    public function create()
    {
        return new Man();
    }
}

class WomanFactory implements Factory
{
    public function create()
    {
        return new Woman();
    }
}

class Client
{
    public function test()
    {
        $factory = new ManFactory();
        $man = $factory->create();
        $man->marry();

        $factory1 = new WomanFactory();
        $woman = $factory1->create();
        $woman->marry();
    }
}