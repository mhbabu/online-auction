<?php

namespace App\DataTables\Backend\Product;

use App\Modules\Product\Models\Product;
use App\Libraries\Encryption;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->editColumn('category_name',function ($data){
                return $data->category_name ? $data->category_name : '-';
            })
            ->addColumn('action', function ($data) {
                $actionBtn = '<a href="/admin/products/' . Encryption::encodeId($data->id) . '" class="btn btn-sm btn-info" title="Product Details"><i class="fa fa-list-alt"></i> Details</a> ';
                $actionBtn .= '<a href="/admin/products/' . Encryption::encodeId($data->id) . '/edit/" class="btn btn-sm btn-primary" title="Edit Product"><i class="fa fa-edit"></i> Edit</a> ';
                $actionBtn .= '<a href="/admin/products/' . Encryption::encodeId($data->id) . '/delete/" class="btn btn-sm btn-danger action-delete" title="Delete Product"><i class="fa fa-trash"></i> Delete</a>';
                return $actionBtn;
            })
            ->addColumn('status', function ($data) {
                return ($data->status == 1) ? "<label class='badge badge-success'> Active </label>" : "<label class='badge badge-danger'> Inactive </label>";
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    /**
     * Get query source of dataTable.
     * @return \Illuminate\Database\Eloquent\Builder
     * @internal param \App\Models\AgentBalanceTransactionHistory $model
     */
    public function query()
    {
        $query = Product::getProductList();
        $data = $query->select([
            'products.*',
            'product_categories.name as category_name',
            'product_types.name as type_name'
        ]);
        return $this->applyScopes($data);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->parameters([
                'dom' => 'Blfrtip',
                'responsive' => true,
                'autoWidth' => false,
                'paging' => true,
                "pagingType" => "full_numbers",
                'searching' => true,
                'info' => true,
                'searchDelay' => 350,
                "serverSide" => true,
                'order' => [[1, 'asc']],
                'buttons' => ['excel', 'csv', 'print', 'reset', 'reload'],
                'pageLength' => 10,
                'lengthMenu' => [[10, 20, 25, 50, 100, 500, -1], [10, 20, 25, 50, 100, 500, 'All']],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'title'         => ['data' => 'title', 'name' => 'products.title', 'orderable' => true, 'searchable' => true],
            'category'      => ['data' => 'category_name', 'name' => 'product_categories.name', 'orderable' => true, 'searchable' => true],
            'type'          => ['data' => 'type_name', 'name' => 'product_types.name', 'orderable' => true, 'searchable' => true],
            'end_time'      => ['data' => 'end_time', 'name' => 'products.end_time', 'orderable' => true, 'searchable' => true],
            'price'         => ['data' => 'price', 'name' => 'products.price', 'orderable' => true, 'searchable' => true],
            'status'        => ['data' => 'status', 'name' => 'status', 'orderable' => true, 'searchable' => true],
            'action'        => ['searchable' => false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'product_list_' . date('Y_m_d_H_i_s');
    }
}
