<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpiredDomain;
use PdfReport;;
class PdfController extends Controller
{
    public function pdfdisplay(){



        $queryBuilder = ExpiredDomain::select(['id', 'domain'])->get();
      

        $title = 'Registered User Report'; // Report title


        $meta = [ // For displaying filters description on header
                'Registered on' =>"this is date"
            ];


        $columns = [ // Set Column to be displayed
                'ID' => 'id',
                'domain_Name' => 'domain',
                'Registered At',

            ];

     
        return PdfReport::of($title, $meta, $queryBuilder, $columns)

        ->download('admin');

    }
}
