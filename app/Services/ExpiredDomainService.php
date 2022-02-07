<?php 
namespace App\Services;
use App\Models\Category;
use DataTables;

class ExpiredDomainService{
	public function conditions($request, $query=null,){
      if(!is_null($query)){

      
		                $keyword=$request->keyword;
                    if ($request->keyword) {
                      $filter_data =  $query->where('domain', 'like', "{$keyword}%");
                      return $filter_data;
                    }
                    if($request->number == "only"){
                     $filter_data =  $query->where('domain','REGEXP',"[0-9]");
                      return $filter_data;
                    }
                    if($request->number == "mixed"){
                      $filter_data = $query->where('domain','REGEXP',"[a-z|0-9]");
                      return $filter_data;
                    }
                    if($request->dash == "yes"){
                       $filter_data = $query->where('domain','REGEXP',"[-]");
return $filter_data;
                   
                    }
                     
}
	}
}

?>