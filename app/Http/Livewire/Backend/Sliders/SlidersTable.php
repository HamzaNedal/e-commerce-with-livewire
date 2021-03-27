<?php

namespace App\Http\Livewire\Backend\Sliders;

use App\Models\Slider;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class SlidersTable extends LivewireDatatable
{
    // public $hideable = 'select';
    // protected $productController;
    public $slider_id;
    protected $edit;
    protected $delete;
    protected $listeners = ['triggerConfirm', 'confirmed', 'columns'];

    public function builder()
    { 
        return Slider::query();
    }
   
       
    public function __construct()
    {
        $this->edit = auth()->user()->hasPermissionTo('edit_slider');
        $this->delete = auth()->user()->hasPermissionTo('delete_slider');
        
        // $this->sliderController = new  ProductsController();
    }

    public function columns()
    {
       
        return [
            NumberColumn::name('id'),
            Column::name('title')->filterable()->searchable(),
            Column::name('description')->truncate()->searchable(),
            Column::name('link')->filterable()->searchable(),
            DateColumn::name('created_at')->filterable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.backend.actions', ['id' => $id, 'route_name' => 'products', 'hasPermissionEdit' => $this->edit, 'hasPermissionDelete' => $this->delete]);
            }),

        ];
    }


    public function confirmed()
    {
        $this->alert(
            'success',
            'Product has been deleted.'
        );
        $slider = Slider::findOrFail($this->slider_id);
        $slider->delete();
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
        if (auth()->user()->hasPermissionTo('delete_slider')) {
            $this->slider_id = $id;
            $this->emit('triggerConfirm');
        }else{
            abort(403, 'unauthrized');
        }
        
    }
    function showEdit($id)
    {
        if (auth()->user()->hasPermissionTo('edit_slider')) {
            $this->emit('editSlider', $id);
        }
    }
}
