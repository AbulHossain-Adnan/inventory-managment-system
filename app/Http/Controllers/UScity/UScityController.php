<?php

namespace App\Http\Controllers\UScity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Uscity;
use DataTables;

class UScityController extends Controller
{
   
    public function index(Request $request)
    {
         if ($request->ajax()) {

            $data = Uscity::all();
                    
            return Datatables::of($data) 
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                            return $btn;

                    })->rawColumns(['action'])
                    ->make(true);
                   
        }

        return view('uscity/index');
    }

   
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
    }

  
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
