<?php

namespace App\Controller;

class HomeController extends AbstractController
{

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cookieName = $_POST['name'];
            if ($cookieName == 'Ginny') {
                setcookie($cookieName, time() + (86400 * 30), "/"); // 86400 = 1 day
                echo "Cookie named '" . $cookieName . "' is set!";
            } elseif ($cookieName == 'Percy') {
                setcookie($cookieName, time() + (86400 * 30), "/"); // 86400 = 1 day
                echo "Cookie named '" . $cookieName . "' is set!";
            }
        }
        return $this->twig->render('/index.html.twig');
    }


    public function start()
    {
            $cookieName = $_POST['name'];
            return $this->twig->render('/Home/start.html.twig', ['name' => $cookieName]);
    }
}
