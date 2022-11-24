<?php

namespace ProgrammerPhp\PhpMvc\Controller;

use ProgrammerPhp\PhpMvc\Config\View;

class HomeController
{

    function index(): void
    {
        $model = [
            'title' => 'PHP MVC TITLE',
            'content' => 'PHP MVC CONTENT'
        ];

        // echo "HomeController.index()";
        // require __DIR__ . '/../View/Home/index.php';

        View::render('Home/index', $model);
    }

    function hello(): void
    {
        echo "HomeController.hello()";
    }

    function world(): void
    {
        echo "HomeController.world()";
    }

    function about(): void
    {
        echo "Author : Iman Nur Izza";
    }

    function login(): void
    {
        $request = [
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ];

        $response = [
            'message' => 'Login Sukses'
        ];
    }
}
