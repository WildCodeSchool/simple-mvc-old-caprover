<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use App\Model\MovieManager;

/**
 * Class QuizzController
 *
 */
class QuizzController extends AbstractController
{

    public function index()
    {
        $quizzManager = new MovieManager();
        $quizzs = $quizzManager->selectAll();
        var_dump($quizzs);
        return $this->twig->render('Quizz/index.html.twig', ['quizzs' => $quizzs]);
    }

    public function showId(int $id)
    {
        $quizzManager = new MovieManager();
        $quizz = $quizzManager->selectOneById($id);
        var_dump($quizz);
        return $this->twig->render('Quizz/show.html.twig', ['quizz' => $quizz]);
    }

    public function showByTitle(string $title)
    {
        $quizzManager = new MovieManager();
        $quizzs = $quizzManager->selectByTitle($title);
        var_dump($quizzs);
        return $this->twig->render('Quizz/index.html.twig', ['quizzs' => $quizzs]);
    }

    public function showByYear(int $year)
    {
        $quizzManager = new MovieManager();
        $quizzs = $quizzManager->selectByYear($year);
        var_dump($quizzs);
        return $this->twig->render('Quizz/index.html.twig', ['quizzs' => $quizzs]);
    }

    public function showByCountry(string $country)
    {
        $quizzManager = new MovieManager();
        $quizzs = $quizzManager->selectByCountry($country);
        var_dump($quizzs);
        return $this->twig->render('Quizz/index.html.twig', ['quizzs' => $quizzs]);
    }

    public function showByDirector(string $director)
    {
        $quizzManager = new MovieManager();
        $quizzs = $quizzManager->selectByDirector($director);
        var_dump($quizzs);
        return $this->twig->render('Quizz/index.html.twig', ['quizzs' => $quizzs]);
    }
}
