@extends('backend.base.base')
@section('pageTitle','Usuários')
@section('titleBreadcrumb', 'Usuários')
@section('user', 'active')
@section('css')
    <link rel="stylesheet" href="{{asset('backend/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">Usuários
    </li>
@endsection
@section('content')
    <div class="table-responsive">
        <table id="datatableAdmin" class="table mb-0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
        </table>
    </div>
    <a href="{{ route('backend.users.create') }}" class="@include('backend.base.buttons.button-register')">Novo usuário</a>
@endsection

@section('js')
<script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script type="text/javascript">
    $(function() {
        $('#datatableAdmin').DataTable({
            @include('backend.base.datatables'),
            ajax: "{{ route('backend.datatables.users') }}",
            columns: [
                { data: 'id' },
                { data: 'first_name' },
                { data: 'email' },
                { data: 'actions' },
            ],
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.change-user-password', function(){
            var userId = $(this).data('user');
            Swal.fire({
                title: 'Alterar Senha',
                type: 'info',
                html:
                    `<div class="form-group text-left">
                        <label for="password">Nova senha</label>
                        <input name="password" type="password" id="password" class="form-control" required></input>
                    </div>
                    <div class="form-group text-left">
                        <label for="password_confirmation">Repita a nova senha</label>
                        <input name="password_confirmation" type="password" id="password_confirmation" class="form-control" required></input>
                    </div>`,
                showCancelButton: true,
                confirmButtonText: 'Alterar',
                cancelButtonText: 'Cancelar',
                preConfirm: function(){
                    return {
                        password: $('#password').val(),
                        passwordConfirmation: $('#password_confirmation').val()
                    }
                }
            }).then((result) => {
                if(result.value) {
                    let url = route('backend.users.change-password');
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {password: result.value.password, password_confirmation: result.value.passwordConfirmation, id:userId},
                        headers: {'X-CSRF-Token': '{{ csrf_token() }}'}
                    })
                    .done(function(){
                        Swal.fire({
                            title: 'Senha alterada com sucesso',
                            type: 'success',
                        });
                    })
                    .fail(function(e) {
                        Swal.fire({
                            title: 'Oops!',
                            html: '<ul style="list-style: none; padding: 0;" id="errors"></ul>',
                            type: 'error',
                            onBeforeOpen: function() {
                                if(e.responseJSON.errors && e.responseJSON.errors.password) {
                                    e.responseJSON.errors.password.forEach(element => {
                                        $('#errors').append($(`<li>${element}</li>`));
                                    });
                                } else {
                                    $('#errors').append('Houve um erro desconhecido!');
                                }
                            }
                        })
                    });
                }
            });
        });
        $(document).on('click', '.add-anamnese', function(){
            
            var userId = $(this).data('user');
            Swal.fire({
                title: 'Adicionar descrição',
                type: 'info',
                html:
                    `<div class="form-group text-left">
                        <label for="description">Observação</label>
                        <input name="description" type="text" id="description" class="form-control" required></input>
                    </div>`,
                showCancelButton: true,
                confirmButtonText: 'Enviar',
                cancelButtonText: 'Cancelar',
                preConfirm: function(){
                    return {
                        description: $('#description').val()
                    }
                }
            }).then((result) => {
                if(result.value) {
                    let url = route('backend.descriptions-users.store');
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {description: result.value.description, user_id: userId},
                        headers: {'X-CSRF-Token': '{{ csrf_token() }}'}
                    })
                    .done(function(){
                        Swal.fire({
                            title: 'Descrição adicionada com sucesso',
                            type: 'success',
                        });
                    })
                    .fail(function(e) {
                        Swal.fire({
                            title: 'Oops!',
                            html: '<ul style="list-style: none; padding: 0;" id="errors"></ul>',
                            type: 'error',
                            onBeforeOpen: function() {
                                if(e.responseJSON.errors && e.responseJSON.errors.description) {
                                    e.responseJSON.errors.description.forEach(element => {
                                        $('#errors').append($(`<li>${element}</li>`));
                                    });
                                } else {
                                    $('#errors').append('Houve um erro desconhecido!');
                                }
                            }
                        })
                    });
                }
            });
        });
    });
</script>
@endsection