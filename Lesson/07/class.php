<?php
class Car {
    protected $color;
    public function setColor($color, $carName){
        $this->color = $color;
        return $this->getColor($carName);
    }
    public function getCarName($carName = '123'){
        if($carName == '123'){
            return "hi text";
        }
        return $carName . ' ' . $this->color . ' guyni e';
    }

    ////////////////////////////////

    public function getColor($carName){
        return $this->getCarName($carName);
    }
}


$car = new Car();
//$car->setColor('red');
echo $car->setColor('red', 'BMW');
//echo $car->getCarName("barev");
//echo $car->getCarName();

//$carOne = new Car();
//echo $carOne->getCarName("barev ashxarh");