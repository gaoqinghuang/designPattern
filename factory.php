<?php

header("Content-type:text/html;charset=utf-8");
ini_set( 'display_errors', 'on');
ini_set( 'error_reporting', '-1');
ini_set( 'display_startup_errors', 'on');

//工厂模式

abstract class leiFeng
{
    public function wash()
    {
        return '洗衣服';
    }

    public function tuo()
    {
        return '拖地板';
    }

    public function buy()
    {
        return '买东西';
    }
}

class da extends leiFeng
{

}

class comm extends leiFeng
{

}

class factory
{
    public static function createDa()
    {
        return new da();
    }

    public static function createComm()
    {
        return new comm();
    }
}

$sutd = factory::createDa();

echo $sutd->buy();