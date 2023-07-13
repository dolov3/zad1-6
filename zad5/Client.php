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


?>