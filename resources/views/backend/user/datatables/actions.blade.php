<?php ?>
<td>
    <div class="d-flex">
        <div class="action-buttons d-flex align-items-center mr-1">
            <a class="btn btn-sm btn-warning btn-edit-item" href="{{ route('backend.users.edit', array('id' => $user->id)) }}" title="Editar">
                <i class="la la-pencil"></i>
            </a>
        </div>
        <div class="action-buttons d-flex align-items-center mr-1">
            <button data-user="{{ $user->id }}" class="btn btn-sm btn-info change-user-password" title="Alterar senha">
                <i class="la la-lock"></i>
            </button>
        </div>
        @if(Auth::user()->id != $user->id)
            <form action="{{ route('backend.users.destroy', array('id' => $user->id)) }}" method="post" name="formUserRemoveItem{{ $user->id }}" class="form-icon">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="action-buttons rounded d-flex align-items-center">
                    <a class="btn btn-sm btn-danger btn-delete-item itemDelete{{ $user->id }}" data-swal-title='Remover usuário' data-swal-text="Usuários podem ser recuperados no futuro. Deseja realmente prosseguir com esta ação?" data-form-name="formUserRemoveItem{{ $user->id }}" onclick="removeItem(this);" data-toggle="tooltip" data-placement="bottom" title="Deletar">
                        <i class="la la-trash"></i>
                    </a>
                </div>
            </form>
        @endif
    </div>
</td>