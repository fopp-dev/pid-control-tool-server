<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inverstor;

class ApiController extends Controller
{
    function index()
    {
        $files = \File::allFiles(public_path('file'));
        $num = rand(0, count($files)-1);
        return response()->download(public_path('file').'/'.$files[$num]->getFilename());
    }
    function check_inverstor(Request $request)
    {
        $email = $request->input('email');

        $inverstor = Inverstor::where('email', $email)->first();

        if ($inverstor) {
            return response()->json(['isRegistered' => 'true']);
        } else {
            return response()->json(['isRegistered' => 'false']);
        }
    }
}
