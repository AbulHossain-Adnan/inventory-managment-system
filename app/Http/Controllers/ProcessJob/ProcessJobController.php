<?php

namespace App\Http\Controllers\ProcessJob;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use App\Services\ProcessJobService;
use DB;
use DataTables;


class ProcessJobController extends Controller
{
    protected $processjobservice;
    public function __construct(ProcessJobService $processjobservice){
        $this->processjobservice=$processjobservice;
    }
    public function index(Request $request){

         if ($request->ajax()) {

            $data = DB::table('jobs')->get();
                    
            return DataTables::of($data) 
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">view</a><a href="javascript:void(0)" class="edit btn btn-danger btn-sm">delete</a>';
                            return $btn;

                    })->rawColumns(['action'])
                    ->make(true);
                   
        }

            return view('process_job/index');
    }

    public function job_processing($id){
        $batch= Bus::findBatch($id);
        return view('progress_job/index',compact('batch'));
    }


    public function job_live_history(Request $request){
        if ($request->ajax()) {
            $data = DB::table('job_batches')->get();      
            return DataTables::of($data) 
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                   
        }
      return view('job_live_history/index');
    }
}
