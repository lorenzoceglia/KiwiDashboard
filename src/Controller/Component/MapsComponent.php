<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use \Cake\Core\Configure;
use Cake\Http\Client;


class MapsComponent extends Component
{
    public function initialize(array $config): void
    {
        $this->google_api_key = 'AIzaSyClLe-KwIJWETo8-0EVsBw2C5-TPNDPyH0';
    }

    public function request()
    {

            //remember method
            $url = 'https://dog.ceo/api/breeds/image/random';

            $http = new Client();
            $response = $http->get($url);


            if (!empty($response)) {

                return json_decode($response->getBody());

            } else return ['result' => false];

    }

    public function returnGKey()
    {
        return $this->google_api_key;
    }



}
