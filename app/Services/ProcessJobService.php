<?php 
namespace App\Services;
use DataTables;
use Illuminate\Http\Request;
use DB;

class ProcessJobService{

	public function handle($request=null){

		

            $data = DB::table('job_batches');
         
                    
            return DataTables::of($data) 
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                            return $btn;

                    })->rawColumns(['action'])
                    ->make(true);
                   
    
        return 0;


}
}


 ?>