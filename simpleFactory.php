<?php

interface people
{
    public function marry();
}

class Man implements people
{
    public function marry()
    {
        echo "去取老婆";
    }
}

class Woman implements people
{
    public function marry()
    {
        echo "嫁男人";
    }
}

class SimpleFactory
{
    public static function createMan()
    {
        return new Man();
    }

    public static function createWomen()
    {
        return new Woman();
    }
}

$man = SimpleFactory::createMan();
$man->marry();

$women = SimpleFactory::createWomen();
$women->marry();
