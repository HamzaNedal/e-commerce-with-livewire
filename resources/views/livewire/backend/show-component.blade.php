<div>
    @yield('content')
    @if ($route_name!='index')
    <livewire:backend.users.user-livewire  /> 
    @endif
</div>
