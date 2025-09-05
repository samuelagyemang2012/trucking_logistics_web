<?php

namespace App\DataTables;

use App\Models\AdminDriver;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class AdminDriversDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<AdminDriver> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('national_id', function ($driver) {
                return Str::title(Str::replace("_", " ", $driver->national_id));
            })
            ->editColumn('created_at', function ($driver) {
                return Carbon::parse($driver->created_at)->format('Y-m-d');
            })
            ->editColumn('id_number', function ($driver) {
                return Str::upper($driver->id_number);
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
                $btn .= "<a class='btn btn-sm btn-outline-dark' href='/jk'><i class='las la-box fs-18'></i></a>";
                $btn .= "</div>";

                return $btn;
            })
            ->setRowId('id')
            ->rawColumns(['status','action']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<AdminDriver>
     */
    public function query(User $model): QueryBuilder
    {
        $company = Company::where('user_id', $this->id)->first();

        return $model->newQuery()
            ->select('users.id', 'users.name', 'users.email', 'users.telephone', 'users.national_id', 'users.id_number', 'statuses.name as status', 'users.created_at')
            ->join('statuses', 'users.status', '=', 'statuses.id')
            ->join('drivers', 'drivers.user_id', '=', 'users.id')
            ->where('users.role_id', '=', 4)
            ->where('company_id','=',$company->id);
            
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('admindrivers-table')
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
                        'className' => 'btn btn-sm btn-outline-dark', // Custom classes
                    ],
                    [
                        'extend' => 'pdf',
                        'className' => 'btn btn-sm btn-outline-dark', // Custom classes
                    ],
                    [
                        'extend' => 'print',
                        'className' => 'btn btn-sm btn-outline-dark', // Custom classes
                    ],
                ]
            ]);
        // ->buttons([
        //     Button::make('excel'),
        //     Button::make('csv'),
        //     Button::make('pdf'),
        //     Button::make('print'),
        //     Button::make('reset'),
        //     Button::make('reload')
        // ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('name'),
            Column::make('email'),
            Column::make('telephone'),
            Column::make('national_id')->title('National ID'),
            Column::make('id_number')->title('ID Number'),
            Column::make('status')->title('Status'),
            Column::make('created_at')->title('Joined At'),
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
        return 'AdminDrivers_' . date('YmdHis');
    }
}
