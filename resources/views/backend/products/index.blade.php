@extends('backend.layouts.app')
@section('content')
@push('css')
<link href="{{ asset('backend') }}/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" integrity="sha512-l7qZAq1JcXdHei6h2z8h8sMe3NbMrmowhOl+QkP3UhifPpCW2MC4M0i26Y8wYpbz1xD9t61MLT9L1N773dzlOA==" crossorigin="anonymous" />

@endpush
@push('js')
<script src="{{ asset('backend') }}/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="{{ asset('backend') }}/assets/demo/default/custom/crud/datatables/basic/basic.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" ></script>
<script src="{{ asset('backend') }}/assets/app/js/dashboard.js" type="text/javascript"></script>

<script>
    document.getElementById('clickToShowMe').addEventListener('click',function() {
         
       Livewire.emit('resetForm');
       Livewire.emit('showMe','block');
    });

    document.getElementById('clickToHideMe').addEventListener('click',function() {
       Livewire.emit('showMe','none');
    });

    Livewire.on('showMe', show=> {
        document.getElementById('showMe').style.display = show;
    });
    window.addEventListener('contentChanged', event => {
        $('.m-select2').select2();
       
    });
    // 
</script>
@endpush
<div class="m-content">
    {{-- <div class="m-5"></div> --}}
    <div class="row">
        <div class="col-md-12 " >
            <div class="m-portlet m-portlet--mobile"  id="showMe" style="display: none">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                {{ __("Product Info") }}
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    </div>
                </div>
                <div class="m-portlet__body">
              
                    <livewire:backend.products.product-livewire  />
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                {{ __("Products Table") }}
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                @can('add_product')
                                <a class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" id='clickToShowMe'>
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>
                                            {{ __("Add Product") }}
                                        </span>
                                    </span>
                                </a>
                                @endcan
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                   <livewire:backend.products.products-table  exportable />
                </div>
            </div>
        </div>
    </div>

</div>
@endsection