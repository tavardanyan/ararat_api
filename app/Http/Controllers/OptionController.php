<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use App\Http\Resources\Option as OptionResource;

class OptionController extends Controller
{
    //
    public function updateOption(Request $request)
    {
        $opt = Option::where('name', "=", $request->type)->first();
        if( $opt->update([
            'value' => json_encode($request->value, true),
        ])) {
            return $this->getOptions($request);
        }
        else {
            return response("LARAVEL_SERVER_ERROR_NOT_FOUND_OPTION_003", 404);
        }
    }

    public function getOptions(Request $request)
    {
        $options = Option::all();
        $opt = [];
        foreach ($options as $option)
        {
            $opt[$option->name] = json_decode($option->value);
        }
        return response()->json($opt);
    }

}
