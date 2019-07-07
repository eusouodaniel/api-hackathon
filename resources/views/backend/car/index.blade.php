@extends('backend.base.base')
@section('pageTitle','Carros')
@section('titleBreadcrumb', 'Carros')
@section('car', 'active')
@section('css')
    <link rel="stylesheet" href="{{asset('backend/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">Carros
    </li>
@endsection
@section('content')
    <div class="table-responsive">
        <table id="datatableAdmin" class="table mb-0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
        </table>
    </div>
    <a href="{{ route('backend.cars.create') }}" class="@include('backend.base.buttons.button-register')">Novo carro</a>
@endsection

@section('js')
<script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script type="text/javascript">
    $(function() {
        $('#datatableAdmin').DataTable({
            @include('backend.base.datatables'),
            ajax: "{{ route('backend.datatables.cars') }}",
            columns: [
                { data: 'id' },
                { data: 'brand' },
                { data: 'model' },
                { data: 'status' },
                { data: 'actions' },
            ],
        });
    });
</script>
@endsection