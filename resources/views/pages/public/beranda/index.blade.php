@extends('theme.layout-admin')
@section('title', 'Beranda')

@section('content')
<div class="alert alert-white p-md-3 p-2 mb-0">
    <nav aria-label="breadcrumb mb-0">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item mb-0"><a>{{ auth()->user()->role == 1 ? 'Admin' : 'User' }}</a></li>
            <li class="breadcrumb-item active mb-0" aria-current="page">Beranda</li>
        </ol>
    </nav>
</div>
<br>
<div class="card p-md-3 p-2">
    <h6 class="card-title mb-0">Selamat datang {{ auth()->user()->name }}</h6>
</div>

@endsection

@push('script')
    <script>
        $('#beranda-menu').addClass('active')
    </script>
@endpush
