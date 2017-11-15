<?php

namespace App\DataTables;

use App\Models\RecommendedDeal;
use Form;
use Yajra\Datatables\Services\DataTable;

class RecommendedDealDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'recommended_deals.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $recommendedDeals = RecommendedDeal::query();

        return $this->applyScopes($recommendedDeals);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'name' => ['name' => 'name', 'data' => 'name'],
            'image' => ['name' => 'image', 'data' => 'image', 'render' => '"<a href=\"/admin/storage/"+data+"\" target=\"_black\"><img src=\"/admin/storage/"+data+"\" height=\"50\"/></a>"'],
            'link' => ['name' => 'link', 'data' => 'link', 'render' => '"<a href=\""+data+"\" class=\"btn btn-primary\" target=\"_black\">Visit Link</a>"'],
            'text' => ['name' => 'text', 'data' => 'text'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'recommendedDeals';
    }
}
