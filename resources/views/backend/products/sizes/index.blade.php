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
       Livewire.emit('showMe',{'display':'block'});
    });

    document.getElementById('clickToHideMe').addEventListener('click',function() {
       Livewire.emit('showMe',{'display':'none'});
    });

    Livewire.on('showMe', data=> {
        console.log(data);
        document.getElementById('showMe').style.display = data['display'];
    });
</script>
@endpush
<div class="m-content">
    <div class="row">
        <div class="col-md-12">
            <div class="m-portlet m-portlet--mobile"  id="showMe" style="display: none">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                {{ __("Size Info") }}
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    </div>
                </div>
                <div class="m-portlet__body">
                    <livewire:backend.products.sizes.size-livewire  />
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                {{ __("Sizes Table") }}
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                @can('add_size')
                                <a class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" id='clickToShowMe'>
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>
                                            {{ __("Add size") }}
                                        </span>
                                    </span>
                                </a>
                                @endcan
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                   <livewire:backend.products.sizes.sizes-table  exportable />
                </div>
            </div>
        </div>
    </div>

</div>
@endsection