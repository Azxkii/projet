<?php

use App\Model\Entity\User;
use App\Model\Manager\UserManager;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../Controller/AbstractController.php';
require __DIR__ . '/../Model/Manager/UserManager.php';
require __DIR__ . '/../Model/Entity/User.php';
require __DIR__ . '/../Model/DB.php';

class testUserManager extends TestCase
{
    public function testGetAllUsers()
    {
        // Create an instance of UserManager
        $userManager = new UserManager();

        // Run the method to recover users
        $users = $userManager->getAll();

        // Verify that the returned value is an array
        $this->assertIsArray($users);

        // Verify that each element in the array is an instance of the User class
        foreach ($users as $user) {
            $this->assertInstanceOf(User::class, $user);
        }
    }
}