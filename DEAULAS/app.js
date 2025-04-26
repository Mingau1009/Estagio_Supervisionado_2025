$(document).ready(function () {
    $(".botao-selecionar-exercicio").on("click", function () {
        let {
            id,
            nome_aula,
            dia_semana,
            horario_aula,
            professor
        } = $(this).data();
        
        $("#editar").modal("show");
        
        $("#formulario-editar input[name='id']").val(id);
        $("#formulario-editar input[name='nome_aula']").val(nome_aula);
        $("#formulario-editar input[name='dia_semana']").val(dia_semana);
        $("#formulario-editar input[name='horario_aula']").val(horario_aula);
        $("#formulario-editar input[name='professor']").val(professor);     
    });

    $(".botao-gerar-pdf").on("click", function(){
        window.print();
    });
});