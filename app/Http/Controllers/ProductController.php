<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseApiController
{
    public function index()
    {

        $products = Product::paginate(2);

        return $this->fromResource(ProductCollection::make($products))->toResponse();
    }

    public function create(Request $request)
    {
        /// validation

        $product = Product::create($request->all());

        return new ProductResource($product);

    }
}
