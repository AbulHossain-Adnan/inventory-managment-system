<?php

namespace App\DataTables;

use App\Models\ExpiredDomain;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class expired_domainsDataTable extends DataTable
{
   
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action',  $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm">View</a>'
                

        );
    }
                   

    public function query(ExpiredDomain $model)
    {
        return $model->newQuery();
    }

   
    public function html()
    {
        return $this->builder()
                    ->setTableId('expired_domains-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

   
    protected function getColumns()
    {
        return [
           
                 
               
                
            Column::make('id'),
            Column::make('domain'),
          
        ];
    }

   
    protected function filename()
    {
        return 'ExpiredDomain_' . date('YmdHis');
    }
}
