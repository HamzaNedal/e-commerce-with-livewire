<?php

namespace App\Http\Livewire\Backend\Products\Sizes;

use App\Models\Size;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class SizesTable extends LivewireDatatable
{
    public $size_id;
    protected $listeners = ['triggerConfirm', 'confirmed', 'columns'];
    public function builder()
    {
        return  Size::query();
    }

    public function columns()
    {
        return [
            // Column::checkbox(),
            NumberColumn::name('id'),
            Column::name('title')->filterable()->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.backend.actions', ['id' => $id, 'route_name' => 'Sizes', 'hasPermissionEdit' => 'edit_size', 'hasPermissionDelete' => 'delete_size']);
            }),

        ];
    }


    public function confirmed()
    {
        $this->alert(
            'success',
            'Size has been deleted.'
        );
        Size::findOrFail($this->size_id)->delete();
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
        if (auth()->user()->hasPermissionTo('delete_size')) {
            $this->size_id = $id;
            $this->emit('triggerConfirm');
        }else{
            abort(403, 'unauthrized');
        }
        
    }
    
    function showEdit($id)
    {
        if (auth()->user()->hasPermissionTo('edit_size')) {
            $this->emit('editSize', $id);
        }
    }
}
