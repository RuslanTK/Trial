<?php

namespace classes;

use classes\interfaces\ICalcArea;
use classes\interfaces\ICalcPerimetr;
use classes\interfaces\IDraw;

class MyPoligon extends MyFigure  implements IDraw, ICalcArea, ICalcPerimetr
{

   

    public $figureName = "Многоугольник";
    public $n;
    public $radius;

    function __construct($point,$line,$n,$radius)
    {
        parent::__construct($point,$line);
        
        $this->n = $n;
        $this->radius = $radius;
        
    }

    function calcArea(){
    
        return pow($this->radius, 2)*$this->n*tan(($this->n*180)/$this->n);//Возможно ошибся в формуле где-то...
    }

    function calcPerimetr()
    {
        
    }
    public function DrawFigure()
    {
        return "<p>Фигура нарисована: {$this->figureName}</p>";
    }
}