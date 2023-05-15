<?php


// interface Vehicle
// {
//     public function motor();
// }

// abstract class Car implements vehicle
// {
//     public $color = 'white';
//     public $model = 'Model 0';
//     private $lock = '';

//     public function setSpec($c = 'white', $m = 'Model0')
//     {

//         $this->color = $c;
//         $this->model = $m;
//     }
//     abstract public function changeLock();
// }
// class Mario extends Car
// {
//     public function changeLock()
//     {
//         echo 'Hello Guys';
//     }
//     public function motor()
//     {
//         echo 'hello world';
//     }
// }


// $tibo = new Mario();

// $tibo->setSpec();
// $tibo->changeLock();

// print_r($tibo);

interface Color
{
    public function getColor();
}
abstract class Ahmed implements Color
{
    private $name = '';
    const AGE = 32;
    public function changeName($n, $a)
    {
        if ($a > Ahmed::AGE) {
            $this->name = $n;
        }
    }
    public function __construct($na)
    {
        $this->name = $na;
        echo $this->name;
    }
    public function __set($prop, $value)
    {
        echo "You're trying to reach a not existed property " . $prop;
        echo 'value enterted canot';
    }
    public function __get($prop)
    {
        echo "You're trying to reach a not existed property " . $prop;
    }

    abstract public function sayHello($n);
    public function __call($method, $para)
    {
        echo 'no method exisit here </br>' . $method;
        foreach ($para as $pa) {
            echo 'no para exisit here' . $pa;
        }
    }
}
class Bigo extends Ahmed
{
    public function sayHello($n)
    {
        if ($n > Ahmed::AGE) {
            echo 'hello world';
        }
    }
    public function getColor()
    {
        return 'red';
    }
}




$ahmed = new Bigo("bahig");
$ahmed->changeName('haytham', 20);
$ahmed->ayHaga('holaa');
$ahmed->sayHello(49);
