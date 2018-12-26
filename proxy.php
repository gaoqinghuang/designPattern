<?php

header("Content-type:text/html;charset=utf-8");
ini_set( 'display_errors', 'on');
ini_set( 'error_reporting', '-1');
ini_set( 'display_startup_errors', 'on');

/**
 * 增加一些内务处理，比如权限，管理，屏蔽复杂度
 * */

//代理模式
class beiZhui
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

class zhuiQiu
{
    private $name;

    private $liWu;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setLiWu($liWu)
    {
        $this->liWu = $liWu;
    }

    public function give(beiZhui $who)
    {
        if($this->liWu){
            return $who->getName().$this->liWu.'送给你';
        }else{
            return '抱歉忘了准备礼物';
        }
    }
}

class daiLiZhuiQiu
{
    private $name;
    private $zhuiQiu;
    public function __construct($name)
    {
        $this->name = $name;
        $this->zhuiQiu = new zhuiQiu('易');
        $this->zhuiQiu->setLiWu('小熊');
    }

    public function give(beiZhui $beiZhui)
    {
        return $this->zhuiQiu->give($beiZhui);
    }
}


$jiao = new beiZhui('娇');
$dai = new daiLiZhuiQiu('戴');

echo $dai->give($jiao);