<?php

namespace App\DataTables;

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

class CompaniesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Company> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('name', function ($company) {
                return $company->name;
            })
            ->editColumn('status', function ($company) {
                if ($company->status == 'Active') {
                    return '<span class="badge bg-success-subtle text-success">' . $company->status . '</span>';
                } else {
                    return '<span class="badge bg-danger-subtle text-danger">' . $company->status . '</span>';
                }
            })
            ->editColumn('tin_number', function ($company) {
                return Str::upper($company->tin_number);
            })
            ->editColumn('created_at', function ($company) {
                return Carbon::parse($company->created_at)->format('Y-m-d');
            })
            ->addColumn('action',  function ($user) {
                $btn = "<div class='btn-group' role='group'>";
                $btn .= "<a class='btn btn-sm btn-outline-dark' href='/admin/users/companies/" . $user->id . "'><i class='las la-eye fs-18'></i></a>";
                $btn .= "<a class='btn btn-sm btn-outline-dark' href='/admin/users/companies/vehicles/" . $user->id . "'><i class='las la-truck fs-18'></i></a>";
                $btn .= "<a class='btn btn-sm btn-outline-dark' href='/admin/users/companies/drivers/" . $user->id . "'><i class='las la-user fs-18'></i></a>";
                $btn .= "<a class='btn btn-sm btn-outline-dark' href='/admin/users/companies/jobs/" . $user->id . "'><i class='las la-box fs-18'></i></a>";
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
     * @return QueryBuilder<Company>
     */
    public function query(User $model): QueryBuilder
    {
        // $user = Auth::user();
        // $company = Company::where('user_id', $user->id)->first();

        return $model->newQuery()
            ->select('users.id', 'users.name', 'users.email', 'users.telephone', 'companies.tin_number', 'statuses.name as status', 'users.created_at')
            ->join('companies', 'companies.user_id', '=', 'users.id')
            ->join('statuses', 'statuses.id', '=', 'users.status')
            ->where('users.role_id', '=', 3);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('companies_table')
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
            Column::make('telephone'),
            Column::make('email'),
            Column::make('tin_number')->title('TIN'),
            Column::make('status'),
            Column::make('created_at')->title('Joined On'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Companies_' . date('YmdHis');
    }
}
