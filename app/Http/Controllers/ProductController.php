<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Validator;
use App\Models\Product;
use App\Http\Resources\Product as ProductResource;

class ProductController extends BaseController {
    public function index() {
        $products = Product::all();

        return $this->sendResposne(ProductResource::collection($products), "Üzenet");
    }

    public function show($id) {

    }

    public function create(Request $request) {
        $product = $request->all();
        $validator = Validator::make($product, [
            "name" => "required",
            "itemnumber" => "required",
            "price" => "required"
        ]);

        if($validator->fails()) {
            return $this->sendError($validator, "Hiba");
        }

        $product = Product::create($product);

        return $this->sendResponse(new ProductResource($product), "Üzenet");
    }

    public function update(Request $request, $id) {

    }



}
