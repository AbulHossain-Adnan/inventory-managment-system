<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Imports\FileImport;
use App\Services\FileService;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Bus;
use App\Models\User;
use App\Notifications\FailedJobAlert;
use Illuminate\Notifications\Notification;

class FileController extends Controller
{
    protected $fileservice;

    public function __construct(FileService $fileservice){
        $this->fileservice=$fileservice;
    }
   
   
    public function create()
    {
        return view('file/create');
    }


    public function store(FileRequest $request)
    {
        $batch=$this->fileservice->fileHandle($request); 
        toastr()->success('data stored succesfully');

        $batchId=$batch->id;

        $batch_data=Bus::findBatch($batchId);


        // return  redirect('progress_job/index',compact('batch_data'));
         
        return redirect('job_processing/'. $batchId);
    }

}
