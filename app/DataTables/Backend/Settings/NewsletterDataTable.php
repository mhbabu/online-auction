<?php

namespace App\DataTables\Backend\Settings;

use App\Libraries\Encryption;
use App\Modules\Settings\Models\Newsletter;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class NewsletterDataTable extends DataTable
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
            ->editColumn('subscribed_at', function ($data) {
              return ($data->subscribed_at) ?  Carbon::parse($data->subscribed_at)->format('d F,Y'): '-';
            })
            ->addColumn('action', function ($data) {
                $actionBtn = '<a href="/admin/settings/newsletters/' . Encryption::encodeId($data->id) . '/delete/" class="btn btn-sm btn-danger action-delete" title="Delete Newsletter"><i class="fa fa-trash"></i> Delete</a> ';
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
        $query = Newsletter::getNewsletterList();
        $data = $query->select([
            'newsletters.*'
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
            'subscribed_at'  => ['data' => 'subscribed_at', 'name' => 'subscribed_at', 'orderable' => true, 'searchable' => true],
            'email'          => ['data' => 'email', 'name' => 'email', 'orderable' => true, 'searchable' => true],
            'ip address'     => ['data' => 'ip_address', 'name' => 'ip_address', 'orderable' => true, 'searchable' => true],
            'status'         => ['data' => 'status', 'name' => 'status', 'orderable' => true, 'searchable' => true],
            'action'         => ['searchable' => false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'newsletters_list_' . date('Y_m_d_H_i_s');
    }
}
