<?php
namespace classes;
use classes\interfaces\ICalcArea;
use classes\interfaces\ICalcPerimetr;
use classes\interfaces\IDraw;

class MySquare extends MyFigure  implements IDraw,ICalcArea,ICalcPerimetr
{
    public $sq_A; //длина стороны квадрата
    public $figureName="Квадрат";

    function __construct($point,$line, $sq_A)
    {
        parent::__construct($point,$line);
        $this->sq_A = $sq_A;
    }

    public function calcArea()
    {
        return $this->sq_A ** 2;
    }

    function calcPerimetr()
    {
        return $this->sq_A + 2;
    }
    public function DrawFigure()
    {
        return "<p>Фигура нарисована: {$this->figureName}</p>";
    }
    

    
}