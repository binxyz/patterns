<?php
interface people
{
    public function marry();
}

class Man implements people
{
    public function marry()
    {
        echo '送钻戒';
    }
}

class Woman implements people
{
    public function marry()
    {
        echo '穿婚纱';
    }
}

interface factory
{
    public function create();
}

class manFactory implements factory
{
    public function create()
    {
        return new Man();
    }
}

class womanFactory implements factory
{
    public function create()
    {
        return new Woman();
    }
}

class Test
{
    public function test()
    {
        $man = new manFactory();
        $res = $man->create();
        $res->marry();

        $woman = new womanFactory();
        $res = $woman->create();
        $res->marry();
    }
}