<?php

namespace App\Controller;

class HomeController extends AbstractController
{

    public function index()
    {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $_SESSION['name'] = $_POST['name'];
            header('Location: /home/start');
            // if ($cookieName == 'Ginny') {
            //     setcookie($cookieName, time() + (86400 * 30), "/"); // 86400 = 1 day
            //     echo "Cookie named '" . $cookieName . "' is set!";
            // } elseif ($cookieName == 'Percy') {
            //     setcookie($cookieName, time() + (86400 * 30), "/"); // 86400 = 1 day
            //     echo "Cookie named '" . $cookieName . "' is set!";
            // }
        }
        return $this->twig->render('/index.html.twig');
    }


    public function start()
    {
        session_start();
        return $this->twig->render('/Home/start.html.twig', ['name' => $_SESSION['name'],
        'backgroundImg' => $this->generateRandomImg()]);
    }
}
