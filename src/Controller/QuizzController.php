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
        return $this->twig->render('Quizz/index.html.twig', ['quizzs' => $quizzs]);
    }

    public function showId(int $id)
    {
        $quizzManager = new MovieManager();
        $quizz = $quizzManager->selectOneById($id);
        return $this->twig->render('Quizz/show.html.twig', ['quizz' => $quizz]);
    }

    public function showByTitle(string $title)
    {
        $quizzManager = new MovieManager();
        $quizzs = $quizzManager->selectByTitle($title);
        return $this->twig->render('Quizz/index.html.twig', ['quizzs' => $quizzs]);
    }

    public function showByYear(int $year)
    {
        $quizzManager = new MovieManager();
        $quizzs = $quizzManager->selectByYear($year);
        return $this->twig->render('Quizz/index.html.twig', ['quizzs' => $quizzs]);
    }

    public function showByCountry(string $country)
    {
        $quizzManager = new MovieManager();
        $quizzs = $quizzManager->selectByCountry($country);
        return $this->twig->render('Quizz/index.html.twig', ['quizzs' => $quizzs]);
    }

    public function showByDirector(string $director)
    {
        $quizzManager = new MovieManager();
        $quizzs = $quizzManager->selectByDirector($director);
        return $this->twig->render('Quizz/index.html.twig', ['quizzs' => $quizzs]);
    }

    public function createListQuestion()
    {
        $quizzManager = new MovieManager();
        $movies = $quizzManager->getQuestions();
        $directors = $quizzManager->getAllDirectors();
        $years = $quizzManager->getAllYears();
        $countries = $quizzManager->getAllCountries();
        $titles = $quizzManager->getAllTitles();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $score = $quizzManager->getScore($_POST);
            if ($score == 4) {
                return $this->twig->render('Final/success.html.twig', ['score' => $score]);
            }else {
                return $this->twig->render('Final/lose.html.twig', ['score' => $score]);
            }

        }

        return $this->twig->render('Quizz/quizz.html.twig', ['movies' => $movies,
                                                                    'directors' => $directors,
                                                                    'years' => $years,
                                                                    'countries' => $countries,
                                                                    'titles' => $titles,
                                                                    ]);
    }

    public function showOnlyDirectors()
    {
        $quizzManager = new MovieManager();
        $directors = $quizzManager->getAllDirectors();
        return $this->twig->render('Quizz/quizz.html.twig', ['directors' => $directors]);
    }

    public function showOnlyYears()
    {
        $quizzManager = new MovieManager();
        $years = $quizzManager->getAllYears();
        return $this->twig->render('Quizz/quizz.html.twig', ['years' => $years]);
    }

    public function showOnlyCountries()
    {
        $quizzManager = new MovieManager();
        $countries = $quizzManager->getAllCountries();
        return $this->twig->render('Quizz/quizz.html.twig', ['countries' => $countries]);
    }

    public function showOnlyTitles()
    {
        $quizzManager = new MovieManager();
        $titles = $quizzManager->getAllCountries();
        return $this->twig->render('Quizz/quizz.html.twig', ['countries' => $titles]);
    }
}
