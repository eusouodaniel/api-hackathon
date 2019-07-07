$(document).ready(function () {
    initSelect2Fields();
});

function initSelect2Fields() {
    $('.select2').select2({
        val: null,
        language: "pt-BR",
        placeholder: "Selecione uma opção",
    });

    $('#services.select2').select2({
        val: null,
        language: "pt-BR",
        placeholder: "Selecione um ou mais serviços",
    });
}