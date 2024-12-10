$(document).ready(function () {
    $(".botao-selecionar-exercicio").on("click", function () {
        let {
            id,
            nome,
            tipo_exercicio,
            grupo_muscular
        } = $(this).data();

        $("#editar").modal("show");

        $("#formulario-editar input[name='id']").val(id);
        $("#formulario-editar input[name='nome']").val(nome);
        $("#formulario-editar input[name='tipo_exercicio']").val(tipo_exercicio);
        $("#formulario-editar input[name='grupo_muscular']").val(grupo_muscular);

    });

    $(".botao-gerar-pdf").on("click", function(){
        window.print();
    });
});