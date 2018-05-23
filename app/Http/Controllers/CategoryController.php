<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Resources\Category as CategoryResource;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function getCategory($id = "all")
    {
        if($id === "all") {
            $cat = Category::all();
            return new CategoryResource($cat);
        }
        else {
            $cat = Category::where('id', $id)->get();
            return new CategoryResource($cat);
        }
        //return storage_path('app/test/');
    }

    public function getCategoryPaginate($size = 10) {
        $cat = Category::paginate($size);
        return new CategoryResource($cat);
    }

    public function deleteCategory($id)
    {
        $del = Category::find(intval($id));

        Category::where('parent', $id)->update(array('parent' => $del->parent));
        
        if($del->delete()) {

            //Category::truncate();
            return response()->json(['id' => intval($id)]);
        }
        else {
            return response("LARAVEL_SERVER_ERROR_NOT_FOUND_CATEGORY_001", 404);
        }
    }

    public function updateCategory(Request $request)
    {
        $title = trim($request->title);
        $slug = trim($request->slug);
        $parent = $request->parent == "" ? null : intval($request->parent);
        $desc = $request->desc == "" ? null : trim($request->desc);

        $cat = Category::find(intval($request->id));
        if( $cat->update([
            'title' => $title,
            'slug' => $slug,
            'desc' => $desc,
            'parent' => $parent
        ])) {
            return response()->json(['id' => $request->id]);
        }
        else {
            return response("LARAVEL_SERVER_ERROR_NOT_FOUND_CATEGORY_002", 404);
        }
    }

    public function addCategory(Request $request)
    {
        $title = trim($request->title);
        $slug = trim($request->slug);
        $parent = $request->parent == "" ? null : intval($request->parent);
        $desc = $request->desc == "" ? null : trim($request->desc);

        return Category::create([
            'title' => $title,
            'slug' => $slug,
            'desc' => $desc,
            'parent' => $parent,
            'image' => $request->image
        ]);
    }

    public function addCategoryImage(Request $request)
    {
        if($request->file('file'))
        {
            $image = $request->file('file');
            $var = Storage::put('public/category', $image);
            $var = str_replace("public/", "", $var);
            return response()->json($var);
        }
        else
        {
            return response(null);
        }
    }
}

