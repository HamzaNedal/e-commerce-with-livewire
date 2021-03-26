<?php

namespace App\Http\Livewire\Backend\Products\Categories;

use App\Models\Category;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class CategoriesTable extends LivewireDatatable
{
    
    public $category_id;
    protected $listeners = ['triggerConfirm', 'confirmed', 'columns'];
    public function builder()
    {
        return  Category::query();
    }


    public function columns()
    {
        return [
            // Column::checkbox(),
            NumberColumn::name('id'),
            Column::name('title')->filterable()->searchable(),
            BooleanColumn::callback(['id', 'status'], function ($id, $status) {
                return view('livewire.backend.status-yes-no', ['id' => $id, 'status' => $status]);
            })->filterable(['false' => 'InActive', 'true' => 'Active'], 'statusToSearch')->label('Status'),
            Column::callback(['id'], function ($id) {
                return view('livewire.backend.actions', ['id' => $id, 'route_name' => 'categories', 'hasPermissionEdit' => 'edit_category', 'hasPermissionDelete' => 'delete_category']);
            }),

        ];
    }

    public function changeStatus($id)
    {
        $category = Category::findOrFail($id);
        $category->status = !$category->status;
        $category->save();
    }

    public function confirmed()
    {
        $this->alert(
            'success',
            'Category has been deleted.'
        );
        Category::findOrFail($this->category_id)->delete();
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
        if (auth()->user()->hasPermissionTo('delete_category')) {
            $this->category_id = $id;
            $this->emit('triggerConfirm');
        }else{
            abort(403, 'unauthrized');
        }
        
    }
    
    function showEdit($id)
    {
        if (auth()->user()->hasPermissionTo('edit_category')) {
            $this->emit('editCategory', $id);
        }
    }
}
