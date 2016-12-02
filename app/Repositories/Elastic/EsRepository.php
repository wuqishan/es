<?php

namespace App\Repositories\Elastic;

use App\Repositories\Repository;
use Elasticsearch;

class EsRepository extends Repository
{
    private $searchClient = null;

    public function __construct()
    {
        $hosts = [
            'host' => config('es.host'),
            'port' => config('es.port')
        ];

        $this->searchClient = Elasticsearch\ClientBuilder::create()
            ->setHosts($hosts)
            ->build();
    }

    public function add($params)
    {
        return $this->searchClient->index($params);
    }

    public function get($params)
    {
        return $this->searchClient->get($params);
    }

    public function search($params)
    {
        return $this->searchClient->search($params);
    }

    public function delete($params)
    {
        return $this->searchClient->delete($params);
    }

    public function createIndex($params)
    {
        return $this->searchClient->indices()->create($params);
    }
    public function deleteIndex($params)
    {
        return $this->searchClient->indices()->delete($params);
    }
}