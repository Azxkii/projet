<?php

namespace App\Controller;


use App\Model\Manager\UserManager;

class UserController extends AbstractController
{
    /**
     * User listing.
     * @return void
     */
    public function index($id)
    {
        $manager = new UserManager();
        $this->display('user/listing', [
            'users' => $manager->getAll(),
            'user' => $manager->getUserById($id)
        ]);
    }
}
