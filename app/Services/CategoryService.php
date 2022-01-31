<?php 
namespace App\Services;
use App\Models\Category;
use DataTables;

class CategoryService{
	public function conditions($request, $query=null,){
		$keyword=$request->keyword;
        if ($request->keyword) {
            $query->where('name', 'like', "%{$keyword}%");
        }
        if($request->number == "only"){
            $query->where('name','REGEXP',"[0-9]");
        }
        if($request->number == "mixed"){
            $query->where('name','REGEXP',"[a-z|0-9]");
        }
        if($request->dash == "yes"){
            $query->where('name','REGEXP',"[-]");
        }

	}
}

?>