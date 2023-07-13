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

?>