<?php

namespace App\DataTables;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class CustomersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Customer> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function ($user) {
                return Carbon::parse($user->created_at)->format('Y-m-d');
            })
            ->editColumn('national_id', function ($user) {
                return Str::title(Str::replace("_", " ", $user->national_id));
            })
            ->editColumn('status', function ($user) {
                if ($user->status == 'Active') {
                    return '<span class="badge bg-success-subtle text-success">' . $user->status . '</span>';
                } else {
                    return '<span class="badge bg-danger-subtle text-danger">' . $user->status . '</span>';
                }
            })
            ->addColumn('action',  function ($user) {
                $btn = "<div class='btn-group' role='group'>";
                $btn .= "<a class='btn btn-sm btn-outline-success' href='/admin/users/customers/" . $user->id . "'><i class='las la-eye fs-18'></i></a>";
                // $btn .= "<button class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#deleteCompany' onclick='delete_company(\"{$company->id}\")'><i class='las la-trash fs-18'></i></button>";
                $btn .= "</div>";

                return $btn;
            })
            ->setRowId('id')
            ->rawColumns(['status', 'action']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Customer>
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()
            ->select('users.id', 'users.name', 'users.email', 'users.telephone', 'users.id_number', 'users.gender', 'users.national_id', 'statuses.name as status', 'users.created_at')
            ->join('statuses', 'statuses.id', '=', 'users.status')
            ->where('users.role_id', '=', 2);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('customers-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                'dom' => '<"top"Bl><"filter d-flex justify-content-end"f>rt<"bottom d-flex align-items-center justify-content-between"ip>',
                // 'buttons' => ['csv', 'pdf', 'print'],
                'buttons' => [

                    [
                        'extend' => 'csv',
                        'className' => 'btn btn-sm btn-outline-primary', // Custom classes
                    ],
                    [
                        'extend' => 'pdf',
                        'className' => 'btn btn-sm btn-outline-primary', // Custom classes
                    ],
                    [
                        'extend' => 'print',
                        'className' => 'btn btn-sm btn-outline-primary', // Custom classes
                    ],
                ]
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            // Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::make('national_id')->title('National ID'),
            Column::make('id_number')->title('ID Number'),
            Column::make('gender'),
            Column::make('telephone'),
            Column::make('status'),
            Column::make('created_at')->title('Joined On'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Customers_' . date('YmdHis');
    }
}
