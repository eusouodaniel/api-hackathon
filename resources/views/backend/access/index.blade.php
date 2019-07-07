@extends('backend.base.base')
@section('pageTitle','Controle de acesso')
@section('titleBreadcrumb', 'Controle de acesso')
@section('login', 'active')
@section('css')
    <link rel="stylesheet" href="{{asset('backend/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">Controle de acesso
    </li>
@endsection
@section('content')
    <div class="table-responsive">
        <table id="datatableAdmin" class="table mb-0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">IP</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Longitude</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@section('js')
<script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script type="text/javascript">
    $(function() {
        $('#datatableAdmin').DataTable({
            @include('backend.base.datatables'),
            ajax: "{{ route('backend.datatables.accesses') }}",
            columns: [
                { data: 'id' },
                { data: 'user' },
                { data: 'last_login_ip' },
                { data: 'latitude' },
                { data: 'longitude' },
                { data: 'last_login_at' },
            ],
        });
    });
</script>
@endsection