<?php 
namespace task_1;

class Shapes{

public function circle(int $r){
    echo (3.1416*$r*$r);

}

public function triangle(int $l,int $w){
    echo (0.5*$l*$w);
}

public function rectangles(int $l,int $w){
 echo ($l*$w);

}

}




class Area extends Shapes{

public function message(){

    echo "Area is :";
}

}  


$area=new Area();
$message=$area->message();
$circle=$area->circle(5);
// $triangle=$area->triangle(5,2);
// $rectangle=$area->rectangles(3,6);







