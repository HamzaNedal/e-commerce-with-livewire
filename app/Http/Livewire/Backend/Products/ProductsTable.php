<?php

namespace App\Http\Livewire\Backend\Products;

use App\Http\Controllers\Backend\ProductsController;
use App\Models\Product;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ProductsTable extends LivewireDatatable
{
    // public $model = Product::class;
    public $hideable = 'select';
    protected $productController;
    public $product_id;
    protected $listeners = ['triggerConfirm', 'confirmed', 'columns'];
    public function builder()
    {
        return auth()->user()->hasRole('admin') ? Product::query() : Product::query()->where('fk_user',auth()->user()->id);
    }

    public function __construct()
    {

        $this->productController = new  ProductsController();
    }

    public function columns()
    {
        return [
            Column::checkbox(),
            NumberColumn::name('id'),
            Column::name('name')->filterable()->searchable(),
            Column::name('users.name')->filterable()->searchable()->label('owner'),
            Column::name('category.title')->filterable()->searchable()->label('category'),
            DateColumn::name('description')->truncate()->filterable(),
            NumberColumn::name('stock')->filterable(),
            NumberColumn::name('price')->filterable(),
            DateColumn::name('created_at')->filterable(),
            BooleanColumn::callback(['id', 'status'], function ($id, $status) {
                return view('livewire.backend.status-yes-no', ['id' => $id, 'status' => $status]);
            })->filterable(['false' => 'InActive', 'true' => 'Active'], 'statusToSearch')->label('Status'),
            Column::callback(['id'], function ($id) {
                return view('livewire.backend.actions', ['id' => $id, 'route_name' => 'products', 'hasPermissionEdit' => 'edit_product', 'hasPermissionDelete' => 'delete_product']);
            }),

        ];
    }

    public function changeStatus($id)
    {
        $this->productController->changeStatus($id);
    }
    public function confirmed()
    {
        $this->alert(
            'success',
            'Product has been deleted.'
        );
        $this->productController->destroy($this->product_id);
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
        if (auth()->user()->hasPermissionTo('delete_product')) {
            $this->product_id = $id;
            $this->emit('triggerConfirm');
        }else{
            abort(403, 'unauthrized');
        }
        
    }
    function showEdit($id)
    {
        // dd($id);
        // $this->emit('editProduct', $id);
        if (auth()->user()->hasPermissionTo('edit_product')) {
            $this->emit('editProduct', $id);
        }
    }
}
