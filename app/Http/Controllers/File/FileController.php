<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use App\Imports\FileImport;
use Maatwebsite\Excel\Facades\Excel;

class FileController extends Controller
{
   
   
    public function create()
    {
        return view('file/create');
    }

   
    public function store(Request $request)
    {

          $file=$request->file('file');
          

        Excel::import(new FileImport,$file);
       
    return back();
    }

   
}
