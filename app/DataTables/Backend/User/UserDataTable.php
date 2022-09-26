<?php

namespace App\DataTables\Backend\User;

use App\Libraries\Encryption;
use App\Modules\User\Models\User;
use Yajra\DataTables\Services\DataTable;


class UserDataTable extends DataTable
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
                if($data->user_type == '1x101'){
                    return '-';
                }

                $actionBtn = '';
                $actionBtn .= ' <a href="/admin/users/'.Encryption::encodeId($data->id).'/edit/" class="btn btn-xs btn-info edit-user" title="Edit User"><i class="fa fa-edit"></i> Edit</a>';
                if ($data->approve_status == 0) {
                    $actionBtn .= ' <a href="/admin/users/approve/'.Encryption::encodeId($data->id).'" class="btn btn-xs btn-success approve-user" title="Approve User"><i class="fa fa-check-square"></i> Approve</a>';
                }

                if($data->approve_status == 1){
                    if ($data->activation_status == 0) {
                        $actionBtn .= ' <a href="/admin/users/activate/'.Encryption::encodeId($data->id).'" class="btn btn-xs btn-primary activate-user" title="Activate User"><i class="fa fa-check-circle"></i> Activate</a>';
                    }else{
                        $actionBtn .= ' <a href="/admin/users/deactivate/'.Encryption::encodeId($data->id).'" class="btn btn-xs btn-danger deactivate-user" title="Deactivate User"><i class="fa fa-ban"></i> Deactivate</a>';
                    }

                }

                return $actionBtn;
            })
            ->addColumn('activation_status',function($data){
                if($data->activation_status == 1){
                    return "<label class='badge badge-success'> Active </label>";
                }
                return "<label class='badge badge-danger'> Inactive </label>";
            })
            ->addColumn('verification_status',function($data){
                if($data->verification_status == 1){
                    return "<label class='badge badge-success'> Verified </label>";
                }
                return "<label class='badge badge-danger'> Not Verified </label>";
            })
            ->addColumn('approve_status',function($data){
                if($data->approve_status == 1){
                    return "<label class='badge badge-success'> Approve </label>";
                }
                return "<label class='badge badge-danger'> Not Approved </label>";
            })

            ->rawColumns(['activation_status','verification_status','approve_status','action'])
//            ->removeColumn('id')
            ->make(true);

    }

    /**
     * Get query source of dataTable.
     * @return \Illuminate\Database\Eloquent\Builder
     * @internal param \App\Models\AgentBalanceTransactionHistory $model
     */
    public function query()
    {
        $account = User::getUserList();
        $account->select([
            'users.*',
            'user_types.type_name'
        ]);
        return $this->applyScopes($account);
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
//            ->addAction(['width' => '160px'])
//            ->minifiedAjax('', null, request()->only(['from', 'to', 'team', 'user', 'category', 'status']))
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
            'name'                  => ['data' => 'name', 'name' => 'name', 'orderable' => true, 'searchable' => true],
            'email'                 => ['data' => 'email', 'name' => 'email', 'orderable' => true, 'searchable' => true],
            'user_type'             => ['data' => 'type_name', 'name' => 'type_name', 'orderable' => true, 'searchable' => true],
            'activation_status'     => ['data' => 'activation_status', 'name' => 'activation_status', 'orderable' => true, 'searchable' => true],
//            'verification_status'   => ['data' => 'verification_status', 'name' => 'verification_status', 'orderable' => true, 'searchable' => true],
            'approve_status'        => ['data' => 'approve_status', 'name' => 'approve_status', 'orderable' => true, 'searchable' => true],
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
        return 'user_list_' . date('Y_m_d_H_i_s');
    }
}
