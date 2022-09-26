<?php

namespace App\DataTables\Backend\Product;

use App\Modules\Product\Models\Biding;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;

class ProductBidingDataTable extends DataTable
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
            ->editColumn('biding_date', function ($data) {
                return Carbon::parse($data->biding_date)->format('d M, Y h:i:s a');
            })
            ->editColumn('price', function ($data) {
                return $data->price . 'Tk';
            })
            ->rawColumns(['status'])
            ->make(true);
    }

    /**
     * Get query source of dataTable.
     * @return \Illuminate\Database\Eloquent\Builder
     * @internal param \App\Models\AgentBalanceTransactionHistory $model
     */
    public function query()
    {
        $query = Biding::getProductBidingList();
        $data = $query->select([
            'bidings.*',
            'products.title as product_title',
            'users.name',
            'users.email'
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
            'product title' => ['data' => 'product_title', 'name' => 'products.title', 'orderable' => true, 'searchable' => true],
            'name'          => ['data' => 'name', 'name' => 'users.name', 'orderable' => true, 'searchable' => true],
            'email'         => ['data' => 'email', 'name' => 'users.email', 'orderable' => true, 'searchable' => true],
            'date'          => ['data' => 'biding_date', 'name' => 'bidings.biding_date', 'orderable' => true, 'searchable' => true],
            'price'         => ['data' => 'price', 'name' => 'bidings.price', 'orderable' => true, 'searchable' => true],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'product_biding_list_' . date('Y_m_d_H_i_s');
    }
}
