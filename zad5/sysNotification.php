<?php
class User
{
    public $id;
    public $name;
    public $isActive;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->isActive = true;
    }

    public function assignVehicle($vehicle)
    {
        // Logika przypisania pojazdu do użytkownika

        // Wysyłanie notyfikacji do użytkownika
        $this->sendNotification("Vehicle assigned: {$vehicle->name}.");

        // Wysyłanie notyfikacji do administratora
        $admin = new User(1, 'Admin');
        $admin->sendNotification("Vehicle assigned to User: {$this->name}.");
    }

    public function deactivate()
    {
        $this->isActive = false;
        $this->sendNotification("Account deactivated");
    }

    public function sendNotification($message)
    {
        echo "Notification sent to User: {$this->name}, Message: $message\n";
    }
}

// Tworzenie użytkownika i pojazdu

$user = new User(1, 'John');
$vehicle = new stdClass();
$vehicle->id = 1;
$vehicle->name = 'Car A';

// Przypisanie pojazdu do użytkownika

$user->assignVehicle($vehicle);

// Dezaktywacja użytkownika

$user->deactivate();


?>