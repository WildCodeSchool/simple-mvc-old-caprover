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
class RoomManager extends AbstractManager
{
    /**
     *
     */
    const API_URL = 'https://hackathon-wild-hackoween.herokuapp.com/movies/';
    protected $client;
    protected $content=[];

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        $this->client = HttpClient::create();
    }



    public function selectAll() :array
    {
        $response = $this->client->request('GET', SELF::API_URL);
        $statusCode = $response->getStatusCode(); // get Response status code 200
        if ($statusCode === 200) {
            $this->content = $response->toArray();
            // convert the response (here in JSON) to an PHP array

        }
        return $this->content;


    }
}
