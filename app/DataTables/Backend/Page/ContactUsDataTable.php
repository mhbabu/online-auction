<?php

namespace App\DataTables\Backend\Page;

use App\Libraries\Encryption;
use App\Modules\Page\Models\ContactUs;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


class ContactUsDataTable extends DataTable
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
                $actionBtn = '<a href="/admin/contact-us/'.Encryption::encodeId($data->id).'" class="btn btn-sm btn-info" title="View"><i class="fa fa-eye"></i> View</a> ';
                $actionBtn .= '<a href="/admin/contact-us/' . Encryption::encodeId($data->id) . '/delete/" class="btn btn-sm btn-danger action-delete" title="Delete"><i class="fa fa-trash"></i> Delete</a> ';
                return $actionBtn;
            })

            ->addColumn('status', function ($data) {
                return ($data->status == 'Seen') ? "<label class='badge badge-success'> Seen </label>" : "<label class='badge badge-danger'> Not Seen </label>";
            })
            ->rawColumns(['status','action'])
            ->make(true);
    }

    /**
     * Get query source of dataTable.
     * @return \Illuminate\Database\Eloquent\Builder
     * @internal param \App\Models\AgentBalanceTransactionHistory $model
     */
    public function query()
    {
        $query = ContactUs::getContactUsList();
        $data = $query->select([
            'contact_us.*'
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
            ->setTableId('contact-us-table')
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
            'name'      => ['data' => 'name', 'name' => 'name', 'orderable' => true, 'searchable' => true],
            'email'      => ['data' => 'email', 'name' => 'email', 'orderable' => true, 'searchable' => true],
            'subject'      => ['data' => 'subject', 'name' => 'subject', 'orderable' => true, 'searchable' => true],
            'status'     => ['data' => 'status', 'name' => 'status', 'orderable' => true, 'searchable' => true],
            'action'     => ['searchable' => false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(){
        return 'contact_us_list_' . date('Y_m_d_H_i_s');
    }
}
