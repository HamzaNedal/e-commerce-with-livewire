<?php

namespace App\Http\Livewire\Backend\Products\Colors;

use App\Models\Color;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ColorsTable extends LivewireDatatable
{
    public $color_id;
    protected $listeners = ['triggerConfirm', 'confirmed', 'columns'];
    public function builder()
    {
        return  Color::query();
    }

    public function columns()
    {
        return [
            // Column::checkbox(),
            NumberColumn::name('id'),
            Column::name('title')->filterable()->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.backend.actions', ['id' => $id, 'route_name' => 'colors', 'hasPermissionEdit' => 'edit_color', 'hasPermissionDelete' => 'delete_color']);
            }),

        ];
    }

    public function confirmed()
    {
        $this->alert(
            'success',
            'Color has been deleted.'
        );
        Color::findOrFail($this->color_id)->delete();
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
        if (auth()->user()->hasPermissionTo('delete_color')) {
            $this->color_id = $id;
            $this->emit('triggerConfirm');
        }else{
            abort(403, 'unauthrized');
        }
        
    }
    
    function showEdit($id)
    {
        if (auth()->user()->hasPermissionTo('edit_color')) {
            $this->emit('editColor', $id);
        }
    }
}
