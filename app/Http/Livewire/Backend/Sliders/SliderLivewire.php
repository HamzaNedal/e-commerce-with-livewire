<?php

namespace App\Http\Livewire\Backend\Sliders;

use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class SliderLivewire extends Component
{

    use WithFileUploads;
    public $slider;
    protected $listeners = ['editSlider','resetForm','messageAlertSuccess'];
    public function render()
    {
        return view('livewire.backend.sliders.slider-livewire');
    }

    function save(){
       
        $this->emit('resetForm');
        $this->emit('columns');
       
        if(array_key_exists('id',$this->slider)){
           if(auth()->user()->hasPermissionTo('edit_slider')){
               return $this->update();
           }
           return abort(403,'unauthrized');
        }
        if(auth()->user()->hasPermissionTo('add_slider')){
           return $this->store();
        }
        return abort(403,'unauthrized');
  
    }
    public function store()
    {
        $file_name = str_replace('public/slider/','',$this->slider['image'][0]->store('public/slider'));
         Slider::create([
            'title'=>$this->slider['title'],
            'description'=>$this->slider['description'],
            'link'=>$this->slider['link'],
            'image'=>$file_name,
        ]);
        $this->emit('showMe',['display'=>'none']);
    }
    public function update()
    {
        $slider = Slider::findOrFail($this->slider['id']);
        $file_name = str_replace('public/slider/','',$this->slider['image']->store('public/slider'));
        $slider->update([
            'title'=>$this->slider['title'],
            'description'=>$this->slider['description'],
            'link'=>$this->slider['link'],
            'image'=> $file_name ?? $slider->image,
        ]);
       
        $this->emit('showMe',['display'=>'none']);
    }
    function editSlider($id){
        $this->resetForm();
        $slider =  Slider::findOrFail($id);
        $this->slider = $slider->toArray();
        $images = [];
            $images['images'][] =  asset("storage/slider/$slider->image");
            $images['captions'][] = 
                [
                'caption'=>$slider->image,
                'width'=>"120px",
                'url'=>route('admin.products.media.destroy',[$slider->id,'_token'=>csrf_token()]),
                'key'=>$slider->id,
                ];
        $this->emit('showMe',[
            'display'=>'block',
            'images'=>$images,
           
        ]);
    }
    
    function resetForm()
    {

       $this->reset();
       $this->resetValidation();
    }


}
