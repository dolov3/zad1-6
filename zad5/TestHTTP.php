<?php 
class Vehicle
{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

class Client
{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

class Employee
{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

// Tworzenie obiektów Vehicle, Client, Employee

$vehicle = new Vehicle(1, 'Car');
$client = new Client(1, 'John');
$employee = new Employee(1, 'Alice');

// Test tworzenia pojazdu

$createdVehicle = new Vehicle(1, 'Car');
if ($createdVehicle->id === $vehicle->id && $createdVehicle->name === $vehicle->name) {
    echo "Vehicle created successfully.\n";
} else {
    echo "Vehicle creation failed.\n";
}

// Test wyświetlania pojazdu

if ($createdVehicle->id === $vehicle->id && $createdVehicle->name === $vehicle->name) {
    echo "Vehicle ID: {$vehicle->id}, Name: {$vehicle->name}.\n";
} else {
    echo "Vehicle not found.\n";
}

// Test edycji pojazdu

$editedVehicle = new Vehicle(1, 'Modified Car');
$createdVehicle->name = 'Modified Car';

if ($editedVehicle->id === $createdVehicle->id && $editedVehicle->name === $createdVehicle->name) {
    echo "Vehicle edited successfully.\n";
} else {
    echo "Vehicle editing failed.\n";
}

// Test usuwania pojazdu

$deletedVehicleId = 1;
if ($createdVehicle->id === $deletedVehicleId) {
    $createdVehicle = null;
    echo "Vehicle deleted successfully.\n";
} else {
    echo "Vehicle deletion failed.\n";
}

// Test tworzenia klienta

$createdClient = new Client(1, 'John');
if ($createdClient->id === $client->id && $createdClient->name === $client->name) {
    echo "Client created successfully.\n";
} else {
    echo "Client creation failed.\n";
}

// Test tworzenia pracownika

$createdEmployee = new Employee(1, 'Alice');
if ($createdEmployee->id === $employee->id && $createdEmployee->name === $employee->name) {
    echo "Employee created successfully.\n";
} else {
    echo "Employee creation failed.\n";
}


?>