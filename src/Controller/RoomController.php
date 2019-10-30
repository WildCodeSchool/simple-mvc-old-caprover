<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\MovieManager;
use http\Header;

class RoomController extends AbstractController
{

    /**
     * Display room page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $roomManager = new MovieManager();
        $movies = $roomManager->selectAll();

    }
    public function showMovie()
    {

        $ids = [33, 6, 17, 7, 37, 43, 75];
        session_start();

        if (array_key_exists('counter', $_SESSION)) {
           $counter = $_SESSION['counter'];
        } else {
            $counter = 0;
        }

        $_SESSION['counter'] = $counter + 1;

        if ($counter == 7) {
            die('coucou');
            header('Location: http://localhost:8000/final/lose');
        }

        if($counter < 0 || $counter > 6){
            session_destroy();
            header('Location: http://localhost:8000/Room/showMovie');
        }


        $movieManager = new MovieManager();
        $movie = $movieManager->selectOneById($ids[$counter])['movie'];



        $responseElements = [
            ['imgUrl' => "/assets/images/blair_witch.png", 'statut' => $counter == 6, 'class' => "blair"],
            ['imgUrl' => "/assets/images/scream.png", 'statut' => $counter == 0, 'class' => "scream"],
            ['imgUrl' => "/assets/images/paranormal.png", 'statut' => $counter == 1, 'class' => "paranormal"],
            ['imgUrl' => "/assets/images/destination-finale.png", 'statut' => $counter == 3, 'class' => "destination"],
            ['imgUrl' => "/assets/images/moon.png", 'statut' => $counter == 4, 'class' => "moon"],
            ['imgUrl' => "/assets/images/exocist.png", 'statut' => $counter == 5, 'class' => "exocist"],
            ['imgUrl' => "/assets/images/saw.png", 'statut' => $counter == 2, 'class' => "saw"],

        ];


        return $this->twig->render('Room/index.html.twig', [
            'movie' => $movie,
            'responseElements' => $responseElements,
            'counter' => $counter,
        ]);


    }
}
