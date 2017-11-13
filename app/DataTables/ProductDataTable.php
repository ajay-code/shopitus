<?php

namespace App\DataTables;

use App\Models\Product;
use Form;
use Yajra\Datatables\Services\DataTable;

class ProductDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'products.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $products = Product::query()->with('product_category', 'deal_type', 'store');
        return $this->applyScopes($products);
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
            'product_category_id' => ['name' => 'product_category_id', 'data' => 'product_category.name'],
            'deal_type_id' => ['name' => 'deal_type_id', 'data' => 'deal_type.name'],
            'store_id' => ['name' => 'store_id', 'data' => 'store.name'],
            'image' => ['name' => 'image', 'data' => 'image', 'render' => '"<a href=\"/admin/storage/"+data+"\" target=\"_black\"><img src=\"/admin/storage/"+data+"\" height=\"50\"/></a>"'],
            'link' => ['name' => 'link', 'data' => 'link'],
            'text' => ['name' => 'text', 'data' => 'text']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'products';
    }
}
