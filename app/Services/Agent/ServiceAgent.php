<?php

namespace App\Services\Agent;

use Exception;
use GuzzleHttp\Client;

class ServiceAgent
{
    private $host;
    private $port;
    private $client;

    public function __construct(Client $client, $host, $port)
    {
        $this->host = $host;
        $this->port = $port;
        $this->client = $client;
    }

    public function setPort($port) {
        $this->port = $port;
    }

    public function getBodyByUrl($url)
    {
        return $this->client->request('GET', $url)->getBody();
    }

    public function get($uri, $parameters = []) {
        $contents = $this->getContents($uri, ['query' => $parameters], 'GET');

        return $contents;
    }

    public function post($uri, $parameters) {
        $contents = $this->getContents($uri, ['query' => $parameters], 'POST');

        return $contents;
    }

    public function put($uri, $parameters) {
        $contents = $this->getContents($uri, ['query' => $parameters], 'PUT');

        return $contents;
    }

    public function delete($uri, $parameters) {
        $contents = $this->getContents($uri, ['query' => $parameters], 'DELETE');

        return $contents;
    }

    private function getContents($uri, $parameters, $method = 'GET') {
        $body = $this->getBody($uri, $parameters, $method);
        $contents = $body->getContents();
        $contents = json_decode($contents, true);

        return $contents;
    }

    private function getBody($uri, $parameters, $method = 'GET') {
        $res = $this->request($uri, $parameters, $method);
        $statusCode = $res->getStatusCode();

        if (200 !== $statusCode) {
            throw new Exception("Error Request");
        }

        return $res->getBody();
    }

    private function request($uri, $parameters, $method = 'GET') {
        $url = $this->host . ':' . $this->port . '/' . $uri;
        return $this->client->request($method, $url, $parameters);
    }

}
