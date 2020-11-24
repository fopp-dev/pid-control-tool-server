<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    /** 
     * Generate Upload View 
     * 
     * @return void 

    */
    public function __construct()
    {
        $this->middleware('auth');
    }  

    public  function upload()  
    {  
        return view('upload-view');  
    }  

    /** 
     * File Upload Method 
     * 
     * @return void 
     */  

    public  function uploadFile(Request $request)  
    {  
        $file = $request->file('file');  
        $fileName = $file->getClientOriginalName(); 
        $file->move(public_path('file'),$fileName);  

    return response()->json(['success'=>$fileName]);  

    }  
    
    function fetch()
    {
        $files = \File::allFiles(public_path('file'));
        $output = '';
        foreach($files as $file)
        {
            $output .='<div class="col-span-2" align="center">
                <img src="'.asset('/images/dummy.png').'">
            </div>
            <div class="col-span-8" align="left" style="margin-top:20px">
                <span>'.$file->getFilename().'</span>
            </div>
            <div class="col-span-2" align="center" style="margin-top:18px">
                <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded remove_file" id="'.$file->getFilename().'">Delete</button>
            </div>
            ';
        }
        echo $output;
    }

    function delete(Request $request)
    {
        \File::delete(public_path('file/'.$request->get('name')));
    }
}
