<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DataRepository;
use App\Repositories\DocumentRepository;
use App\Repositories\Elastic\EsRepository;

class DocumentController extends Controller
{
    public function index(DataRepository $dataRepository, EsRepository $esRepository)
    {


        return view('document.index');
    }

    public function add(DataRepository $dataRepository, EsRepository $esRepository)
    {
        $data = $dataRepository->getData();

        $r = [];
        foreach ($data as $v) {
            $r[] = $esRepository->add($v);
        }

        dd($r);

        return view('document.index');
    }

    public function getById(Request $request,EsRepository $esRepository, DocumentRepository $documentRepository)
    {
        $id = $request->input('id');
        $params = $documentRepository->getById($id);

        $data = $esRepository->get($params);

        dd($data);
    }

    public function getByFieldsContent(Request $request,EsRepository $esRepository, DocumentRepository $documentRepository)
    {
        $params = $request->input();
        unset($params['_url']);
        $params = $documentRepository->getByFieldsContent($params);

        $data = $esRepository->search($params);
        dd($data, $params);
    }

    public function deleteById(Request $request,EsRepository $esRepository, DocumentRepository $documentRepository)
    {
        $id = $request->input('id');
        $params = $documentRepository->deleteById($id);

        $data = $esRepository->delete($params);

        dd($data);
    }

    public function deleteIndex(Request $request,EsRepository $esRepository)
    {
        $index = $request->input('index');

        $data = $esRepository->deleteIndex(['index' => $index]);

        dd($data);
    }
}
