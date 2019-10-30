<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\MovieManager;

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

        return $this->twig->render('Room/index.html.twig', ['moviesTable' => $movies]);
    }

//    public function show(int $id)
//    {
//        $itemManager = new ItemManager();
//        $item = $itemManager->selectOneById($id);
//
//        return $this->twig->render('Item/show.html.twig', ['item' => $item]);
//    }
}
