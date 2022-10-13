<?php
namespace classes;
use classes\interfaces\ICalcArea;
use classes\interfaces\ICalcPerimetr;
use classes\interfaces\IDraw;
class MyCircle extends MyFigure  implements IDraw,ICalcArea,ICalcPerimetr
{

    public $radius;
    public $figureName="круг";


    function __construct($point,$line, $radius)
    {
        parent::__construct($point,$line);
        $this->radius = $radius;
    }

    function calcArea()
    {
        return round(pi() * pow($this->radius, 2));
    }

    function calcPerimetr()
    {
        return 2 * pi() * $this->radius;
    }
    public function DrawFigure()
    {
        return "<p>Фигура нарисована: {$this->figureName}</p>";
    }

    
    
}