<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function indexPage() {
        return response()->json(['status' => 200, 'message' => 'succcesful', 'platform' => 'new 4 API']);
    }

    public function indexWebPage() {
        return response()->json(['status' => 200, 'message' => 'succcesful', 'platform' => 'WEB']);
    }

    public function errorPage() {
        return response()->json(['error' => 'Invalid Token']);
    }

}
