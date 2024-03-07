@extends('theme.layout-admin')
@section('title', 'Beranda')

@section('content')
<style>
/* Untuk browser berbasis WebKit */
.dt-scroll-body::-webkit-scrollbar {
    display: none;
}

/* Untuk browser selain WebKit */
#datatable {
    scrollbar-width: none;
    -ms-overflow-style: none; /* Untuk Internet Explorer 10+ */
}
</style>
<div class="alert alert-white p-md-3 p-2 mb-0">
    <nav aria-label="breadcrumb mb-0">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item mb-0"><a>Admin</a></li>
            <li class="breadcrumb-item mb-0"><a>Web</a></li>
            <li class="breadcrumb-item active mb-0" aria-current="page">Kotak Masuk</li>
        </ol>
    </nav>
</div>
<br>
<div class="card p-md-3 p-2">
    <div class="d-flex align-items-center justify-content-between card-header">
        <h6 class="card-title mb-0">Kotak Masuk</h6>
        <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center"><i class="zmdi zmdi-download mr-2 ml-0 mb-0"></i>Ekspor Data</a>
    </div>
    <div class="card-body">
        <div>
            <table class="w-100 my-3 table table-bordered table-hovered table-striped datatable" id="datatable">
                <thead>
                    <tr>
                        <th class="text-left">No</th>
                        <th class="text-left">Waktu Pesan Masuk</th>
                        <th class="text-left">Name</th>
                        <th class="text-left">Email</th>
                        <th class="text-left">Whatsapp</th>
                        <th class="text-left">Insitusi</th>
                        <th class="text-left">Pesan</th>
                        <th class="text-left">Status</th>
                        <th class="text-left">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div id="balas-pesan" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title">Balas Pesan</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-2">
                    <label for="pesan-masuk">Pesan Masuk</label>
                    <div class="form-control" id="pesan-masuk"></div>
                </div>
                <div class="form-group mb-2">
                    <label for="balasan">Balasan</label>
                    <input type="hidden" id="id">
                    <textarea name="balasan" id="balasan" class="form-control" rows="5"></textarea>
                    <small><em class="text-white" id="balasan-error"></em></small>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex">
                    <div class="spinner-border d-none" id="loading" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <button type="button" id="submit" class="btn btn-primary mx-2">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
    <script>
        $('#web-kotak-masuk').addClass('active')
        $('#datatable').DataTable({
            scrollX: true,
            ajax: {
                url: '{{ route('admin.web.kotak-masuk.index') }}',
                type: 'GET',
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                { data: 'waktu', name: 'waktu' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'whatsapp', name: 'whatsapp' },
                { data: 'institution', name: 'institution' },
                { data: 'message', name: 'message' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' }
            ]
        })
        $('.edit').on('click', function(){
            alert($(this).attr('id'))
            console.log('hello world')
        })
        function editData(id) {
            $('#loading').addClass('d-none')
            $('#balasan-error').html('')
            $('#pesan-masuk').html('');
            $('#id').val('');
            $('#balasan').val('');

            var route = "{{ route('admin.web.kotak-masuk.show',':id') }}";
            route = route.replace(':id', id);
            $.ajax({
                url: route,
                method: "GET",
                success: function(response){
                    if(response.data.status === 'Pending'){
                        $('#pesan-masuk').html(response.data.message)
                        $('#id').val(response.data.id)
                        $('#balas-pesan').modal('show')
                    } else {
                        Swal.fire({
                            text: 'Anda telah membalas pesan ini',
                            icon: 'error'
                        })
                    }
                },
                error: function(error){
                    console.error(error)
                }
            })

        }
        $('#submit').on('click', function(){
            $('#balasan-error').html('')
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $('#loading').removeClass('d-none')

            if(!$('#balasan').val()) {
                $('#balasan-error').html('balasan pesan tidak boleh kosong')
                $('#loading').addClass('d-none')
            } else {
                var route = "{{ route('admin.web.kotak-masuk.update',':id') }}";
                route = route.replace(':id', $('#id').val());

                $.ajax({
                    url: route,
                    method: "PUT",
                    data: {
                        balasan: $('#balasan')
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response){
                        console.log(response)
                        $('#loading').addClass('d-none')
                    },
                    error: function(error){
                        console.log(error)
                        $('#loading').addClass('d-none')
                    }
                })
            }
        })
    </script>
@endpush
