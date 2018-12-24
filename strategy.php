<?php
header("Content-type:text/html;charset=utf-8");
ini_set( 'display_errors', 'on');
ini_set( 'error_reporting', '-1');
ini_set( 'display_startup_errors', 'on');


abstract class strategy
{
    abstract public  function algorithmInterface();
}

class concreteStrategyA extends strategy
{
    public function algorithmInterface()
    {
        return 'A';
    }
}

class concreteStrategyB extends strategy
{
    public function algorithmInterface()
    {
        return 'B';
    }
}

class content
{
    private $strategy;

    public function __construct($strategy)
    {
        switch ($strategy){
            case 'A':
                $this->strategy = new concreteStrategyA();
                break;
            case 'B':
                $this->strategy = new concreteStrategyB();
                break;
            default;
                throw new Exception('找不到改活动',200);
        }
    }

    public function context()
    {
        return $this->strategy->algorithmInterface();
    }
}

$content = new content('A');
$text = $content->context();
var_dump($text);die;