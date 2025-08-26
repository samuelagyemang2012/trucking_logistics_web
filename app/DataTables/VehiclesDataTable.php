<?php

namespace App\DataTables;

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

class VehiclesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Vehicle> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('type', function ($vehicle) {
                return $vehicle->vehicle_type->name;
            })
            ->editColumn('model', function ($vehicle) {
                return Str::title($vehicle->model);
            })
            ->editColumn('status_id', function ($vehicle) {

                if ($vehicle->status->name == 'Available') {
                    return '<span class="badge bg-success-subtle text-success">' . $vehicle->status->name . '</span>';
                } elseif ($vehicle->status->name == 'Out of Service') {
                    return '<span class="badge bg-danger-subtle text-danger">' . $vehicle->status->name . '</span>';
                } elseif ($vehicle->status->name == 'In Use') {
                    return '<span class="badge bg-primary-subtle text-primary">' . $vehicle->status->name . '</span>';
                } else {
                    return '<span class="badge bg-secondary-subtle text-secondary">' . $vehicle->status->name . '</span>';
                }
            })

            ->addColumn('action',  function ($vehicle) {
                $btn = "<div class='btn-group' role='group'>";
                $btn .= "<button class='btn btn-sm btn-outline-primary' data-bs-toggle='modal' data-bs-target='#editVehicle' onclick='get_vehicle(\"{$vehicle->id}\")'><i class='las la-pen fs-18'></i></button>";
                $btn .= "<button class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#deleteVehicle' onclick='delete_vehicle(\"{$vehicle->id}\")'><i class='las la-trash fs-18'></i></button>";
                $btn .= "</div>";

                return $btn;
            })
            ->setRowId('id')
            ->rawColumns(['status_id', 'action']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Vehicle>
     */
    public function query(Vehicle $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('vehicles_table')
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
            Column::make('type'),
            Column::make('model'),
            Column::make('registration_number'),
            Column::make('number_plate'),
            Column::make('mileage'),
            Column::make('payload'),
            Column::make('manufacture_year')->title('Year'),
            Column::make('status_id')->title('Status'),
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
        return 'Vehicles_' . date('YmdHis');
    }
}
