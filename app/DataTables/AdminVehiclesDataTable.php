<?php

namespace App\DataTables;

use App\Models\AdminVehicle;
use App\Models\Company;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class AdminVehiclesDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('model', function ($vehicle) {
                return Str::title($vehicle->model);
            })
            ->editColumn('state', function ($vehicle) {
                if ($vehicle->status->name  == 'Available') {
                    return '<span class="badge bg-success-subtle text-success">' . $vehicle->status->name . '</span>';
                } elseif ($vehicle->status->name  == 'Out of Service') {
                    return '<span class="badge bg-danger-subtle text-danger">' . $vehicle->status->name  . '</span>';
                } elseif ($vehicle->status->name == 'In Use') {
                    return '<span class="badge bg-primary-subtle text-primary">' . $vehicle->status->name . '</span>';
                } else {
                    return '<span class="badge bg-secondary-subtle text-secondary">' . $vehicle->status->name  . '</span>';
                }
            })
            ->addColumn('action',  function ($user) {
                $btn = "<div class='btn-group' role='group'>";
                $btn .= "<a class='btn btn-sm btn-outline-dark' href=''><i class='las la-box fs-18'></i></a>";
                // $btn .= "<a class='btn btn-sm btn-outline-primary' href='/admin/users/customers/" . $user->id . "'><i class='las la-eye fs-18'></i></a>";
                $btn .= "</div>";

                return $btn;
            })
            ->setRowId('id') 
            ->rawColumns(['state','action']);
    }


    public function query(Vehicle $model): QueryBuilder
    {
        // $user = User::where(['id' => $this->uid])->first();
        $company = Company::where(['user_id' => $this->id])->first();

        return $model->newQuery()
            ->select('model', 'status_id', 'number_plate', 'mileage', 'payload', 'manufacture_year', 'vehicle_types.name as type', 'statuses.name as state')
            ->join('statuses', 'vehicles.status_id', '=', 'statuses.id')
            ->join('vehicle_types', 'vehicles.type', '=', 'vehicle_types.id')
            ->where('vehicles.company_id', '=', $company->id);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('adminvehicles-table')
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
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('type'),
            Column::make('model'),
            Column::make('number_plate'),
            Column::make('mileage'),
            Column::make('payload'),
            Column::make('manufacture_year'),
            Column::make('state')->title('Status'),
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
        return 'AdminVehicles_' . date('YmdHis');
    }
}
