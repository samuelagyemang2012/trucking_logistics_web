<?php

namespace App\DataTables;

use App\Models\Company;
use App\Models\Driver;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class DriversDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Driver> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('name', function ($driver) {
                return Str::title($driver->name);
            })
            ->editColumn('status', function ($driver) {
                if ($driver->status == 'Active') {
                    return '<span class="badge bg-success-subtle text-success">' . $driver->status . '</span>';
                } else {
                    return '<span class="badge bg-danger-subtle text-danger">' . $driver->status . '</span>';
                }
            })
            ->editColumn('national_id', function ($driver) {
                return Str::title(Str::replace("_", " ", $driver->national_id));
            })
            ->editColumn('created_at', function ($driver) {
                return Carbon::parse($driver->created_at)->format('Y-m-d');
            })
            ->addColumn('action',  function ($driver) {
                $btn = "<div class='btn-group' role='group'>";
                $btn .= "<button class='btn btn-sm btn-outline-primary' data-bs-toggle='modal' data-bs-target='#editDriver' onclick='get_driver(\"{$driver->id}\")'><i class='las la-pen fs-18'></i></button>";
                $btn .= "<button class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#deleteDriver' onclick='delete_driver(\"{$driver->id}\")'><i class='las la-trash fs-18'></i></button>";
                $btn .= "</div>";

                return $btn;
            })
            ->setRowId('id')
            ->rawColumns(['status', 'action']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Driver>
     */
    public function query(Driver $model): QueryBuilder
    {

        $user = Auth::user();
        $company = Company::where('user_id', $user->id)->first(); 

        return $model->newQuery()
            ->select('users.id', 'users.name', 'users.email', 'users.telephone', 'users.national_id', 'users.id_number', 'statuses.name as status', 'users.created_at')
            ->join('users', 'drivers.user_id', '=', 'users.id')
            ->join('companies', 'drivers.company_id', '=', 'companies.id')
            ->join('statuses', 'users.status', '=', 'statuses.id')
            ->where('drivers.company_id', $company->id)
            ->where('users.role_id', '=', 4);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('drivers_table')
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
            Column::make('name'),
            Column::make('email'),
            Column::make('telephone')->title('Mobile No'),
            Column::make('national_id')->title('ID'),
            Column::make('id_number')->title('ID Number'),
            Column::make('created_at')->title('Joined On'),
            Column::make('status'),
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
        return 'Drivers_' . date('YmdHis');
    }
}
