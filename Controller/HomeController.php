<?php

namespace App\Controller;


use App\Model\Manager\UserManager;

class HomeController extends AbstractController
{
    /**
     * If a user arrives on the site, it sends them to the index page.
     * @return void
     */
    public function index()
    {
        $manager = new UserManager();
        $this->display('home/index');
    }

    public function indexVerify()
    {
        $this->display('register/verification');
    }

    public function indexMentions()
    {
        $this->display('home/mentions');
    }

    public function indexPC()
    {
        $this->display('articles/pc');
    }

    // displays the support page thanks to the function and through the router
    public function indexSupport()
    {
        $this->display('home/support');
    }

    // displays the topsel page thanks to the function and through the router
    public function indexTopsel()
    {
        $this->display('home/topsel');
    }

    // displays the shop page thanks to the function and through the router
    public function indexShop()
    {
        $this->display('home/panier');
    }

    // displays the conditions page thanks to the function and through the router
    public function indexConditions()
    {
        $this->display('home/conditions');
    }

    public function indexForgot()
    {
        $this->display('login/forgot-password');
    }

    public function viewCreateArticle()
    {
        $this->display('create_article/create_article');
    }

    public function indexProfile($id)
    {
        $manager = new UserManager();
        $this->display('home/myprofile', [
            'user' => $manager->getUserById($id)
        ]);
    }
}
