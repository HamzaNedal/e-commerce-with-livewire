@extends('backend.layouts.app')

@section('content')
<div class="m-content ">
    <div class="m-portlet m-portlet--tab ">
       <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
             <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                   <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                   {{ __("Edit Role") }}
                </h3>
             </div>
          </div>
       </div>
        <livewire:backend.roles.edit-role :permissionsAndRolePermissions="$permissionsAndRolePermissions" >
    </div>
    </div>
@endsection