<?php
/*
1.抽象主题（Subject）角色：主题角色将所有对观察者对象的引用保存在一个集合中，每个主题可以有任意多个观察者。 抽象主题提供了增加和删除观察者对象的接口。
2.抽象观察者（Observer）角色：为所有的具体观察者定义一个接口，在观察的主题发生改变时更新自己。
3.具体主题（ConcreteSubject）角色：存储相关状态到具体观察者对象，当具体主题的内部状态改变时，给所有登记过的观察者发出通知。具体主题角色通常用一个具体子类实现。
4.具体观察者（ConcretedObserver）角色：存储一个具体主题对象，存储相关状态，实现抽象观察者角色所要求的更新接口，以使得其自身状态和主题的状态保持一致。
*/

/**
 * 抽象角色
 */
interface Subject
{
    /**
    *新增一个新的观察者对象
    *@parm Observer $observer
    */
    public function attach(Observer $observer);
    /**
    *删除一个已注册的观察者对象
    */
    public function detach(Observer $observer);
    /**
    *通知所有注册的观察者
    */
    public function notify();
}

class ConcreteSubject implements Subject
{
    private $observerArr;

    public function __construct()
    {
        $this->observerArr = array();
    }

    public function attach(Observer $observer)
    {
        $this->observerArr[] = $observer;
    }

    public function detach(Observer $observer)
    {
        $index = array_search($observer, $this->observerArr);
        if ($index === false || !array_key_exists($index, $this->observerArr)) {
            return false;
        }
        unset($this->sobserver[$index]);
        return true;
    }

    public function notify()
    {
        if (!is_array($this->observerArr)) {
            return FALSE;
        }

        foreach ($this->observerArr as $observers) {
            $observers->update();
        }

        return true;
    }
}

/**
 * 抽象观察者
 */
interface Observer
{
    public function update();
}

class ConcreteObserver implements Observer
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function update()
    {
        echo $this->name."has notified.<br />";
    }
}

//实例化类

$subject = new ConcreteSubject();

//添加第一个观察者
$observer1 = new ConcreteObserver('one');
$subject->attach($observer1);

echo "############################<br />";

//添加第二个观察者
$observer2 = new ConcreteObserver('second');
$subject->attach($observer2);
$subject->notify();
