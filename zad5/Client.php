<?php
class Client
{
    public $id;
    public $name;
    public $employee;
    public $orders;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->employee = null;
        $this->orders = [];
    }

    public function setEmployee($employee)
    {
        $this->employee = $employee;
    }

    public function addOrder($order)
    {
        $this->orders[] = $order;
    }
}

class Employee
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Order
{
    public $id;
    public $item;

    public function __construct($id, $item)
    {
        $this->id = $id;
        $this->item = $item;
    }
}

// Tworzenie klienta, pracownika i zamówień

$client = new Client(1, 'Jan');
$employee = new Employee('Maks');
$order1 = new Order(1, 'Product A');
$order2 = new Order(2, 'Product B');
$order3 = new Order(3, 'Product C');

$client->setEmployee($employee);
$client->addOrder($order1);
$client->addOrder($order2);
$client->addOrder($order3);

// Pobieranie informacji o kliencie, pracowniku i zamówieniach

$clientId = 1; // Id klienta

if ($client->id === $clientId) {
    $clientName = $client->name;
    $employeeName = $client->employee->name;
    $recentOrders = array_slice($client->orders, -5);

    echo "Client Name: $clientName.\n";
    echo "Assigned Employee: $employeeName.\n";
    echo "Recent Orders:\n";
    foreach ($recentOrders as $order) {
        echo "Order ID: {$order->id}, Item: {$order->item}.\n";
    }
} else {
    echo "Client not found\n";
}

?>