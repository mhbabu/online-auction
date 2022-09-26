<?php

namespace App\DataTables\Backend\Settings;

use App\Libraries\Encryption;
use App\Modules\Settings\Models\Advertisement;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class AdvertisementDataTable extends DataTable
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
            ->addColumn('action', function ($data) {
                $actionBtn = '<a href="/admin/settings/advertisements/'.Encryption::encodeId($data->id).'/edit/" class="btn btn-xs btn-info action-edit" title="Edit"><i class="fa fa-edit"></i> Edit</a> ';
                $actionBtn .= ' <a href="/admin/settings/advertisements/'.Encryption::encodeId($data->id).'/delete/" class="btn btn-xs btn-danger action-delete" title="Delete"><i class="fa fa-trash"></i> Delete</a>';
                return $actionBtn;
            })
            ->editColumn('expired_date', function ($data) {
               return ($data->expired_date) ?  Carbon::parse($data->expired_date)->format('d F,Y'): '-';
           })
            ->editColumn('image',function ($data){
                $url = url("/uploads/setting/advertisement/".$data->image);
                return $data->image ? '<img src="'. $url .'" class="img img-thumbnail" height="50" width="50" />' : '-' ;
            })
            ->addColumn('status',function($data){
                if($data->status == 1){
                    return "<label class='badge badge-success'> Active </label>";
                }
                return "<label class='badge badge-danger'> Inactive </label>";
            })

            ->rawColumns(['status','action','image'])
            ->make(true);

    }

    /**
     * Get query source of dataTable.
     * @return \Illuminate\Database\Eloquent\Builder
     * @internal param \App\Models\AgentBalanceTransactionHistory $model
     */
    public function query()
    {
        $query = Advertisement::getAdvertisementList();
        $query->select([
            'advertisements.*'
        ]);
        return $this->applyScopes($query);
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
                'dom'         => 'Blfrtip',
                'responsive'  => true,
                'autoWidth'   => false,
                'paging'      => true,
                "pagingType"  => "full_numbers",
                'searching'   => true,
                'info'        => true,
                'searchDelay' => 350,
                "serverSide"  => true,
                'order'       => [[1, 'asc']],
                'buttons'     => ['excel','csv', 'print', 'reset', 'reload'],
                'pageLength'  => 10,
                'lengthMenu'  => [[10, 20, 25, 50, 100, 500, -1], [10, 20, 25, 50, 100, 500, 'All']],
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
            'title'                 => ['data' => 'title', 'name' => 'title', 'orderable' => true, 'searchable' => true],
            'link'                  => ['data' => 'link', 'name' => 'link', 'orderable' => true, 'searchable' => true],
            'image'                 => ['data' => 'image', 'name' => 'image', 'orderable' => true, 'searchable' => true],
            'expired_date'          => ['data' => 'expired_date', 'name' => 'expired_date', 'orderable' => true, 'searchable' => true],
            'status'                => ['data' => 'status', 'name' => 'status', 'orderable' => true, 'searchable' => true],
            'action'                => ['searchable' => false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'advertisement_list_' . date('Y_m_d_H_i_s');
    }
}
