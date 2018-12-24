<?php

class calculation
{

    public static function createExample($operation)
    {

        switch ($operation) {
            case '+';
                $calculation = new add();
                break;
            case '-';
                $calculation = new sub();
                break;
            case '*';
                $calculation = new mul();
                break;
            case '/';
                $calculation = new div();
                break;
            default;
                throw new Exception('暂无此操作', 201);
        }
        return $calculation;
    }

}

abstract class operationClass
{
    abstract protected function operation($numA,$numB);

}

class add extends operationClass
{

    public function operation($numA, $numB)
    {
        return $numA + $numB;
    }
}

class sub extends operationClass
{

    public function operation($numA, $numB)
    {
        return $numA - $numB;
    }
}

class mul extends operationClass
{

    public function operation($numA, $numB)
    {
        return $numA * $numB;
    }
}

class div extends operationClass
{

    public function operation($numA, $numB)
    {
        if ($numB == 0) {
            throw new Exception('除数不能为零', 200);
        }

        return $numA / $numB;
    }
}
header("Content-type:text/html;charset=utf-8");
ini_set( 'display_errors', 'on');
ini_set( 'error_reporting', '-1');
ini_set( 'display_startup_errors', 'on');

$numA        = $_GET['a'] ?? 0;
$numB        = $_GET['b'] ?? 0;
$operation   = $_GET['operation'] ?? '+';
//var_dump($operation);die;

try {
    $calculation = calculation::createExample($operation);
    $result  = $calculation->operation($numA, $numB);
    var_dump($result);
} catch (exception $ex) {
    var_dump(['code' => $ex->getCode(), 'message' => $ex->getMessage()]);
}

