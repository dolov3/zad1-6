<?php
class User
{
    public $id;
    public $name;
    public $cars;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->cars = [];
    }

    public function assignCar($car)
    {
        $this->cars[] = $car;
    }

    public function isUsingCar($car)
    {
        foreach ($this->cars as $userCar) {
            if ($userCar === $car) {
                return true;
            }
        }
        return false;
    }
}

class Car
{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

// Tworzenie użytkowników i samochodów

$user1 = new User(1, 'John');
$user2 = new User(2, 'Alice');

$car1 = new Car(1, 'Car A');
$car2 = new Car(2, 'Car B');
$car3 = new Car(3, 'Car C');

$user1->assignCar($car1);
$user1->assignCar($car2);
$user2->assignCar($car2);
$user2->assignCar($car3);

// Weryfikacja, czy użytkownik korzysta z danego samochodu

$userId = 1; // Id
$carId = 2; // Id

$isUsingCar = false;

foreach ($user1->cars as $userCar) {
    if ($userCar->id === $carId) {
        $isUsingCar = true;
        break;
    }
}

if ($isUsingCar) {
    echo "User with ID $userId is using Car with ID $carId.\n";
} else {
    echo "User with ID $userId is not using Car with ID $carId.\n";
}

?>