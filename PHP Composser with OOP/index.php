
<?php

require __DIR__ . '/vendor/autoload.php';
use classes\{MySquare,MyRectangle,MyCircle,MyEllipse, MyPoligon, MyTrigon};




$square = new MySquare('point','line', 5);
echo 'Площадь квадрата S = ', $square->calcArea();
echo "<br>";
echo 'Периметр квадрата P = ', $square->calcPerimetr();
echo "<br>";
echo $square->DrawFigure();

   

echo "<hr>";


$rectangle = new MyRectangle('point','line', 5, 5);
echo 'Площадь Прямоугольника S = ', $rectangle->calcArea();
echo "<br>";
echo 'Периметр Прямоугольника P = ', $rectangle->calcPerimetr();
echo "<br>";
echo $rectangle->DrawFigure();
echo "<hr>";


$Circle = new MyCircle('point','line', 4);
echo 'Площадь Круга S = ', $Circle->calcArea();
echo "<br>";
echo 'Периметр Круга P = ', $Circle->calcPerimetr();
echo "<br>";
echo $Circle->DrawFigure();
echo "<hr>";


$ellipse = new MyEllipse('point','line', 5, 5);
echo 'Площадь Эллипса S = ', $ellipse->calcArea();
echo "<br>";
echo 'Периметр Эллипса не возможно вычислить';
echo "<br>";
echo $ellipse->DrawFigure();

echo "<hr>";


$trigon = new MyTrigon('point','line','point2','line2','point3','line3', 10, 15,12,13);
echo 'Площадь Эллипса S = ', $trigon->calcArea();
echo "<br>";
echo 'Периметр Треугольника P=',$trigon->calcPerimetr() ;
echo "<br>";
echo $trigon->DrawFigure();
echo "<hr>";



$poligon = new MyPoligon('point','line',6,6);
echo 'Площадь Многоугольника S = ', $poligon->calcArea();
echo "<br>";
echo 'Периметр Многоугольника не вычисляем' ;
echo "<br>";
echo $poligon->DrawFigure();
echo "<hr>";

