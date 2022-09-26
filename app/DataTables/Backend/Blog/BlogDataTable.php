<?php

namespace App\DataTables\Backend\Blog;

use App\Libraries\Encryption;
use App\Modules\Blog\Models\Blog;
use Yajra\DataTables\Services\DataTable;


class BlogDataTable extends DataTable
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
                $actionBtn = '<a href="/admin/blogs/'.Encryption::encodeId($data->id).'" class="btn btn-sm btn-info" title="View blog"><i class="fa fa-eye"></i> View</a> ';
                $actionBtn .= '<a href="/admin/blogs/' . Encryption::encodeId($data->id) . '/edit/" class="btn btn-sm btn-primary" title="Edit blog"><i class="fa fa-edit"></i> Edit</a> ';
                $actionBtn .= '<a href="/admin/blogs/' . Encryption::encodeId($data->id) . '/delete/" class="btn btn-sm btn-danger action-delete" title="Delete blog"><i class="fa fa-trash"></i> Delete</a> ';
                return $actionBtn;
            })
            ->editColumn('image',function ($data){
                $url = url("/uploads/blog/".$data->image);
                return ($data->image) ? '<img src="'. $url .'" style="border-radius:5px; border:1px solid #FFFF00; cursor: pointer;" height="50" width="60" />' : '-' ;
            })
            ->addColumn('status', function ($data) {
                return ($data->status == 1) ? "<label class='badge badge-success'> Active </label>" : "<label class='badge badge-danger'> Inactive </label>";
            })
            ->addColumn('featured', function ($data) {
                return ($data->featured == 1) ? "<label class='badge badge-success'> Yes </label>" : "<label class='badge badge-danger'> No </label>";
            })
            ->rawColumns(['status','action','image','featured'])
            ->make(true);
    }

    /**
     * Get query source of dataTable.
     * @return \Illuminate\Database\Eloquent\Builder
     * @internal param \App\Models\AgentBalanceTransactionHistory $model
     */
    public function query()
    {
        $query = Blog::getBlogList();
        $data = $query->select([
            'blogs.*'
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
            'title'     => ['data' => 'title', 'name' => 'title', 'orderable' => true, 'searchable' => true],
            'image'     => ['data' => 'image', 'name' => 'image', 'orderable' => true, 'searchable' => true],
            'featured'      => ['data' => 'featured', 'name' => 'featured', 'orderable' => true, 'searchable' => true],
            'status'    => ['data' => 'status', 'name' => 'status', 'orderable' => true, 'searchable' => true],
            'action'    => ['searchable' => false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(){
        return 'blog_list_' . date('Y_m_d_H_i_s');
    }
}
