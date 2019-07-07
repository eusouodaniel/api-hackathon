@extends('backend.base.base')
@section('pageTitle','Vagas')
@section('titleBreadcrumb', 'Vagas')
@section('vacancy', 'active')
@section('css')
    <link rel="stylesheet" href="{{asset('backend/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">Vagas
    </li>
@endsection
@section('content')
    <div class="table-responsive">
        <table id="datatableAdmin" class="table mb-0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
        </table>
    </div>
    <a href="{{ route('backend.vacancies.create') }}" class="@include('backend.base.buttons.button-register')">Nova vaga</a>
@endsection

@section('js')
<script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script type="text/javascript">
    $(function() {
        $('#datatableAdmin').DataTable({
            @include('backend.base.datatables'),
            ajax: "{{ route('backend.datatables.vacancies') }}",
            columns: [
                { data: 'id' },
                { data: 'cpf' },
                { data: 'status' },
                { data: 'actions' },
            ],
        });
    });
</script>
@endsection