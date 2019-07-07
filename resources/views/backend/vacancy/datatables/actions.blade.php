<?php ?>
<td>
    <div class="d-flex">
        <div class="action-buttons d-flex align-items-center mr-1">
            <a class="btn btn-sm btn-warning btn-edit-item" href="{{ route('backend.vacancies.edit', array('id' => $vacancy->id)) }}" title="Editar">
                <i class="la la-pencil"></i>
            </a>
        </div>
        <form action="{{ route('backend.vacancies.destroy', array('id' => $vacancy->id)) }}" method="post" name="formVacancyRemoveItem{{ $vacancy->id }}" class="form-icon">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="action-buttons rounded d-flex align-items-center">
                <a class="btn btn-sm btn-danger btn-delete-item itemDelete{{ $vacancy->id }}" data-swal-title='Remover vaga' data-swal-text="Deseja realmente prosseguir com esta ação?" data-form-name="formVacancyRemoveItem{{ $vacancy->id }}" onclick="removeItem(this);" data-toggle="tooltip" data-placement="bottom" title="Deletar">
                    <i class="la la-trash"></i>
                </a>
            </div>
        </form>
    </div>
</td>