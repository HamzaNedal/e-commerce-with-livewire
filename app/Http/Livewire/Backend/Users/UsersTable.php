<?php

namespace App\Http\Livewire\Backend\Users;

use App\Http\Controllers\Backend\UserController;
use App\Models\User;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;
    public $hideable = 'select';
    protected $userController;
    public $user_id;
    protected $listeners = ['triggerConfirm', 'confirmed', 'columns'];
    public function __construct()
    {

        $this->userController = new  UserController();
    }

    public function columns()
    {
        return [
            Column::checkbox(),
            NumberColumn::name('id'),
            Column::name('name')->filterable()->searchable(),
            Column::name('email')->filterable()->searchable(),
            DateColumn::name('dob')->filterable(),
            Column::name('phone_number')->filterable()->searchable(),
            Column::name('roles.name')
                ->label('role'),
            DateColumn::name('created_at')->filterable(),
            BooleanColumn::callback(['id', 'status'], function ($id, $status) {
                return view('livewire.backend.status-yes-no', ['id' => $id, 'status' => $status]);
            })->filterable(['false' => 'InActive', 'true' => 'Active'], 'statusToSearch')->label('Status'),
            Column::callback(['id'], function ($id) {
                return view('livewire.backend.actions', ['id' => $id, 'route_name' => 'users', 'hasPermissionEdit' => 'edit_user', 'hasPermissionDelete' => 'delete_user']);
            }),

        ];
    }

    public function changeStatus($id)
    {
        $this->userController->changeStatus($id);
    }
    public function confirmed()
    {
        $this->alert(
            'success',
            'User has been deleted.'
        );
        $this->userController->destroy($this->user_id);
    }
    public function triggerConfirm()
    {
        $this->confirm('Are you sure ?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => "NO",
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);
    }
    function delete($id)
    {
        if (auth()->user()->hasPermissionTo('delete_user')) {
            $this->user_id = $id;
            $this->emit('triggerConfirm');
        }
        abort(403, 'unauthrized');
    }
    function showEdit($id)
    {
        if (auth()->user()->hasPermissionTo('edit_user')) {
            $this->emit('editUser', $id);
        }
    }
}
