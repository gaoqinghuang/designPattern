<?php

header("Content-type:text/html;charset=utf-8");
ini_set('display_errors', 'on');
ini_set('error_reporting', '-1');
ini_set('display_startup_errors', 'on');

//组合模式

//公司类
abstract class company
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }


    abstract public function add(company $c);

    abstract public function remove(company $c);

    abstract public function display(int $depth);

    abstract public function lineOfDuty();
}

//具体的公司类
class concreteCompyany extends company
{
    private $children = [];

    public function add(company $c)
    {
        $this->children[] = $c;
    }

    public function remove(company $c)
    {
        $this->children = array_diff($this->children, [$c]);
    }

    public function display(int $depth)
    {
        echo str_repeat('-', $depth) . $this->name."<br>";
        foreach ($this->children as $child) {
            $child->display($depth + 2);
        }
    }

    public function lineOfDuty()
    {
        foreach ($this->children as $child) {
            $child->lineOfDuty();
        }
    }
}

//人力资源部
class hrDepartment extends company
{
    public function add(company $c)
    {
    }

    public function remove(company $c)
    {
    }

    public function display(int $depth)
    {
        echo str_repeat('-', $depth) . $this->name."<br>";
    }

    public function lineOfDuty()
    {
        echo $this->name.'&nbsp&nbsp&nbsp&nbsp&nbsp员工招聘培训管理'."<br>";
    }
}

//财务部
class financeDepartment extends company
{
    public function add(company $c)
    {
    }

    public function remove(company $c)
    {
    }

    public function display(int $depth)
    {
        echo str_repeat('-', $depth) . $this->name."<br>";
    }

    public function lineOfDuty()
    {
        echo $this->name.'&nbsp&nbsp&nbsp&nbsp&nbsp公司财务收支管理'."<br>";
    }
}
function dump(...$var)
{
    header("Content-type:text/html;charset=utf-8");
    ob_start();
    foreach ($var as $value){
        var_dump($value);
    }
    $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', ob_get_clean());
    $output = '<pre>'  . $output . '</pre>';
    echo($output);
    die();
}
$root = new concreteCompyany('北京总公司');
$root->add(new hrDepartment('总公司人力资源部'));
$root->add(new financeDepartment('总公司财务部'));

$company = new concreteCompyany('上海华东分公司');
$company->add(new hrDepartment('上海华东分公司人力资源部'));
$company->add(new financeDepartment('上海华东分公司财务部'));
$root->add($company);

$company1 = new concreteCompyany('南京办事处');
$company1->add(new hrDepartment('南京办事处人力资源部'));
$company1->add(new financeDepartment('南京办事处财务部'));
$company->add($company1);

$company2 = new concreteCompyany('杭州办事处');
$company2->add(new hrDepartment('杭州办事处人力资源部'));
$company2->add(new financeDepartment('杭州办事处财务部'));

$company->add($company2);
echo "~~~~~~~~~~~~~<br>";

$root->display(1);
echo "~~~~~~~~~~~~~<br>";
$root->lineOfDuty();