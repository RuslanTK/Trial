<?php

namespace classes;

use classes\interfaces\ICalcArea;
use classes\interfaces\ICalcPerimetr;
use classes\interfaces\IDraw;

class MyTrigon extends MyFigure  implements IDraw, ICalcArea, ICalcPerimetr
{


    public $figureName = "Треугольник";
    

    function __construct($point,$line,$point2,$line2,$point3,$line3,$radius, $a, $b, $c)
    {
        parent::__construct($point,$line);
        $this->line = $line2;//Линия2
        $this->line = $line3;//Линия2
        $this->point = $point2;//Вторая точка
        $this->point = $point3;//Третья точка
        $this->radius = $radius;//Радиус описаной окружности
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    function calcArea(){
    
        return ($this->a*$this->b*$this->c)/4*$this->radius;
    }

    function calcPerimetr()
    {
        return ($this->a + $this->b + $this->c) / 2;
    }
    public function DrawFigure()
    {
        return "<p>Фигура нарисована: {$this->figureName}</p>";
    }
}
