$(document).ready(function () {
    $(".editar-btn").on("click", function () {
        const id = $(this).data("id");
        const nome = $(this).data("nome");
        const dia = $(this).data("dia");
        const horario = $(this).data("horario");
        const professor = $(this).data("professor");

        // Abre o modal
        $("#editar").modal("show");

        // Preenche os campos do formulário de edição
        $("#formulario-editar input[name='id']").val(id);
        $("#formulario-editar input[name='nome_aula']").val(nome);
        $("#formulario-editar select[name='dia_aula']").val(dia);
        $("#formulario-editar input[name='horario_aula']").val(horario);
        $("#formulario-editar input[name='professor_aula']").val(professor);
    });

    $(".botao-gerar-pdf").on("click", function () {
        window.print();
    });
});
