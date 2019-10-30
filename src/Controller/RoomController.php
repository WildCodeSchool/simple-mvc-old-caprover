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
        return $this->twig->render('Room/index.html.twig', ['movies' => $movies]);
    }

    public function showMovie()
    {

        $ids = [33, 6, 17, 7, 37, 43, 75];
        session_start();

        if (array_key_exists('counter', $_SESSION)) {
            $_SESSION['counter']++;
        } else {
            $_SESSION['counter'] = 0;
        }

        $counter = $_SESSION['counter'];

        if ($counter == 7) {
            header('Location: http://localhost:8000/Quizz/index'); // tout doux : adapter l'url
        }

        if($counter < 0 || $counter > 7){
            session_destroy();
            header('Location: http://localhost:8000/showMovie');
        }


        $movieManager = new MovieManager();
        $movie = $movieManager->selectOneById($ids[$counter])['movie'];
//        var_dump($movie);
//        die('coucou');


        $responseElements = [
            ['imgUrl' => "/assets/images/blair_witch.png", 'statut' => true, 'class' => "blair"],
            ['imgUrl' => "/assets/images/scream.png", 'statut' => false, 'class' => "scream"],
            ['imgUrl' => "/assets/images/paranormal.png", 'statut' => false, 'class' => "paranormal"],
            ['imgUrl' => "/assets/images/destination-finale.png", 'statut' => false, 'class' => "destination"],
            ['imgUrl' => "/assets/images/moon.png", 'statut' => false, 'class' => "moon"],
            ['imgUrl' => "/assets/images/exocist.png", 'statut' => false, 'class' => "exocist"],
            ['imgUrl' => "/assets/images/saw.png", 'statut' => false, 'class' => "saw"],
        ];


        return $this->twig->render('Room/index.html.twig', [
            'movie' => $movie,
            'responseElements' => $responseElements,
            'counter' => $counter,
        ]);


    }


}
