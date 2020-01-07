<?php
//Your practice code
class User {
    public $firstName;
    public $lastName;

    public function hello(){
        echo "Hello!";
    }
}

$user1 = new User();
$user1 -> firstName = "John";
$user1 -> lastName = "Doe";

echo "$user1->firstName $user1->lastName";