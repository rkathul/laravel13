<?php

namespace App\DataTables;

use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder<User>  $query
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('created_at', fn (User $user) => $user->created_at?->format('Y-m-d H:i'))
            ->editColumn('action', fn (User $user) => '<a href="'.route('admin.users.edit', $user->id).'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a> <a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<User>
     */
    public function query(UserRepository $userRepository): QueryBuilder
    {
        return $userRepository->getUsersQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array<int, Column>
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('#')
                ->orderable(false)
                ->searchable(false)
                ->exportable(false)
                ->width(60),
            Column::make('name')->title('Name'),
            Column::make('email')->title('Email'),
            Column::make('created_at')->title('Created At'),
            Column::make('action')->title('Action')->orderable(false)->searchable(false)->exportable(false)->width(100),

        ];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getBuilderParameters(): array
    {
        return [
            'pageLength' => 25,
            'responsive' => true,
            'processing' => true,
            'serverSide' => true,
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_'.date('YmdHis');
    }
}
