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

    protected $response;
    protected $client;

      /**
     *  Initializes this class.
     */
    public function __construct()
    {
        $this->client = HttpClient::create();
    }

    public function selectAll(): array
    {
        $this->response = $this->client->request('GET', self::URL_API);
        $statusCode = $this->response->getStatusCode();
        $content = [];
        if ($statusCode === 200) {
            $content = $this->response->toArray();
        }
        return $content;
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

}
