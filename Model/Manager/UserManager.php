<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\User;

class UserManager
{

    public function isAdmin(User $user): bool {
        if ($user->getIsAdmin()) {
            // If the $is_admin property of the User object is true,
            // then we return true without querying the database.
            return true;
        } else {
            if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"]) {
                $id = $_SESSION['id']; // Get id from session
                $userConnected = $this->getUserById($id);
                if ($userConnected && $userConnected->getIsAdmin()) {
                    // If the user has the administrator role registered in BDD,
                    // then we update the $is_admin property of the User object
                    $user->setIsAdmin(true);
                    return true;
                }
            }
        }
        return false;
    }

    public function isVerify(User $user): bool {
        if ($user->getIsVerify()) {
            return true;
        } else {
            if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"]) {
                $id = $_SESSION['id'];
                $userConnected = $this->getUserById($id);
                if ($userConnected && $userConnected->getIsVerify()) {
                    $user->setIsVerify(true);
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Function that includes all users and that fixes the setters
     */
    public function getAll(): array
    {
        $users = [];
        $sql = "SELECT * FROM user";
        $request = DB::getInstance()->query($sql);
        if($request) {
            $data = $request->fetchAll();
            foreach ($data as $userData) {
                $users[] = (new User())
                    ->setId($userData['id'])
                    ->setPassword($userData['password'])
                    ->setEmail($userData['email'])
                    ->setPseudo($userData['pseudo'])
                    ->setIsVerify((bool)$userData['verify'])
                    ->setIsAdmin((bool)$userData['is_admin'])
                ;
            }
        }

        return $users;
    }


    /**
     * Return a simple user.
     * @param int $id
     * @return User|null
     */
    public function getUserById(): ?User
    {
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM user WHERE id = :id";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()) {
            $userData = $stmt->fetch();
            if ($userData) {
                return (new User())
                    ->setId($userData['id'])
                    ->setPassword($userData['password'])
                    ->setEmail($userData['email'])
                    ->setPseudo($userData['pseudo'])
                    ->setIsVerify((bool)$userData['verify'])
                    ->setIsAdmin((bool)$userData['is_admin'])
                    ;
            }
        }
        return null;
    }

}