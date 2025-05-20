<?php
class Car
{
    protected $color;
    protected $model;

// 1. Ավելացրու static հատկություն $carCount, որը կպահպանի քանի մեքենա է ստեղծվել։ Թարմացրու այն կոնստրուկտորում և ստեղծիր մեթոդ getCarCount()։
    public static $carCount = 0;

    public static function getCarCount() {
        return self::$carCount;
    }

// 2. Օգտագործիր __construct($color, $model) կոնստրուկտորը Car-ում, որպեսզի հնարավոր լինի օբյեկտ ստեղծել տվյալներով։
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;

        self::$carCount++;
    }

// 3. Փոխիր getCarName() մեթոդը, որպեսզի եթե $color-ը սահմանված չէ (null), վերադարձնի 'No color set for ' . $carName։
// 4. Փոփոխիր getCarName() մեթոդը այնպես, որ այն վերադարձնի ամբողջական նախադասություն, օրինակ՝ "BMW-ն կարմիր է"։
    public function getCarName($carName = null){
        if($carName == null){
            $carName = $this->model;
        }

        if ($this->color == null) {
            return 'No color set for ' . $carName . '<br>';
        }

        return $carName . '-ն "' . $this->color . '" գույնի է <br>';
    }

// 5. Ստեղծիր մեթոդ paint($newColor), որը կփոխի ներկը միայն եթե այն տարբեր է նախորդից, հակառակ դեպքում թող վերադարձնի "Already this color"։
    public function paint($newColor) {
        if ($this->color == $newColor) {
            echo 'Already this color <br>';
        } else {
            $this->color = $newColor;
        }
    }

// 6. Ստեղծիր մեթոդ info(), որը կվերադարձնի ամբողջական տեքստ՝ "Car: MODEL, Color: COLOR"։
    public function info() {
        return 'Car: ' . $this->model . ', Color: ' . $this->color . '<br>';
    }

// 7. Ավելացրու նոր մեթոդ resetColor(), որը կդնի $color արժեքը null և կվերադարձնի "color reseted"։
    public function resetColor() {
        $this->color = null;
        echo 'color reseted <br>';
    }

// 8. Ստեղծիր նոր հատկություն $model, որը կստանա արժեք մեթոդի միջոցով։ Ավելացրու մեթոդ setModel($model) և getModel()։
    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
        return $this->getModel();
    }
}


// 9. Ստեղծիր նոր դաս Truck, որը կժառանգի Car-ից, և ավելացրու Truck-ին հատուկ հատկություն՝ $capacity (ծավալ), և մեթոդ՝ setCapacity($value)։
class Truck extends Car {
    public $capacity;

    public function setCapacity($value){
        $this->capacity = $value;
    }
    public function getCapacity(){
        echo 'Truck capacity is ' . $this->capacity . '<br><br>';
    }
}

$track1 = new Truck('red', 'Mercedes');
$track1->setCapacity(5);
$track1->getCapacity();


// 10. Ստեղծիր զանգված, որտեղ կպահպանես 3 տարբեր մեքենա (Car) օբյեկտ, տարբեր գույներով ու մոդելներով։ Ցուցադրիր դրանց նկարագրությունը foreach ցիկլով։
$arr_cars = [
    new Car('red', 'BMW'),
    new Car('black', 'Mercedes'),
    new Car('white', 'Audi'),
];

foreach ($arr_cars as $car) {
    echo $car->getCarName() . '<br>';
}

// ------------------------------------------------------------------------------------------------

// 1-ին առաջադրանքի կիրառում
echo '<br>կա ստեղծված ' . Car::getCarCount() . ' հատ ավոմեքենա<br><br>';

// 2-րդ առաջադրանքի կիրառում
$car1 = new Car('green', 'Ford');
$car2 = new Car('yellow', 'Lada');

// 5-րդ առաջադրանքի կիրառում
$car2->paint('yellow');
$car2->paint('blue');

// 7-րդ առաջադրանքի կիրառում
$car2->resetColor();

// 3-րդ և 4-րդ առաջադրանքի կիրառում
echo $car1->getCarName();
echo $car2->getCarName();

// 6-րդ առաջադրանքի կիրառում
echo $car1->info();

// 8-րդ առաջադրանքի կիրառում
echo $car1->setModel('Ferari');


