<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('assets/js/app-script.js') }}"></script>
<script src="{{ asset('assets/plugins/Chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/datatables.min.js') }}"></script>

@if (Session::has('error'))
    <script>
        Swal.fire({
            text: '{{ Session::get('error') }}',
            icon: 'error'
        })
    </script>
@endif
