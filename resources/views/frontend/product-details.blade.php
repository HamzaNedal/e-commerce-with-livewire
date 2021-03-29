@extends('layouts.app')

@section('content')
<div style="margin-top: 8rem">
    <livewire:frontend.product-details :product="$product" />
</div>
   
@endsection