<?php
namespace classes;
abstract class MyFigure
{
    public $point; //точка от которой рисуется фигура 
    public $line;

    public function __construct($point,$line)
    {
        $this->point = $point;
        $this->line = $line;
    }

    
}
