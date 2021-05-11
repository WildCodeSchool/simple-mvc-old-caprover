<?php

namespace App\Controller;

class HomeController extends AbstractController
{

public function index()
{
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cookie_name = $_POST['name'];
            if ($cookie_name == 'Ginny') {
                setcookie($cookie_name, time() + (86400 * 30), "/"); // 86400 = 1 day
                echo "Cookie named '" . $cookie_name . "' is set!";
            } elseif ($cookie_name == 'Percy') {
                setcookie($cookie_name, time() + (86400 * 30), "/"); // 86400 = 1 day
                echo "Cookie named '" . $cookie_name . "' is set!";
            }
        }
return $this->twig->render('/index.html.twig');
}


    public function start()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cookie_name = $_POST['name'];       
        }
        return $this->twig->render('/Home/start.html.twig', ['name' => $cookie_name]);
    }
}