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

                         $retry_singlejob = route('retry_singlejob', $row->uuid);

                           $btn = '<a href="'.$retry_singlejob.'" class="edit btn btn-primary btn-sm">Retry</a><a href="'.route('retry_alljob').'" class="edit btn btn-success btn-sm">Retry_All</a>';
                            return $btn;

                    })->rawColumns(['action'])
                    ->make(true);
                   
        }

        return view('failed_job/index');
        
    }
    


  
    public function retry_singlejob($id)
    {
         \Artisan::call('queue:retry '.$id);

         return back();
        
    }

   
    public function retry_alljob()
    {
        \Artisan::call('queue:retry all');

         return back();
    }

   
  
}
