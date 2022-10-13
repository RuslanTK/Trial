<?php
namespace classes;
class MyRectangle extends MySquare
{

    public $sq_B; //длина стороны Прямоугольника
    public $figureName="Прямоугольник";

    function __construct($point,$line, $sq_A, $sq_B)
    {
        parent::__construct($point,$line, $sq_A);
        $this->sq_A = $sq_A;
        $this->sq_B = $sq_B;
    }

    function calcArea()
    {
        return $this->sq_A * $this->sq_B;
    }

    function calcPerimetr()
    {
        return $this->sq_A + $this->sq_B;
    }
    
    public function DrawFigure()
    {
        return "<p>Фигура нарисована: {$this->figureName}</p>";
    }
    
}