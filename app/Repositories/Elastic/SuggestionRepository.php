<?php

namespace App\Repositories\Elastic;

use App\Repositories\Repository;
use Elasticsearch;
use App\Models\Document;

class SuggestionRepository extends Repository
{
    private $_client;

    public function __construct()
    {
        $hosts = $this->_getSearchHost();
        $this->_client = Elasticsearch\ClientBuilder::create()
            ->setHosts($hosts)
            ->build();
    }

    public function suggestions($term)
    {
        $params = [
            'index' => config('elastic_suggestions.index'),
            'body' => [
                'searchAutocomplete' => [
                    'text' => $term,
                    'completion' => [
                        'field' => 'ac',
                        'size' => 10
                    ]
                ]
            ]
        ];

        $response = $this->_client->suggest($params);

        return $response;
    }

    /**
     * Index suggestions into elasticsearch
     */
    public function index()
    {
        Document::chunk(1000, function($documents) {
            $params = ['body' => []];

            foreach ($documents as $document) {
                $terms = empty($document->tags) ? [] : explode(',', $document->tags);
                $terms[] = $document->title;

                foreach ($terms as $term) {
                    $params['body'][] = [
                        'index' => [
                            '_index' => config('elastic_suggestions.index'),
                            '_type' => config('elastic_suggestions.type'),
                            '_id' => md5($term)
                        ]
                    ];

                    $params['body'][] = [
                       'ac' => $term
                    ];
                }
            }

            $this->_client->bulk($params);
        });
    }

    private function _getSearchHost()
    {
        return [
            'host' => config('elastic_suggestions.host'),
            'port' => config('elastic_suggestions.port')
        ];
    }
}