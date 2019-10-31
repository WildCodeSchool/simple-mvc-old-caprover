<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

/**
 *
 */
class MovieManager extends AbstractManager
{
    /**
     *
     */
    const URL_API = 'https://hackathon-wild-hackoween.herokuapp.com/movies/';
    const TABLE = 'universe';
    protected $response;
    protected $client;
    protected $content = [];
    protected $listQuestion = [];

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
        $this->client = HttpClient::create();
    }

    public function selectAll(): array
    {
        $this->response = $this->client->request('GET', self::URL_API);
        $statusCode = $this->response->getStatusCode();
        if ($statusCode === 200) {
            $this->content = $this->response->toArray();
        }
        return $this->content;
    }

    public function selectOneById(int $id): array
    {
        $url = self::URL_API . $id;
        $this->response = $this->client->request('GET', $url);
        $statusCode = $this->response->getStatusCode();
        $content = [];
        if ($statusCode === 200) {
            $content = $this->response->toArray();
        }
        return $content;
    }

    public function selectByTitle(string $title): array
    {
        $url = self::URL_API . "search/title/" . $title;
        $this->response = $this->client->request('GET', $url);
        $statusCode = $this->response->getStatusCode();
        $content = [];
        if ($statusCode === 200) {
            $content = $this->response->toArray();
        }
        return $content;
    }

    public function selectByYear(int $year): array
    {
        $url = self::URL_API . "search/year/" . $year;
        $this->response = $this->client->request('GET', $url);
        $statusCode = $this->response->getStatusCode();
        $content = [];
        if ($statusCode === 200) {
            $content = $this->response->toArray();
        }
        return $content;
    }

    public function selectByCountry(string $country): array
    {
        $url = self::URL_API . "search/country/" . $country;
        $this->response = $this->client->request('GET', $url);
        $statusCode = $this->response->getStatusCode();
        $content = [];
        if ($statusCode === 200) {
            $content = $this->response->toArray();
        }
        return $content;
    }

    public function selectByDirector(string $director): array
    {
        $url = self::URL_API . "search/director/" . $director;
        $this->response = $this->client->request('GET', $url);
        $statusCode = $this->response->getStatusCode();
        $content = [];
        if ($statusCode === 200) {
            $content = $this->response->toArray();
        }
        return $content;
    }

    public function getRandomMovie(): array
    {
        $this->response = $this->client->request('GET', self::URL_API);
        $statusCode = $this->response->getStatusCode();
        if ($statusCode === 200) {
            $this->content = $this->response->toArray();
        }
        $rand = rand(0, count($this->content['movies']));
        return $this->selectOneById($rand);
    }

    public function getQuestions(): array
    {
        for ($i = 0; $i < 4; $i++) {
            $this->listQuestion[] = $this->getRandomMovie();
        }
        return $this->listQuestion;
    }

    public function getScore($answers): int
    {
        $score = 0;
        if ($answers['director'] == $answers['directorAnswer']) {
            $score++;
        }
        if ($answers['year'] == $answers['yearAnswer']) {
            $score++;
        }
        if ($answers['country'] == $answers['countryAnswer']) {
            $score++;
        }
        if ($answers['title'] == $answers['titleAnswer']) {
            $score++;
        }

        return $score;
    }

    public function getAllDirectors(): array
    {
        $movies = $this->selectAll();
        $directors = [];
        foreach ($movies['movies'] as $movie) {
            $directors[] = $movie['director'];
        }
        $directors = array_unique($directors);
        sort($directors);
        return $directors;
    }

    public function getAllYears(): array
    {
        $movies = $this->selectAll();
        $years = [];
        foreach ($movies['movies'] as $movie) {
            $years[] = $movie['year'];
        }
        $years = array_unique($years);
        sort($years);
        return $years;
    }

    public function getAllCountries(): array
    {
        $movies = $this->selectAll();
        $countries = [];
        foreach ($movies['movies'] as $movie) {
            $countries[] = $movie['country'];
        }
        $countries = array_unique($countries);
        sort($countries);
        return $countries;
    }

    public function getAllTitles(): array
    {
        $movies = $this->selectAll();
        $titles = [];
        foreach ($movies['movies'] as $movie) {
            $titles[] = $movie['title'];
        }
        $titles = array_unique($titles);
        sort($titles);
        return $titles;
    }
}
