<?php

namespace App\Http\Controllers\FailedJob;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;

class FailedJobController extends Controller
{
   
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = DB::table('failed_jobs')->get();
                    
            return DataTables::of($data) 
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="'.route('queue_retry_all').'" class="edit btn btn-primary btn-sm">Retry</a><a href="'.route('queue_retry_all').'" class="edit btn btn-success btn-sm">Retry_All</a>';
                            return $btn;

                    })->rawColumns(['action'])
                    ->make(true);
                   
        }

        return view('failed_job/index');
        
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
