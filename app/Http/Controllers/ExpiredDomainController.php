<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpiredDomain;
use App\Jobs\ExpiredDomainProcess;
use App\Imports\FileImport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use App\Services\ExpiredDomainService;
use Carbon\Carbon;
use ExcelReport;
class ExpiredDomainController extends Controller
{

    public $data;
    protected $expireddomainservice;


    public function __construct(ExpiredDomainService $expireddomainservice){
        $this->expireddomainservice=$expireddomainservice;

    }
   
    public function index(Request $request){
    
        if ($request->ajax()){
            $data = ExpiredDomain::select(['id', 'domain']);
            return Datatables::of($data) 
            ->filter(function ($query) use ($request) {
                $fileter_data = $this->expireddomainservice->conditions($request,$query);
            })
            ->addIndexColumn()
            ->addColumn('action', function($row){

                $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                return $btn;

            })
            ->addColumn('checkbox', function($row){
                return '<input type = "checkbox" name="domain_checkbox" data-id="'.$row->id.'"><lavel></label>';
            })
            ->rawColumns(['action','checkbox'])
            ->make(true);
                   
        }       

        return view('expiredDomain/index');   
    }





    public function create(){   

        $queryBuilder = ExpiredDomain::select(['id', 'domain']);
        $title = 'Registered User Report'; // Report title
        $meta = [ // For displaying filters description on header
            'Registered on' =>"this is date"
        ];

        $columns = [ // Set Column to be displayed
            'ID' => 'id',
            'domain_Name' => 'domain'
        ];
        return ExcelReport::of($title, $meta, $queryBuilder, $columns)
        ->limit(20) 
        ->download('adnan');
    }

    

  

    public function store(Request $request){ 
    
        $file=$request->file('file');
        $extension=$file->extension();
       
        if($extension =="txt"){

            $doc=file_get_contents($file);

            $domains=explode("\n",$doc);
            $chunks = array_chunk($domains,1000);
            $header = [];

            foreach ($chunks as $key => $domain) {

                $data = array_map('str_getcsv', $domain);

                    if($key == 0){

                        $header = $data[0];
                        unset($data[0]);
                    }
                ExpiredDomainProcess::dispatch($data,$header); 
                }
                echo "stored"; 

        }

        else{

            $file=$request->file('file');
            Excel::import(new FileImport,$file);
            $cart=Jobs::count();
            dd($cart);

        }
   
    }

    public function select_column_post(Request $request){

        $datas = $request->selectedColumn;
        foreach($datas as $data){

           ExpiredDomain::findOrFail($data)->delete();

         

        }
        return response()->json(['success'=>'success']);
    }

}
