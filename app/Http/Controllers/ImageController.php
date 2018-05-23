<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \File;
use \Response;

class ImageController extends Controller
{
    public function showImageByFolder(Request $request) {
        //$path = storage_path('app/public/'.$folder.'/22qaVXkVOxCi8BGihEX9hck02vq0OYlWqpKjZUaX.png');
        $path = storage_path('app/public/'.$request->folder.'/'.$request->name);
        if (!File::exists($path)) {
        $path = storage_path('app/public/no-image.png');
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function showProductImage(Request $request)
    {
        //$path = storage_path('app/public/'.$folder.'/22qaVXkVOxCi8BGihEX9hck02vq0OYlWqpKjZUaX.png');
        $path = storage_path('app/public/product/'.$request->folder.'/'.$request->name);
        if (!File::exists($path)) {
        $path = storage_path('app/public/no-image.png');
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function showNullImage(Request $request) {
        $path = storage_path('app/public/no-image.png');
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
    
        return $response;
    }
}
