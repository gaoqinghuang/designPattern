<?php

header("Content-type:text/html;charset=utf-8");
ini_set('display_errors', 'on');
ini_set('error_reporting', '-1');
ini_set('display_startup_errors', 'on');

//备忘录模式

//发起人
class originator
{
    private $state;
    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function createMenento()
    {
        return new menento($this->state);
    }

    public function show()
    {
        echo 'state = '.$this->state;
    }
}

//备忘录
class menento
{

    private $state;
    public function __construct($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

}
//管理者
class caretaker
{
    private $memento;
    public function setMemento(menento $memento)
    {
        $this->memento = $memento;
    }

    public function getMemento()
    {
        return $this->memento;
    }
}

$o = new originator();
$o->setState('on');
$o->show();

$c = new caretaker();
$c->setMemento($o->createMenento());

$o->setState('off');
$o->show();

$o->setState($c->getMemento()->getState());
$o->show();

