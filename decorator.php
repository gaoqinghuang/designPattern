<?php

header("Content-type:text/html;charset=utf-8");
ini_set( 'display_errors', 'on');
ini_set( 'error_reporting', '-1');
ini_set( 'display_startup_errors', 'on');

/**
 * （装饰包装具体的事物，简化原有类）
 * 我的理解:concreteComponent为具体的事物，然后在给他套上一层一层的装饰，
 * 要什么装饰直接新增装饰类就好了，装饰相当于他的一些动态的添加一些功能，如果这些功能很少使用
 * */


//装饰模式
abstract class component
{
    abstract public function operation();
}

class concreteComponent extends component
{
    public function operation()
    {
        var_dump('具体对象的操作');
    }
}

abstract class decorator extends component
{
    protected $component;

    public function setComponent(component $component)
    {
        $this->component = $component;
    }

    public function operation()
    {
        $this->component->operation();
    }
}

class concreteDecoratorA extends decorator
{
    private $addedState;

    public function operation()
    {
        parent::operation();
        $this->addedState = 'new state';
        var_dump('具体装饰对象A的操作');
    }
}

class concreteDecoratorB extends decorator
{
    private $addedState;

    public function operation()
    {
        parent::operation();
        $this->addedState = 'new state';
        var_dump('具体装饰对象B的操作');
    }

    private function AddedBehavior()
    {

    }
}

$c = new concreteComponent();
$d1 = new concreteDecoratorA();
$d2 = new concreteDecoratorB();
$d1->setComponent($c);
$d2->setComponent($d1);
$d2->operation();



