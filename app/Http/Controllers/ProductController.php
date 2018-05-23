<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function addProductImage(Request $request) {
        if($request->file('file'))
        {
            $res = Product::find($request->id);
            $image = $request->file('file');
            $var = Storage::disk('product')->put($res->sku, $image);
            $var = str_replace("public/", "", $var);

            $res->update([
                'file' => "product_image/".$var,
            ]);

            return response()->json($res);
        }
        else
        {
            return response()->json($request);
        }
    }
    
    public function addProduct(Request $request) {
        $res = Product::create([
            'name' => $request->name,
            'sku' => strtoupper($request->sku),
            'category' => $request->category,
            'desc' => $request->desc,
            'specific' => $request->specific,
            'tags' => $request->tags,
            'brend' => $request->brend,
            'country' => $request->country,
            'model' => $request->model,
            'material' => $request->material,
            'color' => $request->color,
            'price1' => $request->price1,
            'price2' => $request->price2,
            'price3' => $request->price3,
            'available' => $request->available,
            'count' => $request->count,
            'count_reserve' => $request->count_reserve,
            'piece_size' => $request->piece_size,
            'piece_weight' => $request->piece_weight,
            'pack_size' => $request->pack_size,
            'pack_weight' => $request->pack_weight,
            'box_size' => $request->box_size,
            'box_weight' => $request->box_weight,
            'count_in_box' => $request->count_in_box,
            'count_in_pack' => $request->count_in_pack
        ]);

        return response()->json($res);
    }

    public function getProduct(Request $request) {
        $res = Product::where($request->by, $request->value)->first();
        return response()->json($res);
    }

    public function checkSKU(Request $request)
    {
        $sku = strtoupper($request->sku);
        if(Product::where('sku', $sku)->first()) {
            return response()->json(["SKU" => $sku, "status" => true]);
        }
        else {
            return response()->json(["SKU" => $sku, "status" => false]);
        }
    }

}
