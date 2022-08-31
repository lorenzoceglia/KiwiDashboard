<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use \Cake\Core\Configure;
use Cake\Http\Client;


class TelegramComponent extends Component
{

    public function initialize(array $config): void
    {
        parent::initialize($config);
        //$this->bot_token = '5056769530:AAFLfx_XRvCTSx4m6Cu3X7Vw1EqYWEXFWYk';
        $this->bot_token = '5137252801:AAF02qyaSxJjPdSwUgj6qj3TQcYkbbd_XSM';
        $this->api_url = 'https://api.telegram.org/bot' . $this->bot_token . '/';
        $this->api_url_updates = 'https://api.telegram.org/bot' . $this->bot_token . '/getUpdates';
    }

    public function sendDebug($text,$telegram_token)
    {
        $text = json_encode(json_decode($text), JSON_PRETTY_PRINT);
        $len = strlen($text);
        $num_div = ceil($len/4096);

        for ($i = 0; $i < $num_div; $i++)
        {
            $texts = substr($text, 0,4096);

            $options = [
                'chat_id' => $telegram_token,
                'text' => $texts
            ];

            $this->send('sendMessage', $options);
            $text = str_replace($texts, '' ,$text);
        }
    }

    public function sendMessage($text,$telegram_token)
    {
        $num_div = ceil(strlen($text)/4096);

        for ($i = 0; $i < $num_div; $i++)
        {
            $texts = substr($text, 0,4086);

            $options = [
                'chat_id' => $telegram_token,
                'text' => $texts
            ];

            $this->send('sendMessage', $options);
            $text = str_replace($texts, '' ,$text);
        }

    }

    public function sendPhoto($photo,$telegram_token)
    {
        $options = [
            'chat_id' => $telegram_token,
            'photo' => $photo
        ];
        $this->send('sendPhoto', $options);
    }

    public function sendChangelog($changelog,$telegram_token)
    {
        $options = [
            'chat_id' => $telegram_token,
            'text' => $changelog,
            'parse_mode' => 'html'
        ];
        $this->send('sendMessage', $options);
    }

    public function send($method, $options)
    {
        $http = new Client();
        $http->post($this->api_url . $method, $options);
    }
}

