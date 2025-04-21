$(document).ready(function () {
    $(".botao-selecionar-exercicio").on("click", function () {
        let {
            id,
            nome,
            categoria_aula,
            dia_semana_aula,
            horario_aula,
            professor,
            local_aula
        } = $(this).data();
        
        $("#editar").modal("show");
        
        $("#formulario-editar input[name='id']").val(id);
        $("#formulario-editar input[name='nome']").val(nome);
        $("#formulario-editar input[name='categoria_aula']").val(categoria_aula);
        $("#formulario-editar input[name='dia_semana_aula']").val(dia_semana_aula);
        $("#formulario-editar input[name='horario_aula']").val(horario_aula);
        $("#formulario-editar input[name='professor']").val(professor);
        $("#formulario-editar input[name='local_aula']").val(local_aula);        
    });

    $(".botao-gerar-pdf").on("click", function(){
        window.print();
    });
});