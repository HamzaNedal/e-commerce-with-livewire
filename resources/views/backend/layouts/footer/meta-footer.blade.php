	<!--begin::Base Scripts -->
    <script src="{{ asset('backend') }}/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
    <script src="{{ asset('backend') }}/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
    <!--end::Base Scripts -->   
    <!--begin::Page Vendors -->
    <script src="{{ asset('backend') }}/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
    <!--end::Page Vendors -->  
    <!--begin::Page Snippets -->
    <script src="{{ asset('backend') }}/assets/app/js/dashboard.js" type="text/javascript"></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    </script>
    <x-livewire-alert::scripts />
    @stack('js')
    <!--end::Page Snippets -->