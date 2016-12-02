<?php
namespace App\Repositories;

use App\Services\DocumentService;

class DocumentRepository extends Repository
{

    public function getById($id, $index = '', $type = '')
    {
        if (empty($index)) {
            $index = config('es.index');
        }
        if (empty($type)) {
            $type = config('es.type');
        }

        $params = [
            'index' => $index,
            'type' => $type,
            'id' => $id
        ];

        return $params;
    }

    public function getByFieldsContent($data, $index = '', $type = '')
    {
        if (empty($index)) {
            $index = config('es.index');
        }
        if (empty($type)) {
            $type = config('es.type');
        }

        $params = [
            'index' => $index,
            'type' => $type,
            'body' => [
                'query' => [
                    'match' => $data
                ]
            ]
        ];

        return $params;
    }

    public function deleteById($id, $index = '', $type = '')
    {
        if (empty($index)) {
            $index = config('es.index');
        }
        if (empty($type)) {
            $type = config('es.type');
        }

        $params = [
            'index' => $index,
            'type' => $type,
            'id' => $id
        ];

        return $params;
    }
}