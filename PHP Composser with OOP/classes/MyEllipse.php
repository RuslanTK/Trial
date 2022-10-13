<?php

namespace classes;



class MyEllipse  extends MyCircle 
{
    public  $radius2;
    public $figureName="Эллипс";

    function __construct($point,$line, $radius, $radius2)
    {
        parent::__construct($point,$line, $radius);
        $this->radius2 = $radius2;
    }

    function calcArea()
    {
        return round(pi() * $this->radius * $this->radius2);
    }

    function calcPerimetr()
    {
    }
    public function DrawFigure()
    {
        return "<p>Фигура нарисована: {$this->figureName}</p>";
    }
    
}
