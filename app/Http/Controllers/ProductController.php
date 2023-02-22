<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ResponseResources;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $repository;

    public function __construct(
        ProductRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function create(Request $request)
    {
        $config = (object)array("tipo" => 0);
        return ResponseResources::Response($this->repository->create($request->all()), $config);
    }

    public function update($id, Request $request)
    {
        $config = (object)array("id"=>$id,"tipo" => 1);
        return ResponseResources::Response($this->repository->update($id, $request->all()), $config);
    }

    public function listAll()
    {
        return new ProductCollection($this->repository->all());
    }

    public function delete($id)
    {
        $enable = ["enable" => 0];
        $config = (object)array("id"=>$id,"tipo" => 2);
        return ResponseResources::Response($this->repository->update($id, $enable), $config);
    }

    public function findById($id)
    {
        $config = (object)array("id"=>$id,"tipo" => 4);
        return ResponseResources::Response($this->repository->findById($id), $config);
    }
}
