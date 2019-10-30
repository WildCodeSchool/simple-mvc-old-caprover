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

    public function show(int $id)
    {
        $quizzManager = new MovieManager();
        $quizz = $quizzManager->selectOneById($id);
        return $this->twig->render('Quizz/show.html.twig', ['quizz' => $quizz]);
    }
}
